<?php 
//error_reporting(0);
session_start();
require_once('../DBConnection.php');

$user_id	= $_SESSION['user_id'];

	function input($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
		$ID = $_GET["user_find"];
	
		//getting the list of users
        $query = "SELECT * FROM paction_db WHERE User_ID = '{$ID}'";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
			
						$First_Name 		= $user['First_Name'];
						$Last_Name 			= $user['Last_Name'];
						$Doctor_Speciality	= $user['Doctor_Speciality'];
						$User_Name 			= $user['Email'];//
						$ID_Number			= $user['ID_Number'];//
						$Address 			= $user['Address'];
						$Telephone_Number	= $user['Telephone_Number'];
						$City 				= $user['City'];
						$DOB 				= $user['DOB'];
					//	$Gender				= $user['Gender'];
														
										}
	
	
	if (isset($_POST["submit"])) {
		
		if ($_SERVER['REQUEST_METHOD'] == "POST") {
					
					$First_Name 		= mysqli_real_escape_string($connection, input($_POST["first_name"]));
					$Last_Name 			= mysqli_real_escape_string($connection, input($_POST["last_name"]));
					//$User_Name 			= mysqli_real_escape_string($connection, input($_POST["user_name"]));
					//$ID_Number			= mysqli_real_escape_string($connection, input($_POST["id_num"]));
					$Address 			= mysqli_real_escape_string($connection, input($_POST["address"]));
					$Telephone_Number	= mysqli_real_escape_string($connection, input($_POST["telephone_number"]));
					$City 				= mysqli_real_escape_string($connection, input($_POST["city"]));
					$DOB 				= mysqli_real_escape_string($connection, input($_POST["dob"]));
					$Gender				= mysqli_real_escape_string($connection, input($_POST["gender"]));
					
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
													
					$validation = array ("First_Name"=>"", "Last_Name"=>"", "User_Name"=>"", "ID_Number"=>"", "Address"=>"", "Telephone_Number"=>"", "City"=>"", "DOB"=>"", "Gender"=>"");
					
					$lenth_check = array ("First_Name"=>"10", "Last_Name"=>"20", "User_Name"=>"20", "ID_Number"=>"10", "Address"=>"50", "Telephone_Number"=>"10", "City"=>"15");
					
					$validation_msg = array ("First_Name"=>"", "Last_Name"=>"", "User_Name"=>"", "ID_Number"=>"", "Address"=>"", "Telephone_Number"=>"", "City"=>"");
					
					
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
											 $query0 = "SELECT * FROM paction_db WHERE Email = '{$uname}' LIMIT 1";
											 $result_set0 = mysqli_query($connection, $query0);
											 
												if ($result_set0) {
													
														if (mysqli_num_rows($result_set0) == 1) {
															 if ($user['Doctor_ID'] != $user['Doctor_ID']) {	
																	$validation['User_Name'] = "is-invalid";
																	$validation_msg['User_Name'] = "H";
																 															 }
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
											 $query = "SELECT * FROM paction_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set = mysqli_query($connection, $query);
											 
											 $query2 = "SELECT * FROM admin_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set2 = mysqli_query($connection, $query2);
											 
											 $query3 = "SELECT * FROM doctor_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set3 = mysqli_query($connection, $query3);
											 
											 $query4 = "SELECT * FROM reception_db WHERE ID_Number = '{$ID_Number}' LIMIT 1";
											 $result_set4 = mysqli_query($connection, $query4);
											 
												if (($result_set) and (mysqli_num_rows($result_set) == 1)) {
															if ($u_id['User_ID'] != $user_id) {
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															}
													
													} elseif ($result_set2 and (mysqli_num_rows($result_set2) == 1)) {
															if ($u_id['User_ID'] != $user_id) {
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															}
															
													} elseif ($result_set3 and (mysqli_num_rows($result_set3) == 1)) {
															if ($u_id['User_ID'] != $user_id) {
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															}
															
													} elseif ($result_set4 and (mysqli_num_rows($result_set4) == 1)) {
															if ($u_id['User_ID'] != $user_id) {
																$validation['ID_Number'] = "is-invalid";
																$validation_msg['ID_Number'] = "H";
															}
															
													}
												
									
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
					
					if (empty(trim($DOB))) {
						$validation['DOB'] = "is-invalid";
					}
					
					if (isset($Gender)) {
						
							if ($Gender == "Male") {
								
									$male_checked 	= "checked";
									$female_checked	= "";
								
								} else {
									
										$female_checked = "checked";
										$male_checked 	= "";
									
									}
						
						} else {$validation['Gender'] = "is-invalid";}
						
#-----------------------------------------------------------------End Form Validation-------------------------------------------------------------------------

			list($a, $b, $c, $d, $e, $f, $g, $h, $i, $j) = array_values($validation);
			
			if (empty($a) and empty($b) and empty($c) and empty($d) and empty($e) and empty($f) and empty($g) and empty($h) and empty($j)) {
				
				
													/*echo $First_Name; echo '<br>';
													echo $Last_Name; echo '<br>';
													echo $User_Name; echo '<br>';
													echo $Password; echo '<br>';
													echo $Address; echo '<br>';
													echo $City; echo '<br>';
													echo $DOB; echo '<br>';
													echo $_POST["gender"];*/
				
				
						$update_query = "UPDATE paction_db SET First_Name = '{$First_Name}', Last_Name = '{$Last_Name}', Email = '{$User_Name}', ID_Number = '{$ID_Number}', Telephone_Number = '{$Telephone_Number}', Address = '{$Address}', City = '{$City}', DOB = '{$DOB}' WHERE doctor_db . Doctor_ID = '{$user_id}' ";
						$update_result_set = mysqli_query($connection, $update_query);
						
						if ($update_result_set) {
								
								echo "Update Data";
							
							} else {
								
									echo "Error";
								
								}
										
				}
					
		}
	}		

?>

<!DOCTYPE html>
<html><head>
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

	<h1 class="display-3 font-weight-bold font-italic text-center">Admin Registration</h1>

	<div class="main">
        <div class="container-fluid">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data" id="register">
            
              <div class="form-group row">
                <label for="firstname" class="col-sm-2 col-form-label">First Name :</label>
                <div class="col-sm-6">
                  <input type="text" id="firstname" name="first_name" class="form-control <?php echo $validation['First_Name']; ?>" value="<?php echo $First_Name ?>" placeholder="John...">
                      <div class="invalid-feedback">
                        <?php if ($validation_msg['First_Name'] == "R") {echo '<h6>First Name is Required!</h6>';}
							  if ($validation_msg['First_Name'] == "L") {echo '<h6>Must be less than First Name characters</h6>';}
						?>
                      </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name :</label>
                <div class="col-sm-6">
                  <input type="text" class="form-control <?php echo $validation['Last_Name']; ?>" name="last_name" id="inputEmail3" value="<?php echo $Last_Name ?>" placeholder="Diggle...">
                  	<div class="invalid-feedback">
                        <?php if ($validation_msg['Last_Name'] == "R") {echo '<h6>Last Name is Required!</h6>';}
							  if ($validation_msg['Last_Name'] == "L") {echo '<h6>Must be less than Last Name characters</h6>';}
						?>
                    </div>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-6">
                  <input type="email" class="form-control <?php echo $validation['User_Name']; ?>" name="user_name" id="email" value="<?php echo $User_Name; ?>" placeholder="email@example.com">
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
							  if ($validation_msg['ID_Number'] == "H") {echo '<h6>This Id number already have</h6>';}
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
                  <textarea class="form-control <?php echo $validation['Address']; ?>" onclick="return checkpass()" name="address" id="exampleFormControlTextarea1" rows="3"><?php echo $Address; ?></textarea>
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
                      <input type="text" class="form-control <?php echo $validation['DOB']; ?>" nclick="return checkpass()" id="dp" value="<?php echo $DOB; ?>" name="dob" placeholder="MM/DD/YYYY" aria-label="" aria-describedby="basic-addon1">
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
                	<div class="col-sm-6 offset-sm-2">
                      <div class="custom-control custom-checkbox">
                          <input type="checkbox" class="custom-control-input" id="myCheckbox" nclick="return checkpass()">
                          <label class="custom-control-label" for="myCheckbox">Check this custom checkbox</label>
                      </div>
                    </div>
                </div>

              
              <div class="form-group row">
                <div class="col-sm- offset-sm-2">
                  <button type="submit" id="ok" name="submit" class="btn btn-primary" onclick="return checkpass()" disabled>Update</button>
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
		$(".se-pre-con").fadeOut("slow");
	});
</script>

<script>
  $('#dp').datepicker({
    forceParse: false,
    autoclose: true,
    todayHighlight: true,
    toggleActive: true
});
</script>

<script>
$(document).ready(function () {
  $('#myCheckbox').click(function () {
    $('#ok').prop("disabled", !$("#myCheckbox").prop("checked")); 
  })
});
</script>

</body>
</html>
<?php mysqli_close($connection); ?>