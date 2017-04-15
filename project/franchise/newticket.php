<?php
session_start();
if(isset($_SESSION['username']))
{
$user_name=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang='en'>
	<head>
	    <meta charset="UTF-8" /> 
	    <title>New Ticket</title>
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
						<li style="float:left padding:10px;"><a class="active" href="newticket.php">New Ticket</a></li>
						<li><a href="log.php">Ticket Log</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="report.php">Report</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
				</ul>	
				<!-- <h4 style="font-family:arial;font-size:10x;"><i>Welcome, User</i>(customised after php code attachment)</h4> -->
								<form action="ticket.php" id="nform" method="post" enctype="multipart/form-data" runat="server">

					<table class="entry">
					<tr class="entry">
							<td class="entry">
								Username :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="uname" value="<?php echo $user_name ;?>"></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Product Name :
							</td>
							<td class="entry">
								<select class="entry" name="product">
									<option value="engineering"> Engineering Solution</option>
									<option value="estimation"> Estimation Solution</option>
								</select>
							</td>	
						</tr>
						<tr class="entry">
							<td class="entry">
								Priority :
							</td>
							<td class="entry">
								<select class="entry" name="priority">
									<option value="High"> High</option>
									<option value="Medium"> Medium</option>
									<option value="Low"> Low</option>
								</select>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Subject :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="subject" required placeholder=" Enter Subject Here"></input>
							</td>
						</tr>
						<tr class="entry" style="height:100px">
							<td class="entry">
								Message :
							</td>
							<td class="entry">
								<textarea class="entry" rows="4" cols="50" name="message" required placeholder="Enter Message Here"></textarea>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Remark :
							</td>
							<td class="entry">
								<input class="entry" type="text" name="remark" required placeholder=" Enter Remark Here"></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
								Attach File :
							</td>
							<td class="entry">
								<input class="entry" type="File" name="fileToUpload" ></input>
							</td>
						</tr>
						<tr class="entry">
							<td class="entry">
							</td>
							<td class="entry">
							
								<button name="submit" type="submit">Submit</button>

								<button onclick="document.getElementById('nform').reset(); document.getElementById('nform').value = null; return false;">Reset</button>
							</td>
						</tr>
					</table>
					
					</form>
			</div> 
		</div>
	</body>
</html>