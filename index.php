<!-- SELECT * FROM `products` WHERE `price` >= 5000000 AND `price` <= 10000000 -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Sell LapTop</title>
</head>

<body style="background-color: rgb(241, 241, 240);">
    <!-- PHP -->
    <?php
  include "./setindex.php";
  ?>
    <!-- Header -->
    <div id="header">
        <div class="grid">
            <div class="header-container">
                <div class="header-container__logo">
                    <a href=".">
                        <img src="./assets/imgs/containerHeader/Logo.png" alt="Logo"
                            class="header-container__logo-size">
                    </a>
                </div>
                <div class="header-container__search">
                    <form class="header-container__search" action="" method="GET">
                        <input class="header-container__search-input" type="text"
                            placeholder="Bạn muốn tìm sản phẩm gì?" name="search" autocomplete="off">
                        <button class="header-container__search-icon" style="padding-top:0;" type="submit">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </form>
                </div>
                <div class="header-container__cart neo-more__card">
                    <div class="cart-icon">
                        <!-- quantiny product in cart -->
                        <?php if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
              include './conect_db.php';
              $ar = implode(",", array_keys($_SESSION['cart']));
              $productList = mysqli_query($con, "SELECT * FROM `products` WHERE `idProduct` IN (" . $ar . ")");
              $productRow = $productList->num_rows; ?>
                        <div class="box-quantity">
                            <span class="box-quantity__txt"><?= $productRow ?></span>
                        </div>
                        <?php } ?>
                        <!-- end quantiny product in cart -->
                        <a href="./cart/cart.php">
                            <i class="fa-sharp fa-solid fa-cart-shopping header-container__cart-icon"></i>
                        </a>
                        <!-- more cart -->
                        <?php include './more-cart.php' ?>

                        <!-- end more cart -->
                    </div>
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
                        <ul class="header-menu_product-list">
                            <?php if (!empty($_SESSION['current_user'])) { ?>
                            <li class="hover_dot-down header-menu_product-item">
                                <i class="fix-item-icon fa-solid fa-user"></i>
                                <a class="header-menu_product-link product-link_style">
                                    <?= $_SESSION['current_user']['username'] ?> </a>
                                <i class="user-icon-down fa-solid fa-caret-down" style="margin-left:5px;"></i>
                                <i class="fa-solid fa-circle user-icon-dot" style="font-size:8px; margin-left:5px;"></i>
                                <ul class="more-list_user-menu">
                                    <?php if ($_SESSION['current_user']['status'] == 'admin') { ?>
                                    <a href="./user/admin.php" class="more-list_user-link">
                                        <li class="more-list_menu-item">
                                            <p class="user-more__choice"> Admin Page</p>
                                        </li>
                                    </a>
                                    <?php } ?>
                                    <a href="" class="more-list_user-link">
                                        <li class="more-list_menu-item">
                                            <p class="user-more__choice">Thông tin User</p>
                                        </li>
                                    </a>
                                    <a href="./user/edit_user.php?id=<?= $_SESSION['current_user']['idUser'] ?>"
                                        class="more-list_user-link">
                                        <li class="more-list_menu-item">
                                            <p class="user-more__choice">Đổi mật khẩu</p>
                                        </li>
                                    </a>
                                    <a href="./user/logout.php?logout" class="more-list_user-link">
                                        <li class="more-list_menu-item">
                                            <p class="user-more__choice">Đăng xuất</p>
                                        </li>
                                    </a>
                                </ul>
                            </li>
                            <?php } else { ?>
                            <li class="header-menu_product-item">
                                <a class="header-menu_product-link product-link_style" href="./user/login.php">Đăng
                                    nhập</a>
                            </li>
                            <li class="header-menu_product-item">
                                <a class="header-menu_product-link product-link_style" href="./user/create.php">đăng
                                    ký</a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="body">
        <div class="grid">
            <?php if (isset($_GET['viewi4']) && isset($_GET['id'])) {
        include './product/viewProduct.php';
      } else
        //hiển thị các sản phẩm
        include './listpview.php'; ?>
        </div>
    </div>
    </div>
    <!-- I4 -->
    <div class="I4">
        <div class="body">
            <div class="grid">
                <div class="i4-flex">
                    <!--  -->
                    <div class="i4-flex__item">
                        <div class="i4-flex__item-img"></div>
                        <div class="i4-flex__item-text">
                            <p class="i4__item-text">Nhiều mặt hàng mới</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="i4-flex__item">
                        <div class="i4-flex__item-img"></div>
                        <div class="i4-flex__item-text">
                            <p class="i4__item-text">Giao hàng toàn quốc</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="i4-flex__item">
                        <div class="i4-flex__item-img"></div>
                        <div class="i4-flex__item-text">
                            <p class="i4__item-text">Mua hàng từ xa</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="i4-flex__item">
                        <div class="i4-flex__item-img"></div>
                        <div class="i4-flex__item-text">
                            <p class="i4__item-text">đổi trả trong vòng 15 ngày</p>
                        </div>
                    </div>
                    <!--  -->
                    <div class="i4-flex__item">
                        <div class="i4-flex__item-img"></div>
                        <div class="i4-flex__item-text">
                            <p class="i4__item-text">hỗ trợ suốt thời gian sử dụng</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?PHP include './footer.php'; ?>
</body>
<style>
.box-quantity {
    position: absolute;
    width: 24px;
    height: 24px;
    top: -15px;
    right: -12px;
    background-color: red;
    border-radius: 50%;
    display: flex;
}

.box-quantity__txt {
    margin: auto;
    font-size: 14px;
    color: var(--text-white);
    font-weight: 700;
}
</style>

</html>