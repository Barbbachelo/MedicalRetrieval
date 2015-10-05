<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/viewStyle.css">
 	<link rel="stylesheet" type="text/css" href="CSS/viewform.css">
    <link rel="stylesheet" type="text/css" href="CSS/breadcrumbCSS.css">
    <script src="graphs.js"></script>
    <title>Graph Menu</title> 
 </head>
 <html>
	<body>
        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
        <div id="crumbs">
			<?php include 'breadcrumb.php' ?>
        </div>	
		
        <center>
        <form> 
        <fieldset>
            <legend>Create Graph</legend>
            <label for="graph">Select graph type: </label>
			<select name="graphType" id="graphType">
			  <option value="IcdVsAge">ICD Vs Age</option>
			  <option value="IcdVsPcode">ICD per Postcode</option>
			  <option value="GenderVsIcd">Gender vs ICD</option>
			  <option value="StatusVsIcd">Status vs ICD</option>
			</select> 
			</br> </br>
			Pie<input type="radio" name="style" value="Pie"> &nbsp; &nbsp; &nbsp;
			Bar<input type="radio" name="style" value="Bar"> </br> </br>
			<label for="search">Search: </label><input type="search" id="search" name="search"/>
            </br></br><input type="submit" value="Search" name="submit" id="submit"/>
        </fieldset>
     	</form>
		
        <div id="graph">
		<img src=" " id="imageBox" ></img>
        </div>
		</center>
  </body>
</html>
 <?php

	 
if (isset($_GET['submit']))
 {
	if (isset($_GET['search']))
	{
		$searchValue = $_GET['search'];
	}
	
	if (isset($_GET['style']))
	{
		$style = $_GET['style'];
	}
	//include("ICDvspCode.php");
//	include("ICDvsGender.php");
//	include("ICDvsStatus.php");
	$graphType = $_GET['graphType'];
	
	if ($graphType == "IcdVsAge" && $style =="Pie")
	{
			include("ICDvsAge.php");
			ICDvsAgePie($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
	elseif ($graphType == "IcdVsAge" && $style =="Bar")
	{
			include("ICDvsAge.php");
			ICDvsAgeBar($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
		elseif ($graphType == "IcdVsPcode" && $style =="Pie")
	{
			include("ICDvspCode.php");
			ICDvspCodePie($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
		elseif ($graphType == "IcdVsPcode" && $style =="Bar")
	{
			include("ICDvspCode.php");
			ICDvspCodeBar($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
	elseif ($graphType == "GenderVsIcd" && $style =="Pie")
	{
			include("GenderVsIcd.php");
			GenderVsICDPie($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
		elseif ($graphType == "GenderVsIcd" && $style =="Bar")
	{
			include("GenderVsIcd.php");
			GenderVsICDBar($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
	elseif ($graphType == "StatusVsIcd" && $style =="Pie")
	{
			include("StatusVsICD.php");
			StatusVsICDPie($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
		elseif ($graphType == "StatusVsIcd" && $style =="Bar")
	{
			include("StatusVsICD.php");
			StatusVsICDBar($searchValue);
			echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
	}
	
 }
?>