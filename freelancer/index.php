<?php
session_start();
$message="";
if(count($_POST)>0) {
 include 'others/dbconn.php';
$email= $_POST['email'];
$password = $_POST['password'];
$sql ="SELECT * FROM freelancer WHERE email='$email' and BINARY password ='$password'";
$result = mysqli_query($conn, $sql);
$row  = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["user_id"]=$row['id'];
} else {
$message = "Invalid Username or Password!";
}
}

if(isset($_SESSION["user_id"])){
     header("Location:dashboard.php");
    
}
?>


<!DOCTYPE html>
<html>
    
<head>
	<title>My Awesome Login Page</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style_login.css">
</head>
<!--Coded with love by Mutiullah Samim-->
<body>
	<div class="container h-100">
		<div class="d-flex justify-content-center h-100">
			<div class="user_card">
				<div class="d-flex justify-content-center">
					<div class="brand_logo_container">
					<img src="img/logo.jpeg" width="130" height="130" alt="logo" /> 

					</div>
				</div>
				<div class="d-flex justify-content-center form_container">
		<form action="" method="post">
			<div class="input-group" style="border:0px;">
             <?php if ($message!='') { ?>
             <div class="alert alert-danger  alert-dismissible" role="alert"><?php echo $message;?></div>
             <?php } ?>
            </div>
					 
						<div class="input-group mb-3">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-user"></i></span>
							</div>
							 <input type="email" name="email"  class="form-control input_user" placeholder="Email" aria-describedby="basic-addon1" required>
						</div>
						<div class="input-group mb-2">
							<div class="input-group-append">
								<span class="input-group-text"><i class="fas fa-key"></i></span>
							</div>
							 <input type="password" name="password"  class="form-control input_pass" placeholder="Password" aria-describedby="basic-addon2" required>
						</div>
						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="customControlInline">
								<label class="custom-control-label" for="customControlInline" style="color:#fff">Remember me</label>
							</div>
						</div>
							<div class="d-flex justify-content-center mt-3 login_container">
				 	<input type="submit" name="submit" class="btn login_btn" value="Login">
				   </div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
