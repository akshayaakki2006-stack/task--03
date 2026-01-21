<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<link rel="stylesheet" href="css/style.css">
<body>

<h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

<a href="add.php">Add Post</a> |
<a href="view.php">View Posts</a> |
<a href="logout.php">Logout</a>

</body>
</html>