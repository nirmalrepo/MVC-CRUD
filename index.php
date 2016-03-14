
<?php

//
//ini_set('display_errors', 1);
//error_reporting(E_ALL);
if ($_POST['method'] == "ajax") {
//    echo 'd';
    require_once 'model/ContactsService.php';
    echo json_encode(array('status' => 'asc', 'id' => '$', 'name' => $name, 'count' => $count));
    ContactsService::insert($_POST['name'], $_POST['phone'], $_POST['email'], $_POST['address']);
//    try {
//        $stmt = $db->prepare("INSERT INTO contacts (name, phone, email, address)
//    VALUES (:name, :phone, :email, :address)");
//
//        $stmt->bindParam(':name', $_POST['name']);
//        $stmt->bindParam(':phone', $_POST['phone']);
//        $stmt->bindParam(':email', $_POST['email']);
//        $stmt->bindParam(':address', $_POST['address']);
//
//// insert a row
//        $stmt->execute();
////            if ($new) {
////                echo json_encode(array('status' => 'added', 'id' => $id, 'name' => $name, 'count' => $count));
////            }
//    } catch (PDOException $e) {
//        echo "Error: " . $e->getMessage();
//    }
}
require_once('./controller/ContactsController.php');

$controller = new ContactsController();

$controller->handleRequest();
?>
