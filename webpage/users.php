<?php
session_start();
include '../php/dbConnection.php';

if (empty($_SESSION['add'])) {
	$_SESSION['add'] = "empty";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Users</title>
	  <link rel="icon" href="img/headLog.jpg">
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="css/homeAdmin.css" rel="stylesheet">-->
    <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
    <script>
    /**
      This function will let the table clickable
      whenever user click on the table row
    **/
      $(document).ready(function(){
        $('table tbody tr').click(function(){
          window.location = $(this).data("href");
        });
      });

      /**
        This function will search the title of the
        session in the table based on the user
        input (reference from Internet)
      */
      function myFunction(column) {
      // Declare variables
      var input, filter, table, tr, td, i, column;
      input = document.getElementById("myInput");
      filter = input.value.toUpperCase();
      table = document.getElementById("myTable");
      tr = table.getElementsByTagName("tr");

      // Loop through all table rows, and hide those who don't match the search query
      for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[column];
        if (td) {
          if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
            tr[i].style.display = "";
          } else {
            tr[i].style.display = "none";
          }
        }
      }
    }

    /**
      This function will sort the whole row based on
      the date. (reference from Internet)
    */
    function sortTable(n) {
      var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
      table = document.getElementById("myTable");
      switching = true;
      //Set the sorting direction to ascending:
      dir = "asc";
      /*Make a loop that will continue until
      no switching has been done:*/
      while (switching) {
        //start by saying: no switching is done:
        switching = false;
        rows = table.getElementsByTagName("TR");
        /*Loop through all table rows (except the
        first, which contains table headers):*/
        for (i = 1; i < (rows.length - 1); i++) {
          //start by saying there should be no switching:
          shouldSwitch = false;
          /*Get the two elements you want to compare,
          one from current row and one from the next:*/
          x = rows[i].getElementsByTagName("TD")[n];
          y = rows[i + 1].getElementsByTagName("TD")[n];
          /*check if the two rows should switch place,
          based on the direction, asc or desc:*/
          if (dir == "asc") {
            if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          } else if (dir == "desc") {
            if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
              //if so, mark as a switch and break the loop:
              shouldSwitch= true;
              break;
            }
          }
        }
        if (shouldSwitch) {
          /*If a switch has been marked, make the switch
          and mark that a switch has been done:*/
          rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
          switching = true;
          //Each time a switch is done, increase this count by 1:
          switchcount ++;
        } else {
          /*If no switching has been done AND the direction is "asc",
          set the direction to "desc" and run the while loop again.*/
          if (switchcount == 0 && dir == "asc") {
            dir = "desc";
            switching = true;
          }
        }
      }
    }

    </script>
  </head>
  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">EcoSave Admin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="homeAdmin.php">Dashboard</a></li>
            <li><a href="material.php">Materials</a></li>
            <li class="active"><a href="users.php">Users</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome, Admin</a></li>
            <li><a href="index.php">Logout</a></li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <header id="header">
      <div class="container">
        <div class="row">
          <div class="col-md-10">
            <h1><span class="glyphicon glyphicon-user" aria-hidden="true"></span> Users <small>Manage Users</small></h1>
          </div>
        </div>
      </div>
    </header>

    <section id="breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li class="active">Users</li>
        </ol>
      </div>
    </section>

    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- Website Overview -->
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
											<?php
												$query = "SELECT count(*) as total FROM user";
												$result = mysqli_query($connection, $query);
												$values = mysqli_fetch_assoc($result);
												$num_rows = $values['total'];
												echo $num_rows;
												?>
										</h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
											<?php
												$query = "SELECT count(*) as total FROM material";
												$result = mysqli_query($connection, $query);
												$values = mysqli_fetch_assoc($result);
												$num_rows = $values['total'];
												echo $num_rows;
												?>
										</h2>
                    <h4>Materials</h4>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 12,334</h2>
                    <h4>Visitors</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Users List</h3>
                </div>
                <!-- Input from Admin to search for Users -->
                <input type="text" class = "form-control" id="myInput" onkeyup="myFunction(0)" placeholder="Search for User FullName..">
                <div id = "myTable" class="panel-body">
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Full Name</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>User Type</th>
                        <th>Total Point</th>
                      </tr>
                          <?php
  								            $query = "SELECT * FROM user ORDER BY fullName";
  								               $result = mysqli_query($connection, $query);
  								                     if (mysqli_num_rows($result) > 0) {
  									                       while ($row = mysqli_fetch_assoc($result)) {
  										                         echo "<tr id='" . $row['username'] . "' data-toggle='modal' data-target='#myModalEdit'>";
                                               echo "<td>" . $row['fullName'] . "</td>";
  										                         echo "<td>". $row['username'] . "</td>";
  									                           echo "<td>" . $row['password'] . "</td>";
  										                         echo "<td>" . $row['type'] . "</td>";
                                               echo "<td>" . $row['totalPoint'] . "</td>";
  										                         echo "</tr>";
  									                      }
  								                    }
  							        ?>
                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>

    <footer id="footer">
      <div class="container">
        <div class="row">
          <div style="padding-left:45%">
            <p>Copyright EcoSave, &copy; 2020</p>
          </div>
        </div>
      </div>
    </footer>

    <!-- Modals -->
    <?php
/*
prompt the user if they failed to sign up
*/
if($_SESSION['add'] == "failed") {
  echo
  "<script>alert('This Id has been taken!')</script>";
  unset($_SESSION['add']);
}
?>




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
