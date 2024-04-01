var textareaComentario = document.getElementById("comentario");
var inputEnviarComentario = document.getElementById("enviarComentario");

textareaComentario.addEventListener("input", function() {
  if (textareaComentario.value.length > 0) {
    inputEnviarComentario.style.display = "block";
  } else {
    inputEnviarComentario.style.display = "none";
  }
});
