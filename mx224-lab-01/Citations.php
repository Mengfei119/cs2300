<?php
include("includes/init.php");

$title = "Citation";
$citation = "current";
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
  <div id = image>
    <p>
    External Image.<br>
    <! -- Source: http://www.mafengwo.cn/photo/13484/scenery_10596658/375570751.html -->
    <img src="/images/1.jpg" alt="External Image"/>
    Source: <cite><a href="http://www.mafengwo.cn/photo/13484/scenery_10596658/375570751.html
    "> External Image</a></cite>
    </p>
</div>

    <div id = image>
    <p>
        Original Image.<br>
        <! -- Source: (original work) Mengfei -->
        <img src="/images/p1.jpg" alt="Original Image"/>
    </p>
</div>
</body>

<footer>
    <p>Contact us at <a href="mailto:info2300-prof@cornell.edu">info2300-prof@cornell.edu</a>.</p>
  </footer>
</body>

</html>
