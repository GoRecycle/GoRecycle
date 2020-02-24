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
                    <font color="white">Login | House Officer</font>
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
                        
                            <form action="../php/validateAdmin.php" method="post" class="was-validated">
                                <br>
                                <div class="form-group">
                                  <label for="uname">Username:</label>
                                  <input type="text" class="form-control" id="uname" name="uname" required>
                                  <div class="valid-feedback">⠀</div>
                                  <div class="invalid-feedback">Please enter your Username.</div>
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Password:</label>
                                  <input type="password" class="form-control" id="pwd" name="pswd" required>
                                  <div class="valid-feedback">⠀</div>
                                  <div class="invalid-feedback">Please enter your password.</div>
                                </div>
                                <button class="btn btn-primary" style="margin-left:32%; padding-left:50px; padding-right:50px;">Login</button>
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