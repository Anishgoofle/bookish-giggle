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
						<li style="float:left padding:10px;"><a class="active" href="home.php">Home</a></li>					
						<li><a href="newticket.php">New Ticket</a></li>
						<li><a href="log.php">Ticket Log</a></li>
						<li><a href="report.php">Report</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
				</ul>	
				</div>
				</div>
				</body>
				 <?php

					session_start();
					if(isset($_SESSION['username']))
					{
						$welcome=$_SESSION['username'];
						date_default_timezone_set('Asia/Kolkata');
						$date= date("j F, Y");
						$time= date("g:i a");
						header( "refresh:5; url=newticket.php" );
					}
					?>
					<h3>Welcome <?php echo $welcome ;?></h3>
					<h4>Date: <?php echo $date ;?> <br />Time: <?php echo $time ;?></h4>

				</html>