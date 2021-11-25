<?php
include('connect.php');
if (isset($_GET['deletabt'])){
    $id=$_GET['deletabt'];

    $sql="DELETE FROM comp_abat WHERE id_comp=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        echo "Removido com sucesso";
        header('location:abat.php');
    }
}
?>