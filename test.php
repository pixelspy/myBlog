<?php
if(in_array($_GET['article'], $entries)) {
  $longueur_tableau = count($entries) - 1;
  if($_GET['article'] != ($entries[$longueur_tableau])) {
    $key = array_search($_GET['article'], $entries) - 1;
    $testage = $entries[$key];
    echo '<a href=".?article='. $testage . '">précédent</a>';
  }
}

if(in_array($_GET['article'], $entries)) {
  if($_GET['article'] != ($entries[0])) {
    $key = array_search($_GET['article'], $entries) + 1;
    $testage = $entries[$key];
    echo '<a href=".?article='. $testage . '">suivant</a>';
  }
}
?>
