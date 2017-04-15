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



$uname = $_POST["uname"];
$product = $_POST["product"];
$priority = $_POST["priority"];
$subject = $_POST["subject"];
$message = $_POST["message"];
$remark = $_POST["remark"];

$status = "Pending";
$id = "F".substr($uname,0,3).$count ;
date_default_timezone_set('Asia/Kolkata');
$date= date('j F, Y \a\t g:ia');

$target_dir = "uploads/";
$target_file = $target_dir .$id. basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

if(isset($_POST["submit"])) 
{
if (file_exists($target_file))
 {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
/*if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "txt" )
{
    echo "Sorry, only JPG, JPEG, PNG, PDF & DOC files are allowed.";
    $uploadOk = 0;
}*/
if ($uploadOk == 0) 
{
    echo "Sorry, your file was not uploaded.";
}
 else 
 {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
    {
    	echo"File uploaded";
    }
    else {
        echo "Sorry, there was an error uploading your file.";
    }
    
$query = "Insert into fnewticket values('".$id."','".$uname."','".$product."','".$priority."','".$subject."','".$message."','".$remark."','".$target_file."','".$status."','".$date."','".$date."')";
mysqli_query($con,$query);
$message = "Complaint Registered";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('report.php');
</script>";
}
}
?>
