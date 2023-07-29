<?php
require_once 'classes/catering.php';
require_once 'classes/cateringtablegateway.php';
require_once 'classes/Connection.php';

if (!isset($_GET['id'])) {
    die("Illegal request");
}
$cid = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new cateringtablegateway($connection);

$statement = $gateway->getcateringById($cid);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit Catering</title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class="content">
            <div class="container">
                <h1>Edit Catering Form</h1>
                <?php 
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="editcatering.php" method="POST" class="form-horizontal">
                    <input type="hidden" name="cid" value="<?php echo $row['cid']; ?>" />
                    <div class="form-group">
                        <label for="cname" class="col-md-2 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="cname" name="cname" value="<?php echo $row['cname']; ?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="cnameError" class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="contact" class="col-md-2 control-label">contact</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $row['contact']; ?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="contactError" class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="days" class="col-md-2 control-label">days</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="days" name="days" value="<?php echo $row['days']; ?>" />
                        </div> 
                    <div class="col-md-4">
                            <span id="daysError" class="error"></span>
                            </div>
                    </div>

                    
                    
                    <button type="submit" class="btn btn-default pull-right" name="editcatering">Update <span class="glyphicon glyphicon-floppy-disk"></span></button>
                    <a class="btn btn-default" href="viewcaterings.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
