<?php
$conn = new mysqli("localhost", "root", "", "guestbook");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO entries (name, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $name, $comment);
    $stmt->execute();
    $stmt->close();
}
$conn->close();
?>