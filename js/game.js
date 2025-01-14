let score = 0;
let gameInterval;

document.getElementById('start-game').addEventListener('click', startGame);
document.getElementById('end-game').addEventListener('click', endGameManually);
window.onload = loadHighScore;

function startGame() {
    score = 0;
    document.getElementById('score').innerText = 'Score: ' + score;
    document.getElementById('start-game').style.display = 'none';
    document.getElementById('end-game').style.display = 'block';
    gameInterval = setInterval(createBubble, 2000); // Slower bubble creation
    setTimeout(endGame, 30000); // End game after 30 seconds
}

function endGameManually() {
    endGame();
}

function createBubble() {
    const bubble = document.createElement('div');
    bubble.classList.add('bubble');
    bubble.style.left = Math.random() * 100 + 'vw';
    bubble.style.top = Math.random() * 100 + 'vh';
    bubble.style.width = Math.random() * 30 + 30 + 'px'; // Random bubble size
    bubble.style.height = bubble.style.width;
    bubble.style.backgroundColor = getRandomColor(); // Random color
    bubble.addEventListener('click', popBubble);
    document.body.appendChild(bubble);

    moveBubble(bubble); // Start movement

    setTimeout(() => bubble.remove(), 10000); // Remove bubble after 10 seconds
}

function moveBubble(bubble) {
    let dx = (Math.random() - 1.5) * 3; // Random horizontal speed
    let dy = (Math.random() - 1.5) * 2; // Random vertical speed

    function updatePosition() {
        const rect = bubble.getBoundingClientRect();
        if (rect.left <= 0 || rect.right >= window.innerWidth) dx = -dx; // Bounce horizontally
        if (rect.top <= 0 || rect.bottom >= window.innerHeight) dy = -dy; // Bounce vertically

        bubble.style.left = rect.left + dx + 'px';
        bubble.style.top = rect.top + dy + 'px';

        requestAnimationFrame(updatePosition);
    }

    requestAnimationFrame(updatePosition);
}

function popBubble(event) {
    score++;
    document.getElementById('score').innerText = 'Score: ' + score;
    event.target.remove();
}

function endGame() {
    clearInterval(gameInterval);
    document.querySelectorAll('.bubble').forEach(bubble => bubble.remove());
    saveScore(score);
    loadHighScore(); // Load high score after the game ends
    document.getElementById('end-game').style.display = 'none';
    document.getElementById('start-game').style.display = 'block';
}

function saveScore(score) {
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'save_score.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('score=' + score);
}

function loadHighScore() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_high_score.php', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('high-score').innerText = 'High Score: ' + xhr.responseText;
        }
    };
    xhr.send();
}

function getRandomColor() {
    const letters = '0123456789ABCDEF';
    let color = '#';
    for (let i = 0; i < 6; i++) {
        color += letters[Math.floor(Math.random() * 16)];
    }
    return color;
}
