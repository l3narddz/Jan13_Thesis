
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>DoorLock System</title>
      <link rel="stylesheet" type="text/css" href="css/Users.css">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://kit.fontawesome.com/1658d4fd0c.js" crossorigin="anonymous"></script>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1658d4fd0c.js" crossorigin="anonymous"></script>

  <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>
<style media="screen">
.form-left, .form-right {
  display: inline-block;
  vertical-align: top; /* this is optional, it will align the top of the forms */
}
.table-primary {
  position: sticky;
  top: 0; /* The top property sets the top position of the element */
  background-color: #000; /* This is optional, you can use any background color you want */
}
</style>
</head>
<body id="page-top">
  <?php include'header.php'; ?>
  <div class="container-fluid">
    <h1 class="slideInDown animated">List of Appointments</h1>
      <!--User table-->
      <div class="table-responsive slideInRight animated" style="max-height: 37.5rem">
        <table class="table">
          <thead class="table-primary">
            <tr>

              <th>Name</th>
              <th>Email</th>
              <th>Date</th>
              <th>Time-Start</th>
              <th>Time-End</th>
              <th>Action</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody class="table-secondary">
            <br>
         <?php
              //Connect to database
              require'connectDB.php';

                $sql = "SELECT * FROM appointment_tbl WHERE isActive=1 ORDER BY appointmentID DESC";
                $result = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($result))
                {
              ?>
                          <TR>

                          <TD><?php echo $row['name'];?></TD>
                          <TD><?php echo $row['email'];?></TD>
                          <TD><?php echo $row['date'];?></TD>
                          <TD><?php echo date("g:ia", strtotime($row['timeStart']));?></TD>
                          <TD><?php echo date("g:ia", strtotime($row['timeEnd']));?></TD>
                          <td>

                            <form class="form-left" action="update.php" method="post">
                            <input type="hidden" name="appointmentID" value="<?php echo $row['appointmentID'] ?>"
                            <th> <input type ="submit" name="edit" class = "btn btn-success btn-sm "value ="Edit" /></th>
                          </form>

                            <form class="form-right" action="delete.php" method="post" onsubmit="return confirmDelete()">
                              <input type="hidden" name="appointmentID" value="<?php echo $row['appointmentID'] ?>"
                              <th>
                                <input type ="submit" name="delete" class="btn btn-danger btn-sm" value="Cancel" />
                              </th>
                            </form>
                          </td>

                          <td><span class="pending">Pending</span></td>
                        </TR>

                          <!--<input type ="submit" name="edit" class="btn btn-success" value="Edit" /> -->
                          <!--<button id = "updateAppointmentBtn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#updateAppointmentModal">Edit</button>-->

            <?php
                    }
            ?>
          </tbody>
        </table>
      </div>
  </div>
  <div class="container-fluid">
    <button id = "appoitnmentBtn" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#appointmentModal">New Appointment</button>
  </div>
  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                  </button>
              </div>
              <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                  <a class="btn btn-primary" href="login.php">Logout</a>
              </div>
          </div>
      </div>
  </div>



  <!-- Appointment MOdal!-->
  <div class="modal fade" id="appointmentModal" tabindex="-1" role="dialog" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
  		<form action="addAppointment.php" method="POST" name="addAppointmentFrm" id="addAppointmentFrm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalLabel">Make an Appointment</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
  					<div class="form-group">
  						<label for="name">Name:</label>
  						<input type="text" class="form-control" id="names" name="name" placeholder="Enter name" required>
  					</div>
            <label for="section">Section:</label>
  					<div class="form-group">

  						<!-- <input type="text" class="form-control" id="section" name="section" placeholder="Enter section"> -->
  						<select id="section" name="section[]" required multiple>
  						<?php
  							   include 'connectDB.php';

  								 $querySection = "SELECT * FROM section_tbl";
  								 $result = mysqli_query($conn, $querySection);
  								 while($row = mysqli_fetch_assoc($result))
  								 {
  							?>
  							<option value="<?php echo $row['sectionID']?>"><?php echo $row['sectionName']?></option>
  							<?php
  						     }
  							?>
  						</select>
  					</div>

  					<div class="form-group">
  						<label for="email">Email:</label>
  						<input type="email" class="form-control" id="emails" name="email" placeholder="Enter email" required>
  					</div>
            <div class="form-group">
              <label for="appointmentDate">Date</label>
              <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" placeholder="Enter date" required>
            </div>

            <div class="form-group">
              <label for="appointmentTimeStart">Time-Start</label>
              <input type="time" min="09:30" max="22:59" class="form-control" id="appointmentTimeStart" name="appointmentTimeStart" placeholder="Enter time" required>
            </div>
  					<div class="form-group">
              <label for="appointmentTimeEnd">Time-End</label>
              <input type="time" class="form-control" id="appointmentTimeEnd" name="appointmentTimeEnd" placeholder="Enter time" required>
            </div>

            <div class="form-group">
              <label for="appointmentNotes">Reason for Appointment</label>
              <textarea class="form-control" id="appointmentNotes" name="appointmentNotes" rows="3" placeholder="Enter any additional notes or details" required></textarea>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="appointmentBtn" name="appointmentBtn" class="btn btn-primary">Save Appointment</button>
        </div>
      </div>
  	</form>
    </div>
  </div>
  <!-- Modal -->
  <script>
  $(document).ready(function () {
    $("#section").CreateMultiCheckBox({ width: '230px',
               defaultText : 'Select Below', height:'250px' });
  });
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0');
  var yyyy = today.getFullYear();
  today = yyyy + '-' + mm + '-' + dd;
  $('#appointmentDate').attr('min',today);


  function confirmDelete() {
      if (confirm("Are you sure you want to delete this item?")) {
          return true;
      } else {
          return false;
      }
  }
  </script>

</body>
</html>
