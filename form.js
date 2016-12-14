var name; var email;

//Checks for non-emptiness of name and returns error message if empty
//Allows submission only if both name and email are non-empty
function validateName(){
	name = document.forms["feedbackForm"]["name"].value;
    if (name == null || name == "") {
		document.getElementById("validation1").style.display = "block";
		document.feedbackForm.submit.disabled=true;
    }
	else if (email == null || email == ""){
		document.feedbackForm.submit.disabled=true;
        document.getElementById("validation1").style.display = "none";
    }
	else {
		document.getElementById("validation1").style.display = "none";
		document.feedbackForm.submit.disabled=false;
	}
}

//Validates email-- its being present and being of email type. Allows submission only if both name and email are filled.
function validateEmail(){
email = document.forms["feedbackForm"]["email"].value;
	var atpos = email.indexOf("@");
    var dotpos = email.lastIndexOf(".");
    if (email == null || email == "") {
		document.getElementById("validation3").style.display = "block";
		document.feedbackForm.submit.disabled=true;
    }
	else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		document.getElementById("validation3").innerHTML="Please enter a valid email address";
		document.getElementById("validation3").style.display = "block";
		document.feedbackForm.submit.disabled=true;
    }
	else if (name == null || name == ""){
		document.feedbackForm.submit.disabled=true;
        document.getElementById("validation3").style.display = "none";
    }
	else {
		document.getElementById("validation3").style.display = "none";
		document.feedbackForm.submit.disabled=false;
	}
}
