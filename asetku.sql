-- -------------------------------------------------------------
-- TablePlus 3.12.0(354)
--
-- https://tableplus.com/
--
-- Database: asetku
-- Generation Time: 2021-01-14 7:30:05.4530 PM
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `aset` (
  `id_aset` varchar(255) NOT NULL,
  `kode_aset` text,
  `nama_aset` text,
  `tanggal_pembelian` date DEFAULT NULL,
  `supplier` text,
  `deskripsi` text,
  `deleted` int DEFAULT NULL,
  `id_kategori` text,
  `status_aset` text,
  `no_urut` int DEFAULT NULL,
  PRIMARY KEY (`id_aset`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `departemen` (
  `id_departemen` varchar(255) NOT NULL,
  `departemen` text,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`id_departemen`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `detail_aset` (
  `id_detail` varchar(255) NOT NULL,
  `id_permintaan` text,
  `tanggal` date DEFAULT NULL,
  `pic_admin` text,
  `id_aset` text,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `kategori` (
  `id_kategori` varchar(255) NOT NULL,
  `kategori` text,
  `deleted` int DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `permintaan` (
  `id_permintaan` varchar(255) NOT NULL,
  `id_user` text,
  `tanggal_permintaan` date DEFAULT NULL,
  `approve` int DEFAULT NULL,
  `status_permintaan` text,
  `deleted` int DEFAULT NULL,
  `id_departemen` text,
  `deskripsi_permintaan` text,
  `no_permintaan` text,
  `no_urut` int DEFAULT NULL,
  `approve_by` text,
  PRIMARY KEY (`id_permintaan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `user` (
  `id_user` varchar(255) NOT NULL,
  `nama_lengkap` text,
  `id_departemen` text,
  `username` text,
  `password` text,
  `role` text,
  `deleted` int DEFAULT NULL,
  `nik` text,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `aset` (`id_aset`, `kode_aset`, `nama_aset`, `tanggal_pembelian`, `supplier`, `deskripsi`, `deleted`, `id_kategori`, `status_aset`, `no_urut`) VALUES
('ast-5fff2651f2338', 'AST13012021001', 'macbook air', '2021-01-01', 'Ibox Indonesia', 'ram 8gb ssd 500gb tahun 2015', '0', 'kt-5ffecf0d69e66', 'used', '1'),
('ast-5fff267910e58', 'AST13012021002', 'LG 32 inch', '2021-01-01', 'Pratama ', 'monitor 32 inchi', '0', 'kt-5ffeced4b44af', 'idle', '2'),
('ast-5fff26a41cce8', 'AST13012021003', 'hikvision 5MP', '2021-01-01', 'Hikvision indonesia', 'kamera cctv 5MP indoor', '0', 'kt-5ffeceb3b6e63', 'used', '3'),
('ast-5fff275179d4b', 'AST13012021004', 'v2K8g6soNS', '2021-01-23', 'rtuSpBi1XU', 'mnbv', '1', 'kt-5ffeceb3b6e63', 'idle', '4'),
('ast-5fffaef97c744', 'AST14012021005', 'CVrHbcJvrl', '2021-01-23', 'cddjiE0fuld3', 'mnbv', '1', 'kt-5ffeced4b44af', 'idle', '5');

INSERT INTO `departemen` (`id_departemen`, `departemen`, `deleted`) VALUES
('dep-asdasmk', 'PPIC', '0'),
('dep-qweqwas', 'Produksi', '0'),
('dept-5ff5c0e1e26a0', 'asdad', '1'),
('dept-5ff5c1c090f1b', 'Accounting', '0'),
('dept-5ff5c1c6c7b90', 'Purchasing', '0'),
('dept-5ffc90dacf922', 'IT', '0'),
('dept-5ffec6ffb097c', 'Marketing', '0'),
('dept-5ffec719601f0', 'Supporting', '0'),
('dept-5ffec72893e53', 'Development', '0'),
('dept-5ffec731607c4', 'QIP', '0'),
('dept-5ffec73a8ff53', 'Werehouse', '0'),
('dept-5ffec7501f5cd', 'Engineering', '0'),
('dept-5ffec763c5b5c', 'HRD', '0');

INSERT INTO `detail_aset` (`id_detail`, `id_permintaan`, `tanggal`, `pic_admin`, `id_aset`) VALUES
('dt-5fff352ddc306', 'req-5fff3446a940e', '2021-01-13', 'ade rahmat nurdiyana', 'ast-5fff2651f2338'),
('dt-5fff36963c482', 'req-5fff3601c7453', '2021-01-13', 'ade rahmat nurdiyana', 'ast-5fff26a41cce8');

INSERT INTO `kategori` (`id_kategori`, `kategori`, `deleted`) VALUES
('kt-5ffc94e6d4a57', 'printer', '1'),
('kt-5ffc94ebe35d1', 'komputer', '1'),
('kt-5ffec5ae755a5', 'Hardisk', '0'),
('kt-5ffeceb3b6e63', 'CCTV', '0'),
('kt-5ffeced4b44af', 'Monitor', '0'),
('kt-5ffecee369bb6', 'PC', '0'),
('kt-5ffecef7ea396', 'Printer', '0'),
('kt-5ffecf0d69e66', 'Komputer', '0');

INSERT INTO `permintaan` (`id_permintaan`, `id_user`, `tanggal_permintaan`, `approve`, `status_permintaan`, `deleted`, `id_departemen`, `deskripsi_permintaan`, `no_permintaan`, `no_urut`, `approve_by`) VALUES
('req-5fff3446a940e', 'user-5ffe2b25c5809', '2021-01-13', '1', 'done', '0', 'dep-asdasmk', 'laptop untuk kebutuhan design produk', 'REQ130121001', '1', 'maman'),
('req-5fff3601c7453', 'user-5ffc8cc362a33', '2021-01-13', '1', 'done', '0', 'dept-5ff5c1c090f1b', 'cctv untuk pemantauan berangkas uang', 'REQ130121002', '2', 'udin bahrudin'),
('req-5fff40e49fa18', 'user-5ffc8cc362a33', '2021-01-13', '0', 'hold', '0', 'dept-5ff5c1c090f1b', 'mnbv', 'REQ130121003', '3', NULL);

INSERT INTO `user` (`id_user`, `nama_lengkap`, `id_departemen`, `username`, `password`, `role`, `deleted`, `nik`) VALUES
('user-5ff5ca7d9e428', 'KXfCRgDenO', 'dept-5ff5c1c090f1b', 'lDAZlvNDEo', 'ff203dfaa9d731d437093c33d5c0c1c3', 'manager it', '1', '345435'),
('user-5ff5ca8f98765', 'udin bahrudin', 'dept-5ff5c1c090f1b', 'udin', '21232f297a57a5a743894a0e4a801fc3', 'manager', '0', '231312'),
('user-5ffc834d008b5', 'R51TsqvjCb', 'dep-qweqwas', 'h5q5x6leG4', '7f3ad9aa45829fc741996c9258cbac9a', 'admin', '1', '67867'),
('user-5ffc89ab3b0f2', 'ade rahmat nurdiyana', 'dept-5ffc90dacf922', 'aderahmatn', '21232f297a57a5a743894a0e4a801fc3', 'admin', '0', '345345'),
('user-5ffc8cc362a33', 'rosalinda', 'dept-5ff5c1c090f1b', 'rosalinda', '21232f297a57a5a743894a0e4a801fc3', 'user', '0', '5756756'),
('user-5ffc914545765', 'asep nurdiansah', 'dept-5ffc90dacf922', 'asepnur', '21232f297a57a5a743894a0e4a801fc3', 'manager it', '0', '123123'),
('user-5ffe2b25c5809', 'leni', 'dep-asdasmk', 'leni', '21232f297a57a5a743894a0e4a801fc3', 'user', '0', '534535'),
('user-5ffe2b3760efd', 'maman', 'dep-asdasmk', 'maman', '21232f297a57a5a743894a0e4a801fc3', 'manager', '0', '2342342'),
('user-5ffec6e8ca38b', 'Winda', 'dept-5ff5c1c6c7b90', 'winda', '21232f297a57a5a743894a0e4a801fc3', 'user', '0', '523524'),
('user-5ffec7d51e03f', 'Ristha', 'dept-5ffec6ffb097c', 'ristha', '21232f297a57a5a743894a0e4a801fc3', 'user', '0', '68768'),
('user-5ffef90abc548', 'R409h8WSmu', 'dept-5ff5c1c6c7b90', 'EUMb9uri0M', 'b0c119173fa612a7028b74c91d86fc0f', 'manager it', '0', '999999');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;