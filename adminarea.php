<?php
include "adminsession.php";
?>


<!DOCTYPE html>



<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Area</title>
</head>
<body>
<?php include 'nav.php'; ?>
<div class="container">
<div class="row">
<div class="col">
<h1>Welcome <?php echo $_SESSION['username'];?></h1>
 </div>
</div>
</div>   
</body>
</html>