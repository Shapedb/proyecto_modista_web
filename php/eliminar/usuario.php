<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');


$idM=$_POST['txtIDEM'];


$actualizar1 = "UPDATE `citas` SET `CVE_EMPLEADO`='0' WHERE CVE_EMPLEADO = $idM";
$actualizar2 = "UPDATE `ropa` SET `CVE_EMPLEADO`='0' WHERE CVE_EMPLEADO = $idM";

$eliminar = "DELETE FROM `usuario` WHERE CVE_USUARIO = $idM";
$eliminar1 = "DELETE FROM `empleado` WHERE CVE_EMPLEADO = $idM";
$eliminar2 = "DELETE FROM `personas` WHERE CVE_PERSONA = $idM";


mysqli_query($conexion,$actualizar1);
mysqli_query($conexion,$actualizar2);
mysqli_query($conexion,$eliminar);
mysqli_query($conexion,$eliminar1);
$resultado2=mysqli_query($conexion,$eliminar2);


if ($resultado2) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/administarar-usuarios.php' </script>";
}


mysqli_close($conexion);
?>