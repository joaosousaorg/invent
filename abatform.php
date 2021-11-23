<?php
include('connect.php');
if (isset($_GET['abatid'])){
    $id=$_GET['abatid'];

    $sql="INSERT INTO comp_abat (id_comp) VALUES ('$id')";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Removido com sucesso";
        header('location:index.php');
    }
}
?>