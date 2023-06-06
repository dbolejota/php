<?php
function conectar() {
    $host = '172.17.9.37';
    $puerto = 3306;
    $usuario = 'root';
    $contraseña = '123';
    $base_de_datos = 'Piel_de_Seda';

    $conexion = mysqli_connect($host, $usuario, $contraseña, $base_de_datos, $puerto);

    if (!$conexion) {
        die('Error al conectar a la base de datos: ' . mysqli_connect_error());
    }

    return $conexion;
}
?>
