<?php
  session_start();
  error_reporting(0);
  $varsesion = $_SESSION['usuario'];
  if($varsesion==null || $varsesion='') {
    echo " <script> alert('No tienes acceso.'); 
    window.location='../index.php' </script>";
    die();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Estilos y Objetos | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/ropa.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>

        <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
        <div class="mt-5">
            <form action="../php/registro-tela.php" method="POST">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Agrega un Tipo de Tela</span>
                     <input placeholder="Nueva Tela" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtTela">
                     <button type="submit" class="btn btn-primary">Agregar</button>
                </div> 
            </form>

            <hr>
            <div class="d-flex justify-content-center">
            <table class="table w-75">
                <thead>
                     <tr>
                         <th scope="col">Tipo de Tela</th>
                         <th scope="col">Acciones</th>
                     </tr>
                </thead>
                <tbody>
                     <?php
                         $inc = include('../php/database/conexion.php');
                         $sql = "SELECT * FROM `tipo_de_tela` WHERE CVE_TIPO_TELA != 0";
                         $resul = mysqli_query($conexion,$sql);

                         while ($mostrar = mysqli_fetch_array($resul)) {
                     
                     
                     ?>
                     <tr>
                        <td><?php echo $mostrar['TIPO_TELA'] ?></td>
                        <td><input class="btn btn-outline-success" type="submit" value="Editar"></td>
                        <td>
                                 <form action="../php/eliminar/tela.php" method="POST">
                                    <input type="hidden" value="<?php echo $mostrar['CVE_TIPO_TELA'] ?>" name="txtIM"readonly>
                                    <button type="submit" class="btn btn-outline-danger">Eliminar</button>
                                 </form>
                        </td>
                     </tr>
                     <?php
                         }
                     ?>
                </tbody>
            </table>
        </div>
        <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
</body>
</html>