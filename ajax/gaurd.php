<?php

$dbHost = 'localhost';
$dbUsername = 'expressg_falcon';
$dbPassword = '&8ck$f3!;[-]';
$dbName = 'expressg_falcon';

// Create connection
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName);
$mysqli->query("SET NAMES 'utf8'");
$mysqli->query('SET CHARACTER SET utf8');

 $role = $_POST['role'];

  $company_result = $mysqli->query("SELECT * FROM users WHERE role_id = '$role'");
     
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
