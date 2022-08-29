<?php


include('../database/conexion.php');




$idropa = $_POST['cve'];
$idm = $_POST['id'];
$uni = $_POST['txt'];


for ($i=0;$i<count($idm);$i++)
{

    $consulta_1 = "UPDATE `medida_ropa` SET `UNIDAD`='$uni[$i]' WHERE CVE_ROPA = '$idropa' AND CVE_MEDIDA = '$idm[$i]' ";
    $resultado2 = mysqli_query($conexion,$consulta_1);

}



if ($resultado2) {
    echo " <script> alert('Se ha actualizado con exito.'); 
    window.location='../../layout/mostrar_pedido.php' </script>";
}


?>