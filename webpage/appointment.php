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

    <title>User Area | Home Collector</title>
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
            <li><a href="home.php">Home</a></li>
            <li><a href="material.php">Submission</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="userProfile.php">Welcome, <?php echo $_SESSION['fullName'] ?></a></li>
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
			<h1>HOME Recycler</h1>
		</div>


<?php
$query = "SELECT * FROM material";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0){
  while ($row = mysqli_fetch_assoc($result)){
    $mName = $row["materialName"];
    $mID = $row["materialID"];
    $desc = $row["description"];
    $pPerKg = $row["pointsPerKg"];
  }
?>
<div class="col-md-4">
<div class="card" style="width: 18rem;">

<div class="card-body">
<h5 class="card-title"> <?php echo $mName; ?> </h5>
<h6 class="card-subtitle mb-2 text-muted"> <?php echo $mID; ?> </h6>
<p class="card-text">Points Per Kg : <?php echo $pPerKg; ?> </p>
<p class="card-text">Description : <?php echo $desc; ?> </p>
<a href="#" class="card-link" data-toggle='modal' data-target='#myModal'>Card link</a>
</div>
</div>
</div>




<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- konten modal-->
        <div class="modal-content">
            <!-- heading modal -->
            <div class="modal-header">
                <h4 class="modal-title">Create Appointment</h4>
            </div>
            <!-- body modal -->
            <div class="modal-body">
                <form action="../php/addSubmission.php" method="post" class="was-validated">

					<label for="materialID" class="text-info">Material ID :</label><br>
                    <input type="text" name="materialID" id="bookingId" class="form-control" value = <?php echo $mID; ?> >

					<label for="Cname" class="text-info">Collector :</label><br>
          <?php
          $query2 = "SELECT * FROM user WHERE type = 'collector' ORDER BY fullName DESC";
          $result2 = mysqli_query($connection,$query2);
          ?>
            <select name="cName">
              <?php while($data = mysqli_fetch_assoc($result2) ){?>
                <option value="<?php echo $data['username']; ?>"><?php echo $data['username']; ?></option>
              <?php } ?>
            </select>


					<label for="datefrom" class="text-info">Proporsed Date : </label><br>
                    <input type="date" name="proposedDate"  class="form-control" >


					<label for="Rname" class="text-info">Recycler Name : </label><br>
                    <input type="text" name="rName" readonly=""  class="form-control" value = <?php echo $_SESSION['fullName']>


          <input type="hidden" name="submissionID" id="submissionID" value="<?php echo $subID ?>" />
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
				<input type="submit" value="Submit">
				</form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close Window</button>
            </div>
        </div>
    </div>
</div>
<?php } ?>


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
