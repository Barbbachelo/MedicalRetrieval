<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/viewStyle.css">
 	<link rel="stylesheet" type="text/css" href="CSS/viewform.css">
    <link rel="stylesheet" type="text/css" href="CSS/breadcrumbCSS.css">
    <script src="graphs.js"></script>
    <title>View Data</title> 
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
            <legend>View Data</legend>
            <label for="ICD">ICD: </label><input type="text" name="icd" />
            <input type="submit" value="Search" name="submit" id="submit"/>
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
	if (isset($_GET['icd']))
	{
		$ICD = $_GET['icd'];
	}
	
	if (isset($_GET['pCode']))
	{
		$pCode = $_GET['pCode'];
	}
	include("ICDvsAge.php");
	ICDvsAgePie($ICD);
	echo "<script> document.getElementById('imageBox').src = 'chart.png'</script>";
 }
?>