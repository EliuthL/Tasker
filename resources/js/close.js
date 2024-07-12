document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.getElementById('btn-close');
    closeButton.addEventListener('click', function () {
        this.closest('.alert').remove(); // Cierra la ventana de alerta
    });
});