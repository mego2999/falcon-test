<?php
ob_start();
session_start();
require('../test/db.php');
require('../test/menus/navbar.php'); 


if($_SESSION['loggedin'] != true)
{
    header("Location: https://test.rocketsweb.net/");
}

/***** Begin Add user *****/


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
			   if(isset($_POST['registernow'])){
			 
   $firstname = $mysqli->escape_string($_POST['firstname']);
   $lastname = $mysqli->escape_string($_POST['lastname']);
   $username = $mysqli->escape_string($_POST['username']);
   $mcompany = $mysqli->escape_string($_POST['mcompany']);
   $role = $mysqli->escape_string($_POST['role']);
   $email = $mysqli->escape_string($_POST['email']);
   $image = "https://test.rocketsweb.net/images/messi.jpeg";
   $password = MD5($_POST['password']);
   $confirmpassword = MD5($_POST['confirmpassword']);
   
   
   if($_POST['password'] === $_POST['confirmpassword']){
       if(strlen($username)<= 12){
           if(strlen($password)>= 6){
     $result = $mysqli->query("SELECT * FROM users WHERE email = '".$email."'");
			 	 if ( $result->num_rows > 0 ){
   echo '<center>
          <div>
        <p style="color:black;"><strong>Sorry! this email already registered</strong></p>
          </div>
        </center>';
}else {
		
	
 $result2 = $mysqli->query("INSERT INTO users (firstname, lastname, email, username, password, image, companymanagement, role) VALUES ('".$firstname."','".$lastname."','".$email."','".$username."','".$password."','".$image."','".$mcompany."','".$role."')");
			 	    if($result2){
			 	        	    echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>User Added Successfully</strong></p>
          </div>
        </center>';
			 	    }else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>Query did not executed correctly</strong></p>
          </div>
        </center>';
			      
			   }
			 	    
			 	}
       }else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>Password can not be less than 6 characters</strong></p>
          </div>
        </center>';
			      
			   }	
   }else{
			       
			         echo '<center>
          <div>
        <p style="color:white;background-color:green;"><strong>Username can not be more than 12 characters</strong></p>
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
    <input type="text" class="form-control" id="exampleInputFirstname" name="firstname" placeholder="First Name .." autocomplete="false" required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputLastname" name="lastname" placeholder="Last Name .." autocomplete="false" required>
  </div>
  <div class="form-group">
    <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" autocomplete="false" placeholder="Email .." required>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" id="exampleInputUsername" name="username" placeholder="Username .." autocomplete="false" required>
    <small>(12 Character Max)</small>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password .." autocomplete="false" required>
    <small>(6 Character Min)</small>
  </div>
  <div class="form-group">
    <input type="password" class="form-control" id="exampleInputPassword2" name="confirmpassword" placeholder="Password confirmation .." autocomplete="false" required>
  </div>
  <div class="form-group" style="display:none" id="managementCompanyGroup">
    <input type="text" class="form-control" id="managementCompany" name="mcompany" value="Management Company" placeholder="Management Company .." autocomplete="false" required>
  </div>
    <div class="form-group">
    <label for="role">User Role</label>
    <select class="form-control" id="role" name="role">
      <option selected="false" >Choose Permission</option>
      <option>Customer - Management Company User</option>
      <option>Customer - Maintenance Supervisor</option>
      <option>Employee - Guard</option>
      <option>Employee - Dispatcher</option>
      <option>Employee - Maintenance Worker</option>
      <option>Employee - Supervisor</option>
    </select>

  </div>
  <button type="submit" class="btn btn-primary" name="registernow">Add New User</button>
  
</form>

</body>



<script>
    
    
        jQuery('select[name="role"]').on('change', function () {
        var role = $(this).val();
       if ( role.indexOf('Customer') >= 0 ){
        $("#managementCompanyGroup").slideDown();
        } else {
            $("#managementCompanyGroup").slideUp();
        }
    });
    
    
</script>

