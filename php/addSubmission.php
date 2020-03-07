<?php
session_start();
include 'dbConnection.php';





  $matID = $_POST['materialID']
  $cName = $_POST['cName'];
  $pdate = $_POST['proposedDate'];
  $rName = $_POST['rName'];

  $subID = mysqli_real_escape_string($connection, $subID);
  $matID = mysqli_real_escape_string($connection, $matID);
  $cName = mysqli_real_escape_string($connection, $cName);
  $pdate = mysqli_real_escape_string($connection, $pdate);
  $rName = mysqli_real_escape_string($connection, $rName);

  $queryU = "Update 'submission' SET materialID = '$matID', CollectorUname = '$cName', proposedDate = '$pdate' WHERE submissionID = '$subID'"

  //get the latest property added which is also the newest.
  	if (mysqli_num_rows($result) > 0) {
  		echo "<script>alert('failed to input');</script>";
  		$_SESSION['add'] = "failed";
  		header("Location: ../webpage/appointment.php");
  	}
  	else {
  		//insert into propertyList table.
  		$sql="INSERT INTO `submission` (submissionID, proposedDate, actualDate, weightInKg, pointsAwarded, materialID, CollectorUname, RecyclerUname)
  		VALUES ('$subID', '$pdate', 'none', '0', '0','$matID', 'PROPOSED', '$cName', '$rName')";
  		mysqli_query($connection, $sql);
  		$_SESSION['add'] = "SUCCESS";
  		$_SESSION['id'] = $row['id'];
  		$_SESSION['message'] = "Saved!";
  		header("Location: ../webpage/addSubmission.php");
  	}

  	mysqli_close($connection);







 ?>
