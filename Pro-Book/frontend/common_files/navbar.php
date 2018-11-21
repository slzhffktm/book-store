<div id="navbar">
	<div class="row" id="navbar-first-row">
		<div class="kolom-md-6 navbar" id="left-side-navbar">
			<div class="title" id="left-title"><h1 style="color:rgba(242,216,0,1)">Pro</h1><h1 style="color:white">-Book</h1></div>
		</div>
		<div align="right" class="kolom-md-6" id="right-side-navbar">
			<a style="text-decoration-color:white" href="http://localhost/tugasbesar2_2018/Pro-Book/index.php/User/showUserProfile"><div class="title" id="right-title"><h3 style="color:white">Hi, <?php if($GLOBALS['user']){ echo $GLOBALS['user']->getUsername();}else { header("Refresh:0");} ?></h3></div></a>
			<div id="onoff-image">
				<a href="http://localhost/tugasbesar2_2018/Pro-Book/index.php/Auth/logout">
					<img class="img-responsive" src="/tugasbesar2_2018/Pro-Book/frontend/img_resource/onoff.png">
				</a>
			</div>
		</div>
	</div>
	<div class="row" id="navbar-second-row">
		<div class="kolom-md-4 <?php if ($activeNavbar == 1) {echo 'active';} ?>" onclick="window.location.replace('http://localhost/tugasbesar2_2018/Pro-Book/index.php/Book/index')" >
			<h1>Browse</h1>
		</div>
		<div class="kolom-md-4 <?php if ($activeNavbar == 2) {echo 'active';} ?>" onclick="window.location.replace('http://localhost/tugasbesar2_2018/Pro-Book/index.php/History/index')">
			<h1>History</h1>
		</div>
		<div class="kolom-md-4 <?php if ($activeNavbar == 3) {echo 'active';} ?>" onclick="window.location.replace('http://localhost/tugasbesar2_2018/Pro-Book/index.php/User/showUserProfile')">
			<h1>Profile</h1>
		</div>
	</div>
	<script src="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.js"></script>
</div>