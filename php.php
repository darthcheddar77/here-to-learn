<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body> 
<?php include 'nav.php'; ?>
<h1>My CRUD guide </h1>
<h3>how to create (insert data)</h3>
<pre><code>

&#x3C;?php
this goes in the body of your page where you want it to display
include &#x22;connection.php&#x22;;
if (isset($_POST[&#x27;submit&#x27;])) {
  # code...
  echo &#x22;post submitted&#x22;;
  $password = $_POST[&#x27;password&#x27;];
  $email = $_POST[&#x27;email&#x27;];



  $sql = &#x22;INSERT INTO users (email, &#x60;password&#x60;)VALUES(&#x27;$email&#x27;,&#x27;$password&#x27;)&#x22;;

  $connection-&#x3E;exec($sql);
}

?&#x3E;

</code></pre>


<h3>how to read data</h3>
<pre>



<h3>How to update data in the database</h3>
<pre><code></code></pre>
Grab Data from database 


// Check for user ID in the address bar
if (isset($_GET['id'])) {
$id = $_GET['id'];
//Get all data from a specific user
$sql = "SELECT * FROM users WHERE id = $id";
$statement = $connection->prepare($sql);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
}
Show data in your form



&#x3C;form method=&#x22;POST&#x22; action=&#x22;&#x22;&#x3E;
    &#x3C;div class=&#x22;form-group&#x22;&#x3E;
      &#x3C;label for=&#x22;email&#x22;&#x3E;Email address&#x3C;/label&#x3E;
      &#x3C;input value=&#x22;&#x3C;?php echo $user[&#x27;email&#x27;]; ?&#x3E;&#x22; type=&#x22;email&#x22; name=&#x22;email&#x22; class=&#x22;form-control&#x22; id=&#x22;email&#x22; aria-describedby=&#x22;emailHelp&#x22; placeholder=&#x22;Enter email&#x22; required&#x3E;
      &#x3C;small id=&#x22;emailHelp&#x22; class=&#x22;form-text text-muted&#x22;&#x3E;We&#x27;ll never share your email with anyone else.&#x3C;/small&#x3E;
    &#x3C;/div&#x3E;
    &#x3C;div class=&#x22;form-group&#x22;&#x3E;
      &#x3C;label for=&#x22;password&#x22;&#x3E;Password&#x3C;/label&#x3E;
      &#x3C;input value=&#x22;&#x3C;?php echo $user[&#x27;password&#x27;]; ?&#x3E;&#x22; type=&#x22;password&#x22; class=&#x22;form-control&#x22; id=&#x22;password&#x22; name=&#x22;password&#x22; placeholder=&#x22;Password&#x22;&#x3E;
    &#x3C;/div&#x3E;
   &#x3C;input type=&#x22;hidden&#x22; name=&#x22;id&#x22; value=&#x22;&#x3C;?php echo $user[&#x27;id&#x27;]; ?&#x3E;&#x22;&#x3E;
    &#x3C;button type=&#x22;submit&#x22; class=&#x22;btn btn-success&#x22; name=&#x22;submit&#x22;&#x3E;Submit&#x3C;/button&#x3E;
  &#x3C;/form&#x3E;
Handle updating data when form is submitted

//check if username has submitted form 
 if (isset($_POST[&#x27;submit&#x27;])) {
  $password = $_POST[&#x27;password&#x27;];
  $email = $_POST[&#x27;email&#x27;];
  //insert data into database
$id = $_POST[&#x27;id&#x27;];
//update data in database
  $sql = &#x22;UPDATE users SET email = &#x27;$email&#x27;,&#x60;password&#x60; =&#x27;$password&#x27; WHERE id = $id&#x22;;

  $connection-&#x3E;exec($sql);
}

<h3>how to delete data from our database


This handles deleting data from the database if 


//handle deleting data from database
if (isset($_POST[&#x27;delete&#x27;])) {
  $id = $_POST[&#x27;id&#x27;];
$sql = &#x22;DELETE FROM users WHERE id = $id&#x22;;
$connection-&#x3E;exec($sql);
header(&#x22;Location:  ./index.php&#x22;);
die();
}



This is the form to click to delete data

&#x3C;form action=&#x22;&#x22; method=&#x22;POST&#x22;&#x3E;
   &#x3C;input type=&#x22;hidden&#x22; name=&#x22;id&#x22; value=&#x22;&#x3C;?php echo $user[&#x27;id&#x27;]; ?&#x3E;&#x22;&#x3E;
   &#x3C;button type=&#x22;submit&#x22; class=&#x22;btn btn-danger mt-4&#x22; name=&#x22;delete&#x22;&#x3E;delete&#x3C;/button&#x3E;
   &#x3C;/form&#x3E;
</h3>
</body>
</html>