<?php
global $conn;
require '../config/db_config.php';

$id = 1; // ID van je CV in de database

$sql = "SELECT filename, filedata FROM cv_files WHERE id = :id";
$stmt = $conn->prepare($sql);
$stmt->bindParam(':id', $id);
$stmt->execute();

if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $filename = $row['filename'];
    $filedata = $row['filedata'];

    header("Content-Disposition: attachment; filename=" . $filename);
    header("Content-Type: application/octet-stream");
    echo $filedata;
    exit;
} else {
    echo "Bestand niet gevonden.";
}
?>
