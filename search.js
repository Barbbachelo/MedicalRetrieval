function appearButton()
			{
				if ((document.getElementById("cid").innerHTML != 0)
				|| (document.getElementById("fname").innerHTML != 0)
				|| (document.getElementById("lname").innerHTML != 0)
				|| (document.getElementById("dob").innerHTML != 0)
				|| (document.getElementById("pcode").innerHTML != 0)
				|| (document.getElementById("gender").innerHTML != 0))
				{
					var x = "<input type='submit' value='Search' name='submit' > &nbsp &nbsp  <input type='reset' value='Reset'>";
					if (document.getElementById("button").innerHTML != 0)
					{
					}
					else
					{
						document.getElementById("button").innerHTML = x;
					}
					
				}
				else
				{
					document.getElementById("button").innerHTML ="";
				}
			}
			
			function handleClick1(cb)
			{
				
				if (cb.checked == true)
				{
					document.getElementById("cid").innerHTML="<label for=\'cid\'>Child ID: </label><input type=\'text\' maxlength='\5\' placeholder=\'Unique 5 didgit ID\' name=\'cid\' />";
					
				}
				else
				{
					document.getElementById("cid").innerHTML="";
					
				}
				appearButton();
			}
			
			function handleClick2(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("fname").innerHTML= "<label for=\"fname\">First Name: </label><input type=\"text\" name=\"fname\" />";
				}
				else
				{
					document.getElementById("fname").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick3(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("lname").innerHTML="<label for=\"lname\">Last Name: </label><input type=\"text\" name=\"lname\" />";
				}
				else
				{
					document.getElementById("lname").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick4(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("dob").innerHTML="<label for=\"dob\">D.O.B: </label><input type=\"text\" placeholder=\"DD/MM/YYYY\" name=\"dob\" />";
				}
				else
				{
					document.getElementById("dob").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick5(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("pcode").innerHTML="<label for=\"pCode\">Post Code: </label><input type=\"text\" name=\"pCode\" />";
				}
				else
				{
					document.getElementById("pcode").innerHTML="";
				}
				appearButton();
			}
			
			function handleClick6(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("gender").innerHTML="Gender: <select name='gender' style='border: 1px solid black'><option value='M'>Male</option> <option value='F'>Female</option> </select>";
				}
				else
				{
					document.getElementById("gender").innerHTML="";

				}
				appearButton();
			}	// JavaScript Document