<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Over Mij</title>
    <link rel="icon" href="my.ico" type="image/x-icon">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/script.js" defer></script>
</head>
<body>
<?php include 'header.php'; ?>
<h1 class="naam">Rama Mari</h1>
<div class="container2">

    <div class="about-section">

        <div class="left-div">
            <button class="tab-button" onclick="showDescription('skills')">Vaardigheden</button>
            <button class="tab-button" onclick="showDescription('studies')">Studies</button>
            <button class="tab-button" onclick="showDescription('work')">Werkervaring</button>
            <button class="tab-button" onclick="showDescription('hobbies')">Hobby's</button>
        </div>
        <div class="right-div">
            <img src="/f.jpg" alt="Mijn Foto">
        </div>
    </div>
    <div class="description-popup" id="description-popup">
        <div class="popup-content">
            <span class="close-button" onclick="closeDescription()">&times;</span>
            <div id="skills" class="description-text">Ik ben een veelzijdige ontwikkelaar met ervaring in HTML, CSS, JavaScript, PHP en Git.<br>
                Ik heb websites gebouwd, games ontwikkeld en beschik over een basiskennis van grafisch ontwerp.
                Daarnaast ben ik sterk in timemanagement en leer ik snel nieuwe vaardigheden aan.</div>
            <div id="studies" class="description-text">Ik heb biologie en biotechnologie gestudeerd aan de Universiteit van Aleppo in mijn land.<br>
                Daarna heb ik twee jaar informatietechnologie gevolgd, maar door de oorlog kon ik deze opleiding niet afronden.<br>
                Momenteel studeer ik AD Software Development aan Hogeschool Windesheim.</div>
            <div id="work" class="description-text">Ik heb drie jaar als tandartsassistente gewerkt in mijn land en een jaar stage gelopen in Nederland om mijn taalvaardigheid te verbeteren..</div>
            <div id="hobbies" class="description-text">Ik hou van sporten, tekenen, koken, en films kijken.</div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>
</body>
</html>

