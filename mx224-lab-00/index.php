<?php
include("includes/init.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title>Home - <?php echo htmlspecialchars($title); ?></title>

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />
</head>

<body>
  <header>
    <h1 id="title"><?php echo htmlspecialchars($title); ?></h1>

    <nav id="menu">
      <ul>
        <li><a href="index.php">Home</a></li>
      </ul>
    </nav>
  </header>

  <div id="content-wrap">
    <article id="content">
      <h1 id="article-title">INFO/CS 2300; NBA 5301</h1>

      <p>This semester you'll author your front-end content in HTML, CSS, and Javascript. You'll author your back-end content in PHP.</p>

      <section>
        <h2>PHP</h2>

        <p>You're running PHP version: <strong><?php echo htmlspecialchars(phpversion()); ?></strong>.</p>
        <p><strong>If you're not running at least version 7.2, please ask a TA for help.</strong></p>
      </section>

      <section>
        <h2>SQLite</h2>

        <figure id="database">
          <!-- Image source: https://openclipart.org/detail/94723/database-symbol -->
          <img alt="Database" src="images/db.svg"/>
          <figcaption>
            <cite>source: <a href="https://openclipart.org/detail/94723/database-symbol">https://openclipart.org/detail/94723/database-symbol</a></cite>)
          </figcaption>
        </figure>

        <p>You'll also learn how to utilize databases to store data for your web pages. We'll be using the development database, SQLite.</p>

        <p>This is a list of common Databases. Observe that this list is written from a SQLite database. <strong>If you do not see a list of databases below, please notify a TA that your PHP does not include SQLite Support.</strong></p>

        <ul>
          <?php
          $result = exec_sql_query($db, 'SELECT * FROM Software');
          foreach ($result as $row) {
            ?>
              <li><?php echo htmlspecialchars($row["name"]); ?></li>
              <?php
            }
            ?>
        </ul>
      </section>

      <section>
        <h2>Assignment Standards</h2>

        <p><strong>This web page is an example of the standards you are expected follow this semester. This example web page follows the guidelines below.</strong></p>

        <p>Coding and design guidelines:</p>
        <ul>
          <li>Follow the standards, conventions and expectations for web site development used in this class.</li>
          <li>All code is your own work, unless the assignment states otherwise.</li>
          <li>Main page is named index.html or index.php.</li>
          <li>A multi-page site should be well organized and include proper navigation.</li>
          <li>The HTML is well structured for your site’s content (i.e. use of &lt;header&gt;, &lt;main&gt;, &lt;section&gt;, &lt;footer&gt;, &lt;p&gt;, &lt;ul&gt;, &lt;em&gt;, &lt;strong&gt; tags)</li>
          <li>Use CSS for positioning and style.</li>
          <li>External styling via CSS. No inline or internal styling (i.e. &lt;style&gt; tag or style="" attribute).</li>
          <li>Multiple CSS files are okay as long it’s for legitimate structural reasons.</li>
          <li>Your code (HTML, CSS) is well written, formatted, properly indented, readable, and well-documented.</li>
          <li>No broken or dead links. Remember that some computers use case sensitive file and folder names!</li>
          <li>Validated HTML5 and CSS3. You must have 0 errors; warnings are permitted.</li>
          <li>Images are located in an images directory. Scripts in the scripts directory. PHP includes in the includes directory. CSS in the styles directory.</li>
          <li>You have tested your website in Firefox and Chrome.</li>
          <li>External content is cited. See the syllabus for details.</li>
          <li>Have effective information organization and navigation structures.</li>
          <li>Use design principles well, and have an engaging, pleasing design.</li>
          <li>Have interactive elements using both client side (e.g., jQuery/Javascript) and server-side (e.g., PHP) technologies that meet client needs.</li>
          <li>Work on different screen sizes and display reasonably well across different browsers.</li>
          <li>Follow the rules of good usability from the user’s perspective.</li>
          <li>Designed and implemented effectively for the target audience of the site.</li>
        </ul>
      </section>
    </article>
  </div>

  <footer>
    <p>Contact us at <a href="mailto:info2300-prof@cornell.edu">info2300-prof@cornell.edu</a>.</p>
  </footer>
</body>

</html>
