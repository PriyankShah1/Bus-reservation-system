<?php

$name = $_POST['name'];
$pass = $_POST['pass'];

if(isset($_POST['sub'])){
if($name == ""){
	echo "Name required";
}else if($pass == ""){
	echo "Pass required";
} else {
	echo "Submitted";
}
}
?>