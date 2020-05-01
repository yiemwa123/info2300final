<?php include("includes/init.php"); ?>
<!DOCTYPE html>
<html lang="en">

<?php include("includes/head.php"); ?>

<body>

    <?php include("includes/navbar.php"); ?>


    <div class="content">
        <h2>All Movies</h2>
        <?php
        $sql = "SELECT movies.movie_name, images.image_ext, movies.id, movies.sources FROM movies INNER JOIN images ON movies.image_id=images.id;";
        $exec = exec_sql_query($db, $sql);
        if ($exec) {
            $movies = $exec->fetchALL();
            foreach ($movies as $movie) {
                settype($id, "string");
                $moviename = $movie["movie_name"];
                $ext = $movie["image_ext"];
                $movieid = $movie["id"];
                $sources = $movie["sources"];
                $details = "one.php?" . http_build_query(array('id'=>$movieid));
                printblock("uploads/images/" . $movieid . "." . $ext, $moviename, $details, $sources);
            }
        }

        ?>
    </div>


</body>

</html>
