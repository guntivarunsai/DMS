<html>
	<head>
		<title>Height and Weight by Body Frame For Adults </title>
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
			Height and Weight by Body Frame For Adults
		</h2>
<br>
<br>
		<p>
			To find out your Frame type simply place your thumb and index finger around your wrist
		</p>
		<ol>
			<li>
				Finger Overlaps with thumb------> Small Frame
			</li>
			<br>
			<li>
				Finger Touches the thumb-------->Medium Frame
			</li><br>
			<li>
				Finger do not touch the thumb--->Large Frame
			</li><br>
		</ol>

		<table border="0px" class="menubar" align="center" width="40%">
			<h3 align="center" style="color:blue	">Enter the details</h3>
			<form class="formname">
				<tr>
					<td>
						Gender:<input type="radio" name="Gender" value="Male">Male
							   <input type="radio" name="Gender" value="Female">Female
					</td>
				</tr>
				<tr>
					<td>
						Height:<input type="text" name="Height">cms
								<br><br>
					</td>
				</tr>
				<tr>
					<td >
						<input type="Submit" name="submit" value="Submit" id="submit" />
					</td>
				</tr>
			</form>
		</table><br><br><br><br>

		<table width="100%" class="header"><tr><td>
			<h2 align="center">Range of Healthy Weight for Height</h2>
		</td></tr>
</table>
		<table align="center" border="1px" cellpadding="1px" cellspacing="5px" width="50%" bgcolor="#A192A1">

		<tr>
			<td align="center">Height</td>
			<td align="center">Female</td>
			<td align="center">Male</td>
		</tr>
		<tr>
			<td></td>
			<td align="center"><b>Frame Size</b><br><b>Small  Medium  Large</b></td>
			<td align="center"><b>Frame Size</b><br><b>Small  Medium  Large</b></td>
		</tr>
		<tr>
<td align="center">5'0"</td>
			<td align="center">
				90 100 110
			</td>
			<td align="center">
				95 106 117
			</td>
		</tr>
		<tr>
			<td align="center">
			5'1"
			</td>
			<td align="center">
				95 105 116
			</td>
			<td align="center">
				101 112 123
			</td>
		</tr>
		<tr>
			<td align="center">
			5'2"
			</td>
			<td align="center">
				99 110 121
			</td>
			<td align="center">
				106 118 130
			</td>
		</tr>
		<tr>
			<td align="center">
			5'3"
			</td>
			<td align="center">
				104 115 127
			</td>
			<td align="center">
				112 124 136
			</td>
		</tr>
<tr><td align="center">5'4"</td><td align="center">108 120 132</td><td align="center">117 130 143
</td>
<tr><td align="center">5'5"</td><td align="center">113 125 138</td><td align="center">122 136 150
</td>
<tr><td align="center">5'6"</td><td align="center">117 130 143</td><td align="center">128 142 156
</td>
<tr><td align="center">5'7"</td><td align="center">122 135 149</td><td align="center">133 148 163
</td>
<tr><td align="center">5'8"</td><td align="center">126 140 154</td><td align="center">139 154 169
</td>
<tr><td align="center">5'9"</td><td align="center">131 145 160</td><td align="center">144 160 176
</td>
<tr><td align="center">5'10"</td><td align="center">135 150 165</td><td align="center">149 166 183
</td>
<tr><td align="center">5'11"</td><td align="center">140 155 171</td><td align="center">155 175 189
</td>
<tr><td align="center">6'0"</td><td align="center">144 160 176</td><td align="center">160 178 196
</td>
<tr><td align="center">6'1"</td><td align="center">149 165 182</td><td align="center">166 184 202
</td>
<tr><td align="center">6'2"</td><td align="center">153 170 187</td><td align="center">171 190 209
</td>
<tr><td align="center">6'3"</td><td align="center">158 175 193</td><td align="center">176 196 216
</td>
<tr><td align="center">6'4"</td><td align="center">162 180 198</td><td align="center">182 202 222
</td>
<tr><td align="center">6'5"</td><td align="center">167 185 204</td><td align="center">187 208 229
</td>

		</tr>
		</table>


				</body>
		</html>