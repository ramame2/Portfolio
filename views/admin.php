<?php
global $conn;
require_once '../config/db_config.php';
require_once '../config/auth.php';
require_once '../controllers/ContactController.php';
require_once '../controllers/CVController.php';
require_once '../controllers/ProjectController.php';
require_once '../controllers/PageContentController.php';
include('../views/header.php');
$contactController = new ContactController($conn);
$cvController = new CVController($conn);
$projectController = new ProjectController($conn);
$pageContentController = new PageContentController($conn);

$successMessage = "";
$errorMessage = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $successMessage = "Succesvol bijgewerkt. Terug naar <a href='../views/admin.php'>Admin paneel</a> of naar <a href='../views/admin.php'>Home</a>.";

}
if ($successMessage): ?>
    <div class="message-success">
        <?php echo $successMessage; ?>
    </div>
<?php endif;
$page = $_GET['page'] ?? '';
$section = $_GET['section'] ?? '';

switch ($page) {


    case 'upload_cv':
        $filename = $_FILES['cv']['name'];
        $filedata = $_FILES['cv']['tmp_name'];
        echo $cvController->uploadCV($filename, $filedata);
        break;

    case 'cv':
        include('../views/uploadcv.php');
        break;

    case 'projects':
        $projects = $projectController->getProjects();
        include('../views/projecten.php');
        break;

    case 'edit_projects':
        $projects = $projectController->getProjects();
        include('../views/projecten.edit.php');
        break;

    case 'messages':
        $messages = $contactController->getMessages();
        include('../views/messages.php');
        break;

    case 'add_project':
        $name = $_POST['name'];
        $description = $_POST['description'];
        $details = $_POST['details'];
        $link = $_POST['link'];
        echo $projectController->addProject($name, $description, $details, $link);
        break;

    case 'remove_project':
        $id = $_POST['id'];
        echo $projectController->removeProject($id);
        break;

    case 'update_project':
        $id = $_POST['id'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $details = $_POST['details'];
        $link = $_POST['link'];
        echo $projectController->updateProject($id, $name, $description, $details, $link);
        break;


    default:
        echo '
    <div style="text-align: center; margin-top: 50px;">
        <a href="admin.php?page=messages" style="display: block; margin: 10px 0; font-size: 20px; text-decoration: none; color: #007BFF; background-color: #f0f8ff; padding: 10px 20px; border-radius: 5px;">Messages</a>
        <a href="admin.php?page=edit_projects" style="display: block; margin: 10px 0; font-size: 20px; text-decoration: none; color: #28a745; background-color: #e8f5e9; padding: 10px 20px; border-radius: 5px;">Projecten</a>
        <a href="admin.php?page=cv" style="display: block; margin: 10px 0; font-size: 20px; text-decoration: none; color: #dc3545; background-color: #f8d7da; padding: 10px 20px; border-radius: 5px;">Nieuwe CV uploaden</a>
        <a href="../views/content.edit.php" style="display: block; margin: 10px 0; font-size: 20px; text-decoration: none; color: #ffc107; background-color: #fff3cd; padding: 10px 20px; border-radius: 5px;">Inhoud bewerken</a>
    
    </div>
    ';
        break;

}
include('../views/footer.php');
?>
