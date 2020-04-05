<?php
session_start();
include '../php/dbConnection.php';
if (empty($_SESSION['edit'])) {
  $_SESSION['edit'] = "empty";
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Area | Home</title>
	  <link rel="icon" href="img/headLog.jpg">
		<!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js'></script>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/bootstrap-validator/0.4.5/js/bootstrapvalidator.min.js'></script>
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
            <?php if($_SESSION['userTyp']== "collector"):?>
            <li><a href="homeCollector.php">Home</a></li>
            <?php else: ?>
            <li><a href="homeRecycler.php">Home</a></li>
            <?php endif ?>
            <li><a href="#">Submission</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="userProfile.php">Welcome,  <?php echo $_SESSION['userName'] ?></a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Profile <small>Manage Your Profile</small></h1>
          </div>
        </div>
      </div>
    </header>
    <?php
    $userName = $_SESSION['userName'];
    $query = "SELECT * FROM user WHERE username = '$userName'";
    $result = mysqli_query($connection, $query);
  	$row = mysqli_fetch_assoc($result);
    ?>
		<div class="container">
      <?php
            if($_SESSION['edit'] == "failed") {
              echo
              "<br />
              <div class='alert alert-danger'>
              Update profile failed!!
              </div>";
              unset($_SESSION['edit']);
            }else if($_SESSION['edit'] == "success"){
              echo
              "<br />
              <div class='alert alert-success'>
              Update profile Success!!
              </div>";
              unset($_SESSION['edit']);
            }else {
              unset($_SESSION['edit']);
            }
      ?>

			<form method="post" action="../php/editProfile.php" class="was-validated">
      <div class="container">
    	<div class="row justify-content-center">
        <div class="col-md-6">
	         <div class="form-group">
	            <label>Enter UserName</label>
              <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
	               <input type="text" name="unam" id="unam" class="form-control" value="<?php echo $_SESSION['userName']; ?>" placeholder="Enter UserName" disabled />
               </div>
	         </div>

	          <div class="form-group has-feedback">
	             <label>Enter Password</label>
               <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-wrench"></i></span>
	                <input name="pswd" type="password" id="pswd" class="form-control" value="<?php echo  $row['password']; ?>" placeholder="Enter New Password"/>
               </div>
	          </div>

	           <div class="form-group has-feedback">
	              <label>FullName</label>
                <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
	                 <input type="text" name="fname" id="fname" class="form-control" value="<?php echo $row['fullName']; ?>" placeholder="Enter New FullName" />
                </div>
	          </div>
        </div>
        <?php if($_SESSION['userTyp']== "collector"):?>
        <div class="col-md-6">
        <div class="form-group has-feedback">
	      <label>Schedule</label>
        <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
	      <select name="sch" class="form-control" id="sch">
          <option value="<?php echo $row['day']; ?>" selected disabled><?php echo $row['day']; ?></option>
          <option value="Sunday"> Sunday </option>
          <option value="Monday"> Monday </option>
          <option value="Tuesday"> Tuesday </option>
          <option value="Wednesday"> Wednesday </option>
          <option value="Thursday"> Thursday </option>
          <option value="Friday"> Friday </option>
          <option value="Saturday"> Saturday </option>
        </select>
        </div>
	      </div>

        <div class="form-group has-feedback">
          <label>Select Material Name :</label>
          <?php
          $query1 = "SELECT * FROM material";
          $result1 = mysqli_query($connection,$query1);
          ?>
          <div class="input-group"> <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span>
          <select name="matID" class="form-control" id="matID">
            <option value="<?php echo $row['materialTyp']; ?>" selected disabled><?php echo $row['materialTyp']; ?></option>
            <?php while($data = mysqli_fetch_assoc($result1) ){?>
              <option value="<?php echo $data['materialName']; ?>"><?php echo $data['materialName']; ?></option>
            <?php } ?>
          </select>
          <br>
          </div>
        </div>
        </div>
        </div>
        <?php else: ?>
        <br><br><br><br><br><br><br><br><br><br><br><br>
        <?php endif ?>

         <div class="form-group">
              <input type="submit" name="update" id="update" value="Update" class="btn btn-info"/>
         </div>
	    </form>
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
</div>



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
