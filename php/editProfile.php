<?php
session_start();
include 'dbConnection.php';


$userName = $_SESSION['userName'];
$password = $_POST['pswd'];
$fullName = $_POST['fname'];
echo "$userName";
echo "$password";
echo "$fullName";


$query = " UPDATE user
 SET username = '$userName', password = '$password', fullName = '$fullName'
 WHERE username = '$userName' ";

 $result = mysqli_query($connection, $query);

  if($result){
    mysqli_query($connection, $query);
    $_SESSION['edit'] = "success";
  }else{
    	$_SESSION['edit'] = "failed";
  }

header("Location: ../webpage/userProfile.php");
mysqli_close($connection);
?>
