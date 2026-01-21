<?php
include "db.php";

if (isset($_POST['add'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];

    $conn->query("INSERT INTO posts(title, content) VALUES('$title', '$content')");
    header("Location: view.php");
}
?>

<h2>Add Post</h2>
<form method="post">
    <input type="text" name="title" placeholder="Title" required><br><br>
    <textarea name="content" placeholder="Content" required></textarea><br><br>
    <button name="add">Add Post</button>
</form>
