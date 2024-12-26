<?php
require 'config/db_config.php';

// Define the path to the views folder
    $viewsPath = realpath(__DIR__ . '/views');

// Check if the file exists before including
if (file_exists($viewsPath . '/home.php')) {
    require $viewsPath . '/home.php';
} else {
    echo "Error: Home not found!";
}

?>
