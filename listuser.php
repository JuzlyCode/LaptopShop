<?php
    include "./conect_db.php";
    $result = mysqli_query($con, "SELECT * FROM user");
// xóa user
if (isset($_GET['delete_user']) && isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($con, "DELETE FROM `user` WHERE `user`.`id` = ".$id."");
    ?>
    <meta http-equiv="refresh" content="0;url=./listuser.php">
    <?php
}
mysqli_close($con);
// ---

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
        ?>
                        <table style=" margin-top:30px; width:70%; border: 1px solid;">

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
                                    <td><a href="./listuser.php?delete_user&id=<?= $row[$i]['id'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>


                        <table style=" margin-top:30px; width:70%; border:1px solid;">
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
                                    <td><a href="./listuser.php?delete_user&id=<?= $row[$i]['id'] ?>">Xóa</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </table>

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