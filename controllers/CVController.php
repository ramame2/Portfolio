<?php
global $conn;
require_once '../config/db_config.php';
require_once '../models/CVFile.php';

class CVController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function uploadCV($filename, $filedata) {
        $cv = new CVFile($this->db);
        $cv->filename = $filename;
        $cv->filedata = file_get_contents($filedata);

        if ($cv->upload()) {
            return "CV uploaded successfully.";
        } else {
            return "Unable to upload CV.";
        }
    }

    public function downloadLatestCV() {
        $sql = "SELECT filename, filedata FROM cv_files ORDER BY uploaded_at DESC LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    }
}
?>
