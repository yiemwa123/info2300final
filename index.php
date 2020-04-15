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


// This function creates the dropdown list for when the user wants to search through different fields
function createoptions($listofoptions)
{ ?>
  <select name="field">
    <?php foreach ($listofoptions as $option => $value) { ?>
      <option value="<?php echo $value; ?>"><?php echo $option; ?></option>
    <?php } ?>
  </select>
<?php }

// This function returns true if the field is a valid field, else otherwise
function inlist($field, $listoffields)
{
  if (in_array($field, array_values($listoffields))) {
    return TRUE;
  } else {
    return FALSE;
  }
} ?>


<?php

// This function prints all the records


// This function checks to see if the inputs for the insert form are valid
function inputvalid($movie_name, $year, $rating, $award, $synopsis)
{
  if (!empty($year) && strlen($award) > 0) {
    settype($year, "integer");
    settype($award, "integer");
    if (!empty($movie_name) && $year < 2019 && $year > 1980 && !empty($rating) && !empty($synopsis) && $award == 0 || $award == 1) {
      return TRUE;
    } else {
      return FALSE;
    }
  } else {
    return FALSE;
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Studio Ghibli</title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<body>
<?php include("includes/navbar.php") ?>

<h2> Top 3 Box Office Hits </h2>
<h2> Newest Releases </h2>

<?php include("includes/footer.php") ?>
</body>

</html>
