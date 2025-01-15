<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include 'header.php'; ?>

<?php
require_once '../config/db_config.php';
require_once '../controllers/ContactController.php';
global $conn;
    $contactController = new ContactController($conn);

    $action = $_GET['action'] ?? '';
    switch ($action) {
        case 'submit_contact':
            $naam = $_POST['naam'];
            $email = $_POST['email'];
            $boodschap = $_POST['boodschap'];
            echo $contactController->submitContactForm($naam, $email, $boodschap);
            break;

}

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['naam'];
    $email = $_POST['email'];
    $message = $_POST['boodschap'];

    if ($name && $email && $message) {
        $successMessage = "Bedankt voor je bericht! Ik zal zo snel mogelijk contact met uw opnemen.";
    } else {
        $errorMessage = "Er is iets misgegaan, probeer het later opnieuw.";
    }
}
?>

<div class="container">
    <h2>Contact</h2>
    <?php if ($successMessage): ?>
        <div class="message-success">
            <?php echo $successMessage; ?>
        </div>
    <?php endif; ?>

    <?php if ($errorMessage): ?>
        <div class="message-error">
            <?php echo $errorMessage; ?>
        </div>
    <?php endif; ?>
    <div class="contact">
        <form action="contact.php?action=submit_contact" method="POST">
            <h3>Naam</h3>
            <input class="naam" type="text" name="naam" required>
            <h4>E-mail</h4>
            <input class="email" type="email" name="email" required>
            <h5>Boodschap</h5>
            <textarea class="boodschap" name="boodschap" required></textarea>
            <br><br>
            <input class="submit" type="submit" value="Verzenden">
        </form>
    </div>
</div>

<?php
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../controllers/PageContentController.php';
global $conn;

    $pageContentController = new PageContentController($conn);

    $MapContent = $pageContentController->getPageContent('Map');
    ?>
<div class="map-row">
    <div class="location-section">
        <?php echo $MapContent; ?>

    </div>
</div>
<script>
    window.addEventListener('load', function () {
        // Check if the success message is set in PHP
        const successMessage = '<?php echo $successMessage; ?>';

        if (successMessage) {
            // Show success message with a slight delay for effect
            const messageDiv = document.querySelector('.message-success');
            messageDiv.classList.add('visible');
        }
    });

</script>
<br><br><br><br><br><br>
<?php include 'footer.php'; ?>
</body>
</html>
