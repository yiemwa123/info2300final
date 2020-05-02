<div class="heading">
  <!-- Source: https://filmschoolrejects.com/the-movies-of-studio-ghibli-ranked-from-worst-to-best-b480bffd7fb7/-->
  <div class="logo">
    <a href="index.php">
      <img src="images/ghiblilogo.jpg" alt="Studio Ghibli Logo">
    </a>
    <p> Source: <cite><a href="https://filmschoolrejects.com/the-movies-of-studio-ghibli-ranked-from-worst-to-best-b480bffd7fb7/">Film School Rejects</a></cite> </p>
  </div>
  <div class="group">
    <form id="ghiblisearch" action="search.php" method="get" novalidate>
      <div class="search">
        <select name="field">
          <option value="title">Title</option>
          <option value="tags">Keywords</option>
        </select>
        <label for="bar"></label>
        <input id="bar" class="bar" name='moviesearch' type="text" placeholder="Search a Studio Ghibli Movie" />
        <!-- Source: https://thenounproject.com/search/?q=search%20icon&i=2443377-->
        <button class="button" name="search" type="submit"><img src="images/searchicon.png" alt="Search Icon"></button>
      </div>
    </form>
    <p class="cite"> Source for button photo: <cite><a href="https://thenounproject.com/search/?q=search%20icon&i=2443377">icon search by Graphiqu from the Noun Project </a></cite> </p>

  </div>
  <div class="links">
    <ul>
      <li class="other"> <a href="index.php"> Home </a></li>
      <li class="other"><a href="form.php"> + Add Movie </a></li>
    </ul>
  </div>
</div>


<?php

// This function prints out a block with a photo and movie name formatted properly
function printblock($img, $moviename, $details, $source)
{ ?>

  <div class="block">
    <a href="<?php echo $details; ?>">
      <img src="<?php echo ($img); ?>" class="movieposter" alt="Theatrical poster for <?php echo ($moviename); ?>" />
    </a>
    <p class="moviename"> <?php echo ($moviename); ?> </p>
    <?php if (!empty($source)) { ?>
      <a href="<?php echo $source; ?>">Source: Wikipedia</a>
    <?php } else { ?>
      <a href=''> Contributer </a>
    <?php } ?>
  </div>
<?php }



// if search form submitted
if (isset($_GET["search"])) {
  // get search term
  $moviesearch = $_GET['moviesearch'];

  //if the field is tags
  if ($_GET["field"] == "tags") {

    // do some inner joins so that you can map each movie name to the tag
    $sql = "SELECT movies.id, movies.movie_name, images.image_ext FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE tag_name=:moviesearch;";
    $params = array(':moviesearch' => $moviesearch);
    $result = exec_sql_query($db, $sql, $params);
    if ($result) {
      $movies = $result->fetchALL();
    }
  }
}

?>
