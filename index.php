<?php

$entries = array_diff(scandir("articles", 1), array('.', '..', '.php') );
$key = array_search($_GET['article'] . ".php", $entries);

$language = $_POST['language'];
$title = '<h4>' . $_POST['title'] . '</h4>';
$content =  '<p>' . $_POST['content'] . '</p>';
$today = date('Y-m-d');

function newArticleInList() {
  global $entries;
  $entries = array_diff(scandir("articles", 1), array('.', '..', '.php') );
}

function createArticle($language, $title, $content)
{
  if(!empty($language))
  {
    global $today;

    $navNav = "<?php include 'nav_article.php'; ?>";
    $newArticleTitle = $today . ".php";
    $createdFile = fopen( "./articles/$newArticleTitle", 'x+');
    fputs($createdFile, $navNav);
    fputs($createdFile, $title);
    fputs($createdFile, $content);
    fclose($createdFile);
    newArticleInList();
  }
}

createArticle($language, $title, $content);
?>

<!-- ************************************************************************************************************ hTML *************************************** ********************************************************************* -->

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <title>Le p'tit blog d'un jeu dev !</title>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/ease.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

<!-- ************************************************************************************************************ HEADER *************************************** ********************************************************************* -->


    <header class="flex">
      <h1><a href="index.php" class="title">CHARLES<span class="pink-span">.</span>FOURNIER</a></h1>
      <nav class="nav-header">
        <ul class="flex">
          <li><a href="#" class="a">HTML</a></li>
          <li><a href="#" class="a">CSS</a></li>
          <li><a href="#" class="a">JS</a></li>
          <li><a href="#" class="a">PHP</a></li>
        </ul>
      </nav>
    </header>

<!-- ************************************************************************************************************ DEBUT MAIN *************************************** ********************************************************************* -->

    <main class="flex black">
      <article class="article-container">

        <!-- Script pour remplir la contenu principal -->

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
         else
        {
            include "accueil.php";
         }
        ?>
      </article>

<!-- ************************************************************************************************************ NAVIGATION *************************************** ********************************************************************* -->

      <nav class="nav-main pink">
        <div class="masque pink"></div>
        <h3 class="font-color-green">Mes Articles</h3>
        <ul class="list-main">

          <!-- Script pour remplir la nav-main -->

          <?php
          if(!$show_article) {
            foreach ($entries as $entrie)
             {
              $file_name = basename($entrie, '.php');
              echo '<li class="li-main"><a href="index.php?article=' . $file_name . '" class="a">' . $file_name . '</a></li>';
             }
          }

          ?>
        </ul>
      </nav>

<!-- ************************************************************************************************************ FORMULAIRE *************************************** ********************************************************************* -->

      <div class="form-container green flex flexColumn">
        <div class="closeFormContainer changeBar">
          <div class="closeForm bar1 black"></div>
          <div class="closeForm bar2 black"></div>
        </div>
        <h3 class="font-color-pink">Nouvel Article</h3>
        <form id="form" action="index.php?article=<?= $today ?>" method="post">
          <input type="text" name="language" value="" class="input">
          <input type="text" name="title" value="" class="input">
          <textarea name="content" rows="8" cols="26"></textarea>
          <input type="submit" name="" value="Submit" id="submit" class="black">
        </form>
      </div>

    </main>
    <footer>
    </footer>
  </body>
</html>
