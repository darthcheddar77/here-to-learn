<?php
//connection file
$host= "localhost" ;
$username= "darthcheddar77";
$pass= "Yogi1132";
$dbname= "videogamegreatness";
$dsn= "mysql:host=$host;dbname=$dbname";
$options= array (
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
);
$connection = new PDO($dsn, $username, $pass, $options);
