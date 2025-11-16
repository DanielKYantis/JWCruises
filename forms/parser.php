<?php require_once '../users/init.php';

$resp = ['success'=>false];

if ($_POST) {

  $table = $_POST["table"];
  $id    = $_POST["id"];
  $field = $_POST["field"];
  $value = mysqli_real_escape_string($dbx, json_decode(json_encode($_POST["value"])));

  $sql = "UPDATE " .$table . " SET " .$field. " = '" .$value. "' WHERE ID = " .$id;

  if (!$dbx->query($sql)) {
    printf("Error message: %s\n", $mysqli->error);
  } else {
    $resp['success'] = true;
  }

}

echo json_encode($resp);
die();

?>
