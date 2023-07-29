<?php
require_once 'functions.php';

if (!isset($formdata)) {
    $formdata = array();
}

if (!isset($errors)) {
    $errors = array();
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Create catering Form</title>
        <style>
            span.error{
                color: red;
            }            
        </style>  
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class="content">
            <div class="container">
                <h1>Create catering Form</h1>
                <?php 
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="createcatering.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="cname" class="col-md-2 control-label">catering Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="cname" name="cname" value="<?php echoValue($formdata, "cname")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="cnameError" class="error">
                                <?php echoValue($errors, 'cname');?>
                            </span>
                        </div>
                      
                    </div>
                    <div class="form-group">
                        <label for="contact" class="col-md-2 control-label">contact</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echoValue($formdata, "contact")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="contactError" class="error">
                                <?php echoValue($errors, 'contact');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="days" class="col-md-2 control-label">days</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="days" name="days" value="<?php echoValue($formdata, "days")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="daysError" class="error">
                                <?php echoValue($errors, 'days');?>
                            </span>
                        </div>
                    </div>
                   
            
                  

                
                    
                      
               
                <button type="submit" name="createcatering" class="btn btn-default pull-right">Create Catering <span class="glyphicon glyphicon-send"></span></button>
                
                <a class="btn btn-default" href="viewcaterings.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
