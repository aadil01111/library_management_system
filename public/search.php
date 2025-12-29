<?php
require '../config/db.php';

<<<<<<< HEAD
$q = "%".($_GET['q'] ?? '')."%";

$stmt = $pdo->prepare("
SELECT * FROM books
WHERE title LIKE ?
OR author LIKE ?
OR category LIKE ?
OR year LIKE ?
");
$stmt->execute([$q,$q,$q,$q]);

foreach ($stmt as $b) {
    echo "<tr>
    <td>{$b['title']}</td>
    <td>{$b['author']}</td>
    <td>{$b['category']}</td>
    <td>{$b['year']}</td>
    <td>{$b['price']}</td>
    <td>
    <a href='edit.php?id={$b['id']}'>Edit</a>
    <a href='delete.php?id={$b['id']}'>Delete</a>
    </td></tr>";
=======
$q = $_GET['q'] ?? '';
$q = "%$q%";

$stmt = $pdo->prepare("
    SELECT * FROM books 
    WHERE title LIKE ?
       OR author LIKE ?
       OR category LIKE ?
       OR year LIKE ?
       OR price LIKE ?
");

$stmt->execute([$q, $q, $q, $q, $q]);
$books = $stmt->fetchAll();

foreach ($books as $book) {
    echo "<tr>
        <td>" . htmlspecialchars($book['title']) . "</td>
        <td>" . htmlspecialchars($book['author']) . "</td>
        <td>" . htmlspecialchars($book['category']) . "</td>
        <td>" . htmlspecialchars($book['year']) . "</td>
        <td>" . htmlspecialchars($book['price']) . "</td>
        <td>
            <a href='edit.php?id={$book['id']}'>Edit</a>
            <a href='delete.php?id={$book['id']}' onclick='return confirm(\"Delete?\")'>Delete</a>
        </td>
    </tr>";
>>>>>>> origin/main
}
