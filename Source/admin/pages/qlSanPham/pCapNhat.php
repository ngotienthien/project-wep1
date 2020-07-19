<?php 
    if(!isset($_GET["id"]))
        DataProvider::ChangeURL("index.php?c=404");
    $id = $_GET["id"];
    $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan,  s.MoTa, s.ThongSoKyThuat, s.BiXoa, l.TenLoaiSanPham,s.MaHangSanXuat, s.MaLoaiSanPham , h.TenHangSanXuat FROM sanpham s, loaisanpham l, hangsanxuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat  AND s.MaSanPham = $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>

<form action="pages/qlSanPham/xlCapNhat.php?id=<?php echo $id; ?>" method="post" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded was-validated">
    <fieldset >
        <legend class="text-light bg-dark">Cập nhật thông tin sản phẩm</legend>
        <div >
            <label for="txtTen">Tên sản phẩm:</label>
            <input type="text" class="w-50 form-control" name="txtTen" id="txtTen" placeholder="Nhập tên sản phẩm" value="<?php echo $row["TenSanPham"] ?>" required>
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên sản phẩm</div>
        </div>
        
        <span>Hãng sản xuất:</span>
        <div >
            <select class="w-50 custom-select custom-select-sm" unrequired name="cmbHang">
                <?php 
                    $sql = "SELECT * FROM hangsanxuat WHERE BiXoa = 0";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row1 = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaHangSanXuat"] ?>"<?php if($row["MaHangSanXuat"] = $row1["MaHangSanXuat"]) echo "selected"; ?>> 
                            <?php echo $row1["TenHangSanXuat"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        
        <span>Loại sản phẩm:</span>
        <div >
        <select name="cmbLoai" class="w-50 custom-select custom-select-sm" unrequired >
                <?php
                     $sql = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
                     $result = DataProvider::ExecuteQuery($sql);
                     while($row1 = mysqli_fetch_array($result))
                     {
                         ?>
                             <option value="<?php echo $row1["MaLoaiSanPham"] ?>"<?php if($row["MaLoaiSanPham"] = $row1["MaLoaiSanPham"]) echo "selected"; ?>> 
                             <?php echo $row1["TenLoaiSanPham"]; ?>
                             </option>
                         <?php
                     }
                ?>
        </select>
        </div>
        
        <span class="input-text">Hình</span>
        <div class="custom-file">
            <input type="file" name="fHinh" class="custom-file-input-dark" >
            
        </div>
        <input type="hidden" name="fHiddenHinh" value="<?php echo $row["HinhURL"]; ?>">
        <img src="../images/product/<?php echo $row["HinhURL"]; ?>" width="75">
        <div >
            <label for="txtGia">Giá: </label>
            <input type="text" class="form-control w-25" id="txtGia" placeholder="Nhập giá sản phẩm" value="<?php echo $row["GiaSanPham"]; ?>" required name="txtGia">
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền giá của sản phẩm</div>
        </div>
        <div >
            <label for="txtTon">Số lượng tồn: </label>
            <input name="txtTon" type="text" class="w-25 form-control" id="txtTon" placeholder="Nhập số lượng tồn" value="<?php echo $row["SoLuongTon"]; ?>" required>
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền số sản phẩm còn trong kho</div>
        </div>
        <div >
            <label for="txtBan">Số lượng bán: </label>
            <input type="text" name="txtBan" class="w-25 form-control" id="txtBan" placeholder="Nhập số lượng đã bán" value="<?php echo $row["SoLuongBan"]; ?>" required>
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền số sản phẩm đã bán</div>
        </div>
        <div >
            <span>Mô tả: </span>
            <textarea name="txtMoTa" name="txtMoTa" class="form-control" rows="5" unrequired><?php echo $row["MoTa"]; ?></textarea>
        </div>
        <div >
            <span>Thông số kỹ thuật:</span>
            <textarea name="txtThongSoKyThuat" class="form-control" rows="5" unrequired><?php echo $row["ThongSoKyThuat"]; ?></textarea>
        </div>
        <br>
        <div >
            <input type="hidden" name="id" value="<?php echo $row["MaSanPham"]; ?>">
            <input type="submit" value="Cập nhật " class="btn btn-primary">
        </div>
    </fieldset>
</form>
