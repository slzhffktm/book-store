function validateForm() {
    var username = document.forms["login"]["username"].value;
    var password = document.forms["login"]["password"].value;
    if (username == "") {
        alert("Username must be filled out");
        return false;
    } else if (password == "") {
        alert("Password must be filled out");
        return false;
    } else {
        return true;
    }
}
