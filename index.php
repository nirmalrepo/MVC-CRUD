
<?php

//
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
if ($_POST['method'] == "ajax") {
//    echo 'd';
    require_once 'model/ContactsService.php';
    echo json_encode(array('status' => 'asc', 'id' => '$', 'name' => $name, 'count' => $count));
    ContactsService::insert($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);

}
require_once('./controller/ContactsController.php');

$controller = new ContactsController();

$controller->handleRequest();
?>
