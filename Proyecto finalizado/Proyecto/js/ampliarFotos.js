
/**
 * @var modal     Variable para llamar el id de myModal
 */
var modal = document.getElementById('myModal');
/**
 * @var img       Variable para llamar el id de myImg
 */
var img = document.getElementById('myImg');
/**
 * @var modalImg    Variable para llamar el id de img01
 */
var modalImg = document.getElementById("img01");
/**
 * @var captionText   Variable para llamar el id de caption
 */
var captionText = document.getElementById("caption");
/**
 * Cuando le de clic en la imagen
 * se abre la ventana modal, con la imagen que le dio clic
 */
img.onclick = function(){
  modal.style.display = "block";
  modalImg.src = this.src;
  captionText.innerHTML = this.alt;
}
/**
 * @var span    Variable que llama la clase de close
 * Para cerrar la ventana modal
 */
var span = document.getElementsByClassName("close")[0];
span.onclick = function() { 
  modal.style.display = "none";
} 