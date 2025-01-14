function showDescription(id) {
    // Verberg alle beschrijvingen
    var descriptions = document.getElementsByClassName('description-text');
    for (var i = 0; i < descriptions.length; i++) {
        descriptions[i].style.display = 'none';
    }

    // Toon de geselecteerde beschrijving
    document.getElementById(id).style.display = 'block';

    // Toon de popup
    document.getElementById('description-popup').style.display = 'block';
}

function closeDescription() {
    // Verberg de popup
    document.getElementById('description-popup').style.display = 'none';
}
