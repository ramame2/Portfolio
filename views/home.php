<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<?php include 'header.php'; ?>
<div class="containerr">

    <div class="search-form">
        <form action="/public/search.php" method="GET">
            <input type="text" name="query" placeholder="Zoek naar secties..." required>
            <button type="submit">Zoeken</button>
    <div class="intro-text">
        <p>Ik ben Rama Mari, en dit is mijn portfolio. Ik ben ambitieus, serieus in mijn taken en werk. Ik hou ervan om al mijn taken op tijd af te ronden. Productiviteit verhoogt altijd mijn geluksgevoel en positieve energie.</p>
    </div>
    <div class="intro-image">
        <img src="../im.webp" alt="Intro Image">
    </div>
    <div class="intro-text">
        <p>Welke secties bevat mijn portfolio?</p>
        <ul>
            <li><strong>Over mij-pagina:</strong> Hier staan alle persoonlijke informatie over mij. Mijn CV is hier ook te vinden, en er is de mogelijkheid voor u om mijn CV te downloaden.</li>
            <li><strong>Contactpagina:</strong> Via deze pagina kunt u contact met mij opnemen, ik kan dan uw berichten kijken en beantwoorden.</li>
            <li><strong>Projectenpagina:</strong> Op deze pagina presenteer ik de projecten die ik eerder heb gemaakt. Ik kan ook meer toekomstige projecten toevoegen als ik er meer heb. Daarnaast is er een sectie met informatie over alle projecten.</li>
        </ul>
    </div>
</div>
    <br><br><br><br>
</body>

    <?php include 'footer.php'; ?>

</html>
