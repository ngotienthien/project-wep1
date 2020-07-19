
<form action="pages/qlLoai/xlCapNhat.php" method="get" class="w-50 mx-auto shadow p-3 mb-5 bg-white rounded was-validated">
    <fieldset>
        <legend class="text-light bg-dark">Cập nhật thông tin loại sản phẩm</legend>
        <?php 
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $sql = "SELECT TenLoaiSanPham, MaLoaiSanPham FROM loaisanpham WHERE MaLoaiSanPham = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
            }
        ?>
        <div>
            <span >Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenLoaiSanPham"]; ?>" class=" form-control" required>
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên loại sản phẩm</div>
            <input type="hidden" name="id" value="<?php echo $row["MaLoaiSanPham"] ?>">
        </div>
        <br>
        <div>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
        </div>
    </fieldset>
</form>