<html>
	<head>
		<title> Welcome </title>
		<link rel="stylesheet" href="http://localhost/dms/diet1/BMI.css" />
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
		<table width="100%" class="menubar1">
			<tr>
				<td class="welcomeMsg"> &nbsp;&nbsp;&nbsp;Welcome, <?php echo $username;?>  </td>
			<td class="main_menuitem"><a href="http://localhost/dms/Menupage.php"> Home </a></td>
				<td class="main_menuitem"> 

				<a href="http://localhost/dms/ManageProfile.php" > Manage Profile </a>
				</td>	

				<td class="main_menuitem"> 
				<a href="http://localhost/dms/UserLogout.php" > Logout </a>
				</td>
			</tr>
		</table>

		
 <form action= "<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" align="center" name="f11">
 <h2>Metric Measurements</h2>
    Weight(Kgs):  <input type="Text" Name="Num1"  onblur="clear_display()"><br><br><br>
    Height(Cms): <input type="Text" Name="Num2"  onblur="clear_display()"> <p>
    <!--<input type="Submit" value="Calculate">-->
    <input type="Submit" name="submit" value="Calculate BMI" id="submit" />
    </form>

<?php
if (count($_POST) > 1 && isset($_POST["Num1"]) && isset($_POST["Num2"])){
    // add First and Second Numbers
    $sum = $_POST["Num1"] /($_POST["Num2"]*$_POST["Num2"]);
    $sum1=$sum*10000;
    // their sum is diplayed as
    echo "The Body Mass Index of your Weight ".$_POST["Num1"]." Kgs and
    Height  ".$_POST["Num2"]." Cms is $sum1";
}
echo "<br><br><br>";
if($sum1<18.5)
{
	echo "underwight";echo "<br><br><br>";
	echo "Dude! take Care of ur health by maintaining Proper Height and weight";
}
if($sum1>18.6&&$sum1<24.9999999999)
{
	echo "Normal Weight";
	echo "<br><br><br>";
	echo "Dude! You are awesome that health maintainence shows your bmi";
}
if($sum1>25&&$sum1<=29.9)
{
	echo "over Weight";
	echo "<br><br><br>";
	echo "Dude! by proper workout you can become health";
}
if($sum1>=30)
{
	echo "obese Weight";
	echo "<br><br><br>";
	echo "Dude! You are not awesome health is going down";
}
?>
<table class="header" width="100%">
<tr>
<td width="100%" align="center"> <h2>Standard Norms </h2> </td>
</tr>
</table>
</body>
</html>