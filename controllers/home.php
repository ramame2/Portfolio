<?php
class Home {
    public function index() {
        // Laad de view voor de homepagina
        require 'views/home.php';
    }

    public function about() {
        // Laad de view voor de aboutpagina
        require 'views/about.php';
    }
}
?>

