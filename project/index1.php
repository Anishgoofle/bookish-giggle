<?php

if(isset($_POST['login']))
{
$con = mysqli_connect("localhost","root","","iconic");

if (mysqli_connect_errno())
{
echo "MySQLi Connection was not established: " . mysqli_connect_error();
}
$myusername= mysqli_real_escape_string($con,$_POST['username']);
$mypassword=mysqli_real_escape_string($con,$_POST['password']);

$sel_user = "SELECT * FROM `cruser` WHERE username='$myusername' AND password='$mypassword' AND type='franchise'";
$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);
if($check_user==1)
{
		session_start();

	$_SESSION['username']= $myusername;
	$_SESSION['password']= $mypassword;

if (isset($_POST["remember"]))
	{
		setcookie("username",$_POST["username"], time() + (60*60*24));
		setcookie("password",$_POST["password"], time() + (60*60*24));
	}
	else
	{
		setcookie("username",$_POST["username"], 1);
		setcookie("password",$_POST["password"], 1);
	}
header("location:franchise/home.php");
	
}
else
 {
	$message = "Invalid User";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('index1.php');
</script>";
}

}

?>

<!DOCTYPE html>
<html>
        <head>
			<meta name="viewport" content="width=device-width, initial-scale=1.0">
			<title>User Login</title>
			<link rel="stylesheet" type="text/css" href="index.css">
     	</head>
     	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<body>
		<div class="container">
				<div class="head-container">
					<img class="logo" src="logo.png" alt="Iconic Logo">
					<header class="title">
						<b><span style="color:#E56717;">Iconic</span> Customer Support</b>
					</header>
			    </div>
				<div class="body-container" style="background-color:#FEFCFF">
					<ul>				
						<li><a href="index.php">Iconic</a></li>
						<li><a class="active" href="index1.php">Franchise</a></li>
						<li><a href="index2.php">Customer</a></li>					
				  </ul>
					<form action ="index1.php" method= "POST" class="login-form">
							<br>
							<h1 align="center">FRANCHISE LOGIN</h1>	
							<br><br>
							<input type="text" id="textbox" name ="username" placeholder="Enter Username" required value=<?php echo getUserFromCookie()?>>
							<br><br>
							<input type="password" name = "password" id="textbox" placeholder="Enter Password" required>
							<br><br>
							<p><input type="checkbox" name="remember" id="remember">Remember Me</p><br>
							<button name ="login" class="login">Login</button>
							<br><br>
							<a href="javascript:void(0);" id=key onclick="return func(0)">Need help?</a>
							<br><br><br>
				    </form>
			    </div>  
           </div>
       </body>
       <?php 
  function getUserFromCookie()
 {
	if(!isset($_COOKIE["username"])) 
		return "";
	else 
		return $_COOKIE["username"];
 }
 
?> 
       <script type="text/javascript">
function func(k){
    alert('Mail to Iconic team or Respective Company with the username for password issue!');
    window.location =('https://accounts.google.com/Login');
    return false;
} 
</script>
</html>