<?php
session_start();
include 'dbConnection.php';

$update = false;
$subID = 0;
$matID = '';
$pdate ='';
$cName ='';
$rName ='';
$wInKg = 0;
$pAward = 0;
$Status ='Proposed';
$actDate ='';

if(isset($_POST['insert'])){

  $matID = $_POST['matID'];
  $cName = $_POST['cName'];
  $pdate = $_POST['pDate'];
  $rName = $_POST['rName'];

  $connection->query("INSERT INTO submission VALUES ('$subID', '$pdate', '$actDate', '$wInKg','$pAward','$Status','$matID','$cName','$rName')") or
  die($connection-> error);

  $_SESSION['message']= "Submission Added!!!";
  $_SESSION['msg_type']= "success";

  header("location: ../webpage/appointment.php");
}







 ?>
