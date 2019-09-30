<?php
include("includes/init.php");
include("includes/head.php");

if ( isset($_POST["submit"]) ) {
  $order_name = filter_input(INPUT_POST, "order_name", FILTER_SANITIZE_STRING);
  if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = NULL;
  }else{
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
  }
  $phone = filter_var(trim($_POST["phone_number"]),FILTER_SANITIZE_STRING);
  if(strlen($phone) > 10 ){
    $phone =  substr($phone, 0, 10);
  }

  $utensil = filter_input(INPUT_POST, "utensil", FILTER_SANITIZE_STRING);
  $date = filter_input(INPUT_POST, "date", FILTER_SANITIZE_STRING);
  $time = filter_input(INPUT_POST, "time", FILTER_SANITIZE_STRING);
  $order_details = filter_input(INPUT_POST, "order", FILTER_SANITIZE_STRING);
  $valid_order = false;
  if(strlen($order_details) > 2){
    $valid_order = true;
  }
  if($valid_order){
    $sql = "INSERT INTO orders (order_name, email, phone, time, date, utensil, order_details) VALUES (:order_name, :email, :phone, :time, :date, :utensil, :order_details);";
    $params = array(
      ":order_name" => $order_name,
      ":email" => $email,
      ":phone" => $phone,
      ":time" => $time,
      ":date" => $date,
      ":utensil" => $utensil,
      ":order_details" => $order_details
    );
    $result =  exec_sql_query($db, $sql, $params);
  }
}
?>
<body>


<div class="content">
 <?php include("includes/header.php"); ?>


 <div class = "order-img">
<<<<<<< HEAD
 <cite><a class="citation" href = "https://www.pexels.com/photo/plated-bread-on-brown-wooden-table-2128021/">Source: Ekrulila</a>
</cite>
  </div>
 </div>
=======
 <cite><a class="citation" href = "https://www.pexels.com/photo/plated-bread-on-brown-wooden-table-2128021/">Source: Ekrulila</a></cite>
  </div>
>>>>>>> a821b4bbd06730e17724b60b5af92d252986f47c

 </div>

</div class="catering_images">
  <h1> Catering Images </h1>
<!--Source: All images provided by the client, Temple of Zeus-->
        <?php
        $records = exec_sql_query(
          $db, "SELECT * FROM images;")->fetchAll();
        if (count($records) > 0) {
          echo '<div class = "overall_img_container">';
          foreach($records as $record){
            echo '<div class="img_container"><img src="uploads/'. $record["id"] . '.' . $record["image_extn"] . '" alt="' . htmlspecialchars($record["image_name"]) . '">';
            echo "<p><strong>Image Name: ".htmlspecialchars($record["image_name"]) . "</strong></p><p>".htmlspecialchars($record["image_desc"])."</strong></p></div>";
          }
          echo '</div>';
        }

            ?>
</div>
<div class ="content">
<div class="catering-menu">
        <h1> Catering Menu </h1>
        <p class = "delivery_fee"><strong> Please note: All deliveries will incur a $20 delivery fee </strong></p>
        <div class = 'written-menu'>
        <ul>
        <li><h2> Pastries </h2>
            <li> Croissants
            <li> Filled Croissants
            <li> Scones
            <li> Donuts
            <li> Muffins
            <li> Bagel
        </ul>
</div>

<div class = "prices">
        <ul>
        <li><h2> Prices (per pastry) </h2>
            <li> $2.70
            <li> $2.95
            <li> $2.70
            <li> $1.25
            <li> $1.50
            <li> $2.00
        </ul>
</div>

<div class = "written-menu">
    <ul>
    <li><h2> Sandwiches </h2>
            <li> The Piggery Ham
            <li> American Black Angus Roast Beef
            <li> Brined and Roasted Turkey Breakfast
            <li> Skipjack Tuna Salad
            <li> Susie's Sietan with Choklay's Hummus
            <li> Zeus Special "BLTease"
            <li> Nyima's Famous Egg Salad
            <li> Just the Vegetables
            <li> Cheese Salad
    </ul>
</div>

<div class = "prices">
        <ul>
        <li> <h2> Small </h2>
            <li> $5.75
            <li> $5.75
            <li> $5.75
            <li> $5.25
            <li> $5.25
            <li> $5.75
            <li> $5.25
            <li> $4.00
            <li> $4.75
        </ul>
</div>

<div class = "prices">
        <ul>
       <li> <h2> Large </h2>
            <li> $6.75
            <li> $6.75
            <li> $6.75
            <li> $6.25
            <li> $6.25
            <li> $6.75
            <li> $6.25
            <li> $5.25
            <li> $6.00
        </ul>
</div>
        </div>


      <div class="centered-text-box">
        <div class = "catering-form">
              <form action="catering.php" method = "post" enctype="multipart/form-data">
                    <h1> Catering Order </h1>
                    <!-- should be updated later -->
                    <input type = "text" name="order_name" placeholder="Name for the order"><br>
                    <input type = "email" name="email" placeholder="Email"><br>
                    <input type = "text" name="phone_number" placeholder="Phone"><br>
                    <label> Date and time order needs to be ready by: </label>
                    <input type="date" name="date"><br>
                    <input type="time" name="time"><br>
                    <textarea name= "utensil" cols = "20" rows= "5" placeholder="Tells about the utensils and other items you'll need for your order."></textarea><br>
                    <textarea name="order" cols="20" rows="6" placeholder="The order + anything else"></textarea><br>
                    <button name="submit" type="submit" >Order</button>
              </form>
      </div>
    </div>
</div>
    <?php include("includes/footer.php"); ?>
</body>

</html>
