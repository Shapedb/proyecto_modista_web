<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');


$idM=$_POST['txtIM'];

$actualizar = "UPDATE `ropa` SET `CVE_TIPO_ROPA`='0' WHERE CVE_TIPO_ROPA = $idM;";
$consulta1 = "DELETE FROM `tipo_medida` WHERE CVE_TIPO_ROPA = $idM;";
$consulta2 = "DELETE FROM `tipo_ropa` WHERE CVE_TIPO_ROPA = $idM;";


$resultado=mysqli_query($conexion,$actualizar);
$resultado1=mysqli_query($conexion,$consulta1);
$resultado2=mysqli_query($conexion,$consulta2);


if ($resultado2) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/ropa.php' </script>";
}


mysqli_close($conexion);
?>