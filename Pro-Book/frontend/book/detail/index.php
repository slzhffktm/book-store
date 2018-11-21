<?php global $activeNavbar; $activeNavbar=1; ?>
<!DOCTYPE HTML>
<html>
    <head>
        <script>var rating = <?php echo $result["rating"] ?> </script>
        <script type="text/javascript" src="/tugasbesar1_2018/frontend/book/detail/detail.js"></script>
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <link rel="stylesheet" href="/tugasbesar1_2018/frontend/common_files/grid_system.css">
        <link rel="stylesheet" href="/tugasbesar1_2018/frontend/common_files/navbar.css">
        <link rel="stylesheet" href="/tugasbesar1_2018/frontend/book/detail/detail.css">
    </head>
    <body>
        <?php include 'frontend/common_files/navbar.php' ?>
        <div class="container" id="content">
            <div class="row" id="first-row">
                <div class="kolom-md-1"></div>
                <div class="kolom-md-10">
                    <div class="row book-info">
                        <div class="kolom-md-10 display-block info-text-wrapper">
                            <?php echo "<h1 style=\"color: orangered\">".$result["title"]."</h1>" ?>
                            <?php echo "<h5>".$result["author"]."</h5>" ?>
                            <?php echo "<p>".$result["description"]."</p>" ?>
                        </div>
                        <div class="kolom-md-2">
                            <div class="wrapper">
                                <div class="image-wrapper">
                                    <?php echo "<img src=".$result["cover"]." class=\"book-thumbnail\"/><img>" ?>
                                </div>
                                <div class="star-wrapper">
                                    <img id="star1" class="review-star" src="/tugasbesar1_2018/frontend/img_resource/starEmpty.png">
                                    <img id="star2" class="review-star" src="/tugasbesar1_2018/frontend/img_resource/starEmpty.png">
                                    <img id="star3" class="review-star" src="/tugasbesar1_2018/frontend/img_resource/starEmpty.png">
                                    <img id="star4" class="review-star" src="/tugasbesar1_2018/frontend/img_resource/starEmpty.png">
                                    <img id="star5" class="review-star" src="/tugasbesar1_2018/frontend/img_resource/starEmpty.png">
                                </div>
                                <?php echo "<div class=\"row rating-wrapper\"> ".sprintf("%.1f", $result["rating"])." / 5.0</div>" ?>
                            </div>
                        </div>
                    </div>
                    <div class="row order-row">
                        <div class="row">
                            <h2>Order</h2>
                        </div>
                        <div class="row">
                            <div class="row">
                                <label style="margin-right: 10px;">Jumlah: </label>
                                <select id="order-quantity">
                                    <?php
                                        for ($i=1; $i<=10; $i++)
                                        {
                                            ?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="row" style="margin: auto">
                                <?php echo "<button onclick=\"makeOrder('".$GLOBALS['user']->getUsername()."',".$result["book_id"].")\" id=\"order-btn\">Order</button>" ?>
                            </div>
                        </div>
                    </div>
                    <div class="row reviews-row">
                        <h2>Reviews</h2>
                        <!-- sample review -->
                        <?php foreach ($reviews as $review) { ?>
                        <div class="row" style="margin-top: 10px;">
                            <div class="kolom-md-1">
                                <!--profile picture -->
                                <!-- <div class="profile-picture-wrapper"> -->
                                    <?php echo "<img src = \"".$review["image_url"]."\" class=\"profile-picture\">"; ?>
                                <!-- </div> -->
                            </div>
                            <div class="kolom-md-10">
                                <!--review content-->
                                <!-- <div class="review-info-wrapper"> -->
                                    <?php echo "<h3>@".$review["username"]."</h3>"; ?>
                                    <?php echo "<div class=\"row\">".$review["comment"]."</div>"; ?>
                                <!-- </div> -->
                            </div>                            
                            <div class="kolom-md-1">
                                <!--star and review rating -->
                                <div class="review-star-wrapper">
                                    <img src="/tugasbesar1_2018/frontend/img_resource/starFull.png" class="review-info-star">
                                    <div class="row" style="font-weight: bold">
                                        <?php echo sprintf("%.1f", $review["rating"]) ?> / 5.0
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- end of sample review -->
                    </div>
                </div>
                <div class="kolom-md-1"></div>
            </div>
        </div>
        <div id="overlay">
            <div id="feedback">
                <div class="row">
                    <div class="kolom-md-12" style="justify-content:flex-end;margin-top:10px">
                        <h3 style="color:black;margin-right:3px" id="close-X">X</h3>
                    </div>
                </div>
                <div class="row" style="height:80%">
                    <div class="kolom-md-3">
                        <img src="/tugasbesar1_2018/frontend/img_resource/checklist-black.png" style="width:100%;height:80%">
                    </div>
                    <div class="kolom-md-6">
                        <h4 id="success-message"></h4>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
