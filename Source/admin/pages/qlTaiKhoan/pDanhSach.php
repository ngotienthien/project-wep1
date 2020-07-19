
<?php include 'modules/searchIcon.php' ?>
<a href="index.php?c=2&a=3" class=" btn btn-outline-primary mb-2 ml-2" >Thêm mới tài khoản</a>



<div class="table-responsive">
<table class="table table-striped grid" id="table-content">
    <thead class="thead-dark">
      <tr>
        <th>Mã tài khoản</th>
        <th>Tên đăng nhập</th>
        <th>Tên hiển thị</th>
        <th>Điện thoại</th>
        <th>Địa chỉ</th>
        <th>Email</th>
        <th>Loại tài khoản</th>
        <th>Tình trạng</th>
        <th>Thao tác</th>
      </tr>
    </thead>
    <tbody>
      <?php
        if(isset($_POST["txtInfo"]) && $_POST["txtInfo"] !="")
        {
          $info = "%".$_POST["txtInfo"]."%";
          $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DienThoai, d.TenThanhPho  , t.Email, l.TenLoaiTaiKhoan, t.BiXoa FROM taikhoan t, loaitaikhoan l , thanhpho d WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan and t.MaThanhPho = d.MaThanhPho and t.TenHienThi like '$info'";
        }
        else
        {
          $sql = "SELECT t.MaTaiKhoan, t.TenDangNhap, t.TenHienThi, t.DienThoai, d.TenThanhPho  , t.Email, l.TenLoaiTaiKhoan, t.BiXoa FROM taikhoan t, loaitaikhoan l , thanhpho d WHERE t.MaLoaiTaiKhoan = l.MaLoaiTaiKhoan and t.MaThanhPho = d.MaThanhPho ";
        }
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result))
        {
            ?>
            <tr>
                <td><?php echo $row["MaTaiKhoan"]; ?></td>
                <td><?php echo $row["TenDangNhap"]; ?></td>
                <td><?php echo $row["TenHienThi"]; ?></td>
                <td><?php echo $row["DienThoai"]; ?></td>
                <td><?php echo $row["TenThanhPho"]; ?></td>
                <td><?php echo $row["Email"]; ?></td>
                <td><?php echo $row["TenLoaiTaiKhoan"]; ?></td>
                <td>
                    <?php 
                        if($row["BiXoa"] == 1)
                            echo "<img src='images/user_lock.png' />";
                        else
                            echo "<img src='images/user_unlock.png' />";
                    ?>
                </td>
                <td>
                    <a href="pages/qlTaiKhoan/xlKhoa.php?id= <?php echo $row["MaTaiKhoan"]; ?>" class="block">
                        <img src="images/padlock.png">
                    </a>
                    <a href="index.php?c=2&a=2&id=<?php echo $row["MaTaiKhoan"]; ?>">
                        <img src="images/edit.png">
                    </a>
                </td>
            </tr>
            <?php
        }
      ?>
    </tbody>
  </table></div>