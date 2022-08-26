<?php

include('../database/conexion.php');


$txt = $_POST['txt'];


  for ($i=0;$i<count($txt);$i++)
  {
    print ($txt[$i]);

  }



?>