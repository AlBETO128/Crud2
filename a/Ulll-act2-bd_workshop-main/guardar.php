<?php

include('db.php');

if (isset($_POST['guardar'])) {
  $nombre = $_POST['nombre'];
  $Laboratorio = $_POST['Laboratorio'];
  $Contenido = $_POST['Contenido'];
  $Via = $_POST['Via'];
  $Dosis = $_POST['Dosis'];
  $Presentacion= $_POST['Presentacion'];
  $Precio = $_POST['Precio'];
  $query = "INSERT INTO tbl_medicamento(nombre, Laboratorio, Contenido, Via, Dosis, Presentacion, Precio) VALUES ('$nombre', '$Laboratorio', '$Contenido', '$Via', '$Dosis', '$Presentacion', '$Precio')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Registro Fallido.");
  }

  $_SESSION['message'] = 'Registrado con exito';
  $_SESSION['message_type'] = 'Exito';
  header('Location: index.php');

}

?>
