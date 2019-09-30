<?php
// vvv DO NOT MODIFY/REMOVE vvv

// check current php version to ensure it meets 2300's requirements
function check_php_version()
{
  if (version_compare(phpversion(), '7.0', '<')) {
    define(VERSION_MESSAGE, "PHP version 7.0 or higher is required for 2300. Make sure you have installed PHP 7 on your computer and have set the correct PHP path in VS Code.");
    echo VERSION_MESSAGE;
    throw VERSION_MESSAGE;
  }
}
check_php_version();

function config_php_errors()
{
  ini_set('display_startup_errors', 1);
  ini_set('display_errors', 0);
  error_reporting(E_ALL);
}
config_php_errors();

// open connection to database
function open_or_init_sqlite_db($db_filename, $init_sql_filename)
{
  if (!file_exists($db_filename)) {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if (file_exists($init_sql_filename)) {
      $db_init_sql = file_get_contents($init_sql_filename);
      try {
        $result = $db->exec($db_init_sql);
        if ($result) {
          return $db;
        }
      } catch (PDOException $exception) {
        // If we had an error, then the DB did not initialize properly,
        // so let's delete it!
        unlink($db_filename);
        throw $exception;
      }
    } else {
      unlink($db_filename);
    }
  } else {
    $db = new PDO('sqlite:' . $db_filename);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }
  return NULL;
}

function exec_sql_query($db, $sql, $params = array())
{
  $query = $db->prepare($sql);
  if ($query and $query->execute($params)) {
    return $query;
  }
  return null;
}
// ^^^ DO NOT MODIFY/REMOVE ^^^

// You may place any of your code here.


// Source: Log in and Log out functions are from info2300 course, author: Kyle Harms
// some comments are changed and added by Mengfei
$db = open_or_init_sqlite_db("secure/gallery.sqlite", "secure/init.sql");

define('COOKIE_DUR' , 60*60*1);
$session_messages = array();

function user_login($username, $password){
    global $db;
    global $this_user;
    global $session_messages;
    // check if inputed both username and password
    if(isset($username) && isset($password)){
      // get the user record (only one record for a specific username) from users table
      $sql = "SELECT * FROM users WHERE username = :username;";
      $params = array(':username' => $username);
      $records = exec_sql_query($db, $sql, $params) -> fetchAll();
      if($records){
        // if there is a record for this username, verify the password
        // else this username has not been registered, show error message
        // $record = $result -> fetchAll();
        $account = $records[0];

        // check if the input password isEquals to the hashed password in db.
        // else this login would failed due to incorrect password, show error message
        if(password_verify($password, $account['password'])){
          $session = session_create_id();
          $sql = "INSERT INTO sessions(user_id, session) VALUES (:user_id, :session);";
          $params = array(':user_id' => $account['id'],
                          ':session' => $session);
          $result = exec_sql_query($db, $sql, $params);
          // if it is a valid login, set cookie_session in sessions table
          // else login failed , show error message
          if($result){
            setcookie("session", $session, time()+ COOKIE_DUR );
            $this_user = $account;
            return $this_user;
          }else{
            array_push($session_messages, "failed to set session");
          }
        }else{
          array_push($session_messages, "Password incorrect!");
        }
      }else{
        array_push($session_messages, "Not a valid username!");
      }
  }else{
    array_push($session_messages, "Not set username or password !");
  }
  $this_user = NULL;
  return NULL;
}

// get user record from users table by $user_id
function get_user($user_id) {
  global $db;
  $sql = "SELECT * FROM users WHERE id = :user;";
  $params = array(':user' => $user_id);
  $records = exec_sql_query($db, $sql, $params)->fetchAll();
  if ($records) {
    // user_id is unique, only one record;
    return $records[0];
  }
  return NULL;
}

// get session record from sessions table by $session
function get_session($session) {
  global $db;
  if (isset($session)) {
    $sql = "SELECT * FROM sessions WHERE session = :session;";
    $params = array(':session' => $session);
    $records = exec_sql_query($db, $sql, $params)->fetchAll();
    if ($records) {
      // sessions are unique, so there should only be 1 record
      return $records[0];
    }
  }
  return NULL;
}


function session_login() {
  global $db;
  global $this_user;
  if (isset($_COOKIE["session"])) {
    $session = $_COOKIE["session"];
    $session_record = get_session($session);
    if ( isset($session_record) ) {
      $this_user = get_user($session_record['user_id']);
      // renew the expire time in the sessions table
      setcookie("session", $session, time() + COOKIE_DUR);
      return $this_user;
    }
  }
  $this_user = NULL;
  return NULL;
}

// check if the user is logged in by checking $this_user
// if it is null the user is not logged in , else the user is logged in
function is_user_logged_in() {
  global $this_user;
  return ($this_user != NULL);
}

// log out, delete the session by setting the cookie time expire
function log_out() {
  global $this_user;
  setcookie('session', '', time() - COOKIE_DUR);
  $this_user = NULL;
}


// check if the login is valid
if ( isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']) ) {
  $username = trim($_POST['username']);
  $password = trim($_POST['password']);
  user_login($username, $password);
}
else {
  //if already login by checking the seesion
  session_login();
}

// check if should process log out
if ( isset($this_user) && ( isset($_GET['logout']) || isset($_POST['logout']) ) ) {
  log_out();
}

function add_tag($image_id, $input_tag){
  global $db;
  global $image_id;
  $exist_tag_records = exec_sql_query(
      $db,
      "SELECT * FROM tags WHERE name = :tag",
      array(':tag' => $input_tag)
      )->fetchAll();
  if(empty($exist_tag_records)){
      $new_tag_records = exec_sql_query(
          $db,
          "INSERT INTO tags (name) VALUES (:input_tag);",
          array(':input_tag' => $input_tag)
          )->fetchAll();
      $tag_id = $db->lastInsertId("id");
      $new_img_tag_records = exec_sql_query(
          $db,
          "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id);",
          array(':image_id' => $image_id,
                ':tag_id' => $tag_id)
          )->fetchAll();
  }
  else{
      $tag_id = exec_sql_query(
          $db,
          "SELECT id FROM tags WHERE name = :input_tag;",
          array(':input_tag' => $input_tag)
          )->fetchAll();
      $tag_id = $tag_id[0]['id'];
      $exist_img_tag_records = exec_sql_query(
          $db,
          "SELECT * FROM image_tags WHERE tag_id = :tag_id AND image_id = :image_id;",
          array(  ':tag_id' => $tag_id,
                  ':image_id' => $image_id)
          )->fetchAll();
      if(empty($exist_img_tag_records)){
          $new_img_tag_records = exec_sql_query(
              $db,
              "INSERT INTO image_tags (image_id, tag_id) VALUES (:image_id, :tag_id);",
              array(':image_id' => $image_id,
                    ':tag_id' => $tag_id)
              )->fetchAll();
      }
      else{
          array_push($message, "this tag already exist");
      }
  }
}
?>
