<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');

if ($inc) {
    $consulta = "SELECT CVE_TIPO_MEDIDA FROM `tipo_medida` ORDER BY CVE_TIPO_MEDIDA DESC LIMIT 1; ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idMR = $numero['CVE_TIPO_MEDIDA'] + 1;
}

$nomNombreRopa=$_POST['txtRopaM'];

echo $nomNombreRopa;

$nomNombreMedidas=$_POST['txtEm'];
echo $nomNombreMedidas;
/*Insertar Medidas*/

$consulta_1 = "INSERT INTO `tipo_medida`(`CVE_TIPO_MEDIDA`,`CVE_MEDIDA`, `CVE_TIPO_ROPA`) VALUES ('$idMR','$nomNombreMedidas','$nomNombreRopa')";


$resultado2 = mysqli_query($conexion,$consulta_1);

if ($resultado2) {
    echo " <script> alert('Se ha añadido se  relacionaron con exito.'); 
    window.location='../../layout/medida.php' </script>";
}

mysqli_close($conexion);
?>