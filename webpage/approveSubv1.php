<?php
session_start();
include '../php/dbConnection.php';
$profilePic=$_SESSION['profilePic'];
?>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AllocateHousing</title>

	<link rel="icon" href="img/headhouse.jpg">
    <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="css/style.css" rel="stylesheet" id="bootstrap-css">
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
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
	<style>

	body{
	background-image: url("img/submitbg.jpg");;
	background-repeat:none;
	background-position:center;
	}
  .mytable {
		border-collapse: collapse;
		margin: ;
		font-size: 0.9em;
		min-width: 400px;
		border-radius: 5px 5px 0 0;
		overflow: hidden;
		box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
	}
	.mytable thead tr {
		background-color: #009879;
		color: #ffffff;
		text-align: left;
		font-weight: bold;
	}
	.mytable th,
	.mytable td {
		padding: 12px 15px;
	}
	.mytable tbody tr {
		border-bottom: 1px solid #dddddd;
	}

	.mytable tbody tr:nth-of-type(even) {
		background-color: #f3f3f3;
	}

	.mytable tbody tr:last-of-type {
		border-bottom: 2px solid #009879;
	}

	.mytable tbody tr.active-row {
		font-weight: bold;
		color: #009879;
	}
	</style>
  </head>

  <body>
   <header>
     <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav mr-auto">
                 <li class="nav-item active">
                     <a class="nav-link" href="#">MicroHousing Systems | HousingOfficer</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="addResidence.php">SetUpNewResidence</a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="housingAlocate.php">SubmitList</a>
                 </li>
             </ul>
             <ul class="navbar-nav mr-right">
                 <li class="nav-item dropdown">
                     <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <?php
                     if ($profilePic != "") {
                       echo "<img src='../uploads/". $profilePic . "'
                       width=35px alt='profile-img' style='border-radius: 50%;'/>";
                     }
                     else {
                       echo "<img src='img/person-flat.png'
                       width=35px alt='profile-img' style='border-radius: 50%;'/>";
                     }

                     ?>⠀⠀<?php echo "Welcome, " . $_SESSION['email']."!";?>
                     </a>
                     <div class="dropdown-menu p-3">
                         <form class="form-horizontal" method="post" accept-charset="UTF-8">
                             <a href="editProfileOfficer.php"><img src="img/icon1.png" alt="" width="30px">⠀Account</a> <br>
                             <a href="index.php"><img src="img/icon2.png" alt="" width="30px">⠀Logout</a>
                         </form>
                     </div>
                 </li>
             </ul>

         </div>
    </nav>
		</header>
		<main style="margin:2cm;">
	<!-- Input from user to search for residence -->
    <input type="text" class = "form-control" id="myInput" onkeyup="myFunction(1)" placeholder="Search for title..">
    <br />

	 <div class="panel-heading" style = "background-color:#ffffff; text-align: center; font-size: 20px;">
          Home Residence
        </div>
        <div class="panel-body" style = "background-color:#ffffff; padding: 0;">
          <!-- The table which contains a list of session -->
          <div id="myTable" class = "table-responsive">
            <table class = "mytable table table-hover">
              <thead>
                <tr>
                  <th>Submission ID</th>
                  <th>Material ID</th>
                  <th>Proposed Date</th>
                  <th>Date To:</th>
                  <th>Document</th>
                  <th>IC Photo</th>
                  <th>Status</th>
				          <th>Applicant</th>
                  <th>Option</th>
                </tr>

              </thead>
              <tbody>

                <?php
                    $query = "SELECT * FROM submission WHERE collectorName = '$_SESSION['username']'";
                    $result = mysqli_query($connection, $query);
                    if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr data-href='#'>";
                  echo "<td>" . $row['submissionID'] . "</td>";
                  echo "<td>" . $row['propertyId'] . "</td>";
                  echo "<td>" . $row['datefrom'] . "</td>";
                  echo "<td>" . $row['dateto'] . "</td>";
                  echo "<td>" . $row['document'] . "</td>";
                  echo "<td>" . $row['icp'] . "</td>";
                  echo "<td>" . $row['status'] . "</td>";
                  echo "<td>" . $row['applicant'] . "</td>";
                    if($row['status'] =="WAITING"){
                        echo'<td><button class="addbtn" style="" data-toggle="modal" data-target="#myModalset">Set Status</button></td>';
                      }
                  echo "</tr>";
                  }
                }
                ?>
			</tbody>
            </table>
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div id="myModalset" class="modal fade" role="dialog">
          <div class="modal-dialog">
              <!-- konten modal-->
              <div class="modal-content">
                  <!-- heading modal -->
                  <div class="modal-header">
                      <h4 class="modal-title">Aprove or Reject</h4>
                  </div>
                  <!-- body modal -->
                  <div class="modal-body">
                      <form action="../php/findbookingid.php" method="post">
        <div class="frommodal">
      	<div class="row">

            <div class="col-25">
              <label for="bookingId">BookingID:</label>
            </div>
            <div class="col-75">
      		<input type="text" name="searchbookid" placeholder="Insert bookingID">
            </div>
          </div>

            <div class="row">
              <div class="col-25">
                <label for="bookingstatus">Status:</label>
              </div>
              <div class="col-75">
                <select id="status" name="bookingstatus">
                  <option value="APPROVED">Approved</option>
                  <option value="REJECTED">Rejected</option>
                </select>
              </div>
            </div>

                  </div>
                  <!-- footer modal -->
                  <div class="modal-footer">
      				            <input type="submit" value="submit">
      				        </form>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close Window</button>
                  </div>
              </div>
          </div>
      </div>
	  <!-- Function for approve and reject-->

	  </main>
	  </body>
	  </html>
