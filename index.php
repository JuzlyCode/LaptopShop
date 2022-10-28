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
    <!-- PHP --> <?php
        include './conect_db.php';
        session_start();
        $result = mysqli_query($con, "SELECT * FROM user");
        $search = isset($_GET['name'])? $_GET['name'] : "";
        if(!empty($_GET['limit'])&&!empty($_GET['page'])){
            $getLimit = $_GET['limit'];
            $getOffset = $_GET['page'];
        }else{
            $getLimit = 12;
            $getOffset = 1;
        }
        $offset = ($getOffset - 1) * $getLimit;
        if($search){
            $rowProducts = mysqli_query($con, "SELECT * FROM `products` WHERE `title` LIKE '%".$search."%'")->num_rows;
            $products = mysqli_query($con, "SELECT * FROM `products` WHERE `title` LIKE '%".$search."%' ORDER BY `id` ASC limit ".$getLimit." OFFSET ".$offset."");
        }else{
            $rowProducts = mysqli_query($con, "SELECT * FROM `products`")->num_rows;
            $products = mysqli_query($con, "SELECT * FROM `products` ORDER BY `id` ASC limit ".$getLimit." OFFSET ".$offset."");
        }
        $totalpages = ceil($rowProducts / $getLimit);
        mysqli_close($con);
        // 
        // if (isset($_GET['file'])&&$_GET['file']=='fl'){
        //     ?>
    <!-- //     <form class="form-flex" action="?file2=fl2" method="Post" autocomplete="off">
        //                 <div class="form-login__input-size">
        //                     <p class="form-login__input-text">User:</p>
        //                     <input type="text" placeholder="User Name" name="username" class="form-login__input" value="">
        //                 </div>
        //                 <div class="form-login__input-size">
        //                     <p class="form-login__input-text">Password :</p>
        //                     <input type="password" placeholder="Password" name="password" class="form-login__input" value="">
        //                 </div>
        //                 <input type="hidden" name="creat-ok" value="okok">
        //                 <div class="form-login__btn-size">
        //                     <input class="form-login__btn-style"  type="submit" value="Create">
        //                 </div>
        //             </form>
        //     
									<?php 
        // }
        // if(isset($_GET['file2']) && $_GET['file2']=='fl2')
        // {
        //     var_dump($_POST);exit;
        // }
        // 
        if(!empty($_POST) && $_POST['logout'] == 'logout'){
            unset($_SESSION['current_user']);
            ?><meta http-equiv="refresh" content="0;url=./">-->
									<?php
        }
    ?>
									<!-- Header -->
    <div id="header">
      <div class="grid">
        <div class="header-container">
          <div class="header-container__logo">
            <img src="./assets/imgs/containerHeader/Logo.jpg" alt="Logo" class="header-container__logo-size">
          </div>
          <div class="header-container__search">
            <form class="header-container__search" action="" method="GET">
            <input class="header-container__search-input" type="text" placeholder="Bạn muốn tìm sản phẩm gì?" name="name">
            <button class="header-container__search-icon" style="padding-top:0;" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
          </div>
          <div class="header-container__cart">
            <i class="fa-sharp fa-solid fa-cart-shopping header-container__cart-icon"></i>
          </div>
        </div>
      </div>
      <div class="header-menu">
        <div class="grid">
          <div class="header-menu-flex">
            <div class="header-menu_product">
              <ul class="header-menu_product-list">
                <li class="header-menu_product-item">
                  <i class="fix-item-icon fa-sharp fa-solid fa-laptop"></i>
                  <p class="product-item_name">Danh Mục</p>
                  <ul class="more-list_menu">
                    <div class="about-laptop">
                      <ul class="list-tyle-none about-dell-list">
                        <li class="more-list_menu-item menu-item__layout">Laptop Dell</li>
                        <li class="more-list_menu-item">Dell</li>
                        <li class="more-list_menu-item">Dell</li>
                      </ul>
                    </div>
                    <div class="about-laptop">
                      <ul class="list-tyle-none about-dell-list">
                        <li class="more-list_menu-item menu-item__layout">Laptop Acer</li>
                        <li class="more-list_menu-item">Dell</li>
                        <li class="more-list_menu-item">Dell</li>
                      </ul>
                    </div>
                    <div class="about-laptop">
                      <ul class="list-tyle-none about-dell-list">
                        <li class="more-list_menu-item menu-item__layout">Laptop Msi</li>
                        <li class="more-list_menu-item">Dell</li>
                        <li class="more-list_menu-item">Dell</li>
                      </ul>
                    </div>
                    <div class="about-laptop">
                      <ul class="list-tyle-none about-dell-list">
                        <li class="more-list_menu-item menu-item__layout">Laptop HP</li>
                        <li class="more-list_menu-item">Dell</li>
                        <li class="more-list_menu-item">Dell</li>
                      </ul>
                    </div>
                  </ul>
                </li>
                <li class="header-menu_product-item">
                  <i class="fix-item-icon fa-brands fa-hotjar"></i>
                  <p class="product-item_name">Khuyến Mãi</p>
                </li>
              </ul>
            </div>
            <div class="header-menu_user">
              <ul class="header-menu_product-list"> <?php
                            if(!empty($_SESSION['current_user'])){
                        ?> <li class="hover_dot-down header-menu_product-item">
                  <i class="fix-item-icon fa-solid fa-user"></i>
                  <a class="header-menu_product-link product-link_style" href=""> <?=$_SESSION['current_user']['username']?> </a>
                  <i class="user-icon-down fa-solid fa-caret-down" style="margin-left:5px;"></i>
                  <i class="user-icon-dot fa-solid fa-circle" style="font-size:8px; margin-left:5px;"></i>
                  <ul class="more-list_user-menu"> <?php
                                    if($_SESSION['current_user']['status'] == 'admin'){
                                    ?> <a href="./admin.php?listuser" class="more-list_user-link">
                      <li class="more-list_menu-item">List User</li>
                    </a>
                    <a href="./admin.php?upload" class="more-list_user-link">
                      <li class="more-list_menu-item">Quản lý SP</li>
                    </a> <?php
                                    }
                                    ?> <a href="" class="more-list_user-link">
                      <li class="more-list_menu-item">Thông tin User</li>
                    </a>
                    <a href="./edit_user.php?id=<?=$_SESSION['current_user']['id']?>" class="more-list_user-link">
                      <li class="more-list_menu-item">Đổi mật khẩu</li>
                    </a>
                    <form method="Post">
                      <li class="more-list_menu-item">
                        <input type="hidden" name="logout" value="logout">
                        <input class="more-list_menu-item input_logout" style="border:none; background:var(--white-color);" type="submit" value="Đăng Xuất">
                      </li>
                    </form>
                  </ul>
                </li> <?php
                            }else{

                        ?> <li class="header-menu_product-item">
                  <a class="header-menu_product-link product-link_style" href="./login.php">Đăng nhập</a>
                </li>
                <li class="header-menu_product-item">
                  <a class="header-menu_product-link product-link_style" href="./create.php">đăng ký</a>
                </li> <?php
     
                            }
                        ?>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="body">
      <div class="grid">
        <div style="height: 500px;" class="slider">

        </div>
        <div class="container">
          <div class="container-header">
            <div class="container-header__land">
              <div class="container-header__box">
                <p class="container-header__text" style="max-width: calc(100% - 32px);">Học tập - Văn phòng</p>
              </div>
              <div class="container-price">
                <p class="container-price__text">mức giá:</p>
                <a class="container-proce__link" href="">
                  <p class="container-price__about">5 triệu - 10 triệu</p>
                </a>
                <a class="container-proce__link" href="">
                  <p class="container-price__about">10 triệu - 20 triệu</p>
                </a>
                <a class="container-proce__link" href="">
                  <p class="container-price__about">20 triệu - 30 triệu</p>
                </a>
                <a class="container-proce__link" href="">
                  <p class="container-price__about">Trên 30 triệu</p>
                </a>
              </div>
            </div>
          </div>
          <div class="container-products"> <?php
                    for($i=0;$i<$products->num_rows;$i++){
                        $inProduct = mysqli_fetch_array($products);
                    ?> <div class="container-products__item">
              <img src="<?=$inProduct['img']?>" alt="1" class="container-products__item-img"> <?php
                                if ($inProduct['discount'] !== '0'){
                            ?> <div class="product-discount"></div>
              <div class="product-discount-persent">- <?=$inProduct['discount']?>% </div> <?php
                                }
                            ?> <div class="container-products__item-review" style="margin-top:10px; min-height: 50px;">
                <a href="" class="container-products__item-review-link">
                  <p class="container-products__item-review-text"> <?=$inProduct['title']?> </p>
                </a>
              </div> <?php
                                if ($inProduct['discount'] == '0'){
                                    ?> <div style="display: flex; margin-top:10px; margin-bottom:20px;">
                <p style="display:inline-block; line-height:16px; font-style: italic; font-weight:550; color:red; font-size:20px;"> <?=number_format($inProduct['price'])?>đ </p> <?php
                                }else{
                                    $newprice = $inProduct['price'] - (($inProduct['price']/100)*$inProduct['discount']);
                                    
                                    ?> <div style="display: flex; margin-top:10px; justify-content: space-between; width:70%;">
                  <p style="display:inline-block; line-height:16px; font-size:16px; color: #a29c9cd7; text-decoration: line-through;"> <?=number_format($inProduct['price'])?>đ </p>
                  <p style="display:inline-block; line-height:16px; font-style: italic; font-weight:550; color:red; font-size:20px;"> <?=number_format($newprice)?>đ </p> <?php
                                }
                                ?>
                </div>
              </div> 
              <?php
                    }
                    ?>
            </div>
            <div class="pages_product">
                <?php
                    include './page.php';
                ?>
            </div>
          </div>
        </div>
      </div>
  </body>
  <?php
include './css.php';
    ?>
</html>