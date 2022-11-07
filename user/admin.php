<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Sell LapTop</title>
</head>

<body style="background-color: rgb(241, 241, 240);">
    <!-- Header -->
    <div id="header">
        <div class="grid">
            <div class="header-container">
                <div class="header-container__logo">
                    <a href="../index.php">
                        <img src="../assets/imgs/containerHeader/Logo.png" alt="Logo" class="header-container__logo-size">
                    </a>
                    <!-- logo img -->
                </div>
                <div class="header-container__search">

                </div>
                <div class="header-container__cart">

                </div>
            </div>
        </div>
        <div class="header-menu">
            <div class="grid">
                <div class="header-menu-flex">
                    <div class="header-menu_product">
                        <ul class="header-menu_product-list">
                            <a href="../index.php" class="header-menu_product-link">
                                <li style="padding:0 30px;" class="header-menu_product-item">
                                    <i class="fix-item-icon fa-solid fa-house"></i>
                                    <p class="product-item_name">Home</p>
                                </li>
                            </a>
                            <a href="./logout.php?logout" class="header-menu_product-link">
                                <li style="padding:0 30px;" class="header-menu_product-item">
                                <i class="fix-item-icon fa-solid fa-circle-xmark"></i>
                                    <p class="product-item_name">Logout</p>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="header-menu_user">
                        <ul class="header-menu_product-list">
                            <li class="header-menu_product-item">
                                    <?php
                                    session_start();
                                if (!empty($_SESSION['current_user'])){
                                    ?>
                                        <i class="fix-item-icon fa-solid fa-user"></i>
                                        <a class="header-menu_product-link product-link_style" href=""> Xin chào <?= $_SESSION['current_user']['username'] ?> </a>
                                    <?php
                                }
                                
                            ?>
                            
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="body">
        <div class="grid">
            <div class="grid_flex">
                <div class="grid_flex-left">
                    <div class="grid_flex-left__header">
                        <p class="grid_flex-left__header-text">
                        <a href="./admin.php" class="left__link-header">ADmin Page</a>
                        </p>
                    </div>
                    <div class="grid_flex-left__item">
                        <ul class="grid_flex-left__ul">
                            <li class="grid_flex-left__li">
                                <a href="./admin.php?listuser" class="grid_flex-left__a">List User</a>
                            </li>
                            <li class="grid_flex-left__li">
                                <a href="./admin.php?uploadimg" class="grid_flex-left__a">Upload Ảnh</a>
                            </li>
                            <li class="grid_flex-left__li">
                                <a href="./admin.php?upload" class="grid_flex-left__a">Upload Sản Phẩm</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="grid_flex-right">
                    <?php
                    if(empty($_GET)){
                        ?>
                        <img class="grid_flex-right__img" src="http://localhost/shop/assets/imgs/admin/Set.png" alt="txt">
                        <?php
                    }
                    if(isset($_GET['listuser'])){
                        include './listuser.php';
                    }
                    if(isset($_GET['upload'])){
                        include '../product/upload.php';
                    }
                    if(isset($_GET['uploadimg'])){
                        include '../product/uploadimg.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
<?php
include '../css.php';
?>
<style>
    .left__link-header {
        text-decoration: none;
        font-size: 16px;
        color: var(--white-color);
    }
    .grid_flex-left__header {
        width: 100%;
    }
    .grid_flex-left__header-text {
        text-align: center;
        padding: 10px;
        background: var(--color-shop);
    }
    .grid_flex {
        display: flex;
        margin: 10px 0 10px 0;
    }
    .grid_flex-left {
        overflow: hidden;
        background-color: var(--white-color);
        width: 18%;
        box-shadow: 0 0 3px var(--color-shop);
        border-radius: 15px ;
    }
    .grid_flex-right {
        background-color: var(--white-color);
        border-radius: 15px ;
        margin-left: 10px;
        width: 82%;
        display: flex;
        box-shadow: 0 0 3px var(--color-shop);
        flex-wrap: wrap;
        justify-content: center;
        min-height: 555px;
    }
    .grid_flex-left__item {
        padding: 20px 0 100px 0;
    }
    .grid_flex-left__ul {
        list-style: none;
    }
    .grid_flex-left__li {
        margin: 0 10px;
        padding: 20px 20px 5px 20px;
        border-bottom: 1px solid var(--color-shop);
    }
    .grid_flex-left__a {
        text-decoration: none;
        color: var(--black-color);
        font-size: 16px;
    }
    .grid_flex-left__a:hover {
        color: var(--color-shop);
    }
    .grid_flex-right__img {
        width: 70%;
        margin: auto;
    }
</style>

</html>