<?php
class CVFile {
    private $conn;
    private $table_name = 'cv_files';

    public $id;
    public $filename;
    public $filedata;
    public $uploaded_at;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upload() {
        $query = "INSERT INTO " . $this->table_name . " (filename, filedata) VALUES (:filename, :filedata)";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':filename', $this->filename);
        $stmt->bindParam(':filedata', $this->filedata, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
