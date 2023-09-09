<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from `application` where id=$id";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
  $firstname=$row['firstname'];
  $lastname=$row['lastname'];
  $IDnumber=$row['IDnumber'];

if(isset($_POST['submit'])){
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $IDnumber=$_POST['IDnumber'];

  $sql="update `application` set id='$id',firstname='$firstname',lastname='$lastname',
  IDnumber='$IDnumber' where id=$id";
  $result=mysqli_query($con,$sql);
  if($result){
    //echo"update successfull";
    header('location:index.php');
  }else{
    die(mysqli_error($con));
  }
}
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" >

    <title>application</title>
  </head>
  <body>
    <div class="container my-5">
       <form method="post">
        <div class="form-group">
        <label>firstname</label>
        <input type="text" class="form-control" name="firstname"
         placeholder="Enter your firstname" autocomplete="off" value=<?php
         echo $firstname;?>>
    </div>
    <div class="form-group">
       <label>lastname</label>
       <input type="text" class="form-control" name="lastname"
        placeholder="Enter your lastname" autocomplete="off"  value=<?php
         echo $lastname;?>>
    </div>
    <div class="form-group">
       <label>ID number</label>
       <input type="text" class="form-control" name="IDnumber"
        placeholder="Enter your IDnumber" autocomplete="off"  value=<?php
         echo $IDnumber;?>>
    </div>
    </div>
  
  <button type="submit" class="btn btn-primary" name="submit">update</button>
</form>
   </div>

</body>
</html>