<?php
include("includes/init.php");
$image_id = NULL;
global $this_user;

function delete_tag($image_id, $delete_tag_name){
    global $db;
    global $image_id;
    $exist_tag_records = exec_sql_query(
        $db,
        "SELECT id FROM tags WHERE name = :tag;",
        array(':tag' => $delete_tag_name)
        )->fetchAll();
    $exist_tag_records = $exist_tag_records[0]['id'];
    $sql= exec_sql_query(
        $db,
        "DELETE FROM image_tags WHERE image_id= :image_id AND tag_id = :exist_tag_records;",
        array(':image_id' => $image_id,
              ':exist_tag_records' => $exist_tag_records)
        )->fetchAll();
}

function delete_image($image_id){
    global $db;

    //delete from uploads directory
    $records = exec_sql_query(
        $db,
        "SELECT * FROM images WHERE id = :image_id",
        array(':image_id' => $image_id)
        )->fetchAll();
    $image_ext = $records[0]['image_ext'];
    $image_name = $image_id.".".$image_ext;
    echo $image_name;
    unlink("uploads/images/$image_name");
    //delete from images table
    $sql = exec_sql_query(
        $db,
        "DELETE FROM images WHERE id = :image_id",
        array(':image_id' => $image_id)
        )->fetchAll();
    //delete from image_tags table
    $sql = exec_sql_query(
        $db,
        "DELETE FROM image_tags WHERE image_id = :image_id",
        array(':image_id' => $image_id)
        )->fetchAll();
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

<div class = "detail">
    <?php
    if(isset($_GET['image_id'])){
        $image_id = $_GET['image_id'];
        $image_records = exec_sql_query(
            $db,
            "SELECT *FROM images WHERE images.id = :image_id;",
            array(':image_id' => $image_id)
            )->fetchAll();
        $image_name = $image_records[0]['image_name'];
        $image_ext = $image_records[0]['image_ext'];
        $image_author =  $image_records[0]['user_id'];
        $image_source = $image_records[0]['source'];
        $image_des = $image_records[0]['description'];
        $user_records = exec_sql_query(
            $db,
            "SELECT *FROM users WHERE id = :image_author;",
            array(':image_author' => $image_author)
            )->fetchAll();
        $user_name = $user_records[0]['username'];
        echo "<div class = 'detail_tag'>";
        echo "<h2> Image: ". $image_name. "</h2>";
        echo '<img src="uploads/images/' . $image_id . '.'. $image_ext.'" alt="'.'"/>';
        echo "<br>";
        if($image_source != NULL){
            echo "Source : <cite> <a href =' ".$image_source. "'>original image</a></cite><br>";
        }else{
            echo "Original work of the upload user.";
        }
        echo "Upload by : ".$user_name. "<br>";
        echo "Description : ".$image_des. "<br>";

        $tag_records = exec_sql_query(
            $db,
            "SELECT tags.id, tags.name FROM tags INNER JOIN image_tags ON tags.id = image_tags.tag_id INNER JOIN images ON images.id = image_tags.image_id WHERE images.id = :image_id;",
            array(':image_id' => $image_id)
            )->fetchAll();
        if(isset($tag_records) and !empty($tag_records))
        {
            echo "<h2> Tags for This Image: </h2>";
            foreach($tag_records as $record){
                echo "<a href = 'detail.php?tag_id=" . $record['id'] . "'>".$record['name']."</a>";
                echo "  ";
            }
        }
        echo "</div>";
        ?>
        <div class = "tag_form">
           <h2>Add Tags:</h2>
           <form class = "add" method="post" >
               <input type="text" name="input_tag" placeholder="Tag Name" />
               <input class="button" type="submit" name = "add_tag" value="Add" />
           </form>
       </div>
        <?php
        if(isset($_POST['add_tag'])){
           $input_tag =  strtolower(filter_input(INPUT_POST, 'input_tag', FILTER_SANITIZE_STRING));
           //add new tag into db
           add_tag($image_id, $input_tag);
           echo "<meta http-equiv='refresh' content='0'>";
        }
        if( is_user_logged_in() ){
            global $db;
            // global $image_id;
            $image_author = $image_author[0]['user_id'];
            if($this_user['id'] == $image_author){?>
                <div class = "edit_form">
                    <h2> Edit Your Upload: </h2>
                    <p>Delete This Image</p>
                    <form class = "delete" method="post" >
                    <input class="button" type="submit" name = "delete_image" value="Delete This Image" />
                    </form>
                    <p>Delete Tags for This Image</p>
                    <form class = "delete" method="post" >
                    <select name="tag_select">
                    <?php
                      if (isset($tag_records) and !empty($tag_records)) {
                        foreach ($tag_records as $record) {
                          echo "<option value='" . $record['name'] . "'>" . $record['name'] . "<br>";
                        }
                      };
                    ?>
                  </select>
                        <input class="button" type="submit" name = "delete_tag" value="Delete This Tag" />
                    </form>
                </div>
             <?php
            if(isset($_POST['delete_tag'])){
            $delete_tag =  strtolower(filter_input(INPUT_POST, 'tag_select', FILTER_SANITIZE_STRING));
            echo $delete_tag;
            //delete current tag for this image in db
            delete_tag($image_id, $delete_tag);
            echo "<meta http-equiv='refresh' content='0'>";
            }

            if(isset($_POST['delete_image'])){
                //delete current image in db
                delete_image($image_id);
                echo "<meta http-equiv='refresh' content='0'>";
                }

            }
         }
    }

    else if(isset($_GET['tag_id'])){
        $tag_id = $_GET['tag_id'];

        $tag_records = exec_sql_query(
            $db,
            "SELECT *FROM tags WHERE tags.id = :tag_id;",
            array(':tag_id' => $tag_id)
            )->fetchAll();

        echo "<h2> Tag: ". $tag_records[0]['name']. "</h2>";
        $image_records = exec_sql_query(
            $db,
            "SELECT image_tags.image_id, images.image_name, images.image_ext FROM images INNER JOIN image_tags ON images.id = image_tags.image_id INNER JOIN tags ON tags.id = image_tags.tag_id  WHERE tags.id = :tag_id;",
            array(':tag_id' => $tag_id)
            )->fetchAll();
            if(isset($image_records) and !empty($image_records))
            {
                echo "<h2> Images for This Tag</h2>";
                foreach($image_records as $record){
                    echo "<a href = 'detail.php?image_id=" . $record['image_id'] . "'><img src='uploads/images/".$record['image_id']."." . $record['image_ext']."' "."  alt=''></a>";
                }
            }
        }
    ?>
</div>

<div class="blank">
<?php include("includes/footer.php"); ?>
</div>
</body>
</html>
