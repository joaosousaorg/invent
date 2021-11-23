<?php
include('connect.php');
if (isset($_GET['deletid'])){
    $id=$_GET['deletid'];

    $sql="DELETE FROM comp WHERE id_comp=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Removido com sucesso";
        header('location:index.php');
    }
}
?>