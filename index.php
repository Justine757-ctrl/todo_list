<?php
// Debug : afficher les erreurs PHP à l'écran
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require_once __DIR__ . '/config/Database.php';
require_once __DIR__ . '/models/Task.php';
require_once __DIR__ . '/controllers/Taskcontroller.php';
$controller = new TaskController();
$action = $_GET['action'] ?? 'index';
match($action) {
    'index' => $controller->index(),
    'create' => $controller->create(),
    'toggle' => $controller->toggle(),
    'delete' => $controller->delete(),
    default  => $controller->index(),
};
?>