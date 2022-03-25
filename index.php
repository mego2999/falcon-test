<?php
ob_start();
session_start();
require('../test/db.php');

if($_SESSION['loggedin'] == true)
{
    header("Location: https://test.rocketsweb.net/welcome.php");
}


 if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
			   if(isset($_POST['signNow'])){
			   
   $username = $mysqli->escape_string($_POST['username']);
   $password = MD5($_POST['password']);
   
   
   
     $result = $mysqli->query("SELECT * FROM admin WHERE username = '".$username."'");
			 	 if ( $result->num_rows > 0 ){
             $user = $result->fetch_assoc();
             
                 if ($password === $user['password'])
                 {
                 $_SESSION['username'] = $user['username'];
                 $_SESSION['password'] = $user['password'];
                 $_SESSION['loggedin'] = true;
                 echo "success!";
                 header("Location: https://test.rocketsweb.net/welcome.php");
                 
             }else{
                 echo "<center>password incorrect!</center>";
             }
}else {
		
			 	        	    echo '<center>
          <div>
        <p><strong>Sorry! User Does not exist</strong></p>
          </div>
        </center>';
			 	    }
			 	    
			 	}
							
			   
   
			   }

?>


<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Technical Test</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
  button{
      background-color:blue;
      color:white;
      font-size:20px;
      width:60%;
      padding:30px;
      border-radius:12px;
      font-weight:bold;
      cursor:pointer;
  }
  
  input{
      width:60%;
      border-radius:12px;
      padding:30px;
      font-size:20px;
      border:1px solid gray;
      box-shadow: 5px 10px 18px #888888;
  }
  </style>
  </head>




<body>
    <form action="" method="POST">
    <center>
        <br><br><br>
        <input type="text" name="username" placeholder="username .."><br><br>
        <input type="password" name="password" placeholder="password .."><br><br>
        <button type="submit" name="signNow">Sign IN</button>
        
    </center>
    </form>
</body>


</html>



