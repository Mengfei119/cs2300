<?php
	// DO NOT REMOVE!
	include("includes/init.php");
    // DO NOT REMOVE!
    $db = open_sqlite_db("secure/data.sqlite");
    $message = array();

    if(isset($_POST["search"])){
        $go_search = True;
        $artist = filter_var($_POST["artist_search"], FILTER_SANITIZE_STRING);
        $album = filter_var($_POST["album_search"], FILTER_SANITIZE_STRING);
        $sname = filter_var($_POST["sname_search"], FILTER_SANITIZE_STRING);
        $genre = filter_var($_POST["genre_search"], FILTER_SANITIZE_STRING);
        // $artist = trim($artist);
        // $album = trim($album);
        // $sname = trim($sname);
        // $genre = trim($genre);
        if($artist == null && $album == null && $sname == null && $genre == null)
        {
          $go_search = False;
        }
    }

    if(isset($_POST["add"])){
        $valid_insert = True;
        $artist1 = filter_var($_POST["artist_add"], FILTER_SANITIZE_STRING);
        $album1 = filter_var($_POST["album_add"], FILTER_SANITIZE_STRING);
        $sname1 = filter_var($_POST["sname_add"], FILTER_SANITIZE_STRING);
        $genre1 = filter_var($_POST["genre_add"], FILTER_SANITIZE_STRING);
        // $artist = trim($artist);
        // $album = trim($album);
        // $sname = trim($sname);
        // $genre = trim($genre);

        if($artist1 == null || $sname1 == null){
            $valid_insert = False;
        }


    if($valid_insert){
        $sql = "INSERT INTO data (sname, artist, album, genre) VALUES (:sname, :artist, :album, :genre)";
        $params = array(
            ':sname' => $sname1,
            ':artist' => $artist1,
            ':album' => $album1,
            ':genre' => $genre1
        );
        $result = exec_sql_query($db, $sql, $params);
        if($result){
            array_push($message, "Insert Success!");
        }else{
            array_push($message, "Insert Failed!");
        }
    }
    else{
        array_push($message, "You must insert both the name and the artist!");
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
function print_record($record) {?>
<tr>
	<td>
		<?php echo htmlspecialchars($record["sname"]);?>
	</td>
	<td>
		<?php echo htmlspecialchars($record["artist"]);?>
	</td>
	<td>
		<?php echo htmlspecialchars($record["album"]);?>
	</td>
	<td>
		<?php echo htmlspecialchars($record["genre"]);?>
	</td>
</tr>
<?php
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
    <!-- <?php if($valid_insert){echo "valid_insert";} else{echo "invalid_insert";}?> -->

	<body>
    <div class = "piano">
      <!-- Source: http://sistemaconhecer.com/gem-hp-files/uploads/links/f84f48ad4b94521af542f6b0e35d5e11.jpg-->
      <img src="/images/piano.jpg" alt />
      <?php print_message($message);?>
      <div class="left_forms">
      <div class="search">
      <p class="title">Search Records</p>
        <form class = "search" method="post" >
            <input type="text" name="sname_search" placeholder="Name" />
            <input type="text" name="artist_search" placeholder="Artist" />
            <input type="text" name="album_search" placeholder="Album" />
            <input type="text" name="genre_search" placeholder="Genre" />
            <input class="button" type="submit" name = "search" value="Search" />
        </form>
      </div>

      <div class="add">
      <p class="title">Insert Records</p>
        <form class = "add" method="post" >
            <input type="text" name="sname_add" placeholder="Name(required)" />
            <input type="text" name="artist_add" placeholder="Artist(required)" />
            <input type="text" name="album_add" placeholder="Album(optional)" />
            <input type="text" name="genre_add" placeholder="Genre(optional)" />
            <input class="button" type="submit" name = "add" value="Insert" />
        </form>
      </div>
      </div>

      <div class = "result">
         <?php if($go_search == True){
            ?>
            <div class="resultTitle"> Result of your search: </div>
            <?php
            // $sql = "SELECT * FROM data WHERE(sname LIKE '%' || :sname || '%')";
            $sql = "SELECT * FROM data WHERE(sname LIKE '%' || :sname || '%' AND artist LIKE '%' || :artist || '%' AND album LIKE '%' || :album || '%' AND genre LIKE '%' || :genre || '%')";
            $params = array(
                ':sname' => $sname,
                ':artist' => $artist,
                ':album' => $album,
                ':genre' => $genre
            );
            }else{
                ?>
                <div class="resultTitle">All Music Records</div>
                <?php
                $sql = "SELECT * FROM data";
                $params = array();
            }
            $result = exec_sql_query($db, $sql, $params);
            if($result){
                $records = $result->fetchAll();
                if ( count($records) > 0 ) {
                // display search records
                ?>
                <table>
                    <tr>
                    <th>Name</th>
                    <th>Artist</th>
                    <th>Album</th>
                    <th>Genre</th>
                    </tr>

                    <?php
                    foreach($records as $record) {
                    print_record($record);
                    }
                    ?>
                </table>
                <?php
                } else {
                // No results found
                echo "<p>No matching music found.</p>";
                }
            }
                ?>
      </div>
      <p id='source'> Source:
          <cite>
            <a href="http://sistemaconhecer.com/gem-hp-files/uploads/links/f84f48ad4b94521af542f6b0e35d5e11.jpg">
            Click to see the original image</a>
          </cite>
          <br>
        </p>
      </div>
      <?php include("includes/footer.php"); ?>
	</body>
	</html>
