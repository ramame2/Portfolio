<?php
global $conn;
require_once '../config/db_config.php';
require_once '../controllers/CVController.php';

$cvController = new CVController($conn);

$cvFile = $cvController->downloadLatestCV();

if ($cvFile) {
    $filename = $cvFile['filename'];
    $filedata = $cvFile['filedata'];

    header("Content-Disposition: attachment; filename=" . $filename);
    header("Content-Type: application/octet-stream");
    echo $filedata;
    exit;
} else {
    echo "Geen CV-bestand gevonden.";
}
?>
