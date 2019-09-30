<div class = "cafe-name-header">
  <div class = "name-and-nav">

  <h1 class = "tzname"><a href = index.php> Temple of Zeus </a></h1>

  <nav>
  <ul>
    <li><a href = index.php>Menu</a></li>
    <li><a href = catering.php>Catering</a></li>
    <li><a href = sourcing.php>Sourcing</a></li>
    <li><a href = about.php>About</a></li>
    <li><a href = staff.php>Staff</a></li>
    <?php if(is_user_logged_in()){
  $logout_url = htmlspecialchars( $_SERVER['PHP_SELF'] ) . '?' . http_build_query( array( 'logout' => '' ) );

  echo '<li id="nav-last"><a href="' . $logout_url . '">Log Out ' . htmlspecialchars($logged_in_user['username']) . '</a></li>';
  }
  // else {
  //   echo "<li><a href = login.php>Log In</a></li>";
  // }
?>
  </ul>
</nav>

</div>

</div>
