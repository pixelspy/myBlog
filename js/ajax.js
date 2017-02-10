$('body').on("click", "#submit", function () {
    var language = $("#language").val();
    var title = $('#title').val();
    var content = $('#content').val();
    var date;
    $.ajax({
      url: './data.php',
      type: 'POST',
      data: {language: language},
      dataType: 'html',
      success: function() {
        console.log("ajouté");
        $( ".nav-main" ).load();
      },
      error: function () {
        alert("bug!!");
      }
    });
  });
