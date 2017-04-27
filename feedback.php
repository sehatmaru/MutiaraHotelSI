<?php
    require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Give us Feedback !</title>

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
        <div class="container wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="text-center">        
                <h2>Give us Feedback !</h2>
                <p>Give us an feedback to improve our Hotel services.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="col-md-6 col-md-offset-3">
                    <div id="errormessage"></div>
                    <form action="feedback-process.php" method="post" role="form" class="contactForm">
                        <div class="form-group">
                                <input type="text" name="nama" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="text" />
                                <div class="validation"></div>
                        </div>
                        <div class="form-group">
                                <input type="text" name="alamat" class="form-control" id="name" placeholder="Your Address" data-rule="minlen:4" data-msg="Please enter at least 4 chars" required="text" />
                                <div class="validation"></div>
                        </div>
                        <div class="form-group">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" required="email" />
                                <div class="validation"></div>
                        </div>
                        <div class="form-group">
                                <input type="text" class="form-control" name="rate" id="subject" placeholder="Rating" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                        </div>
                        <div class="form-group">
                                <textarea class="form-control" name="komentar" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Your Message"></textarea>
                                <div class="validation"></div>
                        </div>
                        <div class="text-center"><button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Send</button></div>
                    </form>                     
                </div>
            </div>
        </div>
    </section>    
</body>
</html>

<?php
    require_once(dirname(__FILE__).'/common/footer.php');
?>