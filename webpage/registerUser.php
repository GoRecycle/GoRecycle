<?php
session_start();
if (empty($_SESSION['aSignUp'])) {
  $_SESSION['aSignUp'] = "empty";
}
if (empty($_SESSION['userName'])) {
  $_SESSION['userName'] = "empty";
}
?>

<!DOCTYPE Html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>EcoSave</title>

    <link rel="icon" href="img/headLog.jpg">
    <link href="css/style.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


  </head>


  <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Back to Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav mr-right">
                        <li class="nav-item">
                            <font color="white">Create an Account for User</font>
                        </li>
                    </ul>
                    
                </div>
            </nav>

        <div id="regist2">
            <div class="cotainer">
				<div id="login-row" class="row justify-content-center  align-items-center">
					<div class="col-md-3">
						<div class="card">
							<div class="card-header"><h3 class="text-left text-info">Register Account</h3></div>
								<div class="card-body">
                                    <form action="../php/userSignUp.php" method="post" class="was-validated">
                                            <br>
                                            <div class="form-group row">
                                                <label for="username" class="text-info">Username:</label><br>
                                                <input type="text" name="auserName" id="auserName" class="form-control" required>
                                                <div class="valid-feedback">⠀</div>
                                                <div class="invalid-feedback">Please enter your username.</div>
                                            </div>
                                            <div class="form-group row">
                                                    <label for="password" class="text-info">FullName</label><br>
                                                    <input type="name" name="fName" id="fName" class="form-control" required>
                                                    <div class="valid-feedback">⠀</div>
                                                    <div class="invalid-feedback">Please enter your valid Email.</div>
                                                </div>
                                            <div class="form-group row">
                                                <label for="password" class="text-info">Password:</label><br>
                                                <input type="password" name="apassword" id="apassword" class="form-control" required>
                                                <div class="valid-feedback">⠀</div>
                                                <div class="invalid-feedback">Please enter your Password.</div>
                                            </div>
                                            <div class="form-group row">
                                                    <label for="password" class="text-info">Confirm Password:</label><br>
                                                    <input type="password" name="cpassword" id="cpassword" class="form-control" required>
                                                    <div class="valid-feedback">⠀</div>
                                                    <div class="invalid-feedback">Please re enter your Password.</div>
                                            </div>
											<div class="form-group row">
												<label for="type">Type:</label>
												<select name="type" class="form-control selectpicker">
													<option value="collector">Collector</option>
													<option value="recycler">Recycler</option>
													</select>
												<div class="valid-feedback">⠀</div>
												<div class="invalid-feedback">Please fill out this field.</div>
											</div>
                                            <div class="form-group row">
                                                <label for="remember-me" class="text-info"><span><input id="remember-me" name="remember-me" type="checkbox" required></span>
                                                    <span>I Hereby Agree to </span>
                                                    <button type="button" data-toggle="modal" data-target="#myModal">Terms and Conditions</button>
                                                </label>
                                                <div class="valid-feedback">⠀</div>
                                                    <div class="invalid-feedback">Please re enter your Password.</div>
                                            </div>
                                        <button class="btn btn-primary">Register</button>
                                    </form>
								</div>
						</div>
                    </div>
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
                <h4 class="modal-title">Terms and Conditions</h4>
            </div>
            <!-- body modal -->
            <div class="modal-body">
                <p>The Intellectual Property disclosure will inform users that the contents, logo and other visual media you created is your property and is protected by copyright laws.</p>
            </div>
            <!-- footer modal -->
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close Window</button>
            </div>
        </div>
    </div>
</div>
</div>
<?php
/*
prompt the user if they failed to sign up
*/
if($_SESSION['aSignUp'] == "failed") {
  echo
  "<script>alert('This username has been taken!')</script>";
  unset($_SESSION['aSignUp']);
}
?>
</body>
</html>