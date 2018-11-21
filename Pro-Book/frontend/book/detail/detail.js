window.onload = function() {
    showStars(rating);
}

function showStars(rating) {
    star1 = document.getElementById("star1");
    star2 = document.getElementById("star2");
    star3 = document.getElementById("star3");
    star4 = document.getElementById("star4");
    star5 = document.getElementById("star5");

    if (rating >= 1) {
        star1.src = "/tugasbesar1_2018/frontend/img_resource/starFull.png";
    }
    if (rating >= 2) {
        star2.src = "/tugasbesar1_2018/frontend/img_resource/starFull.png";
    }
    if (rating >= 3) {
        star3.src = "/tugasbesar1_2018/frontend/img_resource/starFull.png";
    }
    if (rating >= 4) {
        star4.src = "/tugasbesar1_2018/frontend/img_resource/starFull.png";
    }
    if (rating >= 5) {
        star5.src = "/tugasbesar1_2018/frontend/img_resource/starFull.png";
    }
}


function makeOrder(username, book_id) {
    var e = document.getElementById("order-quantity");
    var amount = parseInt(e.options[e.selectedIndex].text);
    var xhttp = new XMLHttpRequest();
    var url = "/tugasbesar1_2018/index.php/Order/orderBook";
    var params = 'username='+username+"&book_id="+book_id+"&amount="+amount;
    xhttp.open("POST", url, true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhttp.onreadystatechange = function() {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            if(xhttp.responseText == "false"){
                window.location = "http://localhost/tugasbesar1_2018/index.php/Auth/index"
            }
            document.getElementById("success-message").innerHTML = "<p style='font-weight:bold'>Pesanan berhasil!</p><p>Nomor Transaksi:" + xhttp.responseText +"</p>";
            document.getElementById("overlay").style.display = "flex";
            document.getElementById("feedback").style.display = "block";
	    	document.getElementById("close-X").addEventListener("click", function(){
                document.getElementById("overlay").style.display = "none";
                document.getElementById("feedback").style.display = "flex";
            });
        }
    }
    xhttp.send(params);
}