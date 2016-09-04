/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : claim_asuransi

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-09-04 10:39:10
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `asuransi`
-- ----------------------------
DROP TABLE IF EXISTS `asuransi`;
CREATE TABLE `asuransi` (
  `id_asuransi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_asuransi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_asuransi`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of asuransi
-- ----------------------------
INSERT INTO `asuransi` VALUES ('1', 'PT. Asuransi Central Asia');
INSERT INTO `asuransi` VALUES ('2', 'PT. Asuransi Bina Dana Arta');
INSERT INTO `asuransi` VALUES ('3', 'PT. Asuransi Raksa Pratikara');

-- ----------------------------
-- Table structure for `data_claim`
-- ----------------------------
DROP TABLE IF EXISTS `data_claim`;
CREATE TABLE `data_claim` (
  `id_claim` int(11) NOT NULL AUTO_INCREMENT,
  `nama_pemilik` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `id_status` int(11) DEFAULT NULL,
  `asuransi` varchar(100) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_polisi` varchar(15) NOT NULL,
  `merk_mobil` varchar(30) NOT NULL,
  `model_mobil` varchar(15) NOT NULL,
  `warna_mobil` varchar(15) NOT NULL,
  `tahun_mobil` varchar(5) NOT NULL,
  `tgl_claim` date NOT NULL,
  `jam_claim` time NOT NULL,
  `tgl_selesai` date DEFAULT NULL,
  PRIMARY KEY (`id_claim`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of data_claim
-- ----------------------------
INSERT INTO `data_claim` VALUES ('2', 'OWI', '', '2', '2', '081212343445', 'owiahmad90@gmail.com', 'B 4545 POY', 'Honda CITY', 'Sedan', 'Hitam', '2005', '2016-06-12', '13:43:00', '0000-00-00');
INSERT INTO `data_claim` VALUES ('3', 'Edo', '', '6', '2', '081212121212', 'edo@gmail.com', 'B 1234 OCE', 'Honda', 'Sedan', 'Putih', '2012', '2016-06-19', '13:41:49', '0000-00-00');
INSERT INTO `data_claim` VALUES ('4', 'kikiki', 'aasasa', '7', '1', '123456', 'as@sd.sd', 'B 1234 TRQ', 'asa', 'sedan', 'asas', '1212', '2016-07-16', '20:30:51', '2016-09-04');
INSERT INTO `data_claim` VALUES ('5', 'toing', 'jakarta', '6', '1', '0880888888', 'toink90@gmail.com', 'B 7676 ICE', 'Honda', 'Sedan', 'Merah', '1990', '2016-09-04', '10:29:41', null);

-- ----------------------------
-- Table structure for `laporan_pengerjaan`
-- ----------------------------
DROP TABLE IF EXISTS `laporan_pengerjaan`;
CREATE TABLE `laporan_pengerjaan` (
  `id_laporan_pengerjaan` int(11) NOT NULL AUTO_INCREMENT,
  `no_polisi` varchar(10) NOT NULL,
  `las_ketok` float NOT NULL,
  `dempul` float NOT NULL,
  `cat` float NOT NULL,
  `finishing` float NOT NULL,
  `poles` float NOT NULL,
  PRIMARY KEY (`id_laporan_pengerjaan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of laporan_pengerjaan
-- ----------------------------
INSERT INTO `laporan_pengerjaan` VALUES ('1', 'B 1234 TRQ', '3', '2', '2', '3', '2');
INSERT INTO `laporan_pengerjaan` VALUES ('2', 'B 9876 ABC', '3', '3', '2', '2', '1');
INSERT INTO `laporan_pengerjaan` VALUES ('3', 'B 6728 TRQ', '3', '2', '3', '3', '3');

-- ----------------------------
-- Table structure for `status_mobil`
-- ----------------------------
DROP TABLE IF EXISTS `status_mobil`;
CREATE TABLE `status_mobil` (
  `id_statusmobil` int(11) NOT NULL AUTO_INCREMENT,
  `id_asuransi` int(11) NOT NULL,
  `no_polisi` varchar(10) NOT NULL,
  PRIMARY KEY (`id_statusmobil`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status_mobil
-- ----------------------------
INSERT INTO `status_mobil` VALUES ('1', '1', 'B 1234 ABC');
INSERT INTO `status_mobil` VALUES ('2', '3', 'B 9876 POI');

-- ----------------------------
-- Table structure for `status_pengerjaan`
-- ----------------------------
DROP TABLE IF EXISTS `status_pengerjaan`;
CREATE TABLE `status_pengerjaan` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `nama_status` varchar(30) NOT NULL,
  PRIMARY KEY (`id_status`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of status_pengerjaan
-- ----------------------------
INSERT INTO `status_pengerjaan` VALUES ('1', 'Las Ketok');
INSERT INTO `status_pengerjaan` VALUES ('2', 'Dempul');
INSERT INTO `status_pengerjaan` VALUES ('3', 'Cat');
INSERT INTO `status_pengerjaan` VALUES ('4', 'Finishing');
INSERT INTO `status_pengerjaan` VALUES ('5', 'Poles');
INSERT INTO `status_pengerjaan` VALUES ('6', 'Prepare');
INSERT INTO `status_pengerjaan` VALUES ('7', 'Done');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Rizki', 'admin', '21232f297a57a5a743894a0e4a801fc3');
