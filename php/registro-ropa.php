<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');
 
if ($inc) {
    $consulta = "SELECT CVE_TIPO_ROPA FROM `tipo_ropa` ORDER BY CVE_TIPO_ROPA DESC LIMIT 1; ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idRopa = $numero['CVE_TIPO_ROPA'] + 1;
}

$nomRopa=$_POST['txtRopa'];

$consulta = "INSERT INTO `tipo_ropa` (`CVE_TIPO_ROPA`, `NOMBRE`) 
VALUES ('$idRopa', '$nomRopa')";

$resultado=mysqli_query($conexion,$consulta);
if ($resultado) {
    echo " <script> alert('Se ha añadido la nueva ropa con exito.'); 
    window.location='../layout/ropa.php' </script>";
}


mysqli_close($conexion);
?>