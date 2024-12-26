<header>

    <div id="text-container"></div>

    <script>
        const text = "Hello, welcome to my portfolio!";
        const textContainer = document.getElementById("text-container");
        let index = 0;

        function displayNextLetter() {
            if (index < text.length) {
                textContainer.innerHTML += text[index];
                index++;
                setTimeout(displayNextLetter, 200);
            } else {
                setTimeout(() => {
                    textContainer.innerHTML = "";
                    index = 0;
                    displayNextLetter();
                }, 2000);
            }
        }
        displayNextLetter();
    </script>
    <script src="../js/fav.js"></script>

    <button class="collapse-button" onclick="toggleMenu()">☰</button>

    <div class="items" id="menuItems">
        <a class="projecten2" href="../views/projecten.php" target="_self">📚 Projecten</a>
        <a class="over2" href="../views/about.php" target="_self">️📑 Over mij</a>
        <a class="contact2" href="../views/contact.php" target="_self">📨 Contact</a>
    </div>

    <script>
        function toggleMenu() {
            const menuItems = document.getElementById("menuItems");
            menuItems.style.display = (menuItems.style.display === "block") ? "none" : "block";
        }

        window.onclick = function(event) {
            const menuItems = document.getElementById("menuItems");
            if (!event.target.matches('.collapse-button')) {
                if (menuItems.style.display === "block") {
                    menuItems.style.display = "none";
                }
            }
        }
    </script>
</header>
