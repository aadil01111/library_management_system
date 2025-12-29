<?php
<<<<<<< HEAD
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../vendor/autoload.php';

if ($_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);
=======
require '../config/db.php';
require '../includes/functions.php';
>>>>>>> origin/main

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
<<<<<<< HEAD
    header("Location: index.php");
    exit;
}

echo $twig->render('book_form.twig', ['title' => 'Add Book']);
=======

    header('Location: index.php');
    exit;
}

echo $twig->render('book_form.twig', [
    'title' => 'Add Book',
    'book'  => []
]);
>>>>>>> origin/main
