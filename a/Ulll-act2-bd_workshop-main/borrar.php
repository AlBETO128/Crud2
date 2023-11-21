
<?php

include("db.php");

if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "DELETE FROM tbl_medicamento WHERE id_vendedor = $id";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Operacion Fallida.");
  }

  $_SESSION['message'] = 'Eliminado correctamente';
  $_SESSION['message_type'] = 'Error';
  header('Location: index.php');
}

?>
