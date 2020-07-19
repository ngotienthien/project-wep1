<?php 
    include "../../../libs/DataProvider.php";

    if(isset($_GET["id"]))
    {
        $id = $_GET["id"];
         //Kiểm tra có sản phẩm thuộc về loại san phẩm đang muốn xóa hay không ?
        $sql = "SELECT COUNT(*) FROM sanpham WHERE MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if($row[0] == 0)
        {
            //Thực hiện xóa hãng ra khỏi DB
            $sql = "DELETE FROM loaisanpham WHERE MaLoaiSanPham=$id";
        }
        else
        {
            //Thực hiện khóa Loại do đã có sản phẩm thuộc về hãng này
            $sql = "UPDATE loaisanpham SET BiXoa = 1 - BiXoa WHERE MaLoaiSanPham = $id";

        }
        DataProvider::ExecuteQuery($sql);

    }
    DataProvider::ChangeURL("../../index.php?c=4");
?>