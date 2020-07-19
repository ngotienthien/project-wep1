
<form action="pages/qlLoai/xlThemMoi.php" method="get" class="shadow p-3 mx-auto bg-white rounded was-validated w-50">
    <fieldset>
        <legend class="text-light bg-dark">Thêm mới một loại sản phẩm</legend>
        <div>
            <span >Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" placeholder="Nhập tên loại sản phẩm mới" required  class=" form-control">
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên loại sản phẩm</div>
        </div>
        <br>
        <div>
            <input type="submit" value="Thêm mới" class="btn btn-primary">
        </div>
    </fieldset>  
</form>