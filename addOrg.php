<?php
  include ('connectDB.php');

  if(isset($_POST['addOrgBtn'])){
    $nameTxt = $_POST['orgName'];
    $capacityTxt = $_POST['orgCapacity'];
    $sectionTxt =$_POST['sectionSelect'];
    // echo $nameTxt;

    $addAppointmentQuery = "INSERT INTO `org_tbl`(`orgName`, `orgCapacity`, `sectionName`, `isActive`)
    VALUES ('$nameTxt','$capacityTxt','$sectionTxt',1)";
    $result = mysqli_query($conn, $addAppointmentQuery);
    if($result)
    {
      echo "Data inserted";
      }
    else {
      echo "Error";
    }
    header("Location: manageOrg.php");
    exit();
  }
?>
