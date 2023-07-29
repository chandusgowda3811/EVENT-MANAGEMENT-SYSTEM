<?php
require_once 'classes/studio.php';
require_once 'classes/studioTableGateway.php';
require_once 'classes/Connection.php';
require_once 'validatestudio.php';

$formdata = array();
$errors = array();

validatestudio(INPUT_POST, $formdata, $errors);

if (empty($errors)) {
    $sname = $formdata['sname'];
    $studioPhone = $formdata['Phone'];    
 

    $studio = new studio(-1, $sname, $studioPhone);

    $connection = Connection::getInstance();

    $gateway = new studioTableGateway($connection);

    $id = $gateway->insert($studio);

    header('Location: viewstudios.php');
}
else {
    require 'createstudioForm.php';
}