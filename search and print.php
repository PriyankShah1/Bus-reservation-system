<html>

<form action="" method="POST">
<input type ="text" name="Email" placeholder="Enter your email">
<input type ="submit" name="Search"value ="Search data">
</form>

<?php

$host="localhost";
	$dbUsername="root";
	$dbPassword="";
	$dbname="booking";
	
	$conn= new mysqli($host,$dbUsername,$dbPassword,$dbname);
	
if(mysqli_connect_error())
	 {
	 	die('Connection  Error ('mysqli_connect_errorno()'.)'.mysqli_connect_error());
	 	
	 	}

else{
				
				if(isset($POST['Search']))
				{
				    $Email=$_POST['Email'];
				    $query="SELECT * FROM bookingt where email='$Email'";
				    $query_run=mysqli_query($conn ,$query);
				    while($row=mysqli_fetch_array($query_run))
								{
											//form displays 
											?>
											<form action="" method ="POST">
											<input type ="text" hidden name="Email" value="<?php echo $row['Email'] ?>">
											<input type ="text" name="Name" value="<?php echo $row['Name'] ?>">
											<input type ="text" name="Source" value="<?php echo $row['Source'] ?>">
											<input type ="text" name="Destn" value="<?php echo $row['Destn'] ?>">
											<input type ="text" name="From-D" value="<?php echo $row['FromD'] ?>">
								
											<input type ="text" name="To-D" value="<?php echo $row['ToD'] ?>">
											<input type ="text" name="contact" value="<?php echo $row['Contact'] ?>">
											<input type ="text" name="Bus" value="<?php echo $row['Bus'] ?>">
											<input type ="text" name="Class" value="<?php echo $row['Class'] ?>">
											<input type ="text" name="Adult" value="<?php echo $row['Adult'] ?>">
											<input type ="text" name="child" value="<?php echo $row['Child'] ?>">
												<input type ="text" name="Uchild" value="<?php echo $row['Uchild'] ?>">
												
											</form>
												}
								}
				}









</html>
