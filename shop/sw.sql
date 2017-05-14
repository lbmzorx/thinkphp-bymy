/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306_phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sw

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-05-15 01:20:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sw_admins
-- ----------------------------
DROP TABLE IF EXISTS `sw_admins`;
CREATE TABLE `sw_admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `resetpassword` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `header` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_admins
-- ----------------------------
INSERT INTO `sw_admins` VALUES ('1', 'lbmzorx', '$2y$12$rYZojdN86L9lzUSd4N9vPejbhq92fNOt6jCYup4KdHweWJGXfbC0e', null, '18911179839', 'lbmzorx@163.com', null, null, null, null, '1494768700');

-- ----------------------------
-- Table structure for sw_product
-- ----------------------------
DROP TABLE IF EXISTS `sw_product`;
CREATE TABLE `sw_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `cate_id` int(11) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT '0',
  `edit_time` int(11) DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `thumb` varchar(255) DEFAULT NULL,
  `brand` varchar(255) DEFAULT NULL,
  `detail` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_product
-- ----------------------------
INSERT INTO `sw_product` VALUES ('1', 'kk', '1', '5', '551', '0', '0', '25', '26', '565203', '200');
INSERT INTO `sw_product` VALUES ('7', 'bb', '0', '60', null, '1494779384', '0', 'Upload/Product/2017-05-15/591885f89c766.png', null, '', 'adsf');
INSERT INTO `sw_product` VALUES ('8', 'adsf', '0', '123', null, '1494781227', '0', 'Upload/Product/2017-05-15/59188d2b3028a.png', 'Upload/Product/2017-05-15/thumb_59188d2b3028a.png', '0', 'asdlkfjlfjkasld');
INSERT INTO `sw_product` VALUES ('9', 'oojjo', '0', '456', null, '1494781328', '0', 'Upload/Product/2017-05-15/59188d90449d0.png', 'Upload/Product/2017-05-15/thumb_59188d90449d0.png', '0', 'adsfsafasdfsafs');
INSERT INTO `sw_product` VALUES ('10', 'adafs', '0', '852', null, '1494781454', '0', 'Upload/Product/2017-05-15/59188e0e7cd1c.png', 'Upload/Product/2017-05-15/thumb_59188e0e7cd1c.png', '0', 'adfsfwewfw');

-- ----------------------------
-- Table structure for sw_user
-- ----------------------------
DROP TABLE IF EXISTS `sw_user`;
CREATE TABLE `sw_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_psw` varchar(255) DEFAULT NULL,
  `user_re_psw` varchar(255) DEFAULT NULL,
  `user_qq` varchar(20) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_phone` varchar(11) DEFAULT NULL,
  `user_header` varchar(255) DEFAULT NULL,
  `user_thumb` varchar(255) DEFAULT NULL,
  `user_sex` tinyint(4) DEFAULT NULL,
  `user_educate` int(11) DEFAULT NULL,
  `user_hobby` varchar(255) DEFAULT NULL,
  `user_detail` text,
  `add_time` int(11) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_user
-- ----------------------------
INSERT INTO `sw_user` VALUES ('2', 'lbmzorx', '$2y$12$orpro1BQd.BxURkr5Xr7WuQOYNFkBqfEus3cehlYg/czGSXkv5NBi', null, '1521875638', 'lbmzorx@163.com', '18911179839', null, null, '1', '5', '1,2,3', 'aaa', '1494763949', null);
INSERT INTO `sw_user` VALUES ('5', 'aa', '$2y$12$RXhdssUgk006BlDMNn4.iOiiJVKOUsHJxyxWQVgDosdL5Iv304/S2', null, '1521875638', 'lbmzorx@163.com', '18911179839', null, null, '1', '5', '2,3,5', 'aaa', '1494767542', null);
