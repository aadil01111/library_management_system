<?php
require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../vendor/autoload.php';

if ($_SESSION['user']['role'] !== 'admin') {
    die('Access denied');
}

if (!isset($_GET['id'])) {
    die('Book ID missing');
}

$id = (int) $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = ?");
$stmt->execute([$id]);
$book = $stmt->fetch();

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
    header("Location: index.php");
    exit;
}

$loader = new \Twig\Loader\FilesystemLoader(__DIR__ . '/../templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('book_form.twig', [
    'title' => 'Edit Book',
    'book' => $book
]);
