<?php
include('connectDB.php');
if(isset($_POST['delete']))
{
  $sectionID = $_POST['sectionID'];
  $query = "DELETE FROM section_tbl WHERE sectionID = $sectionID";
  $query_run = mysqli_query($conn, $query);

  if($query_run){
    echo '<script> alert ("Appointment Cancelled"); </script>';
    header("location:manageSections.php");
  } else {
    echo '<script> alert ("Appointment not Cancelled"); </script>';
  }
}
 ?>
