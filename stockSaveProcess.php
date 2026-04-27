<?php
include "connection.php";

$item  = $_POST['item'];
$size  = $_POST['size'];
$color = $_POST['color'];
$price = $_POST['price'];

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimeZone($tz);
$date = $d->format("Y-m-d H:i:s");

// Insert Inventory
Database::iud("INSERT INTO `inventory` (`product_id`,`size_id`,`color_id`,`unit_price`,`updated_at`) 
                VALUES ('" . $item . "','" . $size . "','" . $color . "','" . $price . "', '" . $date . "') ");

// Get last inserted inventory id
$inventory_id = Database::search("SELECT MAX(`id`) as id FROM `inventory`")->fetch_assoc()['id'];

// Get product name for image path
$product = Database::search("SELECT `title` FROM `product` WHERE `id` = '".$item."'")->fetch_assoc();
$product_name = strtolower(preg_replace('/\s+/', '', $product['title'])); // remove spaces, lowercase

// Handle images
if (!empty($_FILES['images']['name'][0])) {
    $upload_dir = "assets/products/";

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
        $img_no   = $i + 1;
        $ext      = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
        $filename = $product_name . "Img" . $img_no . "." . $ext;
        $dest     = $upload_dir . $filename;

        if (move_uploaded_file($tmp, $dest)) {
            Database::iud("INSERT INTO `product_images` (`path`,`inventory_id`) 
                            VALUES ('".$dest."','".$inventory_id."') ");
        }
    }
}


echo("success");
?>