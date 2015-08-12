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
  $Status = $_SESSION["Status"];
  $DOD = $_SESSION["DOD"];
  $Null = "NULL";
  
  echo		"<div id=\"div\">";
  echo				"<form>";
  echo				"<fieldset>";
  echo					"<legend>Confirm Edit</legend>";
  echo					"<label for=\"fname\">First Name: ". $fName . "</label> </br>";
  echo					"<label for=\"lname\">Last Name: " . $lName . "</label> </br>";
  echo					"<label for=\"gender\">Gender: " . $Gender . "</label> </br>";
  echo					"<label for=\"cid\">Child ID: " . $CID . "</label> </br>";
  echo					"<label for=\"pCode\">Post Code: " . $pCode . "</label> </br>";
  echo					"<label for=\"dob\">D.O.B: " . $DOB . "</label> </br>";
  echo					"<label for=\"icd\">ICD: " . $ICD . "</label> </br>";
  echo					"<label for=\"Status\">Status: " . $Status . "</label> </br>";
  echo					"<label for=\"DOD\">Date of Death: " . $DOD . "</label> </br>";
  echo					"<label for=\"comments\">Comments: </label></br>";
  echo                  "<label>" . $Comments . "</label> </br>";
  echo					"<input type=\"submit\" value=\"Edit\" name=\"edit\" id=\"edit\"/>";
  echo					"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
  echo					"<input type=\"submit\" value=\"Confirm\" name=\"submit\" id=\"submit\"/></br>";
  echo					"<input type=\"submit\" value=\"Edit Another?\" name=\"editAnother\" id=\"editAnother\"/></br>";
  echo					"<label id=\"status\"></label>";
  echo				"</fieldset>";
  echo			  "</form>";
  echo		  "</div>";
  
  echo "<script> document.getElementById('editAnother').style.visibility = 'hidden'</script>";
  
  if (isset($_GET['submit']))
	 {
	  $connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	  $SQLstring = "UPDATE patients SET FName='$fName', LName='$lName', Gender='$Gender', DOB='$DOB', PostCode='$pCode', CID='$CID', siblingID='NULL', ICD='$ICD', Status='$Status',    DateOfDeath='$DOD', Comments='$Comments', Extra='NULL' WHERE CID = '$CID'";
	  $result = mysqli_query($connection, $SQLstring);
	  
	  if($result)
	  {
		 echo "<script> document.getElementById('status').innerHTML = 'Patient edited successfully!'</script>";
		 echo "<script> document.getElementById('edit').style.visibility = 'hidden'</script>";
		 echo "<script> document.getElementById('submit').style.visibility = 'hidden'</script>";
		 echo "<script> document.getElementById('editAnother').style.visibility = 'visible'</script>";
		 $accType = $_SESSION["accType"];	
		 session_destroy();
		 session_start();
		 $_SESSION["accType"] = $accType;
	  }
	 }
  if (isset($_GET['edit']))
	{
		header("Location: editPatient.php");
		exit;  
  	}
	
  if (isset($_GET['editAnother']))
	{
		header("Location: editSearch.php");
		exit;  
  	}
?>