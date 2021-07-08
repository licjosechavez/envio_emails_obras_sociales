<?php
require "conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

        if (isset($_POST['enviar_form_os'])) {
        
        //Listado de Parametros
        $nombre_os = $_POST["nombre_os"];
        $email_os = $_POST["email_os"];


        
          $query = "INSERT INTO obra_social (nombre_os, email_os, estado_os) VALUES ( '$nombre_os', '$email_os', '1')";
          //echo $query;
          //echo $query;
          $result = mysqli_query($conn, $query);
         
        }

        if($result) {
          echo'<script type="text/javascript">
          alert("Obra Social ingresada exitosamente.-");
          window.location.href="/emails_os/php/listado_os.php";
          </script>';
          echo $query;
            
          } 
         else{
          echo'<script type="text/javascript">
          alert("Error. La Obra Social ya está cargada.-");
          window.location.href="/emails_os/php/listado_os.php";
          </script>';
          //echo $query;
          
        }

?>