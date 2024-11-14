-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.13-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             11.1.0.6116
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for web_banhang
CREATE DATABASE IF NOT EXISTS `web_banhang` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `web_banhang`;

-- Dumping structure for table web_banhang.dienthoai
CREATE TABLE IF NOT EXISTS `dienthoai` (
  `dt_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `dt_ten` varchar(50) DEFAULT NULL,
  `dt_manhinh` varchar(50) DEFAULT NULL,
  `dt_hedieuhanh` varchar(50) DEFAULT NULL,
  `dt_camerasau` varchar(255) DEFAULT NULL,
  `dt_cameratruoc` varchar(25) DEFAULT NULL,
  `dt_cpu` varchar(255) DEFAULT NULL,
  `dt_ram` varchar(255) DEFAULT NULL,
  `dt_bonhotrong` varchar(255) DEFAULT NULL,
  `dt_thenho` varchar(255) DEFAULT NULL,
  `dt_sim` varchar(255) DEFAULT NULL,
  `dt_dungluongpin` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`dt_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.dienthoai: ~27 rows (approximately)
/*!40000 ALTER TABLE `dienthoai` DISABLE KEYS */;
INSERT INTO `dienthoai` (`dt_ma`, `dt_ten`, `dt_manhinh`, `dt_hedieuhanh`, `dt_camerasau`, `dt_cameratruoc`, `dt_cpu`, `dt_ram`, `dt_bonhotrong`, `dt_thenho`, `dt_sim`, `dt_dungluongpin`) VALUES
	(1, 'Điện thoại IPhone Xs Max', 'OLED, 6.5", Super Retina', '\r\niOS 13', 'Chính 12 MP & Phụ 12 MP', '7 MP', 'Apple A12 Bionic 6 nhân', '\r\n4 GB', '64 GB', '\r\nMicroSD, hỗ trợ tối đa 256 GB', '\r\n2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '3174 mAh, có sạc nhanh'),
	(2, 'Điện thoại OPPO Reno2 F', 'AMOLED, 6.5", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio P70 8 nhân', '8 GB', '128 GB', '\r\nMicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4000 mAh, có sạc nhanh'),
	(3, 'Điện thoại OPPO Reno3', 'Sunlight Super AMOLED, 6.4", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 13 MP, 8 MP, 2 MP', 'Chính 44 MP & Phụ 2 MP', 'MediaTek Helio P95 8 nhân', '8 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4025 mAh, có sạc nhanh'),
	(4, 'Điện thoại Samsung Galaxy A11', 'Sunlight Super AMOLED, 6.4", Full HD+', '\r\nAndroid 10', 'Chính 64 MP & Phụ 13 MP, 8 MP, 2 MP', 'Chính 44 MP & Phụ 2 MP', 'MediaTek Helio P95 8 nhân', '3 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4000 mAh, có sạc nhanh'),
	(5, 'Điện thoại iPhone 7 Plus 32GB', 'LED-backlit IPS LCD, 5.5", Retina HD', '\r\niOS 13', '\r\nChính 12 MP & Phụ 12 MP', '7 MP', 'Apple A10 Fusion 4 nhân', '3 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '1 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '\r\n2900 mAh'),
	(6, 'Điện thoại Samsung Galaxy A71', 'Super AMOLED, 6.7", Full HD+', '\r\nAndroid 10', '\r\nChính 64 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Snapdragon 730 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4500 mAh, có sạc nhanh'),
	(7, 'Điện thoại Samsung Galaxy A21s', 'TFT LCD, 6.5", HD+', '\r\nAndroid 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '13 MP', 'Exynos 850 8 nhân', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '\r\n2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh, có sạc nhanh'),
	(8, 'Điện thoại Vivo Y50', 'IPS LCD, 6.53", Full HD+', 'Android 10', 'Chính 13 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh'),
	(9, 'Điện thoại iPhone 11 (64GB)', 'IPS LCD, 6.1", Liquid Retina', 'iOS 13', 'Chính 12 MP & Phụ 12 MP', '12 MP', 'Apple A13 Bionic 6 nhân', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '3110 mAh, có sạc nhanh'),
	(10, 'Điện thoại OPPO A92', 'TFT LCD, 6.5", Full HD+', '\r\nAndroid 10', '\r\nChính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 665 8 nhân', '8 GB', '128 GB', '\r\nMicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh, có sạc nhanh'),
	(11, 'Điện thoại Realme 6i', 'IPS LCD, 6.5", HD+', '\r\nAndroid 10', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'MediaTek Helio G80 8 nhân', '4 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh, có sạc nhanh'),
	(12, 'Điện thoại OPPO A52\r\n', '\r\nTFT LCD, 6.5", Full HD+', '\r\nAndroid 10', '\r\nChính 12 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 665 8 nhân', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '\r\n2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh, có sạc nhanh'),
	(13, 'Điện thoại Samsung Galaxy A31', 'Super AMOLED, 6.4", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 8 MP, 5 MP, 5 MP', '20 MP', 'MediaTek MT6768 8 nhân (Helio P65)', '6 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5000 mAh, có sạc nhanh'),
	(14, 'Điện thoại Samsung Galaxy A51', 'Super AMOLED, 6.5", Full HD+', 'Android 10', 'Chính 48 MP & Phụ 12 MP, 5 MP, 5 MP', '32 MP', 'Exynos 9611 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4000 mAh, có sạc nhanh'),
	(15, 'Điện thoại Vsmart Star 4', '\r\nIPS LCD, 6.09", HD+', 'Android 10', 'Chính 8 MP & Phụ 5 MP', '8 MP', '\r\nMediaTek Helio P35 8 nhân', '2 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 64 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '3500 mAh'),
	(16, 'Điện thoại Xiaomi Redmi 9 (4GB/64GB)', 'IPS LCD, 6.53", Full HD+', '\r\nAndroid 10', 'Chính 13 MP & Phụ 8 MP, 5 MP, 2 MP', '\r\n8 MP', '\r\nMediaTek Helio G80 8 nhân', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5020 mAh, có sạc nhanh'),
	(17, 'Điện thoại Realme 5 Pro (8GB/128GB)', 'IPS LCD, 6.3", Full HD+', 'Android 9.0 (Pie)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Snapdragon 712 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4035 mAh, có sạc nhanh'),
	(18, 'Điện thoại Huawei Nova 7i', 'TF LTPS LCD, 6.4", Full HD+', 'EMUI 10 (Android 10 không có Google)', 'Chính 48 MP & Phụ 8 MP, 2 MP, 2 MP', '\r\n16 MP', '\r\nKirin 810 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G', '4200 mAh, có sạc nhanh'),
	(19, 'Điện thoại Realme 6 Pro', 'IPS LCD, 6.6", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 12 MP, 8 MP, 2 MP', 'Chính 16 MP & Phụ 8 MP', 'Snapdragon 720G 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4300 mAh, có sạc nhanh'),
	(20, 'Điện thoại Samsung Galaxy Z Flip 4', 'Chính: Dynamic AMOLED, phụ: Super AMOLED, 6.7", Qu', 'Android 10', 'Chính 12 MP & Phụ 12 MP', '10 MP', 'Snapdragon 855+ 8 nhân', '8 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '1 eSIM & 1 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '3300 mAh, có sạc nhanh'),
	(21, 'Điện thoại Samsung Galaxy Note 10+', 'Dynamic AMOLED, 6.8", Quad HD+ (2K+)', 'Android 9.0 (Pie)', '\r\nChính 12 MP & Phụ 12 MP, 16 MP, TOF 3D', '\r\n10 MP', 'Exynos 9825 8 nhân', '12 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 1 TB', '2 SIM Nano (SIM 2 chung khe thẻ nhớ), Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '4300 mAh, có sạc nhanh'),
	(22, 'Điện thoại OPPO Find X2', '\r\nAMOLED, 6.78", Quad HD+ (2K+)', 'Android 10', 'Chính 48 MP & Phụ 13 MP, 12 MP', '32 MP', 'Snapdragon 865 8 nhân', '12 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '2 Nano SIM, Hỗ trợ 5G HOTSIM VNMB Sieu sim (5GB/ngày)', '4200 mAh, có sạc nhanh'),
	(23, 'Điện thoại Nokia 2.3', '\r\nTFT, 6.2", HD+\r\n', 'Android 10 (Android One)', 'Chính 13 MP & Phụ 2 MP', '5 MP', 'Mediatek MT6761 4 nhân (Helio A22)', '2 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '\r\n2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '\r\n4000 mAh'),
	(24, 'Điện thoại Xiaomi Mi Note 10 Lite', 'AMOLED, 6.47", Full HD+', 'Android 10', 'Chính 64 MP & Phụ 8 MP, 5 MP, 2 MP', '16 MP', 'Snapdragon 730G 8 nhân', '8 GB', '128 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5260 mAh, có sạc nhanh'),
	(25, 'Điện thoại Xiaomi Mi Note 10 Pro', '\r\nAMOLED, 6.47", Full HD+', 'Android 9.0 (Pie)', 'Chính 108 MP & Phụ 20 MP, 12 MP, 5 MP, 2 MP', '\r\n32 MP', 'Snapdragon 730G 8 nhân', '8 GB', '256 GB', 'MicroSD, hỗ trợ tối đa 512 GB', '\r\n2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '5260 mAh, có sạc nhanh'),
	(26, 'Điện thoại Samsung Galaxy S20 Ultra', '\r\nDynamic AMOLED 2X, 6.9", Quad HD+ (2K+)', 'Android 10', 'Dynamic AMOLED 2X, 6.9", Quad HD+ (2K+)', '40 MP', '\r\nExynos 990 8 nhân', '12 GB', '128 GB', '\r\nMicroSD, hỗ trợ tối đa 1 TB', '2 Nano SIM HOẶC 1 Nano SIM + 1 eSIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '\r\n5000 mAh, có sạc nhanh'),
	(27, 'Điện thoại Realme 6', '\r\nIPS LCD, 6.5", Full HD+', '\r\nAndroid 10', '\r\nChính 64 MP & Phụ 8 MP, 2 MP, 2 MP', '16 MP', 'Mediatek Helio G90T 8 nhân', '4 GB', '128 GB', '\r\nMicroSD, hỗ trợ tối đa 256 GB', '\r\n2 Nano SIM, Hỗ trợ 4G HOTSIM VNMB Sieu sim (5GB/ngày)', '\r\n4300 mAh, có sạc nhanh');
/*!40000 ALTER TABLE `dienthoai` ENABLE KEYS */;

-- Dumping structure for table web_banhang.donhang
CREATE TABLE IF NOT EXISTS `donhang` (
  `dh_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kh_tendanhnhap` varchar(255) DEFAULT NULL,
  `kh_ten` varchar(255) DEFAULT NULL,
  `dh_diachi` varchar(255) DEFAULT NULL,
  `sp_ma` int(10) unsigned DEFAULT NULL,
  `dh_soluongmua` int(11) DEFAULT NULL,
  `dh_gia` int(11) DEFAULT NULL,
  `dh_thanhtien` int(11) DEFAULT NULL,
  `dh_ngaylap` datetime DEFAULT NULL,
  PRIMARY KEY (`dh_ma`),
  KEY `sp_ma` (`sp_ma`),
  CONSTRAINT `FK_donhang_sanpham` FOREIGN KEY (`sp_ma`) REFERENCES `sanpham` (`sp_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.donhang: ~3 rows (approximately)
/*!40000 ALTER TABLE `donhang` DISABLE KEYS */;
INSERT INTO `donhang` (`dh_ma`, `kh_tendanhnhap`, `kh_ten`, `dh_diachi`, `sp_ma`, `dh_soluongmua`, `dh_gia`, `dh_thanhtien`, `dh_ngaylap`) VALUES
	(7, 'admin', 'Vesper Nguyễn', '106, Bình Hòa, Bình Thành, Lấp Vò, Đồng Tháp', 37, 1, 8990000, 8990000, '2020-10-27 16:53:01'),
	(8, 'nguyenvanb', 'Nguyễn Văn B', 'Lấp Vò, Đồng Tháp', 18, 1, 2190000, 2190000, '2020-10-28 16:41:26'),
	(9, 'admin', 'Vesper Nguyễn', '106, Bình Hòa, Bình Thành, Lấp Vò, Đồng Tháp', 3, 1, 12490000, 12490000, '2020-11-01 17:46:19');
/*!40000 ALTER TABLE `donhang` ENABLE KEYS */;

-- Dumping structure for table web_banhang.khachhang
CREATE TABLE IF NOT EXISTS `khachhang` (
  `kh_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `kh_ten` varchar(255) NOT NULL,
  `kh_tendangnhap` varchar(255) NOT NULL,
  `kh_matkhau` varchar(255) NOT NULL,
  `kh_gioitinh` bit(1) NOT NULL COMMENT '0: Nam, 1: Nữ',
  `kh_diachi` varchar(255) DEFAULT NULL,
  `kh_sdt` varchar(255) DEFAULT NULL,
  `kh_ngay` int(11) DEFAULT NULL,
  `kh_thang` int(11) DEFAULT NULL,
  `kh_nam` int(11) NOT NULL,
  `kh_avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`kh_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.khachhang: ~3 rows (approximately)
/*!40000 ALTER TABLE `khachhang` DISABLE KEYS */;
INSERT INTO `khachhang` (`kh_ma`, `kh_ten`, `kh_tendangnhap`, `kh_matkhau`, `kh_gioitinh`, `kh_diachi`, `kh_sdt`, `kh_ngay`, `kh_thang`, `kh_nam`, `kh_avatar`) VALUES
	(3, 'Vesper Nguyễn', 'admin', '123456', b'0', '106, Bình Hòa, Bình Thành, Lấp Vò, Đồng Tháp', '0383309663', 4, 1, 1999, '90199395_920470528407843_891366650639548416_o.jpg'),
	(17, 'Nguyễn Văn A', 'nguyenvana', '123456', b'0', '106, Bình Hòa, Bình Thành, Lấp Vò, Đồng Tháp', '0383309664', 4, 1, 1999, NULL),
	(18, 'Nguyễn Văn B', 'nguyenvanb', '123456 ', b'0', 'Lấp Vò, Đồng Tháp', '0383309663', 4, 1, 1999, '20201017074643_tải xuống.jpg');
/*!40000 ALTER TABLE `khachhang` ENABLE KEYS */;

-- Dumping structure for table web_banhang.khuyenmai
CREATE TABLE IF NOT EXISTS `khuyenmai` (
  `km_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `km_ten` varchar(255) DEFAULT NULL,
  `km_noidung` varchar(255) DEFAULT NULL COMMENT '1: Điện Thoại, Tablet\r\n2: Laptop',
  `km_tungay` datetime NOT NULL,
  `km_denngay` datetime NOT NULL,
  `km_qua` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`km_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.khuyenmai: ~3 rows (approximately)
/*!40000 ALTER TABLE `khuyenmai` DISABLE KEYS */;
INSERT INTO `khuyenmai` (`km_ma`, `km_ten`, `km_noidung`, `km_tungay`, `km_denngay`, `km_qua`) VALUES
	(0, 'Không có khuyến mãi', NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
	(1, 'Trung Thu', 'Trung Thu 2020', '2020-07-01 00:00:00', '2020-10-30 00:00:00', 'Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)'),
	(2, 'Trung Thu', 'Trung Thu 2020', '2020-07-01 00:00:00', '2020-10-30 00:00:00', 'Tặng Túi chống sốc Laptop 15.6 inch eValu LMP-T002A');
/*!40000 ALTER TABLE `khuyenmai` ENABLE KEYS */;

-- Dumping structure for table web_banhang.laptop
CREATE TABLE IF NOT EXISTS `laptop` (
  `laptop_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `laptop_ten` varchar(50) DEFAULT NULL,
  `laptop_cpu` varchar(255) DEFAULT NULL,
  `laptop_ram` varchar(255) DEFAULT NULL,
  `laptop_ocung` varchar(255) DEFAULT NULL,
  `laptop_manhinh` varchar(255) DEFAULT NULL,
  `laptop_cardmanhinh` varchar(255) DEFAULT NULL,
  `laptop_congketnoi` varchar(255) DEFAULT NULL,
  `laptop_hedieuhanh` varchar(255) DEFAULT NULL,
  `laptop_thietke` varchar(255) DEFAULT NULL,
  `laptop_kichthuoc` varchar(255) DEFAULT NULL,
  `laptop_ramat` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`laptop_ma`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.laptop: ~15 rows (approximately)
/*!40000 ALTER TABLE `laptop` DISABLE KEYS */;
INSERT INTO `laptop` (`laptop_ma`, `laptop_ten`, `laptop_cpu`, `laptop_ram`, `laptop_ocung`, `laptop_manhinh`, `laptop_cardmanhinh`, `laptop_congketnoi`, `laptop_hedieuhanh`, `laptop_thietke`, `laptop_kichthuoc`, `laptop_ramat`) VALUES
	(1, 'Laptop Lenovo ThinkBook 14IML i3 10110U/4GB/256GB/', 'Intel Core i3 Comet Lake, 10110U, 2.10 GHz', '4 GB, DDR4 (2 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', '\r\nWindows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', '\r\nDày 18 mm, 1.76 kg', '2020'),
	(2, 'Laptop Lenovo IdeaPad Slim 3 15IIL05 i3', '\r\nIntel Core i3 Ice Lake, 1005G1, 1.20 GHz', '4 GB, DDR4 (On board +1 khe), 2666 MHz', 'SSD 512 GB M.2 PCIe, Hỗ trợ khe cắm HDD SATA', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa tích hợp, Intel UHD Graphics', '2 x USB 3.0, HDMI, USB 2.0', 'Windows 10 Home SL', 'Vỏ nhựa, PIN liền', 'Dày 19.9 mm, 1.85 kg', '2019'),
	(3, 'Laptop Asus VivoBook S530FN i5', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (2 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(4, 'Laptop Huawei MateBook D 15 R5 3500U', 'AMD Ryzen 5, 3500U, 2.10 GHz', '8 GB, DDR4 (On board), 2400 MHz', 'SSD 256GB NVMe PCIe, HDD: 1 TB SATA3', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa tích hợp, AMD Radeon Vega 8 Graphics', ' 2 x USB 2.0, HDMI, USB 3.0, USB Type-C', 'Windows 10 Home SL', 'Vỏ kim loại, PIN liền', 'Dày 16.9 mm, 1.62 kg', '2020'),
	(5, 'Laptop Asus VivoBook X409JA i3', '\r\nIntel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (2 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(6, 'Laptop Acer Aspire A515 53 5112 i5', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '\r\n15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '\r\n2 x USB 2.0, USB 3.1, HDMI, USB Type-C', '\r\nWindows 10 Home SL\r\n', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(7, 'Laptop HP 15s du0063TU i5', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '\r\n4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa tích hợp, Intel® UHD Graphics 620', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 19.9 mm, 1.74 kg', '2019'),
	(8, 'Laptop Acer Aspire A514 53G 513J i5', 'Intel Core i5 Ice Lake, 1035G1, 1.00 GHz', '8 GB, DDR4 (On board +1 khe), 2666 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(9, 'Laptop Acer Aspire 3 A315 54K 37B0 i3', '\r\nIntel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(10, 'Laptop Asus VivoBook A412FA i3', '\r\nIntel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(11, 'Laptop Asus VivoBook X509MA', 'Intel Celeron, N4000, 1.10 GHz', '4 GB, DDR4 (1 khe), 2400 MHzs', 'SSD 256GB NVMe PCIe, Hỗ trợ khe cắm HDD SATA', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', '\r\nDày 22.9 mm, 1.8 kg', '2019'),
	(12, 'Laptop Asus VivoBook X509MA N4020', '\r\nIntel Core i5 Coffee Lake, 8265U, 1.60 GHz', '\r\n4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '\r\n15.6 inch, Full HD (1920 x 1080)\r\n', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(13, 'Laptop Acer Aspire A515 53 5112 i5', '\r\nIntel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(14, 'Laptop Dell Inspiron 5593 i5', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018'),
	(15, 'Laptop HP 15s du1039TX i7', 'Intel Core i5 Coffee Lake, 8265U, 1.60 GHz', '4 GB, DDR4 (On board +1 khe), 2400 MHz', 'HDD: 1 TB SATA3, Hỗ trợ khe cắm SSD M.2 PCIe', '15.6 inch, Full HD (1920 x 1080)', 'Card đồ họa rời, NVIDIA Geforce MX150, 2GB', '2 x USB 2.0, USB 3.1, HDMI, USB Type-C', 'Windows 10 Home SL', 'Vỏ nhựa - nắp lưng bằng kim loại, PIN liền', 'Dày 18 mm, 1.76 kg', '2018');
/*!40000 ALTER TABLE `laptop` ENABLE KEYS */;

-- Dumping structure for table web_banhang.loaisanpham
CREATE TABLE IF NOT EXISTS `loaisanpham` (
  `lsp_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lsp_ten` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`lsp_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.loaisanpham: ~3 rows (approximately)
/*!40000 ALTER TABLE `loaisanpham` DISABLE KEYS */;
INSERT INTO `loaisanpham` (`lsp_ma`, `lsp_ten`) VALUES
	(1, 'Điện Thoại'),
	(2, 'Laptop'),
	(3, 'Máy Tính Bảng');
/*!40000 ALTER TABLE `loaisanpham` ENABLE KEYS */;

-- Dumping structure for table web_banhang.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table web_banhang.migrations: ~0 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table web_banhang.nhasanxuat
CREATE TABLE IF NOT EXISTS `nhasanxuat` (
  `nsx_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nsx_ten` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`nsx_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.nhasanxuat: ~15 rows (approximately)
/*!40000 ALTER TABLE `nhasanxuat` DISABLE KEYS */;
INSERT INTO `nhasanxuat` (`nsx_ma`, `nsx_ten`) VALUES
	(1, 'Apple'),
	(2, 'OPPO'),
	(3, 'Samsung'),
	(4, 'Realme'),
	(5, 'Vsmart'),
	(6, 'Xiaomi'),
	(7, 'Lenovo'),
	(8, 'Asus'),
	(9, 'Acer'),
	(10, 'HP'),
	(11, 'Dell'),
	(12, 'Nokia'),
	(13, 'Huawei'),
	(14, 'Vivo'),
	(15, 'Mobell');
/*!40000 ALTER TABLE `nhasanxuat` ENABLE KEYS */;

-- Dumping structure for table web_banhang.sanpham
CREATE TABLE IF NOT EXISTS `sanpham` (
  `sp_ma` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sp_ten` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_gia` decimal(10,0) DEFAULT NULL,
  `sp_giacu` decimal(10,0) DEFAULT NULL,
  `sp_soluong` int(11) DEFAULT NULL,
  `sp_ngaycapnhat` datetime NOT NULL,
  `lsp_ma` int(11) unsigned DEFAULT NULL,
  `nsx_ma` int(11) unsigned DEFAULT NULL,
  `sp_hinh` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sp_hinhchitiet` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `km_ma` int(11) unsigned DEFAULT NULL,
  `sp_slider` bit(1) DEFAULT NULL,
  `sp_sanphamhot` bit(1) DEFAULT NULL,
  `sp_quangcao` bit(1) DEFAULT NULL,
  `sp_noibat` bit(1) DEFAULT NULL,
  `dt_ma` int(11) unsigned DEFAULT NULL,
  `tablet_ma` int(11) unsigned DEFAULT NULL,
  `laptop_ma` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`sp_ma`),
  KEY `lsp_ma` (`lsp_ma`),
  KEY `km_ma` (`km_ma`),
  KEY `dt_ma` (`dt_ma`),
  KEY `tablet_ma` (`tablet_ma`),
  KEY `laptop_ma` (`laptop_ma`),
  KEY `nsx_ma` (`nsx_ma`),
  CONSTRAINT `FK_sanpham_dienthoai` FOREIGN KEY (`dt_ma`) REFERENCES `dienthoai` (`dt_ma`),
  CONSTRAINT `FK_sanpham_khuyenmai` FOREIGN KEY (`km_ma`) REFERENCES `khuyenmai` (`km_ma`),
  CONSTRAINT `FK_sanpham_laptop` FOREIGN KEY (`laptop_ma`) REFERENCES `laptop` (`laptop_ma`),
  CONSTRAINT `FK_sanpham_loaisanpham` FOREIGN KEY (`lsp_ma`) REFERENCES `loaisanpham` (`lsp_ma`),
  CONSTRAINT `FK_sanpham_nhasanxuat` FOREIGN KEY (`nsx_ma`) REFERENCES `nhasanxuat` (`nsx_ma`),
  CONSTRAINT `FK_sanpham_tablet` FOREIGN KEY (`tablet_ma`) REFERENCES `tablet` (`tablet_ma`)
) ENGINE=InnoDB AUTO_INCREMENT=112 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.sanpham: ~54 rows (approximately)
/*!40000 ALTER TABLE `sanpham` DISABLE KEYS */;
INSERT INTO `sanpham` (`sp_ma`, `sp_ten`, `sp_gia`, `sp_giacu`, `sp_soluong`, `sp_ngaycapnhat`, `lsp_ma`, `nsx_ma`, `sp_hinh`, `sp_hinhchitiet`, `km_ma`, `sp_slider`, `sp_sanphamhot`, `sp_quangcao`, `sp_noibat`, `dt_ma`, `tablet_ma`, `laptop_ma`) VALUES
	(1, 'Iphone XS', 23990000, 25900000, 100, '2020-09-24 00:00:00', 1, 1, 'iphonexs.png', 'iphonexs.png', 1, NULL, b'0', NULL, NULL, 1, NULL, NULL),
	(2, 'OPPO Reno2 F', 6990000, 8990000, 100, '2020-09-24 08:47:45', 1, 2, 'oppo-reno2-f.jpg', 'oppo-reno2-f.jpg', 1, NULL, b'0', NULL, NULL, 2, NULL, NULL),
	(3, 'OPPO Reno 3', 12490000, 14990000, 100, '2020-09-24 08:47:45', 1, 2, 'oppo-reno3.jpg', 'oppo-reno3.jpg', 1, NULL, b'0', NULL, NULL, 3, NULL, NULL),
	(4, 'Samsung Galaxy A11', 3990000, 4990000, 100, '2020-09-24 08:50:27', 1, 3, 'samsung-galaxy-a11-055320-045346-400x460.png', 'samsung-galaxy-a11-055320-045346-400x460.png', 1, NULL, b'0', NULL, NULL, 4, NULL, NULL),
	(5, 'Iphone 7', 8990000, 12990000, 100, '2020-09-24 08:50:27', 1, 1, 'iphone-7-plus-32gb-gold.pg.jpg', 'iphone-7-plus-32gb-gold.pg.jpg', 1, NULL, b'0', NULL, NULL, 5, NULL, NULL),
	(6, 'Samsung Galaxy A71', 14490000, 15900000, 100, '2020-09-24 08:50:27', 1, 3, 'samsung-galaxy-a71-blue.jpg', 'samsung-galaxy-a71-blue.jpg', 1, NULL, b'0', NULL, NULL, 6, NULL, NULL),
	(7, 'Máy tính bảng iPad 10.2 inch', 14990000, 15990000, 100, '2020-09-24 08:50:32', 3, 1, 'ipad-10-2-inch-wifi-cellular-128gb-2019-gray.jpg', 'ipad-10-2-inch-wifi-cellular-128gb-2019-gray.jpg', 1, NULL, b'0', NULL, NULL, 7, 1, NULL),
	(8, 'Samsung Galaxy A21s', 5990000, 6990000, 100, '2020-09-24 08:59:32', 1, 3, 'samsung-galaxy-a21s.jpg', 'samsung-galaxy-a21s.jpg', 1, NULL, b'0', NULL, NULL, 7, NULL, NULL),
	(9, 'Vivo', 5990000, 6499000, 100, '2020-09-24 09:02:35', 1, 14, 'vivo-y50-tim.jpg', 'vivo-y50-tim.jpg', 1, NULL, b'0', NULL, NULL, 8, NULL, NULL),
	(10, 'Laptop Lenovo ThinkBook 14IML', 13990000, NULL, 100, '2020-09-24 09:02:35', 2, 7, 'lenovo-thinkbook-14iml-i3-20rv00b7vn.jpg', 'lenovo-thinkbook-14iml-i3-20rv00b7vn.jpg', 2, NULL, b'0', NULL, NULL, NULL, NULL, 1),
	(11, 'Máy tính bảng Lenovo Tab E10 TB-X104L Đen', 3699000, 3999000, 100, '2020-09-24 09:04:36', 3, 7, 'lenovo-tab-e10-tb-x104l-den-1-400x400.jpg', 'lenovo-tab-e10-tb-x104l-den-1-400x400.jpg', 1, NULL, b'0', NULL, NULL, NULL, 2, NULL),
	(12, 'Iphone 11', 20990000, 21990000, 100, '2020-09-24 10:08:40', 1, 1, 'iphone-11.jpg', 'iphone-11.jpg', 1, NULL, NULL, NULL, b'0', 9, NULL, NULL),
	(13, 'OPPO A92', 6490000, 6990000, 100, '2020-09-24 10:08:40', 1, 2, 'oppo a92.jpg', 'oppo a92.jpg', 1, NULL, NULL, NULL, b'0', 10, NULL, NULL),
	(14, 'Realme 6i', 4990000, NULL, 100, '2020-09-24 10:08:40', 1, 4, 'realme-6i.jpg', 'realme-6i.jpg', 1, NULL, NULL, NULL, b'0', 11, NULL, NULL),
	(15, 'OPPO A52', 4990000, 5990000, 100, '2020-09-24 10:08:40', 1, 2, 'oppo-a52-black-400-400x460.png', 'oppo-a52-black-400-400x460.png', 1, NULL, NULL, NULL, b'0', 12, NULL, NULL),
	(16, 'Samsung Galaxy A31', 5990000, 6490000, 100, '2020-09-24 10:08:40', 1, 3, 'samsung-galaxy-a31-400x460-white-400x460.png', 'samsung-galaxy-a31-400x460-white-400x460.png', 1, NULL, NULL, NULL, b'0', 13, NULL, NULL),
	(17, 'Samsung Galaxy A51', 6900000, 7900000, 100, '2020-09-24 10:08:43', 1, 3, 'samsung-galaxy-a51-8gb-blue-400x460-1-400x460.png', 'samsung-galaxy-a51-8gb-blue-400x460-1-400x460.png', 1, NULL, NULL, NULL, b'0', 14, NULL, NULL),
	(18, 'Vsmart Star 4', 2190000, NULL, 100, '2020-09-24 10:23:44', 1, 5, 'vsmart-star-4-den.jpg', 'vsmart-star-4-den.jpg', 1, NULL, NULL, NULL, b'0', 15, NULL, NULL),
	(19, 'Xiaomi Redmi 9', 3990000, NULL, 100, '2020-09-24 10:23:44', 1, 6, 'xiaomi-redmi-9.jpg', 'xiaomi-redmi-9.jpg', 1, NULL, NULL, NULL, b'0', 16, NULL, NULL),
	(20, 'Readme 5 Pro', 6990000, NULL, 100, '2020-09-24 10:34:15', 1, 6, 'realme-5-pro-8gb-green-400x400.jpg', 'realme-5-pro-8gb-green-400x400.jpg', 1, NULL, NULL, NULL, NULL, 17, NULL, NULL),
	(21, 'Huawei Nova 7i', 6990000, 7990000, 100, '2020-09-24 10:34:15', 1, 13, 'huawei-nova-7i-pink-600x600-400x400.jpg', 'huawei-nova-7i-pink-600x600-400x400.jpg', 1, NULL, NULL, NULL, NULL, 18, NULL, NULL),
	(22, 'Realme 6 Pro', 7990000, NULL, 100, '2020-09-24 10:34:15', 1, 4, 'realme-6-pro-600x600-2-400x400.jpg', 'realme-6-pro-600x600-2-400x400.jpg', 1, NULL, NULL, NULL, NULL, 19, NULL, NULL),
	(23, 'Samsung Galaxy Z Flip 4', 36000000, NULL, 100, '2020-09-24 10:38:39', 1, 3, 'samsung-galaxy-z-flip-den-600x600-400x400.jpg', 'samsung-galaxy-z-flip-den-600x600-400x400.jpg', 1, NULL, NULL, NULL, NULL, 20, NULL, NULL),
	(24, 'Samsung Galaxy Note 10+', 19900000, 22990000, 100, '2020-09-24 10:39:50', 1, 3, 'samsung-galaxy-note-10-plus-blue-400x400.jpg', 'samsung-galaxy-note-10-plus-blue-400x400.jpg', 1, NULL, NULL, NULL, NULL, 21, NULL, NULL),
	(25, 'OPPO Find X2', 21990000, 23900000, 100, '2020-09-24 10:39:50', 1, 2, 'oppo-find-x2-blue-600x600-400x400.jpg', 'oppo-find-x2-blue-600x600-400x400.jpg', 1, NULL, NULL, NULL, NULL, 22, NULL, NULL),
	(26, ' Nokia 2.3', 1990000, NULL, 100, '2020-09-24 10:42:22', 1, 12, 'nokia-23-gray-400x400.jpg', 'nokia-23-gray-400x400.jpg', 1, NULL, NULL, NULL, NULL, 23, NULL, NULL),
	(27, 'Xiaomi Mi Note 10 Lite', 9490000, 9990000, 100, '2020-09-24 10:43:21', 1, 6, 'xiaomi-mi-note-10-lite-trang-600x600-400x400.jpg', 'xiaomi-mi-note-10-lite-trang-600x600-400x400.jpg', 1, NULL, NULL, NULL, NULL, 24, NULL, NULL),
	(28, 'Xiaomi Mi Note 10 Pro', 13990000, 14990000, 100, '2020-09-24 10:44:40', 1, 6, 'xiaomi-mi-note-10-pro-black-400x400.jpg', 'xiaomi-mi-note-10-pro-black-400x400.jpg', 1, NULL, NULL, NULL, NULL, 25, NULL, NULL),
	(29, 'Laptop Lenovo IdeaPad Slim 3 15IIL05 i3', 12990000, NULL, 100, '2020-09-24 19:49:20', 2, 7, 'lenovo-ideapad-3-15iil05-i3-81we003rvn-223534-2-600x600.jpg', 'lenovo-ideapad-3-15iil05-i3-81we003rvn-223534-2-600x600.jpg', 1, NULL, NULL, NULL, NULL, NULL, NULL, 2),
	(30, 'Laptop Asus VivoBook S530FN i5', 16000000, 18000000, 100, '2020-09-24 19:55:36', 2, 8, 'asus-s530fn-i5-8265u.jpg', 'asus-s530fn-i5-8265u.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 3),
	(31, 'Laptop Acer Aspire A515 53 5112 i5', 11900000, 14990000, 100, '2020-09-24 19:57:56', 2, 9, 'acer-aspire-a515-53-5112-i5-8265u.jpg', 'acer-aspire-a515-53-5112-i5-8265u.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 6),
	(32, 'Laptop HP 15s du0063TU i5', 11700000, 16900000, 100, '2020-09-24 19:57:56', 2, 10, 'hp-15s-du0063tu-i5-8265u.jpg', 'hp-15s-du0063tu-i5-8265u.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 7),
	(33, 'Laptop Acer Aspire A514 53G 513J i5', 18490000, NULL, 100, '2020-09-24 20:01:09', 2, 9, 'acer-aspire-a514-53g-513j-i5-nxhywsv001-223658-600x600.jpg', 'acer-aspire-a514-53g-513j-i5-nxhywsv001-223658-600x600.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 8),
	(34, 'Laptop Acer Aspire 3 A315 54K 37B0 i3', 10990000, NULL, 100, '2020-09-24 20:02:57', 2, 9, 'acer-aspire-3-a315-nx-heesv-00d-221251-1-400x400.jpg', 'acer-aspire-3-a315-nx-heesv-00d-221251-1-400x400.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 9),
	(35, 'Laptop Asus VivoBook A412FA i3', 12490000, NULL, 100, '2020-09-24 20:04:22', 2, 8, 'asus-vivobook-s412f-i3-8145u-4gb-512gb-ek342t-203670-600x600.jpg', 'asus-vivobook-s412f-i3-8145u-4gb-512gb-ek342t-203670-600x600.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 10),
	(36, 'Laptop Asus VivoBook X509MA', 6990000, NULL, 100, '2020-09-24 20:07:05', 2, 8, 'asus-vivobook-x509ma-br061t-220527-1-400x400.jpg', 'asus-vivobook-x509ma-br061t-220527-1-400x400.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 11),
	(37, 'Laptop Asus VivoBook X509MA N4020', 8990000, NULL, 100, '2020-09-24 20:07:05', 2, 8, 'asus-vivobook-x509ma-n4020-br271t-224411-400x400.jpg', 'asus-vivobook-x509ma-n4020-br271t-224411-400x400.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 12),
	(38, 'Laptop Asus VivoBook X409JA i3', 11900000, NULL, 100, '2020-09-24 20:13:40', 2, 8, 'asus-x409ja-i3-ek015t-220526-2-400x400.jpg', 'asus-x409ja-i3-ek015t-220526-2-400x400.jpg', 2, NULL, NULL, NULL, b'0', NULL, NULL, 5),
	(39, 'Laptop Dell Inspiron 5593 i5', 7990000, NULL, 100, '2020-09-24 20:16:48', 2, 11, 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-213570-600x600.jpg', 'dell-inspiron-5593-i5-1035g1-8gb-256gb-2gb-mx230-w-213570-600x600.jpg', 2, NULL, NULL, NULL, NULL, NULL, NULL, 14),
	(40, 'Laptop HP 15s du1039TX i7', 18900000, NULL, 100, '2020-09-24 20:18:25', 2, 10, 'hp-15s-du1039tx-i7-10510u-8gb-512gb-2gb-mx130-win1-217270-1-600x600.jpg', 'hp-15s-du1039tx-i7-10510u-8gb-512gb-2gb-mx130-win1-217270-1-600x600.jpg', 2, NULL, NULL, NULL, NULL, NULL, NULL, 15),
	(41, 'Máy tính bảng Samsung Galaxy Tab S6 Lite', 9990000, NULL, 100, '2020-09-24 20:30:20', 3, 3, 'samsung-galaxy-tab-s6-400x400.jpg', 'samsung-galaxy-tab-s6-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 3, NULL),
	(42, 'Máy tính bảng iPad 10.2 inch Wifi 32GB (2019)', 9490000, NULL, 100, '2020-09-24 20:32:48', 3, 1, 'ipad-10-2-inch-wifi-32gb-2019-gold-400x400.jpg', 'ipad-10-2-inch-wifi-32gb-2019-gold-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 4, NULL),
	(43, 'Máy tính bảng Samsung Galaxy Tab A8 8" T295 (2019)\r\n', 3690000, NULL, 100, '2020-09-24 20:38:03', 3, 3, 'samsung-galaxy-tab-a8-t295-2019-silver-400x460.png', 'samsung-galaxy-tab-a8-t295-2019-silver-400x460.png', 1, NULL, NULL, NULL, b'0', NULL, 5, NULL),
	(44, 'Máy tính bảng Huawei Mediapad T5 10.1 inch (3GB/32GB)', 4900000, NULL, 100, '2020-09-24 20:39:44', 3, 13, 'huawei-mediapad-t5-16gb-600x600-2-400x400.jpg', 'huawei-mediapad-t5-16gb-600x600-2-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 6, NULL),
	(45, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 27900000, 29990000, 100, '2020-09-24 20:41:57', 3, 1, 'ipad-pro-12-9-inch-wifi-128gb-2020-xam-600x600-1-200x200.jpg', 'ipad-pro-12-9-inch-wifi-128gb-2020-xam-600x600-1-200x200.jpg', 1, NULL, NULL, NULL, b'0', NULL, 7, NULL),
	(46, 'Máy tính bảng Masstel Tab 10 Pro', 2590000, NULL, 100, '2020-09-24 20:42:52', 3, 15, 'masstel-tab10-pro-gold-2-400x400.jpg', 'masstel-tab10-pro-gold-2-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 8, NULL),
	(47, 'Máy tính bảng Masstel Tab8 Pro', 1990000, NULL, 100, '2020-09-24 20:43:55', 3, 15, 'masstel-tab8-pro-gold-1-400x400.jpg', 'masstel-tab8-pro-gold-1-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 9, NULL),
	(48, 'Máy tính bảng Mobell Tab 10', 2390000, NULL, 100, '2020-09-24 20:45:27', 3, 15, 'mobell-tab-10-33397-1-thumb1-400x400.jpg', 'mobell-tab-10-33397-1-thumb1-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 10, NULL),
	(49, 'Máy tính bảng Samsung Galaxy Tab S6', 18400000, NULL, 100, '2020-09-24 20:46:44', 3, 3, 'samsung-galaxy-tab-s6-400x400.jpg', 'samsung-galaxy-tab-s6-400x400.jpg', 1, NULL, NULL, NULL, b'0', NULL, 11, NULL),
	(50, 'Máy tính bảng iPad Mini 7.9 inch Wifi 64GB (2019)', 10499000, NULL, 100, '2020-09-24 20:48:23', 3, 1, 'ipad-mini-79-inch-wifi-2019-gold-400x400.jpg', 'ipad-mini-79-inch-wifi-2019-gold-400x400.jpg', 1, NULL, NULL, NULL, NULL, NULL, 12, NULL),
	(51, 'Điện thoại Samsung Galaxy S20 Ultra', 24990000, 29990000, 100, '2020-09-24 20:58:06', 1, 3, 'slider-1.png', 'samsung-galaxy-s20-ultra-600x600-1-400x400.jpg', 1, b'0', NULL, NULL, NULL, 26, NULL, NULL),
	(52, 'Điện thoại OPPO A52', 4990000, NULL, 100, '2020-09-24 20:58:06', 1, 2, 'slider-2.png', 'oppo-a52-black-400-400x460.png', 1, b'0', NULL, NULL, NULL, 12, NULL, NULL),
	(53, 'Điện thoại Realme 6', 25990000, NULL, 100, '2020-09-24 21:01:48', 1, 4, 'slider-3.png', 'realme-6-xanh-400x460-1-400x460-1-400x460.png', 1, b'0', NULL, NULL, NULL, 27, NULL, NULL),
	(54, 'Laptop Huawei MateBook D 15 R5 3500U', 15990000, NULL, 100, '2020-09-24 21:13:15', 2, 13, 'huawei-quangcao.gif', 'huawei-matebook-d15-r5-3500u-224257-600x600-1-400x400-1-600x600.jpg', 2, NULL, NULL, b'1', NULL, NULL, NULL, 4);
/*!40000 ALTER TABLE `sanpham` ENABLE KEYS */;

-- Dumping structure for table web_banhang.tablet
CREATE TABLE IF NOT EXISTS `tablet` (
  `tablet_ma` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `tablet_ten` varchar(255) DEFAULT NULL,
  `tablet_manhinh` varchar(255) DEFAULT NULL,
  `tablet_hedieuhanh` varchar(255) DEFAULT NULL,
  `tablet_cpu` varchar(255) DEFAULT NULL,
  `tablet_ram` varchar(255) DEFAULT NULL,
  `tablet_bonhotrong` varchar(255) DEFAULT NULL,
  `tablet_camerasau` varchar(255) DEFAULT NULL,
  `tablet_cameratruoc` varchar(255) DEFAULT NULL,
  `tablet_ketnoimang` varchar(255) DEFAULT NULL,
  `tablet_damthoai` varchar(255) DEFAULT NULL,
  `tablet_trongluong` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`tablet_ma`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table web_banhang.tablet: ~12 rows (approximately)
/*!40000 ALTER TABLE `tablet` DISABLE KEYS */;
INSERT INTO `tablet` (`tablet_ma`, `tablet_ten`, `tablet_manhinh`, `tablet_hedieuhanh`, `tablet_cpu`, `tablet_ram`, `tablet_bonhotrong`, `tablet_camerasau`, `tablet_cameratruoc`, `tablet_ketnoimang`, `tablet_damthoai`, `tablet_trongluong`) VALUES
	(1, 'iPad 10.2 inch Wifi Cellular 128GB', 'LED backlit LCD, 10.2"', 'iPadOS 13', 'Apple A10 Fusion 4 nhân, 2.34 GHz', '3 GB', '128 GB', '8 MP', '1.2 MP', 'WiFi, 3G, 4G LTE', 'FaceTime', '480 g'),
	(2, 'Máy tính bảng Lenovo Tab E10 TB-X104L Đen', 'IPS LCD, 10.1"', 'Android 8.0', 'Snapdragon 210 4 nhân, 1.33 GHz', '2 GB', '16 GB', '5 MP', '2 MP', 'WiFi, 3G, 4G LTE', 'Không', '522 g'),
	(3, 'Máy tính bảng Samsung Galaxy Tab S6 Lite', 'LED backlit LCD, 10.2"', 'Android 10', '\r\nExynos 9611 8 nhân, 4 nhân 2.3 GHz & 4 nhân 1.7 GHz', '4 GB', '64 GB', '8 MP', '5 MP', 'WiFi, 3G, 4G LTE', 'Có', '500 g'),
	(4, 'Máy tính bảng iPad 10.2 inch Wifi 32GB (2019)', 'LED backlit LCD, 10.2"', 'iPadOS 13', 'Apple A10 Fusion 4 nhân, 2.34 GHz', '3 GB', '32 GB', '8 MP', '1.2 MP', 'WiFi, 3G, 4G LTE', 'FaceTime', '500 g'),
	(5, 'Máy tính bảng Samsung Galaxy Tab A8 8" T295 (2019)', 'TFT LCD, 8"', 'Android 9.0 (Pie)', 'Snapdragon 429, 4 nhân 2.0 GHz', '2 GB', '32 GB', '8 MP', '5 MP', 'WiFi, Không hỗ trợ 3G, Không hỗ trợ 4G', 'Có', '400 g'),
	(6, 'Máy tính bảng Huawei Mediapad T5 10.1 inch (3GB/32GB)', 'IPS LCD Full HD, 10.1"', 'Android 8.0', 'Kirin 659, 4 nhân 2.36 GHz & 4 nhân 1.7 GHz', '3 GB', '64 GB', '5 MP', '2 MP', 'WiFi, 3G, 4G LTE', 'Có', '450 g'),
	(7, 'Máy tính bảng iPad Pro 12.9 inch Wifi 128GB (2020)', 'Liquid Retina, 12.9"', 'iPadOS 13', 'Apple A12Z Bionic, 4 nhân 2.5 GHz & 4 nhân 1.6 GHz', '6 GB', '128 GB', 'Chính 12 MP & Phụ 10 MP, TOF 3D LiDAR', '7 MP', 'WiFi, Không hỗ trợ 3G, Không hỗ trợ 4G', 'FaceTime', '471 g'),
	(8, 'Máy tính bảng Masstel Tab 10 Pro', '\r\nLED backlit LCD, 10.2"', 'Android 8.0', 'Snapdragon 210 4 nhân, 1.33 GHz', '2 GB', '64 GB', '5 MP', '2 MP', 'WiFi, 3G, 4G LTE', 'Không', '460 g'),
	(9, 'Máy tính bảng Masstel Tab8 Pro', '\r\nLED backlit LCD, 10.2"', 'Android 9.0', 'Snapdragon 210 4 nhân, 1.33 GHz', '4 GB', '128 GB ', '8 MP', '2 MP', 'WiFi, 3G, 4G LTE', 'Có', '450 g'),
	(10, 'Máy tính bảng Mobell Tab 10', 'IPS LCD, 10.1"', 'Android 9.0', 'Snapdragon 210 4 nhân, 1.33 GHz', '4 GB', '64 GB', '8 MP', '3 MP', 'WiFi, 3G, 4G LTE', 'Có', '450 g'),
	(11, 'Máy tính bảng Samsung Galaxy Tab S6', 'LED backlit LCD, 10.2"', 'Android 9.0', 'Snapdragon 210 4 nhân, 1.33 GHz', '6 GB', '128 GB', '5 MP', '2 MP', 'WiFi, Không hỗ trợ 3G, Không hỗ trợ 4G', 'Có', '500 g'),
	(12, 'iPad Mini 7.9 inch Wifi 64GB (2019)', 'LED backlit LCD, 10.2"', 'iPadOS 13', '\r\nApple A10 Fusion 4 nhân, 2.34 GHz', '3 GB', '32 GB', '3 MP', '1.2 MP', 'WiFi, Không hỗ trợ 3G, Không hỗ trợ 4G', 'FaceTime', '480 g');
/*!40000 ALTER TABLE `tablet` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
