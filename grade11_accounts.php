<?php
session_start();
include 'config.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>VIEW BOOKS</title>
    <meta charset="utf-8">

   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
  <style type="text/css">
       .navbar {
  height: 66px;
}

.navbar-brand {

  line-height: 40px;
}

.navbar-toggle {
  /* (80px - button height 34px) / 2 = 23px */
  margin-top: 23px;
  padding: 9px 10px !important;
}

@media (min-width: 768px) {
  .navbar-nav > li > a {
    /* (80px - line-height of 27px) / 2 = 26.5px */
    padding-top: 26.5px;
    padding-bottom: 26.5px;
    line-height: 27px;
  }
}
    .hover:hover{
        background-color:#004a8d;
    }
  </style>
</head>
<body>
<nav class="navbar navbar-expand-lg" style="background-color: #004a8d; ">
  <a class="navbar-brand img-fluid" href="admin_home.php"><img src="uclogo.jpg" width="60" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accounts 
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item hover" href="grade11_accounts.php">Grade 11</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" href="grade12_accounts.php">Grade 12</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" data-toggle="modal" data-target="#addaccountModal">Add Account</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          View Reservations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item hover" href="admin_viewapprovereservation.php">Approved</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" href="admin_viewpendingreservation.php">Pending</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-white" href="bookadmin.php" id="navbarDropdown"  aria-haspopup="true" aria-expanded="false">
          View Books
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="get">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
       <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
       <p>&nbsp;</p>
    </form>
    <!-- user icon -->
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "{$_SESSION['fname']}"; ?>&nbsp;<i class='far fa-user-circle ' style='font-size:30px; color:white;'></i></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item hover" href="#">Profile</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item hover" href="logout.php">Log out</a>
    </div>
    </li>
    </ul>
     <!-- user icon closing -->
  </div>
</nav>    
</div>
    <br>
    </nav>    
</div>
<br>
<?php
        include 'config.php';
        if(isset($_GET['search']))
    {
        $search = mysqli_real_escape_string($db, $_GET['search']);
        $result = mysqli_query($db, "SELECT * FROM users WHERE idnumber LIKE '%".$search."%'");

    }
    else

        $result = mysqli_query($db, "SELECT * FROM users where grade = 11");
    ?>
    <center><h1 style="font-family: Century Gothic,Arial; color:maroon">Grade 11 Registered</h1></center>
    <form action='register.php' method="POST">
        <center>
        <div class="table">
          <table style="margin-top: 30px; font-size: 22px;border-spacing: 15px" width="100%"> 
            <tr style="color:salmon">
                <td align='center'>ID Number</td>
                <td align='center'>Password</td>
                <td align='center'>First Name</td>
                <td align='center'>Last Name</td>
                <td align='center'>Grade</td>
            </tr>
            <?php
                while($res = mysqli_fetch_array($result))
                {
                    echo "<tr>";
                    echo "<td align='center'>".$res['idnumber']."</td>";
                    echo "<td align='center'>".$res['password']."</td>";
                    echo "<td align='center'>".$res['fname']."</td>";
                    echo "<td align='center'>".$res['lname']."</td>";
                    echo "<td align='center'>".$res['grade']."</td>";
                    echo "<td align='center'><a href=\"edit.php?idnumber=$res[idnumber]\">Edit</a> | <a href=\"delete.php?idnumber=$res[idnumber]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                }
            ?>
        </table>        
    </center>
      </div>    
    </div>
  </div>
  <br>
   <div class="modal" id="addaccountModal">
        <div class="modal-dialog">
          <div class="modal-content">
   <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">REGISTER AN ACCOUNT</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <img src="uclogo.jpg" height="150px" width="300px">
                </center>
                <form action="admin_register.php" method="POST">
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="idnumber" name="idnumber"  placeholder="ID Number" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="fname" name="fname"  placeholder="First Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="lname" id="lname" placeholder="Last Name" required>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="email" class="form-control" id="email" name="email"  placeholder="Email" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="grade" id="grade" placeholder="Grade" required>
                    </div>
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="submit" class="btn btn-success">Submit</button>
            </div>
            </form> 
          </div>
        </div>
      </div>

</body>
</html>