<?php
// include connection to database file
include "connection.php";
if (isset($_POST['img'])) {
 
try {
  
  //HANDLE IMAGE
  if ($_FILES['myimage']['size'] != 0) {
    $folder = "./img/";
    $name = $_FILES['myimage']['name'];
    $ext = pathinfo($name, PATHINFO_EXTENSION);
    $newname = time() . "." . $ext;
    move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder" . $newname);
    $imgsrc = $folder . $newname;
  } else {
    $imgsrc = "";
  }
  $title = $_POST['title'];
  $sql = "INSERT INTO img (title, img_url) VALUES ('$title','$imgsrc')";

  $connection->exec($sql);



} catch (PDOException $error) {
  echo $sql . "<br>" . $error->getMessage();
}


}









if (isset($_POST['submit'])) {
  //check if username has submitted form 
  # code...
  echo "post submitted";
  $password = $_POST['password'];
  $email = $_POST['email'];
  //insert data into database
  $sql = "INSERT INTO users (email, `password`) VALUES ('$email','$password')";

  $connection->exec($sql);
}

  

//get all data from users
$sql = "SELECT * FROM users";
$statement = $connection->prepare($sql);
$statement->execute();
$users = $statement->fetchALL();





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
    <div class="form-group">
      <label for="email">Email address</label>
      <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" required>
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    </div>
    <button type="submit" class="btn btn-success" name="submit">Submit</button>
  </form>

  <?php
  if ($users && $statement->rowCount() > 0) {
    foreach ($users as $user) { ?>
      <div class="row">
        <div class="col">
          <?php echo $user['password']; ?>
    </div>
    <div class="col">
       <a href="update.php?id=<?php echo $user['id']; ?> "><?php echo $user['email']; ?></a>
  
  </div>
    </div>
        <?php
      }
    }
    ?>

<form method="POST" enctype="multipart/form-data">
<div class="form-group" >
    <label for="title">Title</label>
    <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp"  
  placeholder="enter">
  </div>
  <input type="file" name="myimage" id="myimage" accept=".png, .jpg, .kpeg, .svg">
  <button type="submit" class="btn btn-success" name="img">Upload Image</button>
</form>
</body>

</html>