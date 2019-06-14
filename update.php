<?php 
include "connection.php";
//handle deleting data from database
if (isset($_POST['delete'])) {
  $id = $_POST['id'];
$sql = "DELETE FROM users WHERE id = $id";
$connection->exec($sql);
header("Location:  ./index.php");
die();
}

 //check if username has submitted form 
 if (isset($_POST['submit'])) {
  $password = $_POST['password'];
  $email = $_POST['email'];
  //insert data into database
$id = $_POST['id'];
//update data in database
  $sql = "UPDATE users SET email = '$email',`password` ='$password' WHERE id = $id";

  $connection->exec($sql);
}



// Check for user ID in the address bar
if (isset($_GET['id'])) {
$id = $_GET['id'];
//Get all data from a specific user
$sql = "SELECT * FROM users WHERE id = $id";
$statement = $connection->prepare($sql);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>update user data</title>
</head>
<body>
   <div class="container"><h1>update user data</h1>
   <h3>you are updating user with Email: <?php echo $user['email']; ?> </h3>
   <form method="POST" action="">
   <div class="form-group">
   <label for="email">Email address</label>
   <input value="<?php echo $user['email']; ?>" type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
   <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
   </div>
   <div class="form-group">
   <label for="password">Password</label>
   <input value="<?php echo $user['password']; ?>" type="password" class="form-control" id="password" name="password" placeholder="Password">
   </div>
   <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
   <button type="submit" class="btn btn-success" name="submit">Submit</button>
   </form>
   
   <form action="" method="POST">
   <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
   <button type="submit" class="btn btn-danger mt-4" name="delete">delete</button>
   </form></div>



</body>
</html>