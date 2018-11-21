<?php global $activeNavbar; $activeNavbar=2; ?>
<?php 
	function transform_date($date){
		$date = explode("-",$date);
		$date[1] = get_month_name($date[1]);
		return $date[2].' '.$date[1].' '.$date[0];
	}

	function get_month_name($monthNumber){
		$monthName = ['January','February','March','April','May','June','July','August','September','October','November','December'];

		return $monthName[$monthNumber-1];
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Review Page</title>
		<meta content="width=device-width, initial-scale=1" name="viewport" />
		<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/grid_system.css">
		<link rel="stylesheet" type="text/css" href="/tugasbesar2_2018/Pro-Book/frontend/common_files/navbar.css">
		<link rel="stylesheet" type="text/css" href="/tugasbesar2_2018/Pro-Book/frontend/user/history/style.css">
	</head>
	<body>
		<?php include 'frontend/common_files/navbar.php' ?>
		<div class="container">
			<div class="row" style="margin-top:15vh">
				<div class="kolom-md-3">
				</div>
				<div class="kolom-md-6">
					<h1 style="font-size:3em;color:orange">History</h1>
				</div>
			</div>
			<?php
				foreach($history as $key => $book){ 
					if($book['is_commented']){
						$book['comment'] = 'Anda sudah memberikan review';
						$book['button'] = '';
					} else {
						$book['comment'] = 'Belum direview';
						$book['button'] = "<a href='http://localhost/tugasbesar2_2018/Pro-Book/index.php/Review/show_review_page?book_id={$book['book_id']}&order_id={$book['order_id']}'><button class='review' >Review</button></a>";
					}

					$book['date'] = transform_date(explode(" ",$book['date'])[0]);
					echo
					"<div class='row first-row'>
						<div class='kolom-md-1'>
						</div>
						<div class='kolom-md-3 book-cover-div'>
							<img src='{$book['cover']}' class='book-cover'/>
						</div>
						<div class='kolom-md-4'>
							<div class='row'>
								<div class='kolom-md-12'>
									<h2 class='book-title'>{$book['title']}</h2>
								</div>
							</div>
							<div class='row'>
								<div class='kolom-md-12'>
									<h4>Jumlah : {$book['amount']}</h4>
								</div>
							</div>
							<div class='row'>
								<div class='kolom-md-12'>
									<h4>{$book['comment']}</h4>
								</div>
							</div>
						</div>
						<div class='kolom-md-3'>
							<div class='row'>
								<div class='kolom-md-12 display-block'>
									<p style='font-weight:bold'>{$book['date']}</p>
									<p style='font-weight:bold'>Nomor order : {$book['order_id']}</p>
								</div>
							</div>
							<div class='row'>
								<div class='kolom-md-12'>
									{$book['button']}
								</div>
							</div>
						</div>
					</div>
					";
				}
			?>
		</div>
	</body>
</html>