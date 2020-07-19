<?php
    include "../../../libs/DataProvider.php";
    if(isset($_GET["id"])){
    $ma=$_GET["id"];
    move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../../images/product/".$_FILES["fHinh"]["name"]);
    $ten = $_POST["txtTen"];
    $maHangSanXuat = $_POST["cmbHang"];
    $maLoaiSanPham = $_POST["cmbLoai"];
    $hinhURL = ($_FILES["fHinh"]["name"] != "")?$_FILES["fHinh"]["name"]:$_POST["fHiddenHinh"];
    $gia = $_POST["txtGia"];
    $ton = $_POST["txtTon"];
    $moTa = $_POST["txtMoTa"];
    $thongSoKyThuat = $_POST["txtThongSoKyThuat"];
    $sql = "UPDATE sanpham SET TenSanPham='$ten', MaLoaiSanPham='$maLoaiSanPham',HinhURL='$hinhURL', MaHangSanXuat='$maHangSanXuat', GiaSanPham=$gia, SoLuongTon=$ton, MoTa='$moTa',ThongSoKyThuat = '$thongSoKyThuat' WHERE MaSanPham ='$ma'";
    DataProvider::ExecuteQuery($sql);
    }
    DataProvider::ChangeURL("../../index.php?c=3");
?>