<?php
include("includes/init.php");

// enrollment form data
if (isset($_POST["submit"])) {

  $first_name = filter_var($_POST["first_name"], FILTER_SANITIZE_STRING);
  $last_name = filter_var($_POST["last_name"], FILTER_SANITIZE_STRING);
  if(! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    $email = NULL;
  }else{
    $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL);
  }

  $dob = filter_var($_POST["dob"], FILTER_SANITIZE_STRING);
  $phone_number = filter_var(trim($_POST["phone_number"]),FILTER_SANITIZE_STRING);
  if(strlen($phone_number) > 10 ){
    $phone_number =  substr($phone_number, 0, 10);
  }

  if(!filter_var($_POST["dependents"], FILTER_VALIDATE_INT) || $dependents <0){
    $dependents = NULL;
  }else{
    $dependents = filter_var($_POST["dependents"], FILTER_VALIDATE_INT);
  }

  $coverage = filter_var($_POST["coverage"], FILTER_SANITIZE_STRING);
  if($coverage != "Basic" && $coverage != "Full" && $coverage != "Premium"){
    $coverage = NULL;
    echo "coverage";
  }

  if(!filter_var($_POST["deductible"], FILTER_VALIDATE_FLOAT) || $deductible < 0.0 || $deductible > 100.0){
    $deductible = NULL;
    echo "deductible";
  }else{
    $deductible = filter_var($_POST["deductible"], FILTER_VALIDATE_FLOAT);
  }
}
?>
<!DOCTYPE html>
<html>
<style>body { background-color: yellow; }</style>
<?php include("includes/head.php"); ?>

<body>
  <?php include("includes/header.php");?>

  <div id="content-wrap">
    <article id="content">
      <h1 id="article-title">Insurance Application Submission</h1>

      <h2>Application for <?php echo (htmlspecialchars($first_name)." ". htmlspecialchars($last_name )); ?></h2>

      <p>
        <?php
        echo("<h4>Email Address: " .  htmlspecialchars($email ). "</h4>");
        echo("<h4>Date of Birth: " .  htmlspecialchars($dob) . "</h4>");
        echo("<h4>Phone Number: " .  htmlspecialchars($phone_number) . "</h4>");
        echo("<h4>Number of Dependents: " .  htmlspecialchars($dependents ). "</h4>");
        echo("<h4>Coverage Plan: " .  htmlspecialchars($coverage ). "</h4>");
        echo("<h4>Current Deductible: " .  htmlspecialchars($deductible) . "</h4>");
        ?>
      </p>

    </article>
  </div>

  <?php include("includes/footer.php");?>
</body>

</html>
