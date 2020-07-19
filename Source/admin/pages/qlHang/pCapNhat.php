
<form action="pages/qlHang/xlCapNhat.php" method="POST" class="w-50 mx-auto shadow p-3 mb-5 bg-white rounded was-validated" enctype="multipart/form-data">
    <fieldset>
        <legend class="text-light bg-dark">Cập nhật thông tin nhà sản xuất</legend>
        <?php 
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $sql = "SELECT TenHangSanXuat, MaHangSanXuat FROM hangsanxuat WHERE MaHangSanXuat = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
            }
        ?>
        <div>
            <span >Tên hãng sản xuất:</span>
            <input type="text" name="txtTen" id="txtTen" value="<?php echo $row["TenHangSanXuat"]; ?>" class=" form-control" required>
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên hãng sản xuất</div>
            <input type="hidden" name="id" value="<?php echo $row["MaHangSanXuat"] ?>">
        </div>
        <span class="input-text">Logo</span>
        <div class=" custom-file">
            <input type="file" name="fHinh" class="custom-file-input-dark" >
        </div>
        <br>
        <div>
            <br>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
        </div>
    </fieldset>
</form>