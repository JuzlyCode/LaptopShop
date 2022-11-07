<form class="form-upload" action="" method="POST">

    <table class="table-upprd">
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Link ảnh:(*)</td>
            <td><input required type="text" class="upprd-input" name="imgProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Tên sản phẩm: (*)</td>
            <td><input required type="text" class="upprd-input" name="nameProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item"><label for="manufacturer">Hãng SX: (*)</label></td>
            <td><select name="manufacturer" id="manufacturer">
                <option value="Apple">Apple.</option>
                <option value="ThinkPad">Think Pad.</option>
                <option value="Lenovo">Lenovo.</option>
                <option value="SonyVAIO">Sony VAIO.</option>
                <option value="Dell">Dell.</option>
                <option value="Acer">Acer.</option>
                <option value="HP">HP.</option>
                <option value="Samsung">Samsung.</option>
                <option value="Asus">Asus.</option>
                <option value="Toshiba">Toshiba.</option>
                <option value="MSI">MSI.</option>
            </select></td>
        </tr> 
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Giới thiệu sản phẩm:</td>
            <td><textarea required name="reviewProduct" id="reviewProduct" cols="30" rows="10"></textarea></td>
            <!-- <td><input type="text" class="upprd-input" name="reviewProduct"><br /></td> -->
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Giá sản phẩm: (*)</td>
            <td><input required type="number" class="upprd-input" name="priceProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Discount sản phẩm:</td>
            <td><input type="number" class="upprd-input" name="discountProduct"><br /></td>
        </tr> 
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Số lượng SP trong kho: (*)</td>
            <td><input required type="number" class="upprd-input" name="quantityProduct"><br /></td>
        </tr>     
    </table>
    <div style="width:100%; justify-content: center; display: flex;">

        <input type="submit" class="upprd-submit" name="submit" value="UpProduct">
    </div>
</form>
<script src="../assets/ckeditor/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'reviewProduct' );
</script>

<style>
#manufacturer {
    padding: 5px;
}
.table-upprd {
    width: 100%;
}
.table-upprd__list {

}
.table-upprd__item {
    padding: 10px 10px;
    font-size: 16px;
    width: 30%;
}
.upprd-input {
    width: 100%;
    padding: 5px;
}
.upprd-input__Review {
    height: 50px;
}
.form-upload {
    padding: 20px;
}
.legend-upload {
    font-size: 15px;
    padding: 0 10px;
}
.upprd-submit {
    margin-top: 20px;
    padding: 5px;
    width: 150px;
}
.fieldset-upload {
    margin-bottom: 30px;
}
.upload_form-table {
    margin: 20px;
}
.upload_form-td {
    padding: 10px;
}
</style>