<?php
include("includes/init.php");
$title = "Secret Places";
$secret = "current";
$famous = 0;
$home = 0;
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
				<li><a href="#copa">Copacabana</a></li>
  			<li><a href="#intro">Jungle</a></li>
		</ul>
	</nav>
	<div id="oneparagraph">
		<h2 id = copa> Copacabana</h2>
		<p>
		Copacabana is the main Bolivian town on the shore of Lake Titicaca. The town has a large 16th-century shrine, the Basilica of Our Lady of Copacabana. Our Lady of Copacabana is the patron saint of Bolivia. The town is a destination for tourism in Bolivia. The town is also known for its famous Basilica, home of the Virgin of Copacabana, its trout, and its quaint atmosphere. Built between Mount Calvario and Mount Niño Calvario, the town has approximately 6,000 inhabitants. Copacabana's religious celebrations, cultural patrimony, and traditional festivals are well known throughout Bolivia. Boats leave for <I>Isla del Sol</I>, the sacred Inca island from Copacabana.<br>
		<p class="text_source">Source: <cite><a href="https://en.wikipedia.org/wiki/Copacabana,_Bolivia">Click here to get more information</a></cite></p><br>
		</p>

		<!-- Source:  http://www.mafengwo.cn/photo/13484/scenery_3350352/65840497.html-->
		<img class="leftimg" src="/images/copa1.jpg">
		<!-- Source:  http://www.mafengwo.cn/photo/13484/scenery_3350352/65841308.html-->
		<img class="rightimg" src="/images/copa2.jpg">
		<!-- Source:  http://www.mafengwo.cn/photo/13484/scenery_3350352/65842997.html-->
		<img class="rightimg" src="/images/copa3.jpg">
		<p class="text_source">
		Source: <cite><a href="http://www.mafengwo.cn/photo/13484/scenery_3350352/65840497.html">
		Click to see the origin version of the left image</a></cite><br>
		Source: <cite><a href="http://www.mafengwo.cn/photo/13484/scenery_3350352/65841308.html">
		Click to see the origin version of the middle image</a></cite><br>
		Source: <cite><a href="http://www.mafengwo.cn/photo/13484/scenery_3350352/65842997.html">
		Click to see the origin version of the right image</a></cite>
		</p>

		<h2 id = jungle> Jungle</h2>
		<p>Only 14 degrees south of the equator, Trinidad is a lively, tropical city (population 90,000) in north-central Bolivia and a starting point for great rainforest cruises and wildlife expeditions around the Mamoré River Basin. Situated 550 kilometers northwest of Santa Cruz on a paved road, Trinidad is the capital of the department of Beni, and de-facto capital of the Bolivian Amazon.<br>Trinidad lies in the headwaters region of the Amazon in northeastern Bolivia, 2,000 miles from both the river's source high in the Andes and its mouth at Belen, Brazil. But, unlike Iquitos in Peru, or other Amazonian towns in neighboring countries, ocean-going ships cannot venture upriver to Bolivia.<br>Founded as a Jesuit mission in 1686 under the name Santísima Trinidad, it was the second mission to be founded in the Moxos region, which is now part of the department of Beni. Its original position on the shores of the Río Mamoré proved too precarious, and it was moved to its current location in 1769, two years after the Jesuits were ejected from the region.<br>
		<p class="text_source">Source: <cite><a href="https://www.rainforestcruises.com/bolivia-amazon-tours/">Click here to get more information</a></cite></p><br>


		<!-- Source: https://theplanetd.com/images/visitiing-the-amazon-bolivia-featured-image.jpg -->
		<img class="leftimg" src="/images/ama1.jpg">
		<!-- Source: https://theplanetd.com/images/AmazonHeader.jpg -->
		<img class="rightimg" src="/images/ama2.jpg">
		<!-- Source: https://theplanetd.com/images/amazon-monkey.jpg -->
		<img class="rightimg" src="/images/ama3.jpg">
		<p class="text_source">
		Source: <cite><a href="https://theplanetd.com/images/visitiing-the-amazon-bolivia-featured-image.jpg">
		Click to see the origin version of the left image</a></cite><br>
		Source: <cite><a href="https://theplanetd.com/images/AmazonHeader.jpg">
		Click to see the origin version of the middle image</a></cite><br>
		Source: <cite><a href="https://theplanetd.com/images/amazon-monkey.jpg">
		Click to see the origin version of the right image</a></cite>
		</p>
  </div>

	<?php include("includes/footer.php"); ?>
</body>
</html>
