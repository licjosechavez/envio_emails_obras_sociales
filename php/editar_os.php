<?php
    require "conexion.php";
    
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    if(isset($_GET['id_os'])) {
        $id_os = $_GET['id_os'];
      
        $query = "SELECT nombre_os, email_os FROM obra_social WHERE id_os = $id_os";
        $resultado = mysqli_query($conn, $query);

        if (mysqli_num_rows($resultado) > 0) {
            $row = mysqli_fetch_assoc($resultado);
            
            $nombre_os = $row["nombre_os"];
            $email_os = $row["email_os"];
        }

    }

    
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->

        <form id="form_e" action="editar_os_edit.php" method="POST">
        <div class="container mt-3 bg-light">
        <br>
        <h1 align='center'>Editar Obra Social</h1><hr><br>
        <div class="form-row">
        <div class="form-group col-md-4">
                <label for="nombre_os">Nombre de la Obra Social</label>
                <input type="text" class="form-control" name="nombre_os" value="<?php echo $nombre_os ;?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="email_os">Email</label>
                <input type="email" class="form-control" name="email_os" value="<?php echo $email_os;?>"  required >
            </div>

            <?php
             echo "<input type='hidden' name='id_os' value='$id_os'>";
            ?>

        </div>
        <input type="button" class="btn btn-dark my-2 mr-1" value="Volver" onClick="history.go(-1);">
        <!--<input type="reset" class="btn btn-danger " value="Limpiar"> -->
        <input type="submit" class="btn btn-primary " value="Actualizar" name="enviar_form_edit">   
       
    </div>
</form>

<div class="container bg-light mt-0">
    
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>