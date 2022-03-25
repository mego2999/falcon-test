<?php

$dbHost = 'localhost';
$dbUsername = 'expressg_falcon';
$dbPassword = '&8ck$f3!;[-]';
$dbName = 'expressg_falcon';

// Create connection
$mysqli = new mysqli($dbHost, $dbUsername, $dbPassword,$dbName);
$mysqli->query("SET NAMES 'utf8'");
$mysqli->query('SET CHARACTER SET utf8');

    $uid = $_POST['uid'];

  $company_result = $mysqli->query("SELECT users.*, notification.*
FROM users
INNER JOIN notification
ON users.id=notification.user_id AND users.id=$uid;");
     
  if ($company_result->num_rows > 0) {
     $index = 0;
  while ($row = $company_result->fetch_assoc()) { 
      {
            if($row["never"] == "1"){
                $output = '
                <tbody>
                    <tr>
                    <td>
                         '.$row["issueType"].'
                    </td>
                    <td>
                        <input type="checkbox" name="status1_'.$index.'" value="1" checked>
                        <input type="hidden" name="issue_'.$index.'" value="'.$row["issueType"].'">
                        <input type="hidden" name="theId" value="'.$row["user_id"].'">
                    </td>
                    <td>
                        <input type="checkbox" name="status2_'.$index.'" value="0">
                    </td>
                    <td>
                        <input type="checkbox" name="status3_'.$index.'" value="0">
                    </td>
                     
                      
                    </tr>
                </tbody>
                ';
            }else if($row["only_urgent"] == "1"){
                 $output = '
                <tbody>
                    <tr>
                    <td>
                         '.$row["issueType"].'
                    </td>
                    <td>
                        <input type="checkbox" name="status1_'.$index.'" value="0">
                        <input type="hidden" name="issue_'.$index.'" value="'.$row["issueType"].'">
                        <input type="hidden" name="theId" value="'.$row["user_id"].'">
                    </td>
                    <td>
                        <input type="checkbox" name="status2_'.$index.'" value="1" checked>
                    </td>
                    <td>
                        <input type="checkbox" name="status3_'.$index.'" value="0">
                    </td>
                     
                      
                    </tr>
                </tbody>
                ';
            }else if($row["anytime"] == "1"){
                 $output = '
                <tbody>
                    <tr>
                    <td>
                         '.$row["issueType"].'
                    </td>
                    <td>
                         <input type="checkbox" name="status1_'.$index.'" value="0">
                         <input type="hidden" name="issue_'.$index.'" value="'.$row["issueType"].'">
                         <input type="hidden" name="theId" value="'.$row["user_id"].'">
                    </td>
                    <td>
                         <input type="checkbox" name="status2_'.$index.'" value="0">
                    </td>
                    <td>
                         <input type="checkbox" name="status3_'.$index.'" value="1" checked>
                    </td>
                     
                      
                    </tr>
                </tbody>
                ';
                
            }
            $index++;
            echo $output;
        }

    }
} else {
    echo 'Data Not Found';
}
 

 

?>
