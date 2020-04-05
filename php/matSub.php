<?php
session_start();
include 'dbConnection.php';




$searchSubId = $_POST['sSubID'];
$weightInKg = $_POST['weightInKg'];
$actualDate = date("Y-m-d H:i:s");
$status = 'submitted';
$point = "SELECT pointsPerKg FROM submission, material WHERE submission.materialID = material.materialID AND submissionID = '".$_GET['sSubID']."' ";

$searchSubId = mysqli_real_escape_string($connection, $searchSubId);
$weightInKg = mysqli_real_escape_string($connection, $weightInKg);

$status = mysqli_real_escape_string($connection, $status);
$point = mysqli_real_escape_string($connection, $point);






$tpoint = $weightInKg * $point;
$tpoint = mysqli_real_escape_string($connection, $tpoint);

$sql="UPDATE submission SET weightInKg='$weightInKg', actualDate = '$actualDate', status = '$status', pointsAwarded = '$tpoint' WHERE submissionID = '$searchSubId' ";
mysqli_query($connection,$sql);

header("Location: ../webpage/materialSubmission.php");
mysqli_close($connection);


 ?>
