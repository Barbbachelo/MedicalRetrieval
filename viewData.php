<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
<<<<<<< HEAD
 	<link rel="stylesheet" type="text/css" href="viewStyle.css">
 	<link rel="stylesheet" type="text/css" href="viewform.css">
    <script src="script.js"></script>
    <title>View Data</title> 
 </head>
 <html>
	<body>
        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
		 <div id="header"> 
			<a href="menu.php"class="menu">Main Menu</a>
        </div>
		<div id="div">
				<form> 
				<fieldset>
					<legend>View Data</legend>
					<label for="fname">First Name: </label><input type="text" name="fname" />
					<label for="lname">Last Name: </label><input type="text" name="lname" />
					<label for="gender">Gender: </label><input type="text" name="gender" />
					<label for="cid">Child ID: </label><input type="text" name="cid" />
					<label for="pCode">Post Code: </label><input type="text" name="pCode" />
					<label for="dob">D.O.B: </label><input type="text" name="dob" />
					<label for="icd">ICD: </label><input type="text" name="icd" /> 
					<input type="submit" value="Search" name="submit" id="submit"/>
				</fieldset>
			  </form>
		  </div>
		  <div id="results">
		  </div>
=======
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<link rel="stylesheet" type="text/css" href="forms.css">
    <script src="script.js"></script>
	<script src="updateFunction.js"></script>
    <title>View Data</title> 
 </head>
 <html>
 	<body>
	        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
			</div>
   	<div align="center">
   	  <h1>View Data</h1>
   	</div>
      <div align="center" id='form'>
        <form >
		 <ul class="form-style-1">
		  <li>
            First Name:	<input type="text" name="fName" class="field-long"> </label> 
			 </li>
			 <li>
            Last Name:	<input type="text" name="lName" class="field-long"> </label> 
			 </li>
			 <li>
            Patient ID:	<input type="text" name="PID" class="field-long"> </label> 
			 </li>
			 <li>
            Gender:	<input type="text" name="gender" class="field-long"> </label> 
			 </li>
			 <li>
            D.O.B:	<input type="text" name="DOB" class="field-long"> </label> 
			 </li>
			 <li>
            CID:	<input type="text" name="CID" class="field-long"> </label> <br>
			 </li>
			 <li>
            
            <input type="submit" value="Search" name="submit" />
			 </li>
			</ul>
		</form>
  </div>
>>>>>>> origin/master
</body>
  <?php
if (isset($_GET['submit']))
 {
<<<<<<< HEAD
	if (isset($_GET['fname']))
	{
		$fname = $_GET['fname'];
	}
	
	//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$searchQuery = "Select * from patients Where fName = '$fname';";
=======
	if (isset($_GET['fName']))
	{
		$fName = $_GET['fName'];
	}
	
	//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "patients");
	$searchQuery = "Select * from patients Where fName = '$fName';";
>>>>>>> origin/master
	$search = mysqli_query($connection, $searchQuery);
	$row_count = mysqli_num_rows($search);
	if ($row_count == 0)
	{
		echo 'Patient does not exist  <br/>';
	}
	else
	{
<<<<<<< HEAD
	echo "<table>";
=======
	echo "<table id='menu'>";
>>>>>>> origin/master
	echo "<tr>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Gender</th>
<<<<<<< HEAD
	<th>DOB</th>
	<th>Post Code</th>
	<th>Child ID</th>
	<th>Sibling ID</th>
	<th>ICD</th>
	<th>Status</th>
	<th>Date of Death</th>
	<th>Comments</th>
=======
	<th>D.O.B</th>
	<th>PostCode</th>
	<th>CID</th>
	<th>Action</th>
>>>>>>> origin/master
	</tr>";
	$row = mysqli_fetch_row($search);
	while ($row) 
	{
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td>{$row[4]}</td>";
<<<<<<< HEAD
		echo "<td>{$row[5]}</td>";
		echo "<td>{$row[6]}</td>";
		echo "<td>{$row[7]}</td>";
		echo "<td>{$row[8]}</td>";
		echo "<td>{$row[9]}</td>";
		echo "<td>{$row[10]}</td>";
		echo "<td>{$row[11]}</td>";
=======
		$id = $row[5];
		echo "<td>{$id}</td>";
		
		echo "<td><input type='submit' value='Update' name='submit' onclick='updateFunction({$id})'/></td></tr>";
>>>>>>> origin/master
		$row = mysqli_fetch_row($search);
	}
	echo "</table>";	
	
	mysqli_free_result($search);
	mysqli_close($connection);
	}
 }
<<<<<<< HEAD
?>
=======
?>
</html>
>>>>>>> origin/master
