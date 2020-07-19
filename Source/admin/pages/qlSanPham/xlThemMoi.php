<?php 
    include "../../../libs/DataProvider.php";
    
    $ten = $_POST["txtTen"];
    $maHangSanXuat = $_POST["cmbHang"];
    $maLoaiSanPham = $_POST["cmbLoai"];
    if(isset($_FILES['fHinh'])){
    $hinhURL = $_FILES['fHinh']['name'];
    }
    $ngayLap = date("Y-m-d H:i:s");
    move_uploaded_file($_FILES["fHinh"]["tmp_name"],"../../../images/product/".$_FILES["fHinh"]["name"]);
    $gia = $_POST["txtGia"];
    $ton = $_POST["txtTon"];
    $moTa = $_POST["txtMoTa"];
    $thongSoKyThuat=$_POST["txtThongSoKyThuat"];
    $sql = "INSERT INTO sanpham(TenSanPham,HinhURL,NgayNhap,SoLuongBan,GiaSanPham,SoLuongTon,MoTa,ThongSoKyThuat,BiXoa,MaHangSanXuat,MaLoaiSanPham) VALUES('$ten','$hinhURL','$ngayLap',0,$gia,$ton,'$moTa','$thongSoKyThuat',0,'$maHangSanXuat','$maLoaiSanPham')";  
    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("../../index.php?c=3");
?>  