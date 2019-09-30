<?php
include("includes/init.php");

$title = 'Flower Shop';
// Was the form submitted?
if (isset($_POST['submit'])) {
  // TODO: Assume the order is valid
  $valid_order1 = TRUE;
  $valid_order2 = TRUE;
  $order_name = $_POST['order_name'];
  $numSubmit = "form_error hidden";
  $nameSubmit = "form_error hidden";
  if($order_name == ""){
    $valid_order1 = False;
    $nameSubmit = "form_error";
  }
  else{
    $valid_order1 = True;
    $nameSubmit = "form_error hidden";
  }
  // Name is required.
  // TODO: Check if name is not the empty string ('')

  // Convert stems to integers so we can do math
  $roses = filter_input(INPUT_POST, 'roses', FILTER_VALIDATE_INT);
  $daisies = filter_input(INPUT_POST, 'daisies', FILTER_VALIDATE_INT);
  $gardenias = filter_input(INPUT_POST, 'gardenias', FILTER_VALIDATE_INT);
  // Check that a minimum of 3 stems was ordered.
  // TODO: Check the minimum number of stems.
  if(($roses + $daisies + $gardenias) < 3){
    $valid_order2 = False;
    $numSubmit = "form_error";
  }else{
    $valid_order2 = True;
    $numSubmit = "form_error hidden";
  }
} else {
  // Form was not submitted.
  $nameSubmit = "form_error hidden";
  $numSubmit = "form_error hidden";
  $valid_order1 = False;
  $valid_order2 = False;
  // Set default number of stems of an order.
  $roses = 0;
  $daisies = 0;
  $gardenias = 0;
  $name = "";
}
// echo $nameSubmit.$numSubmit.$valid_order1.$valid_order2;
?>
<!DOCTYPE html>
<html>

<?php include('includes/head.php'); ?>

<body>
  <?php include("includes/header.php");?>

  <div id="content-wrap">
    <article id="content">

      <h1 id="article-title">2300 Flower Shop</h1>
      <p>Welcome to the 2300 Flower Shop!</p>

      <?php
      if ( isset($valid_order1) && isset($valid_order2) && $valid_order1 && $valid_order2 ) { ?>
        <!-- TODO: order confirmation page. -->
        <h2> Order For <?php echo htmlspecialchars($order_name) ?> </h2>
        <ul>
          <li> Roses <?php echo $roses ?> </li>
          <li> Daisies <?php echo $daisies ?> </li>
          <li> Gardenias <?php echo $gardenias?> </li>
        </ul>

      <?php } else { ?>

        <h2>Order Form</h2>
        <p>Each stem is $3. Minimum order is 3 stems.</p>

        <form id="flower_order" method="post" action="flowershop.php">
          <fieldset>
            <legend>Flower Stem Order Form</legend>

            <p class=<?php echo $nameSubmit;?>>Please provide a name for your order.</p>
            <p>
              <label for="name_field">Name on Order:</label>
              <input id="name_field" type="text" name="order_name" value="<?php echo htmlspecialchars($order_name); ?>"/>
            </p>

            <ul>
            <p class=<?php echo $numSubmit;?>>You must order a minimum of 3 stems.</p>
              <li class="order">
                <label for="roses_input">Roses:</label>
                <input type="number" id="roses_input" name="roses" min="0" value="<?php echo $roses; ?>"/>
              </li>
              <li class="order">
                <label for="daisies_input">Daisies:</label>
                <input type="number" id="daisies_input" name="daisies" min="0" value="<?php echo $daisies; ?>"/>
              </li>
              <li class="order">
                <label for="gardenias_input">Gardenias:</label>
                <input type="number" id="gardenias_input" name="gardenias" min="0" value="<?php echo $gardenias; ?>"/>
              </li>
            </ul>

            <input name="submit" type="submit" value="Place Order"/>
          </fieldset>
        </form>

      <?php } ?>

    </article>
  </div>

  <?php include("includes/footer.php");?>
</body>

</html>
