<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!--Boostrap-->

        <!--JavaScript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script> 
        <!--CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
        <!--Hoja de Estilo de Idex-Custome-->
        <link rel="stylesheet" href="../css/index-custome-styles.css">

        <!--Fuentes-->
        <link href="https://fonts.googleapis.com/css2?family=Oxygen:wght@300;400;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Square+Peg&display=swap" rel="stylesheet">
    <title>Modista Rochy | Inicio</title>
</head>
<body id="body">
    
      <?php include('sidebars.php') ?>

      <main>
        <!--Imagin Principal del Archivo-->
        <div class="imagen-pri sombra">
          <section class="contenido_imagen-pri">
              <h2 class="view-start">Modista Rochy</h2>
          </section>   
        </div>
        <!------------------------------------------------------>
        <div class="container marketing">
      
          <!-- Three columns of text below the carousel -->
          <div class="row">
            <div class="col-lg-4">

              <h2 class="fw-normal">Citas</h2>
              <p>¡Necesitas algo nuevo y unico que lucir! Agenda tu cita los mas rapido posible dentro del horario que mas se te acomode.</p>
              <p><a class="btn btn-secondary" href="citas-customer.html">Crear cita &raquo;</a></p>
            </div>
            <div class="col-lg-4">

              <h2 class="fw-normal">Pedidos</h2>
              <p>¿Esta terminado o siguimos preparandolo? Revisa la informacion del estado de tu pedido de manera instantanea.</p>
              <p><a class="btn btn-secondary" href="pedidos-customer.html">Consultar &raquo;</a></p>
            </div>
            <div class="col-lg-4">

              <h2 class="fw-normal">Ubicación</h2>
              <p>No sabes donde aun quienes somos y donde nos encontramos, da click para conocer mas sobre sus servicios de confianza.</p>
              <p><a class="btn btn-secondary " href="nosotros-customer.html">Encuentranos &raquo;</a></p>
            </div>
          </div>
      </main>
      <!-- FOOTER -->
          <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
            <div class="col-md-4 d-flex align-items-center">
              <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
              </a>
              <span class="mb-3 mb-md-0 text-muted">&copy; 2013-2022. Modista Rochy</span>
            </div>
          </footer>
</body>
</html>