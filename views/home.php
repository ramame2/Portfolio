<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<script src="../js/Stars.js"></script>

<?php include 'header.php'; ?>

<?php
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../controllers/PageContentController.php';
global $conn;

    $pageContentController = new PageContentController($conn);

    // Fetch content for each section using the controller
    $introtextContent = $pageContentController->getPageContent('introtext');
    $overContent = $pageContentController->getPageContent('over');
    $homecontactContent = $pageContentController->getPageContent('homecontact');
    $homeprojectenContent = $pageContentController->getPageContent('homeprojecten');
    $HomePicContent = $pageContentController->getPageContent('HomePic');

?>

<div class="containerr">

    <div class="search-form">
        <form action="../views/search.php" method="GET">
            <input type="text" name="query" placeholder="Zoek naar secties..." required>
            <button type="submit">Zoeken</button>
        </form>
    </div>

    <!-- Introductietekst -->
    <div class="intro-text">
        <p><?php echo htmlspecialchars($introtextContent); ?></p>
    </div>

    <!-- Introductie afbeelding -->
    <div class="intro-image">
        <img src="../img/<?php echo ($HomePicContent); ?>" alt="Intro Image">
    </div>

    <!-- Dynamische sectieslijst -->
    <div class="intro-text">
        <p>Welke secties bevat mijn portfolio?</p>
        <ul>
            <li><strong>Over mij-pagina:</strong> <?php echo htmlspecialchars($overContent); ?></li>
            <li><strong>Contactpagina:</strong> <?php echo htmlspecialchars($homecontactContent); ?></li>
            <li><strong>Projectenpagina:</strong> <?php echo htmlspecialchars($homeprojectenContent); ?></li>
        </ul>
    </div>

<br><br><br><br>

<?php include 'footer.php'; ?>

</body>
</html>
