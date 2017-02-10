<?php
  if($key > 0) {
      $path = $entries[$key - 1];
      $new_path = basename($path, '.php');
      echo '<a href="index.php?article='. $new_path  . '" class="button left">Précédent</a>';
    }

  if($key < count($entries) - 1)   {
    $path = $entries[$key + 1];
    $new_path = basename($path, '.php');
    echo '<a href="index.php?article='. $new_path  . '" class="button right">Suivant</a>';
  }
?>
