document.getElementById('formulario-busqueda').addEventListener('submit', function (event) {
    event.preventDefault(); // Evita que el formulario se envíe de la manera tradicional

    var formData = new FormData(document.getElementById('formulario-busqueda')); // Recoge todos los datos del formulario

    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'buscar.php', true);

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            document.getElementById('resultados').innerHTML = xhr.responseText;
        }
    };

    xhr.send(formData); // Envía todos los datos del formulario
});