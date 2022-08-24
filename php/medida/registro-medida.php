<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');
 
if ($inc) {
    $consulta = "SELECT CVE_MEDIDA FROM `medidas` ORDER BY CVE_MEDIDA DESC LIMIT 1;   ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idMedida = $numero['CVE_MEDIDA'] + 1;
}

$nomNombreMedidas=$_POST['txtMedi'];

/*Insertar Medidas*/

$consulta_1 = "INSERT INTO `medidas`(`CVE_MEDIDA`, `MEDIDA`) VALUES ('$idMedida','$nomNombreMedidas')";


$resultado2 = mysqli_query($conexion,$consulta_1);

if ($resultado2) {
    echo " <script> alert('Se ha añadido al Usuario con exito.'); 
    window.location='../../layout/medida.php' </script>";
}

mysqli_close($conexion);
?>