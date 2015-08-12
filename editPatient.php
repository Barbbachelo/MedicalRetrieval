<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/editStyle.css">
 	<link rel="stylesheet" type="text/css" href="CSS/viewform.css">
    <script src="script.js"></script>
    <title>Edit Patient</title>
 </head>
 <html>
	<body>
        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
		 <div id="header"> 
			<a href="menu.php"class="menu">Main Menu</a>
        </div>
</body>
<?php
if (!empty($_SESSION) and isset($_SESSION["fName"]))
{
  $fName = $_SESSION["fName"];
  $lName = $_SESSION["lName"];
  $Gender = $_SESSION["Gender"];
  $pCode = $_SESSION["pCode"];
  $DOB = $_SESSION["DOB"];
  $CID = $_SESSION["CID"];
  $ICD = $_SESSION["ICD"];
  $Comments = $_SESSION["Comments"];
  $Null = "NULL";
  $DOB = strrev($DOB);
  
  echo			"<div id=\"div\">";
  echo				"<form> ";
  echo				"<fieldset>";
  echo					"<legend>Edit Patient</legend>";
  echo					"<label for=\"comments\">Add Sibling?</label> </br> </br>";
  echo					"<input type=\"submit\" value=\"Add\" name=\"add\" id=\"add\"/><br>";  
  echo					"<hr> </br>";
  echo					"<label for=\"fname\">First Name: </label><input type=\"text\" value=\"" . $fName . "\"name=\"fname\" /> <br> ";
  echo					"<label for=\"lname\">Last Name: </label><input type=\"text\" value=\"" . $lName . "\"name=\"lname\" /> <br> ";
  echo					"<label for=\"gender\">Gender: </label><input type=\"text\" value=\"" . $Gender . "\"name=\"gender\" /> <br> ";
  echo					"<label for=\"cid\">Child ID: </label><label>" . $CID . "<label> </br> </br>";
  echo					"<label for=\"pCode\">Post Code: </label><input type=\"text\" placeholder=\"DD/MM/YYYY\" value=\"" . $pCode . "\"name=\"pCode\" /> <br> ";
  echo					"<label for=\"dob\">D.O.B: </label><input type=\"text\" value=\"" . $DOB . "\"name=\"dob\" /> <br> ";
  echo					"<label for=\"icd\">ICD: </label><input type=\"text\" placeholder=\"Seperate each ICD with a space\" value=\"" . $ICD . "\"name=\"icd\" /> <br> "; 
  echo					"<fieldset id=\"RadioField\">";	
  echo					"<legend id=\"RadioLegend\">Patient Status</legend>";	
  echo					"<input type=\"radio\" name=\"PatientStatus\" value=\"Alive\" id=\"alive\" value=\"alive\" checked>Alive &nbsp; &nbsp;";  
  echo					"<input type=\"radio\" name=\"PatientStatus\" value=\"Deceased\" id=\"dead\" value=\"dead\" >Deceased <br><br> ";
  echo					"<input type=\"button\" value=\"Update\" name=\"Update\" onclick=\"showDateOfDeath()\" id=\"button\"/><br> <br>"; 
  echo					"<label for=\"dod\">D.O.D: </label><input type=\"text\" name=\"dateOfDeath\" id=\"dod\" /> ";
  echo					"</fieldset> </br>";
  echo					"<label for=\"comments\">Comments</label></br>";
  echo					"<textarea name=\"comments\" class=\"field-textarea\" rows=\"3\" placeholder=\"Enter patient comments...\">" . $Comments . "</textarea></br>";
  echo					"<input type=\"submit\" value=\"Submit\" name=\"submit\" id=\"submit\"/>";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo			  "</form>";
  echo		  "</div>	";
  
  if (isset($_GET['add']))
  {
	  $siblingCID = $_SESSION["CID"];
	  $accType = $_SESSION["accType"];	  
	  session_unset();
	  session_start(); 
	  $_SESSION["CID"] = $siblingCID;
	  $_SESSION["accType"] = $accType;
	  header("Location: addSibling.php");
  	  exit;
  }
  
  if (isset($_GET['submit']))
   {
	  $fName = $_GET['fname'];
	  $lName = $_GET['lname'];
	  $Gender = $_GET['gender'];
	  $pCode = $_GET['pCode'];
	  $DOB = $_GET['dob'];
	  $ICD = $_GET['icd'];
	  $Status = $_GET['PatientStatus'];
	  $DOD = $_GET['dateOfDeath'];
	  $Comments = $_GET['comments'];		 
	  $dobReversed = strrev($DOB);
	  $dodReversed = strrev($DOD);
		
  if($fName =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a first name'</script>";
	  exit();
  }
   if($lName =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a last name'</script>";
	  exit();
  }
   if($Gender =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a gender'</script>";
	  exit();
  }
   if($pCode =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a post code'</script>";
	  exit();
  }
   if($DOB =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a Date of Birth'</script>";
	  exit();
  }
   if($CID =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a Child ID'</script>";
	  exit();
  }
   if($ICD =="")
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter at least one ICD'</script>";
	  exit();
  }
     if(($Status =="dead") && ($DOD == ""))
  {
	  echo "<script> document.getElementById('status').innerHTML = 'Please enter a date of death'</script>";
	  exit();
  }
  
  $_SESSION["fName"] = $fName;
  $_SESSION["lName"] = $lName;
  $_SESSION["Gender"] = $Gender;
  $_SESSION["pCode"] = $pCode;
  $_SESSION["DOB"] = $dobReversed;
  $_SESSION["CID"] = $CID;
  $_SESSION["ICD"] = $ICD;
  $_SESSION["Comments"] = $Comments;
  $_SESSION["Status"] = $Status;
  $_SESSION["DOD"] = $dodReversed;
  
  header("Location: confirmEdit.php");
  exit;
   }
}

?>