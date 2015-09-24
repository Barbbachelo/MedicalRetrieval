
			function appearButton()
			{
				if ((document.getElementById("cid").innerHTML != 0)
				|| (document.getElementById("fname").innerHTML != 0)
				|| (document.getElementById("lname").innerHTML != 0)
				|| (document.getElementById("dob").innerHTML != 0)
				|| (document.getElementById("pcode").innerHTML != 0)
				|| (document.getElementById("gender").innerHTML != 0)
				|| (document.getElementById("icd").innerHTML != 0))
				{
					var submitButton = "<input type='submit' value='Search only' id='submit' name='search'>";
					var resetButton = "<input type='submit' name='reset' id='submit' value='Reset'>";
					var exportButton = "<input type='submit' name='export' id='submit' value='Export as CSV' >";
					if (document.getElementById("button").innerHTML != 0)
					{
					}
					else
						
					{
					document.getElementById("button").innerHTML = submitButton + "&nbsp;" + resetButton + "&nbsp;" + exportButton; 	
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
					document.getElementById("cid").innerHTML= "<input type='text' maxlength='5' placeholder='Unique 5 digit ID' name='cid' />";
					
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
					document.getElementById("fname").innerHTML="<input type=\"text\" name=\"fname\" />";
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
					document.getElementById("lname").innerHTML="<input type=\"text\" name=\"lname\" />";
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
					document.getElementById("dob").innerHTML="<input type=\"text\" placeholder=\"DD/MM/YYYY\" name=\"dob\" />";
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
					document.getElementById("pcode").innerHTML="<input type=\"text\" name=\"pCode\" />";
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
					document.getElementById("gender").innerHTML=" <select name='gender' style='border: 1px solid black'><option value='M'>Male</option> <option value='F'>Female</option> </select>";
				}
				else
				{
					document.getElementById("gender").innerHTML="";

				}
				appearButton();
			}
			
			function handleClick7(cb)
			{
				if (cb.checked == true)
				{
					document.getElementById("icd").innerHTML="<input type=\"text\" name=\"icd\" placeholder=\"separate by space\" />";
				}
				else
				{
					document.getElementById("icd").innerHTML="";
				}
				appearButton();
			}
