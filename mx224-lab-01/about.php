<?php
include("includes/init.php");

$title = "About";
$about = "current";
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <title><?php echo $title; ?> - INFO 2300</title>

  <link rel="stylesheet" type="text/css" href="styles/all.css" media="all" />
</head>

<body>
  <?php include("includes/header.php"); ?>

  <div id="content-wrap">
    <article id="content">
      <h1>Course Resources</h1>

      <ul>
        <li><a href="https://github.coecis.cornell.edu/info2300-sp2019/info2300-sp2019-website">Course Web Site</a></li>
        <li><a href="https://campuswire.com/p/G264C15B7">Discussion Q & A</a></li>
        <li><a href="https://cmsx.cs.cornell.edu">Grades</a></li>
      </ul>
    </article>
  </div>

  <footer>
    <p>Contact us at <a href="mailto:info2300-prof@cornell.edu">info2300-prof@cornell.edu</a>.</p>
  </footer>
</body>

</html>
