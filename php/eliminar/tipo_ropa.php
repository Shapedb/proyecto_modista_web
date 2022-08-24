<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');


$idR=$_POST['txtIDER'];
$idM=$_POST['txtIDEM'];

$consulta = "DELETE FROM `tipo_medida` WHERE CVE_MEDIDA = $idM AND CVE_TIPO_ROPA = $idR;";

$resultado=mysqli_query($conexion,$consulta);
if ($resultado) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/medida.php' </script>";
}


mysqli_close($conexion);
?>