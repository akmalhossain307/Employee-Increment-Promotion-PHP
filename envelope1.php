<?php
include('inc/numberFormatter.php');
$servername = "localhost";
$username 	= "root";
$password 	= "";
$dbname 	= "test";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 
				//$serial=0;
				//$sl=1000;
				
				$query=mysqli_query($conn,"SELECT * FROM employee_salary");
				
				while($result=mysqli_fetch_array($query)){
			
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>JAYSON GROUP</title>
	<style>
	body{font-family: Century Gothic,CenturyGothic;}
.main1{height:auto;line-height:1.3;padding-top:190px;padding-bottom:140px;font-size:19px}
		table, th, td {
		  
		  border-collapse: collapse;
		}
		th, td {
		  padding: 5px;
		  text-align: left;    
		}
		.sign{margin-top:-110px}
	</style>
	
  </head>
  <body>
    
	
	<div class="main1">
	
	<div class="container main">
	
	
	
		<div class="row"> 
			
		
		<div class="col-md-1"></div>
			<div class="col-md-5">
		
			
			</div>
			
			<div class="col-md-6">
		
			
			<b><?php echo$result['Name_of_Employee'];?></b> <br />
			<span><?php 
			$designation=$result['Designation'];
			if($designation=="MR")
			{
				$desg="Medical Representative";
			}
			else if($designation=="SR. MR" || $designation=="SR.MR")
			{
				$desg="Senior Medical Representative";
			}
			else if($designation=="MPO")
			{
				$desg="Medical Promotion Officer";
			}
			else if($designation=="SR. MPO" || $designation=="SR.MPO")
			{
				$desg="Senior Medical Promotion Officer";
			}
			else if($designation=="FE")
			{
				$desg="Field Executive";
			}
			else if($designation=="AM")
			{
				$desg="Area Manager";
			}
			else if($designation=="SR. AM" || $designation=="SR.AM")
			{
				$desg=" Senior Area Manager";
			}
			else if($designation=="RM")
			{
				$desg=" Regional Manager";
			}
			else if($designation=="SR. RM" || $designation=="SR.RM")
			{
				$desg=" Senior Regional Manager";
			}
			else if($designation=="ASM")
			{
				$desg=" Assistant Sales Manager";
			}
			else if($designation=="TE")
			{
				$desg=" Territory Executive";
			}
			
			echo$desg;
			?></span> <br />
			<span>Jayson Pharmaceuticals Ltd.</span> <br />
			<?php $depot=$result['Depot'];?>
			<span style="text-decoration:underline;text-transform:capitalize"><?php echo strtolower("$depot");?></span>
			
			</div>
		<div class="col-md-1"></div>
		</div>
	
		
	</div>
	</div>
	
				

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>


<?php 
	}
	
	
	
	?>