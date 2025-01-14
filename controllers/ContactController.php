<?php
require_once '../models/ContactForm.php';

class ContactController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function submitContactForm($naam, $email, $boodschap) {
        $contact = new ContactForm($this->db);
        $contact->naam = $naam;
        $contact->email = $email;
        $contact->boodschap = $boodschap;

        if ($contact->create()) {
            return "";
        } else {
            return "Unable to submit contact form.";
        }
    }

    public function getMessages() {
        $contact = new ContactForm($this->db);
        $stmt = $contact->read();

        if ($stmt->rowCount() > 0) {
            $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $messages;
        }
        return [];
    }
}
?>
