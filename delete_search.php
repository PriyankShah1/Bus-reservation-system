<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Search and Delete</title>

	<style>
		.align{
			align:center;
		}
		.grad1 {
			height: 600px;
			background-color: red; 
			background-image: linear-gradient(315deg,#D66DED, #00A9CF);
			border-radius:20px;
			color:white;
		}
		
		.container{
			margin: 10px 50px 50px 50px;
		}
	  </style>

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
	
	<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #F7F8FA;">
	  <a class="navbar-brand" href="#"><h4>Bus Karle !</h4>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon" style="float:right;"></span>
	  </button>
	  </a>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
		  <li class="nav-item active">
			<a class="nav-link" href="http://bus-karle.great-site.net/Bus_Karle.html"><b>Home </b><span class="sr-only">(current)</span></a>
		  </li>
		  <li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			  <b>Booking</b>
			</a>
			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			  <a class="dropdown-item" href="booking.html">Book Now !</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="update_search.php">Edit Booking</a>
			  <div class="dropdown-divider"></div>
			  <a class="dropdown-item" href="#">Cancel Booking</a>
			</div>
		  </li>
		</ul>

	  </div>
	</nav>

	<div class="container grad1 text-center">
		<h1><u>Delete Reservation Details</u></h1>
		<form action="" method="POST"> 
			<div class="form-group ">
				<label for="exampleInputEmail1"><h5>Email address</h5></label>
				<input type="email" class="form-control " name="email" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email to Search">
			</div>
			<!--
			<div class="form-group">
				<label for="exampleInputPassword1"><h5>Password</h5></label>
				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			</div>
			-->
			<button type="submit" class="btn btn-warning" name="search" value="Search Data"><h5>Search</h5></button>
		  </form>

		<?php
            try{
				$conn = mysqli_connect("localhost","root","");
				$db = mysqli_select_db($conn,"booking");
			}	catch(Exception $ex)	{
				echo "Error";
			}

            try{
                if(isset($_POST['search']))
                {
                    $email = $_POST['email'];
                    
                    $query = "SELECT * FROM bookingt where email='$email' ";
                    $query_run = mysqli_query($conn,$query);

                    while($row = mysqli_fetch_array($query_run))
                    {
                        ?>
                            <form action="" method="POST">
                                <div class="form-group">
                                    <br>
                                    <h4>Your Details:</h4>
                                    <b>Email:</b>
                                    <input type ="text" name="Email" value="<?php echo $row['Email'] ?>"/>
                                    <b>Name:</b>
                                    <input type ="text" name="Name" value="<?php echo $row['Name'] ?>"/></p>

                                    <p><b>Source:</b>
                                    <input type ="text" name="Source" value="<?php echo $row['Source'] ?>"/>
                                    <b>Destination:</b>
                                    <input type ="text" name="Destn" value="<?php echo $row['Destn'] ?>"/></t>
                                    <b>From:</b>
                                    <input type ="text" name="FromD" value="<?php echo $row['FromD'] ?>"/>
                                    <b>To:</b>
                                    <input type ="text" name="ToD" value="<?php echo $row['ToD'] ?>"/></p>
                                    
                                    <p><b>Contact:</b>
                                    <input type ="text" name="Contact" value="<?php echo $row['Contact'] ?>"/>
                                    <b>Bus:</b>
                                    <input type ="text" name="Bus" value="<?php echo $row['Bus'] ?>"/>
                                    <b>Class:</b>
                                    <input type ="text" name="Class" value="<?php echo $row['Class'] ?>"/></p>

                                    <p><b>No. of adults:</b>
                                    <input type ="number" name="Adult" value="<?php echo $row['Adult'] ?>"/>
                                    <b>No. of childs:</b>
                                    <input type ="number" name="Child" value="<?php echo $row['Child'] ?>"/>
                                    <b>No. of Uchilds:</b>
                                    <input type ="number" name="Uchild" value="<?php echo $row['Uchild'] ?>"/></p>
                                </div>
                                <button type="submit" class="btn btn-danger" name="delete" value="Delete Data"><h5>Delete</h5></button>
                            </form>
                            
                        <?php
                    }
                }
            } catch(Exception $ex){
		        echo "Error Delete ".$ex->getMessage();
	        }

            $conn->close();
		?>

	</div>

</body>
</html>

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
    $posts [0] = (string)filter_input(INPUT_POST, 'Email');
	return $posts;
}

if(isset($_POST['delete']))
{
	$data = getPosts();
	$delete_Query = "DELETE FROM `bookingt` WHERE `Email` = '$data[0]' ";
	try{
		$delete_Result = mysqli_query($conn, $delete_Query);

		if($delete_Result)
		{
			if(mysqli_affected_rows($conn) > 0)
			{
                echo "<script> alert('Data Deleted successfully!!!') </script>";
			}
			else
			{
				echo "<script>alert('Deletion Failed')</script>";
			}
		}
	}	catch(Exception $ex){
		echo "Error Delete ".$ex->getMessage();
	}

}

$conn->close();
?>
