		<html>
	<head>
		<title>Height and weight for children </title>
		<link rel="stylesheet" href="http://localhost/dms/diet1/HandWratio.css"/>
		
	</head>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
			</tr>
		</table>
		
		<table width="100%" class="menubar">
			<tr>
				<td class="menuitem"> <a href="http://localhost/dms/diet1/HandWratio.php"> Home </a> </td>
				<!--<td class="menuitem"> <a href="http://localhost/dms/diet1/AddDietInfo.php"> Add Diet Info </a> </td>
				<td class="menuitem"> <a href="http://localhost/dms/diet1/ViewDiet.php"> View Diet Info </a> </td>-->
				<td class="menuitem"> <a href="http://localhost/dms/UserLogin.html"> Logout 
				<?php echo $username;?> </a> </td>
			</tr>
		</table>
<?php 
			session_start();
			if($_SESSION['loggedIn']!=true)
			{
				echo "<p> please <a href='http://localhost/dms/UserLogin.html'>login</a> to see this page. </p>";
				die(' ');
			}
			$username = $_SESSION['username'];
		?>
		<h2 align="center">
			Height and Weight Ratio for Children
		</h2>
<br>
<br>
<table border="0px" class="menubar" align="center" width="30%">
<h3 align="center" style="color:blue">Enter the details</h3>
<form class="formname">
<tr>
<td>
Sex*:<input type="radio" name="Gender" value="Male">Boy
<input type="radio" name="Gender" value="Female">Girl<br><br>
</td>
</tr>
<tr>
<td>
Age*:<input type="text" name="age"><br><br>
</td>
</tr>
<tr>
<td>
Ethinicity*:<input type="text" name="Ethinicity"><br><br>
</td>
</tr>
<tr>
<td>
Height:<input type="text" name="Height">cms
<br><br>
</td>
</tr>
<tr>
<td>
Weight:<input type="text" name="Weight">Kg
<br><br>
</td>
</tr>
<tr>
<td >
<input type="Submit" name="submit" value="Submit" id="submit" />
</td>
</tr>
</form>
</table>
</body>
</html>