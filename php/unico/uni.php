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


if ($resultado2) {
    echo " <script> alert('Se ha añadido el Pedido con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}

?>