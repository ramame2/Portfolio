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

<div class="map-row">
    <div class="location-section">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2435.999942500855!2d5.219589076183054!3d52.37042104729382!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c616e13959b029%3A0xe04f21626e2f3f0e!2sWindesheim%20in%20Almere!5e0!3m2!1sen!2snl!4v1733012768068!5m2!1sen!2snl"
                width="100%"
                height="100"
                style="border:0; border-radius: 30px;"
                allowfullscreen=""
                loading="lazy"
                referrerpolicy="no-referrer-when-downgrade">
        </iframe>
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
