<?php 
    include "../../../libs/DataProvider.php";
    if(isset($_GET["txtTen"]))
    {
        $ten = $_GET["txtTen"];
        $sql = "INSERT INTO loaisanpham(TenLoaiSanPham,BiXoa) VALUES('$ten',0)";
        DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=4");
?>
