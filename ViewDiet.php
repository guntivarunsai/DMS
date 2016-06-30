<html>
	<head>
		<title> DMS-View Diet Info </title>
		<link rel="stylesheet" href="http://localhost/dms/diet1/ViewDiet.css"></link>
	</head>
	<?php
		session_start();
		$submit = false;
		$where = null;
		if($_SESSION['loggedIn'] == true)
		{
			$username = $_SESSION['username'];
			$debug = false;
			function dBug($msg)
			{
				global $debug;
				if($debug)
				echo "<p>Debug : $msg</p>";
			}
		}
		else
		{
			echo "Please <a href='http://localhost/dms/UserLogin.html'>Login</a> to Continue . ";
			die('');
		}
		if(trim($_POST['search_query']) != NULL)
		{
			$submit = true;
			$where = trim($_POST['search_query']);
			dBug('Received Value : '.$where);
		}
		else
		{
			dBug('Internal Form Not Submitted.');
			if($debug)
				var_dump($_POST);
		}
	?>
	<body>
		<table class="header" width="100%">
			<tr>
				<td width="100%" align="center"> <h2> Dietary Management System </h2> </td>
			</tr>
		</table>
		<table width="100%" class='menubar'>
			<tr>
				<td class='menuitem'>  <a href="http://localhost/dms/MenuPage.php"> Home </a> </td>
				<td class='menuitem'>  <a href="http://localhost/dms/diet1/AddDietInfo.php"> Add Diet Info </a> </td>
				<td class='menuitem'>  <a href="http://localhost/dms/ManageProfile.php"> manage profile </a> </td>
				<td class='menuitem'>  <a href="http://localhost/dms/UserLogin.html"> logout <?php echo $username;?> </a> </td>
			</tr>
		</table>
		<?php
			$db = mysqli_connect("127.0.0.1","root","","diet");
			if(mysqli_connect_errno())
			{
				dBug("Error Connecting to Database.");
				echo "Error : Please <a href='http://localhost/dms/UserLogin.html'>Login</a> and try Again.";
				$_SESSION['loggedIn'] = false;
				session_unset();
			}
			else
			{
				if(!$submit)
				{
					$result = mysqli_query($db,"SELECT COUNT(*) FROM diet_$username;");
				}
				else
				{
					$result = mysqli_query($db,"SELECT COUNT(*) FROM diet_$username where lower(dietname)='$where' or lower(dietcategory)='$where' or lower(dietcomment)='$where' ;");
				}
				while($r = mysqli_fetch_array($result))
				{
					$count = $r['COUNT(*)'];
				}
				$count = (int)$count;
				if($count != 0)
				{
					if(!$submit)
						$result = mysqli_query($db , "SELECT dietname,dietamount,dietcategory,dietcomment,date_format(dietdate,'%d-%M-%Y') FROM diet_$username ORDER BY dietdate desc ;");
					else
					{
						$sort_order = (int)$_POST["sort_order"];
						$sort = "ORDER BY ";
						if($sort_order == 1)
							$sort =  $sort."dietcategory";
						else if($sort_order == 2)
							$sort = $sort."dietdate";
						else
							$sort = $sort."dietamount";
						$result = mysqli_query($db , "SELECT dietname,dietamount,dietcategory,dietcomment,date_format(dietdate,'%d-%M-%Y') FROM diet_$username where lower(dietname)=lower('$where') or lower(dietcategory)=lower('$where') or lower(dietcomment)=lower('$where') $sort ;");
						dBug("Query : SELECT dietname,dietamount,dietcategory,dietcomment,date_format(dietdate,'%d-%M-%Y') FROM diet_$username where lower(dietname)=lower('$where') or lower(dietcategory)=lower('$where') or lower(dietcomment)=lower('$where') $sort ;");
					}
					if($result)
					{
						?>
							<form name='filters' action='ViewDiet.php' method='POST'>
							<table name='optionsbar' class="optionsbar" width="100%">
								<tr>
									<td class='filter_head'> Search </td>
									<td> <input type='text' name='search_query' value='<?php echo $where; ?>' class='txtbox' />  </td>
									<td> <input type='submit' value='Filter' class='btn'/> </td>
								</tr>
								<tr class='sort_filter'>
									<td class='filter_head'> Sort By : </td>
									<td> Category <input type='radio' name='sort_order' value='1' /> </td>
									<td> Date <input  type='radio' name='sort_order' VALUE='2' checked /> </td>
									<td> Amount <input type='radio' name='sort_order' VALUE='3' /> </td>
								</tr>
							</table><br/>
							</form>
						<?php
						if(!$submit)
							echo "<h2> Diet Info : </h2>";
						else
							echo "<h2> Results : Diet Info containing '$where' </h2>";
						echo "<table class='exptable' width='100%'>";
						echo "<tr class='exptable_head'> <th> Name </th> <th> Amount </th> <th> Category </th> <th> Date</th> <th> Comment </th> </tr>";
						$tag = 2;
						$total = 0;
						while($row = mysqli_fetch_array($result))
						{
							$dietname = $row['dietname'];
							$dietamount = $row['dietamount'];
							$dietcategory = $row['dietcategory'];
							$dietcomment = $row['dietcomment'];
							$dietamount = (int) $dietamount;
							$total = $total + $dietamount;
							$dietdate = $row["date_format(dietdate,'%d-%M-%Y')"];
							echo "<tr class='style$tag'> <td> $dietname </td> <td> $dietamount </td> <td> $dietcategory </td> <td> $dietdate </td> <td> $dietcomment </td> </tr>";
							$tag = ($tag==1) ? 2 : 1;
						}
						echo "</table><br />";
						echo "<h2> Summary : </h2>";
						echo "<table class='summary_table' width='75%'>";
						echo "<tr> <td class='summary_head'> Total </td> <td> $total </td> </tr>";
						echo "</table>";
					}
					else
					{
						dBug("Count : $count , no results");
					}
				}
				else
				{
					if(!$submit)
						echo "No Diet Info Added Yet.";
					else
					{
						echo "No match found. ";
						$where = null;
						echo "<a href='http://localhost/dms/diet1/ViewDiet.php'> view all </a>";
					}
				}
			}
			?>
	</body>
</html>
