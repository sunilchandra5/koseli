function validation() {
    var name = document.forms["form"]["name"].value;
    var nameformat = /^[a-zA-Z\s]*$/;
    if (name.trim() == "") {
        document.getElementById('nerror').innerHTML = "Name required";
        return false;
    } else if (!nameformat.test(name)) {
        document.getElementById('nerror').innerHTML = "Name only contain alphabates";
        return false;
    } else {
        document.getElementById('nerror').innerHTML = "";
    }
    var uname = document.forms["form"]["username"].value;
    if (uname.trim() == "") {
        document.getElementById('uerror').innerHTML = "UserName required";
        return false;
    } else {
        document.getElementById('uerror').innerHTML = "";
    }
    var pass = document.forms["form"]["password"].value;
    if (pass.trim() == "") {
        document.getElementById('perror').innerHTML = "Password required";
        return false;
    } else {
        document.getElementById('perror').innerHTML = "";
    }
    var cpass = document.forms["form"]["confirmpassword"].value;
    if (cpass != pass) {
        document.getElementById('cerror').innerHTML = "Password not matched";
        return false;
    } else {
        document.getElementById('cerror').innerHTML = "";
    }
    var email = document.forms["form"]["email"].value;
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (email.trim() == "") {
        document.getElementById('eerror').innerHTML = "Email required";
        return false;
    } else if (!mailformat.test(email)) {
        document.getElementById('eerror').innerHTML = "Email is not valid";
        return false;
    } else {
        document.getElementById('eerror').innerHTML = "";
    }
    var phone = document.forms["form"]["phone"].value;
    var phoneformat = /^([8-9]{2})*([0-9]{8})*$/;
    if (email.trim() == "") {
        document.getElementById('pherror').innerHTML = "Phone number requiered";
        return false;
    }
    if (!phoneformat.test(phone)) {
        document.getElementById('pherror').innerHTML = "invalid phone";
        return false;

    } else {
        document.getElementById('pherror').innerHTML = "";
    }
    var address = document.forms["form"]["address"].value;
    if (address.trim() == "") {
        document.getElementById('adderror').innerHTML = "Address required";
        return false;
    } else {
        document.getElementById('adderror').innerHTML = "";
        return true;
    }











}