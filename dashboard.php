<?php
	require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mutiara Balige Hotel Information System</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/style.css" rel="stylesheet" />
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>  
</head>
<body>
 	<div class="carousel-inner">
		<div class="item active">						
			<img src="img/blank.jpg" class="img-responsive" alt="">
		</div>
			<div class="carousel-caption">
				<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">								
					<h1 style="color: #272727;"><span>Mutiara Balige Hotel</span></h1>
				</div>
				<div class="col-md-10 col-md-offset-1">
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
						<h3>Login dengan status:</h3>
					</div>
					<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
						<form class="form-inline">
							<div class="form-group">
								<a href="manager.php" class="btn btn-primary btn-lg">SET: Manager</a>
							</div>
							<div class="form-group">
								<a href="administrator.php" class="btn btn-primary btn-lg">SET: Administrator</a>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
		require_once(dirname(__FILE__).'/common/footer.php');
?>