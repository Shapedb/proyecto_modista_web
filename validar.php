<?php

include('php/database/conexion.php');

$usuario=$_POST['usuario'];
$contraseña=$_POST['password'];

$_SESSION['usuario']=$usuario;

$conexion=mysqli_connect("localhost","root","12345678","login");

$consulta="SELECT * FROM usuario where USUARIO ='$usuario' and CONTRASENA ='$contraseña'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas){
    header("location:layout/principal.php");

}else{
    ?>
    <?php
    include("index.php");
    ?>
    <h1 class="bad">ERROR EN LA AUTENTIFICACION</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>