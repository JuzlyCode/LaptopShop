<?php
    include "../conect_db.php";
    $result = mysqli_query($con, "SELECT * FROM `user` ORDER BY `user`.`idUser` ASC");
// xóa user
if (isset($_GET['delete_user']) && isset($_GET['id'])){
    $id=$_GET['id'];
    mysqli_query($con, "DELETE FROM `user` WHERE `user`.`idUser` = ".$id."");
    ?>
<meta http-equiv="refresh" content="0;url=./admin.php?listuser">
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
<table style=" margin-top:30px; width:70%; ">

    <tr>
        <th colspan="6" style="padding:10px; font-size:18px;">Admin</th>
    </tr>

    <tr style="text-align: center;">
        <td>ID</td>
        <td>User</td>
        <td>Status</td>
        <td>Date Create</td>
        <td>Xóa</td>
        <td>Sửa</td>
    </tr>
    <?php for ($i = 0; $i < count($adminList); $i++) {
        $row = $adminList; ?>
    <tr style="text-align: center;">
        <td><?= $row[$i]['idUser'] ?></td>
        <td><?= $row[$i]['username'] ?></td>
        <td><?= $row[$i]['status'] ?></td>
        <td><?= date('d/m/Y H:i', $row[$i]['creat_date']) ?></td>
        <td><a href="./edit_user.php?id=<?= $row[$i]['idUser'] ?>" class="style-fix_user">Sửa</a></td>
        <td><a href="./admin.php?listuser&delete_user&id=<?= $row[$i]['idUser'] ?>" class="style-delete_user">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>


<table style=" margin-top:30px; margin-bottom:30px; width:70%;">
    <tr style="margin-top:50px;">
        <th colspan="6" style="padding:10px; font-size:18px;">User</th>
    </tr>

    <tr style="text-align: center;">
        <td>ID</td>
        <td>User</td>
        <td>Status</td>
        <td>Date Create</td>
        <td>Xóa</td>
        <td>Sửa</td>
    </tr>
    <?php for ($i = 0; $i < count($userList); $i++) {
        $row = $userList; ?>
    <tr class="listuser__tr" style="text-align: center;">
        <td><?= $row[$i]['idUser'] ?></td>
        <td><?= $row[$i]['username'] ?></td>
        <td><?= $row[$i]['status'] ?></td>
        <td><?= date('d/m/Y H:i', $row[$i]['creat_date']) ?></td>
        <td><a href="./edit_user.php?id=<?= $row[$i]['idUser'] ?>" class="style-fix_user">Sửa</a></td>
        <td><a href="./admin.php?listuser&delete_user&id=<?= $row[$i]['idUser'] ?>" class="style-delete_user">Xóa</a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
<style>
table {
    background-color: var(--color-shop);
    border-radius: 10px;
    overflow: hidden;
}

td {
    padding: 20px;
    background-color: var(--white-color);
}

th {
    color: var(--white-color);
}
</style>