<?php
require_once '../models/Project.php'; // Ensure only required dependencies are imported

class ProjectController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getProjects() {
        $project = new Project($this->db);
        $stmt = $project->read();
        if ($stmt->rowCount() > 0) {
            $projects = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $projects;
        }
        return [];
    }

    public function addProject($name, $description, $details, $link) {
        $project = new Project($this->db);
        $project->name = $name;
        $project->description = $description;
        $project->details = $details;
        $project->link = $link;

        if ($project->create()) {
            return "Project added successfully.";
        } else {
            return "Unable to add project.";
        }
    }

    public function removeProject($id) {
        $project = new Project($this->db);

        if ($project->delete($id)) {
            return "Project removed successfully.";
        } else {
            return "Unable to remove project.";
        }
    }

    public function updateProject($id, $name, $description, $details, $link) {
        $project = new Project($this->db);
        $project->id = $id;
        $project->name = $name;
        $project->description = $description;
        $project->details = $details;
        $project->link = $link;

        if ($project->update()) {
            return "Project updated successfully.";
        } else {
            return "Unable to update project.";
        }
    }
}
?>
