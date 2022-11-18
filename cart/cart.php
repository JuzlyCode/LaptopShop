<?php 
include './handling-cart.php';
// kiểm tra đăng nhập và chuyển hướng
if(isset($_SESSION['current_user'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="./pagecart.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Giỏ Hàng</title>
</head>
<body class="body-cart">
    <!-- header -->
    <div class="header-cart">
        <div class="header-cart__list">
        <div class="grid">
            <div class="about-header">
                <ul class="cart-list">
                    <!-- item head -->
                    <li class="cart-list__item item-head__card"><a href="../" class="style-link">Home</a></li>
                    <!-- items mid -->
                    <!-- <li class="cart-list__item"></li> -->
                    <!-- item last -->
                    <li class="cart-list__item " style="border: none;"><a href="./cart.php" class="style-link">Hỗ Trợ</a></li>
                </ul>
                <!-- user -->
                <ul class="cart-list">
                    <li class="cart-list__item item-last__card"><?=$_SESSION['current_user']['username']?></li>
                </ul>
            </div>
        </div>
        </div>
        <div class="grid">
            <!-- chứa logo và các item -->
            <div class="header-logo">
                <img src="../assets/imgs/containerHeader/Logo.png" alt="" class="header-cart__logo">
                <p class="header-logo__item"> Giỏ Hàng</p>
            </div>
        </div>
    </div>
    <!-- body -->
    <div class="container-cart">
        <div class="grid">
            <!-- box header product -->
            <div class="container-cart__box">
                <div class="cart__box-img">
                    <p class="cart__box-txt">Sản Phẩm</p>
                </div>
                <div class="cart__box-item">
                    <p class="cart__box-txt">Đơn Giá</p>
                </div>
                <div class="cart__box-item">
                    <p class="cart__box-txt">Số Lượng</p>
                </div>
                <div class="cart__box-item">
                    <p class="cart__box-txt">Giá Tiền</p>
                </div>
                <div class="cart__box-item">
                    <p class="cart__box-txt">Thao Tác</p>
                </div>
            </div>
            <!-- box product -->
            <?php for($i=0;$i<$productRow;$i++){ 
                if(!empty($_SESSION['cart'])){
                    $row = mysqli_fetch_array($productList); ?>

                <div class="container-cart__box">
                    <div class="cart__box-img">
                        <div class="box-img__flex">
                            <img src=".<?=$row['img']?>" alt="" class="box-img__fix">
                            <span class="box-item__txt box-item__txt-space"><?=$row['title']?></span>
                        </div>
                    </div>
                    <div class="cart__box-item">
                        <div class="box-item__flex">
                            <p class="box-item__txt"><?=number_format($row['price'],0,' ','.')?></p>
                        </div>
                    </div>
                    <div class="cart__box-item">
                        <div class="box-item__flex">
                            <p class="box-item__txt">Số Lượng</p>
                        </div>
                    </div>
                    <div class="cart__box-item">
                        <div class="box-item__flex">
                            <p class="box-item__txt"><?=number_format($row['price'],0,' ','.')?></p>
                        </div>
                    </div>
                    <div class="cart__box-item">
                        <div class="box-item__flex">
                            <p class="box-item__txt"><a class="box-item__link" href="?delete=<?=$row['idProduct']?>">Xóa</a></p>
                        </div>
                    </div>

                    <!-- giảm giá -->
                    <?php if($row['discount']>0){ ?>
                    <div class="cart__box-Voucher">
                        <div class="box-Voucher">
                            <i class="box-Voucher__icon fa-solid fa-tag"></i>
                            <span class="box-Voucher__txt">Sản phẩm đã giảm giá : <span class="box-Voucher__icon"><?=$row['discount']?>%</span></span>
                        </div>
                    </div>
                    <?php } ?>
                </div>

                <?php } 
            } ?>
        </div>
    </div>
    <!-- footer -->
    <div class="footer-cart">

    </div>
</body>
</html>

<?php
}else{
    // chuyển hướng khi chưa đăng nhập login.php
    echo '<meta http-equiv="refresh" content="0;url=../user/login.php">';
}
?>

<style>
/* voucher */
.box-Voucher {
    margin-left: 30px;
}
.cart__box-Voucher {
    width: 100%;
    padding: 15px;
    border-top: 1px solid #ccc;
}
.box-Voucher__txt {
    font-size: 14px;
    text-align: left;
}
.box-Voucher__icon {
    margin: 0 10px;
    color: red;
    font-size: 18px;
}
/* box view product */
.box-item__link {
    text-decoration: none;
    color: red;
}
.box-item__link:hover{
    color: var(--color-shop);
}
.box-item__flex,
.box-img__flex {
    display: flex;
    align-items: center;
    justify-content: center;
}
.box-img__fix {
    width: 120px; 
    margin-right: 10px;   
}
.box-item__flex {
width: 100%;
display: flex;
height: 100%;
}
.box-item__txt {
    font-size: 14px;
    margin: auto;
}
.box-item__txt-space {

    text-align: left;
}
/* box header product */
.container-cart__box {
    flex-wrap: wrap;
    display: flex;
    width: 100%;
    background-color: var(--white-color);
    margin: 10px 0;
    box-shadow:0 0 2px #ccc;
}
.cart__box-img {
width: 39%;
}

.cart__box-item {
width: 15%;
}
.cart__box-img,
.cart__box-item {
padding: 10px;
text-align: center;
}
.cart__box-txt {
    font-size: 14px;
    color: #888;
}
/*  */
.body-cart {
background-color: #F5F5F5;
}

.header-cart {
width: 100%;
background-color: var(--white-color);
}

.container-cart {

}

.footer-cart {

}

.header-cart__logo {
    height: 70px;
    align-items: center;
}
/* about headr */
.about-header {
    display: flex;
    justify-content: space-between;
}
.item-head__card {
    margin-left: -10px !important;
}
.item-last__card {
    border: none !important;
    text-transform: uppercase;
}
/* logo */
.header-logo {
    display: flex;
    padding: 10px;
    align-items: center;
}

.header-logo__item {
    font-size: 18px;
    margin-left: 30px;
    line-height: 30px;
    padding-left: 20px;
    border-left: 1px solid var(--color-shop);
    color: var(--color-shop);
}
/* header */
.header-cart__list {
width: 100%;
background-color: var(--color-shop);
padding: 5px;
}

.cart-list {
list-style: none;
}

.cart-list__item {
font-size: 14px;
display: inline-block;
color: var(--white-color);
border-right: 1px solid var(--white-color);
padding: 0 10px;
}


/* link all */
.style-link {
    text-decoration: none;
    color: var(--white-color);
}

</style>