<?php
    include "../../../libs/DataProvider.php";

    if(!isset($_POST["txtMaKH"]))
    {
        $maTaiKhoan = $_POST["txtMaKH"];
        date_default_timezone_set('asia/ho_chi_minh');
        $ngayLap = date("Y-m-d H:i:s");
        $ngayLapTam = date("Y-m-d");
        $maTinhTrang = 2;
        
        //Xử lý tạo mã đơn đặt hàng với ddmmyyxx
        $sql = "SELECT MaDonDatHang FROM dondathang WHERE NgayLap like '$ngayLapTam%' ORDER BY MaDonDatHang DESC LIMIT 1";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
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
    }else
    {
        DataProvider::changeURL("../../index.php?c=404");
    }
?>