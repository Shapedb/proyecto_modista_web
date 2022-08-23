<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ropa | Modista Rochy </title>
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/ropa.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 

</head>
<body id="body" class="body">

        <?php include('sidebars.php') ?>

        <form action="../php/registro-ropa.php" method="POST">
            <div class="input-group input-group-sm mb-3">
                <span class="input-group-text" id="inputGroup-sizing-sm">Agregar Ropa</span>
                <input placeholder="Nueva Ropa" type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm" name="txtRopa">
                <button type="submit" class="btn btn-primary">Agregar</button>
            </div> 
        </form>

        <hr>
        <div class="d-flex justify-content-center">
        <table class="table w-75">
            <thead>
                <tr>
                    <th scope="col">Clave</th>
                    <th scope="col">Tipo de Ropa</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $inc = include('../php/database/conexion.php');
                    $sql = "SELECT * FROM `tipo_ropa`";
                    $resul = mysqli_query($conexion,$sql);

                    while ($mostrar = mysqli_fetch_array($resul)) {
                    
                   
                ?>
                <tr>
                    <td><?php echo $mostrar['CVE_TIPO_ROPA'] ?></td>
                    <td><?php echo $mostrar['NOMBRE'] ?></td>
                    <td>
                        <input class="btn btn-outline-successy" type="submit" value="Editar">
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