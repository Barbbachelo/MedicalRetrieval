<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<html>

	<head> 
    	<script src = "searchfunction.js"></script>
		<link rel="stylesheet" type="text/css" href="CSS/searchCSS.css">
        <link rel="stylesheet" type="text/css" href="CSS/breadcrumbCSS.css">
		
		<title> Searching </title>
	</head>
	
	<body>
	        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
	<div id="crumbs"> 
            <?php include 'breadcrumb.php' ?>
        </div>
        
	<center>
	  <form method="post">
         
			<fieldset>
			<legend>Patient Search</legend>
				
				<input type="checkbox" onclick='handleClick1(this);' value="childID" > Child ID
				<div id="cid">	
				</div>

				<input type="checkbox" onclick='handleClick2(this);' value="fname"> First Name 
				<div id="fname">	
				</div>
				<input type="checkbox" onclick='handleClick3(this);' value="lname"> Last Name 
				<div id="lname">	
				</div>	
				<input type="checkbox" onclick='handleClick4(this);' value="dob"> Date of Birth 
				<div id="dob">	
				</div>
				<input type="checkbox" onclick='handleClick5(this);' value="pcode"> Postcode 
				<div id="pcode">	
				</div>
				<input type="checkbox" onclick='handleClick6(this);' value="gender"> Gender 
				<div id="gender">	
				</div> 
				<input type="checkbox" onclick='handleClick7(this);' value="icd"> ICD
				<div id="icd">
				</div>
                
				</br>
                
				<div id="button">
			    </div>
			 
			<div id="information">
			</div>
            
			</fieldset>
			</form>

	</center>

		
</body>

<?php
	
	//This allows connection to the Database locally hosted on the server
	//Needs to be MODIFIED depending on machine
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");

	//If the user decides to click on Search button
	//PLEASE NOTE THAT MODIFICATION needed depending on what the column headings are actually called
	//The part that is needed to be modified is the bit between the  backticks ` `
	if (isset($_POST['search']))
	{
		$string="";
		
		//Checks for input in First Name box
		if (isset($_POST['fname']))
		{
			//This stores the input of the First Name box into $fName and is released 
			$fName = $_POST['fname'];
			unset($_POST['fname']);
			if (strlen($fName) != 0)
			{

				//Modify column name here
				//This populates the WHERE clause later on that is needed to perform the sql query
				$string .="`FName` = '$fName'";
			}
		}
		
		//Checks for input in Last Name box
		if (isset($_POST['lname']))
		{
			$lName = $_POST['lname'];
			unset($_POST['lname']);
			if (strlen($lName) != 0)
			{
				
				if (strlen($string) != 0)
				{
					$string.=" and `LName` = '$lName'";
				}
				else
				{
					$string.="`LName` = '$lName'";
				}
			}
		}
		
		//Checks for postcode input
		if (isset($_POST['pcode']))
		{
			$pid = $_POST['pcode'];
			unset($_POST['pcode']);
			if (strlen($pid) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.=" and `PostCode` = '$pid'";
				}
				else
				{
					$string.="`PostCode` = '$pid'";
				}
			}
		}
		
		//Checks for Date of Birth Input
		if (isset($_POST['dob']))
		{
			
			
			$dob = $_POST['dob'];
			unset($_POST['dob']);
			
			
			$date_regex = '/^(19|20)\d\d[\-\/.](0[1-9]|1[012])[\-\/.](0[1-9]|[12][0-9]|3[01])$/';
			$newdate = $dob;
			
			if (!preg_match($date_regex, $newdate)) {
				echo '<br>Your hire date entry does not match the YYYY-MM-DD required format.<br>';
			} else {
				if (strlen($string) != 0)
				{
					$string.=" and `DOB` = '$newdate'";
					
				}
				else
				{
					$string.="`DOB` = '$newdate'";
					
				};      
			}
			
			//This is causing the issue, $dob is of Date type YYYY-MM-DD not a string
			// if (strlen($dob) != 0)
			// {
				// if (strlen($dob) != 0)
				// {
					// $string.= " and `DOB` = '$dob'";
				// }
				// else
				// {
					// $string.= " `DOB` = '$dob'";
				// }
			// }
		
		}
		
		//Checks for gender Input
		if (isset($_POST['gender']))
		{
			$gender = $_POST['gender'];
			unset($_POST['gender']);
			if (strlen($gender) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.=" and `Gender` = '$gender'";
				}
				else
				{
					$string.="`Gender` = '$gender'";
				}
			}
		}
		
		//Checks for Child ID input
		if (isset($_POST['cid']))
		{
			$cid = $_POST['cid'];
			unset($_POST['cid']);
			if (strlen($cid) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.=" and `CID` = '$cid'";
				}
				else
				{
					$string.="`CID` = '$cid'";
				}
			}
		}
		
		//Checks for icd input
		
		if (isset($_POST['icd']))
		{
			$icd = $_POST['icd'];
			
			unset($_POST['icd']);
			if (strlen($icd) != 0)
			{
				$temp1 = explode("|", $icd);
				
				$temp2 = "`ICD` LIKE '%$temp1[0]%'";
				if (count($temp1) > 1)
				{
					for ($i=1; $i < count($temp1); $i++)
					{
						$temp2.= " AND `ICD` LIKE '%$temp1[$i]%'";
					}
			
				}
				if (strlen($string) != 0)
				{
					$string.= " and ";
					$string.= $temp2;
				}
				else
				{
					$string.= $temp2;
				}
			}
		}
		
		//Search query is performed here 
		//.$string. allows the query to be dynamically modified to allow different searches from different columns
		$searchQuery = "Select * from patients Where ".$string.";";
		$search = mysqli_query($connection, $searchQuery);
		
		//This is needed to check if there are any results from the search terms given otherwise an error pops up
		$row_count = mysqli_num_rows($search) or die(mysqli_error($connection));
		

		if ($row_count == 0)
		{
			echo 'Patient does not exist  <br/>';
		}
		else
		{
			//Table is created here to show data on page
			echo "<center>";
			echo "<table>";
			echo "<tr>
			<th>CID</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>D.O.B</th>
			<th>PostCode</th>
			<th>Gender</th>
			<th>ICD</th>
			<th></th>
			<th></th>
			</tr>";
			
			//Grabs a row whicih is a search result
			$row = mysqli_fetch_row($search);
			
			//Whilst a result exists, populate the table under appropriate headings
			while ($row) 
			{
				echo "<tr><td>{$row[5]}</td>";
				echo "<td>{$row[0]}</td>";
				echo "<td>{$row[1]}</td>";
				echo "<td>{$row[3]}</td>";
				echo "<td>{$row[4]}</td>";
				echo "<td>{$row[2]}</td>";
				echo "<td>{$row[7]}</td>";
				$_SESSION["CID"] = $row[5];
				$_SESSION["fName"] = $row[0];
				$_SESSION["lName"] = $row[1];
				$_SESSION["Gender"] = $row[2];
				$_SESSION["pCode"] = $row[4];
				$_SESSION["DOB"] = $row[3];
				$_SESSION["ICD"] = $row[7];
				$_SESSION["Comments"] = $row[10];
				echo "<td><a href='editPatientFromSearch.php'>Edit </a></td>";
				echo "<td><a href='deletePatient.php'>Delete </a></td></tr>";
				
				$row = mysqli_fetch_row($search);
			}
			
			
			echo "</table>";	
			echo "</center>";
			
			//Frees up result to allow another search
			mysqli_free_result($search);
			
		}

		
	} //End of if search button is clicked on
		
		
		
		
	//This export required similar code to search because it needed a search result to be stored within the export block to extract data from, 
	//tried to store the search result in a variable but we were unable to solve that problem
	
	//BACKTICKS `` need to modified here as well to ensure the sql query can be performed
	//Change them to appropriate column headings used in Database
	if (isset($_POST['export']))
	{
		$string="";
		
		//Checks for input in First Name box
		if (isset($_POST['fname']))
		{
			//This stores the input of the First Name box into $fName and is released 
			$fName = $_POST['fname'];
			unset($_POST['fname']);
			if (strlen($fName) != 0)
			{
				//Modify column name here
				//This populates the WHERE clause later on that is needed to perform the sql query
				$string.= " `FName` = '$fName'";
			}
		}
		
		//Checks for input in Last Name box
		if (isset($_POST['lname']))
		{
			$lName = $_POST['lname'];
			unset($_POST['lname']);
			if (strlen($lName) != 0)
			{
				
				if (strlen($string) != 0)
				{
					$string.= " and `LName` = '$lName'";
				}
				else
				{
					$string.= " `LName` = '$lName'";
				}
			}
		}
		
		//Checks for postcode input
		if (isset($_POST['pcode']))
		{
			$pid = $_POST['pcode'];
			unset($_POST['pcode']);
			if (strlen($pcode) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.= " and `Postcode` = '$pcode'";
				}
				else
				{
					$string.= " `Postcode` = '$pcode'";
				}
			}
		}
		
		//Checks for Date of Birth Input
		if (isset($_POST['dob']))
		{
			$dob = $_POST['dob'];
			unset($_POST['dob']);
			if (strlen($dob) != 0)
			{
				if (strlen($dob) != 0)
				{
					$string.= " and `DOB` = '$dob'";
				}
				else
				{
					$string.= " `DOB` = '$dob'";
				}
			}
		}
		
		//Checks for gender Input
		if (isset($_POST['gender']))
		{
			$gender = $_POST['gender'];
			unset($_POST['gender']);
			if (strlen($gender) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.= " and `Gender` = '$gender'";
				}
				else
				{
					$string.= " `Gender` = '$gender'";
				}
			}
		}
		
		//Child ID input is checked
		if (isset($_POST['cid']))
		{
			$cid = $_POST['cid'];
			unset($_POST['cid']);
			if (strlen($cid) != 0)
			{
				if (strlen($string) != 0)
				{
					$string.= " and `CID` = '$cid'";
				}
				else
				{
					$string.= " `CID` = '$cid'";
				}
			}
		}
		
		//Checks for ICD input
		if (isset($_POST['icd']))
		{
			$icd = $_POST['icd'];
			
			unset($_POST['icd']);
			if (strlen($icd) != 0)
			{
				$temp1 = explode("|", $icd);
				
				$temp2 = "`ICD` LIKE '%$temp1[0]%'";
				if (count($temp1) > 1)
				{
					for ($i=1; $i < count($temp1); $i++)
					{
						$temp2.= " AND `ICD` LIKE '%$temp1[$i]%'";
					}
			
				}
				if (strlen($string) != 0)
				{
					$string.= " and ";
					$string.= $temp2;
				}
				else
				{
					$string.= $temp2;
				}
			}
		}
		
		//Search Query performed here
		$searchQuery = "Select * from patients Where ".$string.";";
		
		$search = mysqli_query($connection, $searchQuery);

		$row_count = mysqli_num_rows($search) or die(mysqli_error($connection));
		

		if ($row_count == 0)
		{
			echo 'Patient does not exist  <br/>';
			die();
		}
		else
		{
			//used to specify the file format that the search result will be exported as
			//Enables the browser to let the user know that the file is downloaded to the desktop with a date and timestamp
			$date = date("m-d-Y H:i");
			$filename = $date." export.csv";
			header('Content-Type: text/csv; charset=utf-8');
			header('Content-Disposition: attachment; filename='.$filename.'');
			header("Pragma: no-cache");
			header("Expires: 0");
			
			$output = fopen($_SERVER['DOCUMENT_ROOT'] . '/'.$filename.'', 'w');
		
			$row = mysqli_fetch_row($search);
			
			//This is needed to prevent html tags to show up on the csv file
			ob_end_clean();
			while ($row) 
			{
				//This makes it so that the data is separated by commas 
				echo "$row[5],";
				echo "$row[0],";
				echo "$row[1],";
				echo "$row[3],";
				echo "$row[4],";
				echo "$row[2],";
				echo "$row[7] \n";
				
				//Takes in file and an array as parameter
				//Writes it into the output file
				fputcsv($output, array_values($row));
				
				$row = mysqli_fetch_row($search);
				
			}
	
			mysqli_free_result($search);
			fclose($output);
			
			//exit is needed as another way to prevent further html tags to appear in output file
			exit();
		}

	
	}//End of when export button is finished
		
?>