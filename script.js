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
	document.getElementById('personInfo1').style.visibility = 'hidden';
	document.getElementById('personInfo2').style.visibility = 'visible';
}

function formBack()
{
	document.getElementById('personInfo1').style.visibility = 'visible';
	document.getElementById('personInfo2').style.visibility = 'hidden';

	
}