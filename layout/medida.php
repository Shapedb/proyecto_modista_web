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
                     </tr>
                </thead>
                <tbody>
                     <?php
                         $inc = include('../php/database/conexion.php');
                         $sql = "SELECT * FROM `medidas`";
                         $resul = mysqli_query($conexion,$sql);

                         while ($mostrar = mysqli_fetch_array($resul)) {
                     
                     
                     ?>
                     <tr>
                         <td><?php echo $mostrar['MEDIDA'] ?></td>
                         <td>
                                 <input class="btn btn-outline-success" type="submit" value="Editar">
                                 <input class="btn btn-outline-danger" type="reset" value="Eliminar">
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
            <form action="../php/medida/registro-medida-ropa.php" method="POST">
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-4">
                    <div class="input-group mb-4">
                    <label class="input-group-text" for="inputGroupSelect01">Ropa </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtRopa">
                    <option selected>Escoge un tipo de ropa...</option>
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql ='SELECT * FROM `tipo_ropa`';
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
                    <label class="input-group-text" for="inputGroupSelect01">Medida </label>
                    <select class="form-select" id="inputGroupSelect01" name="txtMedida">
                        <option selected>Escoge una medida...</option>
                        <?php
                            $inc = include('../php/database/conexion.php');
                            $sql = "SELECT * FROM `medidas`";
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
                    <div class="col-lg-5"></div>
                    <div class="col-lg-1 mb-3">
                        <button type="submit" class="btn btn-outline-success">Agregar</button>
                    </div>
                    <div class="col-lg-1 mb-3">
                        <button type="reset" class="btn btn-outline-danger">Cancelar</button>
                    </div>
                </div>
            </div>
            </form>
            <div class="d-flex justify-content-center">
            <table class="table w-75">
                <thead>
                     <tr>
                         <th scope="col">Medida</th>
                         <th scope="col">Ropa</th>
                         <th scope="col">Acciones</th>
                     </tr>
                </thead>
                <tbody>
                     <?php
                         $inc = include('../php/database/conexion.php');
                         $sql = "SELECT TP.NOMBRE as ROPA, m.MEDIDA as MEDIDA FROM `tipo_medida` as tm, `tipo_ropa` as tp, `medidas` as m WHERE m.CVE_MEDIDA = tm.CVE_MEDIDA AND tp.CVE_TIPO_ROPA = tm.CVE_MEDIDA;";
                         $resul = mysqli_query($conexion,$sql);

                         while ($mostrar = mysqli_fetch_array($resul)) {
                     
                     
                     ?>
                     <tr>
                         <td><?php echo $mostrar['ROPA'] ?></td>
                         <td><?php echo $mostrar['MEDIDA'] ?></td>
                         <td>
                                 <input class="btn btn-outline-success" type="submit" value="Editar">
                                 <input class="btn btn-outline-danger" type="reset" value="Eliminar">
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