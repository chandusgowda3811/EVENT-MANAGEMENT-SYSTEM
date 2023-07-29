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

$gateway->delete($cid);

header('Location: viewcaterings.php');