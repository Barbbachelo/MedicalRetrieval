<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <script src="script.js"></script>
    <title>Add Sibling</title> 
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
if (!empty($_SESSION))
{
	$CID = $_SESSION["CID"];
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$searchQuery = "Select siblingID from patients Where CID = '$CID';";
	$search = mysqli_query($connection, $searchQuery);
	$row = mysqli_fetch_row($search);
	$siblingID = $row[0];
	
	if ($siblingID == "")
	{
		$siblingID = "A";
	}
	elseif ($siblingID == "A")
	{
		$siblingID = "B";
	}
	elseif ($siblingID == "B")
	{
		$siblingID = "C";
	}
	elseif ($siblingID == "C")
	{
		$siblingID = "D";
	}
	elseif ($siblingID == "D")
	{
		$siblingID = "E";
	}
	elseif ($siblingID == "E")
	{
		$siblingID = "F";
	}
	elseif ($siblingID == "F")
	{
		$siblingID = "G";
	}
	elseif ($siblingID == "G")
	{
		$siblingID = "H";
	}
	
	$newCID = $CID . $siblingID;
	

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
  echo				  "<label for=\"cid\">Child ID: </label><label>" . $newCID . "<label> </br> </br>";
  echo				  "<label for='icd'>ICD: </label><input type='text' placeholder='Seperate each ICD with a space' name='icd' />";
  echo				  "<label for='comments'>Comments</label></br>";
  echo				  "<textarea name='comments' class='field-textarea' rows='3' placeholder=\"Enter patient comments...\"></textarea></br>";
  echo				  "<input type=\"button\" value=\"Back\" class=\"button\" name=\"next\" onclick=\"formBack()\" >";
  echo				  "<input type='submit' value='Submit' name='submit' id='submit'/> </br>";
  echo				  "<label id='status'></label>";
  echo			  "</fieldset>";
  echo			"</form>";
  echo			"</div>";
  session_unset();
  $_SESSION["CID"] = $newCID;
}

if (isset($_GET['submit']))
 {
  $fName = $_GET['fname'];
  $lName = $_GET['lname'];
  $Gender = $_GET['gender'];
  $pCode = $_GET['pCode'];
  $DOB = $_GET['dob'];
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
  $_SESSION["SiblingID"] = $siblingID;
  $_SESSION["ICD"] = $ICD;
  $_SESSION["Comments"] = $Comments;
  
  header("Location: confirmSibling.php");
  exit;
 }
?>