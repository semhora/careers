/*
Navicat MySQL Data Transfer

Source Server         : kevin wamp
Source Server Version : 50714
Source Host           : 127.0.0.1:3306
Source Database       : semhora

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2017-07-04 11:10:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for eventos
-- ----------------------------
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE `eventos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `descricao` text,
  `local` varchar(50) DEFAULT NULL,
  `hora_inicio` time DEFAULT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of eventos
-- ----------------------------
INSERT INTO `eventos` VALUES ('2', 'show zeze de camargo e luciano éé', '         fdsfsdfsdfsd fds  ', 'são paulo', '76:57:00', 'Lighthouse.jpg', '1');
INSERT INTO `eventos` VALUES ('20', 'Evento tão', ' Como você disse que seu projeto tem mais de 100 arquivos em codificação diferente de UTF-8, e você irá altera-los, é bem provável que um monte de caracteres especiais quebrem (mesmo que você não queira). Por exemplo: \"á\" pode virar \"?\". E mais, se você ao compilar seu software, você poderá ter erro de unmappable character.', 'lcoal4', '15:15:00', 'Hydrangeas.jpg', '1');
INSERT INTO `eventos` VALUES ('21', 'teatro mágico', ' teste de scricao', 'credcard hall', '15:14:00', 'Tulips.jpg', '1');
INSERT INTO `eventos` VALUES ('22', 'ttt', '  65', 'BA', '14:45:00', 'Chrysanthemum.jpg', '1');
INSERT INTO `eventos` VALUES ('27', 'teste', ' desc', 'mg', '10:45:00', 'Jellyfish.jpg', '1');
INSERT INTO `eventos` VALUES ('28', 'show luan santana', 'muito bom', 'minas gerais', '15:45:00', 'Tulips.jpg', '1');
INSERT INTO `eventos` VALUES ('25', 'loo', ' louyu', 'maranhao', '14:10:00', 'Desert.jpg', '1');

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `senha` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES ('1', 'Kevin Araújo', 'kfa_34@hotmail.com', '2835cdc5d88c347e58d2cc59300e91e4', '1');
INSERT INTO `usuarios` VALUES ('4', 'Joao', 'joao@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1');
INSERT INTO `usuarios` VALUES ('5', 'lucas', 'lucas@gmail.com', '202cb962ac59075b964b07152d234b70', '1');
