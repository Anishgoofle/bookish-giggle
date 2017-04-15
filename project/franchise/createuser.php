<?php
session_start();

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
						<li><a href="newticket.php">New Ticket</a></li>
						<li><a href="log.php">Ticket Log</a></li>
						<li style="float:left padding:10px;""><a class="active" href="createuser.php">Create User</a></li>
						<li><a href="report.php">Report</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
				</ul>	
				<!-- <h4 style="font-family:arial;font-size:10x;"><i>Welcome, User</i>(customised after php code attachment)</h4> -->
				<form id="cform" method="post">
					<table class="entry">
						<tr class="entry">
							<td class="entry">
								Company Name :
							</td>
							<td class="entry">
								<input class="entry" type="text" placeholder="Enter Company Name Here" required></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Product Name :
							</td>
							<td class="entry">
								<select class="entry" name="product">
									<option value="engineering">Engieering</option>
									<option value="estimation">Estimation</option>
								</select>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Name :
							</td>
							<td class="entry">
								<input class="entry" type="text" placeholder="Enter Name Here" required></input>
							</td>
						</tr>	
						<tr class="entry">
							<td class="entry">
								Email :
							</td>
							<td class="entry">
								<input class="entry" type="Email" placeholder="Enter Email Here" required></input>
							</td>
							<td class="entry">
								<input class="entry" type="Email" placeholder="Enter Email Here (Optional)"></input>
							</td>
						</tr>						
						<tr class="entry">
							<td class="entry">
							</td>
							<td class="entry">
								<button>Submit</button>
							</td>
						</tr>
					</table>
					</form>
			</div> 
		</div>
	</body>
</html>