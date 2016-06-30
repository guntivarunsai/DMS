<html>
	<head>
		<title> Create New Account </title>
		<link rel='stylesheet' href='http://localhost/dms/RegisterUser.css'></link>
	</head>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
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
	$name = $_POST['name'];
	$age  = $_POST['age'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$question = $_POST['sQuestion'];
	$answer = $_POST['sAnswer'];
		dBug("Name     : $name");
		dBug("Age      : $age");
		dBug("Username : $username");
		dBug("Password : $password");
		dBug("Question : $question");
		dBug("Answer   : $answer");
	$db = mysqli_connect("localhost","root","","diet");
	if(mysqli_connect_errno())
	{
		dBug("Error : Could not make database connection.");
	}
	else
	{
		$result = mysqli_query($db,"INSERT INTO diet_users (name , age, username , password , question , answer ) VALUES ('$name' , $age ,  '$username' , '$password' , '$question' , '$answer' )");
		dBug("INSERT INTO diet_users VALUES ('$name' , $age ,  '$username' , '$password' , '$question' , '$answer' )");
		if($result == false)
		{
			dBug("Error : Data Cannot be inserted.");
			echo mysqli_error($db);
			echo "Username Already Taken, Please try again, <a href='http://localhost/ExpenseManager/RegisterUser.html'> Click here </a>";
		}
		else
		{
			$result = mysqli_query($db , "CREATE TABLE diet_$username
			 ( dietname varchar(100) not null, 
			 	dietamount int not null , 
			 	dietcategory varchar(100) not null , 
			 	dietcomment varchar(255) , 
			 	dietdate date not null , 
			 	id int not null primary key auto_increment );");
			if($result)
			{
					echo "Account Created Sucessfully, <a href='http://localhost/dms/UserLogin.html'> click here</a> to login.";
			}
			
			else
			{
				dBug("Query : CREATE TABLE diet_$username ( dietname varchar(100) not null, dietamount int not null , dietcategory varchar(100) not null , dietcomment varchar(255) , dietdate date not null , id int not null primary key auto_increment );");
				echo "Account Creation Failed.Please Try again!";
				mysqli_error($db);
			}
		}
	}
	?>
	</body>
</html>
