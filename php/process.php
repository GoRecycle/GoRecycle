<?php
session_start();
include 'dbConnection.php';

$update = false;
$materialID = 0;
$name = '';
$desc = '';
$point = '';



if(isset($_POST['insert'])){
  $name= $_POST['name'];
  $desc= $_POST['desc'];
  $point= $_POST['point'];
  $queryy = "SELECT * FROM Material WHERE materialName = '$name'";
  $resulty = mysqli_query($connection, $queryy);
  if(mysqli_num_rows($resulty) > 0){
    $_SESSION['msg_type']= "danger";
    $_SESSION['message']= "Material already Exist!!";
  }else{
    $connection->query("INSERT INTO material VALUES ('$materialID', '$name', '$desc', '$point')") or
    die($connection-> error);

    $_SESSION['message']= "Material Added!!!";
    $_SESSION['msg_type']= "success";
  }


  header("location: ../webpage/material.php");
}

if(isset($_GET['delete'])){
  $materialID = $_GET['delete'];
  $connection->query("DELETE FROM material where materialID= '$materialID'") or die($connection-> error());

  $_SESSION['message']= "Material Deleted!!!";
  $_SESSION['msg_type']= "danger";
  header("location: ../webpage/material.php");
}

if(isset($_GET['edit'])){
  $materialID = $_GET['edit'];
  $result = $connection->query("SELECT * FROM material where materialID= '$materialID'") or die($connection-> error());
  $row = mysqli_fetch_assoc($result);
  $update = true;

  if(mysqli_num_rows($result) == 1){
    $name = $row['materialName'];
    $desc = $row['description'];
    $point = $row['pointsPerKg'];
  }
}

if(isset($_POST['update'])){
  $materialID= $_POST['materialID'];
  $name= $_POST['name'];
  $desc= $_POST['desc'];
  $point= $_POST['point'];

  $connection->query("UPDATE material SET materialName = '$name', description = '$desc', pointsPerKg = '$point' where materialID= '$materialID'") or die($connection-> error());
  $_SESSION['message']= "Material Updated!!!";
  $_SESSION['msg_type']= "warning";
  header("location: ../webpage/material.php");
}

?>
