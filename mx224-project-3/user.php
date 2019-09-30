<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");
$messages = array();
const MAX_SIZE = 1000000;
if ( isset($_POST["upload_sub"]) && is_user_logged_in() ) {
  $upload_info = $_FILES["upload_file"];
  $file_desc = filter_input(INPUT_POST, "description", FILTER_SANITIZE_STRING);
  $initial_tag = filter_input(INPUT_POST, "initial_tag", FILTER_SANITIZE_STRING);
  $file_source = filter_input(INPUT_POST, "source", FILTER_SANITIZE_STRING);

  if($_FILES['upload_file']['error'] == UPLOAD_ERR_OK){
    $filename = basename($upload_info["name"]);
    $extension= strtolower( pathinfo($filename, PATHINFO_EXTENSION) );
    $sql = "INSERT INTO images (user_id, image_name, image_ext, description, source) VALUES (:user_id, :filename, :extension, :description, :source);";
    $params = array(
      ":user_id" => $this_user['id'],
      ":filename" => $filename,
      ":extension" => $extension,
      ":description" => $file_desc,
      ":source" => $file_source,
    );
    $result =  exec_sql_query($db, $sql, $params);
    if($result){
      $file_id = $db->lastInsertId("id");
      $new_path = "uploads/images/"."$file_id"."."."$extension";
      if(move_uploaded_file( $_FILES["upload_file"]["tmp_name"], $new_path )){
        array_push($message, "success upload in db");
        if($initial_tag != NULL){
          $records = exec_sql_query(
            $db,
            "INSERT INTO tags (name) VALUES (:initial_tag);",
            array(":initial_tag" => $initial_tag,)
            )->fetchAll();
          $tag_id = $db->lastInsertId("id");
          $records = exec_sql_query(
            $db,
            "INSERT INTO image_tags (image_id, tag_id) VALUES (:file_id, :tag_id);",
            array(":file_id" => $file_id,
                  ":tag_id" => $tag_id,)
            )->fetchAll();
        }
      }
      else{
        array_push($message, "database failed");
      }
    }
    else{
      array_push($message, "upload failed");
    }
  }
}

function print_images($images) {
  echo '<a href="user.php?' . http_build_query( array( 'id' => $images['id'] ) ) . '"><img src="uploads/images/' . $images['id'] . '.jpg" alt="' . htmlspecialchars($images['name']) . '"/></a>';
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title>Home</title>
</head>

<body>
  <?php include("includes/header.php"); ?>
  <div class = "user_page">
    <?php
      if( is_user_logged_in() ){?>
        <div class="upload">
          <div class="upload_form">
              <form action="user.php" method = "post" enctype="multipart/form-data">
                    <p> Upload a File </p>
                    <input type = "file" name="upload_file"><br>
                    <input type = "text" name="initial_tag" placeholder="tag name"><br>
                    <input type = "text" name="source" placeholder="original address"><br>
                    <textarea name="description" cols="20" rows="6" placeholder="input your description"></textarea><br>
                    <button name="upload_sub" type="submit" class="button button2">Upload Image</button>
                    <input type="hidden" name="MAZ_SIZE" value="<?php echo MAX_SIZE; ?>"/>
              </form>
            </div>
          </div>
    <h2>Your Files</h2>

      <div class="saved_img">
        <?php
        $records = exec_sql_query(
          $db,
          "SELECT * FROM images WHERE user_id = :user_id;",
          array(':user_id' => $this_user['id'])
          )->fetchAll();

        if (count($records) > 0) {
          foreach($records as $record){
            echo '<a href="detail.php?' . http_build_query( array( 'image_id' => $record['id'] ) ) . '"><img src="uploads/images/' . $record['id'] . '.jpg" alt="' . htmlspecialchars($record['name']) . '"/></a>';
          }
        } else {
          echo '<p><strong>No image is uploaded. Try upload your original works!</strong></p>';
        }
        ?>
      </div>
      <?php }
    else{?>
      <div class="login">
        <div class="login_form">
          <p> Log Into Photo Gallary</p>
          <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
          <input type="text" name="username" placeholder="Username" /><br>
          <input type="password" name="password" placeholder="Password" /><br>
          <input class="button" type="submit" name="login" value="Login" />
        </form>
        </div>
      </div>
    <?php } ?>
  </div>

  <?php include("includes/footer.php"); ?>
</body>
</html>
