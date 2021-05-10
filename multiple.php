
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
    .box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
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
          <a class="dropdown-item hover" href="addbook.php"  >Add Book</a>
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

  <div class="container">
   <br />
   <h3 align="center">CSV File Importing Multiple Books</h3>
   <br />
   <form id="upload_csv" method="post" enctype="multipart/form-data">
    <div class="col-md-3">
     <br />
     <label><h3>Select CSV File</h3></label>
    </div>  
    <div class="row">
                <div class="col-md-6">  
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                </div>  
                <div class="col-md-6">  
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                </div>  
                <div style="clear:both"></div>
    </div>
   </form>
   <br />
   <br />
   <div id="csv_file_data"></div>
   
  </div>
 </body>
</html>

<script>

$(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(data)
   {
    var html = '<table class="table table-striped table-bordered">';
    if(data.column)
    {
     html += '<tr>';
     for(var count = 0; count < data.column.length; count++)
     {
      html += '<th>'+data.column[count]+'</th>';
     }
     html += '</tr>';
    }

    if(data.row_data)
    {
     for(var count = 0; count < data.row_data.length; count++)
     {
      html += '<tr>';
      html += '<td class="student_name" contenteditable>'+data.row_data[count].student_name+'</td>';
      html += '<td class="student_phone" contenteditable>'+data.row_data[count].student_phone+'</td>';
      html += '<td class="author" contenteditable>'+data.row_data[count].author+'</td>';
      html += '<td class="price" contenteditable>'+data.row_data[count].price+'</td>';
      html += '<td class="quantity" contenteditable>'+data.row_data[count].quantity+'</td></tr>';
     }
    }
    html += '<table>';
    html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

    $('#csv_file_data').html(html);
    $('#upload_csv')[0].reset();
   }
  })
 });

 $(document).on('click', '#import_data', function(){
  var student_name = [];
  var student_phone = [];
  var author = [];
  var price = [];
  var quantity = [];
  $('.student_name').each(function(){
   student_name.push($(this).text());
  });
  $('.student_phone').each(function(){
   student_phone.push($(this).text());
  });
  $('.author').each(function(){
   author.push($(this).text());
  });
  $('.price').each(function(){
   price.push($(this).text());
  });
  $('.quantity').each(function(){
   quantity.push($(this).text());
  });
  $.ajax({
   url:"import.php",
   method:"post",
   data:{student_name:student_name, student_phone:student_phone, author:author, price:price, quantity:quantity},
   success:function(data)
   {
    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
   }
  })
 });
});

</script>