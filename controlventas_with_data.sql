/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 100406
 Source Host           : 127.0.0.1:3306
 Source Schema         : controlventas

 Target Server Type    : MySQL
 Target Server Version : 100406
 File Encoding         : 65001

 Date: 31/03/2020 02:31:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for sale
-- ----------------------------
DROP TABLE IF EXISTS `sale`;
CREATE TABLE `sale`  (
  `id_sale` int(255) NOT NULL AUTO_INCREMENT,
  `id_seller` int(255) NOT NULL,
  `client_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `company_name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sale_concept` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `sale_amount` double(255, 0) NOT NULL,
  `sale_date` datetime(6) NOT NULL,
  `validate` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `comission` double(255, 0) NOT NULL,
  PRIMARY KEY (`id_sale`) USING BTREE,
  INDEX `id_seller`(`id_seller`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 40 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of sale
-- ----------------------------
INSERT INTO `sale` VALUES (32, 2, 'Cliente', 'UniversidadPanamericana', 'Concepto', 4444, '2020-03-06 00:00:00.000000', 'Venta validada', 0);
INSERT INTO `sale` VALUES (33, 2, 'asdasd', 'UniversidadPanamericana', 'asdasd', 4444, '2020-03-04 00:00:00.000000', 'Venta validada', 0);
INSERT INTO `sale` VALUES (34, 2, 'asdasd', 'UniversidadPanamericana', 'asdasd', 4444, '2020-03-04 00:00:00.000000', 'Venta validada', 0);
INSERT INTO `sale` VALUES (36, 2, '', '', '', 0, '1970-01-01 00:00:00.000000', '', 0);
INSERT INTO `sale` VALUES (37, 2, 'Cliente', 'Empresa', 'Concepto', 4444, '2020-03-05 00:00:00.000000', 'Venta validada', 0);
INSERT INTO `sale` VALUES (38, 2, 'Cliente', 'Empresa', 'Concepto', 4444, '2020-03-05 00:00:00.000000', 'Venta validada', 0);
INSERT INTO `sale` VALUES (39, 2, 'Cliente', 'Empresa', 'Concepto', 4444, '2020-03-05 00:00:00.000000', 'Venta validada', 0);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `access` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `name` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'erick', 'erick', 'manager', 'Erick', 'Gutierrez');
INSERT INTO `user` VALUES (2, 'david', 'david', 'seller', 'David', 'Hernandez');

SET FOREIGN_KEY_CHECKS = 1;
