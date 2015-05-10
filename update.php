<HTML>

	<head>
		<title> Add new patient </title>
	</head>

	<body>
		<style>
			table, th, td{
			border: 1px solid black;
			}
			
		</style>
		
		<?php
			
			$user = 'root';
			$pass = '';
			$db = 'patients';
			$cid = $_GET["id"];
			
			$DBConnect = @mysqli_connect("localhost", $user, $pass, $db)
				Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
			
				$SQLstring = "select * from patients where CID='$cid'";
				$search = @mysqli_query($DBConnect, $SQLstring)
				 Or die ("<p>Unable to insert data into the patient table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
			$row = mysqli_fetch_row($search);
			echo "<form>";
			echo "<table width ='30%'>";
			while ($row)
			{
				echo "<tr> <th height='50' align='center'>Child ID: </th> <td height='50' align='center'> <input type='text' value='$row[5]' name='cid' style='border: 1px solid black;'> </td></tr>";
				echo "<tr> <th height='50' align='center'> First Name: </th> <td height='50' align='center'> <input type='text' value='$row[0]' name='fname' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <th height='50' align='center'> Last Name: </th> <td height='50' align='center'> <input type='text' value='$row[1]' name='lname' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <th height='50' align='center'> Date of Birth: </th> <td height='50' align='center'> <input type='text' value='$row[3]' name='dob' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <th height='50' align='center'> Postcode: </th> <td height='50' align='center'> <input type='text' value='$row[4]' name='pcode' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <th height='50' align='center'> Gender: </th> <td height='50' align='center'> <input type='text' value='$row[2]' name ='gender' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <th height='50' align='center'> ICD: </th> <td height='50' align='center'> <input type='text' value='$row[6]' name ='icd' style='border: 1px solid black;'></td></tr>";
				echo "<tr> <td height ='50' align='center'> <input type='submit' value='Update' style='width: 100px; height: 30px'> </td> <td height ='50' align='center'> <input type='reset' value='Reset' style='width: 100px; height: 30px' > </td> </tr>";
			$row = mysqli_fetch_row($search);
			}
			echo "</table>";
			echo "</form>";
			mysqli_free_result($search);
	
		
			if (isset($_GET['cid']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['dob']) && isset($_GET['pcode']) && isset($_GET['gender']) && isset($_GET['icd'])   )
			{
				 $newCid = $_GET['cid'];
				 $newFname = $_GET['fname'];
				 $newLname = $_GET['lname'];
				 $newDob = $_GET['dob'];
				 $newPcode = $_GET['pcode'];
				 $newGender = $_GET['gender'];
				 $newIcd = $_GET['icd'];
				 $SQLstring = "Update patients SET fname= '".$newFname."', lname='".$newLname."', DOB= '".$newDob."', PostCode= '".$newPcode."', Gender='".$newGender."', icd='".$newIcd."'where CID=".$newCid.";";
				 $queryResult = @mysqli_query($DBConnect, $SQLstring)
				 Or die ("<p>Unable to insert data into the patient table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
			echo $newFname;
			echo "<p>Successfully update data into patient table</p>";
			}
			
			
			mysqli_close($DBConnect);
			
		
		?>
		
	</body>

</HTML>
