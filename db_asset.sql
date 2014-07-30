/*
Navicat MySQL Data Transfer

Source Server         : Januar Fonti
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : db_asset

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2014-07-30 17:03:16
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'kelola_asset', 'Kelola Asset');
INSERT INTO `groups` VALUES ('3', 'laporan', 'Laporan');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_asset
-- ----------------------------
DROP TABLE IF EXISTS `tbl_asset`;
CREATE TABLE `tbl_asset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_asset` varchar(50) DEFAULT NULL,
  `nama_asset` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tanggal_masuk` date DEFAULT NULL,
  `tanggal_usia` date DEFAULT NULL,
  `id_kantor` int(11) DEFAULT NULL,
  `id_ruangan` int(11) DEFAULT NULL,
  `status_milik` varchar(50) DEFAULT NULL,
  `kondisi` varchar(50) DEFAULT NULL,
  `gambar` text,
  `jenis_mutasi` varchar(255) DEFAULT NULL,
  `tanggal_mutasi` date DEFAULT NULL,
  `status_mutasi` varchar(10) DEFAULT NULL,
  `pemusnahan` varchar(255) DEFAULT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `status_pemusnahan` varchar(10) DEFAULT NULL,
  `user_tambahasset` varchar(50) DEFAULT NULL,
  `user_mutasiasset` varchar(50) DEFAULT NULL,
  `user_pemusnahan` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_asset
-- ----------------------------
INSERT INTO `tbl_asset` VALUES ('1', 'AS01', 'LCD Monitor Acer', '1', '2014-07-30', '2014-07-31', '1', '1', 'Datel', 'Rusak', '1.jpg', 'Wonge bosen', '2014-07-23', 'mutasi', null, null, 'ada', 'Januari Fonti', 'Januari Fonti', null);
INSERT INTO `tbl_asset` VALUES ('2', 'AS02', 'Printer', '1', '2014-07-30', '2014-07-29', '2', '3', 'Datel', 'Baru', '20140418_144332_1969_januarfonti.png', null, null, null, null, null, 'ada', 'Januari Fonti', null, null);

-- ----------------------------
-- Table structure for tbl_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_jabatan`;
CREATE TABLE `tbl_jabatan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_jabatan` varchar(50) DEFAULT NULL,
  `nama_jabatan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_jabatan
-- ----------------------------
INSERT INTO `tbl_jabatan` VALUES ('1', 'J001', 'Kepala Kandatel Kota Blitar');

-- ----------------------------
-- Table structure for tbl_kantor
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kantor`;
CREATE TABLE `tbl_kantor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kantor` varchar(50) NOT NULL,
  `nama_kantor` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kantor
-- ----------------------------
INSERT INTO `tbl_kantor` VALUES ('1', 'TK01', 'Kantor Wilayah Malang', 'Jl. Bunga Srirejeki No 1 Malang', 'dapelmalang@yahoo.com');
INSERT INTO `tbl_kantor` VALUES ('2', 'TK02', 'Kantor Wilayah Alaska', 'Alaska Number 1', 'alaska@yahoo.com');

-- ----------------------------
-- Table structure for tbl_kategori
-- ----------------------------
DROP TABLE IF EXISTS `tbl_kategori`;
CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(50) DEFAULT NULL,
  `nama_kategori` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_kategori
-- ----------------------------
INSERT INTO `tbl_kategori` VALUES ('1', 'KT01', 'Elektronika');

-- ----------------------------
-- Table structure for tbl_ruangan
-- ----------------------------
DROP TABLE IF EXISTS `tbl_ruangan`;
CREATE TABLE `tbl_ruangan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_ruangan` varchar(50) DEFAULT NULL,
  `nama_ruangan` varchar(255) DEFAULT NULL,
  `id_kantor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk.id_kantor` (`id_kantor`),
  CONSTRAINT `fk.id_kantor` FOREIGN KEY (`id_kantor`) REFERENCES `tbl_kantor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tbl_ruangan
-- ----------------------------
INSERT INTO `tbl_ruangan` VALUES ('1', 'RG01', 'Ruang Sekretariat', '1');
INSERT INTO `tbl_ruangan` VALUES ('2', 'RG02', 'Ruang Bos', '1');
INSERT INTO `tbl_ruangan` VALUES ('3', 'RG03', 'Ruang Pembantu', '2');
INSERT INTO `tbl_ruangan` VALUES ('4', 'RG04', 'Ruang Office Boy', '2');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `nik` varchar(20) DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `jenis_kelamin` varchar(10) DEFAULT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('8', '127.0.0.1', 'januarfonti', 'HsnvalaIYHtz4Lpl4AIkC.ac5937b464ccd58f71', null, 'januarfonti@yahoo.co.id', null, null, null, 'zJ3evKnJcjZQ2s8Oq2vyYu', '1405924359', '1406702960', '1', '103140914111033', 'Januari', 'Fonti', 'Pria', '1', 'Jl. Bunga Srirejeki No 1 Malang', '083834714482');
INSERT INTO `users` VALUES ('9', '192.168.1.2', 'rahmananam', 'JgmIXYVf4kKDSbQwTvqpqua85f155608989c3555', null, 'rahmananam@yahoo.com', null, null, null, 'JC4kDO9mEGpl30mSIHbJkO', '1406024800', '1406540172', '1', '12345', 'Rahman', 'Anam', 'Pria', '1', 'Blitar', '083834714482');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('70', '8', '1');
INSERT INTO `users_groups` VALUES ('74', '9', '2');

-- ----------------------------
-- View structure for view_asset
-- ----------------------------
DROP VIEW IF EXISTS `view_asset`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_asset` AS SELECT
tbl_asset.id,
tbl_asset.kode_asset,
tbl_asset.nama_asset,
tbl_kategori.nama_kategori,
tbl_asset.tanggal_masuk,
tbl_asset.tanggal_usia,
tbl_kantor.nama_kantor,
tbl_ruangan.nama_ruangan,
tbl_asset.status_milik,
tbl_asset.kondisi,
tbl_asset.gambar
FROM
tbl_asset
INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_asset.id_kantor
INNER JOIN tbl_ruangan ON tbl_ruangan.id = tbl_asset.id_ruangan
INNER JOIN tbl_kategori ON tbl_kategori.id = tbl_asset.id_kategori ;

-- ----------------------------
-- View structure for view_ruangan
-- ----------------------------
DROP VIEW IF EXISTS `view_ruangan`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost`  VIEW `view_ruangan` AS SELECT
tbl_ruangan.kode_ruangan,
tbl_kantor.nama_kantor,
tbl_ruangan.nama_ruangan,
tbl_ruangan.id
FROM
tbl_ruangan
INNER JOIN tbl_kantor ON tbl_kantor.id = tbl_ruangan.id_kantor ;
