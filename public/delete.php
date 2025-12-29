<?php
<<<<<<< HEAD
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}

if (!isset($_GET['id'])) {
    die('Book ID missing');
}

$id = (int) $_GET['id'];
=======
require '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) die('Invalid ID');
>>>>>>> origin/main

$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
$stmt->execute([$id]);

<<<<<<< HEAD
header("Location: index.php");
=======
header('Location: index.php');
>>>>>>> origin/main
exit;
