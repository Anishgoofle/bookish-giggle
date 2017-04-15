<?php
session_start();

?>

<!DOCTYPE html>
<html lang='en'>
	<head>
	    <meta charset="UTF-8" /> 
	    <title>Home</title>
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
						<li><a href="createuser.php">Create User</a></li>
						<li style="float:left padding:10px;"><a class="active" href="report.php">Report</a></li>
						
				</ul>	
				</div>
				</div>
				</body>
				</html>