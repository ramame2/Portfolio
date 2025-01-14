<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload CV</title>
</head>
<body>
<div class="container">
<h1>Upload CV</h1>
<form class="contact" action="admin.php?page=upload_cv" method="POST" enctype="multipart/form-data">
    <label for="cv">Upload CV File:</label>
    <input type="file" name="cv" required><br>
    <button type="submit">Upload</button>
</form>
</div>
</body>
</html>
