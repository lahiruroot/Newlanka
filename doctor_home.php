<?php 
require_once('header.php');

if (isset($_POST["submit"])) {
			if (isset($_GET['un'])) {
				
				$U_name = mysqli_real_escape_string($connection, $_GET['un']);
					$sql="UPDATE appointment_list SET State = 'complete' WHERE Appointment_ID = '{$U_name}';";
					mysqli_query($connection, $sql);
			}
	}

?>

<h2 style="padding-top:0;">List of Schedule</h2>
<div class="jumbotron bg-light border border-dark" style="margin:5px;">

	<table class="table table-hover table-striped">
      <thead class="thead-dark">
        
        <tr>
          <th>Paction Name</th>
          <th>DOB</th>
          <th>Date</th>
          <th>Start Time</th>
          <th>End Time</th>
          <th>Status</th>
          <th>Complete</th>
        </tr>
        
      </thead>
      <tbody>
      
      	<?php
    
        //getting the list of users
        $query = "SELECT * FROM appointment_list WHERE Doctor_ID_Number";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
      
        <tr>
          <td><?php echo $user['Patient_Name']; ?></td>
          <td><?php echo $user['Patient_DOB']; ?></td>
          <td><?php echo $user['Appointment_Date']; ?></td>
          <td><?php echo $user['Appointment_Start_Time']; ?></td>
          <td><?php echo $user['Appointment_End_Time']; ?></td>
          <td><?php echo $user['State']; ?></td>
          <td><form action="doctor_home.php?un=<?= $user['Appointment_ID'] ?>" method="post"><button type="submit" name="submit" class="btn <?php if ($user['State'] == "pending") {echo "btn-danger";} else {echo "btn-success disabled";} ?>" <?php if ($user['State'] != "pending") { echo "style=\"cursor:not-allowed\" ";} ?> ><i class="fa fa-check-square"></i></button></form></td>
        </tr>
        
        <?php } ?>
            
      </tbody>
    </table>

</div>


<?php require_once('footer.php'); ?>