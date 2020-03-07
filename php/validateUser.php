<?php
	session_start();
	include 'dbConnection.php';

	$userName = stripcslashes($_POST['uname']);
	$password = stripcslashes($_POST['pswd']);
	$type = stripcslashes($_POST['type']);
	$userName = mysqli_real_escape_string($connection, $userName);
	$password = mysqli_real_escape_string($connection, $password);
	$type = mysqli_real_escape_string($connection, $type);

	$query = "SELECT * FROM user WHERE username = '$userName' and
          password = '$password'";
	$result = mysqli_query($connection, $query);
	$row = mysqli_fetch_assoc($result);

	if(mysqli_num_rows(mysqli_query($connection, $query)) == 1){ //userFound
		if ($row['username'] == $userName && $row['password'] == $password && $row['type'] == 'collector') {
			header('Location: ../webpage/homeCollector.php');
			$_SESSION['userName'] = $row['username'];
			$_SESSION['fullName'] = $row['fullName'];
			$_SESSION['password'] = $row['password'];
			$_SESSION['userTyp'] = $row['type'];
		}
		else {
			if($row['username'] == $userName && $row['password'] == $password && $row['type']== 'recycler'){
				header('Location: ../webpage/homeRecycler.php');
				$_SESSION['userName'] = $row['username'];
				$_SESSION['fullName'] = $row['fullName'];
				$_SESSION['password'] = $row['password'];
				$_SESSION['userTyp'] = $row['type'];
			}
		}
	}
	else {
			header('Location: ../webpage/loginUser.php');
			$_SESSION['userName'] = "failed";
	}
 mysqli_close($connection);
?>
