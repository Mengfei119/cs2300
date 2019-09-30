<?php
include("includes/init.php");
$title = "Famous Places";
$famous = "current";
$home = 0;
$secret = 0;
$contact = 0;
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
	<?php include("includes/header.php"); ?>
	<nav id="menu">
		<ul>
  			<li><a href="#lapaz">La Paz</a></li>
				<li><a href="#uyuni">Uyuni</a></li>
				<!-- <li><a href="#copa">Copacabana</a></li> -->
  			<!--<li><a href="#contact">Contact</a></li>-->
		</ul>
	</nav>
	<div id="oneparagraph">
		<h2 id=lapaz>La Paz</h2>
    <p>La Paz is an important cultural center of Bolivia. The city hosts several cathedrals belonging to the colonial times, such as the San Francisco Cathedral and the Metropolitan Cathedral, this last one located on Murillo Square, which is also home of the political and administrative power of the country. Hundreds of different museums can be found across the city, the most notable ones on Jaén Street, which street design has been preserved from the Spanish days and is home of 10 different museums.<br>
		<p class="text_source">Source: <cite><a href="https://en.wikipedia.org/wiki/La_Paz">Click here to get more information</a></cite><br></p>

		<!-- Source: (original work) Mengfei -->
		<img class="leftimg" src="/images/lapaz1.jpg" alt = "Lapaz">
		<!-- Source: https://www.findlocaltrips.com/Site/ViewSWImage?ImageFileItemId=3924&MaxWidth=350&MaxHeight=275&FixedWidthHeight=True -->
		<img class="rightimg" src="/images/lapaz2.jpg" alt = "Lapaz">
		<!-- Source: https://www.boliviahop.com/wp-content/uploads/boliviahop-night.jpg -->
		<img class="rightimg" src="/images/lapaz3.jpg" alt = "Lapaz">	<br>
		<p class="text_source">Source: <cite><a href="https://www.findlocaltrips.com/Site/ViewSWImage?ImageFileItemId=3924&MaxWidth=350&MaxHeight=275&FixedWidthHeight=True">
		Click to see the origin version of the middle image</a></cite><br>
		Source: <cite><a href="	https://www.boliviahop.com/wp-content/uploads/boliviahop-night.jpg">
    Click to see the origin version of the right image</a></cite></p>


		<h2 id = uyuni> Uyuni</h2>
		<p>Uyuni is a city in the southwest of Bolivia. There is little agriculture in the area because water supplies are scarce and somewhat saline.<br>Uyuni primarily serves as a gateway for tourists visiting the world's largest salt flats, the nearby Uyuni salt flat. Each year the city receives approximately 60,000 visitors from around the globe. The city also acts as a gateway for commerce and traffic crossing into and out of Bolivia from and to Chile, and there is a customs and immigration post downtown.<br>Founded in 1890 as a trading post, the city has a population of 10,460 (2012 official estimate). The town has an extensive street-market. It lies at the edge of an extensive plain at an elevation of 3,700 m (12,139 ft) above sea level, with more mountainous country to the east.<br>
		<p class="text_source">Source: <cite><a href="https://en.wikipedia.org/wiki/Uyuni">Click here to get more information</a></cite></p>

		<!-- Source: (original work) Mengfei -->
		<img class="leftimg" src="/images/uyuni1.jpg" alt = "Uyuni">
		<img class="rightimg" src="/images/uyuni2.jpg" alt = "Uyuni">
		<img class="rightimg" src="/images/uyuni3.jpg" alt = "Uyuni"><br>
		<img class="leftimg" src="/images/uyuni4.jpg" alt = "Uyuni">
		<img class="rightimg" src="/images/uyuni5.jpg" alt = "Uyuni">
		<img class="rightimg" src="/images/uyuni.jpg" alt = "Uyuni">
	  </div>

		<?php include("includes/footer.php"); ?>
</body>
</html>
