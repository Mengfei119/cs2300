<?php
include("includes/init.php");
include("includes/head.php");
?>

<body>

<div class='content'>
 <?php include("includes/header.php"); ?>

 <div class = 'menu'>
    <cite><a class="citation" href = "https://www.pexels.com/photo/brown-ceramic-bowl-with-brown-soup-724667/">Source: Valeria Boltneva</a></cite>
 </div>

 <h1> Menu </h1>

 <div class = "soup-of-the-day">
  <?php
  date_default_timezone_set("America/New_York");
  $dayofweek = date('l', strtotime(date('l')));

  $sql = "SELECT soup_name, soup_desc FROM soups WHERE soup_day = :dayofweek;";
  $params = array(':dayofweek' => $dayofweek);
  $records = exec_sql_query($db, $sql, $params)->fetchAll();
  if ($records) {
    // user_id is unique, only one record;
     $soup_of_the_day = $records[0][0];
     $soup_desc = $records[0][1];
  } else {
    $soup_of_the_day = "NULL";
  }
  echo("<p> &mdash; Soup of the Day: ".$soup_of_the_day. "-- ". $soup_desc." &mdash; </p>"); ?>
</div>

 <div class = 'written-menu'>
        <ul>
        <li> <h2> Coffee </h2>
            <li> Drip Coffee
            <li> Japanese Method Iced Coffee
            <li> Espresso
            <li> Caffe Americano
            <li> Caffe Macchiato/Cortado
            <li> Cappuccino
            <li> Caffe Latte
            <li> Caffe Mocha
            <li> Choklay's Chai
            <li> Hot Chocolate
            <li> Steamer (Flavor of your choice)

            <br>

            <li> Extra Espresso Shot
            <li> Whipped Cream
            <li> Homemade Flavored Syrups
            <li> Bring Your Own Mug
        </ul>
    </div>

        <div class = "prices">
            <ul>
            <li> <h2> 8 0z </h2>

                <li> $1.75
                <li> -
                <li> $2.45
                <li> $2.45
                <li> $3.00
                <li> $3.75
                <li> $3.75
                <li> $4.30
                <li> $4.00
                <li> $4.00
                <li> $3.50
                <br>

                <li> +$1.50
                <li> +$0.70
                <li> +$0.70
                <li> -$0.25

            </ul>
        </div>

        <div class = "prices">
        <ul>
        <li> <h2> 12 0z </h2>

                <li> $2.25
                <li> -
                <li> -
                <li> $2.45
                <li> -
                <li> -
                <li> $4.00
                <li> $4.50
                <li> $4.30
                <li> $4.00
                <li> $3.75
                <br>

                <li> +$1.50
                <li> +$0.70
                <li> +$0.70
                <li> -$0.25
            </ul>
        </div>


        <div class = "prices">
        <ul>
        <li> <h2> 16 0z </h2>

                <li> $2.45
                <li> $3.00
                <li> -
                <li> -
                <li> -
                <li> -
                <li> $4.50
                <li> $5.00
                <li> $4.75
                <li> $4.75
                <li> $4.00
                <br>

                <li> +$1.50
                <li> +$0.70
                <li> +$0.70
                <li> -$0.25
            </ul>
        </div>
</div>

<div class = 'written-menu'>
        <ul>
        <li> <h2> Pastries </h2>
            <li> Croissants
            <li> Filled Croissants
            <li> Scones
            <li> Donuts
            <li> Muffins
            <li> Toasted Bagel
        </ul>
</div>

<div class = "prices">
        <ul>
        <li> <h2> Prices </h2>
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
    <li> <h2> Zeus Specials </h2>
            <li> Overnight Museli
            <li> Med-Boiled Eggs
            <li> Assorted Yogurt
    </ul>
</div>

<div class = "prices">
        <ul>
        <li> <h2> Prices </h2>
            <li> $2.00
            <li> $1.00
            <li> $2.00
        </ul>
</div>

<div class = "written-menu">

        <ul>
        <li> <h2> Breakfast Sandwiches </h2>
            <li> Egg & Cheese on an English Muffin
            <li> Egg, Cheese, & Bacon on an English Muffin

        </ul>
</div>

<div class = "prices">
        <ul>
        <li> <h2> Prices </h2>
            <li> $4.00
            <li> $5.00
        </ul>
</div>

<div class = "written-menu">
    <ul>
    <li>  <h2> Sandwiches </h2>
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
        <li> <h2> Small</h2>
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


 <?php include("includes/footer.php"); ?>
</body>

</html>
