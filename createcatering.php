<?php
require_once 'classes/catering.php';
require_once 'classes/cateringtablegateway.php';
require_once 'classes/Connection.php';
require_once 'validatecatering.php';

$formdata = array();
$errors = array();

validatecatering(INPUT_POST, $formdata, $errors);

if (empty($errors)) {
    $cname = $formdata['cname'];
    $contact = $formdata['contact'];    
    $days = $formdata['days'];
  

    $catering = new catering(-1, $cname, $contact, $days);

    $connection = Connection::getInstance();

    $gateway = new cateringtablegateway($connection);

    $cid = $gateway->insert($catering);

    header('Location: viewcaterings.php');
}
else {
    require 'createcateringform.php';
}