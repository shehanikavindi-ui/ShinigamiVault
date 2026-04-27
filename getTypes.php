<?php
require "connection.php";

header('Content-Type: application/json');

$category_id = intval($_GET['category_id'] ?? 0);

if (!$category_id) {
    echo json_encode([]);
    exit;
}

$result = Database::search("SELECT * FROM `type` WHERE `category_id` = $category_id");

$types = [];
while ($row = $result->fetch_assoc()) {
    $types[] = $row;
}

echo json_encode($types);
?>