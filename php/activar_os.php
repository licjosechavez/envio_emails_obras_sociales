<?php

include("conexion.php");

if(isset($_GET['id_os'])) {
  $id_os = $_GET['id_os'];
  
  $query = "UPDATE obra_social SET estado_os = '1' WHERE id_os = $id_os";
  $result = mysqli_query($conn, $query);

  if(!$result) {
    echo'<script type="text/javascript">
          alert("Error al activar OS.-");
          window.location.href="/emails_os/php/listado_os.php";
          </script>';
  }

  echo'<script type="text/javascript">
          alert("OS activada correctamente.-");
          window.location.href="/emails_os/php/listado_os.php";
          </script>';
}

?>
