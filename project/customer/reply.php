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
$sel_user = "UPDATE `counter` SET `count`=count+1";
$run_user = mysqli_query($con, $sel_user);
$sel_query = "SELECT * FROM counter";
$result = mysqli_query($con, $sel_query);

$check_user = mysqli_num_rows($result);

if($check_user==1)
{
$row = mysqli_fetch_array($result);
}
 $count=$row['count'];

$number="NULL";
$from = $_POST["from"];
$to = "Admin";
$reply = $_POST["reply"];
$upld = $from.substr($count,2,4);
date_default_timezone_set('Asia/Kolkata');
$date= date('j F, Y \a\t g:ia');
$frchk = "1";
$tochk = "0";

$target_dir = "curl/";
$target_file = $target_dir .$upld. basename($_FILES["Upload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) 
{
if (file_exists($target_file))
 {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
}
 else 
 {
    if (move_uploaded_file($_FILES["Upload"]["tmp_name"], $target_file)) 
    {
    	echo"File uploaded";
    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
$dateupdate = "UPDATE `cnewticket` SET `updated`='$date' WHERE `id`='$from'";
mysqli_query($con,$dateupdate);

$query = "Insert into reply values( '".$number."','".$from."','".$to."','".$reply."','".$target_file."','".$date."','".$frchk."','".$tochk."')";
mysqli_query($con,$query);
$message = "Reply Registered";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('log.php');
</script>";
}
}
?>