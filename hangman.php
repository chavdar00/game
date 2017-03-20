<?php
session_start();
include('db_connect.php');

?>
<html>
<head>
  <title>Game</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="form_css.css">


</head>
<body bgcolor="#ffffff" link="navy" vlink="navy" alink="navy">

  <?php
 include('words.php');

    echo "<form action='hangman.php' method='post'>";
  $alpha = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $additional_letters = " -.,;!?%&0123456789";
  $len_alpha = strlen($alpha);
  $total_games=$_SESSION['total_games'];
  $won_games=$_SESSION['won_games'];
  $email=$_SESSION['email'];
  if(isset($_GET["n"])) $n=$_GET["n"];
  if(isset($_GET["letters"])) $letters=$_GET["letters"];
  if(!isset($letters)) $letters="";

  if(isset($PHP_SELF)) $self=$PHP_SELF;
  else $self=$_SERVER["PHP_SELF"];

  $links="";

  $max=6;         
  $list = strtoupper($list);//converts a string to uppercase
  $words = explode("\n",$list);// breaks a string into an array
  srand ((double)microtime()*1000000);
  $all_letters=$letters.$additional_letters;
  $wrong = 0;



  if (!isset($n)) { $n = rand(1,count($words)) - 1; }
  $word_line="";
  $word = trim($words[$n]);//removes whitespace and other predefined characters from both sides of a string
  $done = 1;
  for ($x=0; $x < strlen($word); $x++)
  {
    if (strstr($all_letters, $word[$x]))
    {
      if ($word[$x]==" ") $word_line.="&nbsp; "; else $word_line.=$word[$x];
    } 
    else { $word_line.="_<font size=1>&nbsp;</font>"; $done = 0; }
  }

  if (!$done)
  {

    for ($c=0; $c<$len_alpha; $c++)
    {
      if (strstr($letters, $alpha[$c]))
      {
        if (strstr($words[$n], $alpha[$c])) {$links .= "\n<b>$alpha[$c]</b> "; }
        else { $links .= "\n<font color=\"red\">$alpha[$c] </font>"; $wrong++; }
      }
      else
        { $links .= "\n<a href=\"$self?letters=$alpha[$c]$letters&n=$n\">$alpha[$c]</a> "; }
    }
    $nwrong=$wrong; if ($nwrong>6) $nwrong=6;//displaing img
    echo "\n<p><br>\n<img src=\"img/hangman_$nwrong.gif\" align=\"middle\" border=0 width=100 height=100 alt=\"Wrong: $wrong out of $max\">\n";
    if ($wrong >= $max)
    {
      $n++;
      if ($n>(count($words)-1)) $n=0;
      echo "<br><br><h1><font size=5>\n$word_line</font></h1>\n";
      echo "<p><br><font color=\"red\"><h2>SORRY, YOU ARE HANGED!!!</h2></font><br><br>";
      if (strstr($word, " ")) $term="phrase"; else $term="word";
      echo "The $term was \"<b>$word</B>\"<br><br>\n";

     
 echo "<button location.href='hangman.php' type='submit' class='btn btn-lg btn-primary btn-block signup-btn'>Play againg</button>";//play again button
  echo "<input type='submit' class='btn btn-lg btn-primary btn-block signup-btn' style='text-decoration:none' name='submit' value='Go back'>\n\n";

  $total_games=$total_games+1;
  $_SESSION['total_games']=$total_games;
}
else
{
  echo "# Wrong Guesses Left: <b>".($max-$wrong)."</b><br>\n";
  echo "<h1><font size=5>\n$word_line</font></h1>\n";
  echo "<p><br>Choose a letter:<br><br>\n";
  echo "$links\n";
}
}
else
{
  $n++;	// get next word
  if ($n>(count($words)-1)) $n=0;
  $total_games=$total_games+1;
  $_SESSION['total_games']=$total_games;
  $won_games=$won_games+1;
  $_SESSION['won_games']=$won_games;

  echo "<br><br><h1><font size=5>\n$word_line</font></h1>\n";
  echo "<p><br><br><b>Congratulations!!!<h2>You win!!!</h2></b><br><br><br>\n";
  
  echo "<button location.href='hangman.php' type='submit' class='btn btn-lg btn-primary btn-block signup-btn'>Play againg</button>";//play again button
  echo "<input type='submit' class='btn btn-lg btn-primary btn-block signup-btn' style='text-decoration:none' name='submit' value='Go back'>\n\n";//back to login1.php

}
echo "</form>";
if (isset($_POST['submit'])) {
  $query="UPDATE `users` SET `total_games`='$total_games',`won_games`='$won_games' WHERE `email` = '$email'";
  $result=mysqli_query($conn,$query);
  header('Location:login1.php');

  echo $total_games;
  echo $won_games;
  
}


?>
</body>
<html>
