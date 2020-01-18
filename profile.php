<?php 
require_once('header.php');
$idn		= $_SESSION['id_number'];
?>

	<div class="card" style="width: 300px;position: fixed;">
      <img class="card-img-top" src="<?php echo "../images/" . $_SESSION['id_number'] . ".jpg"; ?>" alt="profile_image">
      <div class="card-body"> <?php echo $_SESSION['first_name']; ?> </div>
    </div>
    	
    <div class="jumbotron bg-white rounded border border-dark" style="margin-left: 310px;">
            <table class="table">
              <tbody>
              
              <?php
			  
			  //getting the list of users
        $query = "SELECT * FROM paction_db WHERE ID_Number='{$idn}' ORDER BY First_Name";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
              
                <tr>
                  <td>First Name</td>
                  <td><?php echo $user['First_Name'] ?></td>
                </tr>
                <tr>
                  <td>Last Name</td>
                  <td><?php echo $user['Last_Name'] ?></td>
                </tr>
                <tr>
                  <td>Email</td>
                  <td><?php echo $user['User_Name'] ?></td>
                </tr>
                <tr>
                  <td>ID Number</td>
                  <td><?php echo $user['ID_Number'] ?></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?php echo $user['Address'] ?></td>
                </tr>
                <tr>
                  <td>Telephone Number</td>
                  <td><?php echo $user['Telephone_Number'] ?></td>
                </tr>
                <tr>
                  <td>City</td>
                  <td><?php echo $user['City'] ?></td>
                </tr>
                <tr>
                  <td>DOB</td>
                  <td><?php echo $user['DOB'] ?></td>
                </tr>
                <tr>
                  <td>Last Login</td>
                  <td><?php echo $user['Last_Login'] ?></td>
                </tr>
       <?php } ?>
              </tbody>
            </table>
    </div>

<?php require_once('footer.php'); ?>