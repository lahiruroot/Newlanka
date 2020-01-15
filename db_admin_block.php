<?php
$id0=$_GET['find_user'];

require_once('../DBConnection.php');

$sql="SELECT * FROM admin_db WHERE User_Name='{$id0}'";
$query = mysqli_query($connection,$sql);

while ($query2 = mysqli_fetch_assoc($query)) {
	
	$b1=$query2['Block_Unblock'];
	
}

//print $b1;

	if ($b1 == '0') {
		
			$sql="UPDATE admin_db SET Block_Unblock='1'  WHERE User_Name='{$id0}'";
			mysqli_query($connection, $sql);
			
		}	else {
			
				$sql="UPDATE admin_db SET Block_Unblock='0'  WHERE User_Name='{$id0}'";
				mysqli_query($connection, $sql);
		
		}

header('Location: admin_block&unblock_list.php?admin_Block_or_Unblock=successful');


?>