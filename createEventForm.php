<?php
require_once 'functions.php';
require_once 'classes/Location.php';
require_once 'classes/LocationTableGateway.php';
require_once 'classes/catering.php';
require_once 'classes/cateringtablegateway.php';
require_once 'classes/studio.php';
require_once 'classes/studioTableGateway.php';
require_once 'classes/Connection.php';

$connection = Connection::getInstance();
$gateway = new LocationTableGateway($connection);
$gateway1 = new cateringtablegateway($connection);
$gateway2 = new studioTableGateway($connection);

$locations = $gateway->getLocations();
$catering = $gateway1->getcatering();
$studio = $gateway2->getstudio();

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
        <title>Create Event Form</title> 
        <?php require 'utils/styles.php'; ?>
        <?php require 'utils/scripts.php'; ?>
    </head>
    <body>
        <?php require 'utils/header.php'; ?>
        <div class = "content">
            <div class = "container">
                <h1>Create Event Form</h1>
                <?php 
                if (isset($errorMessage)) {
                    echo '<p>Error: ' . $errorMessage . '</p>';
                }
                ?>
                <form action="createEvent.php" method="POST" class="form-horizontal">
                    <div class="form-group">
                        <label for="Title" class="col-md-2 control-label">Title</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="Title" name="Title" value="<?php echoValue($formdata, "Title")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="TitleError" class="error">
                                <?php echoValue($errors, 'Title');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="Description" class="col-md-2 control-label">Description</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="Description" name="Description" value="<?php echoValue($formdata, "Description")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="DescriptionError" class="error">
                                <?php echoValue($errors, 'Description');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="StartDate" class="col-md-2 control-label">Start Date</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="StartDate" name="StartDate" value="<?php echoValue($formdata, "StartDate")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="StartDateError" class="error">
                                <?php echoValue($errors, 'StartDate');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="EndDate" class="col-md-2 control-label">End Date</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="EndDate" name="EndDate" value="<?php echoValue($formdata, "EndDate")?>" />
                        </div>
                        <div class="col-md-4">
                            <span id="EndDateError" class="error">
                                <?php echoValue($errors, 'EndDate');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
    <label for="Cost" class="col-md-2 control-label">Cost</label>
    <div class="col-md-5">
        <input type="number" class="form-control" id="Cost" name="Cost" value="<?php echoValue($formdata, "Cost")?>" />
    </div>
    <div class="col-md-4">
        <span id="CostError" class="error">
            <?php echoValue($errors, 'Cost');?>
        </span>
    </div>
</div>
<div class="form-group">
    <label for="Advance" class="col-md-2 control-label">Advance</label>
    <div class="col-md-5">
        <input type="number" class="form-control" id="Advance" name="Advance" value="<?php echoValue($formdata, "Advance")?>" />
    </div>
    <div class="col-md-4">
        <span id="AdvanceError" class="error">
            <?php echoValue($errors, 'Advance');?>
        </span>
    </div>
</div>
<div class="form-group">
    <label for="Remaining" class="col-md-2 control-label">Remaining</label>
    <div class="col-md-5">
        <input type="number" class="form-control" id="Remaining" name="Remaining" value="<?php echo (isset($formdata['Cost']) && isset($formdata['Advance'])) ? $formdata['Cost'] - $formdata['Advance'] : ''; ?>" readonly />
    </div>
    <div class="col-md-4">
        <span id="RemainingError" class="error">
            <?php echoValue($errors, 'Remaining');?>
        </span>
    </div>
</div>

                    <div class="form-group">
                        <label for="LocID" class="col-md-2 control-label">Location ID</label>
                        <div class="col-md-5">
                            <select name="LocID"
                                        id="LocID"
                                        class="form-control"
                                        >
                                    <?php
                                    foreach ($locations as $location) {
                                        echo '<option value="'.$location['LocationID'].'">'.$location['Name'].'</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                      
                        <div class="col-md-4">
                            <span id="LocIDError" class="error">
                                <?php echoValue($errors, 'LocID');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cid" class="col-md-2 control-label">catering id</label>
                        <div class="col-md-5">
                            <select name="cid"
                                        id="cid"
                                        class="form-control"
                                        >
                                    <?php
                                    foreach ($catering as $caterings) {
                                        echo '<option value="'.$caterings['cid'].'">'.$caterings['cname'].'</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                      
                        <div class="col-md-4">
                            <span id="cidError" class="error">
                                <?php echoValue($errors, 'cid');?>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="stid" class="col-md-2 control-label">studio ID</label>
                        <div class="col-md-5">
                            <select name="stid"
                                        id="stid"
                                        class="form-control"
                                        >
                                    <?php
                                    foreach ($studio as $studios) {
                                        echo '<option value="'.$studios['sid'].'">'.$studios['sname'].'</option>';
                                    }
                                    ?>
                                </select>
                        </div>
                      
                        <div class="col-md-4">
                            <span id="stidError" class="error">
                                <?php echoValue($errors, 'stid');?>
                            </span>
                        </div>
                    </div>
                    <button type="submit" class = "btn btn-default pull-right">Create Event <span class="glyphicon glyphicon-send"></span></button>
                    <a class="btn btn-default navbar-btn" href = "viewEvents.php"><span class="glyphicon glyphicon-circle-arrow-left"></span> Back</a>
                </form>
            </div>
        </div>
        <?php require 'utils/footer.php'; ?>
    </body>
</html>
