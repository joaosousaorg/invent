<?php
include('connect.php');
if(isset($_POST['submit'])){
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $so = $_POST['so'];

  $sql = "INSERT INTO comp (marca, modelo, so) VALUES ('$marca', '$modelo', '$so')";

  if ($conn->query($sql) === TRUE) {
    echo "Registo criado";
    header('location:index.php');
  } else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
  }
  $conn->close();
}
?>