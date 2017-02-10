/* Permet de reload la page et de charger le nouveau fichier automatiquement dans le menu de navigation à droite */

$(function() {
    $('#link-form').click(function() {
      $('#texteJQ').html('Hello world. Ce texte est affiché par jQuery.');
    });
});
