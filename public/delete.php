<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';

if ($_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}

if (!isset($_GET['id'])) {
    die('Book ID missing');
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
$stmt->execute([$id]);

header("Location: index.php");
exit;
