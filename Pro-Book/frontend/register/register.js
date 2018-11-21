var isUsernameValid = false;
var isEmailValid = false;
var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
function validateForm() {
    var name = document.forms["register"]["name"].value;
    var username = document.forms["register"]["username"].value;
    var email = document.forms["register"]["email"].value;
    var password = document.forms["register"]["password"].value;
    var confirmPassword = document.forms["register"]["confirmPassword"].value;
    var address = document.forms["register"]["address"].value;
    var phone = document.forms["register"]["phone"].value;
    if (name == "") {
        alert("Name must be filled out");
        return false;
    } else if (name.length > 20) {
        alert("maximum char name 20");
        return false;
    } else if (username == "") {
        alert("Username must be filled out");
        return false;
    } else if (!isUsernameValid) {
        alert("Username already used");
        return false;
    } else if (email == "") {
        alert("Email must be filled out");
        return false;
    } else if(!re.test(String(email).toLowerCase())){
        alert("Incorrect Email address");
        return false;
     }else if(!isEmailValid){
        alert("Email address already used");
        return false;
    } else if (password == "") {
        alert("Password must be filled out");
        return false;
    } else if (confirmPassword == "") {
        alert("Confirm Password must be filled out");
        return false;
    } else if(confirmPassword != password) {
        alert("Both passwords don't match");
        return false;
    } else if (address == "") {
        alert("Address must be filled out");
        return false;
    } else if (phone == "") {
        alert("Phone must be filled out");
        return false;
    } else if(phone.length < 9 || phone.length > 12){
        alert("Phone number must be in range 9 and 12");
        return false;
    }
     else {
        return true;
    }
}

function validateUsername(username) {
    var xhttp;    
    if (username == "") {
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
          if(this.responseText === "true"){
            document.getElementById('usernameChecklist').style.visibility="visible";
            isUsernameValid = true;
          } else{
            document.getElementById('usernameChecklist').style.visibility="hidden";
            isUsernameValid = false;
        }
      }
    };

    xhttp.open("GET", "http://localhost/tugasbesar1_2018/index.php/User/checkAvailability?username="+username, true);
    xhttp.send();
}

function validateEmail(email) {
    var xhttp;    
    if (email == "") {
      return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        if(this.responseText === "true" && re.test(String(email).toLowerCase())){
            document.getElementById('emailChecklist').style.visibility="visible";
            isEmailValid = true;
        } else{
            document.getElementById('emailChecklist').style.visibility="hidden";
            isEmailValid = false;
        }
      }
    };
    xhttp.open("GET", "http://localhost/tugasbesar1_2018/index.php/User/checkAvailability?email="+email, true);
    xhttp.send();
}


