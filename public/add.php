<?php
require '../config/db.php';
require '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare(
        "INSERT INTO books (title, author, category, year, price)
         VALUES (?, ?, ?, ?, ?)"
    );
    $stmt->execute([
        $_POST['title'],
        $_POST['author'],
        $_POST['category'],
        $_POST['year'],
        $_POST['price']
    ]);

    header('Location: index.php');
    exit;
}

echo $twig->render('book_form.twig', [
    'title' => 'Add Book',
    'book'  => []
]);
