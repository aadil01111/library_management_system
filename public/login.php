<?php
require_once __DIR__.'/../config/db.php';
session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['captcha'] !== $_SESSION['captcha']) {
        $error = "Invalid captcha";
    } else {
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
        $stmt->execute([$_POST['username']]);
        $user = $stmt->fetch();

        if ($user && password_verify($_POST['password'],$user['password'])) {
            $_SESSION['user']=$user;
            header("Location: index.php");
            exit;
        }
        $error = "Invalid login";
    }
}
?>
<form method="post">
Username <input name="username"><br>
Password <input type="password" name="password"><br>
<img src="captcha.php"><br>
<input name="captcha"><br>
<button>Login</button>
<p style="color:red"><?= $error ?></p>
</form>
<p>
    <a href="register.php">Create Account</a>
</p>

