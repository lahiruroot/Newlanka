<?php
session_start();
require_once('../DBConnection.php');

function input($data) {
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	
	$errors = array ("User_Name"=>"", "Password"=>"", "User_Block_or_Unblock"=>"", "Invalid_User_Details"=>"", "query"=>"");

		//check for submit bubmission
if (isset($_POST['submit'])) {
	
				$email 		= mysqli_real_escape_string($connection, input($_POST["email"]));
				$password 	= mysqli_real_escape_string($connection, input($_POST["password"]));
	
		// check if the username & password has been entered
		if (!isset($email) || strlen(trim($email)) < 1 ) {
			$errors['User_Name'] = 'Username is Missing / Invalid';
		}
		
		if (!isset($password) || strlen(trim($password)) < 1 ) {
			$errors['Password'] = 'Password is Missing / Invalid';
		}
		
		// check if there are any erros in the form
		list($a, $b) = array_values($errors);
		if (empty($a) and empty($b)) {
			
					// save hashpassword into variables
				$hashed_password = md5(sha1($password));
				
				// prepare database query
			$query = "SELECT * FROM doctor_db WHERE Email = '{$email}' AND Password = '{$hashed_password}' LIMIT 1";
			$result_set = mysqli_query($connection, $query);
			
			if ($result_set) {
				// query succesful
				if (mysqli_num_rows($result_set) == 1 ) {
					// valid user found
					$user = mysqli_fetch_assoc($result_set);
					
										//checking account Block or Unblock
										if ($user['Block_Unblock'] == 1) {
											$errors['User_Block_or_Unblock'] = 'Your Account Block';
											} else {
													
													$_SESSION['user_id'] = $user['Doctor_ID'];
													$_SESSION['id_number'] = $user['ID_Number'];
													$_SESSION['first_name'] = $user['First_Name'];
													$_SESSION['email'] = $user['Email'];
													//updating last login
													
													$query = "UPDATE doctor_db SET Last_Login = NOW() WHERE Doctor_ID = '{$_SESSION['user_id']}' ";
													$result_set = mysqli_query($connection, $query);
														if (!$result_set) {
																die ("Database query faild");
															}
													
														// redirect index.php
														header('Location: doctor_home.php?admin_login=successful login');
											}
													}  else {
															// user name  and password invalid
															$errors['Invalid_User_Details'] = 'Invalid Username / Password';
														}
							
							
								
					} else {
							$errors['query'] = 'Database Query Failed';
						}
			
			}
		
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" href="../css/bootstrap.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

div.card {

		margin-left:600px;
		margin-top:100px;
	
	}
	
img {
	
	margin-left:75px;
	
}

</style>

</head>

<body>


<div class="card w-25 p-3 bg-light">

        <div class="card-body">
          <h4 class="card-title">Doctor Login</h4>
          
          <img src="../images/login.png" class="rounded-circle w-50 bg-success" alt="Cinque Terre">

          <div class="ht-tm-codeblock ht-tm-btn-replaceable ht-tm-element ht-tm-element-inner">
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted text-danger"><h6 class="text-danger"><?php echo $errors['User_Name']; ?></h6></small>
              </div>
              
              <div class="form-group">
                <label for="example-password-input">Password</label>
                <input class="form-control" type="password" id="example-password-input" name="password">
                <small id="example-password-input" class="form-text text-muted text-danger"><h6 class="text-danger"><?php echo $errors['Password']; ?></h6></small>
              </div>
              
              <button type="submit" class="btn btn-secondary bg-primary" name="submit">Submit</button>
              <small id="example-password-input" class="form-text text-muted text-danger"><h6 class="text-danger"><?php echo $errors['User_Block_or_Unblock']; ?></h6></small>
              <small id="example-password-input" class="form-text text-muted"><h6 class="text-danger"><?php echo $errors['Invalid_User_Details']; ?></h6></small>
            </form>
          </div>
        </div>

</div>


	<script src = "../jquery.js"></script>
    <script src="../js/bootstrap.js"></script>

</body>
</html>
<?php mysqli_close($connection); ?>