<?php
class ContactForm {
    private $conn;
    private $table_name = 'contactform';

    public $id;
    public $naam;
    public $email;
    public $boodschap;
    public $verzonden_op;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (naam, email, boodschap) VALUES (:naam, :email, :boodschap)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':naam', $this->naam);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':boodschap', $this->boodschap);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY verzonden_op DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}
?>
