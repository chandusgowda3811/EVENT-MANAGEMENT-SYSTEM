<?php
require_once 'classes/studio.php';
require_once 'classes/studioTableGateway.php';
require_once 'classes/Connection.php';

$id = $_POST['id'];
$sname = $_POST['sname'];
$studioPhone = $_POST['Phone'];


$studio = new studio($id, $sname, $studioPhone);

$connection = Connection::getInstance();

$gateway = new studioTableGateway($connection);

$id = $gateway->update($studio);

header('Location: viewstudios.php');
