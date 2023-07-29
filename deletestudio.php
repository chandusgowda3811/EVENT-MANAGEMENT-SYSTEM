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

$gateway->delete($id);

header('Location: viewstudios.php');