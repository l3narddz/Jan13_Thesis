<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Manage Organization</title>
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <script src="https://kit.fontawesome.com/1658d4fd0c.js" crossorigin="anonymous"></script>
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/managesection.css">
    <link rel="stylesheet" type="text/css" href="css/Users.css">
      <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
  	<script src="https://code.jquery.com/jquery-3.3.1.js"
  	        integrity="sha1256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="
  	        crossorigin="anonymous">
  	</script>
      <script type="text/javascript" src="js/bootbox.min.js"></script>
  	<script type="text/javascript" src="js/bootstrap.js"></script>

</head>
<body >
  <?php include'header.php'; ?>
  <main>
    <h1>Manage Section</h1>
  	<div class="form-style-5 slideInDown animated">
  		<form action ="addSection.php" method="POST" name="addSectionFrm" id="addSectionFrm">
  			<div class="alert_user"></div>
  			<fieldset>
  				<legend><span class="number">1</span> Section Info</legend>
  				<input type="hidden" name="sectionID" id="sectionID">
  				<input type="text" name="sectionName" id="sectionName" placeholder="Section Name..." required>
  				<input type="text" name="sectionCapacity" id="sectionCapacity" placeholder="Section capacity..." required>
  			</fieldset>
  			<fieldset>
          <label for="active"><b>Status</b></label>
  				<input type="radio" name="orgActive" class="active" value="orgActive">Active
  	       <input type="radio" name="orgNotActive" class="active" value="orgNotActive" checked="checked">Not Active

  			</fieldset>
  			<button type="submit" id ="sectionBtn" name="sectionBtn" class="btn btn-primary">Add Section</button>
  		</form>
  	</div>

  	<!--User table
  	<div class="section">
  		<div class="slideInRight animated">
  			<div id="manage_users"></div>
  		</div>
  	</div>
    -->


    <div class="section">
        <!--User table-->
        <div class="table-responsive-sm slideInRight animated" style="max-height: 37.5rem">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>Name</th>
                <th>Capacity</th>
                <th>Action</th>


              </tr>
            </thead>
            <tbody class="table-secondary">
              <br>
           <?php
                //Connect to database
                require'connectDB.php';

                  $sql = "SELECT * FROM section_tbl ORDER BY sectionID DESC";
                  $result = mysqli_query($conn, $sql);
                  while($row = mysqli_fetch_assoc($result))
                  {
                ?>
                            <TR>
                            <TD><?php echo $row['sectionName'];?></TD>
                            <TD><?php echo $row['numberOfstudents'];?></TD>
                            <td>
                              <form class="form-left" action="update.php" method="post">
                              <input type="hidden" name="appointmentID" value="<?php echo $row['appointmentID'] ?>"
                              <th> <input type ="submit" name="edit" class = "btn btn-success btn-sm "value ="Edit" /></th>
                            </form>

                              <form class="form-right" action="deleteSection.php" method="post" onsubmit="return confirmDelete()">
                                <input type="hidden" name="sectionID" value="<?php echo $row['sectionID'] ?>"
                                <th>
                                  <input type ="submit" name="delete" class="btn btn-danger btn-sm" value="Delete" />
                                </th>
                              </form>
                            </td>
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
  </main>
  <script type="text/javascript">
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
