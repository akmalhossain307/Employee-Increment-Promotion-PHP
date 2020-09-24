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
$query=mysqli_query($conn,"SELECT * FROM employee_salary WHERE Depot='CHITTAGONG' LIMIT 3");
$sl=334;
while($result=mysqli_fetch_array($query)){
	$sl++;
if($result['Promotion']!==null)	
{
	echo"";
	//exit();
}
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
	.main1{height:1500px;line-height:1.3;padding-top:210px;padding-bottom:120px;font-size:19px}
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
	<br />
	<br />
	
		<div class="row"> 
		<div class="col-md-1"></div>
			<div class="col-md-7">
			<span>Ref: HR-<?php echo$result['HR_NO'];?>/491(<?php echo$sl;?>)</span> <br /><br />
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
			<!--
			<span>232-234, Tejgaon Industrial Area<br/></span><span style="text-decoration:underline;">Dhaka-1208.</span>
			-->
			
			
			</div>
			
			<?php 
			//formatting adjustment
			$adjustment=$result['Adjustment_for_increment'];
			$string2num2 = "$adjustment";
			
			$commaRemoved2 = str_replace( ',', '', $string2num2 );

			if( is_numeric( $commaRemoved2 ) ) {
				$string2num2 = $commaRemoved2;
			}
			$adjst=round($string2num2);
			
			//formatting acheivement benefit
			$achievement=$result['Achievment_Benefit'];
			$string2num3 = "$achievement";
			
			$commaRemoved3 = str_replace( ',', '', $string2num3 );

			if( is_numeric( $commaRemoved3 ) ) {
				$string2num3 = $commaRemoved3;
			}
			$achiv=round($string2num3);
			
			//formatting Productivity_benefit
			$productivity=$result['Productivity_benefit'];
			$string2num4 = "$productivity";
			
			$commaRemoved4 = str_replace( ',', '', $string2num4 );

			if( is_numeric( $commaRemoved4 ) ) {
				$string2num4 = $commaRemoved4;
			}
			$product=round($string2num4);
			?>
			
			
			
			
			
			<div class="col-md-3 text-right">
			<span>Date: <?php echo date("d.m.Y")?></span>
			</div>
		<div class="col-md-1"></div>
		</div>
		<center> Sub: <b style="text-decoration:underline">Annual Increment</b></center>
		
		<div class="row"> 
		<div class="col-md-1"></div>
			<div class="col-md-10"> 
			<span>Dear Sir,</span><br />
			<p style="text-align:justify;text-indent:73px">The Management is pleased to grant you an annual increment with retrospective effect from <b> 1<sup>st</sup> of July, 2019</b> considering your last year's performance in the following criteria: </p>
			<center>
			<table style="width:83%;">
			  
			  <tr>
					<td>a.</td>
					<td>For achievement (<?php echo $result['Achievement'];?>)</td>
					<td>-</td>
					<td>Tk. </td>
					<td style="text-align:right">
					<?php if($result['Achievment_Benefit']!==null)
							{
								echo$result['Achievment_Benefit'];
							}
							else 
							{
								echo"Nil";
							}
						?>
					</td>
					
			  </tr>
			  
			  <?php
			  
			  if($result['Productivity_benefit']!==null && $result['Achievment_Benefit']!==null){
				  ?>
			  <tr>
					<td>b.</td>
					<td>Productivity Benefit</td>
					<td>-</td>
					<td >Tk. </td>
					<td style="text-align:right"><?php echo $result['Productivity_benefit'];?></td>
					
			  </tr>
			  <?php 
				}
				if($result['Productivity_benefit']!==null){
			  ?>
			 <tr>
					<td>c.</td>
					<td>Adjustment</td>
					<td>-</td>
					<td style="border-bottom:1px solid black;">Tk. </td>
					<td style="border-bottom:1px solid black;text-align:right"><?php echo $result['Adjustment_for_increment'];?></td>
					
			  </tr>
				<?php 
				}
				else if($result['Productivity_benefit']==null)
				{
				?>
				 <tr>
						<td>b.</td>
						<td>Adjustment</td>
						<td>-</td>
						<td style="border-bottom:1px solid black">Tk. </td>
						<td style="border-bottom:1px solid black;text-align:right"><?php echo $result['Adjustment_for_increment'];?></td>
						
				  </tr>
				<?php }?>
			  
			  
			  <tr>
					<td></td>
					<td><b>Total</b></td>
					<td><b>-</b></td>
					<td style="border-top:1px solid black"><b>Tk.</b> </td>
					<td style="border-top:1px solid black;text-align:right"><b><?php echo$total=number_format($adjst+$achiv+$product,2);?></b></b></td>
					
			  </tr>
			  
			</table>
			</center> <br />
			<p style="text-align:justify;text-indent:73px">In view of above, your monthly salary structure from the said date will be as follows:</p>
			
			</div>
		<div class="col-md-1"></div>
		</div>
		
		<div class="row"> 
		<div class="col-md-2"></div>
			<div class="col-md-9">
			<?php 
			// Counting present salary
			$present_salary=$result['Present_salary'];
			$string2num = "$present_salary";
			
			$commaRemoved = str_replace( ',', '', $string2num );

			if( is_numeric( $commaRemoved ) ) {
				$string2num = $commaRemoved;
			}
			$present_salary=round($string2num);
			
			$p_upkeeping=$present_salary*0.1;
			$p_salary=$present_salary-$p_upkeeping;
			
			// calculate structure for present salary
			if($p_salary>1 && $p_salary<=10000)
			{
				$p_basic=number_format(round($p_salary*0.5),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.05),2);
				
				
			}
			else if($p_salary>10001 && $p_salary<=20000)
			{
				$p_basic=number_format(round($p_salary*0.47),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.08),2);
				//echo$p_basic=round($p_salary*0.47);
			}
			else if($p_salary>20001 && $p_salary<=35000)
			{
				
				$p_basic=number_format(round($p_salary*0.44),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.11),2);
			}
			else if($p_salary>35001 && $p_salary<=50000)
			{
				
				$p_basic=number_format(round($p_salary*0.4),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.15),2);
			}
			else if($p_salary>50001 && $p_salary<=75000)
			{
				
				$p_basic=number_format(round($p_salary*0.38),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.17),2);
			}
			else if($p_salary>=75001)
			{
				
				$p_basic=number_format(round($p_salary*0.35),2);
				$p_house=number_format(round($p_salary*0.25),2);
				$p_medical=number_format(round($p_salary*0.10),2);
				$p_conv=number_format(round($p_salary*0.10),2);
				$p_utility=number_format(round($p_salary*0.20),2);
			}
			
			
			// Counting total salary
			$total_salary=$result['Present_salary'];
			$string2num1 = "$total_salary";
			
			$commaRemoved1 = str_replace( ',', '', $string2num1 );

			if( is_numeric( $commaRemoved1 ) ) {
				$string2num1 = $commaRemoved1;
			}
			$present_s=round($string2num1);
			
			
			
			//count total after adjustment
			$total_salary=$present_s+$adjst+$achiv+$product;
			
			
			$t_upkeeping	= $total_salary*0.1;
			$t_salary		= $total_salary-$t_upkeeping;
			
			
			// calculate structure for total salary
			if($t_salary>1 && $t_salary<=10000)
			{
				$t_basic=number_format(round($t_salary*0.5),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.05),2);
				//echo$p_basic=round($p_salary*0.5);
			}
			else if($t_salary>10001 && $t_salary<=20000)
			{
				$t_basic=number_format(round($t_salary*0.47),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.08),2);
				//echo$p_basic=round($p_salary*0.47);
			}
			else if($t_salary>20001 && $t_salary<=35000)
			{
				
				$t_basic=number_format(round($t_salary*0.44),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.11),2);
			}
			else if($t_salary>35001 && $t_salary<=50000)
			{
				
				$t_basic=number_format(round($t_salary*0.4),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.15),2);
			}
			else if($t_salary>50001 && $t_salary<=75000)
			{
				
				$t_basic=number_format(round($t_salary*0.38),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.17),2);
			}
			else if($t_salary>=75001)
			{
				
				$t_basic=number_format(round($t_salary*0.35),2);
				$t_house=number_format(round($t_salary*0.25),2);
				$t_medical=number_format(round($t_salary*0.10),2);
				$t_conv=number_format(round($t_salary*0.10),2);
				$t_utility=number_format(round($t_salary*0.20),2);
			}
			
			
			?>
			
			<table style="width:98%">
			  <tr>
				<th></th>
				<th></th>
				<th></th>
				<th colspan="2"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="text-decoration:underline">Previous</span></th>
				<th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span style="text-decoration:underline">Present</span></th>
				
			  </tr>
			  <tr>
					<td>1.</td>
					<td>Basic Salary</td>
					<td>:</td>
					<td style="text-align:right">Tk. </td>
					<td style="text-align:center;padding-right:14px"><?php echo$p_basic;?></td>
					<td style="text-align:right">Tk.</td>
					<td style="text-align:center;padding-right:14px"><?php echo$t_basic;?></td>
					
			  </tr>
			  <tr>
					<td>2.</td>
					<td>House Rent Allowance</td>
					<td>:</td>
					<td style="text-align:right">Tk. </td>
					<td style="text-align:center"><?php echo$p_house;?></td>
					<td style="text-align:right">Tk.</td>
					<td style="text-align:center"><?php echo$t_house;?></td>
					
			  </tr>
			  <tr>
					<td>3.</td>
					<td>Medical Allowance</td>
					<td>:</td>
					<td style="text-align:right">Tk. </td>
					<td style="text-align:center"><?php echo$p_medical;?></td>
					<td style="text-align:right">Tk.</td>
					<td style="text-align:center"><?php echo$t_medical;?></td>
					
			  </tr>
			  <tr>
					<td>4.</td>
					<td>Conveyance Allowance</td>
					<td>:</td>
					<td style="text-align:right">Tk. </td>
					<td style="text-align:center"><?php echo$p_conv;?></td>
					<td style="text-align:right">Tk.</td>
					<td style="text-align:center"><?php echo$t_conv;?></td>
					
			  </tr>
			  <tr>
					<td>5.</td>
					<td>Utility</td>
					<td>:</td>
					<td style="text-align:right">Tk. </td>
					<td style="text-align:center"><?php echo$p_utility;?></td>
					<td style="text-align:right">Tk.</td>
					<td style="text-align:center"><?php echo$t_utility;?></td>
					
			  </tr>
			  <tr>
					<td>6.</td>
					<td>Up-keeping Allowance</td>
					<td>:</td>
					<td style="border-bottom:1px solid black;text-align:right">Tk. </td>
					<td style="border-bottom:1px solid black;text-align:center">
					<?php echo number_format(round($p_upkeeping),2);?></td>&nbsp;
					<td style="border-bottom:1px solid black;text-align:right">Tk.</td>
					<td style="border-bottom:1px solid black;text-align:center"><?php echo number_format(round($t_upkeeping),2);?></td>
					
			  </tr>
			  <tr>
					<td></td>
					<td></td>
					<td></td>
					<td style="text-align:right"><b>Tk. </b></td>
					<td style="text-align:center;padding-right:18px"><b>
					
					<?php 
					
					echo$result['Present_salary']
					?>
					
					</b></td>
					<td style="text-align:right;"><b>Tk.</b></td>
					<td style="text-align:center;padding-right:18px"><b><?php echo number_format($total_salary,2);?></b></td>
					
			  </tr>
			</table>
			<br />
			
			</div>
		<div class="col-md-1"></div>
		</div>
		
		<div class="row"> 
		<div class="col-md-1"></div>
			<div class="col-md-10"> 
			 
			<p style="text-align:justify;text-indent:73px">The Management expects that you will continue to render your best and wholehearted service to the Company for its development.</p>
			
			
			
			
			</div>
		<div class="col-md-1"></div>
		</div>
		
		<div class="row"> 
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<div class="text-left"> 
			<br />
			<br />
				<span style="text-decoration:underline">Copy to:</span> <br />
				1. Accounts Department
			</div>
			<div class="text-right sign"> 
				<span style="margin-right:41px">Yours faithfully,</span> <br /> 
				For <span style="font-style:italic"><img src="company_text.jpg" alt="" width="200px" height="29px"/></span> <br /><br /><br /><br />
				
				<b style="font-size:17px;margin-right:27px">SHAHIDUZZAMAN</b> <br /> 
				<span style="margin-right:23px;font-size:17px;">General Manager </span> <br />
				
			</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<br />
		<br />
		
		
		<br />
  
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