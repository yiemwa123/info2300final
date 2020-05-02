<?php include("includes/init.php");

$movie_id = $_GET["id"];
$movie_id = filter_var($movie_id, FILTER_SANITIZE_NUMBER_INT);
settype($movie_id, "integer");
$result = reload($db, $movie_id);
function reload($db, $movie_id)
{
    $sql = "SELECT movies.movie_name, images.image_ext, tags.tag_name, movies.image_id, movies.year, movies.rating, movies.synopsis, tags.id,movies.sources FROM movies INNER JOIN images ON movies.image_id=images.id INNER JOIN imagetotag ON images.id=imagetotag.image_id INNER JOIN tags ON tags.id=imagetotag.tag_id WHERE (movies.id=:id);";
    $params = array(':id' => $movie_id);
    $result = exec_sql_query($db, $sql, $params);
    return $result;
}

if ($result) {
    $records = $result->fetchALL();
    $name = $records[0]["movie_name"];
    $img = $records[0]["image_id"];
    settype($img, 'integer');
    $ext = $records[0]["image_ext"];
    $path = "uploads/images/" . $img . "." . $ext;
    $year = $records[0]["year"];
    $rating = $records[0]["rating"];
    $synopsis = $records[0]["synopsis"];
    $source = $records[0]["sources"];


    foreach ($records as $record) {
        $deleteid = $record["id"];
        settype($deleteid, "integer");
        if (isset($_POST[$deleteid])) {
            $sql = "DELETE FROM imagetotag WHERE tag_id=:counter AND image_id=:imgid;";
            $params = array(":counter" => $deleteid, ":imgid"=>$img);
            exec_sql_query($db, $sql, $params);
            $records = reload($db, $movie_id)->fetchALL();
        }
    }


    if (isset($_POST['delete'])) {
        $sql = "DELETE FROM images WHERE id=:imgid;";
        $params = array(':imgid' => $img);
        exec_sql_query($db, $sql, $params);
        $sql = "DELETE FROM imagetotag WHERE image_id=:imgid;";
        $params = array(':imgid' => $img);
        exec_sql_query($db, $sql, $params);
        $sql = "DELETE FROM movies WHERE image_id=:imgid;";
        $params = array(':imgid' => $img);
        $delete = exec_sql_query($db, $sql, $params);
        unlink($path);
    }

    if (isset($_POST['addtag'])) {
        $taginput = $_POST["tag"];
        $taginput = filter_var($taginput, FILTER_SANITIZE_STRING);
        $tags = preg_split("/[\s,#]+/", $taginput, NULL, PREG_SPLIT_NO_EMPTY);
        foreach ($tags as $tag) {
            $sql = "INSERT INTO tags (tag_name) VALUES (:tag);";
            $params = array(':tag' => $tag);
            try {
                $result = exec_sql_query($db, $sql, $params);
                $lasttagid = $db->lastInsertId();
                $sql = "INSERT INTO imagetotag (image_id, tag_id) VALUES (:imageid, :tagid);";
                $params = array(':imageid' => $img, ":tagid" => $lasttagid);
                exec_sql_query($db, $sql, $params);
                $records = reload($db, $movie_id)->fetchALL();
            } catch (Exception $e) {
                $sql = "SELECT imagetotag.image_id, tags.id FROM tags INNER JOIN imagetotag ON imagetotag.tag_id=tags.id WHERE tags.tag_name=:tag AND imagetotag.image_id=:imgid;";
                $params = array(':tag' => $tag, ":imgid" => $img);
                $checks = exec_sql_query($db, $sql, $params);
                if ($checks) {
                    $results = $checks->fetchALL();
                    if (count($results) == 0) {
                        $sql = "SELECT id FROM tags WHERE tag_name=:tag";
                        $params = array(':tag' => $tag);
                        $checks = exec_sql_query($db, $sql, $params);
                        $tag_id = $checks->fetchALL()[0]["id"];
                        $sql = "INSERT INTO imagetotag (image_id, tag_id) VALUES (:imageid, :tagid);";
                        $params = array(':imageid' => $img, ":tagid" => $tag_id);
                        exec_sql_query($db, $sql, $params);
                        $records = reload($db, $movie_id)->fetchALL();
                    } else {
                        $already = "This image already has this tag";
                    }
                }
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>

<body>

    <?php include("includes/navbar.php"); ?>



    <?php
    if (!empty($movie_id)&&!empty($records)) {

        if (!isset($delete)) {
    ?>

            <div class="detailspage">
                <div class="menu" id="menu">
                    <h2><?php echo $name ?></h2>
                    <cite> Button source: <a href="https://pngio.com/images/png-a1138956.html">PNGIO</a></cite>
                    <form id="deletephoto" action="<?php echo "one.php?" . http_build_query(array('id' => $movie_id)) ?>" method="post" class="hidden" novalidate>
                    <!-- https://pngio.com/images/png-a1138956.html-->
                        <button name="delete" id="delete" type="submit"> <img src="images/delete.png" alt="delete button" /></button>
                    </form>
                </div>
                <div class="imagedetails">

                    <div class="row">
                        <div class="leftside">
                            <!-- <div class="menu" id="menu"> -->
                            <img src=<?php echo $path; ?> alt="Theatrical poster for <?php echo ($name) ?>" id="image" />
                            <!-- <form id="deletephoto" action="<?php //echo "one.php?id=" . $movie_id
                                                                ?>" method="post" class="hidden" novalidate>
                                    <button name="delete" id="delete" type="submit"> <img src="images/delete.png" alt="delete button" /></button>
                                    https://pngio.com/images/png-a1138956.html
                                </form>
                            </div> -->
                        </div>
                        <div class="details">
                            <p class="descr">Year Released: <?php echo $year; ?></p>
                            <p class="descr">Movie Rating: <?php echo $rating; ?></p>
                            <p class="descr">Synopsis: <?php echo $synopsis; ?></p>
                            <p class="descr">Tags: </p>

                            <?php
                            foreach ($records as $record) {
                                $counter = $record["id"];
                                $tag = $record["tag_name"]; ?>
                                <div class="tagrow" id="deletesection">
                                    <p class="tags"><?php echo $tag; ?> </p>
                                    <?php if (count($records) != 1) { ?>
                                        <div id="deletehover" class="deletehover hidden">
                                            <form id="<?php echo "deletetag" . $counter ?>" action="<?php echo "one.php?id=" . $movie_id ?>" class="deleteform" method="post" novalidate>
                                                <label for="delete"></label>
                                                <button class="deletetag" name="<?php echo $counter; ?>" id="<?php echo "delete" . $counter ?>">X</button>
                                            </form>
                                        </div>
                                    <?php } ?>
                                </div>


                            <?php
                            }
                            if (!empty($already)) {
                                echo "<p class='already'>" . $already . "</p>";
                            }
                            ?>

                            <form id="addtag" action="<?php echo "one.php?id=" . $movie_id ?>" method="post" novalidate>
                                <label class="label descr" for="tag"> Add Tag: </label>
                                <input id="tag" type="text" name="tag" required />
                                <button class="addtag" name="addtag">+</button>
                            </form>
                            <?php if (!empty($source)) { ?>
                                <cite>Source: <a href="<?php echo $source; ?>">Wikipedia</a></cite>
                            <?php } ?>

                        </div>

                    </div>

                </div>

            </div>








    <?php } else {
            echo "<h2>Movie successfully deleted</h2>";
        }
    } else {
        echo "<h2>No movie to display</h2>";
    }


    ?>


</body>

</html>
