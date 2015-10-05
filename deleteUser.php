<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/loginStyle.css">
    <title>Delete User</title> 
  </head> 
  <body>
  <div align="center">
    <form> 
      <fieldset>
          <legend>Delete User</legend>
          <label for="user">Username: </label><input type="text" name="user" />
		  <label for "password">Please re-enter the admin password:</label><input type="password" id="password" name="password"/>
		  <input type="submit" value="Delete User" name="submit" id="submit"/>
		  <label id="status"  name="status"></label>
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
	if(isset($_GET['password']))
	{
		$password = $_GET['password'];
	}
	
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$checkAdminPW = "Select Password from users where User = 'admin'";
	$result = mysqli_query($connection, $checkAdminPW); 
	$row = mysqli_fetch_row($result);
		if ($row[0] != $password)
		{
			echo "<script> document.getElementById('status').innerHTML = 'Password Incorrect!'</script>";
		}
		else
		{
			//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$deleteUserString = "Delete from users where User = '$user'";
	$result = mysqli_query($connection, $deleteUserString);
	
	  if($result)
	  {
		 echo "<script> document.getElementById('status').innerHTML = 'User deleted successfully!'</script>";
	  }
	  else
	  {
		  echo  "<script> document.getElementById('status').innerHTML = 'User does not exist</script>";
	  }
	mysqli_close($connection);
		}
}
 ?>