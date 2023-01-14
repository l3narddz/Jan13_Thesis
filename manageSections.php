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
  				<input type="radio" name="isActive"  value="1" checked="checked">Active
  	       <input type="radio" name="isActive"  value="0" >Not Active

  			</fieldset>
  			<button type="submit" id ="sectionBtn" name="sectionBtn" class="btn btn-primary">Add Section</button>
  		</form>
  	</div>

    <div class="section">
        <!--User table-->
        <div class="table-responsive-sm slideInRight animated" style="max-height: 37.5rem">
          <table class="table">
            <thead class="table-primary">
              <tr>
                <th>Name</th>
                <th>Capacity</th>
                <th>Status</th>
                <th>Students</th>
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
                            <TD>  <?php
                            if ($row['isActive'] == 1) {
                              echo "ACTIVE";
                            } else {
                              echo "INACTIVE";
                            }
                            ?></TD>
                            <TD><?php echo $row['isActive'];?></TD>
                            <td>
                            <button class="btn btn-secondary btn-sm edit-btn" data-section-id="<?php echo $row['sectionID']; ?>">Edit</button>
                            <form class="form-right" action="deleteSection.php" method="post">
                              <input type="hidden" name="sectionID" value="<?php echo $row['sectionID'] ?>"
                              <button class="btn btn-danger btn-sm delete-btn" type="submit" name="delete" onclick="return confirmDelete()">Delete</button>
                            </form>
                          </td>
                          </TR>
              <?php
                      }
              ?>
            </tbody>
          </table>
        </div>
    </div>
    <!-- Modal -->
<div class="modal fade" id="addSectionModal" tabindex="-1" role="dialog" aria-labelledby="addSectionModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addSectionModalLabel">Edit Section</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action ="updateSection.php" method="POST" name="addSectionFrm" id="addSectionFrm">
          <div class="alert_user"></div>
          <fieldset>
            <legend><span class="number">1</span> Section Info</legend>
            <input type="hidden" name="sectionID" id="sectionID">
            <input type="text" name="sectionName" id="sectionName" placeholder="Section Name..." required>
            <input type="text" name="sectionCapacity" id="sectionCapacity" placeholder="Section capacity..." required>
          </fieldset>
          <fieldset>
            <label for="active"><b>Status</b></label>
            <input type="radio" name="isActive"  value="1" checked="checked">Active
            <input type="radio" name="isActive"  value="0" >Not Active
          </fieldset>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id ="sectionBtn" name="sectionBtn" class="btn btn-primary">Update Section</button>
      </div>
    </div>
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

  <script type="text/javascript">
  $(document).ready(function() {
    // Attach click event listener to edit buttons
    $('.edit-btn').on('click', function() {
      var sectionId = $(this).data('section-id');
      $('#sectionID').val(sectionId);
      $('#addSectionFrm').attr('action', 'updateSection.php');
      $('#sectionBtn').text('Update Section');
      $('#addSectionModal').modal('show');
    });

    // Attach click event listener to delete buttons
    $('.delete-btn').on('click', function() {
      if (confirm('Are you sure you want to delete this section?')) {
        //submit the delete form
        $(this).closest('form').submit();
      }
    });

    // Populate form fields when modal is shown
    $('#addSectionModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget);
      var sectionId = button.data('section-id');
      // Use an Ajax request to retrieve the section details from the server
      $.ajax({
        url: 'getSection.php',
        type: 'POST',
        data: {
          sectionID: sectionId
        },
        success: function(data) {
          var section = JSON.parse(data);
          $('#sectionName').val(section.sectionName);
          $('#sectionCapacity').val(section.sectionCapacity);
          $("input[name=isActive][value=" + section.isActive + "]").attr('checked', 'checked');
        }
      });
    });
  });
</script>
</body>
</html>
