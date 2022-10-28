<?php
if ($getOffset > 3) {
?>
    <a class="prnext-style list_pages-product" href="?limit=<?= $getLimit ?>&page=1"><i class="fa-solid fa-backward"></i></a>
    
    <?php
}
    ?>
    <a class="prnext-style list_pages-product" href="?limit=<?= $getLimit ?>&page=<?= $getOffset - 1 ?>"><i class="fa-solid fa-caret-left"></i></a>
    <?php
for ($i = 1; $i <= $totalpages; $i++) {
    if ($i != $getOffset) {
        if ($i > $getOffset - 3 && $i < $getOffset + 3) {
    ?>
            <a class="list_pages-product" href="?limit=<?= $getLimit ?>&page=<?= $i ?>"><?= $i ?></a>
            <?php
        }
    } else {
        ?>
        <a style="background-color: black; color:white;" class="list_pages-product" href="?limit=<?= $getLimit ?>&page=<?= $i ?>"><?= $i ?></a>
        <?php
    }
}
        ?>
        <a class="prnext-style list_pages-product" href="?limit=<?= $getLimit ?>&page=<?= $getOffset + 1 ?>"><i class="fa-solid fa-caret-right"></i></a>
        <?php
if ($getOffset < $totalpages - 3) {
    ?>
    <a class="prnext-style list_pages-product" href="?limit=<?= $getLimit ?>&page=<?= $totalpages ?>"><i class="fa-solid fa-forward"></i></a>
<?php
}
?>