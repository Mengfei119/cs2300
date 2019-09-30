<?php
include("includes/init.php");
?>
<!DOCTYPE html>
<html>

<?php include('includes/head.php'); ?>

<body>
  <?php include("includes/header.php");?>

  <div id="content-wrap">
    <article id="content">
      <h1 id="article-title">2300 Insurance Company</h1>
      <p>Welcome to the 2300 Insurance Company!</p>

      <h2>2300 Insurance Plan Application</h2>

      <form id="insurance_form" method="post" action="insurance_submit.php">
        <fieldset>
          <legend>Insurance Application 2018</legend>

          <ul>
            <li class="app_order">
              First Name:
              <input type="text" name="first_name" required/>
            </li>
            <li class="app_order">
              Last Name:
              <input type="text" name="last_name" required/>
            </li>
            <li class="app_order">
              Email Address:
              <input type="email" name="email" required/>
            </li>
            <li class="app_order">
              Date of Birth:
              <input type="date" name="dob" required/>
            </li>
            <li class="app_note">Please put in the only number format</li>
            <li class="app_order">
              Phone Number:
              <input type="number" name="phone_number" required/>
            </li>
            <li class="app_order">
              Number of Dependents:
              <input type="number" name="dependents" min="0" max="100" required/>
            </li>
            <!-- <li class="app_note">Please choose from Basic, Full, and Premium</li> -->
            <li class="app_order">
              Coverage Plan:
              <select name="coverage" required>
                <option value="" selected disabled>Choose</option>
                <option value="Basic">Basic</option>
                <option value="Full">Full</option>
                <option value="Premium">Premium</option>
              </select>
            </li>
            <li class="app_order">
              Current Deductible Rate:
              <input type="float" name="deductible" min="0" max="100" required />%
            </li>
          </ul>

          <input id="app_button" type="submit" name="submit" value="Submit Application"/>
        </fieldset>
      </form>

    </article>
  </div>
  <?php include("includes/footer.php");?>
</body>

</html>
