<?php
    session_start();
    include "../../libs/DataProvider.php";

    if (isset($_POST["txtUS"]))
    {
        $us = $_POST["txtUS"];
        $ps = $_POST["txtPS"];
        $name = $_POST["txtTen"];
        $tel = $_POST["txtPhone"];
        $mail = $_POST["txtMail"];
        $city = $_POST["selected"];

        $sql = "SELECT * FROM taikhoan WHERE TenDangNhap = '$us'";
        $result =  DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row != null)
        {
            $curURL = $_SESSION["path"];
            DataProvider::ChangeURL("../../..".$curURL."&err=1");
        }
        else
        {
            $sql = "INSERT INTO taikhoan(TenDangNhap, MatKhau, TenHienThi, DienThoai, Email,MaThanhPho,BiXoa, MaLoaiTaiKhoan)
                                        Values ('$us','$ps','$name','$tel','$mail',$city,0,1)";
            DataProvider::ExecuteQuery($sql);

            $sql = "SELECT MaTaiKhoan FROM taikhoan WHERE TenDangNhap = '$us' AND MatKhau = '$ps'";
            $result =  DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result); 

            $_SESSION["MaTaiKhoan"] = $row["MaTaiKhoan"];
            $_SESSION["MaLoaiTaiKhoan"] = 1;
            $_SESSION["TenHienThi"] = $name;

            DataProvider::ChangeURL("../../index.php");
        }
    }
    else
    {
        DataProvider::ChangeURL("../../index.php?a=404");
    }
?>