// Selecciona el elemento que contiene el mensaje flash
var flashMessage = document.querySelector('.flash-message');

// Si el elemento existe
if (flashMessage) {
    // Oculta el mensaje después de 5 segundos (5000 milisegundos)
    setTimeout(function () {
        flashMessage.style.display = 'none';
    }, 2000);
}