<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>DCC EVENTS</title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <div class = "col-md-12">
                    <h1>Contact Us</h1>
                </div>
            </div>
			
            <div class="container">
            <div class="col-md-12">
            <hr>
            </div>
            </div>
            
            <div class="container">
                <div class="col-md-6 contacts">
                   
                    <p>
                    <span style="font-size: 24px;"><span class="glyphicon glyphicon-envelope"></span> <a href="mailto:dcc1@gmail.com">dcc1@gmail.com</a><br>
<span class="glyphicon glyphicon-link"></span> <a href="https://www.facebook.com/dccevents" target="_blank">DCCEvents Facebook Page</a><br>
<a href="tel:8660373155"><span class="glyphicon glyphicon-phone"></span> 866-037-3155</a></span></br>
<a href="https://wa.me/918660373155" target="_blank" style="font-size: 24px;"><i class="fab fa-whatsapp"></i> Chat on WhatsApp</a>



                </div>
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="Title">Title:</label>
                            <input type="text" name="title" id="Title" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="Comment">Message:</label>
                            <textarea id="Comment" rows="10" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-default pull-right">Send <span class="glyphicon glyphicon-send"></span></button>
                    </form>
                </div>
            </div>
			
            
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>

