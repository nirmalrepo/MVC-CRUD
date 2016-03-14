<?php

require_once 'model/ContactsService.php';

class ContactsController {
    
    private $contactsService = NULL;
    
    public function __construct() {
        $this->contactsService = new ContactsService();
    }
    
    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'list' ) {
                $this->listContacts();
            } elseif ( $op == 'new' ) {
                $this->saveContact();
            } elseif ( $op == 'delete' ) {
                $this->deleteContact();
            } elseif ( $op == 'show' ) {
                $this->showContact();
            } else {
                $this->showError("Page not found", "Page for operation ".$op." was not found!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Application error", $e->getMessage());
        }
    }
    
    public function listContacts() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $contacts = $this->contactsService->getAllContacts($orderby);
        include 'view/contacts.php';
    }
    
    public function saveContact() {
       
        
        include 'view/contact-form.php';
    }
    
    public function deleteContact() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        
        $this->contactsService->deleteContact($id);
        
        $this->redirect('index.php');
    }
    
    public function showContact() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Internal error.');
        }
        $contact = $this->contactsService->getContact($id);
        
        include 'view/contact.php';
    }
    
    public function showError($title, $message) {
        include 'view/error.php';
    }
    
}
?>
