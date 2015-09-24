<html>

	<head> 
       	
		<title> Searching </title>
	</head>
	
	<body>
	
		<style>
			table, th, td{
			border: 1px solid black;
			}
		</style>
		
		<style>
			input.disabled {
				pointer-events:none;
				color:#AAA;
				background:#F5F5F5;
			}
			input.enabled {
				border: 1px solid black;
			}
			
		</style>
	
		<br> <br> <h1> <center> Search patient <center> </h1> </br> </br>
		
		<center>
		<!--	
			textbox for input date
			radio button for request date or pickup date
		-->
			<table width ="30%">
			
				<tr> <td height="50" align="center"> <input type="checkbox" onclick='handleClick1(this);' value="childID"> Child ID </td> </tr>
				<tr> <td height="50" align="center"> <input type="checkbox" onclick='handleClick2(this);' value="fname"> First Name </td> </tr>
				<tr> <td height="50" align="center"> <input type="checkbox" onclick='handleClick3(this);' value="lname"> Last Name </td> </tr>
				<tr> <td height="50" align="center"> <input type="checkbox" onclick='handleClick4(this);' value="dob"> Date of Birth </td> </tr>
				<tr> <td height="50" align="center"> <input type="checkbox" onclick='handleClick5(this);' value="pcode"> Postcode </td> </tr>
				<tr> <td height = "50" align="center"> <input type="checkbox" onclick='handleClick6(this);' value="gender"> Gender </td> </tr>

			</table>
			<br><br><br>
			<form method="post">
				<div id="cid">	
				</div>
				<br>
				
				<div id="fname">	
				</div>
				<br>
				
				<div id="lname">	
				</div>
				<br>
				
				<div id="dob">	
				</div>
				<br>
				
				<div id="pcode">	
				</div>
				<br>
				
				<div id="gender">	
				</div>
				<br>
				
				<div id="button">
				</div>
				<br>
     
            
            </form>
            
			
			<div id="information">
			</div>
			<br>
		
		</center>
		
		<script>
		
			function appearButton()
			{
				if ((document.getElementById("cid").innerHTML != 0)
				|| (document.getElementById("fname").innerHTML != 0)
				|| (document.getElementById("lname").innerHTML != 0)
				|| (document.getElementById("dob").innerHTML != 0)
				|| (document.getElementById("pcode").innerHTML != 0)
				|| (document.getElementById("gender").innerHTML != 0))
				{
					var x = "<input type='submit' value='Search only' style='width: 100px; height: 30px' name='search' > &nbsp &nbsp  <input type='reset' value='Reset' style='width: 100px; height: 30px'>  &nbsp &nbsp  <input type='submit' name='export' value='Search and Export' style='width: 150px; height: 30px'>";
					if (document.getElementById("button").innerHTML != 0)
					{
					}
					else
					{
						document.getElementById("button").innerHTML = x;
						
					}
					
				}
				else
				{
					document.getElementById("button").innerHTML ="";
				}
			}
			
		
			function handleClick1(cb)
			{
				
				if (cb.checked == true)
				{
					document.getElementById("cid").innerHTML="Child ID: <input type='text' name='cid' style='border: 1px solid black'>";
					
				}
				else
				{
					document.getElementById("cid").innerHTML="";
					
				}
				appearButton();
			}
			
			function handleClick2(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("fname").innerHTML="First name: <input type='text' name='fname' style='border: 1px solid black'>";
				}
				else
				{
					document.getElementById("fname").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick3(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("lname").innerHTML="Last name: <input type='text' name='lname' style='border: 1px solid black'>";
				}
				else
				{
					document.getElementById("lname").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick4(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("dob").innerHTML="Date of birth: <input type='text' name='dob' style='border: 1px solid black'>";
				}
				else
				{
					document.getElementById("dob").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick5(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("pcode").innerHTML="Post Code: <input type='text' name='pcode' style='border: 1px solid black'>";
				}
				else
				{
					document.getElementById("pcode").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick6(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("gender").innerHTML="Gender: <select name='gender' style='border: 1px solid black'><option value='M'>Male</option> <option value='F'>Female</option> </select>";
				}
				else
				{
					document.getElementById("gender").innerHTML="";

				}
				appearButton();
			}	
			
		
			
		</script>
		
	</body>

<?php
		//function storeQuery($currentQuery)
		//{
			//$storedQuery = $currentQuery;
			//return $storedQuery;
		//}
		
		//$storedQuery = '';
				//header('Content-Description: File Transfer');
//				header('Content-Type: application/octet-stream');
//				header('Content-Disposition: attachment; filename=test.csv');
//				header('Expires: 0');
//				header('Cache-Control: must-revalidate');
//				header('Pragma: public');
		$connection = mysqli_connect("127.0.0.1", "root", "", "patients");
		
		$storedQuery = '';
		

		
		
		if (isset($_POST['search']))
		{
			$string="";
			//$searchQuery = "Select * from patients Where ";
			if (isset($_POST['fname']))
			{
				$fName = $_POST['fname'];
				unset($_POST['fname']);
				if (strlen($fName) != 0)
				{
					//$searchQuery .= "fName = '$fName'";
					$string .= "fName = '$fName'";
				}
			}
			if (isset($_POST['lname']))
			{
				$lName = $_POST['lname'];
				unset($_POST['lname']);
				//$string += " and lName= " + $lName;
				if (strlen($lName) != 0)
				{
					//$searchQuery .= " lName = '$lName'";
					if (strlen($string) != 0)
					{
						$string.= " and lName = '$lName'";
					}
					else
					{
						$string.= " lName = '$lName'";
					}
				}
			}
			if (isset($_POST['pcode']))
			{
				$pid = $_POST['pcode'];
				unset($_POST['pcode']);
				if (strlen($gender) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and postcode = '$gender'";
					}
					else
					{
						$string.= " postcode = '$gender'";
					}
				}
			}
			
			if (isset($_POST['dob']))
			{
				$dob = $_POST['dob'];
				unset($_POST['dob']);
				if (strlen($dob) != 0)
				{
					if (strlen($dob) != 0)
					{
						$string.= " and dob = '$dob'";
					}
					else
					{
						$string.= " dob = '$dob'";
					}
				}
			}
			
			if (isset($_POST['gender']))
			{
				$gender = $_POST['gender'];
				unset($_POST['gender']);
				if (strlen($gender) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and gender = '$gender'";
					}
					else
					{
						$string.= " gender = '$gender'";
					}
				}
			}
			if (isset($_POST['cid']))
			{
				$cid = $_POST['cid'];
				unset($_POST['cid']);
				if (strlen($cid) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and CID = '$cid'";
					}
					else
					{
						$string.= " CID = '$cid'";
					}
				}
			}
			
					//SQL Queries
			
			$searchQuery = "Select * from patients Where ".$string.";";
			$storedQuery = $searchQuery;
			$search = mysqli_query($connection, $storedQuery);
			//$array = mysqli_fetch_array($search);
			$row_count = mysqli_num_rows($search);
			
	
			if ($row_count == 0)
			{
				echo 'Patient does not exist  <br/>';
			}
			else
			{
			
				echo "<table id='menu'>";
				echo "<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>D.O.B</th>
				<th>PostCode</th>
				<th>CID</th>
				</tr>";
				
				$row = mysqli_fetch_row($search);
				
				
				while ($row) 
				{
					echo "<tr><td>{$row[0]}</td>";
					echo "<td>{$row[1]}</td>";
					echo "<td>{$row[2]}</td>";
					echo "<td>{$row[3]}</td>";
					echo "<td>{$row[4]}</td>";
					echo "<td>{$row[5]}</td></tr>";
					
					$row = mysqli_fetch_row($search);
				}
				
				
				echo "</table>";	
				
				//echo " <br><br> <input type='button' value='Export' >";
				//fclose($output);
				//exit();

				mysqli_free_result($search);
				
			}

			//unset($_POST['fname']);
			//unset($_POST['lname']);
			//unset($_POST['pcode']);
			//unset($_POST['cid']);
			//unset($_POST['gender']);
			//unset();
			//unset($_POST['submit']);
			
			
			
			
		} //End of if search button is clicked on
		
		if (isset($_POST['export']))
			{
				//Bunch of header configs
//<meta http-equiv="Content-Description" content="File Transfer" />
//        <meta http-equiv="Content-Type" content="text/csv; charset=utf-8" />
//        <meta http-equiv="Content-Disposition" content="attachment; filename="test.csv" />
//        <meta http-equiv="Pragma" content="public" />
//        <meta http-equiv="Expires" content="0" />
//       	<meta http-equiv="Cache-Control" content="must-revalidate" />
				
				
			
				//header('Content-Type: text/csv; charset=utf-8');
				//header('Content-Disposition: attachment; filename=test.csv');
				//header("Pragma: no-cache");
				//header("Expires: 0");
				
				$output = fopen('test.csv', 'w');
				
				$string="";
			//$searchQuery = "Select * from patients Where ";
			if (isset($_POST['fname']))
			{
				$fName = $_POST['fname'];
				unset($_POST['fname']);
				if (strlen($fName) != 0)
				{
					//$searchQuery .= "fName = '$fName'";
					$string .= "fName = '$fName'";
				}
			}
			if (isset($_POST['lname']))
			{
				$lName = $_POST['lname'];
				unset($_POST['lname']);
				//$string += " and lName= " + $lName;
				if (strlen($lName) != 0)
				{
					//$searchQuery .= " lName = '$lName'";
					if (strlen($string) != 0)
					{
						$string.= " and lName = '$lName'";
					}
					else
					{
						$string.= " lName = '$lName'";
					}
				}
			}
			if (isset($_POST['pcode']))
			{
				$pid = $_POST['pcode'];
				unset($_POST['pcode']);
				if (strlen($gender) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and postcode = '$gender'";
					}
					else
					{
						$string.= " postcode = '$gender'";
					}
				}
			}
			
			if (isset($_POST['dob']))
			{
				$dob = $_POST['dob'];
				unset($_POST['dob']);
				if (strlen($dob) != 0)
				{
					if (strlen($dob) != 0)
					{
						$string.= " and dob = '$dob'";
					}
					else
					{
						$string.= " dob = '$dob'";
					}
				}
			}
			
			if (isset($_POST['gender']))
			{
				$gender = $_POST['gender'];
				unset($_POST['gender']);
				if (strlen($gender) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and gender = '$gender'";
					}
					else
					{
						$string.= " gender = '$gender'";
					}
				}
			}
			if (isset($_POST['cid']))
			{
				$cid = $_POST['cid'];
				unset($_POST['cid']);
				if (strlen($cid) != 0)
				{
					if (strlen($string) != 0)
					{
						$string.= " and CID = '$cid'";
					}
					else
					{
						$string.= " CID = '$cid'";
					}
				}
			}
			
			
				//header('Content-Type: text/csv; charset=utf-8');
				//header('Content-Disposition: attachment; filename=test.csv');
				//header("Pragma: no-cache");
				//header("Expires: 0");
				
				$output = fopen('test.csv', 'w');
			
				fputcsv($output, array('First Name', 'Last Name','Gender', 'Date of Birth', 'Postcode', 'CID'));
				
			
				
				
			
			
					//SQL Queries
			
			$searchQuery = "Select * from patients Where ".$string.";";
			
			$search = mysqli_query($connection, $searchQuery);

			$row_count = mysqli_num_rows($search);
			
	
			if ($row_count == 0)
			{
				echo 'Patient does not exist  <br/>';
			}
			else
			{
			
				echo "<table id='menu'>";
				echo "<tr>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
				<th>D.O.B</th>
				<th>PostCode</th>
				<th>CID</th>
				</tr>";
				
				$row = mysqli_fetch_row($search);
				
				
				while ($row) 
				{
					
					echo "<tr><td>{$row[0]}</td>";
					echo "<td>{$row[1]}</td>";
					echo "<td>{$row[2]}</td>";
					echo "<td>{$row[3]}</td>";
					echo "<td>{$row[4]}</td>";
					echo "<td>{$row[5]}</td></tr>";
					fputcsv($output, array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]));
					$row = mysqli_fetch_row($search);
					
				}
				
				
				echo "</table>";	

				mysqli_free_result($search);
				fclose($output);
				exit();
			}

		
		}
		
?>