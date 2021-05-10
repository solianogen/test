<div class="modal fade" id="register">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content" style="border-radius: 26px;">
			<style type="text/css">
				.box{
				text-align: center;  
				padding:40px;   
				background: #191919;
				border-radius: 24px;
			}
			.box h1{
				color:white;
				text-transform:uppercase;
				font-weight:500;
			}
			.box input[type = "text"], .box input[type = "password"]{
				border:0; 
				background:none; 
				display: block; 
				margin:20px auto; 
				text-align: center; 
				border: 2px solid #3498db; 
				padding: 14px 10px; 
				width: 200px; 
				outline: none; 
				color:white; 
				border-radius:24px; 
				transition: 0.25s;
			}
			.box input[type = "text"]:focus, .box input[type = "password"]:focus{
				width: 280px;
				border-color:#2ecc71;
			}
			.box input[type="submit"]{
				border:0; 
				background:none; 
				display: block; 
				margin:20px auto; 
				text-align: center; 
				border: 2px solid #2ecc71; 
				padding: 14px 40px;
				outline: none; 
				color:white; 
				border-radius:24px; 
				transition: 0.25s;
				cursor: pointer;
			}
			.box input[type="submit"]:hover{
				background: #2ecc71;
			}
			</style>
			<div class="box">
			 <center><h1 style="font-family: Century Gothic,Arial; color:blue">Registration Form</h1></center>
	<form action='register.php' method="POST">
		<center>
		<table width="0%">
			<tr>
				<td> <input type="text" name="idnumber" placeholder="ID Number" required="required"></th></td>
			</tr>
			<tr>
				<td> <input type="password" name="password" placeholder="Password" required="required"></th></td>
			</tr>
			<tr>
				<td> <input type="text" name="fname" placeholder="First Name" required="required"></th></td>
			</tr>
			<tr>
				<td> <input type="text" name="lname" placeholder="Last Name" required="required"></td>
			</tr>
			<tr>
				<td> <input type="text" name="email" placeholder="Email" required="required"></td>
			</tr>
			<tr>
				<td> <input type="text" name="grade" placeholder="Grade" required="required"></th></td>
			</tr>
			<tr>
				<td> <input type="submit" name="submit" value="Submit"></td>
			</tr>
		</table>
	</center>
	</form>
</div>
		</div>
	</div>
</div>