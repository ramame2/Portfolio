<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over Mij</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>

<?php
require_once '../config/db_config.php';
require_once '../controllers/PageContentController.php';
global $conn;
    $pageContentController = new PageContentController($conn);


    $skillsContent = $pageContentController->getPageContent('skills');
    $studiesContent = $pageContentController->getPageContent('studies');
    $workContent = $pageContentController->getPageContent('work');
    $hobbiesContent = $pageContentController->getPageContent('hobbies');

?>

<h1 class="naam">Rama Mari</h1>
<div class="container2">
    <div class="about-section">
        <div class="left-div">
            <button class="tab-button" onclick="showDescription('skills')">Vaardigheden</button>
            <button class="tab-button" onclick="showDescription('studies')">Studies</button>
            <button class="tab-button" onclick="showDescription('work')">Werkervaring</button>
            <button class="tab-button" onclick="showDescription('hobbies')">Hobby's</button>
            <div class="tab-button" id="download-cv">
                <a href="download_cv.php">Mijn CV</a>
            </div>
        </div>
        <div class="right-div">
            <img src="/img/f.jpg" alt="Mijn Foto">
        </div>
    </div>

    <div class="description-popup" id="description-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closeDescription()">&times;</span>
            <div id="skills" class="description-text"><?php echo htmlspecialchars($skillsContent); ?></div>
            <div id="studies" class="description-text"><?php echo htmlspecialchars($studiesContent); ?></div>
            <div id="work" class="description-text"><?php echo htmlspecialchars($workContent); ?></div>
            <div id="hobbies" class="description-text"><?php echo htmlspecialchars($hobbiesContent); ?></div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
