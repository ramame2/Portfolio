<?php
class Project {
    private $conn;
    private $table_name = 'projects';

    public $id;
    public $name;
    public $description;
    public $details;
    public $link;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table_name . " ORDER BY added_at DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        if($stmt) {
            return $stmt;
        } else {
            echo "Error executing query: " . $this->conn->errorInfo()[2];
        }
    }

    public function create() {
        $query = "INSERT INTO " . $this->table_name . " (name, description, details, link) VALUES (:name, :description, :details, :link)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':details', $this->details);
        $stmt->bindParam(':link', $this->link);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error during creation: " . $this->conn->errorInfo()[2];
            return false;
        }
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name = :name, description = :description, details = :details, link = :link WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':name', $this->name);
        $stmt->bindParam(':description', $this->description);
        $stmt->bindParam(':details', $this->details);
        $stmt->bindParam(':link', $this->link);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error during update: " . $this->conn->errorInfo()[2];
            return false;
        }
    }

    public function delete($id) {
        $query = "DELETE FROM " . $this->table_name . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error during deletion: " . $this->conn->errorInfo()[2];
            return false;
        }
    }
}
?>
