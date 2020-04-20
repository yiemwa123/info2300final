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
  <title>Studio Ghibli</title>
  <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<body>
  <?php include("includes/navbar.php") ?>

  <div class="content">

    <h2> Top 3 Box Office Hits </h2>

    <?php printblock("images/studiologo.jpg", "Test") ?>

    <h2> Newest Releases </h2>

  </div>



  <?php include("includes/footer.php") ?>
</body>

</html>
