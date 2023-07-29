<?php
require_once 'classes/catering.php';
require_once 'classes/cateringtablegateway.php';
require_once 'classes/Connection.php';

$cid = $_POST['cid'];
$cname = $_POST['cname'];
$contact = $_POST['contact'];
$days = $_POST['days'];


$catering = new catering($cid, $cname, $contact, $days);

$connection = Connection::getInstance();

$gateway = new cateringtablegateway($connection);

$cid = $gateway->update($catering);

header('Location: viewcaterings.php');
