<?php
require_once('modelo.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los valores ingresados en el formulario
    $cedula = $_POST['cedula'];
    $contrasena = $_POST['password'];

    // Verificar la cédula y la contraseña en la base de datos
    $usuario = usuario::obtener_por_cedula($cedula);
    if ($usuario) {
        // Comparar la contraseña ingresada con la almacenada en la base de datos
        if ($contrasena === $usuario['contrasena']) {
            // Inicio de sesión exitoso
            echo "Inicio de sesión exitoso";
        } else {
            // Contraseña incorrecta
            echo "La contraseña ingresada es incorrecta";
        }
    } else {
        // Usuario no encontrado en la base de datos
        echo "No se encontró ningún usuario con la cédula ingresada";
    }
}
?>
