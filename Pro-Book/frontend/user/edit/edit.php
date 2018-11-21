<!DOCTYPE HTML>
<?php global $activeNavbar; $activeNavbar=3; ?>
<html>
	<head>
  	<meta content="width=device-width, initial-scale=1" name="viewport" />
    <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/common_files/grid_system.css">
    <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/common_files/navbar.css">
    <link rel="stylesheet" type="text/css" href="/tugasbesar1_2018/frontend/user/edit/style.css">
  </head>
  <body>
  	<?php include 'frontend/common_files/navbar.php'; ?>
    <div class="container">
      <div class="row">
        <div class="kolom-md-2">
        </div>
        <div class="kolom-md-10">
          <h1 style="color:orange">Edit Profile</h1>
        </div>
      </div>
      <form name= "edit" action="http://localhost/tugasbesar1_2018/index.php/User/editProfile" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
        <div class="row">
          <div class="kolom-md-2">
          </div>
          <div class="kolom-md-3">
            <div id="profile-img-square" ><img src= "<?php echo $user->getImageUrl(); ?>" id="profile-picture"></div>
          </div>
          <div class="kolom-md-5">
            <div class="row">
              <div class="kolom-md-12">
                <h3 id="update-profile-img-text">Update Profile Picture</h3>
              </div>
            </div>
            <div class="row" style="height:20%">
              <div class="kolom-md-8">
                <input type="text" id="profile-img-text" name="profile-img-text" readonly>
              </div>
              <div class="kolom-md-4">
                <button type="button" id="choose-img-btn">Browse...</button>
                <input type="file" id="profile-img-hidden-input" name="profile-img-hidden-input" accept="image/png, image/jpeg,image/jpg,image/JPG" />
              </div>
            </div>
          </div>
        </div>
        <div class="row row-margin">
          <div class="kolom-md-2">
          </div>
          <div class="kolom-md-3">
            <h3>Name</h3>
          </div>
          <div class="kolom-md-5">
            <input type="text" class="input-text" id="name" name="name" value="<?php echo $GLOBALS['user']->getName() ?>">
          </div>
        </div>
        <div class="row row-margin">
          <div class="kolom-md-2">
          </div>
          <div class="kolom-md-3">
            <h3>Address</h3>
          </div>
          <div class="kolom-md-5">
            <textarea id="address" name="address"><?php echo $user->getAddress(); ?></textarea>
          </div>
        </div>
        <div class="row row-margin">
          <div class="kolom-md-2">
          </div>
          <div class="kolom-md-3">
            <h3>Phone number</h3>
          </div>
          <div class="kolom-md-5">
            <input type="number" class="input-text" id="phone" name="phone" value="<?php echo $user->getPhone() ?>" />
          </div>
        </div>
        <div class="row row-margin">
          <div class="kolom-md-2">
          </div>
          <div class="kolom-md-4">
            <a href="http://localhost/tugasbesar1_2018/index.php/User/showUserProfile">
              <button type="button" id="back-button" onclick="back()">Back</button>
            </a>
          </div>
          <div class="kolom-md-4" style="justify-content: flex-end;">
            <button type="submit" id="submit-button" >Submit</button>
          </div>
        </div>
      </form>
      </div>
  </body>
  <script type="text/javascript" src="/tugasbesar1_2018/frontend/user/edit/script.js"></script>
</html>