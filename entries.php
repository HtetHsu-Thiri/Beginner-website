<?php
header('Content-Type: application/json');
$conn = new mysqli("localhost", "root", "", "guestbook");

$result = $conn->query("SELECT name, comment FROM entries ORDER BY date DESC");
$entries = [];
while ($row = $result->fetch_assoc()) {
    $entries[] = $row;
}
echo json_encode($entries);
$conn->close();
?>