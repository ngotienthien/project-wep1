<?php 
    include "../../../libs/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
         //Kiểm tra có sản phẩm thuộc về hãng đang muốn xóa hay không ?
        $sql = "SELECT COUNT(*) FROM sanpham WHERE MaHangSanXuat = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            //Thực hiện xóa hãng ra khỏi DB
            $sql = "DELETE FROM hangsanxuat WHERE MaHangSanXuat=$id";
        }
        else
        {
            //Thực hiện khóa hãng do đã có sản phẩm thuộc về hãng này
            $sql = "UPDATE hangsanxuat SET BiXoa = 1 - BiXoa WHERE MaHangSanXuat = $id";

        }
        DataProvider::ExecuteQuery($sql);

    }
    DataProvider::ChangeURL("../../index.php?c=5");
?>