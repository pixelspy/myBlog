/* Permet de reload la page et de charger le nouveau fichier automatiquement dans le menu de navigation à droite */
$(document).ready(function(){
  $('#form').hide();

  $( "#link-form" ).click(function() {
    $( '#form' ).fadeIn();
  });
})
