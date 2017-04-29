<?php
	if(isset($_POST['submit'])){
		include('koneksi.php');
		
		$nama		= $_POST['nama'];
		$email		= $_POST['email'];
		$phone		= $_POST['phone'];
		$rating		= $_POST['rating'];
		$feedback	= $_POST['feedback'];
		
		$query = mysql_query("INSERT INTO feedback VALUES(NULL, '$nama', '$email', '$phone', '$rating', '$feedback')") or die(mysql_error());
		
		if($query){
				require_once(dirname(__FILE__).'/common/header.php');
			?>
			<!DOCTYPE html>
				<html lang="en">
					<head>
						<meta charset="utf-8">
					    <meta http-equiv="X-UA-Compatible" content="IE=edge">
					    <meta name="viewport" content="width=device-width, initial-scale=1">

					    <title>Feedback Success</title>

					    <link href="css/bootstrap.min.css" rel="stylesheet">
						<link rel="stylesheet" href="css/font-awesome.min.css">
						<link rel="stylesheet" href="css/animate.css">
						<link href="css/animate.min.css" rel="stylesheet"> 
						<link href="css/style.css" rel="stylesheet" />

					    <script src="js/jquery.js"></script>        
					    <script src="js/bootstrap.min.js"></script> 
					    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
					    <script src="js/wow.min.js"></script>
					    <script>wow = new WOW({}).init();</script>  
					</head>
					<body>	
						<section class="contact-page">
					        <div class="container">
					            <div class="text-center">        
					                <h2>Thank You for Your Submission !</h2>
					                <p>We will improve our Hotel services with your feedback.</p>
					            </div> 
					        </div>
					    </section>    
					</body>
				</html>
			<?php
			   	require_once(dirname(__FILE__).'/common/footer.php');
        }else{
			require_once(dirname(__FILE__).'/common/header.php');
		?>
		<!DOCTYPE html>
			<html lang="en">
				<head>
					<meta charset="utf-8">
				    <meta http-equiv="X-UA-Compatible" content="IE=edge">
				    <meta name="viewport" content="width=device-width, initial-scale=1">

				    <title>Feedback Error</title>

				    <link href="css/bootstrap.min.css" rel="stylesheet">
					<link rel="stylesheet" href="css/font-awesome.min.css">
					<link rel="stylesheet" href="css/animate.css">
					<link href="css/animate.min.css" rel="stylesheet"> 
					<link href="css/style.css" rel="stylesheet" />

				    <script src="js/jquery.js"></script>        
				    <script src="js/bootstrap.min.js"></script> 
				    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
				    <script src="js/wow.min.js"></script>
				    <script>wow = new WOW({}).init();</script>  
				</head>
				<body>	
					<section class="contact-page">
				        <div class="container">
				            <div class="text-center">        
				                <h2>Error while sending your feedback !</h2>
				            </div> 
				        </div>
				    </section>    
				</body>
			</html>
		<?php
		   	require_once(dirname(__FILE__).'/common/footer.php');
        }
    }else{
    	echo '<script>window.history.back()</script>';
    }
?>