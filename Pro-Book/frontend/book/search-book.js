var app = angular.module('searchBook', []);
app.controller('myCtrl', function($scope) {
    $scope.resultClass = "hidden";
    $scope.getBooks = function(keyword) {
        var xhttp;    
        if (keyword == "") {
            return;
        }
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $scope.results = JSON.parse(this.response);
                $scope.results = JSON.parse(String($scope.results.return));
                $scope.results = $scope.results['Result'];

                console.log("Sample");
                console.log($scope.results[0]);

                $scope.resultsLength = $scope.results.length;
                $scope.resultClass = "";
                $scope.headTitle = "Search Result";
            } else if (this.status == 400) {
                alert('There was an error 400');
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