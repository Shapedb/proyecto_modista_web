<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('../database/conexion.php');
 
$idPersona = $_POST['txtIDEM'];
$nomNombre=$_POST['txtNombre'];
$nomAPaterno=$_POST['txtAPaterno'];
$nomAMaterno=$_POST['txtAMaterno'];
$nomTel=$_POST['txtTelefono'];
$nomCElectronico=$_POST['txtCorreo'];
$nomTipoEm=$_POST['txtTipoEm'];
$nomCurp=$_POST['txtCURP'];
$nomUsuario=$_POST['txtUsuario'];
$nomTiUsu=$_POST['txtTiUsu'];
$nomContraseña=$_POST['txtContraseña'];


/*Insertar Datos Personales*/

$consulta_1 = "UPDATE `personas` SET `NOMBRE`='$nomNombre',`APELLIDO_PAT`='$nomAPaterno',
`APELLIDO_MAT`='$nomAMaterno',`TELEFONO`='$nomTel',`CORREO_ELECTRONICO`='$nomCElectronico' WHERE CVE_PERSONA = '$idPersona'";

/*Insertar Datos de Empleado*/

$consulta_2 = "UPDATE `empleado` SET `CVE_TIP_EMPLEADO`='$nomTipoEm',`CURP`='$nomCurp' WHERE CVE_EMPLEADO = '$idPersona'";

/*Insertar Datos de Usuario*/
$consulta_3 = "UPDATE `usuario` SET `USUARIO`='$nomUsuario',`CVE_TIPO_USUARIO`='$nomTiUsu',`CONTRASENA`='$nomContraseña' WHERE CVE_USUARIO = '$idPersona'";



mysqli_query($conexion,$consulta_1);

mysqli_query($conexion,$consulta_2);

$resultado2 = mysqli_query($conexion,$consulta_3);

if ($resultado2) {
    echo " <script> alert('Se ha actualizado con exito.'); 
    window.location='../../layout/administarar-usuarios.php' </script>";
}

mysqli_close($conexion);
?>