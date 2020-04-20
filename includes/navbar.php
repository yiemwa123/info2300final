<div class="heading">
  <!-- Source: https://filmschoolrejects.com/the-movies-of-studio-ghibli-ranked-from-worst-to-best-b480bffd7fb7/-->
  <div class="logo">
    <a href="index.php">
      <img src="images/ghiblilogo.jpg" alt="Studio Ghibli Logo">
    </a>
    <p> Source: <cite><a href="https://filmschoolrejects.com/the-movies-of-studio-ghibli-ranked-from-worst-to-best-b480bffd7fb7/">Film School Rejects</a></cite> </p>
  </div>
  <div class="forms">
    <div class="group">
      <form id="ghiblisearch" action="index.php" method="get" novalidate>
        <div class="search">
          <select name="field">
            <option value="title">Title</option>
            <option value="tags">Keywords</option>
          </select>
          <label for="bar"></label>
          <input id="bar" class="bar" name='moviesearch' type="text" placeholder="Search a Studio Ghibli Movie" />
          <!-- Source: https://thenounproject.com/search/?q=search%20icon&i=2443377-->
          <button class="button" type="submit"><img src="images/searchicon.png" alt="Search Icon"></button>
        </div>
      </form>
      <p class="cite"> Source for button photo: <cite><a href="https://thenounproject.com/search/?q=search%20icon&i=2443377">icon search by Graphiqu from the Noun Project </a></cite> </p>
    </div>
  </div>
</div>

<?php

// This function prints out a block with a photo and movie name formatted properly
function printblock($img, $moviename){?>

<div class="block">
  <img src="<?php echo($img);?>" alt="Theatrical poster for <?php echo ($moviename)?>"/>
  <p> <?php echo ($moviename)?> </p>
</div>

<?php }?>
