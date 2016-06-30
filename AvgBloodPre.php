<html>
	<head>
		<title> Manage Profile </title>
		<link rel="stylesheet" href="ManageProfile.css"/>
		<script lang="text/javascript" src="ManageProfile.js"></script>
	</head>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h1> Dietary Management System </h1> </td>
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
			session_start();
			if($_SESSION['loggedIn'] != true)
			{
				echo "<p> Please <a href='http://localhost/dms/UserLogin.html'>Login</a> to continue </p>";
				session_unset();
				session_destroy();
				die(' ');
			}
			else
			{
				$username = $_SESSION['username']; // required below
		?>
		<table width="100%" class="menubar">
			<tr>
				<td class="menuitem"> <a href="http://localhost/dms/MenuPage.php"> Home </a> </td>
				<td class="menuitem"> <a href="http://localhost/dms/diet1/AddDietInfo.php"> Add Diet Info </a> </td>
				<td class="menuitem"> <a href="http://localhost/dms/diet1/ViewDiet.php"> View Diet Info </a> </td>
				<td class="menuitem"> <a href="http://localhost/dms/UserLogin.html"> Logout <?php echo $username;?> </a> </td>
			</tr>
		</table>
		<?php

				dBug("Session Alive.");
				dBug("username : $username");
				$db = mysqli_connect("127.0.0.1","root","","Diet");

				if(mysqli_connect_errno())
				{
					echo("Invalid Session, Please <a href='http://localhost/dms/UserLogin.php'>login</a> again.");
					die(' ');
				}
				else
				{
					$result = mysqli_query( $db , "SELECT * FROM diet_users WHERE username='$username'");
					while($row = mysqli_fetch_array($result))
					{
						$age = $row['age'];						
						$password = $row['password'];
						$name = strtolower($row['name']);
						$question = strtolower($row['question']);
						$answer = strtolower($row['answer']);
					}
				}
				if(isset($_POST['submit']))
				{
					$change = false;
					$query = "UPDATE expmgr_users SET ";
					if(strcmp($_POST['name'],strtolower($name)) != 0)
					{
							$name = $_POST['name'];
							$query = $query." name='$name'";
							$change = true;
					}
					if(strcmp($_POST['question'],strtolower($question)) !=0 )
					{
							$question = $_POST['question'];
							if($change) $query = $query.",";
							$query = $query."question='$question'"; 
							$change = true;
					}
					if(strcmp($_POST['answer'],strtolower($answer)) != 0)
					{
						$answer = $_POST['answer'];
						if($change) $query = $query.",";
						$query = $query."answer='$answer'";
						$change = true;
					}
					if(strcmp($_POST['age'],$age)!=0)
					{
						$age = $_POST['age'];
						if($change) $query = $query.",";
						$query = $query."age=$age";
						$change = true;
					}
					if($change == true)
					{
						$query = $query." WHERE username='$username';";
						dBug("Query : < $query >");
						mysqli_query($db , $query);
						echo "<p> Your Account information has been changed successfully. </p>";
					}
					else
					{
						dBug("No changes have been detected.");
					}
					
				}
			}
		?>
		<div class="mainDiv">
			<div class="leftBlock" > <p class="status" id="status">&nbsp; </p> </div>
			<div class="rightBlock">
				<table class="inputTable">
				<form action="ManageProfile.php" method="POST">
					<tr class="tabHead">
						<td colspan="2" align="center"><span id="heading"> Account Details </span> </td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td> Name   </td> 
						<td> <input name="name" type="text" value="<?php echo $name; ?>" id="name" onfocus="info('name')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td> Age    </td> 
						<td> <input name="age" type="text" value="<?php echo $age; ?>" id="age" onfocus="info('age')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td>Password   </td> 
						<td> <input type="password" name="password" value="" id="password" onfocus="info('password')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td> Re-Password   </td>
						<td> <input  type="password" name="repassword" value="" onfocus="info('password')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td> Question   </td>
						<td> <input type="text" name="question" value="<?php echo $question; ?>" id="question" onfocus="info('question')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td> Answer   </td> 
						<td> <input type="password" name="answer" value="<?php echo $answer; ?>" onfocus="info('answer')" onblur="clear_display()" /> </td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td colspan="2" align="right"> <input type="submit" name="submit" value="save" /> </td>
					</tr>
				</form>
				</table>
			</div>
		</div>
	</body>
</html>
