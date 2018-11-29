var app = angular.module('searchBook', []);
app.controller('myCtrl', function ($scope) {

    $scope.resultClass = "hidden";

    $scope.getBooks = function (keyword) {

        var xhttp;
        if (keyword == "") {
            return;
        }
        
        document.getElementById("loader").style.display = "block";

        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {

            if (this.readyState == 4 && this.status == 200) {
                $scope.results = JSON.parse(this.response);

                console.log("Sample");
                console.log($scope.results[0]);
                
                document.getElementById("loader").style.display = "none";
                $scope.resultsLength = $scope.results.length;
                document.getElementById("search-result-container").style.display = "block";
                $scope.headTitle = "Search Result";
                $scope.$apply();
            } else if (this.status == 400) {
                alert('There was an error 400');
            }
        };

        xhttp.open("GET", "http://localhost//tugasbesar2_2018/Pro-Book/index.php/Book/searchBook?keyword=" + keyword, true);
        xhttp.send();
    };

    $scope.redirectToDetails = function (book_id) {
        var url = "detail?id=" + String(book_id);
        console.log("moving to ", url);
        window.location.assign(url);
    };

});

