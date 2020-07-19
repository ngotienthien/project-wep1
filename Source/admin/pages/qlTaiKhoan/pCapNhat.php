
<form action="pages/qlTaiKhoan/xlCapNhat.php" method="get" class="w-50 mx-auto shadow p-3 mb-5 bg-white rounded">
    <fieldset>
        <legend class="text-light bg-dark">Cập nhật thông tin tài khoản</legend>
        <?php 
            if(isset($_GET["id"]))
            {
                $id = $_GET["id"];
                $sql = "SELECT TenDangNhap, MaLoaiTaiKhoan FROM taikhoan WHERE MaTaiKhoan = $id";
                $result = DataProvider::ExecuteQuery($sql);
                $row = mysqli_fetch_array($result);
                $TenDangNhap = $row["TenDangNhap"];
                $MaLoaiTaiKhoan = $row["MaLoaiTaiKhoan"];
            }
        ?>
        <div>
            <span >Tên đăng nhập:</span>
            <span class="text-danger"><?php echo $TenDangNhap; ?></span>
        </div>
        <br>
        <div>
            <span>Loại tài khoản: </span>
            <select name="cmbLoaiTaiKhoan" class="w-50 custom-select custom-select-sm" >
                <?php 
                    $sql = "SELECT * FROM loaitaikhoan";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row = mysqli_fetch_array($result))
                    {
                        if($row["MaLoaiTaiKhoan"] == $MaLoaiTaiKhoan)
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."' selected>".$row["TenLoaiTaiKhoan"]."</option>";
                        else
                            echo "<option value='".$row["MaLoaiTaiKhoan"]."'>".$row["TenLoaiTaiKhoan"]."</option>";
                    }
                ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        </div>
        <div>
            <br>
            <input type="submit" value="Cập nhật" class="btn btn-primary">
        </div>
    </fieldset>
</form>