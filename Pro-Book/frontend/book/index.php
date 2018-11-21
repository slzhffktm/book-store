<?php global $activeNavbar; $activeNavbar=1; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>Search Book</title>
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/grid_system.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/book/book.css">
    </head>
    <body>
        <?php include 'frontend/common_files/navbar.php' ?>
        <div class="container" id="content">
            <div class="row" id="first-row">
                <div class="kolom-md-1"></div>
                <div class="kolom-md-10">
                    <h1 id="search-book-title">Search Book</h1>
                    <form style="width: 100%;" name="search_book" action="/tugasbesar2_2018/Pro-Book/index.php/Book/searchBook" method="get">
                        <input type="text" placeholder="Input search terms..." name="keyword">
                        <button type="submit" id="search-btn">Search</button>
                    </form>
                </div>
                <div class="kolom-md-1"></div>
            </div>
        </div>
    </body>
</html>