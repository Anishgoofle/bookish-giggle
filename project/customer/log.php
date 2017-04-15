<?php
session_start();

$DBName = "iconic";
$hostname = "localhost";
$user_name = "root";
$pass_word = "";
$mysqli=new mysqli('localhost','root','','iconic');
$con = mysqli_connect($hostname,$user_name,$pass_word,$DBName); 
if (mysqli_connect_errno())

{

echo "MySQLi Connection was not established: " . mysqli_connect_error();

}
					
					 $order = "id";

					 if (isset($_POST['submit']))
					  {
						$order= $_POST['type'];  
					}



 ?>

<html>
	<head>

		<title>Ticket Information</title>
		<link rel="stylesheet" type="text/css" href="iconicstyle2.css"></link>

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
						<li style="float:left padding:10px;"><a class="active"  href="log.php">Ticket Log</a></li>
						<li><a href="report.php">Report</a></li>
						<li><a href="contactus.html">Contact Us</a></li>
				</ul>

				<h1 class="header">
					All Tickets
				</h1>

				<input type="checkbox" id="selectall" style="margin-left:0.85%;margin-top:1%">
				<button class="closetickets" name="close" onclick="close.php" >Close Tickets</button></input>

				<form action="" method="post" style="padding-left: 40%"> 
				<span class="logsort" style="padding-left:5%;font-weight:bold">Sort By : </span>
					
				<input type="radio" name="type" value="priority" required><span class="logsort">Priority</span>
				<input type="radio" name="type" value="status" required><span class="logsort">Status</span>
				<input type="radio" name="type" value="updated" required><span class="logsort">Last Updated On</span>
				<button type="submit" class="logsort" name="submit">Go</button>
					</form>

				<table class="log">
					<thead>
						<td class="loghead" style="width:2%">
						</td>
						<td class="loghead" style="width:27%">
							Ticket No
						</td>
						<td class="loghead" style="width:20%">
							Priority
						</td>
						<td class="loghead" style="width:20%">
							Status
						</td>
						<td class="loghead" style="width:31%">
							Last Updated On
						</td>
					</thead>

<?php
$sel_user = "SELECT * FROM `cnewticket` ORDER by `$order`";
$result = mysqli_query($con, $sel_user);
while($row=mysqli_fetch_array($result))
{
	$query="SELECT * FROM `reply` WHERE `from`='$row[id]'";
	$count= mysqli_query($con, $query);
	$reply = mysqli_num_rows($count);
	$seen = "SELECT * FROM `reply` WHERE `from`='$row[id]' AND to_check='1'";
	$abc= mysqli_query($con, $seen);
	$notseen = mysqli_num_rows($abc);
	if($notseen != '0')
	{
		$not="[".$notseen."]  "."New";
		$colo="#FF0000";
	}
	else
	{
		$colo="white";
		$not="[No reply]";
	}

	if ($row['priority']=='High')
							{
								$col="#FF0000";
							}
							elseif ($row['priority']=='Medium')
							{
								$col="#E56717";
							}
							else
							{
								$col="#FFDB58";
							}
							
							echo "<tbody>
							<tr>
							<td class='logbody'>
								<input type='checkbox'></input>
							</td>
							<td class='logbody'>
								<a class='logbody' href='viewticket.php?id=$row[id]'>$row[id]</a>
								<span style='font-size:13px;padding-left:4%''>
								[$reply] Replies
								</span>
 							</td>
							<td class='logbody' style='background-color: $col'>
								$row[priority]
							</td>
							<td class='logbody'>
								$row[status] <span style='font-size:13px;padding-left:4%;color:$colo'>$not</span>
								
							</td>
							<td class='logbody'>
								$row[updated]
								</td>
						</tr>
						<tr>
							<td class='logbody'>
							</td>
							<td class='logbody' colspan='4' style='font-size:15px;text-align:left;padding:0.5%;width:100%''>
								<b style='font-size:17px'>$row[subject] : </b>$row[message] 
								<br>
								<a class='logbody' style='padding:0.2%;' href='viewticket.php?id=$row[id]'>More</a>
																
								<a id='$row[id]'  class='logbody'  onClick='theFunction(this.id);' style='padding:0.2%;'>Quick Reply</a>
						
								</td>		
						</tr>
						</tbody>
								";
							}
							?>
							</table>

								<div id='ReplyModal' class='modal'>
									<div class='modal-content'>
									<br><br>
									<form action='reply.php' method='post' name="myform" id="myForm" enctype='multipart/form-data' runat='server'>
										<table style='font-family:arial;font-size:20px;padding-left:30%''>
										<tr>
												<td>   
													<!--From :-->   
												</td>
												<td>
												<input type='hidden' id="fromValue" name="from" value=""> </input>
												 </td>
												</tr>
											<tr>
												<td>   
													Reply :   
												</td>
												<td>
													<textarea style='padding-left:2%;padding-top:1%' name="reply" class='Enter Message Here' rows='6' cols='60' required></textarea>
												</td>
												</tr>
												<tr>		
													<td>
														Attach File:
													</td>
													<td>
														<input style='height:30px;width:100%; padding-left:2%' type='File' name='Upload'></input>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>
														<button class='replymodal' style='margin:4%' type='reset' value='reset'>Reset</button>
														<button class='replymodal' type='submit' name='submit' style='margin:5%'>Submit</button>
													</td>
												</tr>
											</table>
											</form>	
										</div>
									</div>
							
						<script type='text/javascript'>	
									var replymodal=document.getElementById('ReplyModal');
									function theFunction(ev)
									{
        							var fromValue = ev;
        							replymodal.style.display='block';	
        							document.getElementById('fromValue').value=fromValue;
									}

									window.onclick = function(event) 
									{
										if (event.target == replymodal) 
										{
											replymodal.style.display = 'none';

										}
									}
								</script>

					</div>
					</div>
					</body>
					</html>
