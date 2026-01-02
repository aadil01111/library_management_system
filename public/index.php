<?php
require_once '../config/db.php';
require_once '../includes/auth.php';

$query = "SELECT * FROM books WHERE 1=1";
$params = [];

if (!empty($_GET['title'])) {
    $query .= " AND title LIKE ?";
    $params[] = "%" . $_GET['title'] . "%";
}
if (!empty($_GET['author'])) {
    $query .= " AND author LIKE ?";
    $params[] = "%" . $_GET['author'] . "%";
}
if (!empty($_GET['category'])) {
    $query .= " AND category LIKE ?";
    $params[] = "%" . $_GET['category'] . "%";
}
if (!empty($_GET['year'])) {
    $query .= " AND year = ?";
    $params[] = $_GET['year'];
}

$stmt = $pdo->prepare($query);
$stmt->execute($params);
$books = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Book Management System</h2>
<p>
    Welcome <strong><?= htmlspecialchars($_SESSION['user']['username']) ?></strong>
    (<?= htmlspecialchars($_SESSION['user']['role']) ?>)
</p>


<?php if ($_SESSION['user']['role'] === 'admin'): ?>
    <a href="add.php">Add Book</a>
<?php else: ?>
    <a href="cart.php">Go to Cart</a>
<?php endif; ?>
 | <a href="logout.php">Logout</a>

<form method="get">
    <input name="title" placeholder="Title" value="<?= htmlspecialchars($_GET['title'] ?? '') ?>">
    <input name="author" placeholder="Author" value="<?= htmlspecialchars($_GET['author'] ?? '') ?>">
    <input name="category" placeholder="Category" value="<?= htmlspecialchars($_GET['category'] ?? '') ?>">
    <input name="year" placeholder="Year" value="<?= htmlspecialchars($_GET['year'] ?? '') ?>">
    <button type="submit">Search</button>
</form>

<table border="1" cellpadding="5">
<tr>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Year</th>
    <th>Price</th>
    <th>Action</th>
</tr>

<?php if ($books): ?>
<?php foreach ($books as $b): ?>
<tr>
    <td><?= htmlspecialchars($b['title']) ?></td>
    <td><?= htmlspecialchars($b['author']) ?></td>
    <td><?= htmlspecialchars($b['category']) ?></td>
    <td><?= htmlspecialchars($b['year']) ?></td>
    <td><?= htmlspecialchars($b['price']) ?></td>
    <td>
        <?php if ($_SESSION['user']['role'] === 'admin'): ?>
            <a href="edit.php?id=<?= $b['id'] ?>">Edit</a>
            <a href="delete.php?id=<?= $b['id'] ?>" onclick="return confirm('Delete this book?')">Delete</a>
        <?php else: ?>
            <a href="add_to_cart.php?id=<?= $b['id'] ?>">Add to Cart</a>
        <?php endif; ?>
    </td>
</tr>
<?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="6">No books found</td>
</tr>
<?php endif; ?>
</table>
