<?php
session_start();

$status = $_SESSION['loggedin'];
$username = $_SESSION['username'];

if ($status == "" or $username == "") {
    header('location:admin.php');
}