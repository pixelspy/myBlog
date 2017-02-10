<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css">
    <title></title>
  </head>
  <body>
    <form class="" action="formulaire.php" method="post">
      <input type="text" name="date" value="">
      <input type="text" name="title" value="<h4></h4>">
      <textarea name="content" rows="8" cols="32"><p></p></textarea>
      <input type="submit" name="" value="Submit" id="submit">
    </form>
  </body>
</html>

<?php
  $dateForm = $_POST['date'];
  $titleForm = $_POST['title'];
  $contentForm = $_POST['content'];

  function createArticle($date, $title, $content)
  {
    $newArticle = $date . ".php";
    $createdFile = fopen($articles/$newArticle, 'x');
    fputs($createdFile, $title);
    fputs($createdFile, $content);
    
  }

  createArticle($dateForm, $titleForm, $contentForm);
?>
