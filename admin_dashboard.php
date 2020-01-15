<?php 
require_once('header.php');
?>
<h1 class="font-weight-bold">Reception List</h1>
            	<table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th><h5><small>First Name</small></h5></th>
                      <th><h5><small>Last Name</small></h5></th>
                      <th><h5><small>Email Address</small></h5></th>
                      <th><h5><small>Id Number</small></h5></th>
                      <th><h5><small>Address</small></h5></th>
                      <th><h5><small>City</small></h5></th>
                      <th><h5><small>DOB</small></h5></th>
                      <th><h5><small>Telephone Number</small></h5></th>
                      <th><h5><small>Last Login</small></h5></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php
    
        //getting the list of users
        $query = "SELECT * FROM admin_db WHERE User_Delete=0 ORDER BY First_Name";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
            
        <tr>
            <td><h6><small><?php echo $user['First_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['User_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['ID_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Address'] ?></small></h6></td>
            <td><h6><small><?php echo $user['City'] ?></small></h6></td>
            <td><h6><small><?php echo $user['DOB'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Telephone_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_Login'] ?></small></h6></td>
        </tr>
        
        <?php } ?>
                    
                  </tbody>
                </table>
                
                <br>
                <hr class="bg-danger">
          <h1 class="font-weight-bold">Doctor List</h1>
       <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th><h5><small>First Name</small></h5></th>
                      <th><h5><small>Last Name</small></h5></th>
                      <th><h5><small>Email Address</small></h5></th>
                      <th><h5><small>Doctor Speciality</small></h5></th>
                      <th><h5><small>Id Number</small></h5></th>
                      <th><h5><small>Telephone Number</small></h5></th>
                      <th><h5><small>Last Login</small></h5></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php
    
        //getting the list of users
        $query = "SELECT * FROM doctor_db WHERE User_Delete=0 ORDER BY First_Name";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
            
        <tr>
            <td><h6><small>Dr.<?php echo $user['First_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Email'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Doctor_Speciality'] ?></small></h6></td>
            <td><h6><small><?php echo $user['ID_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Telephone_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_Login'] ?></small></h6></td>
        </tr>
        
        <?php } ?>
                    
                  </tbody>
                </table>
                
                <br>
                <hr class="bg-danger">
                
                <h1 class="font-weight-bold">Paction List</h1>
            	<table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th><h5><small>First Name</small></h5></th>
                      <th><h5><small>Last Name</small></h5></th>
                      <th><h5><small>Email Address</small></h5></th>
                      <th><h5><small>DOB</small></h5></th>
                      <th><h5><small>Telephone Number</small></h5></th>
                      <th><h5><small>Last Login</small></h5></th>
                    </tr>
                  </thead>
                  <tbody>
                  
                    <?php
    
        //getting the list of users
        $query = "SELECT * FROM paction_db WHERE User_Delete=0 ORDER BY First_Name";
        $users = mysqli_query($connection, $query);
        
            while ($user = mysqli_fetch_assoc($users)) {
            
            ?>
            
        <tr>
            <td><h6><small><?php echo $user['First_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['User_Name'] ?></small></h6></td>
            <td><h6><small><?php echo $user['DOB'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Telephone_Number'] ?></small></h6></td>
            <td><h6><small><?php echo $user['Last_Login'] ?></small></h6></td>
        </tr>
        
        <?php } ?>
                    
                  </tbody>
                </table>
<?php require_once('footer.php'); ?>