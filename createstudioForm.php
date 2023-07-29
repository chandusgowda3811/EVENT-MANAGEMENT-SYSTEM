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
        <title>Create studio Form</title>
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
                <h1>Create studio Form</h1>
                <?php 
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="createstudio.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="sname" class="col-md-2 control-label">studio Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="sname" name="sname" value="<?php echoValue($formdata, "sname")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="snameError" class="error">
                                <?php echoValue($errors, 'sname');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echoValue($formdata, "Phone")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="sPhoneError" class="error">
                                <?php echoValue($errors, 'Phone');?>
                            </span>
                        </div>
                    </div>
                    
                <button type="submit" namae="createstudio" class="btn btn-default pull-right">Create studio <span class="glyphicon glyphicon-send"></span></button>
               
                <a class="btn btn-default" href="viewstudios.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
