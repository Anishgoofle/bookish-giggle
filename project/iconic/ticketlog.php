<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
	<head>
		<title>Ticket Log</title>
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
						<li style="float:left padding:10px;"><a href="home.php">Home</a></li>					
						<li><a class="active" href="ticketlog.php">Ticket Log</a></li>
						<li><a href="createuser.php">Create User</a></li>
						<li><a href="report.php">Report</a></li>

				</ul>
	<!-- 				ANY CUSTOMER MUST SEE ONLY HIS OWN COMPLAINTS
					ANY FRANCHISE MUST SEE HIS COMPLAINTS OR THE COMPLAINTS OF ALL THER CUSTOMERS UNDER HIM
					ADMIN SHOULD SEE ALL COMPLAINTS OF ALL CUSTOMERS	AND FRANCHISE		-->
				<h1 class="header">
					All Tickets
				</h1>
				<!-- -IF USER SELECTS THE BELOW CHECK BOX ALL TICKETS IN THE LOG SHOULD GET SELECTED
				-CLOSE TICKETS BUTTON- WHEN USER CLICKS THIS BUTTON, ALL TICKETS CLOSE, TICKET LOG SHOULD GET EMPTY 
				NOTE:FOR ADMIN CLOSE TICKET BUTTON CLICK SHOULD GIVE MESSAGE : USER TYPE : ADMIN NOT AUTHORISED TO CLOSE TICKETS-->
				<input type="checkbox" style="margin-left:0.85%;margin-top:1%">
				<button class="closetickets">Close Tickets</button></input>
				
				<!-- Sorting- 
				original order will be according to date
				if user selects priority : then sort data based on high->med->low priority
				if user selects status : then sort data based on pending-> resolved
				if user selects last update on : then sort data based on date
				if user selects priority and status: then fetch data based on high,pen->high,res->med,pen->med,res->low,pen->low,res priority
				if user selects priority and date: most recent-> high-med-low, less recent-> high-med-low, least recent->high,med,low
				if user selects priority,status date : MostRec - HiPe -HiRe - MePe - MeRe - LoPe - LoRe -> LessRec.....and so on.  -->
				
				<span class="logsort" style="padding-left:5%;font-weight:bold">Sort By : </span>
				<input type="checkbox"><span class="logsort">Priority</span></input>
				<input type="checkbox"><span class="logsort">Status</span></input>
				<input type="checkbox"><span class="logsort">Last Updated On</span></input>				
				
				<button class="logsort">Go</button>
				
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
					<tbody>
						<tr>
							<td class="logbody">
								<input type="checkbox"></input>
							</td>
							<td class="logbody">
								<a class="logbody" href="">TCKT8743</a>
								<span style="font-size:13px;padding-left:4%">
									[1] Replies
								</span>
				<!-- 				number of replies should be fetched from replies table
								Query : select count * from Replies where tcktid='3423432' -->
 							</td>
							<td class="logbody" style="background-color:#E56717">
								Medium
								<!-- if priority= medium color orange -->
							</td>
							<td class="logbody">
								Resolved <span style="font-size:13px;padding-left:4%;color:#FF0000">[2] New</span>
								
							</td>
							<td class="logbody">
								01/03/2017 (1 days ago)
								<!-- fetch date from ticket table -->
<!-- 								check if days<5 display '(n days ago)'
									else display only date -->
							</td>
						</tr>
						<tr>
							<td class="logbody">
							</td>
							<td class="logbody"colspan="4" style="font-size:15px;text-align:left;padding:0.5%;width:100%">
								<b style="font-size:17px">Blue screen coming :</b> This is followed by the message of complaint
								Whatever it may be Hello Trial fsfrwgwrgwr
								Shraddha
								<br>
								<a class="logbody" style="padding:0.2%" href="go to view info page of that ticket no">More</a>
								
								<!-- "Ticket no", "More" should redirect to VIEWCOMPLAINT page -->
								
								<a id="myLink" class="logbody"style="padding:0.2%">Quick Reply</a>
								
								<!-- quick reply will open modal reply box  as in viewcomplaint page
								when user replies...following will get updated
								-reply, attachment(if any) will be entered in database
								-[n]Replies in Ticket no col will get incremented each time reply is submitted
								-[n]New will show number of new replies only
								 -->
								<div id="ReplyModal" class="modal">
									<div class="modal-content">
									<br><br>
										<table style="font-family:arial;font-size:20px;padding-left:30%">
											<tr>
												<td>   
													Reply :   
												</td>
												<td>
													<textarea style="padding-left:2%" class="Enter Message Here"rows="6" cols="60"></textarea>
												</td>
								<!-- 	use the above textarea value to POST the content to form,and from there put into database -->
												</tr>
												<tr>		
													<td>
														Attach File :
													</td>
									<!-- do same as for text area to put file into database -->
													<td>
														<input style="height:30px;width:100%; padding-left:2%"type="text" placeholder="Enter File Path"></input>
													</td>
												</tr>
												<tr>
													<td></td>
													<td>
														<button class="replymodal" style="margin:4%">Reset</button>
														<button class="replymodal" style="margin:5%">Submit</button>
													</td>
												</tr>
											</table>	
										</div>
									</div>
							</td>		
						</tr>
						<!-- code below is only for the purpose of displaying multiple rows in ticket log table -->
						<tr>
							<td class="logbody">
								<input type="checkbox"></input>
							</td>
							<td class="logbody">
								<a class="logbody" href="">TCKT1982</a>
								<span style="font-size:13px;padding-left:4%">
									[5] Replies
								</span>
 							</td>
							<td class="logbody" style="background-color:#FF0000">
								High
							</td>
							<td class="logbody"  style="background-color:#151B54">
								Pending <span style="font-size:13px; color:#FF0000;padding-left:4%">[2] New</span>
							</td>
							<td class="logbody">
								03/02/2017
							</td>
						</tr>
						<tr>
							<td class="logbody">
							</td>
							<td class="logbody"colspan="4" style="font-size:15px;text-align:left;padding:0.5%;width:100%">
								<b style="font-size:17px">Subject of complaint comes here :</b> This is followed by the message of complaint
								Whatever it may be Hello Trial 
								Shraddha
								<br>
								<a class="logbody" style="padding:0.2%" href="C:\xampp\htdocs\Complaint portal\viewinformation.html">More</a>
								<a class="logbody"style="padding:0.2%">Quick Reply</a>
							</td>
						</tr>
						<tr>
							<td class="logbody">
							</td>
							<td class="logbody"colspan="4" style="font-size:15px;text-align:left;padding:0.5%;width:100%">
								<b style="font-size:17px">Blue screen coming :</b> This is followed by the message of complaint
								Whatever it may be Hello Trial fsfrwgwrgwr
								Shraddha
								<br>
								<a class="logbody" style="padding:0.2%" href="C:\xampp\htdocs\Complaint portal\viewinformation.html">More</a>
								<a class="logbody"style="padding:0.2%">Quick Reply</a>
							</td>
						</tr>
						<tr>
							<td class="logbody">
								<input type="checkbox"></input>
							</td>
							<td class="logbody">
								<a class="logbody" href="">TCKT1982</a>
								<span style="font-size:13px;padding-left:4%">
									[1] Replies
								</span>
 							</td>
							<td class="logbody" style="background-color:#FFDB58">
								Low
							</td>
							<td class="logbody"  style="background-color:#151B54">
								Pending <span style="font-size:13px; color:#FF0000;padding-left:4%">[0] New</span>
							</td>
							<td class="logbody">
								03/03/2017 (0 days ago)
							</td>
						</tr>
						<tr>
							<td class="logbody">
							</td>
							<td class="logbody"colspan="4" style="font-size:15px;text-align:left;padding:0.5%;width:100%">
								<b style="font-size:17px">Subject of complaint comes here :</b> This is followed by the message of complaint
								Whatever it may be Hello Trial 
								Shraddha
								<br>
								<a class="logbody" style="padding:0.2%" href="C:\xampp\htdocs\Complaint portal\viewinformation.html">More</a>
								<a class="logbody"style="padding:0.2%">Quick Reply</a>
							</td>
						</tr>
					</tbody>
				</table>
			</div>
	    </div>
		<!-- script below is for modal reply box -->
									<script>	
									var replymodal=document.getElementById('ReplyModal');
									var replylink=document.getElementById('myLink');
									replylink.onclick=function()
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
	</body>	
</html>	