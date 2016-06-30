<!DOCTYPE html>
<html>
<head>
<script type="text/javascript">

var slideimages = new Array() // create new array to preload images
slideimages[0] = new Image() // create new instance of image object
slideimages[0].src = "http://localhost/dms/imgs/image1.png" // set image src property to image path, preloading image in the process
slideimages[1] = new Image()
slideimages[1].src = "http://localhost/dms/imgs/image2.jpg"
//slideimages[2] = new Image()
//slideimages[2].src = "http://localhost/dms/slideshow/image3.jpg"
</script>
<meta charset="UTF-8" />
<title>DMS</title>
<link rel="stylesheet" type="text/css" href="http://localhost/dms/index.css">
</head>
<form>
<body>

<table class="header" width="100%">

<tr>
<td width="90%" align="center">
<h1>Dietary Management System</h1>
</td>
</table>
<table class="header1" align="center" width="18%">
<td>
	<h2><a href="http://localhost/dms/userlogin.html">Login </h2></a>
</td>

<td>
	<h2><a href="http://localhost/dms/RegisterUser.html">SignUp </h2></a>
</td>
</tr>
</table>
<!--
<table class="main" width="95%" border="1px" align="center">
<tr>
<td align="center">
<h2><a href="http://localhost/dms/DietManager.php">Diet Manager</h2></a></td>
<td align="center">
<h2><a href="http://localhost/dms/userlogin.php">Height and Weight Ratio</h2></a>
</td>
<td align="center">
<h2><a href="http://localhost/dms/userlogin.php">Calories Info</a>
</td>
<td align="center">
<h2><a href="http://localhost/dms/userlogin.php">Fat Calorie Info</h2></a>
</td>
<td align="center">
<h2><a href="http://localhost/dms/userlogin.php">BMI-Calculator</h2></a>
</td>--> 
<!--<td align="center">
<h2><a href="http://localhost/dms/userlogin.php">Need Help</h2></a>
</td>-->
</tr>
</table>
</form>
</body>
<img src="http://localhost/dms/imgs/image1.jpg" id="slide" width="100%" />

<script type="text/javascript">

//variable that will increment through the images
var step=0

function slideit(){
 //if browser does not support the image object, exit.
 if (!document.images)
  return
 document.getElementById('slide').src = slideimages[step].src
 if (step<1)
  step++
 else
  step=0
 setTimeout("slideit()",3500)
}

slideit()

</script>

</html>
