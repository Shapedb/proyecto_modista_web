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
    <title> Estilos y Objetos | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/medi.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>
                <!-- ---------------------------------------------------------------------------------------------------------------------------------- -->
                <div class="mt-5">
            <form action="../php/medida/registro-medida.php" method="POST">
                <div class="input-group input-group-sm mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Agrega una Nueva Medida</span>
                     <input placeholder="Nueva Medidas" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtMedi">
                     <button type="submit" class="btn btn-primary">Agregar</button>
                </div> 
            </form>

            <hr>
            <div class="d-flex justify-content-center">
            <table class="table w-50">
                <thead>
                     <tr>
                         <th scope="col">Medida</th>
                         <th scope="col">Acciones</th>
                         <th scope="col"></th>
                     </tr>
                </thead>
                <tbody>
                     <?php
                         $inc = include('../php/database/conexion.php');
                         $sql = "SELECT * FROM `medidas` WHERE CVE_MEDIDA != 0";
                         $resul = mysqli_query($conexion,$sql);

                         while ($mostrar = mysqli_fetch_array($resul)) {
                     
                     
                     ?>
                     <tr>
                        <td><?php echo $mostrar['MEDIDA'] ?></td>

                        <td>
                                 <form action="../php/eliminar/medida.php" method="POST">
                                    <input type="hidden" value="<?php echo $mostrar['CVE_MEDIDA'] ?>" name="txtIDEM"readonly>
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
        <hr>
        <div class="mt-5">
            <div>
                <form action="../php/medida/registro-medida-ropa.php" method="POST">
                <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Tipo de Ropa </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtRopaM">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_ropa` WHERE CVE_TIPO_ROPA != 0';
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_TIPO_ROPA'] ?>"><?php echo $mostrar['NOMBRE'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Medida. </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtEm">
                        
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql = "SELECT * FROM `medidas` WHERE CVE_MEDIDA != 0";
                            $consul = mysqli_query($conexion,$sql);
                            while ($mostrar = mysqli_fetch_array($consul)) {

                        ?>
                            <option value="<?php echo $mostrar['CVE_MEDIDA'] ?>"><?php echo $mostrar['MEDIDA'] ?></option>
                    
                        <?php
                            }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-1 mb-3">
                        <button type="submit" class="btn btn-outline-success">Agregar</button>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </div>
        </div>
                </form>
            </div>
            <div class="d-flex justify-content-center">
            <table class="table w-75">
                <thead>
                     <tr>
                         <th scope="col">Medida</th>
                         <th scope="col">Ropa</th>
                         <th scope="col">Acciones</th>
                         <th></th>
                     </tr>
                </thead>
                <tbody>
                     <?php
                         $inc = include('../php/database/conexion.php');
                         $sql = "SELECT tp.NOMBRE as N, tp.CVE_TIPO_ROPA as TP, m.MEDIDA as M, m.CVE_MEDIDA as ME FROM `tipo_medida` as tm, `tipo_ropa` as tp, `medidas` as m WHERE tm.CVE_MEDIDA = m.CVE_MEDIDA AND tm.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA ORDER BY tp.CVE_TIPO_ROPA;";
                         $resul = mysqli_query($conexion,$sql);

                         while ($mostrar = mysqli_fetch_array($resul)) {
                     
                     
                     ?>
                     <tr>
                         <td><?php echo $mostrar['N'] ?></td>
                         <td><?php echo $mostrar['M'] ?></td>

                         <td>
                                 
                                 <form action="../php/eliminar/tipo_ropa.php" method="POST">
                                    <input type="hidden" value="<?php echo $mostrar['TP'] ?>" name="txtIDER"readonly>
                                    <input type="hidden" value="<?php echo $mostrar['ME'] ?>" name="txtIDEM"readonly>
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
 

</body>
</html>