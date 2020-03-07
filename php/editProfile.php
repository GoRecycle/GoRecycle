<?php
session_start();
include 'dbConnection.php';


$userName = $_POST['uname'];
$password = $_POST['pswd'];
$fullName = $_POST['fname'];

$query = " UPDATE user
 SET password = '$password', fullName = '$fullName'
 WHERE username = '$userName' ";

 mysqli_fetch_assoc -> mysqli_query($connection, $query);

 header("Location: ../webpage/userProfile.php");

?>
