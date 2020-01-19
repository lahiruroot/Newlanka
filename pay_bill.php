<?php

session_start();
	
	require_once('DBConnection.php');

	//checking if a user is logged in
	$user_id	= $_SESSION['user_id'];
	$D_ID		= $_SESSION['id_number'];
	
	if (!isset($user_id)) {
	header('location: paction/Paction_login.php?paction=not_login');
	}
	
$validation = array ("Name_on_Card"=>"", "Credit_card_number"=>"", "Exp_Month"=>"", "CVV"=>"", "Exp_Year"=>"");

	if (isset($_GET['var1'])) {
		
			$BNU = mysqli_real_escape_string($connection, $_GET['var1']);
			
							//getting the list of users
        $query = "SELECT * FROM admin_db WHERE ID_Number = '{$BNU}';";
        $result_set = mysqli_query($connection, $query);
		
		$query2 = "SELECT * FROM doctor_db WHERE ID_Number = '{$BNU}';";
        $result_set2 = mysqli_query($connection, $query2);
		
		$query3 = "SELECT * FROM paction_db WHERE ID_Number = '{$BNU}';";
        $result_set3 = mysqli_query($connection, $query3);
		
        	if (mysqli_num_rows($result_set) == 1) {
				
					$user = mysqli_fetch_assoc($result_set);
								$Name		= $user['First_Name'];
								$Email		= $user['User_Name'];
								$Address	= $user['Address'];
								$City		= $user['City'];
								$Dob		= $user['DOB'];
								$Tel		= $user['Telephone_Number'];
							
				} if (mysqli_num_rows($result_set2) == 1) {
					
					$user2 = mysqli_fetch_assoc($result_set2);
								$Name		= $user2['First_Name'];
								$Email		= $user2['Email'];
								$Address	= $user2['Address'];
								$City		= $user2['City'];
								$Dob		= $user2['DOB'];
								$Tel		= $user2['Telephone_Number'];
					
					
				} if (mysqli_num_rows($result_set3) == 1) {
					
					$user3 = mysqli_fetch_assoc($result_set3);
								$Name		= $user3['First_Name'];
								$Email		= $user3['User_Name'];
								$Address	= $user3['Address'];
								$City		= $user3['City'];
								$Dob		= $user3['DOB'];
								$Tel		= $user3['Telephone_Number'];
					
					
				}
							
		
		}
		
				/*		//getting the list of users
        $query = "SELECT * FROM doctor_add_schedule WHERE Schedule_ID = '{$SID}'";
        $result_set = mysqli_query($connection, $query);
        
            $user = mysqli_fetch_assoc($result_set);
						$D_ID	= $user['Schedule_ID'];
		
		if ($AQ == 0) {header('location: admin/admin_dashboard.php?Payment=fail');}		*/

if (isset($_POST["pay_now"])) {




		$Name_on_Card		= mysqli_real_escape_string($connection, $_POST["name_on_card"]);
		$Credit_card_number	= mysqli_real_escape_string($connection, $_POST["credit_card_number"]);
		$Exp_Month			= mysqli_real_escape_string($connection, $_POST["exp_month"]);
		$CVV				= mysqli_real_escape_string($connection, $_POST["cvv"]);
		$Exp_Year			= mysqli_real_escape_string($connection, $_POST["exp_month"]);
		
		if (empty(trim($Name_on_Card))) {
				$validation['Name_on_Card'] = "is-invalid";
			}
		if (empty(trim($Credit_card_number))) {
				$validation['Credit_card_number'] = "is-invalid";
			}
		if (empty(trim($Exp_Month))) {
				$validation['Exp_Month'] = "is-invalid";
			}
		if (empty(trim($CVV))) {
				$validation['CVV'] = "is-invalid";
			}
		if (empty(trim($Exp_Year))) {
				$validation['Exp_Year'] = "is-invalid";
			}
			
			
			list($a, $b, $c, $d, $e) = array_values($validation);
			
			if (empty($a) and empty($b) and empty($c) and empty($d) and empty($e)) {
				
				
						$query = "INSERT INTO payment_details (ID_Number, Name_on_Card, Credit_Card_Number, Exp_Month, CVV, Exp_Year) VALUES ('{$_SESSION['id_number']}', '{$Name_on_Card}', '{$Credit_card_number}', '{$Exp_Month}', '{$CVV}', '{$Exp_Year}')";
						$result_set = mysqli_query($connection, $query);
						
						if ($result_set) {
							
								header('location: admin/my_appointment.php?Payment=successfully');
							}
				if (isset($_GET['Book_Now'])) {
	
			$SID = mysqli_real_escape_string($connection, $_GET['Book_Now']);
			
			
						//getting the list of users
        /*$query = "SELECT * FROM doctor_add_schedule WHERE Schedule_ID = '{$SID}'";
        $result_set = mysqli_query($connection, $query);
        
            $user = mysqli_fetch_assoc($result_set);
						$D_ID	= $user['Schedule_ID'];
						$D		= $user['Schedule_Date'];
						$ST		= $user['Start_Time'];
						$ET		= $user['End_Time'];
						$AQ		= $user['At_1Hour_Appointment_Quentity'];
						
						if ($AQ == 2) {
								$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '1' WHERE Schedule_ID = '{$D_ID}';";
								mysqli_query($connection, $sql);
							} elseif ($AQ == 1) {
									$sql="UPDATE doctor_add_schedule SET 	At_1Hour_Appointment_Quentity = '0' WHERE Schedule_ID = '{$D_ID}';";
									mysqli_query($connection, $sql);
								}*/
			
			
				$query = "INSERT INTO appointment_list (Doctor_ID_Number, Patient_Name, Patient_Email, Patient_Address, Patient_City, Patient_DOB, Patient_Telephone_Number, Appointment_Date, Appointment_Start_Time, Appointment_End_Time, State) VALUES ('{$D_ID}', '{$Name}', '{$Email}', '{$Address}', '{$City}', '{$Dob}', '{$Tel}', '{$D}', '{$ST}', '{$ET}', 'pending');";
				$result_set = mysqli_query($connection, $query);
	
	}		

		
	
	}		

		
		
		}

?>

<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pay Bill</title>

<link rel="stylesheet" href="css/bootstrap.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>

</head>

<body>

<h2 style="padding-top:50px; padding-left:700px;">Pay Bill</h2>
<div class="jumbotron bg-light border border-dark" style="margin:500px;margin-top:20px; width:600px;">
    	
  <form action="pay_bill.php?var1=<?= $BNU ?>&Book_Now=<?= $_GET['Book_Now'] ?>" method="post">
  		<div class="row">
              <div class="col-50">
              <h4>Your Details</h4>
               <div class="form-group">
                <label><i class="fa fa-user"></i> Name :</label>
                <label><?php echo $Name; ?></label>
               </div>
               <div class="form-group">
                <label><i class="fa fa-envelope"></i> Email :</label>
                <label><?php echo $Email; ?></label>
               </div>
               <div class="form-group">
                <label><i class="fa fa-address-card-o"></i> Address :</label>
                <label><?php echo $Address; ?></label>
               </div>
               <div class="form-group">
                <label><i class="fa fa-institution"></i> City :</label>
                <label><?php echo $City; ?></label>
               </div>
              </div>
        
           <div class="col-50" style="padding-left:20px;">
           	
            <h4>Payment</h4>
            <h6>Accepted Cards</h6>
            
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            
              <div class="form-group">
                <label for="exampleInputEmail1">Name on Card</label>
                <input type="text" class="form-control <?php echo $validation['Name_on_Card']; ?>" id="exampleInputEmail1" name="name_on_card" placeholder="John More Doe">
                <div class="invalid-feedback">
                        <h6>This field is Required!</h6>
                      </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Credit card number</label>
                <input type="text" class="form-control <?php echo $validation['Credit_card_number']; ?>" id="exampleInputEmail1" name="credit_card_number" placeholder="1111-2222-3333-4444">
                <div class="invalid-feedback">
                        <h6>This field is Required!</h6>
                      </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Exp Month</label>
                <input type="text" class="form-control <?php echo $validation['Exp_Month']; ?>" id="exampleInputEmail1" name="exp_month" placeholder="September">
                <div class="invalid-feedback">
                        <h6>This field is Required!</h6>
                      </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">CVV</label>
                <input type="text" class="form-control <?php echo $validation['CVV']; ?>" id="exampleInputEmail1" name="cvv" placeholder="352">
                <div class="invalid-feedback">
                        <h6>This field is Required!</h6>
                      </div>
              </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Exp Year</label>
                <input type="text" class="form-control <?php echo $validation['Exp_Year']; ?>" id="exampleInputEmail1" name="exp_month" placeholder="Enter email">
                <div class="invalid-feedback">
                        <h6>This field is Required!</h6>
                      </div>
              </div>
              
           </div>
        </div>
          <button type="submit" class="btn btn-primary" name="pay_now">Pay Now</button>
    </form>
        
  </div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>
    
    <!-- Bootstrap JS -->
<script src="js/bootstrap.js"></script>

</body>
</html>