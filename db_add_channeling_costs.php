<?php 

	require_once('../DBConnection.php'); 


		if (isset($_POST['add_payment']))	{
			
			if (isset($_GET['var1'])) {
				
					$ID = mysqli_real_escape_string($connection, $_GET['var1']);
					
					$s_id = mysqli_real_escape_string($connection, $_POST['enter_payment']);
				
					$sql="UPDATE doctor_db SET doctor_channeling_costs = '{$s_id}' WHERE Doctor_ID = '{$ID}' ;";
					$query = mysqli_query($connection,$sql);
					
						if ($query) {
									header ('Location: doctor_channeling_costs_list.php?channel_costs="doctor_channeling_costs_change_success"');
				
				} else {header ('Location: doctor_channeling_costs_list.php?channel_costs="doctor_channeling_costs_change_Fail"');}
				
			}
			
		}
	

mysqli_close($connection); ?>