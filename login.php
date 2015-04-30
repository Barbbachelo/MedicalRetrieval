<HTML XMLns="http://www.w3.org/1999/xHTML"> 
  <head> 
 	<link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title> 
  </head> 
  <body>
  <div align="center">
	<div id="h1">Login</div>
        <form >
            User name:	<input type="text" name="user"> </label> &nbsp;
            Password:	<input type="password" name="password"> </label> </br>
            </br>
            <input type="submit" value="Login" name="submit" />
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
	$connection = mysqli_connect("127.0.0.1", "root", "", "users");
	$passwordcheck = "Select Password from accounts Where Login = '$user';";
	$login = mysqli_query($connection, $passwordcheck);
	$row_count = mysqli_num_rows($login);
	if ($row_count == 0)
	{
		echo 'User does not exist  <br/>';
	}
	else
	{
		while($row = mysqli_fetch_array($login))
		{
			if ($password == $row[0])
			{
				header('Location:menu.php');
			}
			else
			{
				echo 'Password Incorrect <br/>';
			}
		}
	} 
	mysqli_free_result($login);
	mysqli_close($connection);
}
 ?>
  
  
</HTML>