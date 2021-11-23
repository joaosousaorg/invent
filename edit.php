<?php
include('connect.php');
$id = $_POST['id'];
$marca = $_POST['marca'];
$modelo = $_POST['modelo'];
$so = $_POST['so'];

$sql = "UPDATE comp SET id_comp='$id', marca='$marca', modelo='$modelo', so='$so' WHERE id_comp='$id'";

if ($conn->query($sql) === TRUE) {
  //echo "Registo editado";
  header('location:index.php');
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>