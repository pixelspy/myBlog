<?php include 'nav_article.php'; ?><h4>Plein de progress bar</h4><p>V'là mon code :

  function widthOnCompetence(elemToAnim,property) {
    var width = 1;
    var value;
    var id = setInterval(frame, 10);
    function frame() {
        if (width >= property) {
            clearInterval(id);
        } else {
            width++;
            value =  (width * 2) + 'px';
            elemToAnim.css("width", value);
            elemToAnim.text(width + '%');

            if (property < 40){
              elemToAnim.css("backgroundColor", "#856fff");
            } else if ((property >= 40) && (property < 55)) {
              elemToAnim.css("backgroundColor", "#b9cbe8");
            } else if ((property >= 55) && (property < 70)){
              elemToAnim.css("backgroundColor", "#b2ff59");
            } else {
              elemToAnim.css("backgroundColor", "#2cff61");
            }
        }
    }
  }

  var i = 0;

  for (i = 0  ; i <= 100; i+=5) {
      widthOnCompetence($(".w" + i), i);
  }
});

</p>