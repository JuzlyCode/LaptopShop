<?php
include '../conect_db.php';
$list = mysqli_query($con, "SELECT * FROM `products`");
$test = mysqli_fetch_all($list);

foreach ($list as $key => $lists){
   ?><br /> id :<?php echo $lists['id'];
   ?><br /> img :<?php echo $lists['img'];
   ?><br /> title:<?php echo $lists['title'];
   ?><br /> review: <?=$lists['review']?><?php
   ?><br /> price:<?php echo $lists['price'];
   ?><br /> disc:<?php echo $lists['discount'];
   ?><br /> Quan:<?php echo $lists['quantity'];
   ?><br /> Manu:<?php echo $lists['manufacturer'];
   ?><br /><br /><br /><br /><?php

}