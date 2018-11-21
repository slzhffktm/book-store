document.getElementById("onoff-image").addEventListener("click",function(){
	xhr = new XMLHttpRequest();
	xhr.open("POST","http://localhost/tugasbesar1_2018/index.php/Auth/logout");
	xhr.send();
	window.location("http://localhost/tugasbesar1_2018/index.php/Auth/index");
});