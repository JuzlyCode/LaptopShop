<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Sell LapTop</title>
</head>

<body class="body-class"">
    <?php
    session_start();
    include "../conect_db.php";
    if (!empty($_SESSION['current_user'])) {
        $result = mysqli_query($con, "SELECT * FROM user");
        $error = false;
        $errorPassword = false;
        if (isset($_GET['action']) && $_GET['action'] == 'edit') {
            if (isset($_POST['username']) && !empty($_POST['username'])) {
                $resultUser = mysqli_query($con, "UPDATE `user` SET `username` = '" . $_POST['username'] . "' WHERE `user`.`id` = " . $_POST['user_id'] . ";");
                if (!$resultUser) {
                    if (strpos(mysqli_error($con), "Duplicate entry") !== FALSE) {
                        $error = "tên tài khoản đã tồn tại";
                    }
                }
                if (strlen($_POST['password']) < 7) {
                    $errorPassword = '* mật khẩu phải ít nhất 7 ký tự.';
                }
            }
            if ($error !== false || $errorPassword !== false) {
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
                                            <p class="form-login__input-text" style="color:red;"><?php if ($error !== false) echo $error; else echo $errorPassword;?></p>
                                            <input type="text" placeholder="New User Name" name="username" class="form-login__input" value="">
                                        </div>
                                        <div class="form-login__input-size">
                                            
                                            <input type="password" placeholder="New Password" name="password" class="form-login__input" value="">
                                        </div>
                                        <?php
                                        if ($_SESSION['current_user']['status'] == 'admin') {
                                        ?>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">Thêm Quyền:</p>
                                                <select class="select-form__edit" name="status" id="">
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
                            <h1 style="text-align:center; margin-bottom:30px; color:green;">Đổi thông tin thành công!</h1>
                            <h3 style="text-align:center; margin-bottom:30px; color:red;">quay lại trang chủ trong 5s nữa!</h3>
                            <meta http-equiv="refresh" content="5;url=../">
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
                                    <h1 style="margin-bottom: 30px; font-size:15px; text-transform:uppercase; text-align: center;">Đổi thông tin tài khoản <?= $row['username'] ?></h1>
                                    <form class="form-flex" action="./edit_user.php?action=edit" method="Post" autocomplete="off">
                                        <input type="hidden" name="user_id" value="<?= $_GET['id'] ?>">
                                        <?php
                                        if ($_SESSION['current_user']['status'] == 'admin') {
                                        ?>
                                            <div class="form-login__input-size">
                                                
                                                <input type="text" placeholder="New User Name" name="username" class="form-login__input" value="">
                                            </div>
                                            <div class="form-login__input-size">
                                                
                                                <input type="password" placeholder="New Password" name="password" class="form-login__input" value="">
                                            </div>
                                            <div class="form-login__input-size">
                                                <p class="form-login__input-text">Thêm Quyền:</p>
                                                <select class="select-form__edit" name="status" id="">
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
                                            <input class="form-login__btn-style" type="submit" value="Thay đổi">
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
include '../css.php';
?>
<style>
    .select-form__edit {
        padding: 5px 20px;
    }
</style>


</html>