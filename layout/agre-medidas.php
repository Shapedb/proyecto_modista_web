
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Boostrap-->
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <link rel="stylesheet" href="../css/medi.css">
        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
    <link rel="shortcut icon" href="../img/logo.png">
    <title>Agregar Medida | Modista</title>
</head>
<body id="body" class="body">
    <?php include('sidebars.php') ?>
    <form class= 'row' action="../php/unico/uni.php" method="POST">                        
        <?php
        $inc = include('../php/database/conexion.php');

        $sql = "SELECT CVE_TIPO_ROPA, CVE_ROPA FROM `ropa` ORDER BY CVE_ROPA DESC LIMIT 1;";

        $consul = mysqli_query($conexion,$sql);
        $mostrar = mysqli_fetch_array($consul);

        $cve = $mostrar['CVE_ROPA'];
        $va = $mostrar['CVE_TIPO_ROPA'];


        $sql1= "SELECT tp.NOMBRE as N, m.MEDIDA as M, m.CVE_MEDIDA as ID FROM `tipo_medida` as tm, `tipo_ropa` as tp, `medidas` as m 
        WHERE tm.CVE_MEDIDA = m.CVE_MEDIDA AND tm.CVE_TIPO_ROPA = tp.CVE_TIPO_ROPA AND tm.CVE_TIPO_ROPA  = '$va'";

        

        $consul1 = mysqli_query($conexion,$sql1);


        while ($mostrar1 = mysqli_fetch_array($consul1)) {
        
        
        

        ?>
            
            <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                    <div class="input-group mb-4">
                        <span class="input-group-text" id="basic-addon1">Medida del <?php echo $mostrar1['M'] ?></span>
                        <input type="hidden" name="id[]" value="<?php echo $mostrar1['ID'] ?>" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                        <input type="text" name="txt[]" class="form-control" placeholder="Medida" aria-label="Nombre" aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
                    
        <?php
            }
        ?>
        <div>
            <input type="hidden" name="cve" value="<?php echo $cve ?>">
        </div>
        <div class="col-lg-2"></div>
        <div class="col-lg-1 mb-3">
            <button type="submit" class="btn btn-outline-success">Agregar</button>
        </div>
    </for   m>
</body>
</html>