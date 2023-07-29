<?php
require_once 'classes/studio.php';
require_once 'classes/studioTableGateway.php';
require_once 'classes/Connection.php';

if (!isset($_GET['id'])) {
    die("Illegal request");
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new studioTableGateway($connection);

$statement = $gateway->getstudioById($id);

$row = $statement->fetch(PDO::FETCH_ASSOC);
if (!$row) {
    die("Illegal request");
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Edit studio</title>
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class="content">
            <div class="container">
                <h1>Edit studio Form</h1>
                <?php 
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="editstudio.php" method="POST" class="form-horizontal">
                    <input type="hidden" name="id" value="<?php echo $row['sid']; ?>" />
                    <div class="form-group">
                        <label for="sname" class="col-md-2 control-label">Name</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="sname" name="sname" value="<?php echo $row['sname']; ?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="snameError" class="error"></span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Phone" class="col-md-2 control-label">Phone</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="Phone" name="Phone" value="<?php echo $row['Phone']; ?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="sPhoneError" class="error"></span>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-default pull-right" name="editstudio">Update <span class="glyphicon glyphicon-floppy-disk"></span></button>
                    <a class="btn btn-default" href="viewstudios.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
