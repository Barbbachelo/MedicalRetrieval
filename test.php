<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <script src="script.js"></script>
    <title>Add Patient</title> 
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
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
<head> 
 	<link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <script src="script.js"></script>
    <title>Add Patient</title> 
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

	echo 		"<div id=\"div\">
				<form> 
  				<fieldset>
  					<legend>New Patient: Medical Information</legend>
  					<label for='cid'>Child ID: </label><input type='text' maxlength='5' placeholder='Unique 5 didgit ID' name='cid' />
  					<label for='icd'>ICD: </label><input type='text' placeholder='Seperate each ICD with a space' name='icd' />
  					<label for='comments'>Comments</label></br>
  					<textarea name='comments' class='field-textarea' rows='3' placeholder='Enter patient comments...'></textarea></br>
  					<input type='submit' value='Submit' name='submit' id='submit'/> </br>
  					<label id='status'></label>
  				</fieldset>
  			  </form>
			  </div>";

?>