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
  <a class="navbar-brand img-fluid" href="home1.php"><img src="uclogo.jpg" width="60" height="50"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Grade
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item hover" href="grade11.php">Grade 11</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" href="grade12.php">Grade 12</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          My Reservations
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item hover" href="viewmyapprovereservation.php">Approved</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" href="viewmypendingreservation.php">Pending</a> 
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link text-white" href="cart.php" id="navbarDropdown">
          Cart
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
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "{$_SESSION['fname']} {$_SESSION['lname']}"; ?>&nbsp;<i class='far fa-user-circle ' style='font-size:30px; color:white;'></i></a>
      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> 
      <a class="dropdown-item hover" href="logout.php">Log out</a>
    </div>
    </li>
    </ul>
   <!-- user icon closing -->
  </div>
</nav>    
</div>
<br>
    <div class="container">
     <div class="row">
    <?php 
    include('config.php');

    $query = mysqli_query($db,"SELECT * FROM grade1 WHERE grade = 11 ORDER BY id ASC");

    while($res = mysqli_fetch_array($query))
    {
        ?>
            <div class="col-md-3" style="margin-top:5px; width:360px;">  
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:478px;" align="center">
                      <img src="Image/<?php echo $res["bookimage"]; ?>" width="200" height="200" class="img-responsive" /><br />
                      <h5 class="text-info"><?php echo $res["bookname"]; ?></h5>
                      <h5 class="text-info">Author : <?php echo $res["author"]; ?></h5>
                      <h5 class="text-info">Grade : <?php echo $res["grade"]; ?></h5>
                      <h5 class="text-danger">₱ <?php echo $res["price"]; ?></h5>
                      <h5>Stocks : <?php echo $res["quantity"]; ?></h5>
                      <h5>Status : <?php echo $res["status"]; ?></h5>
                      <a href="grade11.php?cart=<?php echo $res['id']; ?>" name="purchase" class="btn btn-success">Add to Cart</a>

                      <!-- onclick="return confirm('You are currently not logged in')" -->
                </div>
            </div>
        <?php
    }

     ?>
      </div>
    </div>
    <?php
      if(isset($_GET['cart']))
      {
          $cart = mysqli_real_escape_string($db, $_GET['cart']);
          $date = date('Y/m/d');
          /*
          mysqli_query($db, "INSERT INTO reservation (bookid,idnumber,purchaseqty,dates,dateofreceiveing,status) VALUES ('$cart','{$_SESSION['idnumber']}','1','$date','$date','Cart')");
          header("Location: home1.php");*/

          $result = mysqli_query($db, "SELECT * FROM reservation WHERE idnumber='{$_SESSION['idnumber']}' AND status='Cart' AND bookid='$cart'");

          if(mysqli_num_rows($result) == 0)
          {
              mysqli_query($db, "INSERT INTO reservation (bookid,idnumber,purchaseqty,dates,dateofreceiveing,status) VALUES ('$cart','{$_SESSION['idnumber']}','1','$date','$date','Cart')");
              header("Location: grade11.php");
              //echo "<script>alert('test1')</script>";
          }
          else
          {
            $data = mysqli_fetch_array($result);
            $purchaseid = $data['purchaseid'];
            $currentQTY = $data['purchaseqty'];
            $currentQTY += 1;
            mysqli_query($db, "UPDATE reservation SET purchaseqty='$currentQTY' WHERE purchaseid='$purchaseid'");

            //  echo "<script>alert('test2')</script>";
            header("Location: grade11.php");
          }
      }
    ?>
</body>
</html>