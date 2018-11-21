document.getElementById("onoff-image").addEventListener("click",function(){
	xhr = new XMLHttpRequest();
	xhr.open("POST","http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/logout");
	xhr.send();
	window.location("http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/index");
});