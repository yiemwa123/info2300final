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
    <h2> Add Movie </h2>

    <form id="addmovie" action="form.php" method="post" novalidate>
        <div class=row>
            <label class="label" for="title"> Title: </label>
            <input id="title" type="text" name="title" />
        </div>
        <div class="row">
            <label class="label" for="year"> Year: </label>
            <input id="year" type="text" name="year" />
        </div>
        <div class="row">
            <label class="label" for="rating"> Rating: </label>
            <input id="rating" type="text" name="rating" />
        </div>
        <div class="row">
            <label class="label" for="synopsis"> Synopsis: </label>
            <input id="synopsis" type="text" name="synopsis" />
        </div>
        <!-- insert upload button here -->
        <div class="row">
            <label class="label" for="tag"> Tag: </label>
            <input id="tag" type="text" name="tags" />
        </div>
        <button class="plus" type="submit"> Add Movie</button>
    </form>

</body>

</html>
