<?php
session_start();
include '../php/dbConnection.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Submission Collector</title>
	  <link rel="icon" href="img/headLog.jpg">
		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  </head>
  <body>
		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">EcoSave|<?php echo $_SESSION['userTyp']?></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="homeCollector.php">Home</a></li>
            <li><a href="materialSubmission.php">Material Submission</a></li>
            <li><a href="viewSubCol.php">View Submission</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="userProfile.php">Welcome, <?php echo $_SESSION['userName'] ?></a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Home <?php echo $_SESSION['userTyp']?> <small>Welcome!!</small></h1>
          </div>
        </div>
      </div>
    </header>




    <div class="container">
      <?php if(isset($_SESSION['message'])): ?>
        <div class="alert alert-<?=$_SESSION['msg_type']?>">
          <?php
            echo $_SESSION['message'];
            unset ($_SESSION['message']);
          ?>
        </div>
      <?php endif ?>
    <div class="row justify-content-center">


    <div class="col-md-9">
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">Submission List</h3>
    </div>

    <table id= "myTable" class=" table table-striped table-hover ">
    <tr>
      <th>Submission ID</th>
      <th>Material Name</th>
      <th>Collector Name</th>
      <th>Recycler Name</th>
      <th>Proporsed Date</th>
      <th>Actual Date</th>
      <th>Weight in Kg</th>
      <th>Total Points</th>
      <th>Status </th>
    </tr>
    <?php
    $query = "SELECT * FROM submission, material  WHERE submission.materialNa = material.materialID";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)){?>
    <tr>
      <td><?php echo $row['submissionID']; ?></td>
      <td><?php echo $row['materialName']; ?></td>
      <td><?php echo $row['cUserName']; ?></td>
      <td><?php echo $row['rUserName']; ?></td>
      <td><?php echo $row['proposedDate']; ?></td>
      <td><?php echo $row['actualDate']; ?></td>
      <td><?php echo $row['weightInKg']; ?></td>
      <td><?php echo $row['pointsAwarded']; ?></td>
      <td><?php echo $row['status']; ?></td>
    </tr>
    <?php }
    }
    ?>
    </table>
    </div>
    </div>



    </div>
    </div>




    <footer id="footer">
      <div class="container">
        <div class="row">
          <div style="padding-left:45%">
            <p>Copyright EcoSave, &copy; 2020</p>
          </div>
        </div>
      </div>
    </footer>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
