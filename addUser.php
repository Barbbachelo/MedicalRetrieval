<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/addStyle.css">
    <link rel="stylesheet" type="text/css" href="CSS/breadcrumbCSS.css">
    <title>Login</title> 
  </head> 
  <body>
  <div id="header"> 
			<a href="login.php" class="close">Log Out</a>
        </div>
		  <div id="crumbs"> 
            <?php include 'breadcrumb.php' ?>
        </div>
  <div align="center">
    <form> 
      <fieldset>
          <legend>New User</legend>
          <label for="user">Username: </label><input type="text" name="user" />
          <label for="password">Password </label><input type="text" name="password" />
          <input type="submit" value="Add User" name="submit" id="submit"/>
		  <label id="status"></label>
      </fieldset>
  </form>
  </div>
  </body> 
</html>
  
 <?php
if (isset($_GET['submit']))
 {
	if (isset($_GET['user']))
	{
		$user = $_GET['user'];
	}
	
	if (isset($_GET['password']))
	{
		$password = $_GET['password'];
	}
	
	
	//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$addUserString = "INSERT INTO users(User, Password, accountType) VALUES ('$user', '$password',  'user')";
	$result = mysqli_query($connection, $addUserString);
	

	  
	  if($result)
	  {
		 echo "<script> document.getElementById('status').innerHTML = 'User added successfully!'</script>";
	  }
	  else
	  {
		  echo  "<script> document.getElementById('status').innerHTML = 'Username already exists. Please enter a different username</script>";
	  }
	mysqli_close($connection);
}
 ?>