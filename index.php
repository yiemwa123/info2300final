<?php include("includes/init.php");

const listofoptions = array("Title" => "title", "Keywords" => "tags");
$movie_name = $_POST['first'];
$field = $_GET['field'];
if (isset($field)) {
  $field = filter_var($field, FILTER_SANITIZE_STRING);
  $field = trim($field);
  $field = strtolower($field);
};
$valid_field = inlist($field, listofoptions);

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

<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<body>
  <?php include("includes/navbar.php"); ?>

  <div class="tags">
    <?php include("includes/tags.php"); ?>
  </div>


  <div class="content">

    <h2> Top 3 Box Office Hits </h2>

    <?php if (isset($_GET["search"])) {
      $moviesearch = $_GET['moviesearch'];
      if ($_GET["field"] == "tags") {
        $sql = "SELECT movies.id, movies.movie_name, images.image_ext FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE tag_name=:moviesearch;";
        $params = array(':moviesearch' => $moviesearch);
        $result = exec_sql_query($db, $sql, $params);
        if ($result) {

          $records = $result->fetchALL();
          foreach ($records as $movie) {
            $id = $movie["id"];
            settype($id, "string");
            $moviename = $movie["movie_name"];
            $ext = $movie["image_ext"];
            $details = "one.php?id=" . $id;

            printblock("uploads/images/" . $id . "." . $ext, $moviename, $details);
          }
        }
      }
    } ?>

    <h2> Newest Releases </h2>

  </div>



  <?php include("includes/footer.php") ?>
</body>

</html>
