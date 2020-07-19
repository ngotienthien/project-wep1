<?php
    if(!isset($_GET["id"]))
        DataProvider::ChangeURL("index.php?c=404");
    $id = $_GET["id"];
    $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.TongThanhTien, t.TenHienThi, tp.TenThanhPho, t.DienThoai, tt.MaTinhTrang, tt.TenTinhTrang FROM dondathang d, taikhoan t, tinhtrang tt, thanhpho tp WHERE t.MaThanhPho = tp.MaThanhPho AND d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang AND d.MaDonDatHang= $id";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
?>

<fieldset class=" mx-auto col-lg-6">
    <legend class="text-light bg-dark text-center">Thông tin đơn đặt hàng</legend>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span>Mã đơn đặt hàng:</span>
        <span class="text-info"><?php echo $row["MaDonDatHang"]; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span>Ngày đặt hàng:</span>
        <span class="text-info"><?php echo $row["NgayLap"]; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span>Tên khách hàng:</span>
        <span class="text-info"><?php echo $row["TenHienThi"]; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span>Số điện thoại:</span>
        <span class="text-info"><?php echo $row["DienThoai"]; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span>Địa chỉ giao hàng:</span>
        <span class="text-info"><?php echo $row["TenThanhPho"]; ?></span>
    </div>
    <div class="list-group-item d-flex justify-content-between align-items-center" >
        <span >Tổng thành tiền:</span>
        <span class="text-info"><?php echo $row["TongThanhTien"]; ?> VND</span>
    </div>
   
</fieldset>
<div class="col-12 " >
    <div class="d-flex flex-row justify-content-center" >
        <div><a class=" my-3 mr-2 btn btn-info " href="pages/qlDonDatHang/xlDonDatHang.php?a=1&id=<?php echo $id; ?>&c=6" >
        Giao hàng</a></div>
        <div><a class=" my-3 mr-2 btn btn-success " href="pages/qlDonDatHang/xlDonDatHang.php?a=3&id=<?php echo $id; ?>&c=6" >
        Thanh toán</a></div>
        <div><a class=" my-3 mr-2 btn btn-danger " href="pages/qlDonDatHang/xlDonDatHang.php?a=2&id=<?php echo $id; ?>&c=6">
        Hủy</a></div>
        <div ><a class=" my-3 mr-2 btn btn-secondary " href="#" onclick="window.print();" class="btnInDonDatHang"> In đơn hàng</a></div>
    </div>
</div>
<h2>Chi tiết đơn đặt hàng</h2><div class="table-responsive">
<table  class="w-50 mx-auto table table-striped">
    <tr>
        <th width="100">STT</th>
        <th width="150">Tên sản phẩm</th>
        <th width="100">Hình</th>
        <th width="100">Số lượng</th>
        <th width="100">Giá bán</th>
    </tr>
    <?php
        $sql = "SELECT s.TenSanPham, s.HinhURL, c.SoLuong, c.GiaBan FROM chitietdondathang c, sanpham s WHERE c.MaSanPham = s.MaSanPham AND c.MaDonDatHang = $id ";
        $result = DataProvider::ExecuteQuery($sql);
        $i =1;
        while ($row=mysqli_fetch_array($result))
        {
            ?>
                <tr>
                    <td><?php echo $i++; ?></td>
                    <td><?php echo $row["TenSanPham"]; ?></td>
                    <td><img src="../images/product/<?php echo $row["HinhURL"]; ?>" height="35"></td>
                    <td><?php echo $row["SoLuong"]; ?></td>
                    <td><?php echo $row["GiaBan"]; ?></td>
                </tr>
            <?php
        }
    ?>
</table></div>