var flagn = false;
var flagp = false;
var flage = false;
function validate2() {    
	var y = document.forms["myForm"]["fphone"].value;
	if (y == null || y == "") {
		document.getElementById("validation2").style.display = "block";
		flagp=false;
    }
	else if (isNaN(Number(y))){
		document.getElementById("validation2").innerHTML="Please enter a number.";
		document.getElementById("validation2").style.display = "block";
		flagp=false;
	}
	else {
		document.getElementById("validation2").style.display = "none";
		flagp=true;
	}
}
function validate1(){
	var x = document.forms["myForm"]["fname"].value;
    if (x == null || x == "") {
		document.getElementById("validation1").style.display = "block";
		flagn=false;
    }
	else {
		document.getElementById("validation1").style.display = "none";
		flagn=true;
	}
}

function validate3(){
	var z = document.forms["myForm"]["femail"].value;
    if (z == null || z == "") {
		document.getElementById("validation3").style.display = "block";
		flage=false;
    }
	else {
		document.getElementById("validation3").style.display = "none";
		flage=true;
	}
}
function validateForm(){
var flag=true;
if (flagn==false  || flagp==false || flage==false){
flag=false;}
return flag;
}