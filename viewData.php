<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/viewStyle.css">
 	<link rel="stylesheet" type="text/css" href="CSS/viewform.css">
    <script src="graphs.js"></script>
    <title>View Data</title> 
 </head>
 <html>
	<body>
        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
		 <div id="header"> 
			<a href="menu.php"class="menu">Main Menu</a>
        </div>
		<div id="div">
				<form> 
				<fieldset>
					<legend>View Data</legend>
					<label for="fname">First Name: </label><input type="text" name="fname" />
					<label for="lname">Last Name: </label><input type="text" name="lname" />
					<label for="gender">Gender: </label><input type="text" name="gender" />
					<label for="cid">Child ID: </label><input type="text" name="cid" />
					<label for="pCode">Post Code: </label><input type="text" name="pCode" />
					<label for="dob">D.O.B: </label><input type="text" name="dob" />
					<label for="icd">ICD: </label><input type="text" name="icd" /> 
					<input type="submit" value="Search" name="submit" id="submit"/>
				</fieldset>
			  </form>
		  </div>
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
	include("ICDvspCode.php");
	ICDvspCodeBar($pCode);
	echo "<img src=\"chart.png\"></img>";
 }
?>