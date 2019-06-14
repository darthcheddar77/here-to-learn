<?php
include "connection.php";

if (isset($_POST['register'])) {
    //check if username has submitted form 
    # code...
    echo "post submitted";
    $password = $_POST['password'];
    $username = $_POST['username'];
    $password2 = $_POST['password2'];
   
   
   if ($password == $password2) {
   $password = password_hash($password, PASSWORD_DEFAULT);
     
   //insert data into database
      $sql = "INSERT INTO `admin`(username, `password`) VALUES ('$username','$password')";
  
      $connection->exec($sql);
  

} else {
       
    echo "<h1>Passwords do not match</h1>";
   }
   
 
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Register</title>
</head>
<body>
<h1>register</h1>   
<form action="" method="post">
<div class="form-group">
<label for="username">Enter Username</label>
<input type="text" name="username" id="username">
</div>

<div class="form-group">
<label for="password">Confirm Password</label>
<input type="password" name="password" id="password">
</div>

<div class="form-group">
<label for="password2">Confirm Password</label>
<input type="password" name="password2" id="password2">
</div>
<button type="submit" class="btn btn-primary" name="register">Register</button></form>

</body>
</html>