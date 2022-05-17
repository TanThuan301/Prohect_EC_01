-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 06:13 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `doanwebbanhang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cauhinh`
--

CREATE TABLE `tbl_cauhinh` (
  `ID` int(11) NOT NULL,
  `CPU` varchar(50) NOT NULL,
  `RAM` varchar(50) NOT NULL,
  `OCUNG` varchar(50) NOT NULL,
  `MANHINH` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cauhinh`
--

INSERT INTO `tbl_cauhinh` (`ID`, `CPU`, `RAM`, `OCUNG`, `MANHINH`) VALUES
(1, 'Core i7', '8GB', '256GB', '15.6'),
(2, 'Core i5', '8GB', '512GB', '15.6'),
(3, 'Core i3', '8GB', '256GB', '15.6'),
(4, 'Core i3', '16GB', '256GB', '15.6'),
(5, 'Core i5', '8GB', '256GB', '15.6'),
(6, 'Core i5', '16GB', '256GB', '15.6'),
(7, 'Core i5', '16GB', '512GB', '15.6'),
(8, 'Core i7', '16GB', '512GB', '15.6'),
(9, 'Core i7', '16GB', '256GB', '15.6'),
(10, 'Core i5', '16GB', '256GB', '14'),
(11, 'Core i5', '16GB', '512GB', '14'),
(12, 'Core i7', '16GB', '512GB', '14'),
(13, 'Core i7', '16GB', '256GB', '14'),
(14, 'Core i5', '8GB', '256GB', '14'),
(15, 'Core i5', '8GB', '512GB', '14'),
(16, 'Core i7', '8GB', '512GB', '14'),
(17, 'Core i7', '8GB', '256GB', '14'),
(18, 'Core i3', '16GB', '512GB', '14'),
(19, 'Core i3', '8GB', '256GB', '14'),
(20, 'AMD RYZEN7', '8GB', '256GB', '15.6'),
(21, 'AMD RYZEN7', '16GB', '256GB', '15.6'),
(22, 'AMD RYZEN7', '8GB', '512GB', '15.6'),
(23, 'AMD RYZEN7', '16GB', '512GB', '15.6'),
(24, 'AMD RYZEN7', '16GB', '256GB', '14'),
(25, 'AMD RYZEN7', '8GB', '512GB', '14'),
(26, 'AMD RYZEN7', '16GB', '256GB', '14'),
(27, 'AMD RYZEN7', '16GB', '512GB', '14'),
(28, 'AMD RYZEN5', '16GB', '256GB', '14'),
(29, 'AMD RYZEN5', '8GB', '512GB', '14'),
(30, 'AMD RYZEN5', '16GB', '256GB', '14'),
(31, 'AMD RYZEN5', '16GB', '512GB', '14'),
(32, 'AMD RYZEN5', '16GB', '256GB', '15.6'),
(33, 'AMD RYZEN5', '8GB', '512GB', '15.6'),
(34, 'AMD RYZEN5', '16GB', '256GB', '15.6'),
(35, 'AMD RYZEN5', '16GB', '512GB', '15.6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(15) NOT NULL,
  `tendanhmuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`) VALUES
(81, 'THƯƠNG HIỆU'),
(82, 'CPU'),
(83, 'RAM'),
(84, 'Ổ CỨNG'),
(85, 'MÀN HÌNH');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `ma_donhang` int(11) NOT NULL,
  `ten_kh` varchar(50) NOT NULL,
  `id_sanpham` int(15) NOT NULL,
  `ngaydat` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `ghichu` varchar(50) NOT NULL,
  `huydon` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mathang` varchar(50) NOT NULL,
  `tinhtrang` int(11) NOT NULL,
  `magiaodich` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`ma_donhang`, `ten_kh`, `id_sanpham`, `ngaydat`, `ghichu`, `huydon`, `soluong`, `mathang`, `tinhtrang`, `magiaodich`) VALUES
(1, 'thinh@gmail.com', 29, '2022-05-17 04:09:33', '', 0, 1, '', 1, 3996),
(2, 'thinh@gmail.com', 34, '2022-05-17 04:09:33', '', 0, 1, '', 1, 3996);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `id_giaodich` int(11) NOT NULL,
  `id_sanpham` int(15) NOT NULL,
  `id_khachhang` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrangdh` int(11) NOT NULL,
  `huydon` int(11) NOT NULL,
  `tongtiendh` varchar(50) NOT NULL,
  `magiaodich` int(11) NOT NULL,
  `tennguoinhan` varchar(50) NOT NULL,
  `diachinhanhang` varchar(50) NOT NULL,
  `tinh_thanhpho` int(11) NOT NULL,
  `sdtnh` varchar(50) NOT NULL,
  `pt_thanhtoan` int(11) NOT NULL,
  `phuong_xa` int(11) NOT NULL,
  `quan_huyen` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`id_giaodich`, `id_sanpham`, `id_khachhang`, `soluong`, `ngaythang`, `tinhtrangdh`, `huydon`, `tongtiendh`, `magiaodich`, `tennguoinhan`, `diachinhanhang`, `tinh_thanhpho`, `sdtnh`, `pt_thanhtoan`, `phuong_xa`, `quan_huyen`) VALUES
(1, 29, 'thinh@gmail.com', 1, '2022-05-17 04:09:33', 1, 0, '', 3996, 'Nguyen Van Thinh', '100 Phú xá', 27, '127309734', 1, 9286, 256),
(2, 34, 'thinh@gmail.com', 1, '2022-05-17 04:09:33', 1, 0, '', 3996, 'Nguyen Van Thinh', '100 Phú xá', 27, '127309734', 1, 9286, 256);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_giohang` int(11) NOT NULL,
  `id_sp` int(11) NOT NULL,
  `tensanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluongspgh` int(11) NOT NULL,
  `id_khachhang` varchar(50) NOT NULL,
  `kichthuoc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `hoten` varchar(50) NOT NULL,
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL,
  `nhaplaimatkhau` varchar(50) NOT NULL,
  `sdt` int(15) NOT NULL,
  `diachi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`hoten`, `tendangnhap`, `matkhau`, `nhaplaimatkhau`, `sdt`, `diachi`) VALUES
('Nguyen van A', 'a@gmail.com', '123456', '123456', 2147483647, 'HCM'),
('Nguyen Van Thinh', 'thinh@gmail.com', '123456', '123456', 127309734, 'HCM'),
('Ho Tan Thuan', 'thuan@gmail.com', '123456', '123456', 399102726, 'HCM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sp` int(15) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `hinhanhsp` varchar(50) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `giakhuyenmaisp` varchar(50) NOT NULL,
  `soluongsp` int(15) NOT NULL,
  `chitietsp` text NOT NULL,
  `id_danhmuc` int(15) NOT NULL,
  `xuatxu` varchar(50) NOT NULL,
  `thuonghieu` int(11) NOT NULL,
  `cauhinh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sp`, `tensanpham`, `hinhanhsp`, `giasanpham`, `giakhuyenmaisp`, `soluongsp`, `chitietsp`, `id_danhmuc`, `xuatxu`, `thuonghieu`, `cauhinh`) VALUES
(29, 'Asus Zenbook Q408UG', '1.png', '10.990.000 ', '8.990.000', 10, 'Vi xử lý (CPU): AMD Ryzen 5 5500U, 6 nhân, 12 luồng\nRAM: 8GB, DDR4X, 4266 MHz\nMàn hình: 14\", 1920 x 1080 px, IPS, 90% sRGB, 60 Hz\nCard đồ họa (GPU): AMD Radeon Graphics, Nvidia MX 450\nPin: 63WHr\nKết nối chính: 2 x Type-C, 1 x USB-A\nTrọng lượng: 1.15 kg\nLưu trữ: SSD 256GB', 82, 'Trung Quốc', 2, 32),
(30, 'Acer Swift 3 14 AMD (Chính hãng) (SF314-43-R4X3)', '2.png', '20.990.000', '20.990.000', 10, 'Vi xử lý (CPU): AMD Ryzen 5 5500U, 6 nhân, 12 luồng\r\nRAM: 16GB, LPDDR4X, 4266 MHz\r\nMàn hình: 14\", 1920x1080 px, IPS, Matte, 60 Hz\r\nCard đồ họa (GPU): AMD Radeon Graphics\r\nLưu trữ: SSD 512GB, HDD 0GB\r\nPin: 48WHr\r\nKết nối chính: 2 x USB-A', 83, 'Viet nam', 7, 33),
(32, 'MSI Modern 14 B11 (1030VN)', '4.png', '13.490.000 ', '12.290.000', 100, 'Vi xử lý (CPU): Intel Intel Core i3-1115G4, 2 nhân, 4 luồng\r\nRAM: 8GB, 3200 MHz\r\nMàn hình: 14\", 1920x1080 px, IPS\r\nCard đồ họa (GPU): Intel® UHD Graphics\r\nLưu trữ: SSD 256GB\r\nPin: 39WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.3 kg', 85, 'Việt Nam', 6, 3),
(33, 'Lenovo Yoga Slim 7i Pro (Chính hãng) (82NH008TVN)', '5.png', '36.990.000 ', '34.490.000', 100, 'Vi xử lý (CPU): Intel Core™ i7-11370H, 4 nhân, 8 luồng\r\nRAM: 16GB, LPDDR4x, 4266 MHz\r\nMàn hình: 14\", 2880x1800 px, OLED, 100% sRGB, 90 Hz\r\nCard đồ họa (GPU): Iris XE, GeForce MX450\r\nLưu trữ: SSD 1024GB\r\nPin: 61WHr\r\nKết nối chính: 2 x Type-C, Thunderbolt\r\nTrọng lượng: 1.38 kg', 85, 'Trung Quốc', 4, 1),
(34, 'Lenovo Legion S7 AMD (Chính hãng) (82K800DPVN)', '6.png', '45.990.000', '45.990.000', 10, 'Vi xử lý (CPU): AMD Ryzen 7 5800H, 8 nhân, 16 luồng\r\nRAM: 16GB, DDR4, 3200 MHz\r\nMàn hình: 15.6\", 1440 px, IPS, 100% sRGB, 165 Hz\r\nCard đồ họa (GPU): Radeon Graphics, GeForce RTX 3060\r\nLưu trữ: SSD 1024GB\r\nPin: 71WHr\r\nKết nối chính: 2 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.9 kg', 85, 'Trung Quốc', 4, 20),
(35, 'Lenovo IdeaPad 5 15 (Chính hãng - Intel gen 11) (82FG01H8VN)', '7.png', '17.990.000 ', '16.790.000', 10, 'Vi xử lý (CPU)\r\nIntel Core i5-1135G7, 4 nhân, 8 luồng\r\nRAM: 8GB, DDR4, 3200 MHz\r\nMàn hình: 15.6\", 1920x1080 px, IPS, 65% sRGB, 60 Hz\r\nCard đồ họa (GPU): Iris XE\r\nLưu trữ: SSD 256GB\r\nPin: 45WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.66 kg', 85, 'Trung Quốc', 4, 14),
(36, 'Asus ROG Strix G15 (G513) - Ryzen 6000 Series (G513RM-HQ055W)', '8.png', '44.990.000 ', '41.490.000', 5, 'Vi xử lý (CPU): AMD Ryzen™ 7 6800H, 8 nhân, 16 luồng\r\nRAM: 16GB, DDR5, 4800 MHz\r\nMàn hình: 15.6\", 2560 x 1440 px, IPS, Chống chói, 100% sRGB, 165 Hz\r\nCard đồ họa (GPU): AMD Radeon™ Graphics, NVIDIA® GeForce RTX™ 3060\r\nLưu trữ: SSD 512GB\r\nPin: 90WHr\r\nKết nối chính: 2 x Type-C, 2 x USB-A, Thunderbolt\r\nTrọng lượng: 2.3 kg', 82, 'Trung Quốc', 2, 22),
(38, 'HP Victus Gaming 16 AMD (Chính hãng) (4R0V0PA)', '9.png', '26.490.000 ', '23.990.000', 10, 'Vi xử lý (CPU): AMD Ryzen 5 5600H, 6 nhân, 12 luồng\r\nRAM: 8GB, DDR4, 3200 MHz\r\nMàn hình: 16.1\", 1080 px, IPS, 144 Hz\r\nCard đồ họa (GPU): Radeon™ Graphics, GeForce RTX 3050Ti\r\nLưu trữ: SSD 512GB\r\nPin: 70WHr\r\nKết nối chính: 1 x Type-C, 3 x USB-A\r\nTrọng lượng: 2.46 kg', 84, 'Viet nam', 3, 28),
(39, 'Huawei MateBook 14 2021', '10.png', '21.990.000 ', '19.990.000', 10, 'Vi xử lý (CPU): Intel Core i5 1135G7, 4 nhân, 8 luồng\r\nRAM: 8GB\r\nMàn hình: 14\", 2160 x 1440, px, IPS, 100% sRGB, 60 Hz\r\nCard đồ họa (GPU): Iris XE\r\nLưu trữ: SSD 512GB\r\nPin: 56WHr\r\nKết nối chính: 1 x Type-C\r\nTrọng lượng: 1.45 kg', 84, 'Việt Nam', 8, 15),
(40, 'Asus Zenbook Flip 13 UX363 OLED (UX363EA-HP726W)', '11.png', '28.290.000 ', '25.290.000', 10, 'Vi xử lý (CPU): Intel Core™ i5-1135G7, 4 nhân, 8 luồng\r\nRAM: 8GB, LPDDR4x, 4266 MHz\r\nMàn hình: 13.3\", 1920 x 1080 px, OLED, 60 Hz\r\nCard đồ họa (GPU): Intel® Iris® Xe Graphics\r\nLưu trữ: SSD 512GB\r\nPin: 67WHr\r\nKết nối chính: 2 x Type-C, 1 x USB-A, Thunderbolt\r\nTrọng lượng: 1.3 kg', 82, 'Viet nam', 2, 14),
(41, 'Lenovo ThinkBook 13s G2 Intel (Chính hãng) (20V900DYVN)', '12.png', '24.650.000 ', '23.650.000', 30, 'Vi xử lý (CPU): Intel Core i5-1135G7, 4 nhân, 8 luồng\r\nRAM: 8GB, LPDDR4x, 4266 MHz\r\nMàn hình: 13.3\", 2560x1600 px, IPS, 100% sRGB\r\nCard đồ họa (GPU): Iris Xe\r\nLưu trữ: SSD 512GB\r\nPin: 56WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A, Thunderbolt\r\nTrọng lượng: 1.26 kg', 85, 'Viet nam', 4, 5),
(43, 'MSI Modern 15 A10MU (Chính hãng) (667VN)', '13.png', '18.990.000 ', '16.790.000', 5, 'Vi xử lý (CPU): Intel Core™ i5 10210U, 4 nhân, 8 luồng\r\nRAM: 8GB, DDR4, 3200 MHz\r\nMàn hình: 15.6\", 1920x1080 px, IPS, 65% sRGB, 60 Hz\r\nCard đồ họa (GPU): Intel UHD Graphics\r\nLưu trữ: SSD 512GB\r\nPin: 52WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.6 kg', 83, 'Việt Nam', 6, 2),
(44, 'ASUS TUF Dash F15 Intel gen 12 (Chính hãng) (FX517ZC-HN079W)', '14.png', '27.990.000 ', '25.990.000', 8, 'Vi xử lý (CPU): Intel Core™ i5-12450H, 8 nhân, 12 luồng\r\nRAM: 8GB, DDR5, 4800 MHz\r\nMàn hình: 15.6\", 1920x1080 px, IPS, Chống chói, 144 Hz\r\nCard đồ họa (GPU): NVIDIA® GeForce RTX™ 3050 Laptop GPU\r\nLưu trữ: SSD 512GB\r\nPin: 76WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A, Thunderbolt\r\nTrọng lượng: 2 kg', 82, 'Trung Quốc', 2, 7),
(45, 'Acer Nitro 5 Tiger Intel Gen 12 (Chính hãng) (AN515-58-52SP)', '15.png', '27.990.000 ', '25.490.000', 7, 'Vi xử lý (CPU): Intel Core™ i5-12500H, 12 nhân, 16 luồng\r\nRAM: 8GB, 3200 MHz\r\nMàn hình: 15.6\", 1920x1080 px, IPS, 144 Hz\r\nCard đồ họa (GPU): GeForce RTX™ 3050 4GB\r\nLưu trữ: SSD 512GB\r\nPin: 57.5WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A, Thunderbolt\r\nTrọng lượng: 2.5 kg', 83, 'Việt Nam', 7, 7),
(46, 'HP ZBook Studio G3', '16.png', '20.990.000 ', '15.990.000', 5, 'Vi xử lý (CPU): Intel Xeon E3 1545M, 4 nhân, 8 luồng\r\nRAM: 16GB, DDR4, 2133 MHz\r\nMàn hình: 15.6\", 1920 x 1080 px, IPS, 60 Hz\r\nCard đồ họa (GPU): Intel UHD Graphics, Nvidia Quadro M1000m\r\nLưu trữ: SSD 512GB\r\nPin: 64WHr\r\nKết nối chính: 2 x Type-C, 2 x USB-A\r\nTrọng lượng: 2 kg', 84, 'Việt Nam', 3, 0),
(47, 'Acer Swift X Intel (Chính hãng) (SFX16-51G-516Q)', '17.png', '28.990.000 ', '26.990.000', 10, 'Vi xử lý (CPU): Intel Core™ i5-11320H, 4 nhân, 8 luồng\r\nRAM: 16GB, 4266 MHz\r\nMàn hình: 16.1\", 1920x1080 px, IPS, 100% sRGB\r\nCard đồ họa (GPU): Iris® Xe Graphics eligible, GeForce RTX™ 3050\r\nLưu trữ: SSD 512GB\r\nPin: 59WHr\r\nKết nối chính: 1 x Type-C, Thunderbolt\r\nTrọng lượng: 1.9 kg', 83, 'Việt Nam', 7, 11),
(48, 'Lenovo IdeaPad 5 Pro 14 AMD (Chính hãng) (82L700M9VN)', '18.png', '21.990.000 ', '21.490.000', 24, 'Vi xử lý (CPU): AMD Ryzen 5 5600U\r\nRAM: 16GB, DDR4, 3200 MHz\r\nMàn hình: 14\", 2880x1800 px, IPS, Chống chói, 100% sRGB, 90 Hz\r\nCard đồ họa (GPU): AMD Radeon Graphics\r\nLưu trữ: SSD 512GB\r\nPin: 56.5WHr\r\nKết nối chính: 2 x Type-C, 2 x USB-A, Thunderbolt', 85, 'Việt Nam', 4, 29),
(49, 'ASUS ROG Flow Z13 (GZ301ZC-LD110W)', '19.png', '49.990.000 ', '47.490.000', 7, 'Vi xử lý (CPU): Intel® Core™ i7-12700H, 14 nhân, 20 luồng\r\nRAM: 16GB, 5200 MHz\r\nMàn hình: 13.4\", 1920 x 1200 px, IPS, Gương, Cảm ứng, 100% sRGB, 120 Hz\r\nCard đồ họa (GPU): Iris XE, NVIDIA® GeForce RTX™ 3050\r\nLưu trữ: SSD 512GB\r\nPin: 56WHr\r\nKết nối chính: 2 x Type-C, 1 x USB-A, Thunderbolt\r\nTrọng lượng: 1.18 kg', 82, 'Trung Quốc', 2, 12),
(50, 'Dell XPS 13 9310', '20.png', '25.990.000', '25.990.000', 9, 'Vi xử lý (CPU): Intel Core i5 1135G7, 4 nhân, 8 luồng\r\nRAM: 8GB, LPDDR4X, 4266 MHz\r\nMàn hình: 13\", 1920 x 1200 px, IPS, Matte, 100% sRGB, 60 Hz\r\nCard đồ họa (GPU): Intel Iris Xe Graphics\r\nLưu trữ: SSD 256GB\r\nPin: 52WHr\r\nKết nối chính: 2 x Type-C, Thunderbolt\r\nTrọng lượng: 1.2 kg', 81, 'Trung Quốc', 1, 14),
(51, 'Lenovo Ideapad 1 (Chính hãng) (81VT006FVN)', '21.png', '10.490.000', '7.990.000', 13, 'Vi xử lý (CPU): Intel Celeron N5030, 4 nhân, 4 luồng\r\nRAM: 4GB, DDR4, 2400 MHz\r\nMàn hình: 11.6\", 1366x768 px, TN, Matte, 60 Hz\r\nCard đồ họa (GPU): Intel UHD Graphics 605\r\nLưu trữ: SSD 256GB\r\nPin: 32WHr\r\nKết nối chính: 2 x USB-A', 85, 'Việt Nam', 4, 0),
(52, 'Acer TravelMate B3 (TMB311-31-P49D)', '22.png', '10.990.000 ', '7.490.000', 2, 'Vi xử lý (CPU): Intel Pentium® Silver N5030, 4 nhân, 4 luồng\r\nRAM: 4GB, DDR4, 2400 MHz\r\nMàn hình: 11.6\", 1366 x 768 px, TN, Matte, 60 Hz\r\nCard đồ họa (GPU): Intel UHD Graphics 605\r\nLưu trữ: SSD 256GB\r\nPin: 48WHr\r\nKết nối chính: 1 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.4 kg', 83, 'Việt Nam', 7, 0),
(53, 'ThinkPad T14s Gen 2 AMD (Chính hãng) (20XF006CVA)', '23.png', '35.990.000', '35.990.000', 0, 'Vi xử lý (CPU): AMD Ryzen 5 PRO 5650U, 6 nhân, 12 luồng\r\nRAM: 16GB, 4266 MHz\r\nMàn hình: 14\", 1920x1080 px, IPS, Chống chói\r\nCard đồ họa (GPU): AMD Radeon Graphics\r\nLưu trữ: SSD 512GB\r\nPin: 65WHr\r\nKết nối chính: 2 x Type-C, 2 x USB-A\r\nTrọng lượng: 1.36 kg', 85, 'Việt Nam', 4, 30),
(54, 'Asus ZenBook 14X OLED AMD (Chính hãng) (UM5401QA-KN209W)', '24.png', '27.990.000', '27.990.000', 10, 'Vi xử lý (CPU): AMD Ryzen 5 5600H, 6 nhân, 12 luồng\r\nRAM: 8GB, LPDDR4X, 4277 MHz\r\nMàn hình: 14\", 2880 x 1800 px, OLED, Cảm ứng, 100% sRGB, 90 Hz\r\nCard đồ họa (GPU): Radeon™ Graphics\r\nLưu trữ: SSD 512GB\r\nPin: 63WHr\r\nKết nối chính: 2 x Type-C, 1 x USB-A\r\nTrọng lượng: 1.4 kg', 82, 'Trung Quốc', 2, 32);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_taikhoanadmin`
--

CREATE TABLE `tbl_taikhoanadmin` (
  `tendangnhap` varchar(50) NOT NULL,
  `matkhau` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_taikhoanadmin`
--

INSERT INTO `tbl_taikhoanadmin` (`tendangnhap`, `matkhau`) VALUES
('admin', 'admin'),
('admin@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_thuonghieu`
--

CREATE TABLE `tbl_thuonghieu` (
  `ID` int(11) NOT NULL,
  `thuonghieu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_thuonghieu`
--

INSERT INTO `tbl_thuonghieu` (`ID`, `thuonghieu`) VALUES
(1, 'DELL'),
(2, 'ASUS'),
(3, 'HP'),
(4, 'LENOVO'),
(5, 'GIGABYE'),
(6, 'MSI'),
(7, 'ACER'),
(8, 'HUAWEI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cauhinh`
--
ALTER TABLE `tbl_cauhinh`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`ma_donhang`),
  ADD KEY `ten_kh` (`ten_kh`),
  ADD KEY `tbl_donhang_ibfk_1` (`id_sanpham`);

--
-- Indexes for table `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`id_giaodich`),
  ADD KEY `id-sanpham` (`id_sanpham`),
  ADD KEY `tbl_giaodich_ibfk_1` (`id_khachhang`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_giohang`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `tbl_giohang_ibfk_1` (`id_khachhang`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_danhmuc` (`id_danhmuc`),
  ADD KEY `tbl_sanpham_ibfk_1` (`thuonghieu`);

--
-- Indexes for table `tbl_taikhoanadmin`
--
ALTER TABLE `tbl_taikhoanadmin`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- Indexes for table `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cauhinh`
--
ALTER TABLE `tbl_cauhinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `ma_donhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `id_giaodich` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_giohang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sp` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD CONSTRAINT `tbl_donhang_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `tbl_sanpham` (`id_sp`);

--
-- Constraints for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD CONSTRAINT `tbl_giohang_ibfk_1` FOREIGN KEY (`id_khachhang`) REFERENCES `tbl_khachhang` (`tendangnhap`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
