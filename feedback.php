<?php
    require_once(dirname(__FILE__).'/common/header.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Give Feedback</title>

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
                <h2>Give Feedback</h2>
                <p>Give us an feedback to improve our Hotel services.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="form-group col-md-6 col-md-offset-3">
                    <form action="feedback-process.php" method="post" role="form" class="contactForm">
                    <table>
                        <tr>
                            <td><h5><b>Name</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <input type="text" name="name" class="form-control" size="58" required>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><b>Email</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <input type="text" name="email" class="form-control" size="58" required>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><b>Phone</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <input type="text" name="phone" class="form-control" size="58" required>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><b>Rate</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <select name="rate" class="form-control">
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><b>Comment</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <textarea class="form-control" name="comment"></textarea>
                            </td>
                        </tr>
                        </div>
                    </table>
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