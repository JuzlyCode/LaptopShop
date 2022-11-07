<div style=" width:100%; height:100%; margin: 20px ">
<?php
include "../product/formPic.php";
if (!empty($_FILES) && $_FILES["files"]["tmp_name"][0] !== ''){
    $arrImg = array("image/png", "image/jpeg", "image/bmp");    
    $err = "Up File Thanh Cong";
    $type = $_FILES["files"]["type"];
    ?>
    <table class="upload_form-table">
        <tr>
            <td class="upload_form-td upload_form-tdcenter">Thông Báo</td>
            <td class="upload_form-td upload_form-tdcenter">Link Ảnh</td>
            <td class="upload_form-td upload_form-tdcenter">Ảnh</td>
        </tr>
    <?php
    foreach ($type as $key => $types){
        if (!in_array($types, $arrImg))
            $err ="Không phải file hình ";
        else
        {	
            $temp = $_FILES["files"]["tmp_name"][$key];
            $name = $_FILES["files"]["name"][$key];
            if (!move_uploaded_file($temp, "../assets/image/".$name))
                $err ="Không thể lưu file ";
            
        }
        $names = $_FILES['files']['name'][$key];
        ?>
            <tr>
                <td class="upload_form-td upload_form-tdcenter"><?=$err?></td>
                <td class="upload_form-td upload_form-tdcenter"><a href="../assets/image/<?=$names?>">./assets/image/<?=$names?></a></td>
                <td class="upload_form-td upload_form-td__flex"><img src="../assets/image/<?=$name?>" class="view-img__upload" alt="<?=$name?>"></td>
            </tr>
        <?php
    }
    ?>
    </table>
    <?php
    unset($_FILES);
}
?>

</div>

<style>
    .upload-img__btn {
        margin-top: 10px;
        margin-bottom: 20px;
        padding: 2px 10px;
    }
    .upload_form-td__flex {
        display: flex;
    }
    .view-img__upload{
    width: 150px;
    border: 2px solid;
    margin: auto;
    }
    .div-in4mAlo {
        width: 100%;
        text-align: center;
        margin: 10px;
    }
    .in4mAlo {
        font-size: 18px;
    }
    .upload_form-td {
        border: 2px solid black;
    }
    .upload_form-tdcenter {
        text-align: center;
    }
    .upload_form-table {
        width: 100%;
        border: 2px solid black;
    }
</style>
