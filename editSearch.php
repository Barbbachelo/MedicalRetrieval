<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
 	<link rel="stylesheet" type="text/css" href="CSS/viewform.css">
    <link rel="stylesheet" type="text/css" href="CSS/breadcrumbCSS.css">
    <script src="script.js"></script>
    <title>Edit Patient</title> 
 </head>
 <html>
	<body>
        <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
		<div id="crumbs"> 
            <?php include 'breadcrumb.php' ?>
        </div>
		<div id="div">
				<form> 
				<fieldset>
					<legend>Edit Patient</legend>
					<label for="CIDSearch">Enter Child ID to edit: </label><input type="text" name="CIDSearch" maxlength="5" />
                    <input type="submit" value="Search" name="submit" id="submit"/>
                    <label id="status"></label>
				</fieldset>
			  </form>
		  </div>
		  <div id="results">
		  </div>
</body>
<?php
if (isset($_GET['submit']))
 {
	if (isset($_GET['CIDSearch']))
	{
		$CIDSearch = $_GET['CIDSearch'];
	}
	
	//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$searchQuery = "Select CID from patients Where CID = '$CIDSearch';";
	$search = mysqli_query($connection, $searchQuery);
	$row_count = mysqli_num_rows($search);
	if ($row_count == 0)
	{
		echo "<script> document.getElementById('status').innerHTML = 'Patient does not exist'</script>";
	}
	else
	{
	$row = mysqli_fetch_row($search);
	$_SESSION["CID"] = $row[0];
	mysqli_free_result($search);
	mysqli_close($connection);
	header("Location: editPatientFromSearch.php");
    exit;
	}
 }
?>