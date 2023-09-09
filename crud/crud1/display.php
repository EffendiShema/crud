<?php

include 'connect.php';
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
</body>
</html>