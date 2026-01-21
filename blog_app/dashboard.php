<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<div class="container">
    <h2>Welcome <?php echo $_SESSION['user']; ?></h2>

    <a href="add.php">Add Post</a> |
    <a href="view.php">View Posts</a> |
    <a href="logout.php">Logout</a>
</div>

</body>
</html>