<?php
include('connect.php');
if(isset($_POST['submit'])){
  $nome = $_POST['nome'];
  $versao = $_POST['versao'];
  $id_c = $_POST['comp'];

  $sql = "INSERT INTO software (id_comp, nome, versao) VALUES ('$id_c','$nome', '$versao')";

  if ($conn->query($sql) === TRUE) {
    echo "Registo criado";
    header('location:index.php');
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>