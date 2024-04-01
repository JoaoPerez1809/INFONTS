$(document).ready(function() {
    var $ageRange = $('#ageRange');
  
    function ajustarWidth() {
      var valorSelecionado = $ageRange.val();
      var width;

      if (valorSelecionado) {
        if (valorSelecionado === 'L') {
          width = '42px';
        } else {
          width = '40px';
        }
      } else {

        width = '9.5em';
      }
  

      $ageRange.css('width', width);
    }

    ajustarWidth();
    $ageRange.on('change', ajustarWidth);
  });