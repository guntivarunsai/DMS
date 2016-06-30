<html>
	<head>
		<title> Logging in .. </title>
		<link rel="stylesheet" href='http://localhost/dms/general.css' />
	</head>
	<body align="center">
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h1>Dietary Management System</h1> </td>
			</tr>
		</table>
<?php

	$debug = false;
	function dBug($msg)
	{
		global $debug;
		if($debug)
			echo "<p>Debug : $msg</p>";
	}
	$username = $_POST["username"];
	$password = $_POST["password"];
	$loggedIn = false;
	dBug("Username : $username");
	dBug("Password : $password");
	$db = mysqli_connect("127.0.0.1","root","","diet");
	if(mysqli_connect_errno())
	{
		dBug("Error Connecting to DB.");
		echo "Operation Cannot be Completed!";
		die(' ');
	}
	$result = mysqli_query($db , "SELECT * FROM diet_users WHERE username='$username'");
	//var_dump($result);
	
	if($result != null)
	{
		while($row = mysqli_fetch_array($result))
		{
			if(strcmp($row['password'],$password) == 0)
			{

				echo "Redirecting, Please Wait...";
				session_start();
				$_SESSION['username'] = $username;
				$_SESSION['loggedIn'] = true;
				header("Location : MenuPage.php");
				echo "<p> <a href='http://localhost/dms/MenuPage.php'> click here </a> if you aren't redirected. </p>";
			}
		}
	}
	else
	{
		header("Location : http://localhost/dms/UserLogin.html");
	}
?>
</body>
</html>
