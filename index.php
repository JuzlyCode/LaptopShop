<!-- SELECT * FROM `products` WHERE `price` >= 5000000 AND `price` <= 10000000 -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
<title>Sell LapTop</title>
</head>
<body style="background-color: rgb(241, 241, 240);">
<!-- PHP --> <?php
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
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `title` LIKE '%" . $search . "%' ORDER BY `id` ASC limit " . $getLimit . " OFFSET " . $offset . "");
} else {
$rowProducts = mysqli_query($con, "SELECT * FROM `products`")->num_rows;
$products = mysqli_query($con, "SELECT * FROM `products` ORDER BY `id` ASC limit " . $getLimit . " OFFSET " . $offset . "");
}
if (isset($_GET['discount'])) {
$rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `discount`")->num_rows;
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `discount` ORDER BY `id` ASC limit " . $getLimit . " OFFSET " . $offset . "");
}
if (isset($_GET['form']) && isset($_GET['to'])) {
$rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `price`")->num_rows;
// $newCost = mysqli_query($con, "SELECT * FROM `products`");
$products = mysqli_query($con, "SELECT * FROM `products` WHERE `price` >= " . ($_GET['form'] * 1000000) . " AND `price` <= " . ($_GET['to'] * 1000000) . " ORDER BY `id` ASC limit " . $getLimit . " OFFSET " . $offset . "");
}

$totalpages = ceil($rowProducts / $getLimit);
mysqli_close($con);
?>
<!-- Header -->
<div id="header">
<div class="grid">
<div class="header-container">
<div class="header-container__logo">
<a href=".">
<img src="./assets/imgs/containerHeader/Logo.png" alt="Logo" class="header-container__logo-size">
</a>
</div>
<div class="header-container__search">
<form class="header-container__search" action="" method="GET">
<input class="header-container__search-input" type="text" placeholder="Bạn muốn tìm sản phẩm gì?" name="search">
<button class="header-container__search-icon" style="padding-top:0;" type="submit">
<i class="fa-solid fa-magnifying-glass"></i>
</button>
</form>
</div>
<div class="header-container__cart">
<i class="fa-sharp fa-solid fa-cart-shopping header-container__cart-icon"></i>
</div>
</div>
</div>
<div class="header-menu">
<div class="grid">
<div class="header-menu-flex">
<div class="header-menu_product">
<ul class="header-menu_product-list">
<li class="header-menu_product-item">
<i class="fix-item-icon fa-sharp fa-solid fa-laptop"></i>
<p class="product-item_name">Danh Mục</p>
<ul class="more-list_menu">
<div class="about-laptop">
<ul class="list-tyle-none about-dell-list">
<li class="more-list_menu-item menu-item__layout">Laptop Dell</li>
<li class="more-list_menu-item">Dell</li>
<li class="more-list_menu-item">Dell</li>
</ul>
</div>
<div class="about-laptop">
<ul class="list-tyle-none about-dell-list">
<li class="more-list_menu-item menu-item__layout">Laptop Acer</li>
<li class="more-list_menu-item">Dell</li>
<li class="more-list_menu-item">Dell</li>
</ul>
</div>
<div class="about-laptop">
<ul class="list-tyle-none about-dell-list">
<li class="more-list_menu-item menu-item__layout">Laptop Msi</li>
<li class="more-list_menu-item">Dell</li>
<li class="more-list_menu-item">Dell</li>
</ul>
</div>
<div class="about-laptop">
<ul class="list-tyle-none about-dell-list">
<li class="more-list_menu-item menu-item__layout">Laptop HP</li>
<li class="more-list_menu-item">Dell</li>
<li class="more-list_menu-item">Dell</li>
</ul>
</div>
</ul>
</li>
<li class="header-menu_product-item">
<i class="fix-item-icon fa-brands fa-hotjar"></i>
<a href="./?discount" style="text-decoration: none; color:var(--white-text);">
<p class="product-item_name">Khuyến Mãi</p>
</a>
</li>
</ul>
</div>
<div class="header-menu_user">
<ul class="header-menu_product-list"> <?php
if (!empty($_SESSION['current_user'])) {
?> <li class="hover_dot-down header-menu_product-item">
<i class="fix-item-icon fa-solid fa-user"></i>
<a class="header-menu_product-link product-link_style" href=""> <?= $_SESSION['current_user']['username'] ?> </a>
<i class="user-icon-down fa-solid fa-caret-down" style="margin-left:5px;"></i>
<i class="user-icon-dot fa-solid fa-circle" style="font-size:8px; margin-left:5px;"></i>
<ul class="more-list_user-menu"> <?php
if ($_SESSION['current_user']['status'] == 'admin') {
?> <a href="./user/admin.php" class="more-list_user-link">
<li class="more-list_menu-item">Admin Page</li>
</a> <?php
}
?> <a href="" class="more-list_user-link">
<li class="more-list_menu-item">Thông tin User</li>
</a>
<a href="./user/edit_user.php?id=
<?= $_SESSION['current_user']['id'] ?>" class="more-list_user-link">
<li class="more-list_menu-item">Đổi mật khẩu</li>
</a>
<a href="./user/logout.php?logout" class="more-list_user-link">
<li class="more-list_menu-item">Đăng xuất</li>
</a>
</ul>
</li> <?php
} else {

?> <li class="header-menu_product-item">
<a class="header-menu_product-link product-link_style" href="./user/login.php">Đăng nhập</a>
</li>
<li class="header-menu_product-item">
<a class="header-menu_product-link product-link_style" href="./user/create.php">đăng ký</a>
</li> <?php

}
?>
</ul>
</div>
</div>
</div>
</div>
</div>
<div class="body">
<div class="grid">
<div style="height: 500px;" class="slider">
<div style="height: 500px; margin-top:10px;">

  <img src="https://laptopaz.vn/media/banner/15_Jul61774c36e93704bf449eabe1846e635f.jpg" alt="" style="width:100%; height:100%;">
</div>
</div>
<div class="container">
<div class="container-header">
<div class="container-header__land">
<div class="container-header__box">
<p class="container-header__text" style="max-width: calc(100% - 32px);">Sản Phẩm mới</p>
</div>
<div class="container-price">
<p class="container-price__text">mức giá:</p>
<a class="container-proce__link" href="./?form=5&to=10">
<p class="container-price__about">5 triệu - 10 triệu</p>
</a>
<a class="container-proce__link" href="./?form=10&to=20">
<p class="container-price__about">10 triệu - 20 triệu</p>
</a>
<a class="container-proce__link" href="./?form=20&to=30">
<p class="container-price__about">20 triệu - 30 triệu</p>
</a>
<a class="container-proce__link" href="./?form=30&to=100">
<p class="container-price__about">Trên 30 triệu</p>
</a>
</div>
</div>
</div>
<div class="container-products"> <?php
$inProduct;
for ($i = 0; $i < $products->num_rows; $i++){
  $inProduct[] = mysqli_fetch_array($products);
}
for ($i = $products->num_rows - 1; $i >=0; $i--) {
?> <div class="container-products__item">
<img src="
<?= $inProduct[$i]['img'] ?>" alt="1" class="container-products__item-img"> <?php
if ($inProduct[$i]['discount'] !== '0') {
?> <div class="product-discount"></div>
<div class="product-discount-persent">- <?= $inProduct[$i]['discount'] ?>% </div> <?php
}
?> <div class="container-products__item-review" style="margin-top:10px; min-height: 50px;">
<a href="" class="container-products__item-review-link">
<p class="container-products__item-review-text"> <?= $inProduct[$i]['title'] ?> </p>
</a>
</div> <?php
$newprice = $inProduct[$i]['price'] - (($inProduct[$i]['price'] / 100) * $inProduct[$i]['discount']);
if ($inProduct[$i]['discount'] == '0') {
?> <div style="display: flex; justify-content: center; margin-top:10px;  padding-bottom:20px;">
<p style="display:inline-block; line-height:16px; font-style: italic; font-weight:550; color:var(--color-red); font-size:20px;"> <?= number_format($newprice) ?>đ </p> <?php
} else {
?> <div style="display: flex; margin-top:10px; justify-content: space-between; width:70%; margin-bottom: 20px;">
<p style="display:inline-block; line-height:16px; font-size:16px; color: #a29c9cd7; text-decoration: line-through;"> <?= number_format($inProduct[$i]['price']) ?>đ </p>
<p style="display:inline-block; line-height:16px; font-style: italic; font-weight:550; color:var(--color-red); font-size:20px; margin:0 auto;"> <?= number_format($newprice) ?>đ </p> <?php
}
?>
</div>
</div>
<?php
}
?>
</div>
<div class="pages_product"> <?php
include './page.php';
?> </div>
</div>
</div>
</div>
</body> <?php
include './css.php';
?>
</html>
<?php
