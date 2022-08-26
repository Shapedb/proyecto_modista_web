<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');


$idM=$_POST['txtIDEM'];


$consulta3 = "DELETE FROM `tipo_medida` WHERE CVE_MEDIDA = $idM;";
$consulta2 = "DELETE FROM `tipo_medida` WHERE CVE_MEDIDA = $idM;";
$consulta = "DELETE FROM `medidas` WHERE CVE_MEDIDA = $idM;";


$resultado2=mysqli_query($conexion,$consulta2);
$resultado=mysqli_query($conexion,$consulta);

if ($resultado2) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/medida.php' </script>";
}


mysqli_close($conexion);
?>