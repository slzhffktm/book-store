<?php global $activeNavbar; $activeNavbar=1; ?>
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

        </div>
    </body>

    <script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/book/search-book.js"></script>
</html>