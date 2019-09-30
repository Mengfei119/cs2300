<?php
include("includes/init.php");
include("includes/head.php");
?>
<body>
    <div class="content">
<?php
include("includes/header.php");
if ( is_user_logged_in() ) {
   ?>
    <div class="centered-text-box">
        <h1>You Are Already Logged In!</h2>
    <?php }
    else { ?>

 <div class="centered-text-box">
      <div>
          <p>Log In</p>
          <form action="<?php echo htmlspecialchars( $_SERVER['PHP_SELF'] ); ?>" method="post">
          <input type="text" name="username" placeholder="Username" /><br>
          <input type="password" name="password" placeholder="Password" /><br>
          <input class="button" type="submit" name="login" value="Login" />
        </form>
        </div>
    </div>

<?php } ?>
    </div>
    <?php include("includes/footer.php"); ?>
</body>

</html>
