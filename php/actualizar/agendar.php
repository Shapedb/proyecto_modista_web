<?php

include('../database/conexion.php');

$fechaE = $_POST['txtFechaE'];
$can = $_POST['txtCantidad'];
$pe = $_POST['txtEP'];
$cli = $_POST['txtNombre'];
$id = $_POST['idpi'];
$precio = $_POST['txtPrecio'];

/*----------------------------*/
$consulta_1 = "UPDATE `pedido` SET `CVE_ESTADO`='$pe',`CANTIDAD`='$can',`FECHA_ENTREGADO`='$fechaE',`CLIENTE`='$cli', `PRECIO` = '$precio' WHERE CVE_PEDIDO = '$id'";

$io = mysqli_query($conexion,$consulta_1);

if ($io) {
    echo " <script> alert('Se ha actualizado con exito'); 
    window.location='../../layout/agendar_mostrar.php' </script>";
}

?>