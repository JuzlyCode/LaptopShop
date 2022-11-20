<?php
if (isset($_GET['logout'])) {
    session_start();
    unset($_SESSION['current_user']);
    ?>
<!-- reset post = logout -->
<meta http-equiv="refresh" content="0;url=../"> <?php
}