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
	
		<br> <br> <h1> <center> Add new patient <center> </h1> </br> </br>
		<center>
		<form>
		<!--	
			textbox for input date
			radio button for request date or pickup date
		-->
			<table width ="30%">
			
				<tr> <td height="50" align="center">Child ID: </td> <td height="50" align="center"> <input type="text" name="cid" style="border: 1px solid black;"> </td></tr>
				<tr> <td height="50" align="center"> First Name: </td> <td height="50" align="center"> <input type="text" name="fname" style="border: 1px solid black;"></td></tr>
				<tr> <td height="50" align="center"> Last Name: </td> <td height="50" align="center"> <input type="text" name="lname" style="border: 1px solid black;"></td></tr>
				<tr> <td height="50" align="center"> Date of Birth: </td> <td height="50" align="center"> <input type="text" name="dob" style="border: 1px solid black;"></td></tr>
				<tr> <td height="50" align="center"> Postcode: </td> <td height="50" align="center"> <input type="text" name="pcode" style="border: 1px solid black;"></td></tr>
				<tr> <td height = "50" align="center"> Gender: </td> <td height="50" align="center"> <select name ="gender" style="border: 1px solid black;"><option value="Male">Male</option> <option value="Female">Female</option> </select> </td> </tr>
				<tr> <td height ="50" align="center"> <input type="submit" value="Add" style="width: 100px; height: 30px" onclick="confirmFunction()" > </td> <td height ="50" align="center"> <input type="reset" value="Reset" style="width: 100px; height: 30px" > </td> </tr>
			</table>
			
			
			
		</form>
		</center>
		<script>
			function confirmFunction() {
				var cid = document.getElementsByName("cid")[0].value;
				var fname = document.getElementsByName("fname")[0].value;
				var lname = document.getElementsByName("lname")[0].value;
				var dob = document.getElementsByName("dob")[0].value;
				var pcode = document.getElementsByName("pcode")[0].value;
				var gender = document.getElementsByName("gender")[0].value;
				
				var x = "CONFIRMATION:" + " \n \n";
				x += "Child ID: " + cid + "\n";
				x += "First name: " + fname + "\n";
				x += "Last name: " + lname + "\n";
				x += "Date of Birth: " + dob + "\n";
				x += "Postcode: " + pcode + "\n";
				x += "Gender: " + gender + "\n";
				
				if (confirm(x) == true)
				{
					
				}
				else
				{
				
				}
				
			//alert(x);
			}
		</script>
		
		<?php
			
			$user = 'root';
			$pass = '';
			$db = 'seproject';
			
			
			$DBConnect = @mysqli_connect("localhost", $user, $pass, $db)
				Or die ("<p>Unable to connect to the database server.</p>". "<p>Error code ". mysqli_connect_errno().": ". mysqli_connect_error()). "</p>";
	
			if (isset($_GET['cid']) && isset($_GET['fname']) && isset($_GET['lname']) && isset($_GET['dob']) && isset($_GET['pcode']) && isset($_GET['gender'])    )
			{
				$SQLstring = "insert into patient(ChildID, Firstname, Lastname, DateofBirth, Postcode, Gender) values (".$_GET['cid'].",' ".$_GET['fname']."','".$_GET['lname']."','".$_GET['dob']."',".$_GET['pcode'].",'".$_GET['gender']."' );";
				$queryResult = @mysqli_query($DBConnect, $SQLstring)
				 Or die ("<p>Unable to insert data into the patient table.</p>"."<p>Error code ". mysqli_errno($DBConnect). ": ".mysqli_error($DBConnect)). "</p>";
			echo "<p>Successfully inserted data into patient table</p>";
			}
		
		?>
		
	</body>

</HTML>