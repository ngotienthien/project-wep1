<?php
    include "../../../libs/DataProvider.php";
    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $a = $_GET["a"];

        $sql = "UPDATE dondathang SET MaTinhTrang = $a WHERE MaDonDatHang = $id";
        DataProvider::ExecuteQuery($sql);
        //Cập nhật số lượng tồn của sản phẩm đối với các đơn hàng bị hủy
        if($a==2)
        {
            $sql ="SELECT MaSanPham, SoLuong FROM chitietdondathang WHERE MaDonDatHang = $id ";
            $result = DataProvider::ExecuteQuery($sql);
            while ($row = mysqli_fetch_array($result))
            {
                $soLuong = $row["SoLuong"];
                $maSanPham = $row["MaSanPham"];
                $sql = "UPDATE sanpham SET SoLuongTon = SoLuongTon + $soLuong WHERE MaSanPham = $maSanPham";
                DataProvider::ExecuteQuery($sql);
            }
        }
    }
    DataProvider::ChangeURL("../../index.php?c=6");
?>