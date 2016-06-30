<html>
	<head>
		<title> Welcome </title>
		<link rel="stylesheet" href="http://localhost/dms/diet1/HandWratio.css" />
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
				echo "<p>
				 please <a href='http://localhost/dms/UserLogin.html'>login</a>
				 to see this page. </p>";
				die(' ');
			}
			$username = $_SESSION['username'];
		?>
		<table width="100%" class="menubar">
			<tr>
				<td class="welcomeMsg"> &nbsp;&nbsp;&nbsp;Welcome, <?php echo $username;?>  </td>
				<td class="main_menuitem"><a href="http://localhost/dms/Menupage.php" > Home </a></td>
				<td class="main_menuitem"> 

				<a href="http://localhost/dms/ManageProfile.php" > Manage Profile </a>
				</td>	

				<td class="main_menuitem"> 
				<a href="http://localhost/dms/UserLogout.php" > Logout </a>
				</td>
			</tr>
		</table>

<table class="HandW" width="100%" border="0px">
	<tr>
	<td class="menubarnew">
	<a href="http://localhost/dms/diet1/HandWAdults.php" > Height and Weight Adults </a>
	</td>
	<td class="menubarnew">
	<a href="http://localhost/dms/diet1/HandWChildren.php" > Height and Weight Children </a>
	</td>
	<td class="menubarnew">
	<a href="http://localhost/dms/diet1/WeightLossCal.php" > Weight Loss Calculator</a>
	</td>
	<td class="menubarnew">
	<a href="http://localhost/dms/diet1/AvgBloodPre.php" > Avgerage Blood Pressure </a>
	</td>
	</tr>
	</table>
	


































<!--
<table width="25%" class="menubar1">
	<tr>
		<td>
<a href="http://localhost/dms/diet1/HandWratio.php">
  <img src="http://localhost/dms/imgs/height1.png" alt="Adults">
</a>
<br><br>
</td>
</tr>
<tr>
<td>
<a href="http://localhost/dms/diet1/HandWratio.php">
  <img src="http://localhost/dms/imgs/height2.png" alt="Children">
</a><br><br>
</td>
</tr>
<tr>
<td>
<a href="http://localhost/dms/diet1/HandWratio.php">
 <img src="http://localhost/dms/imgs/height3.png" alt="LossCalculator">
</a><br><br>
</td>
</tr>
<tr>
<td>
<a href="http://localhost/dms/diet1/HandWratio.php">
  <img src="http://localhost/dms/imgs/height4.png" alt="BloodPressure">
</a></td>
</tr><br><br>
</table>-->
</body>
</html>