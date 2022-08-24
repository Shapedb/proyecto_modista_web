<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');
 
if ($inc) {
    $consulta = "SELECT CVE_TIPO_TELA FROM `tipo_de_tela` ORDER BY CVE_TIPO_TELA DESC LIMIT 1; ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idTela = $numero['CVE_TIPO_TELA'] + 1;
}

$nomTela=$_POST['txtTela'];

$consulta = "INSERT INTO `tipo_de_tela`(`CVE_TIPO_TELA`, `TIPO_TELA`) 
VALUES ('$idTela','$nomTela')";

$resultado=mysqli_query($conexion,$consulta);
if ($resultado) {
    echo " <script> alert('Se ha añadido la tela con exito.'); 
    window.location='../layout/ropa.php' </script>";
}


mysqli_close($conexion);
?>