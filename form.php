<?php include("includes/init.php");
const inputs = array("Title: " => "title", "Year: " => "year", "Rating: " => "rating", "Synopsis: " => "synopsis", "Tag: " => "tag");
const MAX_FILE_SIZE = 1000000;
$poster = $_FILES['poster'];
$title = $_POST['title'];
$title = filter_var($title, FILTER_SANITIZE_STRING);
$year = $_POST['year'];
$year = filter_var($year, FILTER_SANITIZE_NUMBER_INT);
$rating = $_POST['rating'];
$rating = filter_var($rating, FILTER_SANITIZE_STRING);
$synopsis = $_POST['synopsis'];
$synopsis = filter_var($synopsis, FILTER_SANITIZE_STRING);
$tag = $_POST['tag'];
$tag = filter_var($tag, FILTER_SANITIZE_STRING);



// Very basic implementation of my form
// will go back and filter everything better later

if (isset($_POST["addmovie"])) {
    if ($poster['error'] == UPLOAD_ERR_OK) {
        $poster_file = $poster["name"];
        $poster_info = new SplFileInfo($poster_file);
        $poster_name = $poster_info->getFilename();
        $poster_ext = strtolower($poster_info->getExtension());
        $sql = "INSERT INTO images (image_name, image_ext) VALUES (:name, :ext);";
        $params = array(':name' => $poster_name, ':ext' => $poster_ext);
        $result = exec_sql_query($db, $sql, $params);
        if ($result) {
            $temp_loc = $poster["tmp_name"];
            $lastid = $db->lastInsertId("id");
            settype($lastid, "string");
            $new_path = "uploads/images/" . $lastid . "." . $poster_ext;
            move_uploaded_file($temp_loc, $new_path);

            $sql = "INSERT INTO movies (movie_name, year, rating, synopsis, image_id) VALUES (:moviename, :year, :rating, :synopsis, :lastid);";
            $params = array(':moviename' => $title, ':year' => $year, ':rating' => $rating, ':synopsis' => $synopsis, ':lastid' => $lastid);
            $result = exec_sql_query($db, $sql, $params);
        }
    }
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Add Movie</title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<?php

// function that prints all the inputs for the form
function printinput()
{
    foreach (inputs as $field => $value) { ?>
        <div class=row>
            <label class="label" for="<?php echo $value; ?>"> <?php echo $field ?> </label>
            <input id="<?php echo $value; ?>" type="text" name="<?php echo $value; ?>" required />
        </div>

<?php }
} ?>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="tags">
        <?php include("includes/tags.php"); ?>
    </div>
    <h2 class="formhead"> Add Movie </h2>
    <div class="form">
        <form id="addmovie" action="form.php" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />
            <?php printinput(); ?>
    </div>
    <div class="row">
        <label class="label" for="poster">Movie Image: </label>
        <input id="poster" type="file" name="poster" />
    </div>
    <div class="formbutton">
        <button class="addmovie" name="addmovie" type="submit"> Add Movie</button>
    </div>
    </form>
    </div>

</body>

</html>
