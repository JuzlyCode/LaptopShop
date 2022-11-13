<!-- view slider -->
<div style="height: 500px;" class="slider">
<div style="height: 500px; margin-top:10px;">

<img src="https://laptopaz.vn/media/banner/15_Jul61774c36e93704bf449eabe1846e635f.jpg" alt="" style="width:100%; height:100%;">
</div>
</div>
<div class="container">
<div class="container-header">
<div class="container-header__land">
<div class="container-header__box">
<p class="container-header__text" style="max-width: calc(100% - 32px);">Sản Phẩm mới</p>
</div>
<div class="container-price">
<p class="container-price__text">mức giá:</p>
<a class="container-proce__link" href="./?form=5&to=10">
<p class="container-price__about">5 triệu - 10 triệu</p>
</a>
<a class="container-proce__link" href="./?form=10&to=20">
<p class="container-price__about">10 triệu - 20 triệu</p>
</a>
<a class="container-proce__link" href="./?form=20&to=30">
<p class="container-price__about">20 triệu - 30 triệu</p>
</a>
<a class="container-proce__link" href="./?form=30&to=1000">
<p class="container-price__about">Trên 30 triệu</p>
</a>
</div>
</div>
</div>

<!-- view product -->
<div class="container-products"> <?php
for ($i = 0; $i < $products->num_rows; $i++) {
$inProduct = mysqli_fetch_array($products);
?> 
<div class="container-products__item">
<a href="./?viewi4=<?=$inProduct['id']?>&id=<?=$inProduct['id']?>">
<img src="
<?= $inProduct['img'] ?>" alt="1" class="container-products__item-img"> 
</a><?php
if ($inProduct['discount'] !== '0') {
?>
<!-- div yellow -->
<div class="product-discount"></div>
<!-- div % -->
<div class="product-discount-persent">- <?= $inProduct['discount'] ?>% </div> <?php
}
?> <div class="container-products__item-review" style="margin-top:10px; min-height: 50px;">
<a href="./?viewi4=<?=$inProduct['id']?>&id=<?=$inProduct['id']?>" class="container-products__item-review-link">
<div class="container-products__item-review-text">
     <?= $inProduct['title'] ?>
</div>
</a>
</div> <?php
$newprice = $inProduct['price'] - (($inProduct['price'] / 100) * $inProduct['discount']);
if ($inProduct['discount'] == '0') {
?> <div class="price-div__product">
<p class="new-price"> <?= number_format($newprice) ?>đ </p> <?php
} else {
?> <div class="price-div__product2">
<p class="old-price"> <?= number_format($inProduct['price']) ?>đ </p>
<p class="new-price"> <?= number_format($newprice) ?>đ </p> 
<?php
}
?>
</div>
<!-- /div product item -->
</div>
<?php
}
?>
</div>
<!-- hiển thị nút trang -->
<div class="pages_product"> 
<?php
include './page.php';
?> </div>