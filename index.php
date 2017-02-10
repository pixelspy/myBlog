<?php
$entries = array_diff(scandir("articles", 1), array('.', '..', '.php') );
$key = array_search($_GET['article'] . ".php", $entries);

$languagef = $_POST['language'];
$titlef = $_POST['title'];
$contentf = $_POST['content'];

function createArticle($language, $title, $content)
{
  if(!empty($language))
  {
    $today = date('Y-m-d');
    $navNav = "<?php include 'nav_article.php'; ?>";
    $newArticleTitle = $today . ".php";
    $createdFile = fopen( "./articles/$newArticleTitle", 'x+');
    fputs($createdFile, $navNav);
    fputs($createdFile, $title);
    fputs($createdFile, $content);
    fclose($createdFile);
  }
}

createArticle($languagef, $titlef, $contentf);
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style2.css">
    <title>Le p'tit blog d'un jeu dev !</title>
    <script type="text/javascript" src="js/jquery-3.1.1.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
  </head>
  <body>

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

    <main class="flex black">
      <article class="article-container">
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

      <nav class="nav-main pink">
        <div class="masque pink"></div>
        <h3 class="font-color-green">Mes Articles</h3>
        <ul class="list-main">

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

      <div class="form-container green flex flexColumn">
        <h3 class="font-color-pink">Nouvel Article</h3>
        <form id="form" action="index.php" method="post">
          <input type="text" name="language" value="">
          <input type="text" name="title" value="<h4></h4>">
          <textarea name="content" rows="8" cols="32"><p></p></textarea>
          <input type="submit" name="" value="Submit" id="submit" class="black">
        </form>
      </div>

    </main>
    <footer>
    </footer>
  </body>
</html>
