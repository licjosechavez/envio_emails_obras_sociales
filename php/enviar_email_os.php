<?php
    require "conexion.php";
    
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    $query = "SELECT * FROM obra_social WHERE estado_os = '1' ORDER BY nombre_os ASC ";
    $resultado = mysqli_query($conn, $query);
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->

        <form id="form_e" action="enviar_email_os_terminado.php" method="POST">
        <div class="container mt-3 bg-light">
        <br>
        <h1 align='center'>Enviar email a OS</h1><hr><br>
        <div class="form-row">
            <div class="form-group col-md-4">
                <label for="fecha_i">Fecha de ingreso</label>
                <input type="date" class="form-control" name="fecha_i" value="<?php echo date('Y-m-d') ?>" required>
            </div>
            <div class="form-group col-md-4">
                <label for="nombre_apellido_p">Nombre y Apellido del paciente</label>
                <input type="text" class="form-control" name="nombre_apellido_p" placeholder="(Obligatorio)" required>
            </div>
            <div class="form-group col-md-4">
                <label for="documento_p">Documento</label>
                <input type="text" class="form-control" name="documento_p" placeholder="(Obligatorio)" required>
            </div>
            <div class="form-group col-md-4">
                <label for="nro_afiliado_p">Nro. de afiliado</label>
                <input type="text" class="form-control" name="nro_afiliado_p" placeholder="(Opcional)" >
            </div>
            <div class="form-group col-md-4">
                    <label for="obra_social_p">Obra Social</label>
                    <select name="obra_social_p" class="form-control form-control" required >
                        <option value="" disabled selected hidden>Seleccione una Obra Social (obligatorio)</option>
                        
                        <?php
                            while($datos = mysqli_fetch_array($resultado))
                            {
                                // Enviar nombre de OS para el email -->
                            
                                
                        ?>
                        <option value="<?php echo $datos['id_os'] ?>"><?php echo $datos['nombre_os'] ?> </option>
                        <?php
                        
                            }
                           
                        ?>

                    </select> 
            </div>
            <div class="form-group col-md-4">
                    <label for="servicio_p">Servicio</label>
                    <select name="servicio_p" class="form-control form-control" required >
                        <option value="" disabled selected hidden>Seleccione un Servicio</option>
                        <option value="Clínica Médica">Clínica Médica</option>
                        <option value="Guardia Central">Guardia Central</option>
                        <option value="UTI">UTI</option> 
                    </select> 
            </div>
            <div class="form-group col-md-12">
                    <label for="observaciones_p">Observaciones</label>
                    <textarea name="observaciones_p" rows="2" cols="5" class="form-control form-control" placeholder="(Opcional)"></textarea>
            </div>

        </div>

        <div class="form-row justify-content-center mt-1 p-3"> 
        <br>
            <div class="form-group">
            <input type="reset" class="btn btn-danger " value="Limpiar"> 
        <input type="submit" class="btn btn-primary " value="Enviar" name="enviar_form_email"> 
                
                <!--<a href="/emails_os2/index.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a> -->
            </div>
        </div>
            
          
         
        <!--<a href="/emails_os2/index.php"><button class="btn btn-dark my-2 mr-1">Regresar</button></a> -->
    </div>
</form>

<div class="container bg-light mt-0">
    
</div>

       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>

