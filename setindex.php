<?php
include './conect_db.php';
session_start();
$result = mysqli_query($con, "SELECT * FROM user");
$search = isset($_GET['search']) ? $_GET['search'] : "";
if (!empty($_GET['limit']) && !empty($_GET['page'])) {
$getLimit = $_GET['limit'];
$getOffset = $_GET['page'];
} else {
$getLimit = 12;
$getOffset = 1;
}
$offset = ($getOffset - 1) * $getLimit;
if ($search) {
$rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `title` LIKE '%" . $search . "%'")->num_rows;
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `title` LIKE '%" . $search . "%' ORDER BY `idProduct` DESC limit " . $getLimit . " OFFSET " . $offset . "");
} else {
$rowProducts = mysqli_query($con, "SELECT * FROM `products`")->num_rows;
$products = mysqli_query($con, "SELECT * FROM `products` ORDER BY `idProduct` DESC limit " . $getLimit . " OFFSET " . $offset . "");
}
if (isset($_GET['discount'])) {
$rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `discount`")->num_rows;
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `discount` ORDER BY `idProduct` DESC limit " . $getLimit . " OFFSET " . $offset . "");
}
if (isset($_GET['form']) && isset($_GET['to'])) {
$rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `price`")->num_rows;
// $newCost = mysqli_query($con, "SELECT * FROM `products`");
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `price` >= " . ($_GET['form'] * 1000000) . " AND `price` <= " . ($_GET['to'] * 1000000) . " ORDER BY `idProduct` DESC limit " . $getLimit . " OFFSET " . $offset . "");
}

$totalpages = ceil($rowProducts / $getLimit);
mysqli_close($con);