<form class="form-upload" action="" method="POST">

    <table class="table-upprd">
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Link ảnh:(*)</td>
            <td><input required type="text" class="upprd-input" name="imgProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Tên sản phẩm:(*)</td>
            <td><input required type="text" class="upprd-input" name="nameProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Giới thiệu sản phẩm:</td>
            <td><input type="text" class="upprd-input" name="reviewProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Giá sản phẩm:(*)</td>
            <td><input required type="number" class="upprd-input" name="priceProduct"><br /></td>
        </tr>
        <tr class="table-upprd__list">
            <td class="table-upprd__item">Discount sản phẩm:</td>
            <td><input type="number" class="upprd-input" name="discountProduct"><br /></td>
        </tr>    
    </table>
    <input type="submit" class="upprd-submit" name="submit" value="Upload Product">
</form>

<style>
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
}
.fieldset-upload {
    margin-bottom: 30px;
}
</style>