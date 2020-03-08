<?php
session_start();
include 'dbConnection.php';

$searchSubId = $_POST['sSubID'];
$weightInKg = $_POST['weightInKg'];
$actualDate = $_POST['actualDate'];
$status = 'submitted';

$searchSubId = mysqli_real_escape_string($connection, $searchSubId);
$weightInKg = mysqli_real_escape_string($connection, $weightInKg);
$actualDate = mysqli_real_escape_string($connection, $actualDate);
$status = mysqli_real_escape_string($connection, $status);

$point = "SELECT pointsPerKg FROM submission s, material m WHERE s.materialID=m.materialID AND submissionID = '$searchSubId' ";
mysqli_query($connection,$point);


$tpoint = $weightInKg * $point;
$tpoint = mysqli_real_escape_string($connection, $tpoint);

$sql="UPDATE submission SET weightInKg='$weightInKg', actualDate = '$actualDate', status = '$status', pointsAwarded = '$tpoint' WHERE submissionID = '$searchSubId' ";
mysqli_query($connection,$sql);

header("Location: ../webpage/materialSubmission.php");
mysqli_close($connection);


 ?>
