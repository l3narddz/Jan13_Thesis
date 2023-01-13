<?php include'header.php'; ?>
<?php
$conn = mysqli_connect("localhost","root","");
$db = mysqli_select_db($conn, 'rfidattendance');

$appointmentID = $_POST['appointmentID'];

$query = "SELECT * FROM appointment_tbl WHERE appointmentID = $appointmentID";
$mysqli_result = mysqli_query($conn, $query);

if($mysqli_result)
{
  while($row = mysqli_fetch_array($mysqli_result)) {
    ?>
<div class="container">
  <div class ="jumbotron">
    <h2>Update Appointment</h2>
    <hr>
    <form action ="" method="post">
      <input type="hidden" name="appointmentID" value="<?php echo $row['appointmentID'] ?>">
      <div class="form-group">
        <label for=""> Name</label>
        <input type="text" name="name" class="form-control" value="<?php echo $row['name'] ?>" placeholder= "Enter Student Name" required />
      </div>
      <div class="form-group">
        <label for=""> Email</label>
        <input type="text" name="email" class="form-control" value="<?php echo $row['email'] ?>" placeholder= "Enter Student Email" required />
      </div>

      <div class="form-group">
        <label for="appointmentDate">Date</label>
        <input type="date" class="form-control" name="appointmentDate" id="appointmentDate" value="<?php echo $row['date'] ?>"placeholder="Enter date" required>
      </div>

      <div class="form-group">
        <label for="appointmentTimeStart">Time-Start</label>
        <input type="time" min="09:30" class="form-control" name="appointmentTimeStart" value="<?php echo $row['timeStart'] ?>"placeholder="Enter time" required>
      </div>

      <div class="form-group">
        <label for="appointmentTimeEnd">Time-End</label>
        <input type="time" class="form-control"  name="appointmentTimeEnd" value="<?php echo $row['timeEnd'] ?>" placeholder="Enter time" required>
      </div>

      <div class="form-group">
        <label for="appointmentNotes">Reason for Appointment</label>
        <textarea class="form-control"  name="appointmentNotes" rows="3" value="<?php echo $row['reason'] ?>"placeholder="Enter any additional notes or details" required></textarea>
      </div>

      <button type="submit" name="update" class="btn btn-primary"> Update Appointment</button>
      <a href="index.php" class="btn btn-danger"> Cancel </a>
    </form>

    <?php
    if(isset($_POST['update']))
    {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $appointmentDateTxt = date('Y-m-d', strtotime($_POST['appointmentDate']));
      $appointmentTimeStartTxt =$_POST['appointmentTimeStart'];
      $appointmentTimeEndTxt =$_POST['appointmentTimeEnd'];
      $appointmentNotesTxt = $_POST['appointmentNotes'];
      $appointtedSections = array('');

      $query = "UPDATE appointment_tbl SET name='$name', email='$email',  date ='$appointmentDateTxt', timeStart ='$appointmentTimeStartTxt', timeEnd='$appointmentTimeEndTxt', reason = '$appointmentNotesTxt' WHERE appointmentID='$appointmentID'";
      $query_run = mysqli_query($conn, $query);

      if($mysqli_result)
      {
      echo '<script> alert ("Appointment Updated");</script>';
      echo "<script> window.location.href ='index.php';</script>";
      }
      else {
        echo '<script> alert ("Appointment not updated");</script>';
      }
    }
     ?>
  </div>
    <?php
  }
}
 else {
  echo '<script> alert ("No reocrd found");</script>';
}
 ?>
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
 </script>
