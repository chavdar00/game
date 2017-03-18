<?php 
session_start();
include('db_connect.php');
?>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="form_css.css">
</head>
<body>
	
	<div class="container" id="wrap">
		<div class="row">
			<div class="col-md-8 col-md-offset-3">
				<?php 
				if (isset($_POST['submit'])) {
					$email=$_POST['email'];
					$password=$_POST['password'];
					$select_query = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='$password'";
					$result = mysqli_query($conn, $select_query);
					if (mysqli_num_rows($result)>0) {
						$_SESSION['email']=$email;

						header('Location:login1.php');
					} else {
						echo "<font color='red'>Incorrect input</font>";
					}
				}
					?>
					<form action="login.php" method="post" accept-charset="utf-8" class="form" role="form">  
						<legend>Log in</legend>

						<input type="email" name="email" value="" class="form-control input-lg" placeholder="Your Email"  />
						<input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  />                                      
						<div class="row">

							<div class="col-md-8 col-md-offset-3">
								<button  type="submit" class="btn btn-lg btn-primary btn-block signup-btn" name="submit">Log in</button>
							</div>    

						</form>   




					</div>  
				</div>            
			</div>
		</div>          
	</body>
	</html>