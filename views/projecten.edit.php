<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Projects</title>
</head>
<body>
<div class="container">
<h1>Manage Projects</h1>


    <?php if (empty($projects)): ?>
        <p>No projects found.</p>
    <?php else: ?>
        <?php foreach ($projects as $project): ?>
            <div class="project">
                <h3>
                    <a href="<?php echo $project['link']; ?>" target="_blank"><?php echo htmlspecialchars($project['name']); ?></a>
                </h3>
                <p><?php echo htmlspecialchars($project['description']); ?></p>
                <p><?php echo htmlspecialchars($project['details']); ?></p>
                <p>Added on: <?php echo htmlspecialchars($project['added_at']); ?></p>

                <!-- Remove Project Form -->
                <form action="admin.php?page=remove_project" method="POST" style="display:inline-block;">
                    <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                    <button type="submit">Remove</button>
                </form>

                <!-- Edit Project Button -->
                <button onclick="editProject(<?php echo $project['id']; ?>)">Edit</button>

                <!-- Edit Project Form (hidden initially) -->
                <div class="edit-project-form" id="edit-form-<?php echo $project['id']; ?>" style="display:none;">
                    <h3>Edit Project</h3>
                    <form class="contact" action="admin.php?page=update_project" method="POST">
                        <input type="hidden" name="id" value="<?php echo $project['id']; ?>">
                        <label for="name">Name:</label>
                        <input type="text" name="name" value="<?php echo htmlspecialchars($project['name']); ?>" required><br>
                        <label for="description">Description:</label>
                        <textarea name="description" required><?php echo htmlspecialchars($project['description']); ?></textarea><br>
                        <label for="details">Details:</label>
                        <textarea name="details" required><?php echo htmlspecialchars($project['details']); ?></textarea><br>
                        <label for="link">Link:</label>
                        <input type="text" name="link" value="<?php echo htmlspecialchars($project['link']); ?>" required><br>
                        <button type="submit">Update Project</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<div class="container">
    <h2>Add New Project</h2>
    <form class="contact" action="admin.php?page=add_project" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required><br>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea><br>
        <label for="details">Details:</label>
        <textarea name="details" required></textarea><br>
        <label for="link">Link:</label>
        <input type="text" name="link" required><br>
        <button type="submit">Add Project</button>
    </form>
</div>

<script>
    // JavaScript to toggle the display of the edit form
    function editProject(projectId) {
        var form = document.getElementById('edit-form-' + projectId);
        if (form.style.display === "none" || form.style.display === "") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }
</script>

</body>
</html>
