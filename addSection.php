<?php
  include ('connectDB.php');

  if(isset($_POST['sectionBtn'])){
    $nameTxt = $_POST['sectionName'];
    $numOfStudentTxt = $_POST['sectionCapacity'];
    $appointtedSections = array('');

    // echo $nameTxt;

    $addSectionQuery = "INSERT INTO `section_tbl`(`sectionName`, `numberOfstudents`) VALUES
     ('$nameTxt','$numOfStudentTxt')";
    $result = mysqli_query($conn, $addSectionQuery);
    if($result)
    {
      echo "Data inserted";
    }else {
      echo "Error";
    }

    // echo $emailTxt;
    // echo $appointmentDateTxt;
    // echo $appointmentTimeTxt;
    // echo $appointmentNotesTxt;

    header("Location: manageSections.php");
    exit();
  }
?>
