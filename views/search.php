<?php
require_once __DIR__ . '/../config/db_config.php';
require_once __DIR__ . '/../controllers/PageContentController.php';
global $conn;

$pageContentController = new PageContentController($conn);

$query = isset($_GET['query']) ? $_GET['query'] : '';

$databaseResults = [];
$fileResults = [];

if ($query) {
    $databaseResults = $pageContentController->searchPageContent($query);

    $files = [
        __DIR__ . '/home.php',
        __DIR__ . '/projecten.php',
        __DIR__ . '/about.php',
        __DIR__ . '/contact.php'
    ];

    foreach ($files as $file) {
        if (file_exists($file)) {
            $content = file_get_contents($file);
            if (stripos($content, $query) !== false) {
                preg_match('/<title>(.*?)<\/title>/', $content, $matches);
                $title = isset($matches[1]) ? $matches[1] : basename($file);

                $highlightedText = preg_replace('/(' . preg_quote($query, '/') . ')/i', '<span>$1</span>', $content);

                $excerpt = substr($highlightedText, 0, 200);
                $fileResults[] = [
                    'file' => $title,
                    'link' =>  basename($file)
                ];
            }
        } else {
            echo "<p>Bestand niet gevonden: $file</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Zoekresultaten</title>
</head>
<?php include 'header.php'; ?>
<body>
<div class="container">
    <h2>Zoekresultaten voor: <?php echo htmlspecialchars($query); ?></h2>

    <?php
    if ($databaseResults) {
        foreach ($databaseResults as $result) {
            echo "<div>";
            echo "<h3>" . htmlspecialchars($result['section']) . "</h3>";
            echo "<p>" . nl2br(htmlspecialchars($result['content'])) . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>Geen resultaten gevonden in de database.</p>";
    }

    if ($fileResults) {
        echo "<h3>Resultaten in pagina's:</h3>";
        foreach ($fileResults as $fileResult) {
            echo "<div>";
            echo "<p>Gevonden in: <a href='{$fileResult['link']}'>{$fileResult['file']}</a></p>";
            echo "<p><a href='{$fileResult['link']}'>Bekijk volledige inhoud</a></p>";
            echo "</div>";
        }
    } else {
        echo "<p>Geen resultaten gevonden in bestanden.</p>";
    }
    ?>
</div>
<br><br>
<?php include 'footer.php'; ?>
</body>
</html>
