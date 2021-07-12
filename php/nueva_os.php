<?php
    require "conexion.php";
    
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->

        <form action="nueva_os_terminada.php" method="POST">
        <div class="container mt-3 bg-light">
        <br>
        <h1 align='center'>Agregar Obra Social</h1><hr><br>
        <div class="form-row justify-content-center">
            
            <div class="form-group col-md-4">
                <label for="nombre_os">Nombre de la Obra Social</label>
                <input type="text" class="form-control" name="nombre_os" placeholder="(Obligatorio)" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email_os">Email</label>
                <input type="email" class="form-control" name="email_os" value="@" required >
            </div>

            

        </div>
        <div class="form-row justify-content-center mt-3 p-3"> 
        <br>
            <div class="form-group">
                <input id="form" type="reset" class="btn btn-danger " value="Limpiar" > 
                <input id="form" type="submit" class="btn btn-primary " value="Guardar" name="enviar_form_os"> 
                
                <!--<a href="/emails_os2/index.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a> -->
            </div>
        </div>
       
    </div>
</form>




<div class="container bg-light mt-0">
    
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>