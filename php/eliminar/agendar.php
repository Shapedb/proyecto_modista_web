<?php
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');

$idM=$_POST['txtIDEM'];

echo $idM;

/*----------------------------------------------------*/


$sql = "SELECT r.CVE_ROPA AS IDR, tp.NOMBRE as TROPA, pe.NOMBRE as EMPLEADO, ep.NOMBRE as EPEDIDO, tt.TIPO_TELA as TTELA, p.CVE_PEDIDO as IDP FROM `ropa` AS r, `tipo_ropa` AS tp, `empleado` AS e, `estado_pedido` AS ep, `tipo_de_tela` AS tt, `pedido` AS p , `personas` as pe WHERE r.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA AND r.CVE_EMPLEADO = e.CVE_EMPLEADO AND ep.CVE_ESTADO_PEDIDO = r.CVE_ESTADO_PEDIDO AND r.CVE_TIPO_TELA = tt.CVE_TIPO_TELA AND r.CVE_PEDIDO = p.CVE_PEDIDO AND e.CVE_EMPLEADO = pe.CVE_PERSONA;";
$resul = mysqli_query($conexion,$sql);



while ($mostrar = mysqli_fetch_array($resul)) { 
$CVER = $mostrar['IDR'];
ECHO $CVER;
$consulta4 = "DELETE FROM `medida_ropa` WHERE CVE_ROPA = '$CVER';";
mysqli_query($conexion,$consulta4);

}

/*---------------------------------------------------*/


$consulta3 = "DELETE FROM `ropa` WHERE CVE_PEDIDO = '$idM';";
$consulta2 = "DELETE FROM `pedido` WHERE CVE_PEDIDO = '$idM';";




$resultado2=mysqli_query($conexion,$consulta3);
$resultado=mysqli_query($conexion,$consulta2);

if ($resultado2) {
    echo " <script> alert('Se ha borrado con exito.'); 
    window.location='../../layout/agendar_mostrar.php' </script>";
}


mysqli_close($conexion);
?>