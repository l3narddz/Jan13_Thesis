<?php
include('connectDB.php');
if(isset($_POST['delete']))
{
  $orgID = $_POST['orgID'];
  $query = "DELETE FROM org_tbl WHERE orgID = $orgID";
  $query_run = mysqli_query($conn, $query);

  if($query_run){
    echo '<script> alert ("Appointment Cancelled"); </script>';
    header("location:manageOrg.php");
  } else {
    echo '<script> alert ("Appointment not Cancelled"); </script>';
  }
}
 ?>
