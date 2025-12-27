<?php
require '../config/db.php';

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
}
