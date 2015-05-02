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
                    <label>Full Name <span class="required">*</span></label><input type="text" name="fName" class="field-divided" placeholder="First" />&nbsp;
                    <input type="text" name="lName" class="field-divided" placeholder="Last" />
                </li>
                <li>
					<label>Gender <span class="required">*</span></label>
                    <input type="text" name="gender" class="field-long" />
                </li>
                <li>
					<label>CID <span class="required">*</span></label>
                	<input type="text" name="CID" class="field-long" placeholder="Seperate CIDs with a comma" />
                </li>
                <li>
					<label>Post Code <span class="required">*</span></label>
                    <input type="text" name="pCode" class="field-long" />
                 </li>
                 <li>
                        <input type="submit" value="Submit" />
                 </li>
              </ul>
          </form>
	</div>
</body>
</html>