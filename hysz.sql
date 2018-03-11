-- MySQL dump 10.13  Distrib 5.5.53, for Win32 (AMD64)
--
-- Host: localhost    Database: hysz
-- ------------------------------------------------------
-- Server version	5.5.53

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '管理员姓名',
  `password` varchar(255) NOT NULL COMMENT '密码',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '登录时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=armscii8 COMMENT='管理员表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'赵斌','$2y$10$VjR.qSHUcXbFklvjkJPww.lIVZt0f2Iz1G6fIcR0VRhbWBWhV5Q72','2018-02-23 10:15:42','2018-02-23 10:15:42'),(3,'李四','$2y$10$/K.F4I1m58Vq0pDwg9W.buGpB0gbFB5GnQKc/xtukvegoRd0CHgK6','2018-02-23 10:22:28','2018-02-23 10:22:28'),(4,'王五','$2y$10$xMaOQdgHpXFYqjyPjluJq.YDR9bBzJuiDxDOo8I7HmeSmt06ln7DW','2018-02-23 10:29:13','2018-02-23 10:29:13'),(5,'石雨涵','$2y$10$vsL3jXyOR4rpqIxCFgyJhuNudLwX7mbRsH88fYGcelotvtTC.EKNW','2018-02-23 10:36:50','2018-02-23 10:36:50'),(6,'啦啦','$2y$10$Mqgk0prc8U2YZjmIY0a9DeScMzhpea11ef4v7xYSH5vwLMJybWIUC','2018-02-23 10:39:52','2018-02-23 10:39:52'),(7,'中','$2y$10$xL7ma2mqsuwZ6NWL1zHV.OGq6n2ZWtM83Syp7f/TsZu9wpzvLr5em','2018-02-23 10:40:51','2018-02-23 10:40:51'),(8,'中国','$2y$10$ya6onpqyls7tJyWWmanhBuKEMM7NKXBbVfDxVEW9az3/2n0qiNLIW','2018-02-23 10:41:45','2018-02-23 10:41:45'),(9,'啦啦啦啦啦','$2y$10$E5b/iI9R736koUDmoEBDbe7B3ufrEZdhjecyWVB3ZIoIsrtOkrgkq','2018-02-23 11:01:45','2018-02-23 11:01:45'),(10,'爱米','$2y$10$dJCWQenWVQ7e4S8ntG5aXOZDe1KRReuiTbiRIMBM8dyzj5YkcZ5be','2018-02-23 13:09:09','2018-02-23 13:09:09'),(11,'恒源水站','$2y$10$EV67aJH/sQdQfRQUlxyz8.OMiyawF67TjJwxgzmYbmoAQVE08A9wq','2018-02-23 13:09:20','2018-02-23 13:09:20'),(12,'比比比','$2y$10$TXhnt.0P7IuFOYv7BomXsOaJjvWk1xEt6vzx2HbilxbGMAzf3ipKK','2018-02-23 13:09:31','2018-02-23 13:09:31');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `admin_log`
--

DROP TABLE IF EXISTS `admin_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '管理员日志ID',
  `content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '日志内容',
  `price` int(11) NOT NULL COMMENT '价格',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `admin_id` int(11) NOT NULL COMMENT '管理员ID',
  `supplier_id` int(11) NOT NULL COMMENT '供应商ID',
  `num` int(11) NOT NULL COMMENT '进货数量',
  `goods_id` int(11) NOT NULL COMMENT '商品ID',
  `type` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '种类',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin_log`
--

LOCK TABLES `admin_log` WRITE;
/*!40000 ALTER TABLE `admin_log` DISABLE KEYS */;
INSERT INTO `admin_log` VALUES (1,'赵斌--进水',123,'2018-03-10 23:06:58',1,5,12,7,'aa','2018-03-10 23:06:58'),(2,'赵斌--进水',800,'2018-03-10 23:15:59',1,3,1000,1,'矿泉水','2018-03-10 23:15:59');
/*!40000 ALTER TABLE `admin_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detail`
--

DROP TABLE IF EXISTS `detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户详情ID',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `goods_id` int(11) NOT NULL COMMENT '水种ID',
  `foregift` int(1) NOT NULL DEFAULT '0' COMMENT '0:现金50,1:水桶',
  `stock_balance` int(11) NOT NULL DEFAULT '0' COMMENT '0:临时会员,大于0位会员购买',
  `empty_barrel` int(11) DEFAULT NULL COMMENT '空桶数量',
  `comment` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COMMENT='用户详情表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail`
--

LOCK TABLES `detail` WRITE;
/*!40000 ALTER TABLE `detail` DISABLE KEYS */;
INSERT INTO `detail` VALUES (1,1,1,0,4,NULL,NULL),(2,2,1,0,89,NULL,NULL);
/*!40000 ALTER TABLE `detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `goods`
--

DROP TABLE IF EXISTS `goods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `goods` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '商品名称',
  `type` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '种类',
  `cost_price` int(10) NOT NULL COMMENT '成本价',
  `price` int(11) NOT NULL COMMENT '普通会员价',
  `vip_price` int(11) NOT NULL COMMENT '会员价',
  `stock_balance` int(11) NOT NULL COMMENT '库存',
  `supplier_id` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '供应商',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  `empty_barrel` int(11) DEFAULT NULL COMMENT '空桶数量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `goods`
--

LOCK TABLES `goods` WRITE;
/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` VALUES (1,'恒大','矿泉水',12,12,12,1022,'3','2018-03-01 11:12:09','2018-03-11 11:49:09',6),(2,'阿萨德','阿斯蒂芬',23,23,23,2333,'4','2018-02-24 17:53:17','2018-03-01 13:52:09',NULL),(3,'阿萨德','阿斯蒂芬',23,23,23,2323,'4','2018-02-24 17:54:20','2018-02-24 17:54:20',NULL),(4,'恒大','矿泉水',12,12,13434,12,'3','2018-03-01 09:40:31','2018-03-01 11:30:30',NULL),(6,'恒大','矿泉水',12,12,12,12,'3','2018-03-01 11:14:11','2018-03-01 11:14:11',NULL),(7,'aa','aa',123,123,231,147,'5','2018-03-10 22:38:09','2018-03-10 23:06:58',NULL);
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `suppliers`
--

DROP TABLE IF EXISTS `suppliers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `suppliers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '供应商ID',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '供应商名称',
  `phone` varchar(12) NOT NULL COMMENT '电话',
  `company` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '公司名称',
  `goods_type` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '商品',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=armscii8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `suppliers`
--

LOCK TABLES `suppliers` WRITE;
/*!40000 ALTER TABLE `suppliers` DISABLE KEYS */;
INSERT INTO `suppliers` VALUES (3,'赵斌','13920809241','美国','娃哈哈矿泉','2018-02-24 17:11:28','2018-02-24 17:20:33'),(5,'aaa','123123123','aa','aa','2018-03-10 22:37:36','2018-03-10 22:37:36');
/*!40000 ALTER TABLE `suppliers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户ID集',
  `name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '用户名',
  `address` varchar(255) CHARACTER SET utf32 NOT NULL COMMENT '地址',
  `phone` varchar(11) CHARACTER SET utf8 NOT NULL COMMENT '手机号',
  `is_vip` int(1) NOT NULL DEFAULT '0' COMMENT '0:不是会员,1:是会员',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  PRIMARY KEY (`id`),
  UNIQUE KEY `phone` (`phone`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=armscii8 COMMENT='用户表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'赵斌111','东丽湖万科城观湖苑','13920809240',1,'2018-02-23 17:59:16','2018-02-24 10:08:57'),(2,'张素','河东','13920809242',0,'2018-02-24 17:24:19','2018-02-24 17:24:19');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_log`
--

DROP TABLE IF EXISTS `users_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_log` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户日志ID',
  `content` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '日志内容',
  `num` int(11) NOT NULL COMMENT '商品数量',
  `created_at` datetime NOT NULL COMMENT '创建时间',
  `uid` int(11) NOT NULL COMMENT '用户ID',
  `address` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '地址',
  `type` varchar(255) CHARACTER SET utf8 COLLATE utf8_estonian_ci NOT NULL COMMENT '种类',
  `price` int(11) DEFAULT NULL,
  `stock_balance` int(11) NOT NULL COMMENT '库存',
  `updated_at` datetime NOT NULL COMMENT '更新时间',
  `status` int(11) NOT NULL COMMENT '日志标识1:用户购水日志,2:用户预购日志',
  `remarks` varchar(255) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=armscii8 COMMENT='用户操作日志表';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_log`
--

LOCK TABLES `users_log` WRITE;
/*!40000 ALTER TABLE `users_log` DISABLE KEYS */;
INSERT INTO `users_log` VALUES (1,'赵斌111,会员用户,要水',1,'2018-02-24 14:15:36',1,'现金','娃哈哈矿泉水',0,9,'2018-02-24 14:15:36',1,NULL),(2,'赵斌111,会员用户,要水',2,'2018-02-24 14:16:07',1,'现金','娃哈哈矿泉水',0,7,'2018-02-24 14:16:07',1,NULL),(3,'张素,临时用户,要水',1,'2018-02-26 09:35:31',2,'现金','娃哈哈矿泉水',0,19,'2018-02-26 09:35:31',1,NULL),(4,'张素,临时用户,要水',1,'2018-03-01 13:54:27',2,'现金','矿泉水',0,31,'2018-03-01 13:54:27',1,NULL),(5,'张素,临时用户,要水',12,'2018-03-01 13:56:10',2,'现金','矿泉水',0,19,'2018-03-01 13:56:10',0,NULL),(6,'张素,临时用户,要水',1,'2018-03-01 13:56:59',2,'现金','矿泉水',0,18,'2018-03-01 13:56:59',0,NULL),(7,'张素,临时用户,要水',1,'2018-03-01 13:57:27',2,'现金','矿泉水',0,18,'2018-03-01 13:57:27',0,NULL),(8,'张素,临时用户,要水',1,'2018-03-01 13:57:52',2,'现金','矿泉水',0,18,'2018-03-01 13:57:52',0,NULL),(9,'张素,临时用户,要水',1,'2018-03-01 13:57:54',2,'现金','矿泉水',0,18,'2018-03-01 13:57:54',0,NULL),(10,'张素,临时用户,要水',1,'2018-03-01 13:58:21',2,'现金','矿泉水',0,18,'2018-03-01 13:58:21',0,NULL),(11,'张素,临时用户,要水',12,'2018-03-01 13:58:51',2,'现金','矿泉水',0,6,'2018-03-01 13:58:51',0,NULL),(12,'张素,临时用户,要水',12,'2018-03-01 13:59:23',2,'现金','矿泉水',0,6,'2018-03-01 13:59:23',0,NULL),(13,'张素,临时用户,要水',12,'2018-03-01 13:59:23',2,'现金','矿泉水',0,6,'2018-03-01 13:59:23',0,NULL),(14,'张素,临时用户,要水',1,'2018-03-01 14:01:34',2,'现金','矿泉水',0,5,'2018-03-01 14:01:34',0,NULL),(15,'张素--预购',5,'2018-03-10 22:04:39',2,'河东','1',150,49,'2018-03-10 22:04:39',2,NULL),(16,'张素--预购',49,'2018-03-10 22:04:57',2,'河东','1',150,59,'2018-03-10 22:04:57',2,NULL),(17,'张素--预购',59,'2018-03-10 22:22:14',2,'河东','--',150,70,'2018-03-10 22:22:14',2,NULL),(18,'张素--预购',70,'2018-03-10 22:23:11',2,'河东','恒大--矿泉水',150,81,'2018-03-10 22:23:11',2,NULL),(19,'张素--预购',11,'2018-03-10 22:24:22',2,'河东','恒大--矿泉水',150,92,'2018-03-10 22:24:22',2,NULL),(20,'赵斌111,会员用户,要水',1,'2018-03-11 11:33:34',1,'现金','矿泉水',NULL,6,'2018-03-11 11:33:34',1,NULL),(21,'赵斌111,会员用户,要水',1,'2018-03-11 11:33:42',1,'现金','矿泉水',NULL,5,'2018-03-11 11:33:42',1,NULL),(22,'赵斌111,会员用户,要水',1,'2018-03-11 11:36:49',1,'现金','矿泉水',NULL,4,'2018-03-11 11:36:49',1,NULL),(23,'张素,临时用户,要水',2,'2018-03-11 11:38:57',2,'现金','矿泉水',NULL,90,'2018-03-11 11:38:57',1,NULL),(24,'张素,临时用户,要水',1,'2018-03-11 11:49:09',2,'现金','矿泉水',NULL,89,'2018-03-11 11:49:09',1,NULL);
/*!40000 ALTER TABLE `users_log` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-03-11 12:03:06
