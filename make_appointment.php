<?php 
require_once('header.php');

function input($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
$validation2 = array ("Doctor_Speciality"=>"");
	
	$Date		= "";

$Doctor_Speciality	= "";
$Ap_list = '';
$AQ = '';

if (isset($_POST["submit"])) {
	if ($_SERVER['REQUEST_METHOD'] == "POST") {
		
			$Doctor_Speciality		= mysqli_real_escape_string($connection, input($_POST["ss"]));
			$user_id				= $_SESSION['user_id'];
		
		
			if ($Doctor_Speciality == "Select Speciality") {
						
							$validation2['Doctor_Speciality'] = "is-invalid";
						
						}
			
				
		
list($a) = array_values($validation2);
			
			if (empty($a)) {
			
					
				//getting the list of users
        $query = "SELECT * FROM doctor_add_schedule WHERE Doctor_Speciality = '{$Doctor_Speciality}'";
        $result_set = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($result_set)) {
						$S_ID	= $user['Schedule_ID'];
						$DS		= $user['Doctor_Speciality'];
						$D_ID	= $user['Doctor_ID'];
						$D		= $user['Schedule_Date'];
						$ST		= $user['Start_Time'];
						$ET		= $user['End_Time'];
							/*if ($result_set) {
									echo "ok";
									
								} */
							
							
					if ($AQ == 5) {
								$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '4' WHERE Schedule_ID = '{$D_ID}';";
								mysqli_query($connection, $sql);
							} elseif ($AQ == 4) {
									$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '3' WHERE Schedule_ID = '{$D_ID}';";
									mysqli_query($connection, $sql);
								} elseif ($AQ == 3) {
									$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '2' WHERE Schedule_ID = '{$D_ID}';";
									mysqli_query($connection, $sql);
								} elseif ($AQ == 2) {
									$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '1' WHERE Schedule_ID = '{$D_ID}';";
									mysqli_query($connection, $sql);
								} elseif ($AQ == 1) {
									$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '0' WHERE Schedule_ID = '{$D_ID}';";
									mysqli_query($connection, $sql);
								}		
								
						
						
		$query2 = "SELECT * FROM doctor_db WHERE Doctor_ID = '{$D_ID}'";
        $result_set2 = mysqli_query($connection, $query2);
        
            $user2 = mysqli_fetch_assoc($result_set2);
						$DN		= $user2['First_Name'];
						$DC		= $user2['doctor_channeling_costs'];
            $D		= $user['Schedule_Date'];
						$ST		= $user['Start_Time'];
						$ET		= $user['End_Time'];	
							/*if ($result_set) {
									echo "ok";
									
								} */
								
								$Ap_list .= "<tr>";
											
										$Ap_list .= "<td><h6><small>{$DS}</small></h6></td>";
										$Ap_list .= "<td><h6><small>{$DN}</small></h6></td>";
										$Ap_list .= "<td><h6><small>{$DC}</small></h6></td>";
										$Ap_list .= "<td><h6><small>{$D}</small></h6></td>";
										$Ap_list .= "<td><h6><small>{$ST}</small></h6></td>";
										$Ap_list .= "<td><h6><small>{$ET}</small></h6></td>";
										$Ap_list .= "<td><a href=\"../pactionpay_bill.php?var1={$_SESSION['id_number']}&Book_Now={$S_ID}\" class=\"text-primary\">Book Now</a></td>";
								$Ap_list .= "</tr>";
								
						
					}

			}
					
	
	}
}

?>

<h2 style="padding-top:0;">Make Appointment</h2>
    <div class="jumbotron bg-light border border-dark" style="margin:10px">
        
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
          
          <div class="form-group row">
                <label for="ds" class="col-sm-2 col-form-label">Doctor's Speciality :</label>
                <div class="col-sm-6">
                  <select class="custom-select <?php echo $validation2['Doctor_Speciality']; ?>" id="ds" name="ss">
                      <option selected>Select Speciality</option>
                      <option <?php if ($Doctor_Speciality == "CARDIAC ELECTROPHYSIOLOGIST") {echo "selected";} ?> value="CARDIAC ELECTROPHYSIOLOGIST">CARDIAC ELECTROPHYSIOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "CARDIAOTHORACIC SURGEON") {echo "selected";} ?> value="CARDIAOTHORACIC SURGEON">CARDIAOTHORACIC SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "CARDIOLOGIST") {echo "selected";} ?> value="CARDIOLOGIST">CARDIOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "CARDIOLOGIST AND CARDIAC ELECTROPHYSIOLOGIST") {echo "selected";} ?> value="CARDIOLOGIST AND CARDIAC ELECTROPHYSIOLOGIST">CARDIOLOGIST AND CARDIAC ELECTROPHYSIOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "CHEST SPECIALIST") {echo "selected";} ?> value="CHEST SPECIALIST">CHEST SPECIALIST</option>
                      <option <?php if ($Doctor_Speciality == "DENTAL SURGEON") {echo "selected";} ?> value="DENTAL SURGEON">DENTAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "DENTAL SURGEON / RESTORATIVE DENTISTRY") {echo "selected";} ?> value="DENTAL SURGEON / RESTORATIVE DENTISTRY">DENTAL SURGEON / RESTORATIVE DENTISTRY</option>
                      <option <?php if ($Doctor_Speciality == "DERMATOLOGIST") {echo "selected";} ?> value="DERMATOLOGIST">DERMATOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "ENDOCRINOLOGIST/DIABETOLOGIST") {echo "selected";} ?> value="ENDOCRINOLOGIST/DIABETOLOGIST">ENDOCRINOLOGIST/DIABETOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "ENT SURGEON") {echo "selected";} ?> value="ENT SURGEON">ENT SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "EYE SURGEON") {echo "selected";} ?> value="EYE SURGEON">EYE SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "GASTROENTEROLOGICAL SURGEON") {echo "selected";} ?> value="GASTROENTEROLOGICAL SURGEON">GASTROENTEROLOGICAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "GASTROENTEROLOGIST") {echo "selected";} ?> value="GASTROENTEROLOGIST">GASTROENTEROLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "GASTROENTEROLOGIST AND HEPATOLOGIST") {echo "selected";} ?> value="GASTROENTEROLOGIST AND HEPATOLOGIST">GASTROENTEROLOGIST AND HEPATOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "GASTROENTEROLOGIST SURGEON") {echo "selected";} ?> value="GASTROENTEROLOGIST SURGEON">GASTROENTEROLOGIST SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "GASTROINTESTINAL SURGEON") {echo "selected";} ?> value="GASTROINTESTINAL SURGEON">GASTROINTESTINAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "GENERAL PHYSICIAN") {echo "selected";} ?> value="GENERAL PHYSICIAN">GENERAL PHYSICIAN</option>
                      <option <?php if ($Doctor_Speciality == "GENITO URINARY SURGEON") {echo "selected";} ?> value="GENITO URINARY SURGEON">GENITO URINARY SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "GYNAECOLOGIST") {echo "selected";} ?> value="GYNAECOLOGIST">GYNAECOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "OBSTETRICIAN AND GYNAECOLOGIST") {echo "selected";} ?> value="OBSTETRICIAN AND GYNAECOLOGIST">OBSTETRICIAN AND GYNAECOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "GYNAECOLOGIST AND SPECIALIST IN SUB-FERTILITY") {echo "selected";} ?> value="GYNAECOLOGIST AND SPECIALIST IN SUB-FERTILITY">GYNAECOLOGIST AND SPECIALIST IN SUB-FERTILITY</option>
                      <option <?php if ($Doctor_Speciality == "HAEMATOLOGIST") {echo "selected";} ?> value="HAEMATOLOGIST">HAEMATOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "LIVER CENTRE") {echo "selected";} ?> value="LIVER CENTRE">LIVER CENTRE</option>
                      <option <?php if ($Doctor_Speciality == "MEDICAL GASTROENTEROLOGIST") {echo "selected";} ?> value="MEDICAL GASTROENTEROLOGIST">MEDICAL GASTROENTEROLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "MEDICAL MICROBIOLOGIST") {echo "selected";} ?> value="MEDICAL MICROBIOLOGIST">MEDICAL MICROBIOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "MEMORY CLINIC") {echo "selected";} ?> value="MEMORY CLINIC">MEMORY CLINIC</option>
                      <option <?php if ($Doctor_Speciality == "NEPHROLOGIST") {echo "selected";} ?> value="NEPHROLOGIST">NEPHROLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "NEURO PHYSICIAN") {echo "selected";} ?> value="NEURO PHYSICIAN">NEURO PHYSICIAN</option>
                      <option <?php if ($Doctor_Speciality == "NEURO SURGEON") {echo "selected";} ?> value="NEURO SURGEON">NEURO SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "NUTRITIONIST") {echo "selected";} ?> value="NUTRITIONIST">NUTRITIONIST</option>
                      <option <?php if ($Doctor_Speciality == "OCCUPATIONAL THERAPIST") {echo "selected";} ?> value="OCCUPATIONAL THERAPIST">OCCUPATIONAL THERAPIST</option>
                      <option <?php if ($Doctor_Speciality == "ONCO SURGEON") {echo "selected";} ?> value="ONCO SURGEON">ONCO SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "ONCOLOGICAL SURGEON") {echo "selected";} ?> value="ONCOLOGICAL SURGEON">ONCOLOGICAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "ONCOLOGIST - CANCER SPECIALIST") {echo "selected";} ?> value="ONCOLOGIST - CANCER SPECIALIST">ONCOLOGIST - CANCER SPECIALIST</option>
                      <option <?php if ($Doctor_Speciality == "MAXILLOFACIAL SURGEON") {echo "selected";} ?> value="MAXILLOFACIAL SURGEON">MAXILLOFACIAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "ORTHODONTIST") {echo "selected";} ?> value="ORTHODONTIST">ORTHODONTIST</option>
                      <option <?php if ($Doctor_Speciality == "ORTHOPAEDIC SURGEON") {echo "selected";} ?> value="ORTHOPAEDIC SURGEON">ORTHOPAEDIC SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "PAEDIATRIC CARDIOLOGIST") {echo "selected";} ?> value="PAEDIATRIC CARDIOLOGIST">PAEDIATRIC CARDIOLOGIST</option>
                  </select>
                      <div class="invalid-feedback">
                        <h6>Required This Field!</h6>
                      </div>
                </div>
              </div>
          
          <div class="form-group row">
    <div class="col-sm-6 offset-sm-2">
      <button type="submit" class="btn btn-secondary" name="submit">Submit</button>
    </div>
  </div>
        </form>
        
        <table class="table table-bordered">
  <thead>
  
    <tr>
      <th>Doctor's Speciality</th>
      <th>Name</th>
      <th>Channelling Fee</th>
      <th>Date</th>
      <th>Start Time</th>
      <th>End Time</th>
      <th>Book Now</th>
    </tr>
    
  </thead>
  <tbody>
  
    <?php echo $Ap_list; ?>
    
  </tbody>
</table>
        
     </div>

<?php require_once('footer.php'); ?>