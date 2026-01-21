<?php
include "db.php";

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
}

/* ---------- PAGINATION SETUP ---------- */
$limit = 3; // posts per page

$page = 1;
if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

$start = ($page - 1) * $limit;

/* ---------- TOTAL POSTS COUNT ---------- */
if ($search != "") {
    $total_result = $conn->query("SELECT COUNT(*) as total FROM posts 
        WHERE title LIKE '%$search%' OR content LIKE '%$search%'");
} else {
    $total_result = $conn->query("SELECT COUNT(*) as total FROM posts");
}

$total_row = $total_result->fetch_assoc();
$total_posts = $total_row['total'];
$total_pages = ceil($total_posts / $limit);

/* ---------- FETCH POSTS ---------- */
if ($search != "") {
    $result = $conn->query("SELECT * FROM posts 
        WHERE title LIKE '%$search%' OR content LIKE '%$search%' 
        ORDER BY id DESC LIMIT $start, $limit");
} else {
    $result = $conn->query("SELECT * FROM posts 
        ORDER BY id DESC LIMIT $start, $limit");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Posts</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body>

<h2>All Posts</h2>

<form method="GET" style="margin-bottom:15px;">
    <input type="text" name="search" placeholder="Search posts..." value="<?php echo $search; ?>">
    <button type="submit">Search</button>
</form>

<hr>

<?php
while ($row = $result->fetch_assoc()) {
    echo "<h3>".$row['title']."</h3>";
    echo "<p>".$row['content']."</p>";
    echo "<a href='edit.php?id=".$row['id']."'>Edit</a> | ";
    echo "<a href='delete.php?id=".$row['id']."'>Delete</a>";
    echo "<hr>";
}
?>

<!-- PAGINATION LINKS -->
<div style="margin-top:20px;">
<?php
for ($i = 1; $i <= $total_pages; $i++) {
    echo "<a href='view.php?page=$i&search=$search' style='margin:5px;'>$i</a>";
}
?>
</div>

<br>
<a href="dashboard.php">Back</a>

</body>
</html>
