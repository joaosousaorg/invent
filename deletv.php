<?php
include('connect.php');

if (isset($_GET['deletvid'])){
    $id_soft=$_GET['deletvid'];

    $sql="DELETE FROM software WHERE id_software=$id_soft";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Removido com sucesso";
        header('location:index.php');
    }
}
?>