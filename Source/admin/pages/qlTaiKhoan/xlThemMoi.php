<?php
    session_start();
    include "../../../libs/DataProvider.php";

    if (isset($_POST["txtTenDangNhap"]))
    {
        $us = $_POST["txtTenDangNhap"];
        $ps = $_POST["txtMatKhau"];
        $name = $_POST["txtTenHienThi"];
        $tel = $_POST["txtDienThoai"];
        $mail = $_POST["txtEmail"];
        $diachi = $_POST["txtMaThanhPho"];

        $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$us'";
        $result =  DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row != null)
        {
            DataProvider::ChangeURL("../../index.php?c=2&a=3&err=1");
        }
        else
        {
            $sql = "INSERT INTO taikhoan(TenDangNhap, MatKhau, TenHienThi, DienThoai, Email,MaThanhPho,BiXoa, MaLoaiTaiKhoan)
                                        Values ('$us','$ps','$name','$tel','$mail','$diachi',0,1)";
            DataProvider::ExecuteQuery($sql);

            DataProvider::ChangeURL("../../index.php?c=2");
        }
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>

