<?php
global $conn;
require '../config/db_config.php';

$query = strtolower(trim($_GET['query']));

$sql = "SELECT url FROM search_terms WHERE term LIKE :query";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':query', '%' . $query . '%');
$stmt->execute();

$result = $stmt->fetch(PDO::FETCH_ASSOC);

if ($result) {
    header("Location: " . $result['url']);
    exit();
} else {
    header("Location: /views/home.php");
    exit();
}
?>
