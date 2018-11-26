<?php global $activeNavbar; $activeNavbar=1; ?>
<!DOCTYPE HTML>
<html>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
    <head>
        <title>Search Book</title>
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/grid_system.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/book/book.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/book/search/search-book.css">
    </head>
    <body>
        <?php include 'frontend/common_files/navbar.php' ?>

        <div ng-app="searchBook" ng-controller="myCtrl">

            <div ng-class="inputClass" id="content">
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

            <div ng-class="resultClass" id="content">
                <div class="row" id="first-row">
                    <div class="kolom-md-1"></div>
                    <div class="kolom-md-10">
                        <div class="row">
                            <div class="kolom-md-6">
                                <h1 id="search-book-title">Search Result</h1>
                            </div>
                            <div class="kolom-md-6">
                                <p id="num-result-banner">Found {{resultsLength}} result(s)</h2>
                            </div>
                        </div>
                        <div class="row" id="search-result-list">
                            <div class="kolom-md-12">
                                <!--Di sini bakal generate data buku hasil pencarian -->
                                <!--Contoh satu baris hasil buku -->
                                    <div ng-repeat="row in results track by $index">
                                        <div class="row">
                                            <div class="kolom-md-2">
                                                <img class="img-thumbnail" src="{{row.cover}}" alt="{{row.title}}" label="{{row.title}}">
                                                <!-- <img class="img-thumbnail" src=<?php echo $row["cover"]." alt=".$row["title"]." label=".$row["title"] ?>> -->
                                            </div>
                                            <div class="kolom-md-10 display-block">
                                                <h2 class='book-title'>{{row.title}}</h2>
                                                <h3>{{row.author}} - {{row.rating == null ? "0.0" : row.rating | number:1}}/5.0 ({{row.voters}} votes)</h3>
                                                <p>{{row.description}}</p>
                                                <!-- <?php echo "<h2 class='book-title'>".$row["title"]."</h2>" ?>
                                                <?php echo "<h3>".$row["author"]." - ".sprintf("%.1f", $row["rating"])."/5.0 (".$row["voters"]." votes)</h3>" ?>
                                                <?php echo "<p>".$row["description"]."</p>" ?> -->
                                            </div>
                                        </div>
                                        <div class="row">
                                            <button class="detail-btn" onClick="redirectToDetails(row.book_id)">Detail</button>
                                        </div>                                   
                                    </div>
                                <!--End of contoh satu baris hasil buku -->
                            </div>
                        </div>
                    <div class="kolom-md-1"></div>
                </div>
            </div>

        </div>
    </body>

    <script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/book/search-book.js"></script>
</html>