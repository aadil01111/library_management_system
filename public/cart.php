<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

$stmt=$pdo->prepare(
"SELECT c.id,b.title,b.author,b.price
 FROM cart c JOIN books b ON c.book_id=b.id
 WHERE c.user_id=?");
$stmt->execute([$_SESSION['user']['id']]);
$items=$stmt->fetchAll();
?>

<h2>My Cart</h2>
<table border="1">
<tr><th>Title</th><th>Author</th><th>Price</th><th>Action</th></tr>
<?php foreach($items as $i): ?>
<tr>
<td><?= $i['title'] ?></td>
<td><?= $i['author'] ?></td>
<td><?= $i['price'] ?></td>
<td><a href="delete_cart.php?id=<?= $i['id'] ?>">Delete</a></td>
</tr>
<?php endforeach; ?>
</table>
