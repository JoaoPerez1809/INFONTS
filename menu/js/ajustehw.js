$(document).ready(function() {

    var $categoriahw = $('#categoriahw');
  
    function ajustarWidth() {
      var valorSelecionado = $categoriahw.val();
      var width;
  
      if (valorSelecionado) {
        if (valorSelecionado === 'Placa de Vídeo') {
          width = '119px';
        } else if (valorSelecionado === 'HD') {
          width = '50px';
        }
        else if (valorSelecionado === 'SSD') {
          width = '60px';
        }
        else if (valorSelecionado === 'Fonte') {
          width = '65px';
        }
        else if (valorSelecionado === 'Gabinete') {
          width = '80px';
        }
        else if (valorSelecionado === 'Memória RAM') {
          width = '113px';
        }
        else if (valorSelecionado === 'Placa-Mãe') {
          width = '90px';
        }
        else{
          width = '100px';
        }
      } else {
        width = '9.8em';
      }
  
      $categoriahw.css('width', width);
    }
  
    ajustarWidth();
    $categoriahw.on('change', ajustarWidth);
  });