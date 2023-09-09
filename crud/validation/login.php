<?php
include 'connect.php';
$login=0;
$invalid=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

    $sql="select * from `registration` where username='$username'
    and password='$password'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
             $login=1;
             session_start();
             $_SESSION['username']=$username;
             header('location:home.php');

        }else{
            $invalid=1;
        }
                   }
    }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous">


    <title>login</title>
</head>
<body>
<?php
    if($login){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>cyazeee!</strong> you are successfully logged in.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <?php
    if($invalid){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>yahuuzoo shaa!</strong> Invalid credentials.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>

    
    <h1 class="text-center">LOG IN TO OUR PAGE</h1>
    <div class="container mt-5 ">
    <form action="login.php" method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control w-50" placeholder="Enter your username" name="username">
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control w-50" placeholder="Enter your Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-50">Login</button>
</form>
    </div>
</body>
</html>


