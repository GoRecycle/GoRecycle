<?php
	session_start();
	include 'dbConnection.php';

	$userName = stripcslashes($_POST['auserName']);
	$password = stripcslashes($_POST['apassword']);
	$fullName = stripcslashes($_POST['fName']);
	$type = stripcslashes($_POST['type']);

	$userName = mysqli_real_escape_string($connection, $userName);
	$password = mysqli_real_escape_string($connection, $password);
	$fullName = mysqli_real_escape_string($connection, $fullName);

	$query = "SELECT * FROM User WHERE username = '$userName'";
	$result = mysqli_query($connection, $query);

	if(mysqli_num_rows($result) > 0){
		echo "<script>alert('sign up failed');</script>";
		$_SESSION['aSignUp'] = "failed";
		header("Location: ../webpage/userSignUp.php");
	}
	else {
		if($type=='collector'){
			$query = "INSERT INTO  user (username, password, fullName, type)
			VALUES ('$userName', '$password', '$fullName', '$type')";
			mysqli_query($connection, $query);
			header("Location: ../webpage/loginUser.php");
		}else{
			$query = "INSERT INTO  user (username, password, fullName, type)
			VALUES ('$userName', '$password', '$fullName', 'recycler')";
			mysqli_query($connection, $query);
			header("Location: ../webpage/loginUser.php");
		}
	}


	mysqli_close($connection);
?>
