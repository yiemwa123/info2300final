<?php include("includes/init.php");

const listofoptions = array("Title" => "title", "Keywords" => "tags");
$field = $_GET['field'];
if (isset($field)) {
  $field = filter_var($field, FILTER_SANITIZE_STRING);
  $field = trim($field);
  $field = strtolower($field);
};
$valid_field = inlist($field, listofoptions);
$moviesearch = $_GET['moviesearch'];
$moviesearch = filter_var($moviesearch, FILTER_SANITIZE_STRING);
$titletag="Search Results"

?>



<?php
// This function returns true if the field is a valid field, else otherwise
function inlist($field, $listoffields)
{
  if (in_array($field, array_values($listoffields))) {
    return TRUE;
  } else {
    return FALSE;
  }
} ?>



<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="tags">
    <?php include("includes/tags.php"); ?>
  </div>


  <div class="content">

    <h2>Search Results </h2>

    <?php if (isset($_GET["search"]) && $valid_field && !empty($_GET["moviesearch"])) {

      if ($_GET["field"] == "tags") {
        $sql = "SELECT movies.id, movies.movie_name, images.image_ext, movies.sources, imagetotag.image_id FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE tag_name=:moviesearch;";
        $params = array(':moviesearch' => $moviesearch);
        $result = exec_sql_query($db, $sql, $params);
        if ($result) {
          $records = $result->fetchALL();
          foreach ($records as $movie) {
            $id = $movie["id"];
            settype($id, "string");
            $moviename = $movie["movie_name"];
            $ext = $movie["image_ext"];
            $sources = $movie["sources"];
            $details = "one.php?" . http_build_query(array('id' => $id));
            $imageid = $movie["image_id"];
            printblock("uploads/images/" . $imageid . "." . $ext, $moviename, $details, $sources);
          }
        }
      } else if ($_GET["field"] == "title" && !empty($_GET["moviesearch"])) {
        $sql = "SELECT movies.id, movies.movie_name, images.image_ext, movies.sources, movies.image_id FROM movies INNER JOIN images ON movies.image_id=images.id WHERE movie_name LIKE :moviesearch || '%';";
        $params = array(':moviesearch' => $moviesearch);
        $result = exec_sql_query($db, $sql, $params);
        if ($result) {
          $records = $result->fetchALL();
          foreach ($records as $movie) {
            $id = $movie["id"];
            settype($id, "string");
            $moviename = $movie["movie_name"];
            $ext = $movie["image_ext"];
            $sources = $movie["sources"];
            $details = "one.php?" . http_build_query(array('id' => $id));
            $imageid = $movie["image_id"];
            printblock("uploads/images/" . $imageid . "." . $ext, $moviename, $details, $sources);
          }
        }
      }
    } else {
      echo "<h2> Search field or term not valid </h2>";
    }
    ?>

  </div>



  <?php include("includes/footer.php") ?>
</body>

</html>
