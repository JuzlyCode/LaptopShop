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
    <!-- Header -->
    <div id="header">
        <div class="grid">
            <div class="header-container">
                <div class="header-container__logo">
                    <img src="./assets/imgs/containerHeader/Logo.jpg" alt="Logo" class="header-container__logo-size">
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
                            <a href="./index.php" class="header-menu_product-link">
                                <li class="header-menu_product-item">
                                    <i class="fix-item-icon fa-solid fa-house"></i>
                                    <p class="product-item_name">Home</p>
                                </li>
                            </a>
                        </ul>
                    </div>
                    <div class="header-menu_user">
                        <ul class="header-menu_product-list">
                            <li class="header-menu_product-item">

                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login -->
    <?php
    session_start();
    include "./conect_db.php";
    $error = false;
    if (isset($_GET['action']) && $_GET['action'] == 'reg') {
        if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
            $result = mysqli_query($con, "SELECT `id`,`username`,`creat_date`,`password`,`status` FROM `user` WHERE (`username`='" . $_POST['username'] . "' AND `password` = md5('" . $_POST['password'] . "'))");
        }
        if (!$result) {
            $error = 'Error';
        } else {
            $user = mysqli_fetch_assoc($result);
            $_SESSION['current_user'] = $user;
        }
        mysqli_close($con);
        if ($error !== false || $result->num_rows == 0) {
    ?>
            <div class="body">
                <div class="grid">
                    <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                        <form class="form-flex" action="./login.php?action=reg" method="Post" autocomplete="off">
                            <div class="form-login__input-size">
                                <p class="form-login__input-text" style="color: red;">* thông tin không chính xác</p>
                                <p class="form-login__input-text">User:</p>
                                <input type="text" placeholder="User Name" name="username" required="" class="form-login__input" value="">
                            </div>
                            <div class="form-login__input-size">
                                <p class="form-login__input-text">Password :</p>
                                <input type="password" placeholder="Password" name="password" required="" class="form-login__input" value="">
                            </div>
                            <div class="form-login__btn-size">
                                <input class="form-login__btn-style" type="submit" value="Đăng nhập">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
            exit;
        }
    }
    if (empty($_SESSION['current_user'])) {
        ?>
        <div class="body">
            <div class="grid">
                <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                    <?php
                    if (!empty($_SESSION['ok_creat'])) {
                    ?>
                        <h1 style="text-align:center; margin-bottom:30px; color:green;">Tạo tài khoản thành công!</h1>
                    <?php
                    }
                    ?>
                    <h1 style="text-align:center; margin-bottom:30px;">Đăng Nhập</h1>
                    <form class="form-flex" action="./login.php?action=reg" method="Post" autocomplete="off">
                        <div class="form-login__input-size">
                            <p class="form-login__input-text">User:</p>
                            <input type="text" placeholder="User Name" name="username" required="" class="form-login__input" value="">
                        </div>
                        <div class="form-login__input-size">
                            <p class="form-login__input-text">Password :</p>
                            <input type="password" placeholder="Password" name="password" required="" class="form-login__input" value="">
                        </div>
                        <div class="form-login__btn-size">
                            <input class="form-login__btn-style" type="submit" value="Đăng nhập">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    } else {
    ?>
        <meta http-equiv="refresh" content="0;url=./">
    <?php }
    unset($_SESSION['ok_creat']);
    ?>
</body>
<?php
include './css.php';
?>

</html>