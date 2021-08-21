<?php
$uname = $_POST['uname'];
$pswd = $_POST['pswd'];
$pwd = $_POST['pwd'];
$email = $_POST['email'];
$conn = new mysqli('localhost', 'root','','booking');
if($conn->connect_error){
	die('Connection Failed : '.$conn->connect_error);
}else{
	if($pwd==$pswd)
	{	
    $hash = hash('sha512',$pswd);
	$stmt = $conn->prepare("Insert into registration(uname,pswd,email) values(?,?,?)");
	$stmt->bind_param("sss",$uname, $hash, $email);
	$stmt->execute();
	echo "<script>alert('Register Successfull...')</script>";
	$stmt->close();
	$conn->close();
	}
	else
	{
		echo "<script>alert('Confirm Password not Correct')</script>";
	}
}
?>