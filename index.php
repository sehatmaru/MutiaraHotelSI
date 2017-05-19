<?php
	require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Mutiara Balige Hotel</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/animate.css">
    <link href="css/animate.min.css" rel="stylesheet"> 
    <link href="css/style.css" rel="stylesheet" />
    <style type="text/css">
    	h3 .subheader {
			-khtml-opacity:.50; 
			-moz-opacity:.50; 
			-ms-filter:”alpha(opacity=50)”;
			 filter:alpha(opacity=50);
			 filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0.5);
			 opacity:.50; 
		}
    </style>
    
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script> 
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>  
</head>
<body>
  	<div class="slider">		
		<div id="about-slider">
			<div id="carousel-slider" class="carousel slide" data-ride="carousel">
				<ol class="carousel-indicators visible-xs">
					<li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
					<li data-target="#carousel-slider" data-slide-to="1"></li>
					<li data-target="#carousel-slider" data-slide-to="2"></li>
				</ol>

				<div class="carousel-inner">
					<div class="item active">						
						<img src="img/front-2.jpg" style="height: 75vh" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
								<div class="page-header">
									<h1>Mutiara Balige Hotel</h1>
								</div>
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">
									<h3 style="color: #E7E7E7;">Welcome to our Hotel Information System</h3>
								</div>
							</div>
						</div>
				    </div>
				    <div class="item">
						<img src="img/rooftop.jpg" style="height: 75vh" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
								<div class="page-header">
									<h1>We Are Ready To Serve You</h1>
								</div>
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
									<h3 style="color: #E7E7E7;">What you see is what you get</h3>
								</div>
							</div>
						</div>
				    </div> 
				    <div class="item">
						<img src="img/kamar-deluxe.jpg" style="height: 75vh" alt=""> 
						<div class="carousel-caption">
							<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.3s">
								<div class="page-header">
									<h1>Online Ordering</h1>
								</div>
								<div class="wow fadeInUp" data-wow-offset="0" data-wow-delay="0.6s">								
									<h3 style="color: #E7E7E7;">Enjoy our Online Reservation</h3>
								</div>
							</div>
						</div>
				    </div> 
				</div>
				
				<a class="left carousel-control hidden-xs" href="#carousel-slider" data-slide="prev">
					<i class="fa fa-angle-left"></i> 
				</a>
				
				<a class=" right carousel-control hidden-xs" href="#carousel-slider" data-slide="next">
					<i class="fa fa-angle-right"></i> 
				</a>
			</div>
		</div>
	</div>
<?php
		require_once(dirname(__FILE__).'/common/footer.php');
?>