<?php
include "db.php";

$id = $_GET['id'];
$result = $conn->query("SELECT * FROM posts WHERE id=$id");
$row = $result->fetch_assoc();

if (isset($_POST['update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("UPDATE posts SET title='$title', content='$content' WHERE id=$id");
    header("Location: view.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Post</title>

    <!-- ✅ ADD CSS HERE -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!-- ✅ ADD CONTAINER HERE -->
<div class="container">

    <h2>Edit Post</h2>

    <form method="post">
        <input type="text" name="title" value="<?php echo $row['title']; ?>" required>

        <textarea name="content" required><?php echo $row['content']; ?></textarea>

        <button type="submit" name="update">Update</button>
    </form>

</div>

</body>
</html>