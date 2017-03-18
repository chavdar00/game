<?php
include('db_connect.php');
?>
<html>
<head>
  <title>Sign up</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="form_css.css">
</head>
<body>

  <div class="container" id="wrap">
    <div class="row">
      <div class="col-md-8 col-md-offset-3">
        <form action="signup.php" method="post" accept-charset="utf-8" class="form" role="form">   <legend>Sign Up</legend>

          <input type="email" name="email" value="" class="form-control input-lg" placeholder="Your Email"  />
          <input type="password" name="password" value="" class="form-control input-lg" placeholder="Password"  />
          <input type="password" name="confirm_password" value="" class="form-control input-lg" placeholder="Confirm Password"  />                    
          <label>Birth Date</label>                    
          <div class="row">
            <div class="col-xs-8 col-md-4">
              <div class="mi">            
                <input type="date" name="date">
              </div>
            </div>

          </div>
          <label>Gender : </label>                    
          <label class="radio-inline">
            <input type="radio" name="gender" value="M" id="male"/>Male
          </label>
          <label class="radio-inline">
            <input type="radio" name="gender" value="F" id="female" />Female
          </label>
          <div class="bot">
            <div class="col-md-8 col-md-offset-3">
              <button class="btn btn-lg btn-primary btn-block signup-btn" type="submit" name="submit">
                Create my account</button>
                <button onclick="location.href='login.php'" type="button" class="btn btn-lg btn-primary btn-block signup-btn" >Log in</button>
              </div>
            </div>
          </form>  

          <?php



          if(isset($_POST['submit'])){

            $email = $_POST['email'];
            $password=$_POST['password'];
            $confirm_password=$_POST['confirm_password'];
            $birthdate=$_POST['date'];
            $gender=$_POST['gender'];
            if (empty($email)|| empty($password)||empty($confirm_password)||empty($birthdate)||empty($gender)) {
              if (empty($email)) {
                echo "<font color='red'>Email field is empty.</font><br/>";
              }
              if (empty($password)) {
               echo "<font color='red'>Password field is empty.</font><br/>";
             }
             if (empty($confirm_password)) {
              echo "<font color='red'>Confirm password field is empty.</font><br/>";
            }
            if (empty($birthdate)) {
              echo "<font color='red'>Birth date  field is empty.</font><br/>";
            }
            if (empty($gender)) {
              echo "<font color='red'>Gender field is empty.</font><br/>";
            }

          }
          else
          {
            if ($password==$confirm_password) {

              $select_query = "SELECT * FROM `users` WHERE `email`='$email'";
              $result=mysqli_query($conn, $select_query);
              if (mysqli_num_rows($result)>0) {
                echo "<font color='red'>This email is already used.</font><br/>";
              }else{
                $update_query = "INSERT INTO `users`(`email`, `password`, `birthdate`, `gender`) VALUES ('$email','$password','$birthdate','$gender')";
                $result = mysqli_query($conn, $update_query);
                if ($result) {
                  echo "Success!";
                  header('Location: login.php');
                } else {
                  echo "Error: " . $update_query . " - " . mysqli_error($conn);

                }
              }
            }
            else echo "Confirm password field is different than password field";
          }
        }
        ?>

      </div>
    </div>            
  </div>
</div>
</body>
</html>