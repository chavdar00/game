<?php
session_start();
include('db_connect.php');
echo "<h3>Hello, ".$_SESSION['email']."</h3>";
$email=$_SESSION['email'];
$query="SELECT * FROM `users` WHERE `email`='$email'";
$result=mysqli_query($conn,$query);
if (mysqli_num_rows($result)>0) {
	while ($row=mysqli_fetch_assoc($result)) {
		$_SESSION['total_games']=$row['total_games'];
		$_SESSION['won_games']=$row['won_games'];
		echo "Total games :".$row['total_games']."<br> Won games :". $row['won_games'];
	}
}
?>
<html>
<head>
<title>New game</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
<link rel="stylesheet" type="text/css" href="form_css.css">
</head>
<body>
	

<button onclick="location.href='hangman.php'" type="submit" class="btn btn-lg btn-primary btn-block signup-btn" name="submit">New game</button>
<button onclick="location.href='logout.php'" type="submit" class="btn btn-lg btn-primary btn-block signup-btn" name="submit">Log out</button>

</body>
</html>
