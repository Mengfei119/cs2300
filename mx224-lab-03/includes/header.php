  <?php $array = [
    [
      'address' => 'index.php',
      'title' => 'Home'
    ],
    [
      'address' => 'about.php',
      'title' => 'About'
    ],
    [
      'address' => 'standards.php',
      'title' => 'Standards'
    ],
    [
      'address' => 'citations.php',
      'title' => 'Citation'
    ],
    [
      'address' => 'zoo.php',
      'title' => 'Zoo'
    ],
    [
      'address' => 'flowershop.php',
      'title' => 'Flower Shop'
    ]
  ];
  ?>


  <header>
    <h1 id="title"><?php if ( isset($title) ) { echo $title . " - "; } ?> INFO 2300</h1>

    <nav id="menu">
      <ul>
        <?php
        $current_file = basename($_SERVER['PHP_SELF']);
        foreach($array as $a){?>
          <li <?php if($current_file == $a['address']){echo "class = current_page";} ?>><a href= "<?php echo $a['address']; ?>"> <?php echo $a['title']; ?></a></li>
        <?php }?>

      </ul>
    </nav>
  </header>
