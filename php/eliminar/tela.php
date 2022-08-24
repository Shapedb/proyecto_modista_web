<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');


$idM=$_POST['txtIM'];

$actualizar = "UPDATE `ropa` SET `CVE_TIPO_TELA`='0' WHERE CVE_TIPO_TELA = $idM;";
$consulta2 = "DELETE FROM `tipo_de_tela` WHERE CVE_TIPO_TELA = $idM;";


$resultado=mysqli_query($conexion,$actualizar);
$resultado2=mysqli_query($conexion,$consulta2);


if ($resultado2) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/tela.php' </script>";
}


mysqli_close($conexion);
?>