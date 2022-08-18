/*
 Navicat Premium Data Transfer

 Source Server         : localhost74
 Source Server Type    : MySQL
 Source Server Version : 100424
 Source Host           : localhost:3374
 Source Schema         : db_chikawedding

 Target Server Type    : MySQL
 Target Server Version : 100424
 File Encoding         : 65001

 Date: 19/08/2022 05:52:08
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tbl_booking
-- ----------------------------
DROP TABLE IF EXISTS `tbl_booking`;
CREATE TABLE `tbl_booking`  (
  `id_booking` int NOT NULL,
  `id_customer` int NULL DEFAULT NULL,
  `id_paket` int NULL DEFAULT NULL,
  `tgl_booking` datetime NULL DEFAULT NULL,
  `tgl_acara` date NULL DEFAULT NULL,
  `lokasi` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jml_bayar` double NULL DEFAULT NULL,
  `total_harga` double NULL DEFAULT NULL,
  `status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `catatan_pesanan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `catatan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`id_booking`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_booking
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_customer
-- ----------------------------
DROP TABLE IF EXISTS `tbl_customer`;
CREATE TABLE `tbl_customer`  (
  `id_customer` int NOT NULL AUTO_INCREMENT,
  `nama_lengkap` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_customer
-- ----------------------------
INSERT INTO `tbl_customer` VALUES (1, 'meylisa', NULL, '09809', 'mey', 'mey123');

-- ----------------------------
-- Table structure for tbl_paket
-- ----------------------------
DROP TABLE IF EXISTS `tbl_paket`;
CREATE TABLE `tbl_paket`  (
  `id_paket` int NOT NULL AUTO_INCREMENT,
  `nama_paket` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `harga` double NULL DEFAULT NULL,
  `foto` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `foto2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_buat` datetime NULL DEFAULT NULL,
  `dipesan` int NULL DEFAULT NULL,
  `kategori` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_paket`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_paket
-- ----------------------------
INSERT INTO `tbl_paket` VALUES (3, 'Paket Deluxe', '- catering 200 porsi\r\n- riasan sekeluarga', 50000000, '9106529ca3b4657b8ff9d8837f3ff236.jpg', '', '2022-08-18 19:53:37', NULL, 'Planner');
INSERT INTO `tbl_paket` VALUES (4, '3223', '2323', 23, '40186ae580e718b14f71612bc1589261.png', '', '2022-08-18 19:45:50', NULL, '23');

-- ----------------------------
-- Table structure for tbl_pembayaran
-- ----------------------------
DROP TABLE IF EXISTS `tbl_pembayaran`;
CREATE TABLE `tbl_pembayaran`  (
  `id_pembayaran` int NOT NULL AUTO_INCREMENT,
  `id_booking` int NULL DEFAULT NULL,
  `ket_pembayaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tgl_bayar` datetime NULL DEFAULT NULL,
  `nominal` double NULL DEFAULT NULL,
  `jenis_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_pembayaran` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tbl_pembayaran
-- ----------------------------

-- ----------------------------
-- Table structure for tbl_users
-- ----------------------------
DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of tbl_users
-- ----------------------------
INSERT INTO `tbl_users` VALUES (1, 'admin', 'admin123', 'Administrator');

SET FOREIGN_KEY_CHECKS = 1;
