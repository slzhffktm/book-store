<?php global $activeNavbar; $activeNavbar=1; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <script type="text/javascript" src="/tugasbesar2_2018/Pro-Book/frontend/book/search/search.js"></script>
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/grid_system.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.css">
        <link rel="stylesheet" href="/tugasbesar2_2018/Pro-Book/frontend/book/search/search-book.css">
    </head>
    <body>
        <?php include 'frontend/common_files/navbar.php' ?>
        <div class="container" id="content">
            <div class="row" id="first-row">
                <div class="kolom-md-1"></div>
                <div class="kolom-md-10">
                    <div class="row">
                        <div class="kolom-md-6">
                            <h1 id="search-result-display">Search Result</h1>
                        </div>
                        <div class="kolom-md-6">
                            <p id="num-result-banner">Found <?php echo "<u>".sizeof($result)."</u>" ?> result(s)</h2>
                        </div>
                    </div>
                    <div class="row" id="search-result-list">
                        <div class="kolom-md-12">
                            <!--Di sini bakal generate data buku hasil pencarian -->
                            <!--Contoh satu baris hasil buku -->
                            <?php 
                                foreach ($result as $row) { ?>
                                    <div class="row">
                                        <div class="kolom-md-2">
                                            <img class="img-thumbnail" src=<?php echo $row["cover"]." alt=".$row["title"]." label=".$row["title"] ?>>
                                        </div>
                                        <div class="kolom-md-10 display-block">
                                            <?php echo "<h2 class='book-title'>".$row["title"]."</h2>" ?>
                                            <?php echo "<h3>".$row["author"]." - ".sprintf("%.1f", $row["rating"])."/5.0 (".$row["voters"]." votes)</h3>" ?>
                                            <?php echo "<p>".$row["description"]."</p>" ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <button class="detail-btn" onClick="redirectToDetails(<?php echo $row["book_id"] ?>)">Detail</button>
                                    </div>                                   
                                <?php  } ?>
                            <!--End of contoh satu baris hasil buku -->
                        </div>
                    </div>
                <div class="kolom-md-1"></div>
            </div>
        </div>        
    </body>
</html>