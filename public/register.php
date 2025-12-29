<?php
require '../config/db.php';
require '../includes/functions.php';

$message = null;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $pdo->prepare(
        "INSERT INTO users (username, password, role) VALUES (?, ?, 'user')"
    );

    try {
        $stmt->execute([$username, $password]);
        $message = "Account created successfully. You can login now.";
    } catch (PDOException $e) {
        $message = "Username already exists.";
    }
}

echo $twig->render('register.twig', ['message' => $message]);
