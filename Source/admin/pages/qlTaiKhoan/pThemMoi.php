
    <form class="shadow p-3 mb-5 bg-white rounded was-validated" action="pages/qlTaiKhoan/xlThemMoi.php" method="post" onsubmit="return KiemTra()">
    <div class="container">
    <fieldset >
        <legend class="text-light bg-dark">Thêm mới sản phẩm</legend>
        <div >
            <label for="txtTenDangNhap">Tên đăng nhập: </label>
            <input type="text" class="form-control w-25" id="txtTenDangNhap" placeholder="Nhập tên đăng nhập" required name="txtTenDangNhap">
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền tên đăng nhập</div>
            <div class="err"></div>
        </div>
        
        <div >
            <label for="txtMatKhau">Mật khẩu: </label>
            <input name="txtMatKhau" type="password" class="w-25 form-control" id="txtMatKhau" placeholder="Nhập"  required>
            <div class="valid-feedback">Tuyệt vời.</div>
            <div class="invalid-feedback">Vui lòng điền mật khẩu</div>
        </div>
        
        <div >
            <label for="txtNLMatKhau">Nhập lại mật khẩu: </label>
            <input  type="password" class="w-25 form-control" id="txtNLMatKhau" placeholder="Nhập lại mật khẩu"  required>
            <div class="invalid-feedback">Vui lòng nhập lại mật khẩu</div>
            <div class="err"></div>
        </div>
        <div >
            <label for="txtTenHienThi">Tên hiển thị:</label>
            <input type="text" class="w-50 form-control" name="txtTenHienThi" id="txtTenHienThi" placeholder="Nhập tên hiển thị" required>
            <div class="valid-feedback">Tuyệt vời</div>
            <div class="invalid-feedback">Vui lòng điền tên hiển thị của tài khoản</div>
        </div>
        <div >
            <label for="txtDienThoai">Điện thoại: </label>
            <input name="txtDienThoai" type="text" class="w-25 form-control" id="txtDienThoai" placeholder="Nhập số điện thoại" >
        </div>
        <div >
            <label for="txtEmail">Email: </label>
            <input name="txtEmail" type="mail" class="w-25 form-control" id="txtEmail" placeholder="Nhập Email" >
        </div>
        <span>Địa chỉ:</span>
        <div >
            <select class="w-50 custom-select custom-select-sm" name="txtMaThanhPho">
                <?php 
                    $sql = "SELECT * FROM thanhpho";
                    $result = DataProvider::ExecuteQuery($sql);
                    while($row1 = mysqli_fetch_array($result))
                    {
                        ?>
                            <option value="<?php echo $row1["MaThanhPho"] ?>"> 
                            <?php echo $row1["TenThanhPho"]; ?>
                            </option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <br>
        <div >
            <input type="submit"  value="Thêm mới " class="btn btn-primary">
        </div>
    </fieldset>
    </div>
  </form>

  <script>
  
  function KiemTra()
    {
        var co = true;
        control = document.getElementById('txtMatKhau');
        control1 = document.getElementById('txtNLMatKhau');
        err = document.getElementById('err');
        if (control.value != control1.value)
        {
            co = false;
            err.innerHTML = "*Nhập lại mật khẩu không khớp";
        }
        else
        {
          err.innerHTML = "";
        }
        return co;
    }
  </script>

  
<?php
    if (isset($_GET["err"]))
    {
        ?>
            <script type="text/javascript">
                alert("Tên đăng nhập đã bị trùng");
            </script>
        <?php
    }
?>