<?php
 // INCLUDE ON EVERY TOP-LEVEL PAGE!
include("includes/init.php");
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
  <div class = "gallery">
    <?php
    $records = exec_sql_query(
      $db,
      "SELECT * FROM tags;",
      array()
      )->fetchAll();
    echo "<div class='tags'>";
    echo "<p>View Tags</p>";
    if (count($records) > 0) {
      foreach($records as $record){
        echo " <a class = 'detail_tags' href = 'detail.php?tag_id=" . $record['id'] . "'>".$record['name']."</a>";
        echo " ";
        echo "&nbsp;";
      }
    } else {
      echo '<p><strong>No image in database.</strong></p>';
    }
    $records = exec_sql_query(
      $db,
      "SELECT * FROM images;",
      array()
      )->fetchAll();
      echo "</div>";
    if (count($records) > 0) {
      foreach($records as $record){
        echo '<a href="detail.php?' . http_build_query( array( 'image_id' => $record['id'] ) ) . '"><img src="uploads/images/' . $record['id'] . '.jpg" alt="' . htmlspecialchars($record['name']) . '"/></a>';
      }
    } else {
      echo '<p><strong>No image in database.</strong></p>';
    }
    ?>
  </div>


  <?php include("includes/footer.php"); ?>
</body>
</html>
