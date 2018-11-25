var app = angular.module('searchBook', []);
app.controller('myCtrl', function($scope) {
    $scope.inputClass = "";
    $scope.getBooks = function(keyword) {
        var xhttp;    
        if (keyword == "") {
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $scope.results = this.response;
                console.log(this.response);
                $scope.inputClass = "hidden";
                $scope.headTitle = "Search Result";
                document.getElementById("content").innerHTML = $scope.results;
            }
        };

        xhttp.open("GET", "http://localhost//tugasbesar2_2018/Pro-Book/index.php/Book/searchBook?keyword="+keyword, true);
        xhttp.send();
    }
});

function redirectToDetails(book_id) {
    var url = "detail?id="+String(book_id);
    window.location.assign(url);
}