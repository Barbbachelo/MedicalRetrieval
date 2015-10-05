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

				
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$CID = $_SESSION["CID"];
	//echo $CID;
	//Search query is performed here 
		//.$string. allows the query to be dynamically modified to allow different searches from different columns
		$searchQuery = "Select * from patients Where CID = ".$CID.";";
		$search = mysqli_query($connection, $searchQuery);
			
		//This is needed to check if there are any results from the search terms given otherwise an error pops up
		$row_count = mysqli_num_rows($search) or die(mysqli_error($connection));
		

		if ($row_count == 0)
		{
			echo 'Patient does not exist  <br/>';
		}
		else
		{
			$row = mysqli_fetch_row($search);
			while ($row) 
			{
				$fName = $row[0];
				$lName = $row[1];
				$Gender = $row[2];
				$pCode = $row[4];;
				$DOB = $row[3];;
				$ICD = $row[7];
				$Comments = $row[10];;
				$Status = $row[8];
				$DOD = $row[9];
				$Null = "NULL";
				$DOB = strrev($DOB);
				$row = mysqli_fetch_row($search);
			}
		}		
		echo		"<div id=\"div\">";
				  echo				"<form>";
				  echo				"<fieldset>";
				  echo					"<legend>Confirm Delete</legend>";
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
				  echo					"<input type=\"submit\" value=\"Delete\" name=\"delete\" id=\"delete\"/>";
				  echo					"&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				  echo					"<input type=\"submit\" value=\"Cancel\" name=\"cancel\" id=\"cancel\"/></br>";
				  echo 					"<input type=\"button\"  onclick=\"location.href='searching.php';\" value=\"Return to Search\"  id=\"return\" style=\"visibility:hidden;\" /></br>";
				  echo					"<label id=\"status\"></label>";
				  echo				"</fieldset>";
				  echo			  "</form>";
				  echo		  "</div>";
				
	
				  if (isset($_GET['delete']))
					 {
						$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
					  $SQLstring = "Delete FROM patients WHERE CID = '$CID'";
					  $result = mysqli_query($connection, $SQLstring);
					  if($result)
					  {
						 echo "<script> document.getElementById('status').innerHTML = 'Patient deleted successfully!'</script>";
						 echo "<script> document.getElementById('delete').style.visibility = 'hidden'</script>";
						 echo "<script> document.getElementById('cancel').style.visibility = 'hidden'</script>";
						 echo "<script> document.getElementById('return').style.visibility = 'visible'</script>";
 						 $accType = $_SESSION["accType"];	
						 session_unset();
						 $_SESSION["accType"] = $accType;
					  }
					 }
		
				  if (isset($_GET['cancel']))
					{
						header("Location: searching.php");
						exit;  
					}
?>