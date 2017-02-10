<?php
$language = $_POST['language'];
$title = $_POST['title'];
$content = $_POST['content'];

function createArticle($language, $title, $content)
{
    $date = date('Y-m-d');
    $navNav = "<?php include 'nav_article.php'; ?>";
    $newArticleTitle = $date . ".php";
    $createdFile = fopen( "./articles/$newArticleTitle", 'x+');
    fwrite($createdFile, $navNav);
    fwrite($createdFile, $title);
    fwrite($createdFile, $content);
    fclose($createdFile);
}

createArticle($language, $title, $content);
