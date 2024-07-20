function openModal() {
    document.getElementById('myModal').style.display = "block";
}

// Cierra el modal
function closeModal() {
    document.getElementById('myModal').style.display = "none";
}

// Envía el formulario identificado por 'myForm'
function submitForm() {
    document.getElementById('deleteTask').submit();
}