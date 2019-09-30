<header>
    <nav id="navigation">
        <ul>
            <li><a href="index.php">Gallery</a></li>
            <li><a href="search.php">Search Image</a></li>
            <li><a href="user.php">User File</a></li>
           <?php if ( is_user_logged_in() ) {
               $logout_url = htmlspecialchars( $_SERVER['PHP_SELF'] ) . '?' . http_build_query( array( 'logout' => '' ) );
               echo '<li id="nav-left"><a href="' . $logout_url . '">Sign Out ' . htmlspecialchars($this_user['username']) . '</a></li>';
               }?>
        </ul>
    </nav>
</header>
