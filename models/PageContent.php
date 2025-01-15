<?php

class PageContent {
    private $db;
    private $table = 'page_content';

    public $section;
    public $content;

    public function __construct($db) {
        $this->db = $db;
    }



    public function getContent($section) {
        $query = "SELECT content FROM " . $this->table . " WHERE section = :section";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':section', $section);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC)['content'];
        }

        return null;
    }



    public function updateContent($section, $content) {
        $query = "UPDATE " . $this->table . " SET content = :content WHERE section = :section";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':section', $section);
        $stmt->bindParam(':content', $content);

        return $stmt->execute();
    }
}
?>
