<?php
    session_start();
    include "../../libs/DataProvider.php";

    if (isset($_POST["txtUS"]) && isset($_POST["txtPS"]))
    {
        $us = $_POST["txtUS"];
        $ps = $_POST["txtPS"];

        $sql = "SELECT * FROM taikhoan
                where BiXoa = 0
                        And TenDangNhap = '$us'
                        And MatKhau = '$ps'";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        if ($row == null)
            DataProvider::ChangeURL("../../index.php?a=404&id=1");
        else
        {
            $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
            $_SESSION["MaLoaiTaiKhoan"] = $row["MaLoaiTaiKhoan"];
            $_SESSION["TenHienThi"] = $row["TenHienThi"];

            if ($row["MaLoaiTaiKhoan"] == 2)
            {
                DataProvider::ChangeURL("../../admin/index.php");
            }
            else
            {
                $curURL = $_SESSION["path"];
                if (isset($_SESSION["GioHang"]))
                    DataProvider::ChangeURL("../../index.php?a=5");
                DataProvider::ChangeURL("../../index.php?a=1");
                if (strpos($curURL,"a=404&id=1") == 20)
                    DataProvider::ChangeURL("../../index.php");
                else
                    DataProvider::ChangeURL("../..".$curURL);
            }
         }
    }
    else
        DataProvider::ChangeURL("../index.php?a=404&id=1");
?>

