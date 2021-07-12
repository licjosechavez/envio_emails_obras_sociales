<?php
require "conexion.php";
session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

       if(isset($_POST['enviar_form_edit'])) {

                    //Listado de Parametros
                    $id_os = $_POST['id_os'];
                    $nombre_os = $_POST["nombre_os"];
                    $email_os = $_POST["email_os"];

                    $query = "UPDATE obra_social SET nombre_os='$nombre_os', email_os='$email_os' WHERE id_os='$id_os'";

                    //echo $query;
                    $result = mysqli_query($conn, $query);
                    //echo $result;

                    
                    if(!$result) {
                        echo'<script type="text/javascript">
                        alert("Error al actualizar OS.-");
                        window.location.href="/emails_os/php/listado_os.php";
                        </script>';
                        
                    } 
                    else{
                        echo'<script type="text/javascript">
                        alert("OS actualizada correctamente.-");
                        window.location.href="/emails_os/php/listado_os.php";
                        </script>';
                    
                    }
                           
                    
        }
        
        

?>