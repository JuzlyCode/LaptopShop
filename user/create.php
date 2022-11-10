<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-free-6.2.0-web/css/all.min.css">
    <title>Sell LapTop</title>
</head>

<body class="body-class">
    <!-- Login -->
    <?php
    include "../conect_db.php";
    $error = false;
    $errorPassword = false;
    $errorRePassword = false;
    if (isset($_GET['action']) && $_GET['action'] == 'create') {
        if(empty($_POST['password']))
        $errorPassword = "* bạn chưa nhập Mật khẩu.";
        if(empty($_POST['username'])){
            $error = "* bạn chưa nhập tài khoản.";
        }else{
            
            if (strlen($_POST['password']) < 7) {
                $errorPassword = '* mật khẩu phải ít nhất 7 ký tự.';
            }else if($_POST['password'] !== $_POST['repassword']){
            $errorRePassword = '* mật khẩu không giống nhau.';  
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
        }
        mysqli_close($con);
        if ($error !== false || $errorPassword !== false || $errorRePassword !== false) {
    ?>
            <div class="body">
                <div class="grid">
                    <div class="form-login">
                    <div class="space-logo__login">   
                    <a href="../">
                    <img src="../assets/imgs/containerHeader/Logo.png" class="logo__Login" alt="">
                        </a>
                    </div>
                        <form class="form-flex" action="./create.php?action=create" method="Post" autocomplete="off">
                            
                            <div class="form-login__input-size">
                                
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
                                
                                <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                            </div>
                            
                            <?php
                            if ($errorPassword !== false) {
                            ?>
                                <h3 style="font-size:10px; margin:-8px 0 5px 0; color:red; text-transform: lowercase;"><?= $errorPassword ?></h3>
                            <?php
                            }
                            ?>
                            <div class="form-login__input-size">
                            
                            <input type="password" placeholder="Password Again" name="repassword" class="form-login__input" value="">
                            </div>
                            <?php
                            if ($errorRePassword !== false) {
                            ?>
                                <h3 style="font-size:10px; margin:-8px 0 5px 0; color:red; text-transform: lowercase;"><?= $errorRePassword ?></h3>
                            <?php
                            }
                            ?>
                            <input type="hidden" name="creat-ok" value="okok">
                            <div class="form-login__btn-size">
                                <input class="form-login__btn-style" type="submit" value="Đăng Ký">
                            </div>
                        </form>
                        <div class="clear"></div>
                        <label class="form-login__Blank">bạn đã có tài khoản? <a href="../user/login.php" class="form-login__Blank-a">Đăng Nhập</a></label>
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
                <div class="form-login">
                    <div class="space-logo__login"> 
                        <a href="../">
                    <img src="../assets/imgs/containerHeader/Logo.png" class="logo__Login" alt="">
                        </a>
                    </div>
                    <form class="form-flex" action="./create.php?action=create" method="Post" autocomplete="off">
                        <div class="form-login__input-size">
                            
                            <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
                        </div>
                        <div class="form-login__input-size">
                            
                            <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
                        </div>
                        <div class="form-login__input-size">
                            
                            <input type="password" placeholder="Password Again" name="repassword" class="form-login__input" value="">
                        </div>
                        
                        <input type="hidden" name="creat-ok" value="okok">
                        <div class="form-login__btn-size">
                            <input class="form-login__btn-style" type="submit" value="Đăng Ký">
                        </div>
                    </form>
                    <div class="clear"></div>
                        <label class="form-login__Blank">bạn đã có tài khoản? <a href="../user/login.php" class="form-login__Blank-a">Đăng nhập</a></label>
                </div>
            </div>
        </div>
    <?php } ?>
</body>
<?php
include '../css.php';
?>

</html>