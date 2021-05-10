<?php
session_start();
include 'config.php';
if (isset($_POST['search']))
{
    $bookname = $_POST['search'];
    $result = mysqli_query($db,"SELECT * FROM grade1 WHERE quantity > 0");
    if(mysqli_num_rows($result)==0)
    {
        echo '<center><h4 style="font-family:Century Gothic, Arial; color:red">Record not found</h4></center>';
        //echo '<center><h4 style="font-family:Century Gothic, Arial;"><a href="grade1books.php">Refresh</a></h4></center>';
    }
}
 else
   {
        $result = mysqli_query($db,"SELECT * FROM grade1 WHERE quantity > 0");
        //echo '<center><h4 style="font-family:Century Gothic, Arial;"><a href="grade1books.php">Refresh</a></h4></center>';
   }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Pending Reservations</title>
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
    <form class="form-inline my-2 my-lg-0">
       <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
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
<center><h1 style="font-family: Century Gothic,Arial; color:maroon">Pending Reservations</h1></center>
<?php
    include 'config.php';
    /*session_start();*/
    $idnumber = $_SESSION['idnumber'];
    $fname = $_SESSION['fname'];
    $result = mysqli_query($db, "SELECT * FROM reservation INNER JOIN users ON reservation.idnumber = users.idnumber WHERE status = 'Pending'");
?>
<div class="table">
          <table style="margin-top: 30px; font-size: 22px;border-spacing: 15px" width="100%">
      <center>
      <tr>
        <td align="center" style="font-weight: bold;">Book Name</td>
        <td align="center" style="font-weight: bold;">Quantity</td>
        <td align="center" style="font-weight: bold;">Date</td>
        <td align="center" style="font-weight: bold;">Total Price</td>
        <td align="center" style="font-weight: bold;">Status</td> 
      </tr> 
      <?php
      while($res = mysqli_fetch_array($result))
      {
        echo "<tr>";
        echo "<td align='center'>".$res['bookid']."</td>";
        echo "<td align='center'>".$res['purchaseqty']."</td>";
        echo "<td align='center'>".$res['dates']."</td>";
        echo "<td align='center'>₱".$res['totalprice']."</td>";
        echo "<td align='center'>".$res['status']."</td>";
        echo "<td align='center'><a href=\"delete.php?idnumber=$res[idnumber]\" onClick=\"return confirm('Are you sure you want to delete?')\">Cancel</a></td>";
      }
      ?>
    </table>
</body>
</html>