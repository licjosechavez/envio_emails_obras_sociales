<?php
    
    require "./php/conexion.php";
    session_start();
    
    if($_POST){
        $usuario = $_POST['usuario'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'"; 
        //echo $sql;
        $resultado = $conn->query($sql);
        //$resultado = $mysqli->query($sql);
        $num = $resultado->num_rows;

        if($num > 0){
            
            $row = $resultado->fetch_assoc();
            $password_bd = $row['password'];

            $pass_cifrado = sha1($password);

            if($password_bd == $pass_cifrado){
                echo "las pass coinciden";

                $_SESSION['nombre_apellido'] = $row['nombre_apellido'];
                $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
                $_SESSION['id_usuario'] = $row['id_usuario'];
                $_SESSION['usuario'] = $row['usuario'];

                header("Location: ./php/enviar_email_os.php");


            } else {
                echo "La contraseña no coincide";
            }


            }else {
                echo "No existe el usuario";
        }
    }
	
	
	
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Sistema de Envío de emails - Obras Sociales</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="p-3">
                                    <div class="text-center">
                                    <a class="navbar-brand" href="/emails_os/php/enviar_email_os.php">
                                        <img src="/emails_os/img/logo.png" height="80" class="d-inline-block align-top" alt="">              
                                    </a>  
                                        <h1 class="h4 text-gray-900 mb-1  mt-0"><br>Sistema de Envío de emails</h1>
                                        <h3 class="h5 text-gray-900 mb-1 ">Secretaría Administrativa | Hospital de Clínicas</h3>
                                    </div>
                                </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputEmailAddress">Usuario</label>
                                                <input class="form-control py-4" id="inputEmailAddress" type="text" name="usuario" placeholder="Ingrese su usuario" required /></div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" id="inputPassword" type="password" name="password" placeholder="Ingrese su contraseña" required /></div>
                                            
                                            <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0"><button type="reset" class="btn btn-danger" >Limpiar</button>
                                            <button type="submit" class="btn btn-primary" >Ingresar</button></div>
                                        </form>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <div id="layoutAuthentication_footer">
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div >Copyright &copy; Área de Sistemas - 2021</div>
                         
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
</html>
