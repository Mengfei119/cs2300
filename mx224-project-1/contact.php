<?php
include("includes/init.php");
$title = "Contact";
$contact = "current";
$famous = 0;
$home = 0;
$secret = 0;
$form1 = 0;


if(isset($_POST["submit"])){
  //Assume the form is valid at filter_list
  $form_valid = True;
  $form_name = trim( $_POST['form_name']);
  if($form_name == ''){
    $form_valid = False;
    $show_error_name = True;
  }

  $form_email = trim( $_POST['form_email']);
  if($form_email == ''){
    $form_valid = False;
    $show_error_email = True;
  }
  $form_phone = trim( $_POST['form_phone']);
  if($form_phone == ''){
    $form_valid = False;
    $show_error_phone = True;
  }
  $form_comments = trim( $_POST['form_comments']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo $title;?> - Travel in Bolivia</title>
  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />


</head>
<body>
  <?php include("includes/header.php");
  ?>
	<div id="contact_form">
        <?php
        if( isset($form_valid) && $form_valid){?>
        <h2> Confirmation: </h2><br>
        <ul>
          <li>Your Name : <?php echo htmlspecialchars($form_name); ?></li>
          <li>Your Email:<?php echo htmlspecialchars($form_email); ?></li>
          <li>Your Phone Number : <?php echo htmlspecialchars($form_phone); ?></li>
          <li>We accepted your comments.</li>
        </ul>

        <?php }
        else {?>
    <h2>Contact us</h2>
        <p>Join in the Club to get more information.</p>

        <form method="post" action="contact.php">
          <fieldset>
            <!-- <legend>Contact Information Form</legend> -->
            <p class = <?php if( !isset($show_error_name) ){ echo "text_hidden"; } else{ echo "text_error"; }?>> Please input your name.
            </p>
            <p>
              <label for="name_field">Your Name:</label>
              <input id="name_field" type="text" name="form_name" value="<?php if(isset($form_name)){echo htmlspecialchars($form_name); }?>"/>
            </p>

            <p class = <?php if( !isset($show_error_email)){ echo "text_hidden";} else{ echo "text_error"; }?>> Please input your email address.
            </p>
            <p>
              <label for="email_field">Your Email:</label>
              <input id="email_field" type="text" name="form_email" value="<?php if( isset($form_email)){echo htmlspecialchars($form_email); }?>"/>
            </p>

            <p class = <?php if( !isset($show_error_phone)){ echo "text_hidden";} else{ echo "text_error"; }?>> Please input your phone number.
            </p>
            <p>
              <label for="phone_field">Phone Number:</label>
              <input id="phone_field" type="text" name="form_phone" value="<?php if( isset($form_phone)){echo htmlspecialchars($form_phone); }?>"/>
            </p>
            <p>
                <label for="comments_field">Comments:</label><br>
                <input id="comments_field" type="textarea" name="form_comments" placeholder="Write something.." value="<?php if( isset($form_comments)){echo htmlspecialchars($form_comments); }?>"/></textarea>
            </p>
            <!-- <p>
              <label for="agree_field">Subscribe:</label>
              <input id="agree_field" type="text" name="agree" value="<?php if(isset($form_agree)){echo htmlspecialchars($agree); }?>"/>
            </p> -->

            <input name="submit" type="submit" value="Submit Information"/>
          </fieldset>
        </form>

        <?php } ?>
  </div>


<?php include("includes/footer.php"); ?>
</body>
</html>
