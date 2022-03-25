<?php

$dbHost = 'localhost';
$dbUsername = 'expressg_falcon';
$dbPassword = '&8ck$f3!;[-]';
$dbName = 'expressg_falcon';

// Create connection
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName);
$mysqli->query("SET NAMES 'utf8'");
$mysqli->query('SET CHARACTER SET utf8');

    $co = $_POST['co'];
    $sign = $_POST['sign'];


  if($sign == 'customers'){
      $role5 = $_POST['role5'];
      $role6 = $_POST['role6'];
      $role7 = $_POST['role7'];
      $company_result = $mysqli->query("SELECT * FROM users WHERE companymanagement = '$co' AND ( role_id = '$role5' OR role_id = '$role6' OR role_id = '$role7' )");
  }elseif($sign == 'dispatchers'){
      $role3 = $_POST['role3'];
      $company_result = $mysqli->query("SELECT * FROM users WHERE companymanagement = '$co' AND role_id = '$role3'");  
  }elseif($sign == 'admins'){
      $role1 = $_POST['role1'];
      $role5 = $_POST['role5'];
      $role6 = $_POST['role6'];
      $role7 = $_POST['role7'];
      $company_result = $mysqli->query("SELECT * FROM users WHERE companymanagement = '$co' AND ( role_id = '$role5' OR role_id = '$role6' OR role_id = '$role7' OR role_id = '$role1' )");  
  }elseif($sign == 'gaurds'){
      $role4 = $_POST['role4'];
      $company_result = $mysqli->query("SELECT * FROM users WHERE companymanagement = '$co' AND role_id = '$role4'");
  }else{
      $company_result = $mysqli->query("SELECT * FROM users WHERE companymanagement = '$co'");
  }
     
  if ($company_result->num_rows > 0) {
  while ($row = $company_result->fetch_assoc()) { 
      {
            $array = array(
                'firstname' => $row["firstname"],
                'lastname' => $row["lastname"],
                'username' => $row["username"],
                );
                //echo json_encode($array);
                $output = '
                <a href="https://test.rocketsweb.net/edit-user.php?uid='. $row["id"].'">
                <li class="list-group-item">
                '.$row["firstname"].' '. $row["lastname"].' - '. $row["username"].'
                </li>
                </a>
                ';
                echo $output;
        }

    }
} else {
    echo 'Data Not Found';
}
 

 

?>
