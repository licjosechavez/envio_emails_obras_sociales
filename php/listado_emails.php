<?php
    require "conexion.php";
    
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    //$query = "SELECT * FROM email ORDER BY fecha_i ASC";

    $query=" SELECT email.*, os.*
    FROM email
    INNER JOIN obra_social os ON email.obra_social_p = os.id_os ";

    $resultado = mysqli_query($conn, $query);
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->
        
        
        <div class="container mt-3 bg-light">

            <br>
            <h1 align='center'>Listado de emails enviados</h1><hr><br>
            <div class="col-lg-12">
        <div class="table-responsive">
          <table
            id="example"
            class="table table-striped table-bordered table-hover "
            style="width: 100%"
          >
            <thead>
              <tr>
                
                <th>ID</th>
                <th>Fecha de ingreso</th>
                <th>Nombre y Apellido del paciente</th>
                <th>Documento</th>
                <th>Nro. de afiliado</th>
                <th>Obra Social</th>
                <th>Servicio</th>
                <th>Observaciones</th>
                
              </tr>
            </thead>
            <tbody>
            <?php
            while($row = $resultado->fetch_assoc()){?>

                <tr> 
                  
                  <td><?php echo $row["id_email"]; ?></td>
                  
                  <td><?php
                    $date = $row["fecha_i"]; 
                    echo $nuevoDate = date("d-m-Y", strtotime($date));
                    ?>
                  </td>
                  <td><?php echo utf8_encode($row["nombre_apellido_p"]); ?></td>
                  <td><?php echo $row["documento_p"]; ?></td>
                  <td><?php echo $row["nro_afiliado_p"]; ?></td>
                  <td><?php echo utf8_encode($row["nombre_os"]); ?></td>
                  <td><?php echo utf8_encode($row["servicio_p"]); ?></td>
                  <td><?php echo utf8_encode($row["observaciones_p"]); ?></td>
                  
                  
            
            <?php } ?>
            </tbody>
          </table>
        </div>
    </div>

        </div>


<div class="container bg-light mt-0">
    
</div>


       
<!-- Fin contenido de las paginas-->

        
<?php include_once "footer.php"; ?>