<div class="modal fade" id="login">
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
			<form action='login.php' method="POST">
				
					<h1> Login </h1>
					<input type="text" name="idnumber" placeholder="ID Number" required="required"/ > 
					<input type="password" name="password" placeholder="Password" required="required" />
					<input type="submit" name="sub" value="Login"/>
				
			</form> 			
		</div>
	</div>
</div>