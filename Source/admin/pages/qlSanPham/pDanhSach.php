
<?php include 'modules/searchIcon.php' ?>
<a href="index.php?c=3&a=3" class=" btn btn-outline-primary mb-2 ml-2" >Thêm mới sản phẩm</a>





<div class="table-responsive">

    <table class="table table-striped table-light grid" id="table-content">
    <thead class="thead-dark">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Hình</th>
            <th>Giá</th>
            <th>Ngày nhập</th>
            <th>Số lượng tồn</th>
            <th>Số lượng bán</th>
            <th>Số lượt xem</th>
            <th>Loại</th>
            <th>Hãng</th>
            <th>Mô tả</th>
            <th>Thông số kỹ thuật</th>
            <th>Trạng thái</th>
            <th>Thao tác</th>
        </tr>
        </thead>
        <?php 
            if(isset($_POST["txtInfo"]) && $_POST["txtInfo"] != "")
            {
                
                $info = "%".$_POST["txtInfo"]."%";    //Chuỗi thêm vào để tìm kiếm gần giống
                $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuongXem, s.MoTa,s.ThongSoKyThuat, s.BiXoa, l.TenLoaiSanPham, h.TenHangSanXuat FROM sanpham s, loaisanpham l, hangsanxuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat AND s.TenSanPham like '$info' ORDER BY s.MaSanPham DESC";
            }
            else
            {
                $sql = "SELECT s.MaSanPham, s.TenSanPham, s.HinhURL, s.GiaSanPham, s.NgayNhap, s.SoLuongTon, s.SoLuongBan, s.SoLuongXem, s.MoTa,s.ThongSoKyThuat, s.BiXoa, l.TenLoaiSanPham, h.TenHangSanXuat FROM sanpham s, loaisanpham l, hangsanxuat h WHERE s.MaLoaiSanPham = l.MaLoaiSanPham AND s.MaHangSanXuat = h.MaHangSanXuat ORDER BY s.MaSanPham DESC";
            }
            $result = DataProvider::ExecuteQuery($sql);
            $i =1;
            while ($row = mysqli_fetch_array($result))
            {
                ?> 
                    <tr>
                        <td><?php echo $i++ ?></td>
                        <td><?php echo $row["TenSanPham"] ?></td>
                        <td>
                            <img src="../images/product/<?php echo $row["HinhURL"]; ?>" height="50">
                        </td>
                        <td><?php echo $row["GiaSanPham"] ?></td>
                        <td><?php echo $row["NgayNhap"] ?></td>
                        <td><?php echo $row["SoLuongTon"] ?></td>
                        <td><?php echo $row["SoLuongBan"] ?></td>
                        <td><?php echo $row["SoLuongXem"] ?></td>
                        <td><?php echo $row["TenLoaiSanPham"] ?></td>
                        <td><?php echo $row["TenHangSanXuat"] ?></td>
                        <td>
                            <?php 
                                if(strlen($row["MoTa"] ) > 25)
                                    $sMoTa = substr($row["MoTa"], 0, 25)."...";
                                else 
                                    $sMoTa = $row["MoTa"];
                            ?>
                            <div >
                                <?php echo $sMoTa; ?>
                            </div>
                        </td>
                        <td>
                            <?php 
                                if(strlen($row["ThongSoKyThuat"]) > 25)
                                    $ThongSo = substr($row["ThongSoKyThuat"], 0, 25)."...";
                                else 
                                    $ThongSo = $row["ThongSoKyThuat"];
                            ?>
                            <div >
                                <?php echo $ThongSo; ?>
                            </div>
                        </td>
                        <td>
                            <?php 
                                if($row["BiXoa"] == 1)
                                    echo "<img src='images/lock.png' >";
                                else
                                    echo "<img src='images/use.png' >";
                                                            
                            ?>
                        </td>
                        <td>
                            <a href="pages/qlSanPham/xlKhoa.php?id=<?php echo $row["MaSanPham"]; ?>">
                                <img src="images/delete.png" >
                            </a>
                            <a href="index.php?c=3&a=2&id=<?php echo $row["MaSanPham"]; ?>">
                                <img src="images/edit.png" >
                            </a>
                        </td>
                    </tr>
                <?php
            }
        ?>
    </table>
</div>

