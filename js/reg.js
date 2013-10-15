function validate() {
    vp();
    vpc();
    ve();
}

function ve() {
    var x = document.getElementById("email").value;
    if (x != "") {
	document.getElementById("emailsign").style.visibility = "visible";
        var regexp = /.@./
        if (regexp.test(x)) {
            document.getElementById("emailsign").src = "images/ok.png";
            return true;
        }
        else {
            document.getElementById("emailsign").src = "images/error.png";
            return false;
        }
    }
    else
    document.getElementById("emailsign").style.visibility = "hidden";
}

function vp() {
    var x = document.getElementById("password").value;
    if (x != "") {
	 document.getElementById("passwpic").style.visibility = "visible";
        var regexp = /(?!^[0-9]*$)(?!^[a-zA-Z!@#$%^&*()_+=<>?]*$)^([a-zA-Z!@#$%^&*()_+=<>?0-9]{6,})$/
        if (regexp.test(x)) {
            document.getElementById("passwpic").src = "images/ok.png";
            document.getElementById("baloon").style.visibility = "hidden";
            return true;
        }
        else {
            document.getElementById("passwpic").src = "images/error.png";
            document.getElementById("baloon").style.visibility = "visible";
            return false;
        }
    }
    else
    document.getElementById("passwpic").style.visibility = "hidden";
}


function vpc() {
    var pw = document.getElementById("password").value;
    var pwc = document.getElementById("repeat_password").value;
    if (pwc != "") {
	document.getElementById("passwcpic").style.visibility = "visible";
        if (pw == pwc && vp()) {
            document.getElementById("passwcpic").src = "images/ok.png";
            return true;
        }
        else {
            document.getElementById("passwcpic").src = "images/error.png";

            return false;
        }
    }
	else

    document.getElementById("passwcpic").style.visibility = "hidden";
}