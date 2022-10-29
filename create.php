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
                    <a href=".">
                        <img src="./assets/imgs/containerHeader/Logo.png" alt="Logo" class="header-container__logo-size">
                    </a>
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
                                đăng nhập
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login -->
    <?php
    include "./conect_db.php";
    $error = false;
    $errorPassword = false;
    if (isset($_GET['action']) && $_GET['action'] == 'create') {
        if (strlen($_POST['password']) < 7) {
            $errorPassword = '* mật khẩu phải ít nhất 7 ký tự.';
        } else {
            if (isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password'])) {
                $result = mysqli_query($con, "INSERT INTO `user` (`id`, `username`, `password`, `status`, `creat_date`) VALUES (NULL, '" . $_POST['username'] . "', MD5('" . $_POST['password'] . "'), 'user', " . time() . ");");
            }

            if (!$result) {
                if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                    $error = "* Tài khoản đã tồn tại.";
                }
            }
        }
        mysqli_close($con);
        if ($error !== false || $errorPassword !== false) {
    ?>
            <div class="body">
                <div class="grid">
                    <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                        <h1 style="text-align:center; margin-bottom:30px;">Tạo không thành công!</h1>
                        <form class="form-flex" action="./create.php?action=create" method="Post" autocomplete="off">
                            <div class="form-login__input-size">
                                <p class="form-login__input-text">User:</p>
                                <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
                            </div>
                            <?php
                            if ($error !== false) {
                            ?>
                                <h3 style="font-size:10px; margin:-8px 0 5px 0; color:red; text-transform: lowercase;"><?= $error ?></h3>
                            <?php
                            }
                            ?>
                            <div class="form-login__input-size">
                                <p class="form-login__input-text">Password :</p>
                                <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                            </div>
                            <?php
                            if ($errorPassword !== false) {
                            ?>
                                <h3 style="font-size:10px; margin:-8px 0 5px 0; color:red; text-transform: lowercase;"><?= $errorPassword ?></h3>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="creat-ok" value="okok">
                            <div class="form-login__btn-size">
                                <input class="form-login__btn-style" type="submit" value="Create">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php
        } else {
            session_start();
            $_SESSION['ok_creat'] = $_POST['creat-ok'];
        ?>
            <meta http-equiv="refresh" content="0;url=./login.php">
        <?php
        }
    } else {
        ?>
        <div class="body">
            <div class="grid">
                <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                    <form class="form-flex" action="./create.php?action=create" method="Post" autocomplete="off">
                        <div class="form-login__input-size">
                            <p class="form-login__input-text">User:</p>
                            <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
                        </div>
                        <div class="form-login__input-size">
                            <p class="form-login__input-text">Password :</p>
                            <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                        </div>
                        <input type="hidden" name="creat-ok" value="okok">
                        <div class="form-login__btn-size">
                            <input class="form-login__btn-style" type="submit" value="Create">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
<?php
include './css.php';
?>

</html>