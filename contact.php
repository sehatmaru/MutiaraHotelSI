<?php
    require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Contact</title>

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
                <h2></h2>
                <p>
                   Mutiara Balige Hotel is conveniently located in the strategic and central area of ​​Balige, approximately 18 KM from the airport
                   Close to important Institutions and Spot such as recreational parks, tourist sites, offices, banks, schools
                   As well as business locations such as markets and shops.
                   We offer lodging panoramic views of Lake Toba, hills and rice fields.
                </p>
            </div>
           <div class="col-md-8">
                  <div class="contact-form">
                    <h2></h2>
                        <form method="post" action="contact-post.php">
                            <div>
                                <span>name</span>
                                <span><input type="username" class="form-control" id="userName"></span>
                            </div>
                            <div>
                                <span>e-mail</span>
                                <span><input type="email" class="form-control" id="inputEmail3"></span>
                            </div>
                            <div>
                                <span>subject</span>
                                <span><textarea name="userMsg"> </textarea></span>
                            </div>
                           <div>
                           <br><br>
                                <label class="fa-btn btn-1 btn-1e"><input type="submit" value="submit us"></label>
                          </div>
                        </form>
                    </div>
            </div>      
            <div class="clearfix"></div>        
    </div> 
</div>
</div>
    </section>    
</body>
</html>

<?php
    require_once(dirname(__FILE__).'/common/footer.php');
?>