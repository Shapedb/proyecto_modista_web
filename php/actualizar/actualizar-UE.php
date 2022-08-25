<?php
/* Registro de nueva Ropa*/
ini_set('display errors',1);
error_reporting(E_ALL);

$inc = include('database/conexion.php');
 
if ($inc) {
    $consulta = "SELECT CVE_PERSONA FROM `personas` ORDER BY CVE_PERSONA DESC LIMIT 1;  ";
    $resultado = mysqli_query($conexion,$consulta);
    $numero = $resultado->fetch_array();
    $idPersona = $numero['CVE_PERSONA'] + 1;
}

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

$consulta_1 = "INSERT INTO `personas`(`CVE_PERSONA`, `NOMBRE`, `APELLIDO_PAT`, `APELLIDO_MAT`, `TELEFONO`, `CORREO_ELECTRONICO`) 
VALUES (' $idPersona','$nomNombre','$nomAPaterno','$nomAMaterno','$nomTel','$nomCElectronico')";

/*Insertar Datos de Empleado*/

$consulta_2 = "INSERT INTO `empleado`(`CVE_EMPLEADO`, `CVE_TIP_EMPLEADO`, `CURP`)
VALUES (' $idPersona','$nomTipoEm','$nomCurp')";

/*Insertar Datos de Usuario*/
$consulta_3 = "INSERT INTO `usuario`(`CVE_USUARIO`, `USUARIO`, `CVE_TIPO_USUARIO`, `CONTRASENA`) 
VALUES ('$idPersona','$nomUsuario','$nomTiUsu','$nomContraseña')";



$resultado=mysqli_query($conexion,$consulta_1);

mysqli_query($conexion,$consulta_2);

$resultado2 = mysqli_query($conexion,$consulta_3);

if ($resultado2) {
    echo " <script> alert('Se ha añadido al Usuario con exito.'); 
    window.location='../layout/administarar-usuarios.php' </script>";
}

mysqli_close($conexion);
?>