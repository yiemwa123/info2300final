<?php include("includes/init.php");
const inputs = array("Title: " => "title", "Year: " => "year", "Rating: " => "rating", "Synopsis: " => "synopsis", "Tag: " => "tag"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Studio Ghibli</title>
    <link rel="stylesheet" type="text/css" href="styles/site.css" media="all" />
</head>

<?php

// function that prints all the inputs for the form
function printinput()
{
    foreach (inputs as $field => $value) { ?>
        <div class=row>
            <label class="label" for="<?php echo $value; ?>"> <?php echo $field ?> </label>
            <input id="<?php echo $value; ?>" type="text" name="<?php echo $value; ?>" />
        </div>

<?php }
} ?>

<body>
    <?php include("includes/navbar.php"); ?>
    <h2> Add Movie </h2>

    <form id="addmovie" action="form.php" method="post" novalidate>
        <?php printinput(); ?>
        <!-- insert upload button here -->
        <div class="formbutton">
            <button class="addmovie" type="submit"> Add Movie</button>
        </div>
    </form>
</body>

</html>
