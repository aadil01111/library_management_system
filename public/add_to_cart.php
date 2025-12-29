<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

$stmt=$pdo->prepare(
"INSERT IGNORE INTO cart(user_id,book_id) VALUES(?,?)");
$stmt->execute([
$_SESSION['user']['id'],$_GET['id']
]);

header("Location:index.php");
