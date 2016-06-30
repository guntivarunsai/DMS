<html>
	<head>
		<title> Welcome </title>

		<link rel="stylesheet" href="http://localhost/dms/diet1/EditHealthProfile.css" />
		<script type="text/javascript">
			function logoutUser()
			{
				document.location = "http://localhost/dms/UserLogout.php";
			}
		</script>
		<link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/> 
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js">
		</script> 
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js">
		</script>

		 <script> 
		 $(document).ready(function() 
		 { 
		 	$("#datepicker").datepicker(); });
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
		<p class="para"> Manage Health Profile</p>
		<table width="40%" class="HealthForm" style="float:left" border="0px">
		<form>
			<tr>
			<td> Full Name  </td>
			<td> <input type="text" value="" name="name" class="txtbox" id="name" onfocus="info('name')" onblur="clear_display()" /> </td>
			</tr>
			<tr>
			<td> Age  </td>
			<td> <input type="text" value="" name="age" class="txtbox" onfocus="info('age')" onblur="clear_display()" id='age' /> </td>
			</tr>
			<tr>
			<td>Date of Birth</td>
			<td><input id='datepicker' onblur="clear_display()" /></td>
		</tr>
		<tr>
			<td> Height  </td>
			<td> <input type="text" value="" name="height" class="txtbox" onfocus="info('height')" onblur="clear_display()" id='height' /> </td>
			</tr>
			<tr>
				<td>
					Weight
				</td>
				<td><input type="text" value="" name="weight" class="txtbox" onfocus="info('weight')" onblur="clear_display()" id='weight' /> </td>
			</tr></td>
			</tr>
			<tr>
				<td>BMI</td>
				<td><input type="text" value="" name="bmi" class="txtbox" onfocus="info('bmi')" onblur="clear_display()" id='bmi' /> </td>
			</td>
			</tr>
<tr>
				<td>Blood Group</td>
				<td><input type="text" value="" name="bg" class="txtbox" onfocus="info('bg')" onblur="clear_display()" id='bg' /> </td>
			</td>
			</tr>
			<tr>
					<td>
						<input type="Submit" name="submit" value="Submit" id="submit" />
					</td>
				</tr>
		</table>
		
		</form>
</body>
</html>