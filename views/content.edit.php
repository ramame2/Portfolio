<?php
global $conn;
require_once '../config/db_config.php';
require_once '../controllers/PageContentController.php';
$pageContentController = new PageContentController($conn);

$section = $_GET['section'] ?? '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $section = $_POST['section'];
    $newContent = $_POST['content'] ?? '';


    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $uploadDir = '../img/';
        $uploadedFile = $uploadDir . basename($_FILES['image']['name']);
        $fileType = pathinfo($uploadedFile, PATHINFO_EXTENSION);


            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile)) {
                $newContent = $uploadedFile;
            }

        }


    $updateResult = $pageContentController->updatePageContent($section, $newContent);
    echo "<p>" . htmlspecialchars($updateResult) . "</p>";
}

$pageContentData = $pageContentController->getAllPageContent();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina's Inhoud</title>
</head>
<?php include 'header.php'; ?>
<body>
<div class="container">
    <h1>Pagina's Inhoud</h1>

    <?php if ($section): ?>
        <h2>Inhoud bewerken van: <?php echo htmlspecialchars($section); ?></h2>
        <?php
        $currentContent = $pageContentController->getPageContent($section);

        $successMessage = "";
        $errorMessage = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $successMessage = "Inhoud succesvol bijgewerkt. Terug naar <a href='../views/admin.php'>Admin paneel</a> of naar <a href='/'>Home</a>.";
        }
        if ($successMessage): ?>
            <div class="message-success">
                <?php echo $successMessage; ?>
            </div>
        <?php endif; ?>
        <form method="POST" enctype="multipart/form-data">
            <?php if (in_array(pathinfo($currentContent, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp'])): ?>
                <img src="../img/<?php echo htmlspecialchars($currentContent); ?>" alt="Afbeelding" style="max-width:90%; height:auto;"><br><br>
                <label for="image">Nieuwe afbeelding uploaden:</label>
                <input type="file" name="image" accept="image/*"><br><br>
            <?php else: ?>
                <textarea name="content" rows="10" style="width: 100%;"><?php echo htmlspecialchars($currentContent); ?></textarea><br><br>
            <?php endif; ?>
            <input type="hidden" name="section" value="<?php echo htmlspecialchars($section); ?>">
            <button type="submit">Opslaan</button>
        </form>
    <?php endif; ?>

    <?php foreach ($pageContentData as $pageContent): ?>
        <div class="section">
            <h3><?php echo htmlspecialchars($pageContent['section']); ?></h3>
            <p><?php echo nl2br(($pageContent['content'])); ?></p>

            <?php if  (in_array(pathinfo($pageContent['content'], PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png', 'webp'])): ?>
                <img src="<?php echo htmlspecialchars($pageContent['content']); ?>" style="max-width:30%; height:auto;" alt="img"><br><br>
            <?php endif; ?>



            <a href="?section=<?php echo urlencode($pageContent['section']); ?>" class="edit-link">Bewerken</a>
        </div>
    <?php endforeach; ?>
</div>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
