<?php 

require_once('header.php');

?>

    <table class="table table-borderless">
    
      <thead>
        <tr>
          <th class="w-25">Name</th>
          <th class="w-25">Email</th>
          <th class="w-25">Channeling_Costs</th>
          <th class="w-25">Add Payment</th>
          <th class="w-25"></th>
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
          <td><h6><small><?php echo $user['Email'] ?></small></h6></td>
          <td><h6><small><?php echo $user['doctor_channeling_costs'] ?></small></h6></td>
          <form action="db_add_channeling_costs.php?var1=<?= $user['Doctor_ID'] ?>" method="post">
          <td><input class="form-control form-control-sm" type="text" placeholder="Enter channeling costs" name="enter_payment"></td>
          <td><button type="submit" class="btn btn-primary" name="add_payment">Submit</button></td>
          </form>
        </tr>
        
        <?php } ?>
        
      </tbody>
      
    </table>

<?php require_once('footer.php'); ?>