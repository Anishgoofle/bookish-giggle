<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
	<head>

		    <meta charset="UTF-8" /> 
		<title>Ticket Information</title>
		<link rel="stylesheet" type="text/css" href="iconicstyle.css"></link>

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
<?php

$mysqli=new mysqli('localhost','root','','iconic');
$con = mysqli_connect("localhost","root","","iconic");
if (mysqli_connect_errno())

{

echo "MySQLi Connection was not established: " . mysqli_connect_error();

}

$sel = "UPDATE `reply` SET `to_check`='0' WHERE `from`='$_GET[id]'";
$run = mysqli_query($con, $sel);

$sel_user = "SELECT * FROM cnewticket left join cruser ON cnewticket.username = cruser.username WHERE cnewticket.id='$_GET[id]' ";

$run_user = mysqli_query($con, $sel_user);

$check_user = mysqli_num_rows($run_user);

if($check_user==1)
{
$row = mysqli_fetch_array($run_user);
}
?>
<table class="tickethead">
					<thead>
							<td  class="tickethead" style="width:15%"><?php echo $row['id']; ?></td>
							<td  class="tickethead" style="width:70%"><?php echo $row['subject']; ?></td>
							<td  class="tickethead" style="width:15%"><?php echo $row['status']; ?></td>
					</thead>
				</table>

				<table class="ticket-details">
					<thead>
							<td colspan="2" class="ticket-details">Ticket Information</td>
							<td colspan="2" class="ticket-details">Client Information</td>
					</thead>

					<tbody>
						<tr>
							<td class="ticket-details-body" style="width:15%">
								Ticket No
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['id'] ; ?>
							</td>
							<td class="ticket-details-body" style="width:15%">
								Client Name
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['name'] ; ?>
							</td>
						</tr>
						<tr>
							<td class="ticket-details-body" style="width:15%">
								Subject
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['subject']; ?>
							</td>
							<td class="ticket-details-body" style="width:15%">
								Email	
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['mail']; ?>
							</td>
						</tr>
						<tr>
							<td class="ticket-details-body" style="width:15%">
								Status
							</td>
							<?php
							if ($row['status']=='Pending')
							{
								$col="#151B54";
							}
							else
							{
								$col="#5E7D7E";
							}
							?>
							<td class="ticket-details-body" style="background-color:<?php print $col; ?> ;width:35%">
								<?php echo $row['status']; ?>
							</td>
						</tr>
						<tr>
							<td class="ticket-details-body" style="width:15%">
								Priority
							</td>
							<?php
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
							?>
							<td class="ticket-details-body" style="width:35% ;background-color:<?php print $col; ?>">
								<?php echo $row['priority']; ?>
							</td>
						</tr>

						<tr>
							<td class="ticket-details-body" style="width:15%">
								Sent On
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['date']; ?>
							</td>
						</tr>
						<tr>
							<td class="ticket-details-body" style="width:15%">
								Message
							</td>
							<td class="ticket-details-body" style="width:35%">
								<?php echo $row['message']; ?>
							</td>
						</tr>

						<tr>
							<td class="ticket-details-body" style="width:15%">
								Files Attached
							</td>
							<?php
										$user = $row["uploads"];
										$info=pathinfo($user);
										$ext=$info['extension'];
										if ($ext !="jpeg" && $ext !="jpg" && $ext !="png" && $ext !="gif") 
										{
											$file = $user;
											$source = "cuploads/noscreenshot.jpg";
										}
										else
										{
											$source = $user;
											$file = "nodoc";
										}

										 ?>
										

							<td class="ticket-details-body" style="width:35%">
								<button id="myBtn" style="width:170px; ">View Screenshot</button>
								<div id="myModal" class="modal">
									<div class="modal-content">
										<span class="close">&times;</span>
										<img alt="Screenshot Unavailable / Not Found" src="<?php echo $source ; ?>" style="height:95% ;width:95%;padding:1%">
									</div>
								</div>
								<script>
									var modal=document.getElementById('myModal');
									var btn=document.getElementById('myBtn');
									btn.onclick=function()
									{
										modal.style.display="block";
									}
									var span = document.getElementsByClassName("close")[0];
									span.onclick = function()
									{ 
										modal.style.display = "none";
									}
								</script>
								<button style="width:195px ; margin-left:5%;" onclick="file();">
										Download Document
								</button>
								<script>
								function file()
								{
									var f = '<?php echo $file;?>';
									if(f == "nodoc")
									{
										alert ("no document available");
									}
									else
									{
										window.open("<?php echo $file;?>");
									}
								}
								</script>
							</td>
						</tr>
					</tbody>
				</table>
				
				<h1 class="replies">Replies to this ticket</h1>
				<table class="replies">
					<thead class="replies">
						<td class="replies" style="width:20%">
							User
						</td>
						<td class="replies" style="width:60%">
							Reply
						</td>
						<td class="replies" style="width:20%">
							Replied On
						</td>
					</thead>

					<?php

$sel_user = "(SELECT * FROM `reply` WHERE `from`='$_GET[id]' OR `to`='$_GET[id]')";
$result = mysqli_query($con, $sel_user);
$x = " No Reply Till Date";
while($row=mysqli_fetch_array($result))
{
					$x = $row['date'];
					echo"<tbody>
						
						<tr>
							<td class='replies'>
							$row[from]	
							</td>
							<td class='replies'>
								$row[reply]
								 <br />
								<a class='replies' href='$row[url]' >
									View / Download Attachment
								</a><br>
							</td>
							<td class='replies'>
								$row[date]
							</td>
						</tr>
					</tbody>";
				}

					
					?>

					<tfoot>
						<tr>
							<td></td>
							<td>
							</td>
							<td class='lastupdated'>Last Replied On :<?php echo $x ;?></td>
						</tr>
					</tfoot>
					

				</table>
				<button id="ReplyBtn" style="margin-left:87%; width:110px; height:3%; padding: 1% 1% 1% 1% ">Add Reply</button>
					<div id="ReplyModal" class="modal">
						<div class="modal-content">
							<br><br>
							<form action='reply.php' method='post' name="myform" id="myForm" enctype='multipart/form-data' runat='server'>
							<table style="font-family:arial;font-size:20px;padding-left:20%">
							<tr>
												<td>   
													<!--From :--> 
												</td>
												<td>
												<input type='hidden'  name="from" value="<?php echo $row['id'];?>"> </input>
												 </td>
												</tr>
										
								<tr>
									<td>   
										Reply :   
									</td>
									<td>
										<textarea style="padding-left:2%;padding-top: 1%" class="Enter Message Here" name="reply" rows="6" cols="60" required></textarea>
									</td>
								</tr>
								<tr>		
									<td>
										Attach File :
									</td>
									<td>
										<input style='height:30px;width:100%; padding-left:2%' type='File' name='Upload'></input>
									</td>
									
								</tr>
								<tr>
									<td></td>
									<td>
										<button class='replymodal' style='margin:4%' type='reset' value='reset'>Reset</button>
										<button class='replymodal' type='submit' name='submit' style='margin:5%'>Submit</button>	 </td>
								</tr>
							</table>	
							</form>
						</div>
					</div>
								<script>	
									var replymodal=document.getElementById('ReplyModal');
									var replybtn=document.getElementById('ReplyBtn');
									replybtn.onclick=function()
									{
										replymodal.style.display="block";
									}
									window.onclick = function(event) 
									{
										if (event.target == replymodal) 
										{
											replymodal.style.display = "none";
										}
									}
								</script>
			</div>
	    </div>
	</body>	
</html>	