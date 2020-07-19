
<?php include 'modules/searchIcon.php' ?>
<a href="index.php?a=3&c=6" class="btn btn-outline-primary mb-4" >Thêm mới đơn đặt hàng</a>

<div class="table-responsive">
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
        <th >STT</th>
        <th >Mã đơn đặt hàng</th>
        <th >Ngày lập</th>
        <th >Khách hàng</th>
        <th >Tình trạng</th>
        <th >Thao tác</th>
    </tr>
    </thead>
    <tbody>
    <?php 
       if(isset($_POST["txtInfo"]) && $_POST["txtInfo"] !="")
       {
         $info = "%".$_POST["txtInfo"]."%";
         $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang FROM dondathang d, taikhoan t, tinhtrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang AND t.TenHienThi like '$info' ORDER BY d.MaTinhTrang, d.NgayLap";
        
       }
       else
       {
        $sql = "SELECT d.MaDonDatHang, d.NgayLap, d.MaTinhTrang, t.TenHienThi, tt.TenTinhTrang FROM dondathang d, taikhoan t, tinhtrang tt WHERE d.MaTaiKhoan = t.MaTaiKhoan AND d.MaTinhTrang = tt.MaTinhTrang ORDER BY d.MaTinhTrang, d.NgayLap";
       }
        $result = DataProvider::ExecuteQuery($sql);
        $i =1 ;
        while($row = mysqli_fetch_array($result))
        {
            $c="";
            ?>
            <tr class="<?php
            switch($row["MaTinhTrang"])
            {
                case 1:
                    echo "table-info";
                break;
                case 2:
                    echo "table-danger";
                break;
                case 3:
                    echo "table-success";
                break;
            }?>">
                <td><?php echo $i++; ?></td>
                <td><?php echo $row["MaDonDatHang"]; ?></td>
                <td><?php echo $row["NgayLap"]; ?></td>
                <td><?php echo $row["TenHienThi"]; ?></td>
                <td><?php echo $row["TenTinhTrang"]; ?></td>
                <td>
                    <a href="index.php?a=2&id=<?php echo $row["MaDonDatHang"] ?>&c=6">
                        <img src="images/edit.png">
                    </a>
                </td>
            </tr>
            <?php
        }
    ?>
    </tbody>
</table></div>