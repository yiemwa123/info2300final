<?php

// this partial does not work on pages that also use sql queries
$sql = "SELECT * FROM tags;";
$result = exec_sql_query($db, $sql);
$tags = $result->fetchALL();
?>
<!-- prints all the tags in the tags table -->
<ul class="tags">

    <?php
    foreach ($tags as $tag) { ?>

        <li><?php echo $tag["tag_name"] ?></li>

    <?php }
    ?>

</ul>
