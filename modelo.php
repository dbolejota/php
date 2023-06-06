<?php
require_once('conexion.php');

class Usuario {
    private $idcedula;
    private $nombres;
    private $apellidos;
    private $telefono;

    public function __construct($idcedula, $nombres, $apellidos, $telefono) {
        $this->idcedula = $idcedula;
        $this->nombres = $nombres;
        $this->apellidos = $apellidos;
        $this->telefono = $telefono;
    }

    public function guardar() {
        $conexion = conectar();
        if ($conexion) {
            $consulta = "INSERT INTO usuarios (idcedula, nombres, apellidos, telefono) VALUES ('$this->idcedula', '$this->nombres', '$this->apellidos', '$this->telefono')";
            $resultado = mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            return $resultado;
        }
        return false;
    }

    public function actualizar() {
        $conexion = conectar();
        if ($conexion) {
            $consulta = "UPDATE usuarios SET nombres = '$this->nombres', apellidos = '$this->apellidos', telefono = '$this->telefono' WHERE idcedula = '$this->idcedula'";
            $resultado = mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            return $resultado;
        }
        return false;
    }

    public function eliminar() {
        $conexion = conectar();
        if ($conexion) {
            $consulta = "DELETE FROM usuarios WHERE idcedula = '$this->idcedula'";
            $resultado = mysqli_query($conexion, $consulta);
            mysqli_close($conexion);
            return $resultado;
        }
        return false;
    }

    public static function obtener_por_cedula($idcedula) {
        $conexion = conectar();
        if ($conexion) {
            $consulta = "SELECT * FROM usuarios WHERE idcedula = '$idcedula'";
            $resultado = mysqli_query($conexion, $consulta);
            $fila = mysqli_fetch_assoc($resultado);
            mysqli_close($conexion);
            return $fila;
        }
        return null;
    }
}
?>
