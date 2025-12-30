<?php
require '../config/db.php';

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
}
