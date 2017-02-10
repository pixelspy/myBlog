<?php
$entries = array_diff(scandir("articles", 1), array('.', '..') );
$key = array_search($_GET['article'] . ".php", $entries);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title>Blog de Charles Fournier</title>
  </head>
  <body>
    <header>
      <h1><a href="index.php">Charles Fournier</a></h1>
      <nav>
        <ul>
          <li><a href="#">HTML</a></li>
          <li><a href="#">CSS</a></li>
          <li><a href="#">JS</a></li>
          <li><a href="#">PHP</a></li>
        </ul>
      </nav>
    </header>
    <main>

      <article class="">
        <?php
        $articles_dir = "articles";
        $show_article = false;
        if(isset($_GET['article']))
        {
          $article_path = "$articles_dir/" . $_GET['article'] . ".php";
          if(
            dirname(
                realpath($article_path)
              ) == (
                realpath("./$articles_dir")
              )
            ) {
                
              include $article_path;
            }
         }
        ?>
      </article>

      <nav class="nav-list-article">
        <ul class="list-article">

          <?php
          if(!$show_article) {
            foreach ($entries as $entrie)
             {
              $file_name = basename($entrie, '.php');
              echo '<li><a href="index.php?article=' . $file_name . '">' . $file_name . '</a></li>';
             }
          }

          ?>
        </ul>
      </nav>
    </main>
    <footer></footer>
  </body>
</html>
