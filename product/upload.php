<div style="width:100%; margin:0 40px;">
<fieldset class="fieldset-upload">
<legend class="legend-upload">Upload Ảnh</legend>
<?php
if (!empty($_FILES)){
    $arrImg = array("image/png", "image/jpeg", "image/bmp");    
    $err = "Up File Thanh Cong";
    $type = $_FILES["files"]["type"];
    ?>
    <table class="upload_form-table">
        <tr>
            <td class="upload_form-td upload_form-tdcenter">Thông Báo</td>
            <td class="upload_form-td upload_form-tdcenter">Link Ảnh</td>
        </tr>
    <?php
    foreach ($type as $key => $types){
        if (!in_array($types, $arrImg))
            $err ="Không phải file hình ";
        else
        {	
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];
            if (!move_uploaded_file($temp, "assets/image/".$name))
                $err ="Không thể lưu file ";
            
        }
        $names = $_FILES['files']['name'][$key];
        ?>
            <tr>
                <td class="upload_form-td"><?=$err?></td>
                <td class="upload_form-td"><a href="./assets/image/<?=$names?>">./assets/image/<?=$names?></a></td>
            </tr>
        <?php
    }
    ?>
</table>
    <?php
    unset($_FILES);
}else{
    include "./product/formPic.php";
}
?>
</fieldset>
</div>

<!-- up sp -->
<div style="width:100%; margin:0 40px;">
<fieldset class="fieldset-upload">
    <legend class="legend-upload">UpLoad Sản Phẩm</legend>
<?php
    include "./conect_db.php";
    $upload = mysqli_query($con, "SELECT * FROM `products`");
    // foreach ($upload as $key => $values) {
    // var_dump($values);
    // }
    $alo = "";
    if(!empty($_POST['submit'])){
        if($_POST['discountProduct'] == "")
        $_POST['discountProduct'] = "0";
        $upload = mysqli_query($con, "INSERT INTO `products` (`id`, `img`, `title`, `review`, `price`, `discount`, `quantity`) VALUES (NULL, '".$_POST['imgProduct']."', '".$_POST['nameProduct']."', '".$_POST['reviewProduct']."', '".$_POST['priceProduct']."', '".$_POST['discountProduct']."' , '".$_POST['quantityProduct']."');");
        $alo = "Thêm sản phẩm thành công";
    }
    include "./product/upproduct.php";
    echo "$alo";
?>
</fieldset>
</div>

<style>
    .upload_form-td {
        width: 200px;
        border: 2px solid black;
    }
    .upload_form-tdcenter {
        text-align: center;
    }
    .upload_form-table {
        border: 2px solid black;
    }
</style>

