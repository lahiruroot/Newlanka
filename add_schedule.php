<?php 
require_once('header.php');

function input($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
$validation2 = array ("Date"=>"", "Start_Time"=>"", "End_Time"=>"");
	
	$Date		= "";
	$Start_Time	= "";
	$End_Time	= "";

if (isset($_POST["submit"])) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
			$Date		= mysqli_real_escape_string($connection, input($_POST["date"]));
			$Start_Time	= mysqli_real_escape_string($connection, input($_POST["start_time"]));
			$End_Time	= mysqli_real_escape_string($connection, input($_POST["end_time"]));
			$doctor_id				= $_SESSION['id_number'];
			$did		= $_SESSION['user_id'];
		
		
			if (empty(trim($Date))) {
					$validation2['Date'] = "is-invalid";
				}
			
			if (empty(trim($Start_Time))) {
					$validation2['Start_Time'] = "is-invalid";
				}
				
			if (empty(trim($End_Time))) {
					$validation2['End_Time'] = "is-invalid";
				}
				
		
list($a, $b, $c) = array_values($validation2);
			
			if (empty($a) and empty($b) and empty($c)) {
				
				
				//getting the list of users
        $query = "SELECT * FROM doctor_db Doctor_Speciality WHERE Doctor_ID = '{$did}'";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
				$DS_ID	= $user['Doctor_Speciality'];
			}
			
					
				$query = "INSERT INTO doctor_add_schedule (Doctor_ID,Doctor_Speciality, Schedule_Date, Start_Time, End_Time, At_1Hour_Appointment_Quentity
) VALUES ('{$doctor_id}', '{$DS_ID}', '{$Date}', '{$Start_Time}', '{$End_Time}', '5')";
							$result_set = mysqli_query($connection, $query);
							
							if ($result_set) {
									echo "ok";
									
								} 
								
						}

					
					
	
	}
}

if (isset($_GET['var1'])) {
		if (isset($_GET['var2'])) {
		
			//grtting the user information
			$d_id = mysqli_real_escape_string($connection, $_GET['var1']);
			$s_id = mysqli_real_escape_string($connection, $_GET['var2']);
			$query = "DELETE FROM doctor_add_schedule WHERE Doctor_ID = '{$d_id}' AND Schedule_ID = '{$s_id}' LIMIT 1";
			$result_set = mysqli_query($connection, $query);
		}
	}


?>
<h2 style="padding-top:0;">Add Schedule</h2>
<div class="jumbotron bg-light border border-dark" style="margin:10px">

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  <div class="form-group row">
    <label for="datetimepicker1" class="col-sm-2 col-form-label"><h3>Date*</h3></label>
    <div class="col-sm-6">
      <input type="text" class="form-control <?php echo $validation2['Date']; ?>" name="date" id="datetimepicker1" placeholder="MM/DD/YYYY" value="<?php echo $Date; ?>">
      			  <?php if ($validation2['Date'] == "is-invalid") {echo '<p class="text-danger font-weight-bold">Required This Field</p>';} ?>       
    </div>
  </div>
  
  <div class="form-group row">
    <label for="datetimepicker2" class="col-sm-2 col-form-label"><h3>Start Time*</h3></label>
    <div class="col-sm-6">
      <input type="text" class="form-control time_element <?php echo $validation2['Start_Time']; ?>" name="start_time" id="datetimepicker2" placeholder="Start Time" value="<?php echo $Start_Time; ?>">
      <?php if ($validation2['Start_Time'] == "is-invalid") {echo '<p class="text-danger font-weight-bold">Required This Field</p>';} ?>
    </div>
  </div>
  
  <div class="form-group row">
    <label for="etime" class="col-sm-2 col-form-label"><h3>End Time*</h3></label>
    <div class="col-sm-6">
      <input type="text" class="form-control time_element <?php echo $validation2['End_Time']; ?>" name="end_time" id="etime" placeholder="End Time" value="<?php echo $End_Time; ?>">
      				<?php if ($validation2['End_Time'] == "is-invalid") {echo '<p class="text-danger font-weight-bold">Required This Field</p>';} ?>
    </div>
  </div>
  
  <div class="form-group row">
    <div class="col-sm-6 offset-sm-2">
      <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
    </div>
  </div>
</form>

</div>

<h2 style="padding-top:0;">List of Schedule</h2>

<div class="jumbotron bg-light border border-dark" style="margin:10px; margin-bottom:20px;">
	<table class="table table-bordered">
  <thead>
  
    <tr>
      <th>Date</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Delete</th>
    </tr>
    
  </thead>
  <tbody>
  
  	<?php
    
        //getting the list of users
        $query = "SELECT * FROM doctor_add_schedule WHERE Doctor_ID = '{$_SESSION['id_number']}'";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
				$S_ID	= $user['Schedule_ID'];
            
            ?>
  
    <tr>
      <td><h6><small><?php echo $user['Schedule_Date'] ?></small></h6></td>
      <td><h6><small><?php echo $user['Start_Time'] ?></small></h6></td>
      <td><h6><small><?php echo $user['End_Time'] ?></small></h6></td>
      <td><h6><small><button type="button" class="btn btn-danger btn-sm"><a href="add_schedule.php?var1=<?=$_SESSION['id_number'];?>&var2=<?=$S_ID?>">Delete</a></button></small></h6></td>
    </tr>
    
    <?php } ?>
    
  </tbody>
</table>

</div>

<?php require_once('footer.php'); ?>