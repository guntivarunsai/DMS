<html>
	<head>
		<link rel="stylesheet" href="http://localhost/dms/general.css"/>
	</head>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
			</tr>
		</table>
		<?php
		
			session_start();
			if($_SESSION['loggedIn'] == true)
			{
				$username = $_SESSION['username'];
				echo "<p>You have Successfully logged out, $username. </p>";
			}
			else
			{
				echo "<p>You don't have an active session to logout. </p>";
			}
			echo "<p> click <a href='http://localhost/dms/UserLogin.html'>here</a> to login again. </p>";
			session_unset();
		?>
	</body>
</html>