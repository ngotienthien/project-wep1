-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 27, 2019 lúc 05:24 PM
-- Phiên bản máy phục vụ: 10.4.8-MariaDB
-- Phiên bản PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qllaptop`
--
CREATE DATABASE IF NOT EXISTS `qllaptop` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `qllaptop`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apphich`
--

CREATE TABLE `apphich` (
  `MaApPhich` int(11) NOT NULL,
  `Ten` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ConHieuLuc` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `apphich`
--

INSERT INTO `apphich` (`MaApPhich`, `Ten`, `ConHieuLuc`) VALUES
(1, 'banner_1.jpg', 1),
(2, 'banner_2.jpg', 1),
(3, 'banner_3.jpg', 1),
(4, 'banner_4.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `captcha`
--

CREATE TABLE `captcha` (
  `MaCaptcha` int(11) NOT NULL,
  `HinhURL` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `captcha`
--

INSERT INTO `captcha` (`MaCaptcha`, `HinhURL`) VALUES
(1, '95inb.PNG'),
(2, 'ndtf9.PNG'),
(3, 'unptd.PNG'),
(4, '5xxmp.png'),
(5, 'r3bm8.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitietdondathang`
--

CREATE TABLE `chitietdondathang` (
  `MaChiTietDonDatHang` varchar(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `MaDonDatHang` varchar(9) NOT NULL,
  `MaSanPham` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `chitietdondathang`
--

INSERT INTO `chitietdondathang` (`MaChiTietDonDatHang`, `SoLuong`, `GiaBan`, `MaDonDatHang`, `MaSanPham`) VALUES
('27121900100', 1, 20000000, '271219001', 4),
('27121900200', 2, 32000000, '271219002', 7),
('27121900300', 1, 20000000, '271219003', 9),
('27121900400', 1, 20000000, '271219004', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiettaikhoan`
--

CREATE TABLE `chitiettaikhoan` (
  `MaChiTietTaiKhoan` int(11) NOT NULL,
  `HoTen` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `MaThanhPho` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiettaikhoan`
--

INSERT INTO `chitiettaikhoan` (`MaChiTietTaiKhoan`, `HoTen`, `NgaySinh`, `MaThanhPho`, `MaTaiKhoan`) VALUES
(1, 'Hồ Văn Sơn', '2015-06-11 00:00:00', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dondathang`
--

CREATE TABLE `dondathang` (
  `MaDonDatHang` varchar(9) NOT NULL,
  `NgayLap` datetime NOT NULL,
  `TongThanhTien` int(11) NOT NULL,
  `MaTaiKhoan` int(11) NOT NULL,
  `MaTinhTrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `dondathang`
--

INSERT INTO `dondathang` (`MaDonDatHang`, `NgayLap`, `TongThanhTien`, `MaTaiKhoan`, `MaTinhTrang`) VALUES
('271219001', '2019-12-27 22:12:37', 20000000, 5, 3),
('271219002', '2019-12-27 22:12:49', 64000000, 5, 2),
('271219003', '2019-12-27 22:13:02', 20000000, 5, 1),
('271219004', '2019-12-27 22:25:56', 20000000, 2, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hangsanxuat`
--

CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL,
  `TenHangSanXuat` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LogoURL` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hangsanxuat`
--

INSERT INTO `hangsanxuat` (`MaHangSanXuat`, `TenHangSanXuat`, `LogoURL`, `BiXoa`) VALUES
(1, 'SamSung', 'logo_samsung.jpg', 0),
(2, 'HP', 'logo_hp.png', 0),
(3, 'DELL', 'logo_dell.png', 0),
(4, 'Apple', 'logo_apple.png', 0),
(5, 'MSI', 'logo_thinkpad.png', 0),
(6, 'Asus', 'logo_asus.png', 0),
(7, 'Lenovo', 'logo_lenovo.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaisanpham`
--

CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL,
  `TenLoaiSanPham` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `BiXoa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaisanpham`
--

INSERT INTO `loaisanpham` (`MaLoaiSanPham`, `TenLoaiSanPham`, `BiXoa`) VALUES
(1, 'Chơi game', 0),
(2, 'Văn phòng', 0),
(3, 'Lập trình', 0),
(4, 'Đồ hoạ - Kỹ thuật', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitaikhoan`
--

CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL,
  `TenLoaiTaiKhoan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `loaitaikhoan`
--

INSERT INTO `loaitaikhoan` (`MaLoaiTaiKhoan`, `TenLoaiTaiKhoan`) VALUES
(1, 'Vãng lai'),
(2, 'Admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhURL` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GiaSanPham` int(11) NOT NULL,
  `NgayNhap` datetime NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `SoLuongBan` int(11) NOT NULL,
  `SoLuongXem` int(11) NOT NULL,
  `MoTa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ThongSoKyThuat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) NOT NULL DEFAULT 0,
  `MaLoaiSanPham` int(11) NOT NULL,
  `MaHangSanXuat` int(11) NOT NULL,
  `XuatXu` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`MaSanPham`, `TenSanPham`, `HinhURL`, `GiaSanPham`, `NgayNhap`, `SoLuongTon`, `SoLuongBan`, `SoLuongXem`, `MoTa`, `ThongSoKyThuat`, `BiXoa`, `MaLoaiSanPham`, `MaHangSanXuat`, `XuatXu`) VALUES
(1, 'New XPS 15', 'prd_1.jpg', 35000000, '2019-11-14 00:00:00', 7, 22, 33, 'Hàng dễ vỡ xin đừng mạnh tay', 'Processor\r\nUp to 9th Generation Intel® Core™ i9-9980HK\r\nOperating System\r\nWindows 10 Home\r\nGraphics Card\r\nUp to NVIDIA® GeForce® GTX 1650 4GB GDDR5\r\nDisplay\r\nUp to 15.6-in. display\r\nHard Drive\r\nUp to 2TB PCIe Solid State Drive\r\nMemory\r\nUp to 64GB DDR4-2666MHz, 2x32G', 0, 4, 3, 'HongKong'),
(2, 'Premium Pavilion', 'prd_2.jpg', 20000000, '2019-12-15 00:00:00', 11, 123, 123, 'Intel Pentium 4-Core N5000, up to 2.7 GHz, 8GB RAM, 256GB SSD, Win 10', 'RAM is upgraded to 8GB memory for multitasking Adequate high-bandwidth RAM to smoothly run multiple applications and browser tabs all at once.\r\n\r\nHard Drive is upgraded to 256GB SSD provides massive storage space for huge files, so that you can store important digital data and work your way through it with ease. It gives you enormous space to save all of your files. Enhance the overall performance of the laptop for business, student, daily usage.\r\n\r\nIntel Quad Core N5000 4 Core 4 Threads 4MB 1.1GHz Base Frequency, Burst Frequency up to 2.7GHz (No DVD Drive)\r\n\r\nIntel UHD Gaphics 605, HDMI, HD Webcam, DTS Studio Sound, 1 USB 3.0, 2 USB 2.0, 1 802.11a/b/g/n/ac, Win 10 Home 64-bits, weighs 4.3 lbs.\r\n\r\n15.6\" HD LED Touchscreen Display (1366 x 768), 10-finger multi-touch support. Let You Have a Full Grasp of its Graphical and Visual Excellence. Please Note: No DVD drive. It comes with HESVAP USB extension cord, Mouse Pad and HDMI cable.', 0, 2, 2, 'China'),
(3, 'HP 15.6\" HD Screen Laptop', 'prd_3.jpg', 20000000, '2019-12-15 00:00:00', 10, 43, 213, 'Intel Pentium Quad-Core N5000 (up to 2.7 GHz), 8GB DDR4, 1TB HDD, Bluetooth, Wi-Fi, HDMI, Webcam, Win 10', 'With the latest Intel Pentium Silver N5000 Quad-Core Up to 2.7GHz processor you get the reliable performance you need to work and play.\r\n15.6-inch diagonal HD SVA WLED-backlit touchscreen display Typical 1366 x 768 HD resolution. The touch display has a basic HD-class picture resolution (sharpness) and TN-class narrow viewing angles. Let You Have a Full Grasp of its Graphical and Visual Excellence\r\n8GB system memory for advanced multitasking;Substantial high-bandwidth RAM to smoothly run your games and photo- and video-editing applications, as well as multiple programs and browser tabs all at once.1TB hard drive for ample file storage space; Holds a sizeable collection of digital photos, music, HD videos and DVD-quality movies.\r\nWifi 802.11ac, Bluetooth, USB 3.0, HDMI output expands your viewing options, Front-facing HP Webcam with integrated digital microphone; Basic Intel UHD 605 integrated graphics. Take advantage of the newest, highest performance, fastest, energy efficient premium CPU, with multi-task capabilities to work through any task at hand\r\nWindows 10 brings back the Start Menu from Windows 7 and introduces new features, like the Edge Web browser that lets you markup Web pages on your screen.', 0, 2, 2, 'Colombia'),
(4, 'HP 14\" Touchscreen Laptop', 'prd_4.jpg', 20000000, '2019-12-15 00:00:00', 122, 12, 3412, 'HP 14\" Touchscreen Laptop 8GB RAM, 128GB SSD, 8th Gen i3 HD Business Notebook, Dual-Core up to 3.90 GHZ Processor, USB Type-C, 1366x768, UHD 620 Grap', '14\" touch screen with 1366 x 768 HD resolution. WLED backlight. HDMI output expands your viewing options.\r\n8th Gen Intel Core i3-8145U mobile processor. Dual-Core up to 3.90 GHz. Intel UHD Graphics 620, for basic photo editing and casual gaming.\r\nAdequate high-bandwidth DDR4 RAM with M.2 Solid State Drive (SSD), best choice of multitasking performance.\r\nWeighs 3.22 lbs. and measures 0.7\" thin. Ultrathin and ultralight for maximum portability.\r\nBuilt-in media reader for simple photo transfer. Built-in HP TrueVision HD webcam with dual-array digital microphone.', 0, 2, 2, 'Vietnam'),
(7, 'New Apple MacBook Air', 'prd_7.jpg', 32000000, '2019-12-15 00:00:00', 16, 142, 2435, 'Stunning 13.3-Inch Retina Display with True Tone\r\nTouch ID\r\nDual-core 8th-Generation Intel Core i5 Processor\r\nIntel UHD Graphics 617\r\nFast SSD Storage\r\n8GB memory\r\nStereo speakers with wider Stereo sound\r\nTwo Thunderbolt 3 (USB-C) ports\r\n', 'Stunning 13.3-Inch Retina Display with True Tone\r\nTouch ID\r\nDual-core 8th-Generation Intel Core i5 Processor\r\nIntel UHD Graphics 617\r\nFast SSD Storage\r\n8GB memory\r\nStereo speakers with wider Stereo sound\r\nTwo Thunderbolt 3 (USB-C) ports\r\n', 0, 2, 4, 'Combodia'),
(8, 'New Apple MacBook Pro', 'prd_8.jpg', 42000000, '2019-12-15 00:00:00', 23, 123, 3253, 'Ships from and sold by Amazon.com', 'Ninth-generation 6-Core Intel Core i7 Processor\r\nStunning 16-inch Retina Display with True Tone technology\r\nTouch Bar and Touch ID\r\nAmd Radeon Pro 5300M Graphics with GDDR6 memory\r\nUltrafast SSD\r\nIntel UHD Graphics 630\r\nSix-speaker system with force-cancelling woofers', 0, 2, 4, 'HongKong'),
(9, 'Samsung Chromebook+ V2', 'prd_9.jpg', 20000000, '2019-12-01 00:00:00', 11, 23, 124, '4GB RAM, 64GB eMMC, 13MP Camera, Chrome OS, 12.2\", 16:10 Aspect Ratio, Light Titan (XE520QAB-K03US)', 'TWEIGHT 2 in 1 DESIGN At just under 3 pounds, the Chromebook Plus is incredibly lightweight; You can easily fold it into tablet mode for comfortable viewing and browsing\r\nBUILT IN PEN Experience the power of the incredibly precise built in pen that never needs charging; It\'s always ready to write, sketch, edit, magnify and even take screenshots\r\nDUAL CAMERA Fold your laptop into tablet mode to capture clear shots and even zoom in for a closer look with the revolutionary 13MP world facing camera with autofocus\r\nCHROME OS AND GOOGLE PLAY STORE Create, explore and browse on a bigger screen with the tools you use every day all on the secure Chrome OS\r\nPOWER AND PERFORMANCE Tackle anything with a long lasting battery and Intel Celeron processor; Store more with 64GB of built in memory and add up to 400GB with a microSD card.Bluetooth v4.0', 0, 2, 1, 'Korean'),
(11, 'Samsung Chromebook+ V2', 'prd_9.jpg', 20000000, '2019-12-01 00:00:00', 12, 23, 124, '4GB RAM, 64GB eMMC, 13MP Camera, Chrome OS, 12.2\", 16:10 Aspect Ratio, Light Titan (XE520QAB-K03US)', 'TWEIGHT 2 in 1 DESIGN At just under 3 pounds, the Chromebook Plus is incredibly lightweight; You can easily fold it into tablet mode for comfortable viewing and browsing\r\nBUILT IN PEN Experience the power of the incredibly precise built in pen that never needs charging; It\'s always ready to write, sketch, edit, magnify and even take screenshots\r\nDUAL CAMERA Fold your laptop into tablet mode to capture clear shots and even zoom in for a closer look with the revolutionary 13MP world facing camera with autofocus\r\nCHROME OS AND GOOGLE PLAY STORE Create, explore and browse on a bigger screen with the tools you use every day all on the secure Chrome OS\r\nPOWER AND PERFORMANCE Tackle anything with a long lasting battery and Intel Celeron processor; Store more with 64GB of built in memory and add up to 400GB with a microSD card.Bluetooth v4.0', 0, 2, 1, 'Portland'),
(13, 'Dell XPS 15', 'prd_12.jpg', 27000000, '2019-12-27 14:08:12', 12, 0, 0, 'Dell XPS 15 9550 là chiếc laptop thuộc dòng Multimedia với kiểu dáng thiết kế hiện đại, màn hình tùy chọn với độ phân giải 4K, cấu hình khủng cho năng suất công việc tuyệt vời.', 'Intel Core i7-6700HQ 2.6 GHz, 6M Cache Cache, Upto 3.5 GHz,8GB DDR4 2133Mhz, 256GB SSD.\r\n', 0, 4, 3, NULL),
(14, 'Dell Alienware Area-51M', 'prd_13.jpg', 64000000, '2019-12-27 14:13:11', 10, 0, 0, 'Dell Alienware Area-51M hoàn toàn khác biệt với những chiếc gaming laptop mà bạn từng biết. Với một sức mạnh chưa từng có trên laptop, khả năng nâng cấp CPU lẫn GPU vượt trội, bộ tản nhiệt tiên tiến cùng với một thiết kế quý tộc mang thiên hướng của một cuộc cách mạng laptop, bạn giờ đây đã có thể thực sự chiêm nghiệm cụm từ \"Laptop thay thế Desktop\".', 'Intel® Core™ i7-9700K 3.6 GHz, 12MB SmartCache Cache, Upto 4.9 GHz, 16GB DDR4 2666MHz, 256GB SSD m2 NVMe PCIe, 17.3 inch FHD (1920x1080), UltraSharp Anti-Glare IPS 60Hz,nVIDIA GeForce RTX 2060 6GB.', 0, 1, 3, NULL),
(15, 'HP ZBook Studio G5', 'prd_14.jpg', 37000000, '2019-12-27 14:18:46', 7, 0, 0, 'Windows 10 Pro là hệ điều hành tốt nhất dành cho mọi phần mềm cũng như khả năng tối ưu cho công việc của bạn. Với khả năng hỗ trợ DirectX12 và OpenGL một cách tốt nhất, dù bạn là game thủ hay nhà đồ hoạ chuyên nghiệp thì HP ZBook Studio G5 vẫn sẽ đáp ứng được hết. Đặc biệt, khi mua hàng tại ThinkPro, Quý Khách hàng còn được cài sẵn hệ điều hành Windows 10 Pro cũng như cập nhật hết các trình điều khiến để mọi hoạt động được diễn ra mượt mà nhất.', 'Intel Core i7-8850H 2.60GHz, 9MB SmartCache Cache, Upto 4.30 GHz, 16GB DDR4 2666MHz, 512GB SSD m2 NVMe PCIe, 15.6 inch FHD (1920 x 1080), IPS Anti-Glare,  Nvidia Quadro P1000 4GB', 0, 4, 2, NULL),
(16, 'Lenovo IdeaPad 730S', 'prd_15.jpg', 26000000, '2019-12-27 14:24:47', 7, 0, 0, 'Với độ dày chỉ 11.9 mm, Lenovo IdeaPad 730S chính là chiếc laptop mỏng nhất từ trước đến giờ của Lenovo. Được gia cố bởi hợp kim nhôm cao cấp và chỉ nặng khoảng 1.1kg, IdeaPad 730S có thể đi cùng bạn đến tận chân trời góc bể.', 'Intel Core i7-8565U 1.80 GHz, 8MB SmartCache Cache, Upto 4.60 GHz, 16GB LPDDR3 Onboard 2133MHz, 256GB SSD M2 NVMe, Màn hình 13.3 inch FHD (1920 x 1080), IPS Anti-Glare LED Backlit, Card màn hình: Intel UHD Graphics 620.', 0, 3, 7, NULL),
(17, 'Lenovo ThinkPad X1', 'prd_16.jpg', 65000000, '2019-12-27 14:32:24', 3, 0, 0, 'Mặc dù chẳng có gì thay đổi về thiết kế. Nhưng ThinkPad X1 Carbon Gen 7 vẫn chiếm được cảm tỉnh của người dùng vì sự bền bì cổ điển nhưng chững chạc. Điều này được thể hiện thông qua việc luôn giữ vững lập trường của sự hoàn hảo mà bao nhiêu năm nay Lenovo đã làm với chiếc máy này', 'Intel® Core™ i7-10710U 1.1 GHz, 12MB SmartCache Cache, Upto 4.70 GHz, 16GB LDDR3 2133MHz ,1Tb SSD NVMe ,Màn hình:14 inch UHD (3840 x 2160), IPS Anti-Glare\r\nCard màn hình: Inel UHD Graphics 620', 0, 3, 7, NULL),
(18, 'Asus ExpertBook P5440', 'prd_17.jpg', 18500000, '2019-12-27 14:40:18', 6, 0, 0, 'Asus ExpertBook P5440 là một trong những chiếc laptop doanh nghiệp mỏng nhẹ nhất có khả năng chứa đến 2 ổ cứng to mịch trong trong một thân hình mỏng nhẹ. Tuy chỉ nặng 1.23kg và độ dày chỉ bắt đầu từ hơn 10mm một chút, chiếc Asus ExpertBook P5440 đã đáp ứng được nhu cầu cơ động của đại đa số người dùng hiện nay là các doanh nhân, sinh viên hay các StartUp-er.', 'Intel Core i5-8265U 1.60 GHz, 6MB SmartCache Cache, Upto 3.90 GHz, RAM:8GB DDR4 2400MHz, Ổ cứng:512GB SSD NVMe, Màn hình:14 inch FHD (1920 x 1080), Anti-Glare LED-backlit,Card màn hình: Intel UHD Graphics 620 RAM-e', 0, 3, 6, NULL),
(19, 'Asus F571GT-BQ266T', 'prd_18.jpg', 24000000, '2019-12-27 14:41:52', 7, 0, 0, 'Asus F571 hoàn hảo cho mọi tác vụ từ giải trí hàng ngày, đắm chìm trong những tựa game hay chỉnh sửa video nhờ được trang bị bộ vi xử lý Intel® Core™ thế hệ thứ 9 và đồ họa NVIDIA® GeForce®. Nhờ đó Asus F571 có thể chiến tất cả các tựa game hiện nay mà không lo ngại gì về vấn đề cấu hình cả. Thiết kế của Asus F571 cũng vô cùng phù hợp cho nhu cầu làm việc khi vẫn giữ thiết kế doanh nhân cao cấp nhưng pha trộn một chút dáng vóc game thủ. Đây là chiếc máy phù hợp cho những người có nhu cầu không chỉ chơi game còn làm việc văn phòng nữa.', 'CPU:Intel® Core i7 -9750h 2.6GHz, 12MB SmartCache Cache, Upto 4.5GHz\r\nRAM:8GB DDR4 2666MHz\r\nỔ cứng:512GB SSD M.2 PCIE G3X2\r\nMàn hình:15.6 inch FHD (1920 x 1080), IPS Anti-Glare UltraSharp\r\nCard màn hình: nVIDIA GeForce GTX1650 4GB', 0, 4, 6, NULL),
(20, 'Laptop MSI GL65', 'prd_19.png', 30000000, '2019-12-27 14:52:24', 12, 0, 0, 'Tên sản phẩm: Máy tính xách tay/ Laptop MSI GL65 9SD-054VN (I5-9300H) (Đen)', 'CPU: Intel Core i5 9300H (2.4 GHz - 4.1 GHz/8MB/4 nhân, 8 luồng)\r\nMàn hình: 15.6\" IPS (1920 x 1080), 120Hz, không cảm ứng\r\nRAM: 1 x 8GB DDR4 2666MHz (2 Khe cắm, Hỗ trợ tối đa 64GB)\r\nĐồ họa: NVIDIA GeForce GTX 1660Ti 6GB GDDR6 / Intel UHD Graphics 630\r\nLưu trữ: 512GB SSD M.2 NVMe /\r\n- Hệ điều hành: Windows 10 Home SL 64-bit\r\n- Pin: 6 cell 51 Wh Pin liền, Khối lượng: 2.3 kg', 0, 1, 5, NULL),
(21, 'Laptop MSI Prestige 15', 'prd_20.jpg', 33000000, '2019-12-27 14:54:42', 4, 0, 0, 'Tên sản phẩm: Máy tính xách tay/ Laptop MSI Prestige 15 A10SC-222VN (i7-10710U) (Xám)', 'CPU: Intel Core i7-10710U (1.1 GHz - 4.7 GHz/12MB/6 nhân, 12 luồng)\r\nMàn hình: 15.6\" IPS (1920 x 1080), không cảm ứng\r\nRAM: 1 x 16GB DDR4 2666MHz (2 Khe cắm, Hỗ trợ tối đa 64GB)\r\nĐồ họa: NVIDIA GeForce GTX 1650 4GB GDDR5 / Intel UHD Graphics\r\nLưu trữ: 512GB SSD M.2 NVMe /\r\nHệ điều hành: Windows 10 Home SL 64-bit\r\nPin: 3 cell 51 Wh Pin liền, Khối lượng: 1.6 kg', 0, 1, 5, NULL),
(22, 'Laptop MSI Prestige PS42', 'prd_21.jpg', 45000000, '2019-12-27 15:01:44', 6, 0, 0, 'Tên sản phẩm: Máy tính xách tay/ Laptop MSI PS42 8RB-234VN (i5-8250U) (Bạc)', 'CPU: Intel Core i5-8250U ( 1.6 GHz - 3.4 GHz / 6MB / 4 nhân, 8 luồng )\r\nMàn hình: 14\" ( 1920 x 1080 ) , không cảm ứng\r\nRAM: 1 x 8GB DDR4 2666MHz\r\nĐồ họa: Intel UHD Graphics 620 / NVIDIA GeForce MX150 2GB GDDR5\r\nLưu trữ: 256GB SSD M.2 NVMe\r\nHệ điều hành: Windows 10 Home SL 64-bit\r\nPin: 4 cell 50 Wh Pin liền , khối lượng: 1.2 kg', 0, 1, 5, NULL),
(23, 'Laptop Apple Macbook Pro 2017', 'prd_22.jpg', 45000000, '2019-12-27 15:09:24', 4, 0, 0, 'Tên sản phẩm: Máy tính xách tay/ Laptop MacBook Pro 2017 13.3\" MPXV2 (Xám)', 'CPU: Intel Core i5-7267U ( 3.1 GHz - 3.5 GHz / 4MB / 2 nhân, 4 luồng )\r\nMàn hình: 13.3\" IPS ( 2560 x 1600 ) , không cảm ứng\r\nRAM: 8GB Onboard LPDDR3 2133MHz\r\nĐồ họa: Intel Iris Plus Graphics 650\r\nLưu trữ: 256GB SSD M.2 NVMe\r\nHệ điều hành: macOS\r\nPin: 49 Wh Pin liền , khối lượng: 1.4 kg', 0, 2, 4, NULL),
(24, 'Laptop ASUS ROG', 'prd_23.jpg', 49000000, '2019-12-27 15:26:51', 6, 0, 0, 'Tên sản phẩm: Máy tính xách tay/ Laptop Asus ROG Strix Scar III G531GV-VAZ160T (i7-9750H)', 'CPU: Intel Core i7-9750H (2.6 GHz - 4.5 GHz/12MB/6 nhân, 12 luồng)\r\nMàn hình: 15.6\" IPS (1920 x 1080), 240Hz, không cảm ứng\r\nRAM: 2 x 8GB DDR4 2666MHz (2 Khe cắm, Hỗ trợ tối đa 32GB)\r\nĐồ họa: NVIDIA GeForce RTX 2060 6GB GDDR6 / Intel UHD Graphics 630\r\nLưu trữ: 512GB SSD M.2 NVMe /\r\nHệ điều hành: Windows 10 Home 64-bit\r\nPin: 4 cell 66 Wh Pin liền, Khối lượng: 2.6 kg', 0, 1, 6, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `taikhoan`
--

CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL,
  `TenDangNhap` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenHienThi` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MATHANHPHO` int(11) NOT NULL,
  `BiXoa` tinyint(1) NOT NULL DEFAULT 0,
  `MaLoaiTaiKhoan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `taikhoan`
--

INSERT INTO `taikhoan` (`MaTaiKhoan`, `TenDangNhap`, `MatKhau`, `TenHienThi`, `DienThoai`, `Email`, `MATHANHPHO`, `BiXoa`, `MaLoaiTaiKhoan`) VALUES
(1, 'hovanson', '123456', 'Hồ Văn Sơn', '123456789', 'hovanson@gmail.com', 1, 0, 2),
(2, 'khoaprovip', '123456', 'khoadeptrai', '0388239201', 'Buidangkhoa@gmail.com', 1, 0, 2),
(3, 'khoa', '1', 'Thú nhồi bông1', '1', 'Buidangkhoa@gmail.com', 10, 0, 1),
(4, 'khoadeptrai2', '1', 'Thú nhồi bông1', '0388239201', 'Buidangkhoa@gmail.com', 5, 0, 1),
(5, 'Revell556', '123456', 'Revell556', '0388239201', 'Buidangkhoa@gmail.com', 6, 0, 1),
(6, 'k', 'k', 'k', 'k', '', 1, 0, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhpho`
--

CREATE TABLE `thanhpho` (
  `MaThanhPho` int(11) NOT NULL,
  `TenThanhPho` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhpho`
--

INSERT INTO `thanhpho` (`MaThanhPho`, `TenThanhPho`) VALUES
(1, 'Hà Nội'),
(2, 'Hòa Bình'),
(3, 'Đà Nẵng'),
(4, 'Quảng Nam'),
(5, 'TP. Hồ Chí Minh'),
(6, 'Đồng Nai'),
(7, 'Cà Mau'),
(8, 'Cần thơ'),
(9, 'Bình Định'),
(10, 'Phú Yên'),
(11, 'Khánh Hòa'),
(12, 'Ninh Thuận'),
(13, 'Vĩnh Long'),
(14, 'Tây Ninh'),
(15, 'Bà Rịa Vũng Tàu'),
(16, 'Bến Tre');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinhtrang`
--

CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL,
  `TenTinhTrang` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tinhtrang`
--

INSERT INTO `tinhtrang` (`MaTinhTrang`, `TenTinhTrang`) VALUES
(1, 'Giao hàng'),
(2, 'Bị hủy'),
(3, 'Thanh toán');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `apphich`
--
ALTER TABLE `apphich`
  ADD PRIMARY KEY (`MaApPhich`);

--
-- Chỉ mục cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD PRIMARY KEY (`MaChiTietDonDatHang`),
  ADD KEY `FK_CTDH_DonDatHang` (`MaDonDatHang`),
  ADD KEY `FK_CTDH_SanPham` (`MaSanPham`);

--
-- Chỉ mục cho bảng `chitiettaikhoan`
--
ALTER TABLE `chitiettaikhoan`
  ADD PRIMARY KEY (`MaChiTietTaiKhoan`),
  ADD KEY `FK_CTTK_TK` (`MaTaiKhoan`),
  ADD KEY `FK_CTTK_TP` (`MaThanhPho`);

--
-- Chỉ mục cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD PRIMARY KEY (`MaDonDatHang`),
  ADD KEY `FK_DonDatHang_TaiKhoan` (`MaTaiKhoan`),
  ADD KEY `FK_DonDatHang_TinhTrang` (`MaTinhTrang`);

--
-- Chỉ mục cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  ADD PRIMARY KEY (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  ADD PRIMARY KEY (`MaLoaiSanPham`);

--
-- Chỉ mục cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  ADD PRIMARY KEY (`MaLoaiTaiKhoan`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`MaSanPham`),
  ADD KEY `FK_SanPham_LoaiSanPham` (`MaLoaiSanPham`),
  ADD KEY `FK_SanPham_HangSanXua` (`MaHangSanXuat`);

--
-- Chỉ mục cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`MaTaiKhoan`),
  ADD UNIQUE KEY `TenDangNhap` (`TenDangNhap`),
  ADD KEY `FK_TaiKhoan_LoaiTaiKhoan` (`MaLoaiTaiKhoan`),
  ADD KEY `MATHANHPHO` (`MATHANHPHO`);

--
-- Chỉ mục cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  ADD PRIMARY KEY (`MaThanhPho`);

--
-- Chỉ mục cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  ADD PRIMARY KEY (`MaTinhTrang`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chitiettaikhoan`
--
ALTER TABLE `chitiettaikhoan`
  MODIFY `MaChiTietTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `hangsanxuat`
--
ALTER TABLE `hangsanxuat`
  MODIFY `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `loaisanpham`
--
ALTER TABLE `loaisanpham`
  MODIFY `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `loaitaikhoan`
--
ALTER TABLE `loaitaikhoan`
  MODIFY `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `MaSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `thanhpho`
--
ALTER TABLE `thanhpho`
  MODIFY `MaThanhPho` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tinhtrang`
--
ALTER TABLE `tinhtrang`
  MODIFY `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitietdondathang`
--
ALTER TABLE `chitietdondathang`
  ADD CONSTRAINT `FK_CTDH_DonDatHang` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`),
  ADD CONSTRAINT `FK_CTDH_SanPham` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`);

--
-- Các ràng buộc cho bảng `chitiettaikhoan`
--
ALTER TABLE `chitiettaikhoan`
  ADD CONSTRAINT `FK_CTTK_TK` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `FK_CTTK_TP` FOREIGN KEY (`MaThanhPho`) REFERENCES `thanhpho` (`MaThanhPho`);

--
-- Các ràng buộc cho bảng `dondathang`
--
ALTER TABLE `dondathang`
  ADD CONSTRAINT `FK_DonDatHang_TaiKhoan` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`),
  ADD CONSTRAINT `FK_DonDatHang_TinhTrang` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `FK_SanPham_HangSanXua` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`),
  ADD CONSTRAINT `FK_SanPham_LoaiSanPham` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`);

--
-- Các ràng buộc cho bảng `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD CONSTRAINT `taikhoan_ibfk_1` FOREIGN KEY (`MATHANHPHO`) REFERENCES `thanhpho` (`MaThanhPho`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
