<!-- up sp -->
<div style="width:100%; margin:20px 40px 0 40px;">
<fieldset class="fieldset-upload">
    <legend class="legend-upload">UpLoad Sản Phẩm</legend>
<?php
    include "../conect_db.php";
    $upload = mysqli_query($con, "SELECT * FROM `products`");
    // foreach ($upload as $key => $values) {
    // var_dump($values);
    // }
    $alo = "";
    if(!empty($_POST['submit']) && $_POST['submit'] == 'UpProduct'){
            if($_POST['discountProduct'] == "")
            $_POST['discountProduct'] = "0";
            $upload = mysqli_query($con, "INSERT INTO `products` (`id`, `img`, `title`, `review`, `price`, `discount`, `quantity` , `manufacturer`) VALUES (NULL, '".$_POST['imgProduct']."', '".$_POST['nameProduct']."', '".$_POST['reviewProduct']."', '".$_POST['priceProduct']."', '".$_POST['discountProduct']."' , '".$_POST['quantityProduct']."', '".$_POST['manufacturer']."');");
            $alo = "Thêm sản phẩm thành công!";
    }
?>
    <div class="div-in4mAlo">
        <p class="in4mAlo" style="<?php if ($alo == "Thêm sản phẩm thành công!"){ ?> color: green;<?php }else{ ?>color:red;<?php } ?>"><?=$alo?></p>
    </div>
<?php
    include '../product/upproduct.php';
?>
</fieldset>
</div>


