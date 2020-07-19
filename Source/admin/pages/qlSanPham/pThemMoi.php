
<form action="pages/qlSanPham/xlThemMoi.php" method="post" enctype="multipart/form-data" class="shadow p-3 mb-5 bg-white rounded was-validated">
    <fieldset >
        <legend class="text-light bg-dark">Thêm mới sản phẩm</legend>
        <div >
            <label for="txtTen">Tên sản phẩm:</label>
            <input type="text" class="w-50 form-control" name="txtTen" id="txtTen" placeholder="Nhập tên sản phẩm" required>
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
                            <option value="<?php echo $row1["MaHangSanXuat"] ?>"> 
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
                             <option value="<?php echo $row1["MaLoaiSanPham"] ?>"> 
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
        <div >
            <label for="txtGia">Giá: </label>
            <input type="text" class="form-control w-25" id="txtGia" placeholder="Nhập giá sản phẩm" required name="txtGia">
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền giá của sản phẩm</div>
        </div>
        <div >
            <label for="txtTon">Số lượng tồn: </label>
            <input name="txtTon" type="text" class="w-25 form-control" id="txtTon" placeholder="Nhập số lượng tồn"  required>
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền số sản phẩm còn trong kho</div>
        </div>
        <div >
            <span>Mô tả: </span>
            <textarea name="txtMoTa" name="txtMoTa" class="form-control" rows="5" unrequired></textarea>
        </div>
        <div >
            <span>Thông số kỹ thuật:</span>
            <textarea name="txtThongSoKyThuat" class="form-control" rows="5" unrequired></textarea>
        </div>
        <br>
        <div >
            <input type="submit" value="Thêm mới " class="btn btn-primary">
        </div>
    </fieldset>
    
</form>
