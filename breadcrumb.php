<?php 

// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

if ($_SESSION["accType"] == "peter")
{
echo '<a href= menu.php>Home</a> 
<a href= addPatient.php>Add Patient</a> 
<a href= searching.php>Search Patient</a> 
<a href= editSearch.php>Edit Patient</a>
<a href= viewData.php>Graph</a>';
}

if ($_SESSION["accType"] == "user")
{
echo '<a href= menu.php>Home</a> 
<a href= addPatient.php>Add Patient</a>';
}

if ($_SESSION["accType"] == "admin")
{
echo '<a href= menu.php>Home</a>';
}
?>