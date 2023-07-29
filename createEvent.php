<?php
require_once 'classes/Event.php';
require_once 'classes/EventTableGateway.php';
require_once 'classes/Connection.php';
require_once 'validateEvents.php';

$formdata = array();
$errors = array();

validateEvents(INPUT_POST, $formdata, $errors);

if (empty($errors)) {
    $title = $formdata['Title'];
    $description = $formdata['Description'];    
    $sDate = $formdata['StartDate'];
    $eDate = $formdata['EndDate'];
    $cost = $formdata['Cost'];
    $Advance=$formdata['Advance'];
    $Remaining=$formdata['Remaining'];
    $locID = $formdata['LocID'];
    $cid = $formdata['cid'];
    $stid = $formdata['stid'];
  

    $event = new Event(-1, $title, $description, $sDate, $eDate, $cost,$Advance,$Remaining, $locID,$cid, $stid);

    $connection = Connection::getInstance();

    $gateway = new EventTableGateway($connection);

    $id = $gateway->insert($event);

    header('Location: viewEvents.php');
}
else {
    require 'createEventForm.php';
}