<html>
	<head>
		<title> Welcome </title>
		<link rel="stylesheet" href="http://localhost/dms/MenuPage.css" />
		<script type="text/javascript">
			function logoutUser()
			{
				document.location = "http://localhost/dms/UserLogout.php";
			}
		</script>
	</head>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
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
		<table width="100%" class="menubar">
			<tr>
				<td class="welcomeMsg"> &nbsp;&nbsp;&nbsp;Welcome, <?php echo $username;?>  </td>
				<td class="main_menuitem"> 
				<a href="http://localhost/dms/ManageProfile.php" > Manage Profile </a>
				</td>	

				<td class="main_menuitem"> 
				<a href="http://localhost/dms/UserLogout.php" > Logout </a>
				</td>
			</tr>
		</table>
		<table class="menu" width="100%" border="0px" align="center">
<tr>
<td align="center">
<h2><a class="menu1" href="http://localhost/dms/MenuPage.php">Diet Manager</h2></a></td>
<td align="center">
<h2><a class="menu1" href="http://localhost/dms/diet1/HandWratio.php">Height and Weight Ratio</h2></a>
</td>
<td align="center">
<h2><a class="menu1" href="http://localhost/dms/diet1/calorie.php">Calories Info</a>
</td>
<td align="center">
<h2><a class="menu1" href="http://localhost/dms/diet1/BMI.php">BMI-Calculator</h2></a>
</td>
<td align="center">
<h2><a class="menu1" href="http://localhost/dms/diet1/NeedHelp.php">Need Help?</h2></a>
</td>
</table>
<a class="atag" href="http://localhost/dms/diet1/AddDietInfo.php">Add</a><br>
<input type="submit" name="submit" value="Diet Information" id="submit" style="float: left;" /><br><br><br>
<a class="atag1" href="http://localhost/dms/diet1/ViewDiet.php">View</a><br>
<input type="submit" name="submit" value="View Diet Information" id="submit1"  style="float: right;"/><br><br><br>
<a class="atag2" href="http://localhost/dms/diet1/EditHealthProfile.php">Edit</a><br>
<input type="submit" name="submit" value="Edit health Information" id="submit2" style="float: left;" /><br><br><br>
<a class="atag3" href="http://localhost/dms/diet1/PersonalReport.php">Report</a><br>
<input type="submit" name="submit" value="Personal Diet Report" id="submit3"  style="float: right;"/><br>
<br><table width="100%" style="color:black" bgcolor="#9966FF" border="1px"><tr><td>
	<h2 align="center"> "let your emotions control your Diet"</h2>
</td></tr></table><br>
<p align="center">@Developed and Maintained By Code_Blasters<br>Contact:codeblasters@gmail.com</p>

</body>
</html>