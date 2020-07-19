<?php
    session_start();
    include "../../libs/DataProvider.php";
    include "../../libs/ShoppingCart.php";

    if(isset($_SESSION["GioHang"]))
    {
        $gioHang = unserialize($_SESSION["GioHang"]);
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];

        date_default_timezone_set('asia/ho_chi_minh');
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 1;
        $tongGia = $_SESSION["TongGia"];

        //Xử lý tạo mã đơn đặt hàng với ddmmyyxx
        $sql = "SELECT MaDonDatHang FROM dondathang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $r = "081012003";
        $sttMaDonDatHang = 0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDatHang"], 6, 3);
        }

        $sttMaDonDatHang += 1;
        $sttMaDonDatHang = sprintf("%03s", $sttMaDonDatHang);

        $maDonDatHang = date("d").date("m").substr(date("Y"), 2, 2).$sttMaDonDatHang;

        //Tạo đơn đặt hàng mới và lưu xuống CSDL bằng DonDatHang

        $sql = "INSERT INTO dondathang(MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) VALUES ('$maDonDatHang', '$ngayLap', $tongGia, $maTaiKhoan, $maTinhTrang)";

        DataProvider::ExecuteQuery($sql);

        ///-------------------------------------------
        //xử lý thêm chi tiết đơn hàng

        $soLuongSanPham = count($gioHang->listProduct);

        for($i = 0; $i < $soLuongSanPham; $i++)
        {
            $id = $gioHang->listProduct[$i]->id;
            $sl = $gioHang->listProduct[$i]->num;

            //2.1 lấy thông tin sản phẩm, số lượng tồn.

            $sql = "SELECT GiaSanPham, SoLuongTon FROM sanpham WHERE MaSanPham = $id";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);

            $soLuongTonHienTai = $row["SoLuongTon"];
            $giaSanPham = $row["GiaSanPham"];

            $sttChiTietDonDatHang = sprintf("%02s", $i);
            $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

            //2.2 Thêm 1 dòng mới vào bảng ChiTietDonDatHang
            $sql = "INSERT INTO chitietdondathang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) VALUES
            ('$maChiTietDonDatHang', $sl, $giaSanPham, '$maDonDatHang', $id)";
            DataProvider::ExecuteQuery($sql);

            //2.3 Update lại số lượng tồn của bảng SanPham
            $soLuongTonMoi = $soLuongTonHienTai - $sl;

            $sql = "UPDATE sanpham SET SoLuongTon = $soLuongTonMoi WHERE MaSanPham = $id";
            DataProvider::ExecuteQuery($sql);
            
        }

        unset($_SESSION["GioHang"]);
        DataProvider::ChangeURL("../../index.php?a=5&sub=2");
    }else if (isset($_GET['id']))
    {
        $id = $_GET['id'];
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];

        date_default_timezone_set('asia/ho_chi_minh');
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 1;
        $tongGia = $_GET['gia'];

        //Xử lý tạo mã đơn đặt hàng với ddmmyyxx
        $sql = "SELECT MaDonDatHang FROM dondathang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        $r = "081012003";
        $sttMaDonDatHang = 0;
        if($row != null)
        {
            $sttMaDonDatHang = substr($row["MaDonDatHang"], 6, 3);
        }

        $sttMaDonDatHang += 1;
        $sttMaDonDatHang = sprintf("%03s", $sttMaDonDatHang);

        $maDonDatHang = date("d").date("m").substr(date("Y"), 2, 2).$sttMaDonDatHang;

        //Tạo đơn đặt hàng mới và lưu xuống CSDL bằng DonDatHang

        $sql = "INSERT INTO dondathang(MaDonDatHang, NgayLap, TongThanhTien, MaTaiKhoan, MaTinhTrang) VALUES ('$maDonDatHang', '$ngayLap', $tongGia, $maTaiKhoan, $maTinhTrang)";

        DataProvider::ExecuteQuery($sql);

        ///-------------------------------------------
        //xử lý thêm chi tiết đơn hàng

        //2.1 lấy thông tin sản phẩm, số lượng tồn.

        $sql = "SELECT GiaSanPham, SoLuongTon FROM sanpham WHERE MaSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);

        $soLuongTonHienTai = $row["SoLuongTon"];
        $giaSanPham = $row["GiaSanPham"];

        $sttChiTietDonDatHang = sprintf("%02s", 0);
        $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

        //2.2 Thêm 1 dòng mới vào bảng ChiTietDonDatHang
        $sql = "INSERT INTO chitietdondathang(MaChiTietDonDatHang, SoLuong, GiaBan, MaDonDatHang, MaSanPham) VALUES
        ('$maChiTietDonDatHang', 1, $giaSanPham, '$maDonDatHang', $id)";
        DataProvider::ExecuteQuery($sql);

        //2.3 Update lại số lượng tồn của bảng SanPham
        $soLuongTonMoi = $soLuongTonHienTai - 1;

        $sql = "UPDATE sanpham SET SoLuongTon = $soLuongTonMoi WHERE MaSanPham = $id";
        DataProvider::ExecuteQuery($sql);

        DataProvider::ChangeURL("../../index.php?a=5&sub=2");
    }
    else
    {
        DataProvider::changeURL("../../index.php?a=404");
    }
?>