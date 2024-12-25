<?php
global $conn;
require '../config/db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cv = $_FILES['cv'];

    if ($cv['error'] === UPLOAD_ERR_OK) {
        $filename = $cv['name'];
        $filedata = file_get_contents($cv['tmp_name']);

        // SQL-insert query voorbereiden en uitvoeren
        $sql = "INSERT INTO cv_files (filename, filedata) VALUES (:filename, :filedata)";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':filename', $filename);
        $stmt->bindParam(':filedata', $filedata, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            echo "Je CV is succesvol geüpload.";
        } else {
            echo "Er is een fout opgetreden bij het uploaden van je CV.";
        }
    } else {
        echo "Er is een fout opgetreden bij het uploaden van je bestand.";
    }
}
?>
