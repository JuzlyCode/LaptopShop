<?php
include "./conect_db.php";
$prodView = mysqli_query($con, "SELECT * FROM `products`");
function searchProd($prodView){
for ($i = 0; $i < $prodView->num_rows; $i++) {
    $inProduct = mysqli_fetch_array($prodView);
    if ($inProduct['id'] == $_GET['id']){
        return $inProduct;
    }
}
}
$inProduct = searchProd($prodView);
// kiểm tra hàng
if((int)$inProduct['quantity'] > 0)
    $Quantity = 'Còn hàng.';
else
    $Quantity = 'Hết hàng.';
// kiểm tra giá
$per = (int)(($inProduct['price'] / 100) * $inProduct['discount']);
if($inProduct['discount'] !== '0')
$newprice = $inProduct['price'] - $per;
else
$newprice = $inProduct['price'];
// ss giá
$price = "";
if($newprice !== $inProduct['price'])
$price = number_format($inProduct['price'],0,' ','.');

?>
<div class="link-in__div">
    <a href="./" class="link-in__link">Home</a>
    <a href="" class="link-in__link">/</a>
    <a href="./?viewi4=<?=$inProduct['id']?>&id=<?=$inProduct['id']?>" class="link-in__link">This View</a>
</div>
<style>
    .link-in__div {
        margin-top: 10px;
        margin-left: 10px;
    }
    .link-in__link {
        text-decoration: none;
        font-size: 18px;
        line-height: 18px;
        margin-left: 20px;
        color: #777;
        display: inline-block;
    }
</style>
<div class="viewi4-product">
    <div class="viewi4-product__header">
        <h1><?=$inProduct['title']?></h1>
    </div>
    <div class="viewi4-product__left">
        <div class="viewi4-left__img">
        <img src="<?=$inProduct['img']?>" alt="" class="left__img-viewi4">
        </div>
    </div>
    <div class="viewi4-product__middle">
        <div class="viewi4-middle__review">
        <div class="viewi4-middle__price-div">
            
            <p class="viewi4-middle__price">Giá sốc: <?=number_format($newprice,0,' ','.')?></p>
            <p class="viewi4-middle__oldprice"><?=$price?></p>
        </div>
        <div class="viewi4-middle__price-div">
            <p class="viewi4-middle__how-text">Hãng máy tính: <span class="middle__how-text-sub"><?=$inProduct['manufacturer']?>.</span></p>
        </div>
        <div class="viewi4-middle__price-div">
            <p class="viewi4-middle__how-text">Bảo hành: <span class="middle__how-text-sub">12 tháng.</span></p>
        </div>
        <div class="viewi4-middle__price-div">
            <p class="viewi4-middle__how-text">Tình trạng: <span class="middle__how-text-sub"><?=$Quantity?></span></p>
        </div>
        <div class="viewi4-middle__price-div">
            <p class="viewi4-middle__how-text">Giới thiệu: <div class="middle__how-text-sub"><?=$inProduct['review']?></div></p>
        </div>
        </div>
    </div>
    <div class="viewi4-product__right">
    <div class="viewi4-middle__price-div">
            <fieldset class="fieldset-viewi4">
            <legend class="legend-viewi4"><i class="fa-solid fa-gift"></i> Quà tặng khuyến mãi</legend>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Tặng Windows bản quyền mới</p>
            </div>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Miễn phí cân màu màn hình công nghệ cao</p>
            </div>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Balo thời trang</p>
            </div>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Chuột không dây + Bàn di cao cấp</p>
            </div>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Tặng gói cài đặt, bảo dưỡng, vệ sinh máy trọn đời</p>
            </div>
            <div class="fieldser-flex">
                <i class="viewi4__icon fa-solid fa-check"></i>
                <p class="fieldset-viewi4__text"> Tặng Voucher giảm giá cho lần mua tiếp theo</p>
            </div>
            </fieldset>
        </div>
        <div class="viewi4-middle__price-div">
            <p class="viewi4-middle__btn">Mua ngay</p>
        </div>
    </div>
</div>

<style>
    .viewi4-middle__price-div {
        margin-bottom: 10px;
    }
    .viewi4-product {
        width: 100%;
        background-color: var(--white-color);
        margin: 10px 0 30px 0;
        display: flex;
        flex-wrap: wrap;
        padding-bottom: 20px;
    }
    
    .viewi4-product__header {
        width: 100%;
        padding: 20px;
        margin-bottom: 20px;
        border-bottom: 1px solid #ccc;
        line-height: 24px;
    }

    .viewi4-product__left {
        width: 30%;
        display: flex;
    }

    .viewi4-left__img {
        margin-left: auto;
        margin-right: auto;
    }

    .viewi4-product__middle {
        width: 40%;
        display: flex;
        flex-direction: column;
    }

    .viewi4-middle__review {
       min-height: 270px;
    }
    
    .left__img-viewi4 {
        width: 300px;
    }
    /* i4 middle */
    .viewi4-middle__price-div {
    }
    .viewi4-middle__price {
        font-size: 25px;
        line-height: 30px;
        color: red;
        font-weight: 700;
        font-style: italic;
        display: inline-block;
    }
    .viewi4-middle__oldprice {
        display: inline-block;
        font-size: 18px;
        opacity: .5;
        margin-left: 10px;
        font-style: italic;
        text-decoration:line-through;
    }
    .middle__how-text-sub p,
    .viewi4-middle__how-text {
        font-size: 14px;
        font-weight: 700;
    }
    .middle__how-text-sub p,
    .middle__how-text-sub {
        font-weight: 500;
    }
    .middle__how-text-sub p {
        margin-top: 5px;
        margin-left: 10px;
    }
    /* btn */
    .viewi4-middle__btn {
        width: 100%;
        margin: auto;
        font-size: 18px;
        color: var(--white-color);
        text-align: center;
        padding: 20px;
        background-color: red;
        border-radius: 5px;
    }
    .viewi4-middle__btn:hover {
        opacity: .7;
    }
    /* check */
    .fieldset-viewi4{
        padding: 10px 15px;
        border-radius: 10px;
        border-color: lawngreen;
    }

    .legend-viewi4{
        padding: 5px 10px;
        background-color: lawngreen;
        border-radius: 30px;
        font-size: 14px;
        margin-left: 10px;
        color: var(--text-white);
    }
    .fieldset-viewi4__text {
        font-size: 13px;
        padding: 2px;
    }
    /* icon */
    .viewi4__icon {
        background-color: lawngreen;
        padding: 2px;
        border-radius: 5px;
        width: 15px;
        height: 15px;
        line-height: 12px;
        color: var(--text-white);
        margin-top: 2px;
        margin-right: 5px;
        
    }
    .fieldser-flex {
        margin-bottom: 5px;
        display: inline-flex;
    }
    /* i4 right */
    .viewi4-product__right {
        width: 30%;
        padding-left: 20px;
        padding-right: 10px;
    }
    
</style>