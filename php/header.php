<?php
    require "conexion.php";
    session_start();

    if(!isset($_SESSION["usuario"])){
        header("Location: http://localhost/emails_os/index.php"); 
    }

    $nombre_apellido = $_SESSION['nombre_apellido'];
$tipo_usuario = $_SESSION["tipo_usuario"];
      $usuario = $_SESSION["usuario"];
    

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema de envío de Emails a OS | HDC</title>
        <link href="/emails_os/css/bootstrap.min.css" rel="stylesheet">
        <link  rel="icon" href="/emails_os/img/logo.ico" type="img/ico" />
        <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
        <!--datables CSS básico-->
        <link
        rel="stylesheet"
        type="text/css"
        href="/emails_os/vendor/datatables/datatables.min.css"
        />
        <!--datables estilo bootstrap 4 CSS-->
        <link
        rel="stylesheet"
        type="text/css"
        href="/emails_os/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css"
        />
    </head>
    <body> 
        
        <nav class="navbar navbar-light justify-content-between" style="background-color:#e3f2fd;">
        <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menú
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                                        
                    <?php if($tipo_usuario == 1){ ?>

                    <a class="dropdown-item" href="/emails_os/php/enviar_email_os.php"><i class="far fa-envelope"></i> Enviar email</a>
                    <a class="dropdown-item" href="/emails_os/php/listado_emails.php"><i class="far fa-table"></i> Listado de emails enviados</a>

                    <a class="dropdown-item" href="/emails_os/php/nueva_os.php"><i class="far fa-building"></i> Agregar Obra Social</a>
                    <?php } ?>

                    <a class="dropdown-item" href="/emails_os/php/listado_os.php"><i class="far fa-clipboard-list"></i> Listado de Obras Sociales</a>

                    
                </div>
        </div>
            <a class="navbar-brand" href="/emails_os/php/enviar_email_os.php">
                <img src="/emails_os/img/logo.png" height="80" class="d-inline-block align-top" alt="">              
            </a>            
            <div class="dropdown">
                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <?php echo utf8_encode($nombre_apellido); ?>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
                    <a class="dropdown-item" href="/emails_os/logout.php">Cerrar sesión</a>
                    
                </div>
        </div>   
        </nav>

        
        