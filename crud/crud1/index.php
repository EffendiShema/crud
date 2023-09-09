<?php
include 'connect.php';
if(isset($_POST['submit'])){
  $firstname=$_POST['firstname'];
  $lastname=$_POST['lastname'];
  $IDnumber=$_POST['IDnumber'];


  $sql="insert into `application`(firstname,lastname,IDnumber)
  value('$firstname','$lastname','$IDnumber')";
  $result=mysqli_query($con,$sql);
  if($result){
     echo"data inserted successfully";
   // header('location:display.php');
  }else{
    die(mysqli_error($con));
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
      crossorigin="anonymous">
    <link rel="stylesheet" href="style.css"> 
    <title>crud application</title>     
</head>
<body>
    <div class="container mt-5">
       <div class="text-center">
          <h1 class="display-5 mb-5"><strong>CRUD APPLICATION</strong></h1>
       </div>
       <div class="main row justify-content-center">
          <form method="post">
            <div class="col-10 col-md-8 mb-3">
              <label>FirstName</label>
              <input class="form-control" name="firstname" type="text" placeholder="enter firstname" autocomplete="off">
            </div>
            <div class="col-10 col-md-8 mb-3">
              <label>LastName</label>
              <input class="form-control" name="lastname" type="text" placeholder="enter lastname" autocomplete="off">
            </div>
            <div class="col-10 col-md-8 mb-3">
              <label>ID number</label>
              <input class="form-control" name="IDnumber" type="text" placeholder="enter idnumber" autocomplete="off">
            </div>
            <div class="col-10 col-md-8">
            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>
          <div class="col-12 col-md-10 mb-5">
            <table class="table table-striped table-dark">
             <thead>
              <tr>
              <td>SI no</td>
                <td>FirstName</td>
                <td>LastName</td>
                <td>ID number</td>
                <td>Action</td>
              </tr>
             </thead>
             <tbody id="student-list">
             <?php
$sql="select * from `application`";
$result=mysqli_query($con,$sql);
if($result){
  while($row=mysqli_fetch_assoc($result)){
    $id=$row['id'];
    $firstname=$row['firstname'];
    $lastname=$row['lastname'];
    $IDnumber=$row['IDnumber'];
    echo '<tr>
    <th scope="row">'.$id.'</th>
    <td>'.$firstname.'</td>
    <td>'.$lastname.'</td>
    <td>'.$IDnumber.'</td>
    
    <td>
    <button class="btn btn-primary"><a href="update.php? updateid='.$id.'" class="text-light">update</a></button>
    <button class="btn btn-danger"><a href="delete.php? deleteid='.$id.'" class="text-light">delete</a></button>
 </td>
  </tr>';
 }

}
    ?>
   
              
             </tbody>
            </table>
          </div>
       </div>
    </div>
     <!-- <script src="script.js"></script>  -->
</body>
</html>