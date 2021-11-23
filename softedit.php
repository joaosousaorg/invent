<?php
include('connect.php');
$id_soft = $_POST['id'];
$nome = $_POST['nome'];
$versao = $_POST['versao'];

$sql = "UPDATE software SET id_software='$id_soft', nome='$nome', versao='$versao' WHERE id_software='$id_soft'";

if ($conn->query($sql) === TRUE) {
  //echo "Registo editado";
  header('location:index.php');
} else {
  echo "Erro: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>