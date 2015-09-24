<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/menustyle.css">
    <script src="script.js"></script>
    <title>Main Menu</title> 
 </head>
 
 <?php
if ($_SESSION["accType"] == "peter")
{
echo 	"<html>";
echo		"<body>";
echo			"<div id=\"header\">";
echo				"<h1>Main Menu</h1>";
echo			"</div>";
echo			"<div id=\"content\">";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"addPatient.php\"class=\"menu\">Add Patient</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"viewData.php\"class\"menu\">View Data</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"editSearch.php\"class=\"menu\">Edit Patient</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"help.php\"class=\"menu\">Help</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"login.php\"class=\"menu\">Log Out</a>";
echo				"</div>";
echo			"</div>";
echo		"</body>";
echo	"</html>";	
}

elseif ($_SESSION["accType"] == "admin")
{
echo 	"<html>";
echo		"<body>";
echo			"<div id=\"header\">";
echo				"<h1>Main Menu</h1>";
echo			"</div>";
echo			"<div id=\"content\">";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"settings.php\"class=\"menu\">Settings</a>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"help.php\"class=\"menu\">Help</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"login.php\"class=\"menu\">Log Out</a>";
echo				"</div>";
echo			"</div>";
echo		"</body>";
echo	"</html>";	
}

elseif ($_SESSION["accType"] == "user")
{
echo 	"<html>";
echo		"<body>";
echo			"<div id=\"header\">";
echo				"<h1>Main Menu</h1>";
echo			"</div>";
echo			"<div id=\"content\">";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"addPatient.php\"class=\"menu\">Add Patient</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"editSearch.php\"class=\"menu\">Edit Patient</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"help.php\"class=\"menu\">Help</a>";
echo				"</div>";
echo				"<div id=\"menuItem\">";
echo					"<a href=\"login.php\"class=\"menu\">Log Out</a>";
echo				"</div>";
echo			"</div>";
echo		"</body>";
echo	"</html>";		
}
else
{
	echo "whoops! You shouldnt be here";
}
?>