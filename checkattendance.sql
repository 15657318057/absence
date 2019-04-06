/*
 Navicat Premium Data Transfer

 Source Server         : mysql
 Source Server Type    : MySQL
 Source Server Version : 50562
 Source Host           : localhost:3306
 Source Schema         : checkattendance

 Target Server Type    : MySQL
 Target Server Version : 50562
 File Encoding         : 65001

 Date: 17/03/2019 08:47:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for arrive_time
-- ----------------------------
DROP TABLE IF EXISTS `arrive_time`;
CREATE TABLE `arrive_time`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `time` datetime NOT NULL,
  `sno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `roomname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `is_late` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sno`(`sno`) USING BTREE,
  INDEX `roomname`(`roomname`) USING BTREE,
  CONSTRAINT `roomname` FOREIGN KEY (`roomname`) REFERENCES `classroom` (`roomname`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sno` FOREIGN KEY (`sno`) REFERENCES `student` (`sno`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB AUTO_INCREMENT = 31 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of arrive_time
-- ----------------------------
INSERT INTO `arrive_time` VALUES (1, '2019-02-01 19:17:48', '1', '10-306', 1);
INSERT INTO `arrive_time` VALUES (2, '2019-02-02 19:18:17', '5', '8-201', 1);
INSERT INTO `arrive_time` VALUES (3, '2019-02-06 19:19:18', '2', '8-202', 1);
INSERT INTO `arrive_time` VALUES (4, '2019-02-08 19:19:48', '6', '10-306', 1);
INSERT INTO `arrive_time` VALUES (5, '2019-02-14 19:22:05', '2', '8-201', 1);
INSERT INTO `arrive_time` VALUES (6, '2019-02-15 19:22:58', '4', '8-505', 0);
INSERT INTO `arrive_time` VALUES (7, '2019-02-16 19:23:42', '8', '8-202', 1);
INSERT INTO `arrive_time` VALUES (8, '2019-02-05 15:33:59', '2', '10-305', 0);
INSERT INTO `arrive_time` VALUES (9, '2019-02-22 19:24:30', '6', '8-201', 1);
INSERT INTO `arrive_time` VALUES (10, '2019-02-22 19:25:03', '5', '8-505', 1);
INSERT INTO `arrive_time` VALUES (11, '2019-02-26 19:26:16', '4', '8-202', 1);
INSERT INTO `arrive_time` VALUES (12, '2019-02-28 19:27:12', '6', '8-505', 0);
INSERT INTO `arrive_time` VALUES (13, '2019-02-04 19:18:48', '4', '8-505', 1);
INSERT INTO `arrive_time` VALUES (15, '2019-02-12 19:20:55', '2', '10-306', 1);
INSERT INTO `arrive_time` VALUES (16, '2019-02-24 19:27:56', '5', '8-505', 0);
INSERT INTO `arrive_time` VALUES (18, '2019-02-08 09:54:33', '7', '10-306', 1);
INSERT INTO `arrive_time` VALUES (19, '2019-02-16 09:54:56', '8', '8-505', 1);
INSERT INTO `arrive_time` VALUES (20, '2019-02-22 09:55:26', '6', '10-306', 0);
INSERT INTO `arrive_time` VALUES (21, '2019-02-16 09:55:48', '5', '10-305', 0);
INSERT INTO `arrive_time` VALUES (22, '2019-02-10 09:56:23', '4', '8-201', 0);
INSERT INTO `arrive_time` VALUES (23, '2019-03-10 09:56:47', '3', '10-306', 0);
INSERT INTO `arrive_time` VALUES (24, '2019-02-14 09:57:10', '8', '8-201', 1);
INSERT INTO `arrive_time` VALUES (25, '2019-02-15 09:57:49', '1', '8-202', 1);
INSERT INTO `arrive_time` VALUES (26, '2019-02-16 09:58:21', '7', '8-505', 1);
INSERT INTO `arrive_time` VALUES (27, '2019-02-17 09:58:47', '8', '10-306', 1);
INSERT INTO `arrive_time` VALUES (28, '2019-02-18 09:59:09', '3', '8-202', 0);
INSERT INTO `arrive_time` VALUES (29, '2019-03-20 09:59:36', '2', '8-505', 1);
INSERT INTO `arrive_time` VALUES (30, '2019-02-21 09:59:54', '1', '10-305', 0);

-- ----------------------------
-- Table structure for classroom
-- ----------------------------
DROP TABLE IF EXISTS `classroom`;
CREATE TABLE `classroom`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `roomname` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `roomname`(`roomname`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of classroom
-- ----------------------------
INSERT INTO `classroom` VALUES (8, '1');
INSERT INTO `classroom` VALUES (3, '10-305');
INSERT INTO `classroom` VALUES (4, '10-306');
INSERT INTO `classroom` VALUES (1, '8-201');
INSERT INTO `classroom` VALUES (2, '8-202');
INSERT INTO `classroom` VALUES (7, '8-405');
INSERT INTO `classroom` VALUES (6, '8-502');
INSERT INTO `classroom` VALUES (5, '8-505');

-- ----------------------------
-- Table structure for student
-- ----------------------------
DROP TABLE IF EXISTS `student`;
CREATE TABLE `student`  (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `sno` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `class` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `academy` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `mac_address` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `sno`(`sno`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of student
-- ----------------------------
INSERT INTO `student` VALUES (1, '1', '张无忌', '12345678', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (2, '2', '张衡', '123456', '高材161', '材纺', '1234');
INSERT INTO `student` VALUES (3, '3', '张仪', '12345', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (4, '4', '张飞', '123456', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (5, '5', '张之洞', '123456', '高材161', '材纺', '1234');
INSERT INTO `student` VALUES (6, '6', '张居正', '123456', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (7, '7', '张骞', '12345', '计科161', '数信', '1234');
INSERT INTO `student` VALUES (8, '8', '张仲景', '123456', '医本161', '医学院', '1234');
INSERT INTO `student` VALUES (9, '9', '张九龄', '12345', '医本161', '医学院', '1234');
INSERT INTO `student` VALUES (10, '10', '张三丰', '123456', '计科161', '数信', '1234');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'qq', 'e10adc3949ba59abbe56e057f20f883e', '15657318057', '3666697623@qq.com');
INSERT INTO `user` VALUES (2, 'qq', 'e10adc3949ba59abbe56e057f20f883e', '15657318057', '3466697623@qq.com');

SET FOREIGN_KEY_CHECKS = 1;
