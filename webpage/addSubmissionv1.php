<?php
session_start();
include '../php/dbConnection.php';
?>
<!DOCTYPE Html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Submission</title>

	<link rel="stylesheet" type="text/css" href="css/addSubmission.css">
	<link rel="icon" href="img/headLog.jpg">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/style.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>


  </head>

  <body style="background-color:#E6E6FA">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">GoRecycle | Recycle</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="addResidence.php">NewSubmission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="housingAlocate.php">ViewSubmission</a>
                </li>
            </ul>
            <ul class="navbar-nav mr-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="img/person-flat.png" alt="" width="35px">⠀<?php echo "Welcome, " . $_SESSION['username']."!";?>
                    </a>
                    <div class="dropdown-menu p-3">
                        <form class="form-horizontal" method="post" accept-charset="UTF-8">
                            <a href="editProfileOfficer.php"><img src="img/icon1.png" alt="" width="30px">⠀Account</a> <br>
                            <a href="index.php"><img src="img/icon2.png" alt="" width="30px">⠀Logout</a>
                        </form>
                    </div>
                </li>
            </ul>

        </div></nav>

<main>
  <div class="container">
  <form action="../php/addSub.php method="post">
    <div class="row">
      <div class="col-25">
        <label for="collectorName">Submissin ID :</label>
      </div>
      <div class="col-75">
        <div class="row">
          <div class="col-25">
            <label for="collectorName">Select Collector :</label>
          </div>
          <div class="col-75">
            <input type="text" readonly="" name="submissionID" value="<?php echo $newID; ?>">
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="materialName">Insert Material : </label>
      </div>
      <div class="col-75">
        <input type="text" name="materialID" placeholder="Insert material ID">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="collectorName">Select Collector :</label>
      </div>
      <div class="col-75">
        <input type="text" name="CollectorUname" placeholder="Insert Collector name">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="title">Proposed Date :</label>
      </div>
      <div class="col-75">
        <input type="date" name="proposedDate">
      </div>
    </div>
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div>
</main>
  </body>
</html>
