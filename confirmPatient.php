<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <script src="script.js"></script>
    <title>Confirm</title> 
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
  $fName = $_SESSION["fName"];
  $lName = $_SESSION["lName"];
  $Gender = $_SESSION["Gender"];
  $pCode = $_SESSION["pCode"];
  $DOB = $_SESSION["DOB"];
  $CID = $_SESSION["CID"];
  $ICD = $_SESSION["ICD"];
  $Comments = $_SESSION["Comments"];
  $Null = "NULL";
  
  echo		"<div id=\"div\">";
  echo				"<form>";
  echo				"<fieldset>";
  echo					"<legend>Confirm Patient</legend>";
  echo					"<label for=\"fname\">First Name: ". $fName . "</label> </br>";
  echo					"<label for=\"lname\">Last Name: " . $lName . "</label> </br>";
  echo					"<label for=\"gender\">Gender: " . $Gender . "</label> </br>";
  echo					"<label for=\"cid\">Child ID: " . $CID . "</label> </br>";
  echo					"<label for=\"pCode\">Post Code: " . $pCode . "</label> </br>";
  echo					"<label for=\"dob\">D.O.B: " . $DOB . "</label> </br>";
  echo					"<label for=\"icd\">ICD: " . $ICD . "</label> </br>";
  echo					"<label for=\"comments\">Comments: </label></br>";
  echo                  "<label>" . $Comments . "</label> </br>";
  echo					"<input type=\"submit\" value=\"Edit\" name=\"edit\" id=\"edit\"/>";
  echo					"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  echo					"<input type=\"submit\" value=\"Confirm\" name=\"submit\" id=\"submit\"/></br>";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo			  "</form>";
  echo		  "</div>";
  
  if (isset($_GET['submit']))
	 {
	  $dobReversed = strrev($DOB);
		
	  $connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	  $SQLstring = "INSERT INTO patients(FName, LName, Gender, DOB, PostCode, CID, siblingID, ICD, Status, DateOfDeath, Comments, Extra) VALUES ('$fName', '$lName', '$Gender', 									      '$dobReversed','$pCode', '$CID', ' $Null' , '$ICD', '$Null', '$Null', '$Comments', '$Null');";
	  $result = mysqli_query($connection, $SQLstring);
	  
	  if($result)
	  {
		 echo "<script> document.getElementById('status').innerHTML = 'Patient added successfully!'</script>";
		 echo "<script> document.getElementById('edit').value = 'Add another patient?'</script>";
		 echo "<script> document.getElementById('submit').style.visibility = 'hidden'</script>";
		 $accType = $_SESSION["accType"];	
		 session_destroy();
		 session_start();
		 $_SESSION["accType"] = $accType;
	  }
	  else
	  {
		  echo "<script> document.getElementById('status').innerHTML = 'Error: Duplicate Child ID'</script>";
	  }
	}
  if (isset($_GET['edit']))
  {
	header("Location: addPatient.php");
  	exit;  
  }
?>