/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306_phpstudy
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : sw

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-05-22 01:25:47
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
  `role_id` varchar(255) DEFAULT NULL,
  `edit_time` int(11) DEFAULT NULL,
  `add_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_admins
-- ----------------------------
INSERT INTO `sw_admins` VALUES ('1', 'lbmzorx', '$2y$12$rYZojdN86L9lzUSd4N9vPejbhq92fNOt6jCYup4KdHweWJGXfbC0e', null, '18911179839', 'lbmzorx@163.com', null, null, '10', null, '1494768700');

-- ----------------------------
-- Table structure for sw_auth
-- ----------------------------
DROP TABLE IF EXISTS `sw_auth`;
CREATE TABLE `sw_auth` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  `pid` smallint(6) DEFAULT NULL,
  `controller` varchar(50) NOT NULL COMMENT '控制器',
  `action` varchar(50) DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL COMMENT '全路径',
  `level` tinyint(4) NOT NULL DEFAULT '0' COMMENT '级别',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_auth
-- ----------------------------
INSERT INTO `sw_auth` VALUES ('100', '商品管理', '0', '', null, '100', '0');
INSERT INTO `sw_auth` VALUES ('101', '订单管理', '0', '', null, '101', '0');
INSERT INTO `sw_auth` VALUES ('102', '权限管理', '0', '', null, '102', '0');
INSERT INTO `sw_auth` VALUES ('103', '商品列表', '100', 'Product', 'index', '100-103', '1');
INSERT INTO `sw_auth` VALUES ('104', '添加商品', '100', 'Product', 'add', '100-104', '1');
INSERT INTO `sw_auth` VALUES ('105', '商品分类', '100', 'Product', 'category', '100-105', '1');
INSERT INTO `sw_auth` VALUES ('106', '订单列表', '101', 'Order', 'showlist', '101-106', '1');
INSERT INTO `sw_auth` VALUES ('107', '订单查询', '101', 'Order', 'look', '101-107', '1');
INSERT INTO `sw_auth` VALUES ('108', '订单打印', '101', 'Order', 'print', '101-108', '1');
INSERT INTO `sw_auth` VALUES ('109', '管理员列表', '102', 'Manager', 'admins', '102-109', '1');
INSERT INTO `sw_auth` VALUES ('110', '角色管理', '102', 'Role', 'showlist', '102-110', '1');
INSERT INTO `sw_auth` VALUES ('111', '权限列表', '102', 'Auth', 'showlist', '102-111', '1');
INSERT INTO `sw_auth` VALUES ('112', '商品浏览', '0', 'Product', 'lookup', '112', '0');

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
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_product
-- ----------------------------
INSERT INTO `sw_product` VALUES ('1', 'kk', '1', '5', '551', '0', '0', '25', '26', '565203', '200');
INSERT INTO `sw_product` VALUES ('7', 'bb', '0', '60', null, '1494779384', '0', 'Upload/Product/2017-05-15/591885f89c766.png', null, '', 'adsf');
INSERT INTO `sw_product` VALUES ('8', 'adsf', '0', '123', null, '1494781227', '0', 'Upload/Product/2017-05-15/59188d2b3028a.png', 'Upload/Product/2017-05-15/thumb_59188d2b3028a.png', '0', 'asdlkfjlfjkasld');
INSERT INTO `sw_product` VALUES ('9', 'oojjo', '0', '456', null, '1494781328', '0', 'Upload/Product/2017-05-15/59188d90449d0.png', 'Upload/Product/2017-05-15/thumb_59188d90449d0.png', '0', 'adsfsafasdfsafs');
INSERT INTO `sw_product` VALUES ('10', 'adafs', '0', '852', null, '1494781454', '0', 'Upload/Product/2017-05-15/59188e0e7cd1c.png', 'Upload/Product/2017-05-15/thumb_59188e0e7cd1c.png', '0', 'adfsfwewfw');
INSERT INTO `sw_product` VALUES ('11', 'asdf', '0', '123456', null, '1495368861', '0', 'Upload/Product/2017-05-21/5921849db301a.png', 'Upload/Product/2017-05-21/thumb_5921849db301a.png', '0', 'ajlkfjweio');

-- ----------------------------
-- Table structure for sw_role
-- ----------------------------
DROP TABLE IF EXISTS `sw_role`;
CREATE TABLE `sw_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL COMMENT '角色名称',
  `auth_ids` varchar(255) NOT NULL COMMENT '权限ids ,1,2,5',
  `auth_ac` text COMMENT '控制器-操作，控制器-操作，...',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sw_role
-- ----------------------------
INSERT INTO `sw_role` VALUES ('10', '主管', '100,103,104,101,106', 'Goods-showlist,Goods-add,Order-showlist,Order-look');
INSERT INTO `sw_role` VALUES ('11', '经理', '100,103,101,106,107,108', 'Product/index,Order/showlist,Order/look,Order/print');
INSERT INTO `sw_role` VALUES ('1', '超级管理员', '100,103,104,105,101,106,107,108,102,109,110,111', 'Product/index,Product/add,Product/category,Order/showlist,Order/look,Order/print,Manager/admins,Role/showlist,Auth/showlist');

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
INSERT INTO `sw_user` VALUES ('1', 'lbmzorx', '$2y$12$orpro1BQd.BxURkr5Xr7WuQOYNFkBqfEus3cehlYg/czGSXkv5NBi', null, '1521875638', 'lbmzorx@163.com', '18911179839', null, null, '1', '5', '1,2,3', 'aaa', '1494763949', null);
INSERT INTO `sw_user` VALUES ('5', 'aa', '$2y$12$RXhdssUgk006BlDMNn4.iOiiJVKOUsHJxyxWQVgDosdL5Iv304/S2', null, '1521875638', 'lbmzorx@163.com', '18911179839', null, null, '1', '5', '2,3,5', 'aaa', '1494767542', null);
