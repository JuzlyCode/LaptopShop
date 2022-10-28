<?php
    session_start();
    if(!empty($_SESSION['current_user']) && $_SESSION['current_user']['status']== 'admin'){
    include "./conect_db.php";
    $result = mysqli_query($con, "SELECT * FROM user");
    $id=$_GET['id'];
    mysqli_query($con, "DELETE FROM `user` WHERE `user`.`id` = ".$id."");
    }
    ?>
    <meta http-equiv="refresh" content="0;url=./listmember.php">
