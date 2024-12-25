
function openProjectLink(link) {
    // Open the link in a new tab
    if (link) {
        window.open(link, '_blank');
    } else {
        console.error("No link provided for this project.");
    }
}
function showProjectInfo(id) {
    var button = document.querySelector(`button[onclick="showProjectInfo('${id}')"]`);
    var info = button.getAttribute('data-info');

    document.getElementById('project-content').innerText = info;
    document.getElementById('project-display').style.display = 'block';
    document.getElementById('project-content').style.display = 'block'; // Zorg ervoor dat de inhoud wordt weergegeven
}
