<?php
include 'connect.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from `application` where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        // echo 'deleted successfull';
        header('location:index.php');
    }else{
        die(mysqli_error($con));
    }
}

?>