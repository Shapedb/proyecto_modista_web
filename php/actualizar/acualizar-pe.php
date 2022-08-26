<?php

$id_ropa = $_POST['cve'];
$cliente = $_POST['txtnombre'];
$ropa = $_POST['txtRopa'];
$tela = $_POST['txtTela'];
$fechac = $_POST['fc'];
$fechae = $_POST['fe'];
$epedido = $_POST['txtEpedido'];
$ecargo = $_POST['txtEm'];



$id = $_POST['id'];
$unidad = $_POST['txt'];

$consulta_1 = "UPDATE `ropa` SET `CVE_TIPO_ROPA`='$ropa',`CVE_TIPO_TELA`='$tela',
`CVE_EMPLEADO`='$ecargo',`CLIENTE`='$cliente',`FECHA_CREACION`='$fechac',`FECHA_ENTREGADO`='$fechae',`CVE_ESTADO_PEDIDO`='$epedido' WHERE CVE_ROPA = '$id_ropa'";


mysqli_query($conexion,$consulta_1);


for ($i=0;$i<count($txt);$i++)
{

    $consulta_2 = "UPDATE `medida_ropa` SET `UNIDAD`='$unidad[$i]' WHERE CVE_ROPA ='$id_ropa' AND CVE_MEDIDA = '$id[$i]'";
    $resultado2 = mysqli_query($conexion,$consulta_2);


}


if ($resultado2) {
    echo " <script> alert('Se ha añadido el Pedido con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}
?>