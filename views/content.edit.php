<?php
global $conn;
require_once '../config/db_config.php';
require_once '../controllers/PageContentController.php';
$pageContentController = new PageContentController($conn);

$section = $_GET['section'] ?? '';

// Handle content update if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['section'])) {
    $section = $_POST['section'];
    $newContent = $_POST['content'];
    $updateResult = $pageContentController->updatePageContent($section, $newContent);
    echo "<p>" . htmlspecialchars($updateResult) . "</p>";
}

// Fetch all sections and their content
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
    ?>

    <form method="POST" class="contact">
        <textarea name="content" rows="10"><?php echo htmlspecialchars($currentContent); ?></textarea><br><br>
        <input type="hidden" name="section" value="<?php echo htmlspecialchars($section); ?>">
        <button type="submit">Opslan</button>
    </form>
<?php endif; ?>

    <?php foreach ($pageContentData as $pageContent): ?>
        <div class="section">
            <h3><?php echo htmlspecialchars($pageContent['section']); ?></h3>
            <p><?php echo nl2br(htmlspecialchars($pageContent['content'])); ?></p>

            <a href="?section=<?php echo urlencode($pageContent['section']); ?>" class="edit-link">Bewerken</a>
        </div>
    <?php endforeach; ?>

</div>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
