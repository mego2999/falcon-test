<?php
session_start();


    session_unset();
    session_destroy();
    session_write_close();
  
?>


<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
  a{
      background-color:green;
      color:white;
      font-size:20px;
      width:100%;
      padding:30px;
      border-radius:12px;
      font-weight:bold;
      text-decoration:none;
      cursor:pointer;
  }
  </style>
  </head>




<body>
    <center>
        <h1>You signed out successfully!</h1><br><br>
        <a href="https://test.rocketsweb.net/">Main page</a>
    </center>
</body>


</html>



