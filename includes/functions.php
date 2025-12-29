<?php
require_once __DIR__ . '/../vendor/autoload.php';

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
