<?php

include('../database/conexion.php');


$cve = $_POST['cve'];
$ID = $_POST['id'];
$txt = $_POST['txt'];


for ($i=0;$i<count($txt);$i++)
{

    $consulta_1 = "INSERT INTO `medida_ropa`(`CVE_MEDIDA`, `CVE_ROPA`, `UNIDAD`) VALUES ('$ID[$i]','$cve','$txt[$i]')";
    $resultado2 = mysqli_query($conexion,$consulta_1);

}

/*DATOAS DE PEDIDO*/
$consultaPe= "SELECT * FROM `pedido` ORDER BY 'CVE_PEDIDO' DESC LIMIT 1 ";
$resultadoPe = mysqli_query($conexion,$consultaPe);
$mostrarPe = mysqli_fetch_array($resultadoPe);
$idPe = $mostrarPe['CVE_PEDIDO'];
echo $idPe;
$c = $mostrarPe['CANTIDAD'];
echo $c;
/*Para el numero de filas*/

$consulta3 = "SELECT * FROM `ropa` WHERE CVE_PEDIDO = '$idPe'; ";

$resul3 = mysqli_query($conexion,$consulta3);

/*-------------------------------------------*/

$rowcount = mysqli_num_rows($resul3);
echo $rowcount;

if ($rowcount < $c){
    echo " <script> alert('Se ha añadido la nueva ropa con exito.'); 
    window.location='../../layout/crear_pedido.php' </script>";
}
else {
    echo " <script> alert('Se ha termina con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}

?>