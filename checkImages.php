<?php
include "connection.php";

$product_id = $_GET['product_id'];
$color_id   = $_GET['color_id'];

$rs = Database::search("SELECT `path` FROM `product_images` 
                         WHERE `product_id` = '$product_id' 
                         AND `color_id` = '$color_id'");

if ($rs->num_rows > 0) {
    $images = [];
    while ($row = $rs->fetch_assoc()) {
        $images[] = $row['path'];
    }
    echo json_encode(['exists' => true, 'images' => $images]);
} else {
    echo json_encode(['exists' => false, 'images' => []]);
}
?>