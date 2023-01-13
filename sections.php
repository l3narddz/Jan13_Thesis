<?php
session_start();
if (!isset($_SESSION['Admin-name'])) {
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">

    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.js"></script>
    <link rel="stylesheet" type="text/css" href="css/Users.css">

    </script>
  </head>
  <body>
    <?php include'header.php'; ?>
    <!-- Appointment MOdal!-->
    <div class="modal fade" id="sectionModal" tabindex="-1" role="dialog" aria-labelledby="sectionModalLabel" aria-hidden="true">
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
    						<input type="text" class="form-control" id="names" name="name" placeholder="Enter name">
    					</div>
    					<div class="form-group">
    						<label for="section">Section:</label>
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
    						<input type="email" class="form-control" id="emails" name="email" placeholder="Enter email">
    					</div>
              <div class="form-group">
                <label for="appointmentDate">Date</label>
                <input type="date" class="form-control" id="appointmentDate" name="appointmentDate" placeholder="Enter date">
              </div>

              <div class="form-group">
                <label for="appointmentTimeStart">Time-Start</label>
                <input type="time" min="09:30" class="form-control" id="appointmentTimeStart" name="appointmentTimeStart" placeholder="Enter time">
              </div>
    					<div class="form-group">
                <label for="appointmentTimeEnd">Time-End</label>
                <input type="time" class="form-control" id="appointmentTimeEnd" name="appointmentTimeEnd" placeholder="Enter time">
              </div>

              <div class="form-group">
                <label for="appointmentNotes">Reason for Appointment</label>
                <textarea class="form-control" id="appointmentNotes" name="appointmentNotes" rows="3" placeholder="Enter any additional notes or details"></textarea>
              </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="sectionBtn" name="appointmentBtn" class="btn btn-primary">Save Appointment</button>
          </div>
        </div>
    	</form>
      </div>
    </div>
    <!-- Modal -->

  </body>
</html>
