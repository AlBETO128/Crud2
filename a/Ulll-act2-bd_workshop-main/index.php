<?php include("db.php"); ?>

<?php include('includes/header.php'); ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- MESSAGES -->

      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset(); } ?>

      <!-- ADD TASK FORM -->
      <div class="card card-body">
        <form action="guardar.php" method="POST">
          <div class="form-group">
            <label for="" style="font-size:20px; fort-family: Perpetua;">Registrar Tecnicos</label>
          </div>
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Ingresa Nombre" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Laboratorio" class="form-control" placeholder="Ingresa Laboratorio" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Contenido" class="form-control" placeholder="Ingrese Contenido" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Via" class="form-control" placeholder="Ingrese Via de administracion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Dosis" class="form-control" placeholder="Ingrese Via de Dosis" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Presentacion" class="form-control" placeholder="Ingrese Presentacion" autofocus>
          </div>
          <div class="form-group">
            <input type="text" name="Precio" class="form-control" placeholder="Ingrese Precio" autofocus>
          </div>
          <input type="submit" name="guardar" class="btn btn-success btn-block" value="Agregar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Nombre</th>
            <th>Laboratorio</th>
            <th>Contenido</th>
            <th>Via de administracion</th>
            <th>Dosis</th>
            <th>Presentacion</th>
            <th>Precio</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = "SELECT * FROM tbl_medicamento";
          $result_tasks = mysqli_query($conn, $query);    

          while($row = mysqli_fetch_assoc($result_tasks)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['Laboratorio']; ?></td>
            <td><?php echo $row['Contenido']; ?></td>
            <td><?php echo $row['Via']; ?></td>
            <td><?php echo $row['Dosis']; ?></td>
            <td><?php echo $row['Presentacion']; ?></td>
            <td><?php echo $row['Precio']; ?></td>
            <td>
              <a href="editar.php?id=<?php echo $row['id_vendedor']?>" class="btn btn-secondary">
                <i class="fas fa-marker"></i>
              </a>
              <a href="borrar.php?id=<?php echo $row['id_vendedor']?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include('includes/footer.php'); ?>
