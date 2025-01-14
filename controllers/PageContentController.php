<?php
require_once __DIR__ . '/../models/PageContent.php';


class PageContentController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Get all page content sections
    public function getAllPageContent() {
        $query = "SELECT section, content FROM page_content";
        $stmt = $this->db->prepare($query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC); // Return all sections and their content
    }

    // Get content of a specific section
    public function getPageContent($section) {
        $pageContent = new PageContent($this->db);
        return $pageContent->getContent($section);
    }

    // Update content of a specific section
    public function updatePageContent($section, $content) {
        $pageContent = new PageContent($this->db);
        if ($pageContent->updateContent($section, $content)) {
            return "Content updated successfully.";
        } else {
            return "Failed to update content.";
        }
    }
    public function searchPageContent($query) {
        $query = "%" . $query . "%"; // Prepare for partial matching
        $sql = "SELECT section, content FROM page_content WHERE content LIKE :query OR section LIKE :query";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':query', $query);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
