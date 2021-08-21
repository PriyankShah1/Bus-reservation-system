<?php

ini_set('display_errors',1);
error_reporting(E_ALL);

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try{
	$conn = mysqli_connect("localhost","root","");
	$db = mysqli_select_db($conn,"booking");
}	catch(Exception $ex)	{
	echo "Error";
}

function getPosts()
{
    $posts = array();
    $posts [0] = (string)filter_input(INPUT_POST, 'cardname');
    $posts [1] = (string)filter_input(INPUT_POST, 'cardno');
    $posts [2] = (string)filter_input(INPUT_POST, 'expirydate');
    
	return $posts;
}

if(isset($_POST['pay']))
{
    $data = getPosts();
	$pay_Query = "insert into payt(cardname, cardno, expirydate) values ('$data[0]', '$data[1]', '$data[2]')";
	try{
		$pay_Result = mysqli_query($conn, $pay_Query);

		if($pay_Result)
		{
			if(mysqli_affected_rows($conn) > 0)
			{
                echo "<script> alert('Payment Successfull !!!') </script>";
			}
			else
			{
				echo " Payment Failed.....";
			}
		}
	}	catch(Exception $ex){
		echo "Error Update ".$ex->getMessage();
	}

}

$conn->close();
?>
