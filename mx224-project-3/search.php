<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");
$message = array();


if(isset($_POST["search"])){
  $go_search = True;
  $image_name = filter_var($_POST["name_search"], FILTER_SANITIZE_STRING);
  $user_name = filter_var($_POST["user_search"], FILTER_SANITIZE_STRING);
  $tag_name = filter_var($_POST["tag_search"], FILTER_SANITIZE_STRING);
  // $image_tag = filter_var($_POST["tag_search"], FILTER_SANITIZE_STRING);
  // echo "image_name:".$image_name."<br>";
  // echo "user_name:".$user_name."<br>";
  // echo "tag_name:".$tag_name."<br>";
  if($image_name == null && $user_name == null && $tag_name == null)
  {
    $go_search = False;
  }
}
?>

<?php
function print_message($message) {
foreach ($message as $message1) {
echo "<p><strong>" . htmlspecialchars($message1) . "</strong></p>\n";
}
}
?>
<?php
function print_record($record, $go_search) {
  global $db;
  if($go_search){
    global $image;
    $image = exec_sql_query(
      $db,
      // "SELECT * FROM images WHERE id = 2",
      "SELECT * FROM images WHERE id = :record",
      array(':record' => $record[0]['id'])
      )->fetchAll();
    echo '<a href="detail.php?' . http_build_query( array( 'image_id' => $image[0]['id'] ) ) . '"><img src="uploads/images/' . $image[0]['id'] .'.'.$image[0]['image_ext'].'" alt="' . htmlspecialchars($image[0]['image_name']) . '"/></a>';
  }else{
    echo '<a href="detail.php?' . http_build_query( array( 'image_id' => $record['id'] ) ) . '"><img src="uploads/images/' . $record['id'] . '.jpg" alt="' . htmlspecialchars($record['image_name']) . '"/></a>';
  }
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
  <div class="search">
      <p class="title">Search Images</p>
      <form class = "search_form" method="post" >
          <input type="text" name="name_search" placeholder="Image Name" />
          <input type="text" name="user_search" placeholder="Upload User Name" />
          <input type="text" name="tag_search" placeholder="Tag" />
          <!-- <input type="text" name="genre_search" placeholder="Descrption" /> -->
          <input class="button" type="submit" name = "search" value="Search" />
      </form>
  </div>
  <div class="search_img">
  <?php
  if($go_search == True){
    // $images = "SELECT * FROM images WHERE(image_name LIKE '%' || :image_name || '%')";
    $sql = "SELECT DISTINCT images.id FROM images INNER JOIN users ON (images.user_id = users.id) INNER JOIN image_tags ON (images.id = image_tags.image_id) INNER JOIN tags ON (image_tags.tag_id = tags.id) WHERE (images.image_name LIKE '%' || :image_name || '%' AND users.username LIKE '%' || :user_name || '%' AND tags.name LIKE '%' || :tag_name || '%')";
    $params = array(
        ':image_name' => $image_name,
        ':user_name' => $user_name,
        ':tag_name' => $tag_name
    );
  }else{
    $sql = "SELECT * FROM images;";
    $params = array();
  }
  $result = exec_sql_query($db, $sql, $params);
  if($result){
    $records = $result->fetchAll();
    if(count($records) > 0){
      foreach($records as $record) {
      print_record($record, $go_search);
      }
    }else{
      echo "<p>No matching Image found.</p>";
    }
  }?>
  </div>
  <?php include("includes/footer.php"); ?>
</body>
</html>
