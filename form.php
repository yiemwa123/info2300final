<?php include("includes/init.php");
const inputs = array("Title: " => "title", "Year: " => "year", "Movie Rating: " => "rating", "Synopsis: " => "synopsis", "Tags: " => "tag");
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
$taginput = $_POST['tag'];
$taginput = filter_var($taginput, FILTER_SANITIZE_STRING);
$inputarray = array($title, $year, $rating, $synopsis, $taginput);
$showerror=FALSE;


// Very basic implementation of my form
// will go back and filter everything better later

if (isset($_POST["addmovie"])) {
    if (!empty($title) && !empty($year) && !empty($rating) && !empty($synopsis) && !empty($taginput)) {
        $sql = "INSERT INTO movies (movie_name, year, rating, synopsis, image_id) VALUES (:moviename, :year, :rating, :synopsis, :lastid);";
        $params = array(':moviename' => $title, ':year' => $year, ':rating' => $rating, ':synopsis' => $synopsis, ':lastid' => $lastimageid);
        try{
            $result = exec_sql_query($db, $sql, $params);
            $lastmovieid = $db->lastInsertId();
            if ($poster['error'] == UPLOAD_ERR_OK) {
                $sql = "INSERT INTO images (image_name, image_ext) VALUES (:name, :ext);";
                $params = array(':name' => $poster_name, ':ext' => $poster_ext);
                $result = exec_sql_query($db, $sql, $params);
                $poster_file = $poster["name"];
                $poster_info = new SplFileInfo($poster_file);
                $poster_name = $poster_info->getFilename();
                $poster_ext = strtolower($poster_info->getExtension());
                $temp_loc = $poster["tmp_name"];
                $lastimageid = $db->lastInsertId("id");
                settype($lastid, "string");
                $new_path = "uploads/images/" . $lastimageid . "." . $poster_ext;
                move_uploaded_file($temp_loc, $new_path);
            }




            $tags = preg_split("/[\s,#]+/", $taginput, NULL, PREG_SPLIT_NO_EMPTY);

            foreach ($tags as $tag) {
                $sql = "INSERT INTO tags (tag_name) VALUES (:tag);";
                $params = array(':tag' => $tag);
                try {
                    $result = exec_sql_query($db, $sql, $params);
                    $lasttagid = $db->lastInsertId();
                    $sql = "INSERT INTO imagetotag (image_id, tag_id) VALUES (:imageid, :tagid);";
                    exec_sql_query($db, $sql, $params);
                    $params = array(':imageid' => $lastimageid, ":tagid" => $lasttagid);
                } catch (Exception $e) {
                    $sql = "SELECT id FROM tags WHERE tag_name=:tag;";
                    $params = array(':tag' => $tag);
                    $result = exec_sql_query($db, $sql, $params);
                    $records = $result->fetchALL();
                    $tag_id = $records[0]["id"];
                    settype($tag_id, "integer");
                    $sql = "INSERT INTO imagetotag (image_id, tag_id) VALUES (:imageid, :tagid);";
                    $params = array(':imageid' => $lastimageid, ":tagid" => $tag_id);
                    exec_sql_query($db, $sql, $params);
                }
            }
        }
        catch (Exception $e){
            $showerror=TRUE;
        }

    }
} ?>

<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<?php

// function that prints all the inputs for the form
function printinput()
{
    foreach (inputs as $field => $value) {
        $input = $_POST[$value] ?>
        <div class=row>
            <label class="label" for="<?php echo $value; ?>"> <?php echo $field ?> </label>
            <input id="<?php echo $value; ?>" type="text" name="<?php echo $value; ?>" value="<?php echo $input; ?>" required />
        </div>

<?php }
} ?>

<body>
    <?php include("includes/navbar.php"); ?>
    <div class="tags">
        <?php include("includes/tags.php"); ?>
    </div>
    <?php if (isset($_POST["addmovie"])) { ?>
    <?php
        if ($showerror) {
            echo "<h3 class='feedback'> Entry already made </h3>";
        }
    } ?>
    <h2 class="formhead"> Add Movie </h2>
    <?php if (isset($_POST["addmovie"])) { ?>
    <?php
        if (empty($title) || empty($year) || empty($rating) || empty($synopsis) || empty($taginput)) {
            echo "<h3 class='feedback'> Please fill in all the fields </h3>";
        }
    } ?>
    <div class="form">
        <form id="addmovie" action="form.php" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_FILE_SIZE; ?>" />

            <?php
            printinput();
            ?>
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
