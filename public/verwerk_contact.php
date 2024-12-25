<?php
global $conn;
require '../config/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $naam = htmlspecialchars($_POST['naam']);
    $email = htmlspecialchars($_POST['email']);
    $boodschap = htmlspecialchars($_POST['boodschap']);




    // Opslaan van contactinformatie (zonder CV in dit voorbeeld)
    $sql = "INSERT INTO contactform (naam, email, boodschap) VALUES (:naam, :email, :boodschap)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':naam', $naam);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':boodschap', $boodschap);

    if ($stmt->execute()) {
        echo "Bedankt voor je bericht!";
    } else {
        echo "Er is een fout opgetreden. Probeer het later opnieuw.";
    }
}
?>
