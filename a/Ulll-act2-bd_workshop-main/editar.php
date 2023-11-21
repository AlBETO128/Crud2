<?php
include("db.php");
$nombre = '';
$Laboratorio = '';
$Contenido = '';
$Via = '';
$Dosis = '';
$Presentacion= '';
$Precio = '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM tbl_medicamento WHERE id_vendedor=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_array($result);
    $nombre = $row['nombre'];
    $Laboratorio = $row['Laboratorio'];
    $Contenido = $row['Contenido'];
    $Via = $row['Via'];
    $Dosis = $row['Dosis'];
    $Presentacion= $row['Presentacion'];
    $Precio = $row['Precio'];
  }
}

if (isset($_POST['actualizar'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $Laboratorio= $_POST['Laboratorio'];
  $Contenido= $_POST['Contenido'];
  $Via= $_POST['Via'];
  $Dosis= $_POST['Dosis'];
  $Presentacion= $_POST['Presentacion'];
  $Precio = $_POST['Precio'];

  $query = "UPDATE tbl_medicamento set nombre = '$nombre', Laboratorio = '$Laboratorio', Contenido='$Contenido', Via='$Via', Dosis='$Dosis', Presentacion='$Presentacion', Precio='$Precio' WHERE id_vendedor=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Actualizado Correctamente';
  $_SESSION['message_type'] = 'Advertencia';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="editar.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre">
        </div>
        <div class="form-group">
          <input name="Laboratorio" type="text" class="form-control" value="<?php echo $Laboratorio; ?>" placeholder="Laboratorio">
        </div>
        <div class="form-group">
          <input name="Contenido" type="text" class="form-control" value="<?php echo $Contenido; ?>" placeholder="Contenido">
        </div>
        <div class="form-group">
          <input name="Via" type="text" class="form-control" value="<?php echo $Via; ?>" placeholder="Via de administracion">
        </div>
        <div class="form-group">
          <input name="Dosis" type="text" class="form-control" value="<?php echo $Dosis; ?>" placeholder="Dosis">
        </div>
        <div class="form-group">
          <input name="Presentacion" type="text" class="form-control" value="<?php echo $Presentacion; ?>" placeholder="Presentacion">
        </div>
        <div class="form-group">
          <input name="Precio" type="text" class="form-control" value="<?php echo $Precio; ?>" placeholder="Precio">
        </div>
        <button class="btn-success" name="actualizar">Actualizar</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>
