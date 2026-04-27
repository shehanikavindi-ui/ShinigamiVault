<?php
include "connection.php";

$item   = $_POST['item'];
$color  = $_POST['color'];
$size   = $_POST['size'];
$price  = $_POST['price'];
$qty    = $_POST['qty'];
$images_exist = $_POST['images_exist']; // '1' or '0'

$d = new DateTime();
$tz = new DateTimeZone("Asia/Colombo");
$d->setTimeZone($tz);
$date = $d->format("Y-m-d H:i:s");

// Insert into inventory
Database::iud("INSERT INTO `inventory` (`product_id`,`size_id`,`color_id`,`unit_price`,`qty`,`updated_at`) 
                VALUES ('$item','$size','$color','$price','$qty','$date')");

// Only upload images if new product+color combo
if ($images_exist === '0' && !empty($_FILES['images']['name'][0])) {

    // Get product name for file naming
    $product = Database::search("SELECT `title` FROM `product` WHERE `id` = '$item'")->fetch_assoc();
    $product_name = strtolower(preg_replace('/\s+/', '', $product['title']));

    $upload_dir = "assets/products/";
    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $allowed  = ['image/jpeg', 'image/png', 'image/webp'];
    $max_size = 5 * 1024 * 1024; // 5MB

    foreach ($_FILES['images']['tmp_name'] as $i => $tmp) {
        $mime     = $_FILES['images']['type'][$i];
        $filesize = $_FILES['images']['size'][$i];

        if (!in_array($mime, $allowed)) {
            echo "invalid image type";
            exit;
        }
        if ($filesize > $max_size) {
            echo "image too large (max 5MB)";
            exit;
        }

        $ext      = pathinfo($_FILES['images']['name'][$i], PATHINFO_EXTENSION);
        $img_no   = $i + 1;
        $filename = $product_name . "Img" . $img_no . "." . $ext;
        // ex: ryomensukunaoversizedteeImg1.jpg
        $dest     = $upload_dir . $filename;

        if (move_uploaded_file($tmp, $dest)) {
            Database::iud("INSERT INTO `product_images` (`path`,`product_id`,`color_id`) 
                            VALUES ('$dest','$item','$color')");
        }
    }
}

echo ("success");
?>