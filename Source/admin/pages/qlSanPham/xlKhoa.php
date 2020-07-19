<?php 
    include "../../../libs/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
        //Kiểm tra có đơn đặt hàng có sản phẩm đang muốn xóa hay không?
        $sql = "SELECT COUNT(*) FROM chitietdondathang WHERE MaSanPham= $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            //Thực hiện xóa sản phẩm ra khỏi DB
            $sql = "DELETE FROM sanpham WHERE MaSanPham= $id";
        }  
        else
        {
            //Thực hiện khóa sản phẩm do có đơn đặt hàng có sản phẩm
            $sql = "UPDATE sanpham SET BiXoa = 1 - BiXoa WHERE MaSanPham = $id";
        }
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3");
?>