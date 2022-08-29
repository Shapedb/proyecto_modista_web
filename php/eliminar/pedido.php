<?php
include('../database/conexion.php');

$po = $_POST['txtIDEM'];
$idp = $_POST['idP'];

/*--*/

$consultaPe= "SELECT * FROM `pedido` WHERE CVE_PEDIDO = '$idp' ";
$resultadoPe = mysqli_query($conexion,$consultaPe);
$mostrarPe = mysqli_fetch_array($resultadoPe);
$idPe = $mostrarPe['CVE_PEDIDO'];
$c = $mostrarPe['CANTIDAD'] - 1;

/*-Update-*/

$ud = "UPDATE `pedido` SET `CANTIDAD`='$c' WHERE CVE_PEDIDO = '$idp';";
mysqli_query($conexion,$ud);

/*--*/

$actualizar = "DELETE FROM `medida_ropa` WHERE CVE_ROPA = $po";
$consulta1 = "DELETE FROM `ropa` WHERE CVE_ROPA = $po";


$resultado=mysqli_query($conexion,$actualizar);
$resultado1=mysqli_query($conexion,$consulta1);

if ($resultado1) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/agendar_mostrar.php' </script>";
}


mysqli_close($conexion);

?>