<?php
include("includes/init.php");

// open connection to database
// TODO: create $db variable by opening the database.
$db = open_sqlite_db("secure/shoes.sqlite");

function print_record($record) {
  ?>
  <tr>
    <td><?php echo htmlspecialchars($record["reviewer"]);?></td>
    <td><?php echo htmlspecialchars($record["rating"]);?></td>
    <td><?php echo htmlspecialchars($record["product_name"]);?></td>
    <td><?php echo htmlspecialchars($record["comment"]);?></td>

    <!-- TODO rating, product_name, comment -->

  </tr>
  <?php
}
?>  
<!DOCTYPE html>
<html>

<?php include('includes/head.php'); ?>

<body>
  <?php include("includes/header.php"); ?>

  <div id="content-wrap">
    <h1>2300 Shoe Review</h1>

    <p>Welcome to the 2300 Shoe Review!</p>

    <!-- TODO: execute SQL query -->
    <?php
    $sql = "SELECT * FROM reviews";
    $params = array();
    $result = exec_sql_query($db, $sql, $params);

    ?>

    <table>
      <tr>
        <th>Reviewer</th>
        <th>Rating</th>
        <th>Product</th>
        <th>Comments</th>
      </tr>

      <!-- TODO: add rows to table. Hint: call print_record() -->
     <?php $records = $result->fetchAll();
        foreach($records as $record) {
        print_record($record);
      }
     ?>

    </table>

  </div>

  <?php include("includes/footer.php"); ?>
</body>

</html>
