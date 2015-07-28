<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="viewStyle.css">
 	<link rel="stylesheet" type="text/css" href="viewform.css">
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
if (!empty($_SESSION))
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
  
  echo			"<div id=\"div\">";
  echo				"<form> ";
  echo				"<fieldset>";
  echo					"<legend>Edit Patient</legend>";
  echo					"<label for=\"comments\">Add Sibling?</label> </br> </br>";
  //echo					"<input type=\"button\" value=\"Add\" name=\"add\" id=\"submit\"/><br>";  
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
  echo					"<input type=\"radio\" name=\"PatientStatus\" value=\"alive\" id=\"alive\" value=\"alive\" checked>Alive &nbsp; &nbsp;";  
  echo					"<input type=\"radio\" name=\"PatientStatus\" value=\"dead\" id=\"dead\" value=\"dead\" >Deceased <br><br> ";
  echo					"<input type=\"button\" value=\"Update\" name=\"Update\" onclick=\"showDateOfDeath()\" id=\"button\"/><br> <br>"; 
  echo					"<label for=\"dod\">D.O.D: </label><input type=\"text\" name=\"dateOfDeath\" id=\"dod\" /> ";
  echo					"</fieldset> </br>";
  echo					"<label for=\"comments\">Comments</label></br>";
  echo					"<textarea name=\"comments\" class=\"field-textarea\" rows=\"3\" laceholder=\"Enter patient comments...\">" . $Comments . "\"</textarea></br>";
  echo					"<input type=\"submit\" value=\"Submit\" name=\"submit\" id=\"submit\"/>";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo			  "</form>";
  echo		  "</div>	";
  session_unset();
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
		
	  $connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	  $SQLstring = "UPDATE patients SET FName='$fName', LName='$lName', Gender='$Gender', DOB='$dobReversed', PostCode='$pCode', CID='$CID', siblingID='NULL', ICD='$ICD', Status='$Status',    DateOfDeath='$dodReversed', Comments='$Comments', Extra='NULL' WHERE CID = '$CID'";
	  echo $SQLstring;
	  $result = mysqli_query($connection, $SQLstring);

   }
  }
?>