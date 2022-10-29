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
    <!-- edit -->
    <?php
    session_start();
    include "./conect_db.php";
    if (!empty($_SESSION['current_user'])) {
        $result = mysqli_query($con, "SELECT * FROM user");
        $error = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['username']) && !empty($_POST['username'])) {
                $resultUser = mysqli_query($con, "UPDATE `user` SET `username` = '" . $_POST['username'] . "' WHERE `user`.`id` = " . $_POST['user_id'] . ";");
                if (!$resultUser) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "tên tài khoản đã tồn tại";
                    }
                }
            }
            if ($error !== false) {
                while ($row = mysqli_fetch_array($result)) {
                    if ($row['id'] == $_POST['user_id']) {
                        $id = $row['id'];
    ?>
                        <div class="body">
                            <div class="grid">
                                <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                                    <h1 style="margin-bottom: 30px; font-size:15px; text-transform:uppercase;">Đổi thông tin tài khoản <?= $row['username'] ?></h1>
                                    <form class="form-flex" action="./edit_user.php?action=edit" method="Post" autocomplete="off">
                                        <div class="form-login__input-size">
                                            <input type="hidden" name="user_id" value="<?= $id ?>">
                                            <p class="form-login__input-text">New User:</p>
                                            <p class="form-login__input-text" style="color:red;">* Tên User đã tồn tại</p>
                                            <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
                                        </div>
                                        <div class="form-login__input-size">
                                            <p class="form-login__input-text">New Password :</p>
                                            <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                                        </div>
                                        <?php
                                        if ($_SESSION['current_user']['status'] == 'admin') {
                                        ?>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">Thêm Quyền:</p>
                                                <select style="padding: 0 20px;" name="status" id="">
                                                    <option value="user">User</option>
                                                    <option value="admin">Admin</option>
                                                </select>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-login__btn-size">
                                            <input class="form-login__btn-style" type="submit" value="Edit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                }
            } else {
                if (isset($_POST['password']) && !empty($_POST['password'])) {
                    $resultPass = mysqli_query($con, "UPDATE `user` SET `password` = MD5('" . $_POST['password'] . "') WHERE `user`.`id` = " . $_POST['user_id'] . ";");
                }
                if (isset($_POST['status']) && !empty($_POST['status'])) {
                    $resultPass = mysqli_query($con, "UPDATE `user` SET `status` = '" . $_POST['status'] . "' WHERE `user`.`id` = " . $_POST['user_id'] . ";");
                }
                ?>
                <div class="body">
                    <div class="grid">
                        <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                            <h1 style="text-align:center; margin-bottom:30px;">Đổi thông tin thành công!</h1>
                        </div>
                    </div>
                </div>
                <?php
            }
        } else {
            while ($row = mysqli_fetch_array($result)) {
                if ($row['id'] == $_GET['id']) {
                    if ($_SESSION['current_user']['id'] == $_GET['id'] || $_SESSION['current_user']['status'] == 'admin') {
                ?>
                        <div class="body">
                            <div class="grid">
                                <div class="form-login" style="background-color: var(--white-color); padding:50px; padding-bottom:100px;">
                                    <h1 style="margin-bottom: 30px; font-size:15px; text-transform:uppercase;">Đổi thông tin tài khoản <?= $row['username'] ?></h1>
                                    <form class="form-flex" action="./edit_user.php?action=edit" method="Post" autocomplete="off">
                                        <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                                        <?php
                                        if ($_SESSION['current_user']['status'] == 'admin') {
                                        ?>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">New User:</p>
                                                <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
                                            </div>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">New Password :</p>
                                                <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                                            </div>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">Thêm Quyền:</p>
                                                <select style="padding: 0 20px;" name="status" id="">
                                                    <?php
                                                    if ($row['status'] !== 'admin') {
                                                    ?>
                                                        <option value="user">User</option>
                                                        <option value="admin">Admin</option>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <option value="admin">Admin</option>
                                                        <option value="user">User</option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        <?php
                                        } else {
                                        ?>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">New Password :</p>
                                                <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                                            </div>
                                        <?php
                                        }
                                        ?>
                                        <div class="form-login__btn-size">
                                            <input class="form-login__btn-style" type="submit" value="Edit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
        <?php
                    }
                }
            }
        }
    } else {
        ?>
        <meta http-equiv="refresh" content="0;url=./login.php">
    <?php
    }

    ?>

</body>
<!-- style create -->
<?php
include './css.php';
?>
</style>

</html>