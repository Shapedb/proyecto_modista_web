<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');

$nomNombreRopa=$_POST['txtRopa'];
$nomNombreMedidas=$_POST['txtMedida'];

echo $nomNombreMedidas;
echo $nomNombreRopa;
/*Insertar Medidas*/

$consulta_1 = "INSERT INTO `tipo_medida`(`CVE_MEDIDA`, `CVE_TIPO_ROPA`) VALUES ('$nomNombreRopa','$nomNombreRopa')";


$resultado2 = mysqli_query($conexion,$consulta_1);

if ($resultado2) {
    echo " <script> alert('Se ha añadido al Usuario con exito.'); 
    window.location='../../layout/medida.php' </script>";
}

mysqli_close($conexion);
?>