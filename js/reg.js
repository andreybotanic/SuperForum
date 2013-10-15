function validate() {
    vp();
    vpc();
    ve();
}

function ve() {
    var x = document.getElementById("email").value;
    if (x != "") {
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
    document.getElementById("emailsign").src = "";
}

function vp() {
    var x = document.getElementById("password").value;
    if (x != "") {
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
    document.getElementById("passwpic").src = "";
}


function vpc() {
    var pw = document.getElementById("password").value;
    var pwc = document.getElementById("repeat_password").value;
    if (pwc != "") {
        if (pw == pwc && vp()) {
            document.getElementById("passwcpic").src = "images/ok.png";
            return true;
        }
        else {
            document.getElementById("passwcpic").src = "images/error.png";

            return false;
        }
    }
    document.getElementById("passwcpic").src = "";
}