<?php
global $conn;
require '../config/db_config.php';

function getLocation($conn, $locationName) {
    $sql = "SELECT url FROM locations WHERE name = :name";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':name', $locationName);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        return $stmt->fetch(PDO::FETCH_ASSOC)['url'];
    } else {
        return null;
    }
}

$locationName = 'Hogeschool Windesheim Almere';
$locationUrl = getLocation($conn, $locationName);
?>
