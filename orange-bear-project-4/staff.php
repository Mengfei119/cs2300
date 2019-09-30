<?php
include("includes/init.php");
include("includes/head.php");
const MAX_FILE_SIZE = 4000000;
if ( isset($_POST["submit_change_soup"]) && is_user_logged_in()) {
    $soup_name_tc = filter_input(INPUT_POST, "soup_name", FILTER_SANITIZE_STRING);
    $soup_day_tc = filter_input(INPUT_POST, 'soup_day', FILTER_SANITIZE_STRING);
    $soup_des = filter_input(INPUT_POST, "soup_des", FILTER_SANITIZE_STRING);
    $sql = "UPDATE soups SET soup_name = '".$soup_name_tc."', soup_desc = '".$soup_des."' WHERE soup_day = '".$soup_day_tc."';";

   $params = array(
    );

    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      echo('<p>All Done!</p>');
    }
    else{
      echo('<p>Something Broke!</p>');
    }
  }
  if ( isset($_POST["submit_upload_images"]) && is_user_logged_in() ) {
    echo "<pre>";
    print_r($_FILES);
    echo "</pre>";
    $image_info = $_FILES["image_file"];
    $upload_desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $image_name = filter_input(INPUT_POST, 'image_name', FILTER_SANITIZE_STRING);

    if ( $image_info['error'] == UPLOAD_ERR_OK ) {

      $image_extn = strtolower( pathinfo($image_info["name"], PATHINFO_EXTENSION));
      echo($image_extn);

      $sql = "INSERT INTO images (image_name, image_extn, image_desc) VALUES (:image_name, :extension, :description)";

      $params = array(
        ':image_name' => $image_name,
        ':extension' => $image_extn,
        ':description' => $upload_desc
      );
      $result = exec_sql_query($db, $sql, $params);
      if ($result) {
        $image_id = $db->lastInsertId("id");
        $id_imgname = 'uploads/' . $image_id . '.' . $image_extn;
        move_uploaded_file($image_info["tmp_name"], $id_imgname );
  }
}
  }



  if ( isset( $_POST[ "submit_delete_image" ] ) && is_user_logged_in() && isset( $_POST[ "image" ] ) ) {
    $to_delete      = filter_input( INPUT_POST, 'image', FILTER_SANITIZE_STRING );
    $image_sql      = "SELECT * FROM images WHERE (image_name = :image_name);";
    $delete_sql     = "DELETE FROM images WHERE (image_name = :image_name);";
    $params         = array(
        ':image_name' => $to_delete
    );
    $image_records  = exec_sql_query( $db, $image_sql, $params )->fetchAll();
    $image_id       = $image_records[ 0 ][ 'id' ];
    $image_extn     = $image_records[ 0 ][ 'image_extn' ];
    $image_location = 'uploads/' . $image_id . '.' . $image_extn;
    unlink( $image_location );
    $result = exec_sql_query( $db, $delete_sql, $params );
  }



$soup_columns = ["soup_day", "soup_name", "soup_desc"];
$order_columns = ["order_name", "email", "phone", "date", "time", "utensil", "order_details"];

$table_columns = ["Day of the Week", "Soup Name", "Description"];
$order_heads = ["Name", "Email", "Phone", "Date", "Pick Up Time", "Utensils needed", "Order Details"];

// Based off of the functions originally created by Kyle Harms and used and Lab 5/6, adapted to use a "columns" input.
function print_record_to_table($record, $columns) {
  ?>
  <tr>
    <?php foreach($columns as $column) {
      echo("<td>".htmlspecialchars($record["$column"])."</td>");
      }?>
  </tr>
  <?php
}


// Function #2
function create_table($table_columns) {
  ?>
  <tr>
    <?php foreach($table_columns as $column) {
      echo("<th>".$column."</th>");
    } ?>
    </tr>
  <?php
}
// Function #3
function populate_table($records, $columns) {
  foreach($records as $record) {
            print_record_to_table($record, $columns);
          }
}?>

<body>
<div class="content">
 <?php include("includes/header.php"); ?>
 <?php
      if( is_user_logged_in() ){?>


<div class = "soups">
      <h2>Soups</h2>

      <?php
      $sql = "SELECT * FROM soups";
      $params = array();


    $result = exec_sql_query($db, $sql, $params);

    if ($result) {
      $records = $result->fetchAll();
      if ( count($records) > 0 ) {
        ?>
        <table>
      <?php
          create_table($table_columns);
          populate_table($records, $soup_columns);
          ?>
        </table>
  </div>

        <?php
      } }?>

<div class = "orders-placed">
      <h2>All the Orders</h2>

      <?php
      $sql = "SELECT * FROM orders";
      $params = array();
      $result = exec_sql_query($db, $sql, $params);

    if ($result) {
      $records = $result->fetchAll();
      if ( count($records) > 0 ) {
        // echo count($records);
        ?>
        <table>
      <?php
          create_table($order_heads);
          populate_table($records, $order_columns);
          ?>
        </table>
        <?php
      }}else {
        echo '<p><strong> No order right now! </strong></p>';
      }
      ?>
      </div>

      <div class = "change-soups">
          <h2> Change soups</h2>
          <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
            <select name="soup_day" >
                <option value="" selected disabled>Choose the day of week</option>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select><br>
            <input class ="soup_name" type="text" name="soup_name" placeholder="Soup name" /><br>
            <textarea class ="staff_textarea" name="soup_des" cols="20" rows="6" placeholder="Description of the soup" ></textarea><br>
            <button name="submit_change_soup" type="submit">change</button>
        </form>
    </div>

    <div class = "form_container">
          <h2> Upload Images </h2>
          <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post" enctype="multipart/form-data">
          <div class="field">
          <p><label for="image_file">Upload File (required):</label></p>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE;?>" />
            <input id="image_file" type="file" name="image_file">
    </div>

    <div class="field">
            <p><label for="image_name">Image Name:</label></p>
            <input class ="image_name" type="text" name="image_name" placeholder="Image Name" /><br>
    </div>

    <div class="field">
            <p><label for="img_desc">Description (optional):</label></p>
            <textarea id="img_desc" name="description" cols="20" rows="5"></textarea>
    </div>
            <button name="submit_upload_images" type="submit">Upload</button>
        </form>
    </div>

    <div class="form_container">
               <h2>Delete An Image</h2>
               <form id="deleteImage" action="staff.php" method="post" enctype="multipart/form-data">
               <div class=field>
                  <select name="image">
                     <option value="" selected disabled>Image</option>
                     <?php
                        $image_records = exec_sql_query( $db, "SELECT * FROM images;", array())->fetchAll();
                        foreach ( $image_records as $record ) {
                        ?>
                     <option value="<?php
                        echo $record[ 'image_name' ];
                        ?>"><?php
                        echo $record[ 'image_name' ];
                        ?></option>
                     <?php
                        }
                        ?>
                  </select>
                    </div>
                  <p><button name="submit_delete_image" type="submit">Delete</button></p>
               </form>
            </div>




    <?php }
    else{ ?>
    <div class="centered-text-box">
      <div>
          <h1> Staff Log In </h1>
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
