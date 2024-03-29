<?php
include("includes/init.php");

$title = 'Flower Shop';
// Was the form submitted?
if (isset($_POST['submit'])) {
  // Assume the order is valid
  $valid_order = TRUE;

  // Name is required.
  $order_name = trim( $_POST['order_name'] );
  if ( $order_name == '' ) {
    // No order name was given (it's empty).
    $valid_order = FALSE;
    $show_order_name_error = TRUE;
  }

  // Convert stems to integers so we can do math
  $roses = filter_input(INPUT_POST, 'roses', FILTER_VALIDATE_INT);
  $daisies = filter_input(INPUT_POST, 'daisies', FILTER_VALIDATE_INT);
  $gardenias = filter_input(INPUT_POST, 'gardenias', FILTER_VALIDATE_INT);
  $total_num = $roses + $daisies + $gardenias;
  $cost = $total_num * 3;
  $discount = 0.0;
  $total = $cost;
  // Check that a minimum of 3 stems was ordered.
  if ( $total_num < 3 ) {
    $valid_order = FALSE;
    $show_stems_error = TRUE;
  }
  else if( $total_num >= 10){
    if( $total_num >= 50){
      $x = 50;
      $discount = 0.15 * $cost;
    }
    if( $total_num >= 25 && $total_num < 50){
      $x = 25;
      $discount = 0.1 * $cost;
    }
    if( $total_num < 25){
      $x = 10;
      $discount = 0.05 * $cost;
    }
    $total = $cost - $discount;
  }
} else {
  // Form was not submitted.

  // Set default number of stems of an order.
  $roses = 0;
  $daisies = 0;
  $gardenias = 0;
}
?>
<!DOCTYPE html>
<html>

<?php include('includes/head.php')?>

<body>
  <?php include("includes/header.php");?>

  <div id="content-wrap">
    <article id="content">

      <h1 id="article-title">2300 Flower Shop</h1>
      <p>Welcome to the 2300 Flower Shop!</p>

      <?php
      if ( isset($valid_order) && $valid_order ) { ?>

        <h2>Order for <?php echo htmlspecialchars($order_name); ?></h2>
        <ul>
          <li>Roses: <?php echo $roses; ?></li>
          <li>Daisies: <?php echo $daisies; ?></li>
          <li>Gardenias: <?php echo $gardenias; ?></li>
          <br>
          <li>Cost: $<?php echo $cost; ?></li>
          <li>Discount: -$<?php echo $discount; ?></li>
          <li>Total: $<?php echo $total; ?></li>
        </ul>

      <?php } else { ?>

        <h2>Order Form</h2>
        <p>Each stem is $3. Minimum order is 3 stems.</p>

        <form id="flower_order" method="post" action="flowershop.php">
          <fieldset>
            <legend>Flower Stem Order Form</legend>

            <p class="form_error <?php if ( !isset($show_order_name_error) ) { echo 'hidden'; } ?>">Please provide a name for your order.</p>
            <p>
              <label for="name_field">Name on Order:</label>
              <input id="name_field" type="text" name="order_name" value="<?php if( isset($order_name) ) { echo htmlspecialchars($order_name); } ?>"/>
            </p>

            <p class="form_error <?php if ( !isset($show_stems_error) ) { echo 'hidden'; } ?>">You must order a minimum of 3 stems.</p>
            <ul>
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

            <input type="submit" name="submit" value="Place Order"/>
          </fieldset>
        </form>

      <?php } ?>

    </article>
  </div>

  <?php include("includes/footer.php");?>
</body>

</html>
