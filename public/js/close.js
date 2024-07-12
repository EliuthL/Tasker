document.addEventListener('DOMContentLoaded', function () {
    var closeButton = document.getElementById('btn-close');
    closeButton.addEventListener('click', function () {
        this.closest('.alert').remove(); // Cierra la ventana de alerta
    });
});

document.addEventListener('DOMContentLoaded', function () {
    setTimeout(function () {
        document.getElementById('modal').remove();
    }, 5000);
});