<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <script src="script.js"></script>
    <title>Add Patient</title> 
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
</html>

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
  
  echo			"<div id=\"div\">";
  echo				"<form> ";
  echo				"<fieldset>";
  echo					"<legend>New Patient: Personal Information</legend>";
  echo					"<label for=\"fname\">First Name: </label><input type=\"text\" value=\"" . $fName . "\"name=\"fname\" />";
  echo					"<label for=\"lname\">Last Name: </label><input type=\"text\" value=\"" . $lName . "\"name=\"lname\" />";
  echo					"<label for=\"gender\">Gender: </label><input type=\"text\" value=\"" . $Gender . "\"name=\"gender\" />";
  echo					"<label for=\"pCode\">Post Code: </label><input type=\"text\" placeholder=\"DD/MM/YYYY\" value=\"" . $pCode . "\"name=\"pCode\" />";
  echo					"<label for=\"dob\">D.O.B: </label><input type=\"text\" value=\"" . $DOB . "\"name=\"dob\" />";
  echo					"<input type=\"button\" value=\"Next\" class=\"button\" name=\"next\" onclick=\"formNext()\" >";
  echo					"<label id=\"status\"></label>";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo		  "</div>";
  
  echo 		"<div id=\"div2\" style=\"visibility:hidden;\" >";
  echo			  "<fieldset>";
  echo				  "<legend>New Patient: Medical Information</legend>";
  echo				  "<label for='cid'>Child ID: </label><input type='text' maxlength='5' placeholder='Unique 5 didgit ID' name='cid' value=\"" . $CID . "\">";
  echo				  "<label for='icd'>ICD: </label><input type='text' placeholder='Seperate each ICD with a space' name='icd' value=\"" . $ICD . "\"/>";
  echo				  "<label for='comments'>Comments</label></br>";
  echo				  "<textarea name='comments' class='field-textarea' rows='3' value=\"" . $Comments . "\ placeholder=\"Enter patient comments...\"></textarea></br>";
  echo				  "<input type=\"button\" value=\"Back\" class=\"button\" name=\"next\" onclick=\"formBack()\" >";
  echo				  "<input type='submit' value='Submit' name='submit' id='submit'/> </br>";
  echo				  "<label id='status'></label>";
  echo			  "</fieldset>";
  echo			"</form>";
  echo			"</div>";
  

  
  session_unset();
}
else
{
  echo			"<div id=\"div\">";
  echo				"<form> ";
  echo				"<fieldset>";
  echo					"<legend>New Patient: Personal Information</legend>";
  echo					"<label for=\"fname\">First Name: </label><input type=\"text\" name=\"fname\" />";
  echo					"<label for=\"lname\">Last Name: </label><input type=\"text\" name=\"lname\" />";
  echo					"<label for=\"gender\">Gender: </label><input type=\"text\" name=\"gender\" />";
  echo					"<label for=\"pCode\">Post Code: </label><input type=\"text\" name=\"pCode\" />";
  echo					"<label for=\"dob\">D.O.B: </label><input type=\"text\" placeholder=\"DD/MM/YYYY\" name=\"dob\" />";
  echo					"<input type=\"button\" value=\"Next\" class=\"button\" name=\"next\" onclick=\"formNext()\" >";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo		  "</div>	";
  
    
  echo 		"<div id=\"div2\" style=\"visibility:hidden;\" >";
  echo			  "<fieldset>";
  echo				  "<legend>New Patient: Medical Information</legend>";
  echo				  "<label for='cid'>Child ID: </label><input type='text' maxlength='5' placeholder='Unique 5 didgit ID' name='cid' />";
  echo				  "<label for='icd'>ICD: </label><input type='text' placeholder='Seperate each ICD with a space' name='icd' />";
  echo				  "<label for='comments'>Comments</label></br>";
  echo				  "<textarea name='comments' class='field-textarea' rows='3' placeholder=\"Enter patient comments...\"></textarea></br>";
  echo				  "<input type=\"button\" value=\"Back\" class=\"button\" name=\"next\" onclick=\"formBack()\" >";
  echo				  "<input type='submit' value='Submit' name='submit' id='submit'/> </br>";
  echo				  "<label id='status'></label>";
  echo			  "</fieldset>";
  echo			"</form>";
  echo			"</div>";


}


if (isset($_GET['submit']))
 {
  $fName = $_GET['fname'];
  $lName = $_GET['lname'];
  $Gender = $_GET['gender'];
  $pCode = $_GET['pCode'];
  $DOB = $_GET['dob'];
  $CID = $_GET['cid'];
  $ICD = $_GET['icd'];
  $Comments = $_GET['comments'];
  
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
  
  $_SESSION["fName"] = $fName;
  $_SESSION["lName"] = $lName;
  $_SESSION["Gender"] = $Gender;
  $_SESSION["pCode"] = $pCode;
  $_SESSION["DOB"] = $DOB;
  $_SESSION["CID"] = $CID;
  $_SESSION["ICD"] = $ICD;
  $_SESSION["Comments"] = $Comments;
  
  header("Location: confirmPatient.php");
  exit;
 }
?>