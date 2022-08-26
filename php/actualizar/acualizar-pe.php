<?php

include('../database/conexion.php');




$idropa = $_POST['cve'];
$cliente = $_POST['txtnombre'];
$ropa = $_POST['txtRopa'];
$tela = $_POST['txtTela'];
$fechac = $_POST['fc'];
$fechae = $_POST['fe'];
$epedido = $_POST['txtEpedido'];
$ecargo = $_POST['txtEm'];

$consulta_1 = "UPDATE `ropa` SET `CLIENTE`='hoLA' WHERE CVE_ROPA =  '$idropa'";

$io = mysqli_query($conexion,$consulta_1);

if ($io) {
    echo " <script> alert('Se ha añadido el Pedido con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}

?>