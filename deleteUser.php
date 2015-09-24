<?php
// Start the session
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
?>
<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
    <link rel="stylesheet" type="text/css" href="CSS/forms.css">
    <link rel="stylesheet" type="text/css" href="CSS/loginStyle.css">
    <title>Login</title> 
  </head> 
  <body>
  <div align="center">
    <form> 
      <fieldset>
          <legend>Delete User</legend>
          <label for="user">Username: </label><input type="text" name="user" />
          <input type="submit" value="Delete User" name="submit" id="submit"/>
		  <input type="hidden" id="temp" name="temp">
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
	
	echo "<script> document.getElementById('temp').innerHTML = prompt(\"Please enter the administrator password to confirm user deletion\", \"\") </script>";
	
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$addUserString = "Select Password from users where User = 'admin'";
	$result = mysqli_query($connection, $addUserString);
	print_r ($_GET['temp']);
	while($row = mysqli_fetch_array($result))
	{
		if ($row[0] != $_GET['temp'])
		{
			echo "<script> document.getElementById('status').innerHTML = 'Password Incorrect!'</script>";
		}
		else
		{
			//SQL Queries
	$connection = mysqli_connect("127.0.0.1", "root", "", "medicalretrieval");
	$addUserString = "Delete from users where User = '$user'";
	$result = mysqli_query($connection, $addUserString);
	

	  
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
}
 ?>