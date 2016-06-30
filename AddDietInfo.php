<html>
	<?php	
		$debug = false;
		function dBug($msg)                     
		{
			global $debug;
			if($debug)
				echo "<p>Debug : $msg</p>";
		}
		$msg = NULL;
		session_start();
		if($_SESSION['loggedIn'] == true)
		{
			$validate = true;
			$username = $_SESSION['username'];
			if(isset($_POST['submit']))
			{
				$db = mysqli_connect("127.0.0.1","root","","diet");
				if(mysqli_connect_errno())
				{
					dBug("Could not Connect to Database.");
					echo "<p> Error : Could not add Diet info, please try again. </p>";
				}
				else
				{
					$dietname = $_POST['diet_name'];
					$dietamount = $_POST['diet_amount'];
					$dietcategory = $_POST['diet_category'];
					$dietcomment = $_POST['diet_comment'];
					$dietdate = $_POST['diet_date'];
					
					function isValid($arg)
					{
						if(strlen(trim($arg)) <= 0)
							return false;
						return true;
					}
					
					if(!isValid($dietname))
					{
						$msg = "Please provide a Diet Item Name.";
						$validate = false;
					}
					
					if($validate)
					{
						$result = mysqli_query($db , "INSERT INTO diet_$username (dietname , dietamount , dietcategory , dietcomment , dietdate) VALUES ( '$dietname' , $dietamount , '$dietcategory' , '$dietcomment' , STR_TO_DATE('$dietdate','%d-%M-%Y') ); ");

						if($result == false)
						{
							dBug(" Query : INSERT INTO diet_$username (dietname , dietamount , dietcategory , dietcomment , dietdate) VALUES ( '$dietname' , $dietamount , '$dietcategory' , '$dietcomment' , STR_TO_DATE('$dietdate','%d-%M-%Y') ); failed.");
							echo "<p> Could not add Diet Information . </p>";

						}

						else
						{
							dBug(" Diet_info Added Sucessfully.");
							$msg = "Diet_Info Added.";
						}
					}
					mysqli_close($db);
				}
			}
		}
		else
		{
			die("Please <a href='http://localhost/dms/UserLogin.html'> Login </a> to Continue");
		}
	?>
<head>
<title> Dietary Management System : Welcome , <?php echo $username ?>  </title>
<link rel="stylesheet" href="http://localhost/dms/diet1/AddDietInfo.css"></link>
</head>
<body>
<table class="header" width="100%">
<tr>
<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
</tr>
</table>
<table width="100%" class="menubar" align="center">
<tr>
<td class="menuitem"> <a href="http://localhost/dms/MenuPage.php"> Home </a> </td>
<td class="menuitem"> <a href="http://localhost/dms/diet1/ViewDiet.php"> View Diet Info </a> </td>
<td class="menuitem"> <a href="http://localhost/dms/ManageProfile.php"> Manage Profile </a> </td>
<td class="menuitem"> <a href="http://localhost/dms/UserLogin.html"> Logout <?php echo $username;?> </a>
</td>
</tr>
</table>

<table width="100%" height="50%" border="0px">
<tr>
<td>
<form action="AddDietInfo.php" method="POST">
<table class="exp_form">
<th>
<td colspan="2"> Add an Diet Item </td>
</th>
<tr>
<td> Name of the item </td>
<td> <input type="text" name="diet_name" value="" class="txtbox" /></td>
</tr>
<tr>
<td> Amount of grams</td>
<td> <input type="text" name="diet_amount" value="" class="txtbox" /> </td>
</tr>
<tr>
<td> Category  </td>
<td> <input type="text" name="diet_category" value="" class="txtbox" /> </td>
</tr>
<tr>
<td> Date </td>
<td> <input type="text" name="diet_date" value="<?php echo date('d-M-Y'); ?>" class="txtbox"/>  </td>
</tr>
<tr>
<td> Comments </td>
<td> <input type="textarea" name="diet_comment" value="" class="txtbox" /> </td>
</tr>
<tr>
<td colspan="2" align="center">
 <input type="submit" value="Add" name="submit" class="btn" /> 
 <input type="reset" value="reset" class="btn"/> </td>
</tr>
</table>

</form>
</td>
</tr>
</table>

<table width="100%" class="vtable" border="1px">
<tr>
<td>
<?php 
$db = mysqli_connect("127.0.0.1","root","","diet");
if(mysqli_errno($db))
{
dBug("Cannot Connect to database.");
die('  ');
}
else
{
$result = mysqli_query($db,"SELECT COUNT(*) as c FROM diet_$username WHERE dietdate=utc_date()");
if($result!=null)							
{				
while($row = mysqli_fetch_array($result))							
{
$count = $row['c'];
$count = (int) $count;						
}
if($count == 0)
{
echo "<p> No Diet Items added today. </p>";
}
else
{
$result = mysqli_query($db,"SELECT * FROM diet_$username WHERE dietdate=utc_date()");
$tag = 1;
$total = 0;
echo "<span class='today_heading'> Today's Diet Information </span><br><br>";
echo "<table class='todays_exp'>";
echo "<tr>";
echo "<th> Diet Name   </th>";
echo "<th> Diet Amount </th>";
echo "<th> Comment </th>";
echo "<th> Diet Category</th>";
echo "<th> Diet Date</th>";

echo "</tr>";
while($row = mysqli_fetch_array($result))
{
echo "<tr class='style$tag'>";
echo "<td>".$row['dietname']."</td>";
echo "<td>".$row['dietamount']."</td>";
echo "<td>".$row['dietcomment']."</td>";
echo "<td>".$row['dietcategory']."</td>";
echo "<td>".$row['dietdate']."</td>";
echo "</tr>";
$tag = ($tag == 1) ? 2 : 1;
$total += $row['dietamount'];
}
echo "<tr>";
echo "<th> Total </th>";
echo "<th> $total </th>";
echo "</tr>";
echo "</table>";
}
}
}
?>
</tr>
</td>
</table>
<p class="status"><? php echo $msg;?>&nbsp;</p>
</body>
</html>
