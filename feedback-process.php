<?php
	if(isset($_POST['submit'])){
		include(dirname(__FILE__).'/common/koneksi.php');
		
		$name		= $_POST['name'];
		$email		= $_POST['email'];
		$phone		= $_POST['phone'];
		$rate		= $_POST['rate'];
		$comment	= $_POST['comment'];

		$select_customer= mysqli_query($koneksi, "SELECT * FROM customer WHERE name='$name' AND email='$email'");
		$data_customer	= mysqli_fetch_array($select_customer);
		$customer_id	= $data_customer['customer_id'];

		if (isset($customer_id)) {
			$query_feedback = mysqli_query($koneksi, "INSERT INTO feedback VALUES(NULL, '$customer_id', '$name', '$email', '$phone', '$rate', '$comment')");
		
			if($query_feedback){
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
						            <div class="text-center">        
	                                    <table align="center">
	                                        <tr>
	                                            <td><h5><b>Name</b></h5></td>
	                                            <td><h5><b> : </b></h5></td>
	                                            <td><h5><b><?php echo($name) ?></b></h5></td>
	                                        </tr>
	                                        <tr>
	                                            <td><h5><b>Rate</b></h5></td>
	                                            <td><h5><b> : </b></h5></td>
	                                            <td><h5><b><?php echo($rate) ?></b></h5></td>
	                                        </tr>
	                                        <tr>
	                                            <td><h5><b>Comment</b></h5></td>
	                                            <td><h5><b> : </b></h5></td>
	                                            <td width="300px"><h5><b><?php echo($comment) ?></b></h5></td>
	                                        </tr>
	                                    </table>
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
			require_once(dirname(__FILE__).'/common/header.php');
        ?>
            <!DOCTYPE html>
            <html lang="en">
              <head>
                <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">

                <title>Error !</title>

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
                            <h2>Your feedback will not sent !</h2>
                            <p>You haven't ordered yet.</p>
                            <a class="btn btn-primary btn-lg" href="reservation.php">Order Room</a>
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