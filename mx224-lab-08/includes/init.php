<?php
include("includes/init.php");
// declare the current location, utilized in header.php
$current_page_id="box";
// Set maximum file size for uploaded files.
// MAX_FILE_SIZE must be set to bytes
// 1 MB = 1000000 bytes
const MAX_FILE_SIZE = 1000000;
const BOX_UPLOADS_PATH = "uploads/documents/";
if (isset($_POST["submit_upload"])) {
  $upload_info = $_FILES["box_file"];
  $upload_desc = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
  if ($upload_info['error'] == UPLOAD_ERR_OK) {
    $upload_name = basename($upload_info["name"]);
    $upload_ext = strtolower(pathinfo($upload_name, PATHINFO_EXTENSION) );
    $sql = "INSERT INTO documents (file_name, file_ext, description) VALUES (:filename, :extension, :description)";
    $params = array(
      ':extension' => $upload_ext,
      ':filename' => $upload_name,
      ':description' => $upload_desc,
    );
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      $file_id = $db->lastInsertId("id");
      if (move_uploaded_file($upload_info["tmp_name"], BOX_UPLOADS_PATH . "$file_id.$upload_ext")){
        array_push($messages, "Your file has been uploaded.");
      }
    } else {
      array_push($messages, "Failed to upload file.");
    }
  } else {
    array_push($messages, "Failed to upload file.");
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />

  <title><?php echo $pages[$current_page_id] . " - " . $title; ?></title>
</head>

<body>
  <?php include("includes/header.php");?>

  <div id="content-wrap">
    <h1>2300 Plop Box</h1>

    <p>Welcome to the 2300 Plop Box, a file storing service!</p>

    <?php
    print_messages();
    ?>

    <h2>Upload a File to 2300 Plop Box</h2>

    <form id="uploadFile" action="box.php" method="post" enctype="multipart/form-data">
      <ul>
        <li>
          <label>Upload File:</label>
          <!-- MAX_FILE_SIZE must precede the file input field -->
          <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
          <input type="file" name="box_file" required>
        </li>
        <li>
          <label>Description:</label>
        </li>
        <li>
          <textarea name="description" cols="40" rows="5"></textarea>
        </li>
        <li>
          <button name="submit_upload" type="submit">Upload</button>
        </li>
      </ul>
    </form>

    <h2>Saved Files</h2>
    <ul>
      <?php
      $records = exec_sql_query($db, "SELECT * FROM documents")->fetchAll(PDO::FETCH_ASSOC);
      foreach($records as $record){
        echo "<li><a href=\"" . BOX_UPLOADS_PATH . $record["id"] . "." . $record["file_ext"] . "\">".$record["file_name"]."</a> - " . $record["description"] . "</li>";
      }
      ?>
    </ul>
  </div>

  <?php include("includes/footer.php");?>
</body>

</html>
