<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="style.css">
    <script src="script.js"></script>
	<script src="updateFunction.js"></script>
    <title>View Data</title> 
 </head>
 <html>
 	<body>
   	<div align="center">
   	  <h1>View Data</h1>
   	</div>
      <div align="center" id='form'>
        <form >
            First Name:	<input type="text" name="fName"> </label> 
            Last Name:	<input type="text" name="lName"> </label> 
            Patient ID:	<input type="text" name="PID"> </label> 
            Gender:	<input type="text" name="gender"> </label> 
            D.O.B:	<input type="text" name="DOB"> </label> 
            CID:	<input type="text" name="CID"> </label> <br>
            
            <input type="submit" value="Search" name="submit" />
		</form>
  </div>
</body>
  <?php
if (isset($_GET['submit']))
 {
	if (isset($_GET['fName']))
	{
		$fName = $_GET['fName'];
	}
	
	//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "patients");
	$searchQuery = "Select * from patients Where fName = '$fName';";
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
	<th>Action</th>
	</tr>";
	$row = mysqli_fetch_row($search);
	while ($row) 
	{
		echo "<tr><td>{$row[0]}</td>";
		echo "<td>{$row[1]}</td>";
		echo "<td>{$row[2]}</td>";
		echo "<td>{$row[3]}</td>";
		echo "<td>{$row[4]}</td>";
		$id = $row[5];
		echo "<td>{$id}</td>";
		
		echo "<td><input type='submit' value='Update' name='submit' onclick='updateFunction({$id})'/></td></tr>";
		$row = mysqli_fetch_row($search);
	}
	echo "</table>";	
	
	mysqli_free_result($search);
	mysqli_close($connection);
	}
 }
?>
</html>
