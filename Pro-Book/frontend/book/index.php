<?php global $activeNavbar;
    $activeNavbar = 1; ?>
<!DOCTYPE HTML>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
<head>
    <title>Search Book</title>
    <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/grid_system.css">
    <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.css">
    <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/book/book.css">
</head>
<body>
<?php include 'frontend/common_files/navbar.php' ?>

<div ng-app="searchBook" ng-controller="myCtrl">

    <div class="container" id="content">
        <div class="row" id="first-row">
            <div class="kolom-md-1"></div>
            <div class="kolom-md-10">
                <h1 id="search-book-title">Search Book</h1>
                <form style="width: 100%;" name="search_book">
                    <input type="text" ng-model="keyword" placeholder="Input search terms..." name="keyword">
                    <button type="submit" id="search-btn" ng-click="getBooks(keyword)">Search</button>
                </form>
            </div>
            <div class="kolom-md-1"></div>
        </div>
    </div>

    <div id="loader"></div>

    <div id="search-result-container">
        <div class="row" id="second-row">
            <div class="kolom-md-1"></div>
            <div class="kolom-md-10">
                <div class="row">
                    <div class="kolom-md-6">

                    </div>
                    <div class="kolom-md-6">
                        <h2 id="num-result-banner">Found {{resultsLength}} result(s)</h2>
                    </div>
                </div>
                <div class="row" id="search-result-list">


                    <div ng-repeat="row in results track by $index" class="search-result-row">
                        <div class="row">
                            <div class="kolom-md-2 image-container">
                                <img class="img-thumbnail" src="{{row.Thumbnail}}" alt="{{row.Title}}"
                                     label="{{row.Title}}">
                            </div>
                            <div class="kolom-md-10 detail-container">
                                <h2 class='book-title'>{{row.Title}}</h2>
                                <h3>{{row.Author}} - {{row.Rating == null ? "0.0" : row.Rating | number:1}}/5.0
                                    ({{row.Voters == null ? 0 : row.Voters}} votes)</h3>
                                <p>{{row.Description}}</p>
                            </div>
                        </div>
                        <div class="row">
                            <button class="detail-btn" ng-click="redirectToDetails(row.ID)">Detail</button>
                        </div>
                    </div>
                </div>
                <div class="kolom-md-1"></div>
            </div>
        </div>

    </div>
</body>

<script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/book/search-book.js"></script>
</html>