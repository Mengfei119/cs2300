<?php
include("includes/init.php");
include("includes/head.php");

if ( isset($_POST["submit"]) && is_user_logged_in() ) {
  $search_recipes = true;
  $search_field = filter_input(INPUT_POST, "search_field", FILTER_SANITIZE_STRING);
  if(strlen($search_field) > 0){
    $valid_search = true;
  }
  else {
    $valid_search = false;
  }
}
?>
<body>
<div class="content">
 <?php include("includes/header.php"); ?>
 <div class="centered-text-box">
        <div>
              <form action="recipes.php" method = "post" enctype="multipart/form-data">
                    <p>Recipes</p>
                    <!-- should be updated later -->
                    <input type = "text" name="search_field"><br>
                    <button name="submit" type="submit">Search</button>
              </form>
          </div>
</div>

    <?php
    if ($search_recipes) {
    if ($valid_search) { ?>
    <h2>Recipes</h2>
    <div >
      <?php
      //query db to get the order info of the current user
        $records = exec_sql_query(
          $db,
          "SELECT * FROM recipes WHERE" . $search_field . " LIKE '%' || :search || '%'",
          array(':search' => $this_user['id'])
          )->fetchAll();

        if (count($records) > 0) {
          foreach($records as $record){
            print_record($record);
          }
        } else {
          echo "<p><strong>Hmmm, we couldn't find any recipes. Try again!</strong></p>";
        }
      } else {
        echo "<p><strong>That search didn't work. Try again!</strong></p>";
        }
      }
        ?>
    </div>
   <h1> Recipes </h1>

   <div class = "full-recipes-list">
     <ul>
      <li> armenian lentil
      <li> cauliflower curry
      <li> cheddar parsnip
      <li> choklay's lentil
      <li> cream of broccoli
      <li> crema de elote
      <li> crema andaluza
      <li> creole red bean
      <li> cuban black bean
      <li> curried lentil
      <li> curried sweet pea
      <li> east african stew
      <li> gazpacho
      <li> gingered sweet potato
      <li> groundnut
      <li> herbed potato
      <li> hungarian mushroom
      <li> lebanese vegetable
      <li> minestrone
      <li> miso vegetable
      <li> mulligitawny
      <li> mushroom barley
      <li> ratatouille
      <li> sopa da lima
      <li> spicy mexican vegetables
      <li> spinach mushroom
      <li> thai carrot soup
      <li> tomato garlic
      <li> tomato rice
      <li> vegetable ragout
      <li> white bean & garlic
      <li> Hummus
     </ul>
    </div>

    <div class = "recipe-chosen">
      <div class = "recipe-image">
        <img src = "images/armeninan-lentil-not-zeus.jpg" alt = "armenian lentils">
      </div>

      <h2> Ingredients </h2>
        <ul>
          <li> 18 cups dried lentils
          <li> 4 cups apple juice
          <li> 1/3 C olive oil
          <li> 6 large onions, chopped
          <li> 3 lg eggplant, cubed
          <li> 8 tomatoes, chopped, or
          <li> 1 can peeled tomatoes
          <li> 8 carrots, chopped
          <li> 1 bunch celery, chopped
          <li> 3 green peppers, chopped
          <li> 1 teaspoon cinnamon
          <li> 1 teaspoon ground allspice
          <li> 2 tablespoons paprika
          <li> salt
          <li> 3 tablespoons chopped fresh parsley
          <li> 1 teaspoon dried mint
        </ul>

        <h2> Instructions </h2>
        <ol>
          <li> Put lentils in 8 qts of water and bring to a boil; reduce heat and keep at a slow boil until fully cooked. Remove from heat.
          <li> Sautee onions in olive oil until transparent. Add eggplant, carrots, and celery. Stir. Add cinnamon, paprika, salt and allspice. Add apple juice and cook at medium heat until vegetables are nearly tender. Add tomatoes, peppers, and dried mint.
          <li> When all vegetables are fully cooked combine with lentils. Add water, if necessary, to bring to the proper consistency.
        <ol>
    </div>

  <?php include("includes/footer.php"); ?>
</body>
</html>
