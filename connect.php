<?php

$server = "localhost";
$username = "web";
$pass = "lusofona";
$database = "invent";

$conn = new mysqli($server, $username, $pass, $database);
if ($conn->connect_error) {
  die("Erro: " . $conn->connect_error);
}

?>