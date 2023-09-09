<?php

$con = new mysqli('localhost','root','','validation');

if(!$con){
    die(mysqli_error($con));
}

?>