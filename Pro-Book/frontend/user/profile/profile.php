<!DOCTYPE HTML>
<?php global $activeNavbar; $activeNavbar=3; ?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/common_files/grid_system.css">
        <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/common_files/navbar.css">
        <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/user/profile/style.css">
    </head>
    <body>
        <?php include 'frontend/common_files/navbar.php'?>
        <div class="container" id="content">
            <div class="row" id="first-row">
                <div class="kolom-md-3">
                </div>
                <div class="row" id="profile-image-div">
                    <div class="kolom-md-2"></div>
                    <div class="kolom-md-8">
                        <div class="circle" style="background-image:url('<?php echo $user->getImageUrl();?>');"></div>
                    </div>
                    <div class="kolom-md-2" style="justify-content:flex-end;">
                        <a href="http://localhost/tugasbesar1_2018/index.php/User/showEditProfile">
                            <img id="edit-icon" src="/tugasbesar1_2018/frontend/img_resource/edit.png">
                        </a>
                    </div>
                </div>
                <div class="row display-name">
                    <h1><?php echo $user->getName();?> </h1>
                </div>
            </div>
            <div class="row" id="second-row">
                <div class="kolom-md-3">
                </div>
                <div class="kolom-md-6" style="margin-left:5%">
                    <h1>My Profile</h1>
                </div>
            </div>
            <div class="row margin" id="third-row">
                <div class="kolom-md-4">
                </div>
                <div class="kolom-md-3">
                    <img id="profile-icon" src="/tugasbesar1_2018/frontend/img_resource/username.png"><h2>Username</h2>
                </div>
                <div class="kolom-md-3">
                    <h2 id="username">@<?php echo $user->getUsername(); ?></h2>
                </div>
            </div>
            <div class="row margin" id="forth-row">
                <div class="kolom-md-4">
                </div>
                <div class="kolom-md-3">
                    <img id="profile-icon" src="/tugasbesar1_2018/frontend/img_resource/email.png"><h2>Email</h2>
                </div>
                <div class="kolom-md-3">
                    <h2 id="email"><?php echo $user->getEmail(); ?></h2>
                </div>
            </div>
            <div class="row margin" id="fifth-row">
                <div class="kolom-md-4">
                </div>
                <div class="kolom-md-3">
                    <img id="profile-icon" src="/tugasbesar1_2018/frontend/img_resource/address.png"><h2>Address</h2>
                </div>
                <div class="kolom-md-3">
                    <h2 id="address"><?php echo $user->getAddress(); ?></h2>
                </div>
            </div>
            <div class="row margin" id="sixth-row">
                <div class="kolom-md-4">
                </div>
                <div class="kolom-md-3">
                    <img id="profile-icon" src="/tugasbesar1_2018/frontend/img_resource/phone.png"><h2>Phone Number</h2>
                </div>
                <div class="kolom-md-3">
                    <h2 id="phone"><?php echo $user->getPhone(); ?></h2>
                </div>
            </div>
        </div>
    </body>
</html>