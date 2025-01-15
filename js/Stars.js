

    document.addEventListener('mousemove', (e) => {
    const star = document.createElement('div');
    star.classList.add('star');
    document.body.appendChild(star);

    // Position the star at the mouse cursor
    star.style.left = `${e.pageX - 10}px`; // Adjusted to center the star
    star.style.top = `${e.pageY - 10}px`; // Adjusted to center the star

    // Randomize star animation duration for variety
    const randomAnimationDuration = Math.random() * 1 + 0.5; // Between 0.5s and 1.5s
    star.style.animationDuration = `${randomAnimationDuration}s`;

    // Remove the star after the animation ends
    setTimeout(() => {
    star.remove();
}, randomAnimationDuration * 1000);
});

