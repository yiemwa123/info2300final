<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Studio Ghibli</title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<body>

    <?php include("includes/navbar.php"); ?>


    <div class="content">
        <h2>All Movies</h2>
        <?php
        $sql = "SELECT movies.movie_name, images.image_ext, images.id FROM movies INNER JOIN images ON movies.image_id=images.id;";
        $exec = exec_sql_query($db, $sql);
        if ($exec) {
            $movies = $exec->fetchALL();
            foreach ($movies as $movie) {
                $imageid = $movie["id"];
                settype($id, "string");
                $moviename = $movie["movie_name"];
                $ext = $movie["image_ext"];
                $movieid = $movie["movies.id"];
                $details = "one.php?id=" . $imageid;
                printblock("uploads/images/" . $imageid . "." . $ext, $moviename, $details, $imageid);
            }
        }

        ?>
    </div>


</body>

</html>
