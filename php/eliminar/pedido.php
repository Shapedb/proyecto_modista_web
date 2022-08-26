<?php
include('../database/conexion.php');

$po = $_POST['txtIDEM'];


$actualizar = "DELETE FROM `medida_ropa` WHERE CVE_ROPA = $po";
$consulta1 = "DELETE FROM `ropa` WHERE CVE_ROPA = $po";


$resultado=mysqli_query($conexion,$actualizar);
$resultado1=mysqli_query($conexion,$consulta1);

if ($resultado1) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}


mysqli_close($conexion);

?>