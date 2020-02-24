<?php
	session_start();
	include 'dbConnection.php';
	
	$userName = stripcslashes($_POST['uname']);
	$password = stripcslashes($_POST['pswd']);
	$userName = mysqli_real_escape_string($connection, $userName);
	$password = mysqli_real_escape_string($connection, $password);
	$type = stripcslashes($_POST['type']);
	
	$query = "SELECT * FROM user WHERE username = '$userName' and
          password = '$password'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);
	
	if($type = "collector"){
		if ($row['username'] == $userName && $row['password'] == $password && $row['type']== $type) {
			header('Location: ../webpage/homeCollector.php');
			$_SESSION['userName'] = $row['username'];
			$_SESSION['fullName'] = $row['fullName'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['profilePic'] = $row['profilePict'];
		}
		else {
			header('Location: ../webpage/loginUser.php');
			$_SESSION['userName'] = "failed";
		}
	}
	else{
		if ($row['username'] == $userName && $row['password'] == $password && $row['type']== $type) {
			header('Location: ../webpage/homeRecycler.php');
			$_SESSION['userName'] = $row['username'];
			$_SESSION['fullName'] = $row['fullName'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['profilePic'] = $row['profilePict'];
			$_SESSION['point'] = $row['totalPoint'];
		}
		else {
			header('Location: ../webpage/loginUser.php');
			$_SESSION['userName'] = "failed";
		}
	}

   mysqli_close($connection);
?>