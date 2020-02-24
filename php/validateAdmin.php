<?php
	session_start();
	include 'dbConnection.php';
	
	$userName = stripcslashes($_POST['uname']);
	$password = stripcslashes($_POST['pswd']);
	$userName = mysqli_real_escape_string($connection, $userName);
	$password = mysqli_real_escape_string($connection, $password);
	
	$query = "SELECT * FROM user WHERE username = '$userName' and
          password = '$password'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);
	
	if ($row['username'] == $userName && $row['password'] == $password) {
		header('Location: ../webpage/homeAdmin.php');
		$_SESSION['userName'] = $row['username'];
		$_SESSION['fName'] = $row['fullName'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['profilePic'] = $row['profilePict'];
		$_SESSION['tPoint'] = $row['totalPoint'];
	}
	else {
		header('Location: ../webpage/loginAdmin.php');
		$_SESSION['userName'] = "failed";
	}

   mysqli_close($connection);
?>