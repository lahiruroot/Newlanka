<?php 
require_once('../DBConnection.php');

	function input($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
					$First_Name 		= "";
					$Last_Name 			= "";
					$Doctor_Speciality	= "";
					$User_Name 			= "";
					$ID_Number			= "";
					$Password 			= "";
					$CPassword			= "";
					$Address 			= "";
					$Telephone_Number	= "";
					$City 				= "";
					$DOB 				= "";
	
	if (isset($_POST["submit"])) {
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
					
					$First_Name 		= mysqli_real_escape_string($connection, input($_POST["first_name"]));
					$Last_Name 			= mysqli_real_escape_string($connection, input($_POST["last_name"]));
					$Doctor_Speciality	= mysqli_real_escape_string($connection, input($_POST["ss"]));
					$User_Name 			= mysqli_real_escape_string($connection, input($_POST["user_name"]));
					$ID_Number			= mysqli_real_escape_string($connection, input($_POST["id_num"]));
					$Password 			= mysqli_real_escape_string($connection, input($_POST["password"]));
					$CPassword 			= mysqli_real_escape_string($connection, input($_POST["confirm_password"]));
					$hashpassword 		= md5(sha1($Password));
					$Address 			= mysqli_real_escape_string($connection, input($_POST["address"]));
					$Telephone_Number	= mysqli_real_escape_string($connection, input($_POST["telephone_number"]));
					$City 				= mysqli_real_escape_string($connection, input($_POST["city"]));
					$DOB 				= mysqli_real_escape_string($connection, input($_POST["dob"]));
					
					$File_Tp_Name		= $_FILES['pro_pic']['tmp_name'];
					$File_Size			= $_FILES['pro_pic']['size'];
					$File_Error			= $_FILES['pro_pic']['error'];
					$File_Type			= $_FILES['pro_pic']['type'];
					
					/*echo $First_Name;
					echo $Last_Name;
					echo $User_Name;
					echo $Password;
					echo $Address;
					echo $City;
					echo $DOB;
					echo $_POST["gender"];*/
					
#-----------------------------------------------------------------Form Validation-----------------------------------------------------------------------------

													//chcking required field & max lenth
													
					$validation = array ("First_Name"=>"", "Last_Name"=>"", "Doctor_Speciality"=>"", "User_Name"=>"", "ID_Number"=>"", "Password"=>"", "CPassword"=>"", "Address"=>"", "Telephone_Number"=>"", "City"=>"", "DOB"=>"", "Gender"=>"");
					
					$lenth_check = array ("First_Name"=>"10", "Last_Name"=>"20", "User_Name"=>"100", "ID_Number"=>"10", "Password"=>"20", "CPassword"=>"20", "Address"=>"100", "Telephone_Number"=>"10", "City"=>"15");
					
					$validation_msg = array ("First_Name"=>"", "Last_Name"=>"", "User_Name"=>"", "ID_Number"=>"", "Password"=>"", "CPassword"=>"", "Address"=>"", "Telephone_Number"=>"", "City"=>"");
					
					$validation_propic_msg = array ("Empty_Img"=>"", "Check_Size"=>"", "Check_Type"=>"");
					
					if (empty(trim($First_Name))) {
						$validation['First_Name'] = "is-invalid";
						$validation_msg['First_Name'] = "R";
					} 	elseif (strlen(trim($First_Name)) > $lenth_check['First_Name']) {
									$validation['First_Name'] = "is-invalid";
									$validation_msg['First_Name'] = "L";
								}
					
					if (empty(trim($Last_Name))) {
						$validation['Last_Name'] = "is-invalid";
						$validation_msg['Last_Name'] = "R";
					} 	elseif (strlen(trim($Last_Name)) > $lenth_check['Last_Name']) {
									$validation['Last_Name'] = "is-invalid";
									$validation_msg['Last_Name'] = "L";
								}
								
					if ($Doctor_Speciality == "Select Speciality") {
						
							$validation['Doctor_Speciality'] = "is-invalid";
						
						}
					
					if (empty(trim($User_Name))) {
						$validation['User_Name'] = "is-invalid";
						$validation_msg['User_Name'] = "R";
					} 	elseif (strlen(trim($User_Name)) > $lenth_check['User_Name']) {
									$validation['User_Name'] = "is-invalid";
									$validation_msg['User_Name'] = "L";
								} elseif (!filter_var($User_Name, FILTER_VALIDATE_EMAIL)) {
										
											$validation['User_Name'] = "is-invalid";
											$validation_msg['User_Name'] = "I";
										
									} else {
									
														//checking if email address already exists
					
											 $uname = mysqli_real_escape_string($connection, input($User_Name));
											 $query = "SELECT * FROM doctor_db WHERE User_Name = '{$uname}' LIMIT 1";
											 $result_set = mysqli_query($connection, $query);
											 
												if ($result_set) {
													
														if (mysqli_num_rows($result_set) == 1) {
															
																$validation['User_Name'] = "is-invalid";
																$validation_msg['User_Name'] = "H";
															
															}
													
													}
									
									}
								
					if (empty(trim($ID_Number))) {
						$validation['ID_Number'] = "is-invalid";
						$validation_msg['ID_Number'] = "R";
					} 	elseif (strlen(trim($ID_Number)) > $lenth_check['ID_Number']) {
									$validation['ID_Number'] = "is-invalid";
									$validation_msg['ID_Number'] = "L";
								} else {
									
											//checking if Id number already exists
					
											 $uname = mysqli_real_escape_string($connection, input($User_Name));
											 $query = "SELECT * FROM admin_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set = mysqli_query($connection, $query);
											 
											 $query2 = "SELECT * FROM doctor_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set2 = mysqli_query($connection, $query2);
											 
											 $query3 = "SELECT * FROM paction_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set3 = mysqli_query($connection, $query3);
											 
											 $query4 = "SELECT * FROM reception_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set4 = mysqli_query($connection, $query4);
											 
												if (($result_set) and (mysqli_num_rows($result_set) == 1)) {
															
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
													
													} elseif ($result_set2 and (mysqli_num_rows($result_set2) == 1)) {
															
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															
													} elseif ($result_set3 and (mysqli_num_rows($result_set3) == 1)) {
															
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															
													} elseif ($result_set4 and (mysqli_num_rows($result_set4) == 1)) {
															
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															
													}
									
									}
					
					if (empty(trim($Password))) {
						$validation['Password'] = "is-invalid";
						$validation_msg['Password'] = "R";
					} 	elseif (strlen(trim($Password)) > $lenth_check['Password']) {
									$validation['Password'] = "is-invalid";
									$validation_msg['Password'] = "L";
								}
						
					if (empty(trim($CPassword))) {
						$validation['CPassword'] = "is-invalid";
						$validation_msg['CPassword'] = "R";
					} elseif (strlen(trim($CPassword)) > $lenth_check['CPassword']) {
									$validation['CPassword'] = "is-invalid";
									$validation_msg['CPassword'] = "L";
								}
					
					if (empty(trim($Address))) {
						$validation['Address'] = "is-invalid";
						$validation_msg['Address'] = "R";
					} elseif (strlen(trim($Address)) > $lenth_check['Address']) {
									$validation['Address'] = "is-invalid";
									$validation_msg['Address'] = "L";
								}
					
					if (empty(trim($Telephone_Number))) {
						$validation['Telephone_Number'] = "is-invalid";
						$validation_msg['Telephone_Number'] = "R";
					} elseif (strlen(trim($Telephone_Number)) > $lenth_check['Telephone_Number']) {
									$validation['Telephone_Number'] = "is-invalid";
									$validation_msg['Telephone_Number'] = "L";
								}
					
					if (empty(trim($City))) {
						$validation['City'] = "is-invalid";
						$validation_msg['City'] = "R";
					} elseif (strlen(trim($City)) > $lenth_check['City']) {
									$validation['City'] = "is-invalid";
									$validation_msg['City'] = "L";
								}
								
					if ($File_Error == 4) {
						$validation['Pro_Pic'] = "is-invalid";
						$validation_propic_msg['Empty_Img'] = "Plese Insert Profile Picture";
					} elseif ($File_Size > 5000000) {
									$validation['Pro_Pic'] = "is-invalid";
									$validation_propic_msg['Check_Size'] = "Maximum File Size 5MB";
								} elseif ($File_Type != "image/jpeg") {
									$validation['Pro_Pic'] = "is-invalid";
									$validation_propic_msg['Check_Type'] = "Only jpeg file are allowed";
								}
					
					if (empty(trim($DOB))) {
						$validation['DOB'] = "is-invalid";
					}
					
					if (isset($_POST["gender"])) {
						
						$Gender = $_POST["gender"];
							
							if ($Gender == "Male") {
								
									$male_checked 	= "checked";
									$female_checked	= "";
								
								} else {
									
										$female_checked = "checked";
										$male_checked 	= "";
									
									}
						
						} else {$validation['Gender'] = "is-invalid";}
						
#-----------------------------------------------------------------End Form Validation-------------------------------------------------------------------------

			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j, $k) = array_values($validation);
			
			if (empty($a) and empty($b) and empty($c) and empty($d) and empty($e) and empty($f) and empty($g) and empty($h) and empty($i) and empty($j) and empty($k)) {
				
				
													/*echo $First_Name; echo '<br>';
													echo $Last_Name; echo '<br>';
													echo $User_Name; echo '<br>';
													echo $Password; echo '<br>';
													echo $Address; echo '<br>';
													echo $City; echo '<br>';
													echo $DOB; echo '<br>';
													echo $_POST["gender"];*/
				
				
						$query = "INSERT INTO doctor_db (First_Name, Last_Name, Doctor_Speciality, Email, ID_Number, Password, Telephone_Number, Address, City, DOB, Gender, doctor_channeling_costs, Last_Login,  Block_Unblock, User_Delete) VALUES ('{$First_Name}', '{$Last_Name}', '{$Doctor_Speciality}', '{$User_Name}', '{$ID_Number}', '{$hashpassword}', '{$Telephone_Number}', '{$Address}', '{$City}', '{$DOB}', '{$Gender}', '0', '0000-00-00 00:00:00', '0', '0')";
						$result_set = mysqli_query($connection, $query);
						
						if ($result_set) {
							
										$query 		= "SELECT * FROM doctor_db WHERE Email = '{$User_Name}'";
										$result_set = mysqli_query($connection, $query);
										$user 		= mysqli_fetch_assoc($result_set);
										
										$id = $user['ID_Number'];
											
												$Upload_to		= '../images/';
												
												move_uploaded_file($File_Tp_Name, $Upload_to . $id . ".jpg");
							
								echo "Insert Data";
							
							} else {
								
									echo "Error";
								
								}
									
				}
					
		}
	}		

?>

<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" href="../css/bootstrap.css">
<link href = "../css/bootstrap-datepicker.css" rel = "stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<title>Untitled Document</title>

<style>

	div.main {
			
			padding-top:20px;
			padding-left:350px;
			
			
		}
		
	#register .short{
	font-weight:bold;
	color:#FF0000;
	font-size:larger;
	}
	#register .weak{
	font-weight:bold;
	color:orange;
	font-size:larger;
	}
	#register .good{
	font-weight:bold;
	color:#2D98F3;
	font-size:larger;
	}
	#register .strong{
	font-weight:bold;
	color: limegreen;
	font-size:larger;
	}
	
	.se-pre-con {
		position: fixed;
		left: 0px;
		top: 0px;
		width: 100%;
		height: 100%;
		z-index: 9999;
		background: url(../images/loading.gif) center no-repeat #fff;
	}

</style>

</head>

<body>

	<h1 class="display-3 font-weight-bold font-italic text-center">Doctor Registration</h1>

	<div class="main">
        <div class="container-fluid">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" id="register" enctype="multipart/form-data">
            
              <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">First Name :</label>
                <div class="col-sm-6">
                		<div class="input-group input-group">
                              <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">DR</span>
                              </div>
                              <input type="text" class="form-control <?php echo $validation['First_Name']; ?>" name="first_name" id="firstname" value="<?php echo $Last_Name ?>" placeholder="John..." aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                              	<div class="invalid-feedback">
									<?php if ($validation_msg['First_Name'] == "R") {echo '<h6>First Name is Required!</h6>';}
                                          if ($validation_msg['First_Name'] == "L") {echo '<h6>Must be less than First Name characters</h6>';}
                                    ?>
                                </div>
                        </div>
                </div>
              </div>
            
              <div class="form-group row">
                <label for="lastname" class="col-sm-2 col-form-label">Last Name :</label>
                <div class="col-sm-6">
                  <input type="text" id="lastname" name="last_name" class="form-control <?php echo $validation['Last_Name']; ?>" value="<?php echo $First_Name ?>" placeholder="Diggle...">
                      <div class="invalid-feedback">
                        <?php if ($validation_msg['Last_Name'] == "R") {echo '<h6>Last Name is Required!</h6>';}
							  if ($validation_msg['Last_Name'] == "L") {echo '<h6>Must be less than Last Name characters</h6>';}
						?>
                      </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="ds" class="col-sm-2 col-form-label">Doctor's Speciality :</label>
                <div class="col-sm-6">
                  <select class="custom-select <?php echo $validation['Doctor_Speciality']; ?>" id="ds" name="ss">
                      <option selected>Select Speciality</option>
                      <option <?php if ($Doctor_Speciality == "CARDIAC ELECTROPHYSIOLOGIST") {echo "selected";} ?> value="CARDIAC ELECTROPHYSIOLOGIST">CARDIAC ELECTROPHYSIOLOGIST</option>
                      <option <?php if ($Doctor_Speciality == "CARDIAOTHORACIC SURGEON") {echo "selected";} ?> value="CARDIAOTHORACIC SURGEON">CARDIAOTHORACIC SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "CHEST SPECIALIST") {echo "selected";} ?> value="CHEST SPECIALIST">CHEST SPECIALIST</option>
                      <option <?php if ($Doctor_Speciality == "DENTAL SURGEON") {echo "selected";} ?> value="DENTAL SURGEON">DENTAL SURGEON</option>
                      <option <?php if ($Doctor_Speciality == "DENTAL SURGEON / RESTORATIVE DENTISTRY") {echo "selected";} ?> value="DENTAL SURGEON / RESTORATIVE DENTISTRY">DENTAL SURGEON / RESTORATIVE DENTISTRY</option>
                      <option <?php if ($Doctor_Speciality == "EYE SURGEON") {echo "selected";} ?> value="EYE SURGEON">EYE SURGEON</option>
                  </select>
                      <div class="invalid-feedback">
                        <h6>Required This Field!</h6>
                      </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control <?php echo $validation['User_Name']; ?>" name="user_name" id="inputEmail3" value="<?php echo $User_Name; ?>" placeholder="email@example.com">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['User_Name'] == "R") {echo '<h6>User Name is Required!</h6>';}
							  if ($validation_msg['User_Name'] == "L") {echo '<h6>Must be less than User Name characters</h6>';}
							  if ($validation_msg['User_Name'] == "H") {echo '<h6>This email address already have</h6>';}
							  if ($validation_msg['User_Name'] == "I") {echo '<h6>Invalid email format</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">ID Number :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?php echo $validation['ID_Number']; ?>" name="id_num" id="inputEmail3" value="<?php echo $ID_Number; ?>" placeholder="xxxxxxxxxv">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['ID_Number'] == "R") {echo '<h6>ID Number is Required!</h6>';}
							  if ($validation_msg['ID_Number'] == "L") {echo '<h6>Must be less than ID Number characters</h6>';}
							  if ($validation_msg['User_Name'] == "H") {echo '<h6>This Id number already have</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="PWD" class="col-sm-2 col-form-label">Password :</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control <?php echo $validation['Password']; ?>" name="password" id="PWD" placeholder="Password" data-toggle="tooltip" data-placement="right" title="Use of special Characters,Use of uppercase [A – Z] and lowercase [a – z] letters adn Use of numbers [0 – 9].">
                  		<span id="result"></span>
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['Password'] == "R") {echo '<h6>Password is Required!</h6>';}
							  if ($validation_msg['Password'] == "L") {echo '<h6>Must be less than Password characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="CPWD" class="col-sm-2 col-form-label">Confirm Password :</label>
                <div class="col-sm-6">
                  <input type="password" class="form-control <?php echo $validation['CPassword']; ?>" name="confirm_password" id="CPWD" placeholder="Confirm Password" data-toggle="tooltip" data-placement="right" title="Use of special Characters,Use of uppercase [A – Z] and lowercase [a – z] letters adn Use of numbers [0 – 9].">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['CPassword'] == "R") {echo '<h6>Confirm Password is Required!</h6>';}
							  if ($validation_msg['CPassword'] == "L") {echo '<h6>Must be less than Confirm Password characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="TP" class="col-sm-2 col-form-label">Telephone Number :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?php echo $validation['Telephone_Number']; ?>" onclick="return checkpass()" name="telephone_number" id="TP" value="<?php echo $Telephone_Number; ?>" placeholder="+94xxxxxxxxx">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['Telephone_Number'] == "R") {echo '<h6>Telephone Number is Required!</h6>';}
							  if ($validation_msg['Telephone_Number'] == "L") {echo '<h6>Must be less than Telephone Number characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-6">
                  <textarea class="form-control <?php echo $validation['Address']; ?>" onclick="return checkpass()" name="address" value="<?php echo $Address; ?>" id="exampleFormControlTextarea1" rows="3"><?php echo $Address; ?></textarea>
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['Address'] == "R") {echo '<h6>Address is Required!</h6>';}
							  if ($validation_msg['Address'] == "L") {echo '<h6>Must be less than Address characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">City :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?php echo $validation['City']; ?>" onclick="return checkpass()" name="city" id="inputEmail3" value="<?php echo $City; ?>" placeholder="City">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['City'] == "R") {echo '<h6>City is Required!</h6>';}
							  if ($validation_msg['City'] == "L") {echo '<h6>Must be less than City characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="dp" class="col-sm-2 col-form-label">Date Of Birth :</label>
                <div class="col-sm-6">
                	<div class="input-group">
                      <input type="text" class="form-control <?php echo $validation['DOB']; ?>" id="dp" value="<?php echo $DOB; ?>" name="dob" placeholder="MM/DD/YYYY" aria-label="" aria-describedby="basic-addon1">
                      <div class="input-group-append">
                      	<div class="input-group-text">
                        	<i class="fa fa-calendar" style="font-size:24px"></i>
                        </div>
                      </div>
                      	<div class="invalid-feedback">
                            <h6>Date of Birth is Required!</h6>
                        </div>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Insert Profile Picture :</label>
                <div class="col-sm-6">
                  
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="customFile" name="pro_pic">
                      <label class="custom-file-label" for="customFile">Choose file</label>
                      	<div class="invalid-feedback">
                            Looks good!
                        </div>
                  </div>
                  
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Gender :</label>
                    <div class="col-sm-6">
                    
                      <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio1" name="gender" value="Male" class="custom-control-input <?php echo $validation['Gender']; ?>" <?php if (isset($_POST["gender"])) {echo $male_checked;} ?>>
                          <label class="custom-control-label" for="customRadio1">Male</label>
                        </div>
                        
                        <div class="custom-control custom-radio">
                          <input type="radio" id="customRadio2" name="gender" value="Female" class="custom-control-input <?php echo $validation['Gender']; ?>" <?php if (isset($_POST["gender"])) {echo $female_checked;} ?>>
                          <label class="custom-control-label" for="customRadio2">Female</label>
                          <div class="invalid-feedback">
                            Gender is Required!
                        </div>
                      </div>
                      
                    </div>
              </div>
              
              	<div class="form-group row">
                	<div class="col-sm-6 offset-sm-2">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="myCheckbox">
                          <label class="custom-control-label" for="myCheckbox">Check this custom checkbox</label>
                      </div>
                    </div>
                </div>

              
              <div class="form-group row">
                <div class="col-sm- offset-sm-2">
                  <button type="submit" id="ok" name="submit" class="btn btn-primary" onclick="return checkpass()" disabled>Sign in</button>
                </div>
              </div>
                 
            </form>
        </div>
    </div>
    			<div class="se-pre-con"></div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src ="../js/bootstrap-datepicker.js"></script>


<script>
	$(window).load(function() {
		// Animate loader off screen
		$(".se-pre-con").fadeOut("slow");;
	});
</script>

<script>
  $('#dp').datepicker({
    
});
</script>

<script>
$(document).ready(function () {
  $('#myCheckbox').click(function () {
    $('#ok').prop("disabled", !$("#myCheckbox").prop("checked")); 
  })
});
</script>

<script>

	function checkpass(){
	var password=document.getElementById("PWD").value;
	var cpassword=document.getElementById("CPWD").value;
	if (password!=cpassword){
			alert ("Conforimed password are not matching");
		return false;
	}
}

</script>

<script>

$(document).ready(function() {
$('#PWD').keyup(function() {
$('#result').html(checkStrength($('#PWD').val()))
})
function checkStrength(password) {
var strength = 0
if (password.length < 6) {
$('#result').removeClass()
$('#result').addClass('short')
return 'Too short'
}
if (password.length > 7) strength += 1
// If password contains both lower and uppercase characters, increase strength value.
if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1
// If it has numbers and characters, increase strength value.
if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) strength += 1
// If it has one special character, increase strength value.
if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// If it has two special characters, increase strength value.
if (password.match(/(.*[!,%,&,@,#,$,^,*,?,_,~].*[!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1
// Calculated strength value, we can return messages
// If value is less than 2
if (strength < 2) {
$('#result').removeClass()
$('#result').addClass('weak')
return 'Weak'
} else if (strength == 2) {
$('#result').removeClass()
$('#result').addClass('good')
return 'Good'
} else {
$('#result').removeClass()
$('#result').addClass('strong')
return 'Strong'
}
}
});
</script>

<script>
$(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>

</body>
</html>
<?php mysqli_close($connection); ?>