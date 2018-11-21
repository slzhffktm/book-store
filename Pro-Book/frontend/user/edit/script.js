document.getElementById("choose-img-btn").addEventListener("click", function () {
    document.getElementById("profile-img-hidden-input").click();
    
    // document.getElementById("profile-picture").src=x;
})
document.getElementById("profile-img-hidden-input").addEventListener("change", function(){
    var path = document.getElementById("profile-img-hidden-input").value;
    var file = document.getElementById('profile-img-hidden-input').files[0];
    var preview = document.getElementById("profile-picture");
    path = path.split("\\").pop();
    var reader  = new FileReader();
    reader.addEventListener("load", function () {
        preview.src = reader.result;
      }, false);
      if (file) {
        reader.readAsDataURL(file);
      }
    document.getElementById("profile-img-text").value = path;
})
function validateForm() {
    var name = document.forms["edit"]["name"].value;
    var address = document.forms["edit"]["address"].value;
    var phone = document.forms["edit"]["phone"].value;
    var card = document.forms["edit"]["card"].value;
    if (name == "") {
        alert("Name must be filled out");
        return false;
    } else if (name.length > 20) {
        alert("maximum char name 20");
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
    }else if (card == "") {
        alert("Card number must be filled out");
        return false;
    } else if (card.length != 12) {
        alert("Card number length must be 12");
        return false;
    }
     else {
        return true;
    }
}
