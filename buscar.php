<?php
require 'conexion.php';

$busqueda = $_POST['busqueda'];

if (isset($_POST['numero'])) {
    $consulta = mysqli_query($conexion, "SELECT * FROM entradas WHERE numero = '$busqueda'");
} elseif(isset($_POST['texto'])) {
    $consulta = mysqli_query($conexion, "SELECT * FROM entradas WHERE texto LIKE '%$busqueda%'");
} else {
    $consulta = mysqli_query($conexion, "SELECT * FROM entradas WHERE numero LIKE '%$busqueda%' OR texto LIKE '%$busqueda%'");
}

if (mysqli_num_rows($consulta) > 0) {
    while ($campo = mysqli_fetch_assoc($consulta)) {
        echo $campo['numero'] . '<br>';
        echo $campo['texto'] . '<br>';
    }
} else {
    echo 'No se ha encontrado resultado';
}