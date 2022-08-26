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
        <form action="../php/actualizar/acualizar-pe.php" method="POST">   
            <input type="hidden" value="<?php echo $mostrar['CVE_ROPA']?>" name="cve"readonly>
            <h5>Datos Personales</h5>
            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Nombre del Cliete</span>
                <input type="text" name="txtnombre" class="form-control" placeholder="Nombre" aria-label="Nombre" aria-describedby="basic-addon1" value="<?php echo $mostrar['CLIENTE'] ?>">
            </div>
            <!------------------------------------------------------------------------------------->
            <div class="row">
                <div class="col-lg-6">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Ropa </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtRopa">
                        
                        <?php

                            $sql2 ='SELECT * FROM `tipo_ropa`';
                            $consul2 = mysqli_query($conexion,$sql2);
                            while ($mostrar2 = mysqli_fetch_array($consul2)) {

                        ?>
                            <option value="<?php echo $mostrar2['CVE_TIPO_ROPA'] ?>"><?php echo $mostrar2['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Tela. </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtTela">
                        
                        <?php

                            $sql1 ='SELECT * FROM `tipo_de_tela`';
                            $consul1 = mysqli_query($conexion,$sql1);
                            while ($mostrar1 = mysqli_fetch_array($consul1)) {

                        ?>
                            <option value="<?php echo $mostrar1['CVE_TIPO_TELA'] ?>"><?php echo $mostrar1['TIPO_TELA'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->

            <div class="row" >
                <div class="col-lg-6">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Creacion</span>
                        <input type="datetime-local" name="fc" class="form-control" placeholder="CURP" aria-label="CURP" aria-describedby="basic-addon1" value="<?php echo $mostrar['FECHA_CREACION'] ?>">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Fecha de Entrega</span>
                        <input type="datetime-local" name="fe" class="form-control" placeholder="CURP" aria-label="CURP" aria-describedby="basic-addon1" value="<?php echo $mostrar['FECHA_ENTREGADO'] ?>">
                    </div>
                </div>
            </div>
            <!------------------------------------------------------------------------------------->
            <?php
                $inc = include('../php/database/conexion.php');
                $ido = $_GET["id"];
                $sql = "SELECT u.CVE_USUARIO ,p.NOMBRE, p.APELLIDO_PAT,p.APELLIDO_MAT,u.USUARIO,tu.TIPO ,u.CONTRASENA, p.CORREO_ELECTRONICO, p.TELEFONO, e.CURP FROM `usuario` as u, `tipo_usuario` as tu, `personas` as p, `empleado` as e WHERE P.CVE_PERSONA = U.CVE_USUARIO and u.CVE_TIPO_USUARIO = tu.CVE_TIPO_USUARIO AND e.CVE_EMPLEADO = p.CVE_PERSONA AND U.CVE_USUARIO = '$ido';";
                $consul = mysqli_query($conexion,$sql);
                $mostrar = mysqli_fetch_array($consul)

            ?>
            <div class= row>
                <div class=" col-lg-6">
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Estado del Pedido </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEpedido">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `estado_pedido`';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_ESTADO_PEDIDO'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                    <label class="input-group-text" for="inputGroupSelect01">Empleado a Cargo. </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEm">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql = "SELECT E.CVE_EMPLEADO AS ID, P.NOMBRE AS NOMBRE_C FROM `empleado` AS E, `tipo_empleado` as TE, `personas` AS P WHERE E.CVE_TIP_EMPLEADO = TE.CVE_TIP_EMPLEADO AND P.CVE_PERSONA = E.CVE_EMPLEADO AND TE.CVE_TIP_EMPLEADO = 2;";
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['ID'] ?>"><?php echo $mostrar['NOMBRE_C'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
            </div>
            <?php
        $sql = "SELECT * FROM `ropa` WHERE CVE_ROPA = '$ido';";
        $consul = mysqli_query($conexion,$sql);
        $mostrar = mysqli_fetch_array($consul);
        $holag = $mostrar['CVE_ROPA'];



        $sql1= "SELECT m.MEDIDA as M,mr.UNIDAD  as U, mr.CVE_MEDIDA as CM  FROM `medida_ropa` as mr, `medidas` as m WHERE m.CVE_MEDIDA = mr.CVE_MEDIDA AND mr.CVE_ROPA = '$holag';";

        

        $consul1 = mysqli_query($conexion,$sql1);


        while ($mostrar1 = mysqli_fetch_array($consul1)) {
        
        
        

        ?>
            
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Medida del <?php echo $mostrar1['M'] ?></span>
                        <input type="hidden" name="id[]" value="<?php echo $mostrar1['CM'] ?>" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                        <input type="text" name="txt[]" value="<?php echo $mostrar1['U'] ?>" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
                    
        <?php
            }
        ?>
        <div>
            <input type="hidden" name="cve" value="<?php echo $cve ?>">
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