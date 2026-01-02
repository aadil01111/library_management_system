<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

$stmt=$pdo->prepare("DELETE FROM cart WHERE id=?");
$stmt->execute([$_GET['id']]);

header("Location:cart.php");
