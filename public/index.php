<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../config/db.php';
require '../includes/functions.php';

$stmt = $pdo->query("SELECT * FROM books ORDER BY id DESC");
$books = $stmt->fetchAll();

echo $twig->render('book_list.twig', [
    'books' => $books
]);
