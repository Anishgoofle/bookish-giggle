<?php   
session_start(); 
session_destroy();
$message = "Logged Out Successfully";
echo "<script type='text/javascript'>
alert('$message');
window.location = ('..//index.php');
</script>";
exit();
?>