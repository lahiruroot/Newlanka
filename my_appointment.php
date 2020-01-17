<?php 
require_once('header.php');

if (isset($_POST["submit"])) {
		if (isset($_GET['pun'])) {
				$U_na = mysqli_real_escape_string($connection, $_GET['pun']);
				$Ap_id = mysqli_real_escape_string($connection, $_GET['appid']);
			$query = "DELETE FROM appointment_list WHERE Patient_Email = '{$U_na}' AND Appointment_ID = '{$Ap_id}' LIMIT 1;";
			$result_set = mysqli_query($connection, $query);
			}
	}

?>

<h1 class="font-weight-bold">Doctor List</h1>
       <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th><h5><small>First Name</small></h5></th>
                      <th><h5><small>Email</small></h5></th>
                      <th><h5><small>Address</small></h5></th>
                      <th><h5><small>City</small></h5></th>
                      <th><h5><small>DOB</small></h5></th>
                      <th><h5><small>Telephone Number</small></h5></th>
                      <th><h5><small>Appointment Date</small></h5></th>
                      <th><h5><small>Appointment Start Time</small></h5></th>
                      <th><h5><small>Appointment End Time</small></h5></th>
                      <th><h5><small>Cancel Appointment</small></h5></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php
    
        //getting the list of users
        $query = "SELECT * FROM appointment_list WHERE Patient_Email='{$_SESSION['email']}' ORDER BY Patient_Name";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
            
        <tr>
            <td><h6><small><?php echo $user['Patient_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Patient_Email'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Patient_Address'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Patient_City'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Patient_DOB'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Patient_Telephone_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Appointment_Date'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Appointment_Start_Time'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Appointment_End_Time'] ?></small></h6></td>
            <td><form action="my_appointment.php?pun=<?= $user['Patient_Email'] ?>&appid=<?= $user['Appointment_ID'] ?>" method="post"><button type="submit" name="submit" class="btn btn-danger">Cancel</button></form></td>
        </tr>
        
        <?php } ?>
                    
                  </tbody>
                </table>

<?php require_once('footer.php'); ?>