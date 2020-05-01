<?php include("includes/init.php");

//preliminary code for qsp still gotta filter input and escape output
//doesn't work on the images with no tags

$movie_id = $_GET["id"];
settype($movie_id, "integer");
$sql = "SELECT movies.movie_name, images.image_ext, tags.tag_name, movies.image_id, movies.year, movies.rating, movies.synopsis FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE (movies.id=:id);";
$params = array(':id' => $movie_id);
$result = exec_sql_query($db, $sql, $params);

$records = $result->fetchALL();
$name = $records[0]["movie_name"];
$img = $records[0]["image_id"];
$ext = $records[0]["image_ext"];
$path = "uploads/images/" . $img . "." . $ext;
$year = $records[0]["year"];
$rating = $records[0]["rating"];
$synopsis = $records[0]["synopsis"];


if (isset($_POST['delete'])) {
    var_dump($img);
    settype($img, 'integer');
    $sql = "DELETE FROM imagetotag WHERE image_id=:imgid;";
    $params = array(':imgid' => $img);
    exec_sql_query($db, $sql, $params);
    $sql = "DELETE FROM movies WHERE image_id=:imgid;";
    $params = array(':imgid' => $img);
    $delete = exec_sql_query($db, $sql, $params);
    unlink($path);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?php echo $records[0]["movie_name"]; ?></title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
    <script src="scripts/jquery-3.4.1.min.js" type="text/javascript"></script>
    <script src="scripts/validation.js" type="text/javascript"></script>
</head>

<body>

    <?php include("includes/navbar.php"); ?>


    <?php
    if (!isset($delete)) {
    ?>

        <div class="detailspage">
            <h2><?php echo $name ?></h2>
            <div class="imagedetails">

                <div class="row">
                    <div class="leftside">
                        <div class="menu" id="menu">
                            <img src=<?php echo $path; ?> alt="Theatrical poster for <?php echo ($name) ?>" id="image" />
                            <form id="deletephoto" action="<?php echo "one.php?id=".$movie_id?>" method="post" class="hidden" novalidate>
                                <button name="delete" id="delete" type="submit"> <img src="images/delete.png" alt="delete button" /></button>
                                <!-- https://pngio.com/images/png-a1138956.html-->
                            </form>
                        </div>

                    </div>
                    <div class="details">
                        <p>Year Released: <?php echo $year; ?></p>
                        <p>Movie Rating: <?php echo $rating; ?></p>
                        <p>Synopsis: <?php echo $synopsis; ?></p>
                        <p>Tags: </p>

                        <ul>
                            <?php foreach ($records as $record) {
                                $tag = $record["tag_name"]; ?>
                                <li><?php echo $tag; ?> </li>
                            <?php  } ?>
                        </ul>
                    </div>

                </div>

            </div>

        </div>






    <?php } else {
        echo "<h2>Movie successfully deleted</h2>";
    }


    ?>


</body>

</html>
