<?php
include 'connect.php';
$success=0;
$user=0;

if($_SERVER['REQUEST_METHOD']=='POST'){
    $username=$_POST['username'];
    $password=$_POST['password'];

    // $sql="insert into `registration`(username,password)values('$username','$password')";
    // $result=mysqli_query($con,$sql);
    // if($result){
    //     echo"data inserted successfully";
    //  }else{
    //    die(mysqli_error($con));
    //  }
    if(empty($username)){
      $usernameError = "name is required";
    }else{
      $username = trim($username);
      $username = htmlspecialchars($username);
      
    }

    $sql="select * from `registration` where username='$username'";

    $result=mysqli_query($con,$sql);
    if($result){
        $num=mysqli_num_rows($result);
        if($num>0){
            // echo 'user already exists';
            $user=1;
        }else{
            $sql="insert into `registration`(username,password)values('$username','$password')";
             $result=mysqli_query($con,$sql);
             if($result){
                //  echo"sign up successfully";
                $success=1;
                header('location:login.php');
              }else{
                die(mysqli_error($con));
              }
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


    <title>sign up</title>
</head>
<body>
<?php
    if($user){
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>yahuuzooo shaa!</strong> user already exists.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    
    <?php
    if($success){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>cyazeee!</strong> you are successfully signed up.
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>';
    }
    ?>
    <h1 class="text-center">SIGN UP PAGE</h1>
    <div class="container mt-5 ">
    <form action="sign up.php" method="post">
  <div class="form-group">
    <label>Name</label>
    <input type="text" class="form-control w-50" placeholder="Enter your username" 
    name="username">
    <span class="alert alert-danger"><?php echo '$usernameError' ?></span>
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control w-50" placeholder="Enter your Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-50">Signup</button>
</form>
    </div>
</body>
</html>