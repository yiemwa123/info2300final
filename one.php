<?php include("includes/init.php");

//preliminary code for qsp still gotta filter input and escape output
//doesn't work on the images with no tags

$movie_id = $_GET["id"];
settype($movie_id, "integer");
$sql = "SELECT movies.movie_name, images.image_ext, tags.tag_name, movies.image_id, movies.year, movies.rating, movies.synopsis FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE (movies.id=:id);";
$params = array(':id' => $movie_id);
$result = exec_sql_query($db, $sql, $params); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Test</title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<body>

    <?php include("includes/navbar.php"); ?>




    <?php
    if ($result) {
        $records = $result->fetchALL();
        $name = $records[0]["movie_name"];
        $img = $records[0]["image_id"];
        $ext = $records[0]["image_ext"];
        $path = "uploads/images/" . $img . "." . $ext;
        $year = $records[0]["year"];
        $rating = $records[0]["rating"];
        $synopsis = $records[0]["synopsis"];

    ?>

        <div class="detailspage">
            <h2><?php echo $name ?></h2>
            <div class="imagedetails">

                <div class="row">
                    <div class="leftside">
                        <img src=<?php echo $path; ?> alt="image" />
                    </div>


                    <div class="details">
                        <p><?php echo $year; ?></p>
                        <p><?php echo $rating; ?></p>
                        <p><?php echo $synopsis; ?></p>
                        <ul>
                            <?php foreach ($records as $record) {
                                $tag=$record["tag_name"];?>
                                <li><?php echo $tag;?> </li>
                          <?php  } ?>
                        </ul>
                    </div>

                </div>

            </div>

        </div>






    <?php }

    ?>


</body>

</html>
