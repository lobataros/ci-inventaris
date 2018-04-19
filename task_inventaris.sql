-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 11, 2018 at 04:10 PM
-- Server version: 5.7.19
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `spesifikasi` varchar(35) NOT NULL,
  `lokasi_barang` varchar(20) NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `jml_barang` int(5) NOT NULL,
  `kondisi` varchar(15) NOT NULL,
  `jenis_barang` varchar(20) NOT NULL,
  `sumber_dana` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`kode_barang`, `nama_barang`, `spesifikasi`, `lokasi_barang`, `kategori`, `jml_barang`, `kondisi`, `jenis_barang`, `sumber_dana`, `status`) VALUES
('BR001', 'Mouse', 'Bagus', 'Rak Mouse', 'Elektronik', 48, 'Layak Pakai', 'Padat', 'Bagus', 1),
('BR002', 'Keyboard', 'Good', 'Rak Elektronik', 'Elektronik', 0, 'Layak Pakai', 'Padat', 'Skul', 1),
('BR003', 'Pensil', 'Panjang', 'Rak buku', 'Non Elektronik', 70, 'Layak Pakai', 'Padat', 'Sekolah', 0),
('BR004', 'Basas', 'asdasd', 'asdasdsad', 'Elektronik', 6, 'Layak Pakai', 'Padat', 'asdkad', 0);

-- --------------------------------------------------------

--
-- Table structure for table `keluar_barang`
--

CREATE TABLE `keluar_barang` (
  `id_barang_keluar` varchar(5) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `penerima` varchar(20) NOT NULL,
  `jml_barang_keluar` int(8) NOT NULL,
  `keperluan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `masuk_barang`
--

CREATE TABLE `masuk_barang` (
  `id_msk_barang` varchar(5) NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `jml_masuk` int(8) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `masuk_barang`
--

INSERT INTO `masuk_barang` (`id_msk_barang`, `kode_barang`, `nama_barang`, `tgl_masuk`, `jml_masuk`, `kode_supplier`) VALUES
('TM001', 'BR001', 'Mouse', '2018-04-11', 5, 'SP001'),
('TM002', 'BR001', 'Mouse', '2018-04-13', 44, 'SP001'),
('TM003', 'BR003', 'Pulpen', '2018-05-11', 70, 'SP001'),
('TM004', 'BR004', 'Basa', '2018-04-11', 12, 'SP001');

-- --------------------------------------------------------

--
-- Table structure for table `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `kode_pinjam` varchar(8) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_pinjam` int(5) NOT NULL,
  `peminjam` varchar(20) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`kode_pinjam`, `tgl_pinjam`, `kode_barang`, `nama_barang`, `jml_pinjam`, `peminjam`, `tgl_kembali`, `keterangan`, `status`) VALUES
('PJ001', '2018-04-11', 'BR001', 'Mouse', 0, 'Dimas', '2018-04-12', 'Good', '1'),
('PJ002', '2018-04-11', 'BR001', 'Mouse', 0, 'GG', '2018-04-29', 'ddd', '1'),
('PJ003', '2018-04-11', 'BR004', 'Basas', 6, 'asdasd', '2018-04-11', 'asdasdasd', '0');

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `kode_barang` varchar(5) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `jml_barang_masuk` int(5) NOT NULL,
  `jml_barang_keluar` int(5) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`kode_barang`, `nama_barang`, `jml_barang_masuk`, `jml_barang_keluar`, `keterangan`) VALUES
('BR001', 'Mouse', 66, 8, 'Good'),
('BR002', 'Keyboard', 0, 0, ''),
('BR004', 'Basa', 12, 6, 'kel');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `kode_supplier` varchar(5) NOT NULL,
  `nama_supplier` varchar(15) NOT NULL,
  `alamat_supplier` varchar(40) NOT NULL,
  `telp_supplier` varchar(15) NOT NULL,
  `kota_supplier` varchar(20) NOT NULL,
  `status` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`kode_supplier`, `nama_supplier`, `alamat_supplier`, `telp_supplier`, `kota_supplier`, `status`) VALUES
('SP001', 'PT ARGAS', 'Jl. Sumatera, Bandung', '0896627795212', 'Bandung Kota', '1'),
('SP002', 'PT NUSA', 'Rancaekek', '089662779527', 'Bandung', '1'),
('SP003', 'Edo', 'Ekek', '089662779526', 'Ekek', '0'),
('SP004', 'S', 'asd', '77', 'asdkjb', '0'),
('SP005', 'tes', 'tess', '099', 'tes', '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(3) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `level`) VALUES
('U02', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
('U03', 'Bidas', 'kamu', '1035d7194945f0505e4c7fe4683b97d8', '0'),
('U04', 'Tesku', 'tes', '6b8850129be12e500df9e77b7cd75eb1', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`kode_barang`);

--
-- Indexes for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD KEY `KodeBarang` (`kode_barang`);

--
-- Indexes for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD PRIMARY KEY (`id_msk_barang`),
  ADD KEY `KodeBarang` (`kode_barang`),
  ADD KEY `KodeSupplier` (`kode_supplier`);

--
-- Indexes for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`kode_pinjam`),
  ADD KEY `KodeBarang` (`kode_barang`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD KEY `KodeBarang` (`kode_barang`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`kode_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `keluar_barang`
--
ALTER TABLE `keluar_barang`
  ADD CONSTRAINT `keluar_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `masuk_barang`
--
ALTER TABLE `masuk_barang`
  ADD CONSTRAINT `masuk_barang_ibfk_1` FOREIGN KEY (`kode_supplier`) REFERENCES `supplier` (`kode_supplier`),
  ADD CONSTRAINT `masuk_barang_ibfk_2` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`kode_barang`) REFERENCES `barang` (`kode_barang`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
