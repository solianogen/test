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
        <a class="nav-link dropdown-toggle text-white" href="#"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Books
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item hover" href="bookadmin.php"  >View Books</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item hover" href="multiple.php"  >Add Multiple Books</a>
        </div>
      </li>
    </ul>
    <!-- user icon -->
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo "{$_SESSION['fname']}"; ?>&nbsp;<i class='far fa-user-circle ' style='font-size:30px; color:white;'></i></a>
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
<div class="form" >
        <div class="dialog">
          <div class="content">
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <img src="uclogo.jpg" height="150px" width="300px">
                </center>
                <form method="POST" action="load_book.php" enctype="multipart/form-data">
                  <div class="col-sm-6" >
                        <input type="file"  name="image">
                    </div>
                    <br>
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="grade" name="grade"  placeholder="Book Grade"  required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="bookname" id="bookname" placeholder="Book Name" required>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="text" class="form-control" id="author" name="author"  placeholder="Author's Name" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required>
                    </div>
                  </div>
                  <br>
                  <div class="form-row">
                    <div class="col-sm-6">
                        <input type="number" class="form-control" id="quantity" name="quantity"  placeholder="Quantity" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="status" id="status" placeholder="Status" required>
                    </div>
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <input type="submit" name="load" value="Load" class="btn btn-success"></input>
            </div>
            </form> 
          </div>
        </div>
      </div>
      <!-- view loaded books -->
      
        <div class="container">
     <div class="row">

    <?php 
    /*
    $viewload = mysqli_query($db,"SELECT * FROM load_table ORDER BY grade ASC");

    while($res1 = mysqli_fetch_array($viewload))
    {
        ?>
            <div class="col-md-3" style="margin-top:5px; width:360px;">  
              <form>
                <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:450px;" align="center">
                      <img src="Images/<?php echo $res1["book_image"]; ?>"  width="200" height="200" class="img-responsive" /><br />
                      <h5 class="text-info" ><?php echo $res1["book_name"]; ?>"</h5>
                      <h5 class="text-info">Author : <?php echo $res1["author"]; ?></h5>
                      <h5 class="text-info">Grade : <?php echo $res1["grade"]; ?></h5>
                      <h5 class="text-danger">₱ <?php echo $res1["price"]; ?></h5>
                      <h5>Stocks : <?php echo $res1["quantity"]; ?></h5>
                      <h5>Status : <?php echo $res1["status"]; ?></h5>
                     <!--  onclick="return confirm('You are currently not logged in')" -->
                </div>
                </form>
            </div>
        <?php
    }
    */
     ?>
     
      </div>
    </div>
</body>
</html>