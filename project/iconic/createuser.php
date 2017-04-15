<?php
session_start();

if(isset($_POST["submit"]))
{
	extract($_POST);
$mysqli=new mysqli('localhost','root','','iconic');
$con = mysqli_connect("localhost","root","","iconic");

if (mysqli_connect_errno())

{

echo "MySQLi Connection was not established: " . mysqli_connect_error();

}

$sel_user = "SELECT * FROM `cruser` WHERE username='$uname' ";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user==1)
{
$message = "User already Created";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('createuser.php');
</script>";
}

$query = "INSERT INTO `cruser` VALUES ('$pcustomer','$cname','$product','$name','$mail','$email','$type','$uname','$pwd')";
$insert_row = $mysqli->query($query);
		if($insert_row)
		{
		 $message = "Created Successfully";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('createuser.php');
</script>";
		}
		else
		{
    		die('Error : ('. $mysqli->errno .') '. $mysqli->error);
		}
	

}
?>


<!DOCTYPE html>
<html lang='en'>
	<head>
	    <meta charset="UTF-8" /> 

		<title>Create User</title>
		<link rel="stylesheet" type="text/css" href="iconicstyle.css">
	</head>
	<body>
		<div id="wrapper">
			<div class="pro-log">
					<p><a href="logout.php" >Logout</a></p>
			</div>
			<div class="head-container">
				<img class="logo" src="logo.png" alt="Iconic Logo">
				<header class="title">
						<b><span style="color:#E56717;">Iconic</span> Customer Support</b>
				</header>
			</div>
 			<div class="body-container">
				<ul>
						<li><a href="home.php">Home</a></li>					
						<li><a href="ticketlog.php">Ticket Log</a></li>
						<li style="float:left padding:10px;""><a class="active" href="createuser.php">Create User</a></li>
						<li><a href="report.php">Report</a></li>
						
				</ul>	
				<!-- <h4 style="font-family:arial;font-size:10x;"><i>Welcome, User</i>(customised after php code attachment)</h4> -->
				<form id="cform" method="post">
					<table class="entry">
						<tr class="entry">
							<td class="entry">
								Principle Customer:
							</td>
							<td class="entry">
								<select class="entry" name="pcustomer">
									<option value="siemens">Siemens</option>
									<option value="xyz">XYZ</option>
									<option value="abc">ABC</option>
								</select>
							</td>	
						</tr>
						<tr class="entry">
							<td class="entry">
								Company Name :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="cname" placeholder="Enter Company Name Here" required></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Product Name :
							</td>
							<td class="entry">
								<select class="entry" name="product">
									<option value="Engineering">Engineering</option>
									<option value="Estimation">Estimation</option>
								</select>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Name :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="name" placeholder="Enter Name Here" required></input>
							</td>
						</tr>	
						<tr class="entry">
							<td class="entry">
								Email :
							</td>
							<td class="entry">
								<input class="entry" type="Email" name="mail" placeholder="Enter Email Here" required></input>
							</td>
							<td class="entry">
								<input style="width: 90%" class="entry" type="Email" name="email" placeholder="Enter Email Here (Optional)"></input>
							</td>
						</tr>						<tr class="entry">
							<td class="entry">
								Type :
							</td>
							<td class="entry">
								<p><input type="radio" name="type" value="Customer" required><span style="padding-right:2%">Customer</span><input type="radio" name="type" value="Franchise" required><span style="padding-right:2%">Franchise</span><input type="radio" name="type" value="Admin" required>Admin</p>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								User Name :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="uname" placeholder="Enter User Name Here" required></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Password :
							</td>
							<td class="entry">
								<input class="entry" type="password" name="pwd" placeholder="Enter Password Here" required></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
							</td>
							<td class="entry">
								<button onclick="document.getElementById('cform').reset(); document.getElementById('cform').value = null; return false;">Reset</button>
								<button name="submit" type="submit">Submit</button>
							</td>
						</tr>
					</table>
					</form>
			</div> 
		</div>
	</body>
</html>