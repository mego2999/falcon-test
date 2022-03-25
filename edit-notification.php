<?php
ob_start();
session_start();
require('../test/db.php');
require('../test/menus/navbar.php'); 


if($_SESSION['loggedin'] != true)
{
    header("Location: https://test.rocketsweb.net/");
}


$uid = $_GET['uid'];

define($firstname,"");
define($username,"");
define($lastname,"");
define($mCompany,"");
define($email,"");
define($mEmail,"");
define($cardID,"");
define($phone,"");
define($cell,"");
define($address,"");
define($role,"");
define($image,"https://test.rocketsweb.net/images/empty.webp");
define($lastlogin,"");

if($uid != NULL)
{
    $result = $mysqli->query("SELECT * FROM users WHERE id = '$uid'");
    
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) { 
              {
                   $firstname = $row["firstname"];
                   $lastname = $row["lastname"];
                   $username = $row["username"];
                   $mCompany = $row["companymanagement"];
                   $email = $row["email"];
                   $mEmail = $row["email"];
                   $cardID = $row["id"];
                   $phone = $row["phone"];
                   $cell = $row["cell"];
                   $address = $row["address"];
                   $role = $row["role"];
                   $image = $row["image"];
                   $lastlogin = "2014-10-22 14:26:15";
        
                }
        
            }
        }
        
       
}


/********** UPDATE NOTIFICATION **********/


			   if(isset($_POST['updateme'])){
			       
			 
   foreach($_POST as $key => $val)
{
    
      
        $criteria = explode("_", $key);
        $index = $criteria[1];
       
        $never = $_POST["status1_".$index] != NULL ? $_POST["status1_".$index] : "0";
        $onlyUrgent = $_POST["status2_".$index] != NULL ? $_POST["status2_".$index] : "0";
        $anytime = $_POST["status3_".$index] != NULL ? $_POST["status3_".$index] : "0";
        $issueType = $_POST["issue_".$index];
        $theId = $_POST["theId"];
        //echo json_encode($onlyUrgent);
        
     $result1 = $mysqli->query("DELETE FROM notification WHERE user_id='.$theId.'");
        
     $result2 = $mysqli->query("INSERT INTO notification (user_id, issueType, never, only_urgent, anytime) VALUES ('".$theId."','".$issueType."','".$never."','".$onlyUrgent."','".$anytime."')");
     
       $result3 = $mysqli->query("DELETE c1 FROM notification c1
INNER JOIN notification c2 
WHERE c1.id > c2.id AND c1.issueType = c2.issueType AND c1.user_id = c2.user_id;");
   
}


if($result1)
{
    if($result2)
     {
           if($result3)
{
            echo '<center>
          <div>
        <p style="color:black;"><strong>Done! successfully</strong></p>
          </div>
        </center>';
     }else{
            echo '<center>
          <div>
        <p style="color:black;"><strong>Error occured</strong></p>
          </div>
        </center>';
     }
     
}else{
            echo '<center>
          <div>
        <p style="color:black;"><strong>Can not update data</strong></p>
          </div>
        </center>';
     }
  }else{
            echo '<center>
          <div>
        <p style="color:black;"><strong>Can not update data</strong></p>
          </div>
        </center>';
     }
			   }


/********** UPDATE NOTIFICATION **********/
?>





<body>
 <form autocomplete="off" action="" method="POST" enctype="multipart/form-data" data-ajax="false" class="mobile"
 style="background-color:#edf2ef;border-radius:25px;box-shadow: 5px 10px 18px #888888;padding:50px">
     
     <div class="row">
         <div class="col-md-12 float-left"">
               <select class="form-control" name="selectedUser">
                <option selected="false">Choose User</option>
                 <?php 
                   $result = $mysqli->query("SELECT * FROM users");
                 ?>
                    <?php while($theUser = $result->fetch_assoc()) { ?>
                  <option value="<?php echo $theUser['id']; ?>"> <?php echo $theUser['firstname']." ".$theUser['lastname']." - ".$theUser['username']; ?></option>
                    <?php } ?>
                </select>
         </div>
         
     </div>
     <hr>
  <div class="row">
      
      <div class="col-md-8">
          <div style="height: 500px; overflow: auto;">
          <table class="table" name="myList">
              <thead>
                <tr>
                  <th scope="col">Issue Type (All Properties)</th>
                  <th scope="col">Never</th>
                  <th scope="col">Only Urgent</th>
                  <th scope="col">Anytime</th>
                </tr>
              </thead>
              
              <tbody>
              </tbody>
            </table>
            </div>
      </div>
            <div class="col-md-4">
                
          <div class="form-group">
            <h6 class="text-center" style="color:#262322;background-color:#ede7e1;font-weight:bold;padding:15px">Alert Quick Select</h6>
          </div><br>
          
          <div class="form-group">
    <h6 class="text-center">Security Issues (ALL)</h6>
    <form action="/action_page.php">
      <input type="checkbox" class="text-center" id="vehicle1" name="vehicle1" value="Bike">
      <label for="vehicle1" class="text-center"> ONLY Urgent (0 / 99)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle2" name="vehicle2" value="Car">
      <label for="vehicle2" class="text-center"> Level 1 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle3" name="vehicle3" value="Boat">
      <label for="vehicle3" class="text-center"> Level 2 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle4" name="vehicle3" value="Boat">
      <label for="vehicle4" class="text-center"> Level 3 (0 / 55)</label><br>
      
    </form>
  </div><br>
          
          <div class="form-group">
    <h6 class="text-center">Security Issues (ALL)</h6>
    <form action="/action_page.php">
      <input type="checkbox" class="text-center" id="vehicle1" name="vehicle1" value="Bike">
      <label for="vehicle1" class="text-center"> ONLY Urgent (0 / 99)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle2" name="vehicle2" value="Car">
      <label for="vehicle2" class="text-center"> Level 1 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle3" name="vehicle3" value="Boat">
      <label for="vehicle3" class="text-center"> Level 2 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle4" name="vehicle3" value="Boat">
      <label for="vehicle4" class="text-center"> Level 3 (0 / 55)</label><br>
      
    </form>
  </div><br>
          
          <div class="form-group">
    <h6 class="text-center">Security Issues (ALL)</h6>
    <form action="/action_page.php">
      <input type="checkbox" class="text-center" id="vehicle1" name="vehicle1" value="Bike">
      <label for="vehicle1" class="text-center"> ONLY Urgent (0 / 99)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle2" name="vehicle2" value="Car">
      <label for="vehicle2" class="text-center"> Level 1 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle3" name="vehicle3" value="Boat">
      <label for="vehicle3" class="text-center"> Level 2 (0 / 22)</label><br>
      
      <input type="checkbox" class="text-center" id="vehicle4" name="vehicle3" value="Boat">
      <label for="vehicle4" class="text-center"> Level 3 (0 / 55)</label><br>
      
    </form>
  </div>
  
          
      </div>
          <div class="form-group">
     <button type="submit" class="btn btn-danger" name="updateme">Save Notificaion</button>
    </div>
  
  </div>

</form>

 


</body>



<!-- Selected User Filtration-->

<script>

    jQuery('select[name="selectedUser"]').on('change', function () {
        var uid = jQuery(this).val();
        $.ajax({
                url: "ajax/notification.php",
                type: "POST",
                data: {
                        'uid': uid,
					},
                cache: false,
					success: function(data) {
					   $('table[name="myList"] tbody').remove();
                       $('table[name="myList"]').append(data);
					},
					error: function(xhr, status, error) {
						console.error(xhr);
					}
				});
    });
    
</script>

<!-- Selected User Filtration-->




