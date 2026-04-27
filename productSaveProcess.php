<?php
include "connection.php";

$title = $_POST["title"];
$category = $_POST["cat"];
$type = $_POST["type"];
$collection = $_POST["coll"];
$description = $_POST["desc"];

Database::iud("INSERT INTO `product` (`title`,`description`,`type_id`,`collection_id`) 
                VALUES ('".$title."','".$description."','".$type."','".$collection."') ");

echo ("success");

?>