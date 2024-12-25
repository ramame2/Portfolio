<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projecten</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/project.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>
<div class="containerproject">
    <h2>Mijn Projecten</h2>
    <?php include '../public/get_projects.php'; ?>
    <div class="project-buttons">
        <?php foreach ($projects as $project): ?>
            <button class="project-button"  onclick="openProjectLink('<?php echo $project['link']; ?>')"  data-description="<?php echo $project['description']; ?>">
                <?php echo $project['name']; ?>
            </button>
        <?php endforeach; ?>
    </div>
    <div class="project-info-buttons">
        <?php foreach ($projects as $project): ?>
            <button class="project-info-button" onclick="showProjectInfo('<?php echo $project['id']; ?>')" data-info="<?php echo $project['details']; ?>">
                <?php echo $project['name']; ?> Info
            </button>
        <?php endforeach; ?>
    </div>
    <div class="project-display" id="project-display">
        <div class="project-content" id="project-content">
            <!-- Project details will be displayed here -->
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>
