<?php
require '../config/db.php';
require '../includes/functions.php';

$id = $_GET['id'] ?? null;
if (!$id) die('Invalid ID');

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();

if (!$book) die('Book not found');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "UPDATE books SET title=?, author=?, category=?, year=?, price=? WHERE id=?"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['author'],
        $_POST['category'],
        $_POST['year'],
        $_POST['price'],
        $id
    ]);

    header('Location: index.php');
    exit;
}

echo $twig->render('book_form.twig', [
    'title' => 'Edit Book',
    'book'  => $book
]);
