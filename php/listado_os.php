<?php
    require "conexion.php";
    
    session_start();

if(!isset($_SESSION["usuario"])){
  header("Location: ../index.php"); 
}

    $nombre_apellido = $_SESSION['nombre_apellido'];
    $tipo_usuario = $_SESSION["tipo_usuario"];

    $query = "SELECT * FROM obra_social ORDER BY nombre_os ASC";
    $resultado = mysqli_query($conn, $query);
?>

<?php include_once "header.php"; ?>

<!-- Inicio contenido de las paginas -->

        
        <div class="container mt-3 bg-light">
            <br>
            <h1 align='center'>Listado de Obras Sociales</h1><hr><br>
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
                <th>Nombre</th>
                <th>Email</th>
                <th>Estado</th>
                <th>Acciones</th>
                
              </tr>
            </thead>
            <tbody>
            <?php
            while($row = $resultado->fetch_assoc()){?>
                <tr> 
                  
                  <td><?php echo $row["id_os"]; ?></td>
                  <td><?php echo $row["nombre_os"]; ?></td>
                  <td><?php echo $row["email_os"]; ?></td>
                  
                  <?php 
                    if($row["estado_os"] == "1"){?>
                      <td><?php echo "Activo"; ?></td>
                    <?php 
                    }else{?>
                      <td><?php echo "Inactivo"; ?></td>
                    <?php }
                    ?>
                  <td>
                  <a href="editar_os.php?id_os=<?php echo $row['id_os']?>" class="btn btn-secondary" title="Editar OS"><i class="far fa-edit"></i> </a> 
                  <?php 
                    if($row["estado_os"] == "1"){?>
                      <a href="desactivar_os.php?id_os=<?php echo $row['id_os']?>" class="btn btn-danger" title="Desactivar OS"><i class="far fa-minus-circle"></i></a>
                    <?php 
                    }else{?>
                      <a href="activar_os.php?id_os=<?php echo $row['id_os']?>" class="btn btn-success" title="Activar OS"><i class="far fa-check-square"></i></a>
                    <?php }
                    ?>
                  </td>
            
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