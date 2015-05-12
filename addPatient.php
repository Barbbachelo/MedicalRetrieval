<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="forms.css">
    <link rel="stylesheet" type="text/css" href="addStyle.css">
    <script src="script.js"></script>
    <title>View Data</title> 
 </head>
 <html>
 	<body>
        <div id="header"> 
			<h1>Add Patient</h1>
			<a href="login.php" class="close">Log Out</a>
        </div>
    	<div class="div">
            <form>
              <ul class="form-style-1">
                <li>
                    <label>Full Name <span class="required">*</span></label><input type="text" name="fname" class="field-divided" placeholder="First" />&nbsp;
                    <input type="text" name="lname" class="field-divided" placeholder="Last" />
                </li>
                <li>
					<label>Gender <span class="required">*</span></label>
                    <input type="text" name="gender" class="field-long" />
                </li>
                <li>
					<label>Child ID <span class="required">*</span></label>
                	<input type="text" name="cid" class="field-long" />
                </li>
                <li>
					<label>Post Code <span class="required">*</span></label>
                    <input type="text" name="pcode" class="field-long" />
                 </li>
                <li>
					<label>Date of Birth <span class="required">*</span></label>
                    <input type="text" name="dob" class="field-long" />
                 </li> 
                <li>
					<label>ICD<span class="required">*</span></label>
                    <input type="text" name="ICD" class="field-long" placeholder="Seperate CIDs with a comma"  />
                 </li>                           
                 <li>
                        <input type="submit" value="submit" />
                 </li>
              </ul>
          </form>
	</div>
</body>
</html>

<?php
if (isset($_GET['submit']))
 {
  $fName = $_GET['user'];
  $lName = $_GET['lname'];
  $Gender = $_GET['gender'];
  $pCode = $_GET['pcode'];
  $DOB = $_GET['dob'];
  $CID = $_GET['cid'];
  $ICD = $_GET['icd'];
		
		
  $DBConnect = mysqli_connect("127.0.0.1", "root", "", "patients");
  $SQLstring = "INSERT INTO patients(FName, LName, PCode, Gender, D.O.B, CID, ICD) VALUES ($fName, $lName, $pCode, $Gender, $DOB, $CID, $ICD);";
  print($SQLstring);
  mysqli_query($DBConnect, $SQLstring);
 }
?>
