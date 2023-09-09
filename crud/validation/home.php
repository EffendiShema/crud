<?php

session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
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

    <title>welcome page</title>
</head>
<body>
    <h1 class="text-center text-warning mt-5">Welcome
        <?php echo $_SESSION['username'];?>
    </h1>
    <div class="container">
       <a href="logout.php" class="btn btn-primary mt-5">Logout</a>
    </div>

</body>
</html>