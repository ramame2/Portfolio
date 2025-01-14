<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecten</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/project.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>

<div class="containerproject">
    <h2>Mijn Projecten</h2>

    <?php
    require_once '../config/db_config.php';
    require_once '../controllers/ProjectController.php';

    if (isset($conn)) {
        $projectController = new ProjectController($conn);
        $projects = $projectController->getProjects();
    } else {
        $projects = [];
    }
    ?>

    <?php if (!empty($projects)): ?>
        <div class="project-buttons">
            <?php foreach ($projects as $project): ?>
                <button class="project-button" onclick="openProjectLink('<?php echo htmlspecialchars($project['link']); ?>')" data-description="<?php echo htmlspecialchars($project['description']); ?>">
                    <?php echo htmlspecialchars($project['name']); ?>
                </button>
            <?php endforeach; ?>
        </div>
        <div class="project-info-buttons">
            <?php foreach ($projects as $project): ?>
                <button class="project-info-button" onclick="showProjectInfo('<?php echo htmlspecialchars($project['id']); ?>')" data-info="<?php echo htmlspecialchars($project['details']); ?>">
                    <?php echo htmlspecialchars($project['name']); ?> Info
                </button>
            <?php endforeach; ?>
        </div>
        <div class="project-display" id="project-display">
            <div class="project-content" id="project-content">
            </div>
        </div>
    <?php else: ?>
        <p>Geen projecten.</p>
    <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
</body>
</html>
