<?php

include('../database/conexion.php');




$idropa = $_POST['cve'];
$pedi = $_POST['txtEpedido'];

$consulta_1 = "UPDATE `ropa` SET `CVE_ESTADO_PEDIDO`= '$pedi' WHERE CVE_ROPA =  '$idropa'";

$io = mysqli_query($conexion,$consulta_1);

if ($io) {
    echo " <script> alert('Se ha añadido el Pedido con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}

?>