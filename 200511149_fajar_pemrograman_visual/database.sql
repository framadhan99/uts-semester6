CREATE DATABASE `chandra_200511151` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;

-- --------------------------------------------------------
CREATE TABLE `product`
(
  `id_barang` int
(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar
(100) DEFAULT NULL,
  `merk` varchar
(100) DEFAULT NULL,
  `warna` varchar
(100) DEFAULT NULL,
  `ukuran` char
(10) DEFAULT NULL,
  PRIMARY KEY
(`id_barang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
