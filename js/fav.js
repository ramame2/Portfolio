function setEmojiFavicon(emoji) {
    var canvas = document.createElement("canvas");
    var ctx = canvas.getContext("2d");

    // Set canvas size for the favicon (e.g., 32x32 px)
    canvas.width = 32;
    canvas.height = 32;

    // Set the font and draw the emoji onto the canvas
    ctx.font = "32px sans-serif";
    ctx.textAlign = "center";
    ctx.textBaseline = "middle";
    ctx.fillText(emoji, 16, 16); // Position emoji at the center

    // Create a link element to set as the favicon
    var link = document.createElement("link");
    link.rel = "icon";
    link.href = canvas.toDataURL(); // Get the Data URL of the canvas
    document.head.appendChild(link);
}

// List of calm emojis
const calmEmojis = [ "🌸", "🍃", "🌿", "🌷", "🌻","💫"];

let emojiIndex = 0;
setInterval(function() {
    // Set a new emoji from the calmEmojis array
    setEmojiFavicon(calmEmojis[emojiIndex]);
    // Cycle through the emojis
    emojiIndex = (emojiIndex + 1) % calmEmojis.length;
}, 3000); // Change emoji every 3 seconds
