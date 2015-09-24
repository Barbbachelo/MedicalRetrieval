// JavaScript Document
function showDateOfDeath() {
   if (document.getElementById("dead").checked == true)
   {
	   document.getElementById("dod").style.visibility = 'visible';
	   document.getElementById("dodLabel").style.visibility = 'visible';
   }
   else
   {
	  document.getElementById("dodLabel").style.visibility = 'hidden';
	  document.getElementById("dod").style.visibility = 'hidden';
	  document.getElementById("dod").value = "";
	  
   }
}

function formNext()
{
	document.getElementById('div').style.visibility = 'hidden';
	document.getElementById('div2').style.visibility = 'visible';
}

function formBack()
{
	document.getElementById('div').style.visibility = 'visible';
	document.getElementById('div2').style.visibility = 'hidden';

	
}