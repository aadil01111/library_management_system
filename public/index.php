<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

$query="SELECT * FROM books WHERE 1=1";
$params=[];

if(!empty($_GET['title'])){
 $query.=" AND title LIKE ?";
 $params[]="%".$_GET['title']."%";
}
if(!empty($_GET['author'])){
 $query.=" AND author LIKE ?";
 $params[]="%".$_GET['author']."%";
}
if(!empty($_GET['category'])){
 $query.=" AND category LIKE ?";
 $params[]="%".$_GET['category']."%";
}
if(!empty($_GET['year'])){
 $query.=" AND year=?";
 $params[]=$_GET['year'];
}

$stmt=$pdo->prepare($query);
$stmt->execute($params);
$books=$stmt->fetchAll();
?>

<h2>Library Management</h2>

<?php if($_SESSION['user']['role']=='admin'): ?>
<a href="add.php">Add Book</a>
<?php else: ?>
<a href="cart.php">Go to Cart</a>
<?php endif; ?>
| <a href="logout.php">Logout</a>

<form>
<input name="title" placeholder="Title">
<input name="author" placeholder="Author">
<input name="category" placeholder="Category">
<input name="year" placeholder="Year">
<button>Search</button>
</form>

<table border="1">
<tr>
<th>Title</th><th>Author</th><th>Category</th><th>Year</th><th>Price</th><th>Action</th>
</tr>

<?php foreach($books as $b): ?>
<tr>
<td><?= $b['title'] ?></td>
<td><?= $b['author'] ?></td>
<td><?= $b['category'] ?></td>
<td><?= $b['year'] ?></td>
<td><?= $b['price'] ?></td>
<td>
<?php if($_SESSION['user']['role']=='admin'): ?>
<a href="edit.php?id=<?= $b['id'] ?>">Edit</a>
<a href="delete.php?id=<?= $b['id'] ?>">Delete</a>
<?php else: ?>
<a href="add_to_cart.php?id=<?= $b['id'] ?>">Add to Cart</a>
<?php endif; ?>
</td>
</tr>
<?php endforeach; ?>
</table>
