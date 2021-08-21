<?php
$Source = $_POST['Source'];
$Destn = $_POST['Destn'];
$Bus = $_POST['Bus'];
$Class = $_POST['Class'];
$Adult = $_POST['Adult'];
$Child = $_POST['Child'];
$Uchild = $_POST['Uchild'];
$Way = $_POST['Way'];
$FromD= $_POST['From-D'];
$ToD =$_POST['To-D'];
$Name = $_POST['Fna'];
$Contact = $_POST['Contact'];

$Email = $_POST['Email'];

	$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="booking";
	
	$conn= new mysqli($host,
	$dbUsername,$dbPassword,$dbname);
	
	if(mysqli_connect_error())
	 {
	 	die('Connection  Error could not connect to mysql:' .mysql_error());
	 	
	 	}
	 	
	 	else{
	 		
	 		$SELECT="SELECT Email from bookingt Where Email=? limit 1";
	 		$INSERT="INSERT Into bookingt(Source,Destn,Bus,Class,Adult,Child,Uchild,Way,FromD,ToD,Name,Contact,Email)value(?,?,?,?,?,?,?,?,?,?,?,?,?)";
	 		//prepare statements 
	 		$stmt=$conn->prepare($SELECT);
	 		$stmt->bind_param("s",$Email);
			$stmt->execute ();
	 		$stmt->bind_result($Email);
	 		$stmt->store_result();
	 		$rnum=$stmt->num_rows;
	 		if($rnum==0) //if new email 
	 		{
				$stmt->close();
				$stmt=$conn->prepare($INSERT);
				$stmt->bind_param("ssssiiiisssss",$Source,$Destn,$Bus,$Class,$Adult,$Child,$Uchild,$Way,$FromD,$ToD,$Name,$Contact,$Email);
				$stmt->execute ();
				echo "<script>alert('Booked Successful !!!')</script>";
				echo "<a href='payment.html' target='_blank'>PAYMENT</a>"; 

	 	    }
	 	    else{
	 	    	echo "<script>alert('somebody already registered using this email')</script>";
	 	    	
	 	    	}
	
	 	$stmt->close();
	 	$conn->close();
	 	}

?>
