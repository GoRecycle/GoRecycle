<?php
include '../php/dbConnection.php';

?>
<!DOCTYPE Html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Area | Materials</title>

    <link rel="icon" href="img/headLog.jpg">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
          <a class="navbar-brand" href="#">EcoSave Admin</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="homeAdmin.php">Dashboard</a></li>
            <li  class=""><a href="material.php">Materials</a></li>
            <li><a href="users.php">Users</a></li>
            <li  class="active"><a href="submissions.php">Submissions</a></li>
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
          <h1><span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span> Materials <small>Submissions History</small></h1>
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
    <div class="col-md-12">
      <!-- Input from Admin to search for Users -->
      <input type="text" class = "form-control" id="myInput" onkeyup="myFunction(1)" placeholder="Search for User MaterialName..">
    <div class="panel panel-default">
    <div class="panel-heading">
    <h3 class="panel-title">List Materials</h3>
    </div>

		<table id= "myTable" class="table table-striped table-hover ">
			<tr>
				<th>Material ID</th>
        <th>Material Name</th>
				<th>Description</th>
				<th>PointsPerKg</th>
      </tr>
      <?php
			$query = "SELECT * FROM material ORDER BY materialName";
			$result = mysqli_query($connection, $query);
			if (mysqli_num_rows($result) > 0) {
  		while ($row = mysqli_fetch_assoc($result)){?>
			<tr>
				<td> <a href="submissions.php?edit= <?php echo $row['materialName'];  ?>"><?php echo $row['materialID']; ?></a></td>
				<td><?php echo $row['materialName']; ?></td>
				<td><?php echo $row['description']; ?></td>
				<td><?php echo $row['pointsPerKg']; ?></td>
			</tr>
		<?php }
		}
	  ?>
  </table>

    </div>
		</div>
	</div>
  </div>

  <div class="container">
    <div class="panel panel-default">
    <div class="panel-heading">
      <h3 class="panel-title">List Submissions</h3>
    </div>
    <table id= "myTable" class="table table-striped table-hover ">
			<tr>
				<th>Submission ID</th>
        <th>ProposedDate</th>
				<th>ActualDate</th>
				<th>WeightInKG</th>
        <th>PointsAwarded</th>
        <th>Status</th>
        <th>MaterialID</th>
        <th>Collector Name</th>
        <th>Recycler Name</th>
      </tr>
      <?php
      $materialID = '';
      if(isset($_GET['edit'])){
          $materialID = $_GET['edit'];
          	$query = "SELECT * FROM submission where materialName= '$materialID'";
            	$result = mysqli_query($connection, $query);
              if (mysqli_num_rows($result) > 0) {
          		while ($row = mysqli_fetch_assoc($result)){?>
        			<tr>
        				<td><?php echo $row['submissionID']; ?></td>
        				<td><?php echo $row['proposedDate']; ?></td>
        				<td><?php echo $row['actualDate']; ?></td>
        				<td><?php echo $row['weightInKg']; ?></td>
                <td><?php echo $row['pointsAwarded']; ?></td>
                <td><?php echo $row['status']; ?></td>
                <td><?php echo $row['materialName']; ?></td>
                <td><?php echo $row['cUserName']; ?></td>
                <td><?php echo $row['rUserName']; ?></td>
        			</tr>
        		<?php }
        		}
        	  ?>
          <?php }
          ?>
		</table>
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

	</body>
</html>
