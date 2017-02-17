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
          $('.closeFormContainer').fadeIn().addClass('animated');
          $('.closeFormContainer').addClass('changeBar');
          $('.form-container h3').fadeIn();
        }
      });
  });
});


$(document).ready(function () {
    $('.closeForm').click(function () {
      if($('.article-container').hasClass('fadeOut')) {
        $('.closeFormContainer').removeClass('changeBar');

        function closeFormBoxCloser() {
          $('.closeFormContainer').removeClass('animated').fadeOut();
        }

        function closeFormContent() {
          $('#form').fadeOut();
          $('.form-container h3').fadeOut()
        }

        function closeFormContainer() {
          $('.form-container').animate({
              width:"4px"
            },
            {
              duration: 800,
              easing: "easeInBack",
              complete: function () {
                $('.article-container').removeClass('fadeOut');
              }
            });
        }
        setTimeout(closeFormBoxCloser, 400);
        setTimeout(closeFormContainer, 800);
        setTimeout(closeFormContent, 1000);
      }
    });
});
