<?php
require '../config/db.php';

$id = $_GET['id'] ?? null;
if (!$id) die('Invalid ID');

$stmt = $pdo->prepare("DELETE FROM books WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;
