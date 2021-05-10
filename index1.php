<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
    .hover{
        color: white;
    }
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
</style>
<body>
<!-- <div style="width: fixed;text-align: center; height: 57px; margin:0; padding:0; overflow:hidden; background-color: #004a8d;"> <font size="10" class="name"  style="color: white;"><a href="index1.php"><img src="uclogo.jpg" height="68px" width="100px" style="float: left; padding-left: 20px;"></a> Book Section</font>
<a style="float: right; font-weight: bold; font-size: 30px; padding-top: 9px; text-decoration: none;" class="hover" href="#" data-toggle="modal" data-target="#myModal" title="LOGIN">Log-in</a>
<a style="float: right; font-size: 15px; color: white; font-family: modern,arial ;padding-right: 20px; padding-top: 20px;" href="#" data-toggle="modal" data-target="#registerModal">Create an Account</a>
</div> -->
        
        <nav class="navbar navbar-expand-lg" style="background-color: #004a8d; ">
          <a class="navbar-brand img-fluid" href="#"><img src="uclogo.jpg" width="60" height="50"></a>
                 <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                     <span class="navbar-toggler-icon"></span>
                </button>
<div class="navbar-collapse collapse justify-content-center">
    <ul class="navbar-nav navbar-center">
      <li class=" nav-item ">
           <h3> <a class="nav-link disabled text-white" href="#" style="font-weight: bold;">Book Section</a></h3>
      </li>
    </ul>
</div>
<span class="text-right">
            <a class="hover" href="#" data-toggle="modal" data-target="#registerModal">Create an Account</a>
    </span>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <span class="text-right">
        <h3>
            <a class="btn btn-outline-light my-2 my-sm-0" href="#" data-toggle="modal" data-target="#myModal" title="LOGIN">Log-in</a>
        </h3>
    </span>
</nav>

    <br>
    <div class="container">
     <div class="row">
    <?php 
    include('config.php');

    $query = mysqli_query($db,"SELECT * FROM grade1");

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
                      <button type="button" name="purchase" data-toggle="modal" data-target="#purchaseModal">Purchase</button>

                      <!-- onclick="return confirm('You are currently not logged in')" -->
                </div>
            </div>
        <?php
    }

     ?>
      </div>
    </div>
    <br><br>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">LOGIN</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <img src="uclogo.jpg" height="150px" width="300px">
                </center>
                <form action='login.php' method="POST">
                  <div class="form-group">
                    <label for="idnumber">ID Number</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" aria-describedby="emailHelp" placeholder="ID Number">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="sub" class="btn btn-success">Submit</button>
            </div>
            </form> 
          </div>
        </div>
      </div>

      <div class="modal" id="purchaseModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">PLEASE LOGIN TO PURCHASE</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <img src="uclogo.jpg" height="150px" width="300px">
                </center>
                <form action='login.php' method="POST">
                  <div class="form-group">
                    <label for="idnumber">ID Number</label>
                    <input type="text" class="form-control" id="idnumber" name="idnumber" aria-describedby="emailHelp" placeholder="ID Number">
                  </div>
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                  </div>
            </div>
            
            <!-- Modal footer -->
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              <button type="submit" name="sub" class="btn btn-success">Submit</button>
            </div>
            </form> 
          </div>
        </div>
      </div>

      <div class="modal" id="registerModal">
        <div class="modal-dialog">
          <div class="modal-content">
          
            <!-- Modal Header -->
            <div class="modal-header">
              <h4 class="modal-title">REGISTER</h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <div class="modal-body">
                <center>
                    <img src="uclogo.jpg" height="150px" width="300px">
                </center>
                <form action='admin_register.php' method="POST">
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