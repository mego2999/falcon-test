<?php
ob_start();
session_start();
require('../test/db.php');
require('../test/menus/navbar.php'); 


if($_SESSION['loggedin'] != true)
{
    header("Location: https://test.rocketsweb.net/");
}


      $username = $_SESSION['username'];
      $password = $_SESSION['password'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
			   if(isset($_POST['changenow'])){
			 
   $oldpassword = MD5($_POST['oldpass']);
   $newpassword = MD5($_POST['newpass']);
   $confirmpassword = MD5($_POST['newpassConfirmation']);
   
   
   if($_POST['newpass'] === $_POST['newpassConfirmation']){
           if(strlen($_POST['newpass']) >= 6){
     $result = $mysqli->query("SELECT * FROM admin WHERE username = '".$username."'");
			 	 if ( $result->num_rows > 0 ){
			 	     $query = "UPDATE admin SET password = '".$newpassword."' WHERE password = '".$oldpassword."'";
			 	     $update = $mysqli->query($query);
			 	     if($update)
			 	     {
   echo '<center>
          <div>
        <p style="color:white;background-color:green"><strong>Password Updated Successfully!</strong></p>
          </div>
        </center>';
			 	 }else{
			 	     echo '<center>
          <div>
        <p style="color:white;background-color:green"><strong>Query could not be executed</strong></p>
          </div>
        </center>';
			 	 }
}else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green"><strong>We do not have any user with this password</strong></p>
          </div>
        </center>';
			      
			   }
       }else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green"><strong>Password can not be less than 6 characters</strong></p>
          </div>
        </center>';
			      
			   }		
			   }else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>Same password please</strong></p>
          </div>
        </center>';
			      
			   }		
			   
   
			   }else{
			       	         echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>something went wrong</strong></p>
          </div>
        </center>';
			   }
}


?>

<!--End Add user -->



<body>
 <form autocomplete="off" action="" method="POST"
 style="background-color:#edf2ef;border-radius:25px;box-shadow: 5px 10px 18px #888888;margin-left:450px;margin-top:50px;margin-right:450px;padding:50px">
     
     <div class="form-group">
    <input type="password" class="form-control" name="oldpass" placeholder="Old Password .." autocomplete="false" required>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="newpass" placeholder="New Password .." autocomplete="false" required>
    <small>(6 Character Min)</small>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" name="newpassConfirmation" placeholder="Confirm New Password .." autocomplete="false" required>
  </div>
  <button type="submit" class="btn btn-primary" name="changenow">Change Password</button>
  
</form>

</body>


