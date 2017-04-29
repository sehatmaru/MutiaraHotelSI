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
    <style>
        .star{
            display: inline-block;
            color: #F0F0F0;
            text-shadow: 0 0 1px #666666;
            font-size:30px;
        }

        .highlight, .selected {
            color:#F4B30A;
            text-shadow: 0 0 1px #F48F0A;
        }
    </style>

    <script src="js/jquery.js"></script>        
    <script src="js/bootstrap.min.js"></script> 
    <script src="https://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="js/wow.min.js"></script>
    <script>wow = new WOW({}).init();</script>
    <script>
        function highlightStar(obj) {
            removeHighlight();      
            $('li').each(function(index) {
                $(this).addClass('highlight');
                if(index == $("li").index(obj)) {
                    return false;   
                }
            });
        }

        function removeHighlight() {
            $('li').removeClass('selected');
            $('li').removeClass('highlight');
        }

        function addRating(obj) {
            $('li').each(function(index) {
                $(this).addClass('selected');
                $('#rating').val((index+1));
                if(index == $("li").index(obj)) {
                    return false;   
                }
            });
        }

        function resetRating() {
            if($("#rating").val()) {
                $('li').each(function(index) {
                    $(this).addClass('selected');
                    if((index+1) == $("#rating").val()) {
                        return false;   
                    }
                });
            }
        }
    </script>
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
                    <table>
                        <tr>
                            <td><h5><b>Full Name</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <input type="text" name="nama" class="form-control" size="58" required>
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
                                <input type="hidden" name="rating" id="rating" required="text">
                                <ul onMouseOut="resetRating();">
                                  <li class="star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                                  <li class="star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                                  <li class="star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                                  <li class="star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                                  <li class="star" onmouseover="highlightStar(this);" onmouseout="removeHighlight();" onClick="addRating(this);">&#9733;</li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td><h5><b>Feedback</b></h5></td>
                            <td><h5><b> : </b></h5></td>
                            <td>
                                <textarea class="form-control" name="feedback"></textarea>
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