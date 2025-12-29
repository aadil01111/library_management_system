<?php
require_once __DIR__ . '/../vendor/autoload.php';

<<<<<<< HEAD
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

$loader = new FilesystemLoader(__DIR__ . '/../templates');
$twig = new Environment($loader);

function requireLogin() {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
        exit;
    }
}

function requireAdmin() {
    if ($_SESSION['role'] !== 'admin') {
        die("Access denied");
    }
}
=======
$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader, [
    'autoescape' => 'html',
]);
>>>>>>> origin/main
