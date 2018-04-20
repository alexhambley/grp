window.onload = function() {
    document.getElementById('form-username').addEventListener('submit', validateName);
    document.getElementById('form-other').addEventListener('submit', validate);
}

function validateName(event) {
    var form = document.forms['form-username'];
    var username = form['username'].value;
    if (!validateUsername(username)) {
        event.preventDefault();
        return;
    }
}

function validate(event) {
    var form = document.forms['form-other'];
    var email = form['email'].value;
    var phone = form['phone'].value;

    if (!validateEmail(email) || !validatePhone(phone)) {
        event.preventDefault();
        return;
    }
}

function showError(divName, helpName) {
    var div = document.getElementById(divName);
    var help = document.getElementById(helpName);
    div.classList.add("has-error");
    help.classList.remove("hidden");
}

function removeError(divName, helpName) {
    var div = document.getElementById(divName);
    var help = document.getElementById(helpName);
    div.classList.remove("has-error");
    help.classList.add("hidden");
}

function validateUsername(username) {
    var regex = /^[a-zA-Z\s]+$/;
    if (username.length < 2 || username.length > 50 || !regex.test(username)) {
        showError("div-username", "username-invalid");
        return false;
    }
    else {
        removeError("div-username", "username-invalid");
        return true;
    }
}

function validatePassword(password) {
    if (password.length < 6 || password.length > 50) {
        showError("div-password", "password-invalid");
        return false;
    }
    else {
        removeError("div-password", "password-invalid");
        return true;
    }
}

function validateEmail(email) {
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!regex.test(email) || email.length < 6 || email.length > 255) {
        showError("div-email", "email-invalid");
        return false;
    }
    else {
        removeError("div-email", "email-invalid");
        return true;
    }
}

function validatePhone(phone) {
    if (phone.length < 3 || phone.length > 30 || isNaN(phone)) {
        showError("div-phone", "phone-invalid");
        return false;
    }
    else {
        removeError("div-phone", "phone-invalid");
        return true;
    }
}