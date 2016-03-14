<?php

require_once 'model/ContactsGateway.php';
require_once 'model/ValidationException.php';

class ContactsService {

    private $contactsGateway = NULL;
    private static $instance = NULL;

    public function __construct($id, $name, $phone, $email, $address) {
        $this->id = $id;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->address = $address;
    }

    public static function getInstance() {
        if (!isset(self::$instance)) {
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO('mysql:host=localhost;dbname=mvc-crud2', 'root', '', $pdo_options);
        }
        return self::$instance;
    }

    public function getAllContacts($order) {
        $list = [];
        $db = $this->getInstance();
        $req = $db->query('SELECT * FROM contacts');

        // we create a list of Post objects from the database results
        foreach ($req->fetchAll() as $contacts) {
            $list[] = new ContactsService($contacts['id'], $contacts['name'], $contacts['phone'], $contacts['email'], $contacts['address']);
        }

        return $list;
    }

    public function insert($name, $phone, $email, $address) {
        $db = ContactsService::getInstance();
        try {
            $stmt = $db->prepare("INSERT INTO contacts (name, phone, email, address)
    VALUES (:name, :phone, :email, :address)");

            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':address', $address);

// insert a row
            $stmt->execute();
//            if ($new) {
//                echo json_encode(array('status' => 'added', 'id' => $id, 'name' => $name, 'count' => $count));
//            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

}

?>
