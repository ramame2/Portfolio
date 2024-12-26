
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bubble Game</title>
    <script src="../js/fav.js"></script>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
<div id="header">
    <button id="start-game">Start Game</button>
    <button id="end-game" style="display: none;">End Game</button>
</div>
<div id="game-container">
    <h2>Bubble Game</h2>
    <div id="score">Score: 0</div>
</div>
<script src="../js/game.js"></script>
</body>
</html>


<style>
    body {
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background: linear-gradient(135deg, #ffcc33, #ff66cc, #66ffcc, #3399ff);
        color: #fff;
        font-family: Arial, sans-serif;
        margin: 0;
        overflow: hidden;
    }


    #header button {
        margin: 0 10px;
        padding: 10px 20px;
        background-color: #6200ea;
        color: #fff;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 1rem;
    }

    #header button:hover {
        background-color: #3700b3;
    }

    #game-container {
        text-align: center;
        flex: 1;
    }

    .bubble {
        position: absolute;
        width: 50px;
        height: 50px;
        background: radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.2), rgba(97, 218, 251, 0.5));
        border-radius: 50%;
        cursor: pointer;
        box-shadow: inset -10px -10px 20px rgba(255, 255, 255, 0.5), inset 10px 10px 20px rgba(0, 0, 0, 0.2);
        border: 2px solid rgba(255, 255, 255, 0.5);
        opacity: 0.7;
    }

</style>