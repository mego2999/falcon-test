<html>
    <head>
        <meta charset="utf-8">
        <title>Tech-Test</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
            integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    </head>
    <style>
    
    .mobile{
        margin-top:50;
        margin-left:250px;
        margin-right:250px
    }
        @media only screen and (max-width: 600px) {
          .mobile{
            margin-top:50;
            margin-left:10px;
            margin-right:10px
    }
        }
    </style>
    
    <div class="mobile">
        
    <ul class="nav justify-content-center">
      <li class="nav-item">
        <a class="nav-link" href="#">Issues <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Properties</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Reporting</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Users
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="https://test.rocketsweb.net/add-user.php">Add New User</a>
          <a class="dropdown-item" href="https://test.rocketsweb.net/edit-user.php">Edit User</a>
          <a class="dropdown-item" href="https://test.rocketsweb.net/change-password.php">Change Password</a>
          <a class="dropdown-item" href="https://test.rocketsweb.net/edit-notification.php">Edit Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">System</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Management</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://test.rocketsweb.net/sign-out.php" style="color:red">Sign Out</a>
      </li>
    </ul>
    
    </div>
    </html>