<?php
// DO NOT REMOVE!
include("includes/init.php");
$title = "Home";
$home = "current";
$famous = 0;
$secret = 0;
$contact = 0;
// DO NOT REMOVE!
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
  			<li><a href="#intro">Introduction</a></li>
  			<li><a href="#geo">Geography</a></li>
  			<li><a href="#trans">Transportation</a></li>
  			<!-- <li><a href="#contact">Contact Form</a></li> -->
		</ul>
	</nav>
	<div id="paragraph1">
    <h2 id="intro"> Introduction </h2>
    <p><!-- Source: https://en.wikipedia.org/wiki/Bolivia -->
    Bolivia is located in the central zone of South America, between 57°26'–69°38'W and 9°38'–22°53'S. With an area of 1,098,581 square kilometres (424,164 sq mi), Bolivia is the world's 28th-largest country, and the fifth largest country in South America, extending from the Central Andes through part of the Gran Chaco, Pantanal and as far as the Amazon.<br>
    <p class="text_source">Source: <cite><a href="https://en.wikipedia.org/wiki/Bolivia">Click here to get more information</a></cite></p>
    <h2 id="geo"> Geography </h2>
    <p><!-- Source: https://en.wikipedia.org/wiki/Bolivia -->
    The geography of the country exhibits a great variety of terrain and climates. Bolivia has a high level of biodiversity, considered one of the greatest in the world, as well as several ecoregions with ecological sub-units such as the Altiplano, tropical rainforests (including Amazon rainforest), dry valleys, and the Chiquitania, which is a tropical savanna. These areas feature enormous variations in altitude, from an elevation of 6,542 metres (21,463 ft) above sea level in Nevado Sajama to nearly 70 metres (230 ft) along the Paraguay River. Although a country of great geographic diversity, Bolivia has remained a landlocked country since the War of the Pacific. Puerto Suárez, San Matías and Puerto Quijarro are located in the Bolivian Pantanal.<br>
    <p class="text_source">Source: <cite><a href="https://en.wikipedia.org/wiki/Bolivia">Click here to get more information</a></cite></p>

    <h2 id="trans"> Transportation </h2>
      <h3> Airplanes</h3>
        <p><!-- Source: https://boliviatravelsite.com/bolivia-airports -->
          Bolivia has 3 international airports located in the cities of La Paz, Cochabamba and Santa Cruz.<br>
          <p> The international airlines that operate most of the flights to Bolivia are:</p>
          </div>
          <ul>
          <li>American Airlines, the world's largest airline.</li>
          <li>Iberia, Spain's flag carrying airline.</li>
          <li>Air Europa, a large spanish airline owned by Globalia.</li>
          <li>Colombian airline Avianca.</li>
          <li>LAN (LATAM Airlines) from Chile.</li>
          <li>BoA flies to Madrid, Miami, São Paulo and Buenos Aires.</li>
          <li>Aerolíneas Argentinas to Buenos Aires.</li>
          <li>Gol to Rio de Janeiro.</li>
          <li>Peruvian and Amaszonas to Cuzco.</li></ul>
    <p class="text_source">Source: <cite><a href=" https://boliviatravelsite.com/bolivia-airports">Click here to get more information/a></a></cite></p>


	<div id="paragraph2">
    <h2>Pictures of Bolivia</h2>
    <p>
    <!-- Source: (original work) Mengfei -->
      <img src="/images/flamingo.jpg" alt = "Uyuni"><br>
      <a href="famous.php">Uyuni</a>
    </p>

    <p>
      <!-- Source: (original work) Mengfei -->
      <img src="/images/lapaz.jpg" alt = "Lapaz"><br>
      <a href="famous.php" >La Paz</a>
    </p>

    <p>
      <!-- Source: (original work) Mengfei -->
      <img src="/images/uyuni.jpg" alt = "Uyuni"><br>
      <a href="famous.php" >Uyuni</a>
    </p>

  </div>
<?php include("includes/footer.php"); ?>
</body>
</html>
