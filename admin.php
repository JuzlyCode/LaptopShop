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
                            <!-- <li class="header-menu_product-item">
                            <a href="./admin.php" class="header-menu_product-link product-link_style ">Admin</a>
                            </li> -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login -->
    <?php
    include "./conect_db.php";
    $result = mysqli_query($con, "SELECT * FROM user");
    mysqli_close($con);
    session_start();
    if (empty($_GET)) {
    ?>
        <meta http-equiv="refresh" content="0;url=./">
        <?php
    } else {
        if (isset($_GET['upload'])) {
            var_dump($_GET);
        }

        if (isset($_GET['listuser'])) {

            if (!empty($_SESSION['current_user']) && $_SESSION['current_user']['status'] == 'admin') {
                // $ss = $result->fetch_array();
                // var_dump($ss);exit;
                $userList = [];
                $adminList = [];
                $userPlus = 0;
                $adminPlus = 0;
                for ($i = 0; $i < $result->num_rows; $i++) {
                    $row = mysqli_fetch_array($result);
                    if ($row['status'] == 'user') {
                        $userList[$userPlus] = $row;
                        $userPlus++;
                    } else {
                        $adminList[$adminPlus] = $row;
                        $adminPlus++;
                    }
                }
                // var_dump($userList);exit;
        ?>
                <div class="body">
                    <div class="grid">
                        <table style="margin:0 auto; margin-top:30px; width:70%; border: 1px solid;">

                            <tr>
                                <th colspan="6" style="padding:10px; font-size:18px; border:1px solid;">Admin</th>
                            </tr>

                            <tr style="text-align: center;">
                                <td>ID</td>
                                <td>User</td>
                                <td>Status</td>
                                <td>Date Create</td>
                                <td>Xóa</td>
                                <td>Sửa</td>
                            </tr>
                            <?php

                            for ($i = 0; $i < count($adminList); $i++) {
                                $row = $adminList;

                            ?>
                                <tr style="text-align: center;">
                                    <td><?= $row[$i]['id'] ?></td>
                                    <td><?= $row[$i]['username'] ?></td>
                                    <td><?= $row[$i]['status'] ?></td>
                                    <td><?= date('d/m/Y H:i', $row[$i]['creat_date']) ?></td>
                                    <td><a href="./edit_user.php?id=<?= $row[$i]['id'] ?>">Sửa</a></td>
                                    <td><a href="./delete_user.php?id=<?= $row[$i]['id'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>


                        <table style="margin:0 auto; margin-top:30px; width:70%; border:1px solid;">
                            <tr style="margin-top:50px;">
                                <th colspan="6" style="padding:10px; font-size:18px; border:1px solid;">User</th>
                            </tr>

                            <tr style="text-align: center;">
                                <td>ID</td>
                                <td>User</td>
                                <td>Status</td>
                                <td>Date Create</td>
                                <td>Xóa</td>
                                <td>Sửa</td>
                            </tr>
                            <?php

                            for ($i = 0; $i < count($userList); $i++) {
                                $row = $userList;

                            ?>
                                <tr style="text-align: center;">
                                    <td><?= $row[$i]['id'] ?></td>
                                    <td><?= $row[$i]['username'] ?></td>
                                    <td><?= $row[$i]['status'] ?></td>
                                    <td><?= date('d/m/Y H:i', $row[$i]['creat_date']) ?></td>
                                    <td><a href="./edit_user.php?id=<?= $row[$i]['id'] ?>">Sửa</a></td>
                                    <td><a href="./delete_user.php?id=<?= $row[$i]['id'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <meta http-equiv="refresh" content="0;url=./login.php">
    <?php
            }
        }
    }
    ?>
</body>
<style>
    td {
        min-width: 100px;
        padding: 10px;
        border: 1px solid #000;
    }
</style>
<?php
include './css.php';
?>

</html>