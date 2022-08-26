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
    <link rel="shortcut icon" href="../img/logo.png">
    <title> Editar Pedido | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/mostrar-c.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>


        <h1>Editar Usuarios</h1>
        <?php
            include('../php/database/conexion.php');
            $ido = $_GET["id"];
            $sql = "SELECT * FROM `ropa` WHERE CVE_ROPA = '$ido';";
            $consul = mysqli_query($conexion,$sql);
            $mostrar = mysqli_fetch_array($consul);
            $holag = $mostrar['CVE_ROPA'];

        ?>  

        <hr>
        <form action="../php/actualizar/actualizar-medidas.php" method="POST">


        <?php

        $sql15= "SELECT m.MEDIDA as M,mr.UNIDAD  as U, mr.CVE_MEDIDA as CM  FROM `medida_ropa` as mr, `medidas` as m WHERE m.CVE_MEDIDA = mr.CVE_MEDIDA AND mr.CVE_ROPA = '$holag';";

        

        $consul15 = mysqli_query($conexion,$sql15);


        while ($mostrar15 = mysqli_fetch_array($consul15)) {
        
        
        

        ?>
            
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Medida del <?php echo $mostrar15['M'] ?></span>
                        <input type="hidden" name="id[]" value="<?php echo $mostrar15['CM'] ?>" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                        <input type="text" name="txt[]" value="<?php echo $mostrar15['U'] ?>" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
                    
        <?php
            }
        ?>
        <div>
            <input type="hidden" name="cve" value="<?php echo $ido ?>">
        </div>
        <div class="row">
            <div class="col-lg-6"></div>
            <div class="col-lg-2 mb-3">
                <button type="submit" class="btn btn-outline-success">Agregar</button>
            </div>
            <div class="col-lg-2 mb-3">
                <button type="reset" class="btn btn-outline-danger">Cancelar</button>
            </div>
            <div class="col-lg-2 mb-3">
                <a href="mostrar_pedido.php" class="btn btn-outline-secondary">Regresar</a>
            </div>
        </div>
        </form>
</body>
</html>