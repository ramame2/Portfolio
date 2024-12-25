<?php
global $conn;
require '../config/db_config.php';

function getProjects($conn) {
    $sql = "SELECT * FROM projects";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$projects = getProjects($conn);
?>
