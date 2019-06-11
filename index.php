<?php

include "connection.php";
if (isset($_POST['submit'])) {
    # code...
echo "post submitted";
$password = $_POST['password'];
$email = $_POST['email'];



$sql= "INSERT INTO users (email, `password`)VALUES('$email','$password')";

$connection ->exec($sql);


}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form method="POST" action="">
                    <div class="form-group" >
                      <label for="email">Email address</label>
                      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email"  required>
                      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                      <label for="password">Password</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                  </form>
        <div class="col">

</body>
</html>