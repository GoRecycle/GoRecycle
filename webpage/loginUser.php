<?php
session_start();
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                    <font color="white">Login | User</font>
                </li>
            </ul>

        </div>
    </nav>
    <div id="login">
       <div class="cotainer">
			<div id="login-row" class="row justify-content-center  align-items-center">
				<div class="col-md-3">
					<div class="card">
						<div class="card-header"><h3 class="text-left text-info">Login</h3></div>

							<div class="card-body">
                            <form action="../php/validateUser.php" method="POST" class="was-validated">
                                <br>
                                <div class="form-group">
                                  <label for="uname">Username:</label>
                                  <input type="text" class="form-control" id="userName" placeholder="Enter username" name="uname" required>
                                  <div class="valid-feedback">⠀</div>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                
                                <div class="form-group">
                                  <label for="pwd">Password:</label>
                                  <input type="password" class="form-control" id="password" placeholder="Enter password" name="pswd" required>
                                  <div class="valid-feedback">⠀</div>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

								                <div class="form-group">
                                  <label for="type">Type:</label>
                                  <select name="type" class="form-control selectpicker">
                                    <option value=''></option>
                                    <option value="collector">Collector</option>
                                    <option value="recycler">Recycler</option>
                                  </select>
                                  <div class="valid-feedback">⠀</div>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>

                                <div id="register-link" class="text-right form-group">
                                    <a href="registerUser.php" class="text-info">Register Account</a>
                                </div>
								<div class="form-group">
                                <button class="btn btn-primary" value="Log In">Login</button>
								</div>
							</form>
                    </div>
					<?php
								if($_SESSION['userName'] == "failed") {
									echo
									"<br />
									<div class='alert alert-danger'>
									Invalid username or password. Please try again!
									</div>";
									unset($_SESSION['userName']);
								}
							?>
					</div>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>
