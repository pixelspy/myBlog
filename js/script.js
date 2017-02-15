/* Permet de reload la page et de charger le nouveau fichier automatiquement dans le menu de navigation à droite */
$(document).ready(function(){


  $( "#link-form" ).click(function() {
    $('.article-container').addClass('animated fadeOut');
    $('.form-container').animate({
        width:"450px"
      },
      {
        duration :1200,
        easing: 'easeOutBack',
        complete: function () {
          $('#form').fadeIn();
          $('.closeFormContainer').fadeIn();
          $('.form-container h3').fadeIn();
        }
      });
  });
});


$(document).ready(function () {
    $('.closeForm').click(function () {
      if($('.article-container').hasClass('fadeOut')) {
        $('.closeFormContainer').removeClass('changeBar');
      }
    });
});
