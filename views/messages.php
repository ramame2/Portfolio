<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Berichten</title>
</head>
<body>

<div class="container">
    <h1>Berichten</h1>
    <?php if (empty($messages)): ?>
        <p>Geen messages.</p>
    <?php else: ?>
        <?php foreach ($messages as $message): ?>
            <div class="message">
                <h3>Van: <?php echo htmlspecialchars($message['naam']); ?></h3>
                <p>E-mail: <?php echo htmlspecialchars($message['email']); ?></p>
                <p>Message: <?php echo htmlspecialchars($message['boodschap']); ?></p>
                <p>Datum: <?php echo htmlspecialchars($message['verzonden_op']); ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>
<br><br>
</body>
</html>
