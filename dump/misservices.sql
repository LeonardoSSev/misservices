-- MySQL dump 10.13  Distrib 5.7.22, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: misservices
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu18.04.1

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
-- Current Database: `misservices`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `misservices` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `misservices`;

--
-- Table structure for table `abilities`
--

DROP TABLE IF EXISTS `abilities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abilities` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `abilities_user_id_foreign` (`user_id`),
  CONSTRAINT `abilities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abilities`
--

LOCK TABLES `abilities` WRITE;
/*!40000 ALTER TABLE `abilities` DISABLE KEYS */;
INSERT INTO `abilities` VALUES (1,'PHP',14,'2018-05-13 23:14:19','2018-05-13 23:14:19',NULL),(2,'MySQL',14,'2018-05-13 23:15:06','2018-05-13 23:15:06',NULL);
/*!40000 ALTER TABLE `abilities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Alimentação','Referente a alimentos.',NULL,'2018-04-15 09:09:38','2018-04-15 09:09:38'),(2,'Educação','Referente à educação.',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39'),(3,'Reforma','Referente à reformas de construções.',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39'),(4,'Design','Referente à estilização.',NULL,'2018-04-21 06:10:15','2018-04-21 06:10:18'),(5,'Direito','Referente à área de advocacia.',NULL,'2018-04-21 06:10:52','2018-04-21 06:10:58'),(6,'Transporte','Referente a fretes e carretos.',NULL,'2018-04-21 06:11:58','2018-04-21 06:12:01'),(7,'Tecnologia','Referente ao ramo da tecnologia.',NULL,'2018-04-21 06:15:45','2018-04-21 06:15:50');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chats`
--

DROP TABLE IF EXISTS `chats`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chats` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provided_service_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chats_provided_service_id_foreign` (`provided_service_id`),
  CONSTRAINT `chats_provided_service_id_foreign` FOREIGN KEY (`provided_service_id`) REFERENCES `provided_services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chats`
--

LOCK TABLES `chats` WRITE;
/*!40000 ALTER TABLE `chats` DISABLE KEYS */;
INSERT INTO `chats` VALUES (1,6,NULL,NULL),(2,7,NULL,NULL);
/*!40000 ALTER TABLE `chats` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `sender_id` int(10) unsigned NOT NULL,
  `receiver_id` int(10) unsigned NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `chat_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `messages_sender_id_foreign` (`sender_id`),
  KEY `messages_receiver_id_foreign` (`receiver_id`),
  CONSTRAINT `messages_receiver_id_foreign` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`),
  CONSTRAINT `messages_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `messages`
--

LOCK TABLES `messages` WRITE;
/*!40000 ALTER TABLE `messages` DISABLE KEYS */;
INSERT INTO `messages` VALUES (3,14,15,'teste',NULL,'2018-05-28 03:59:32','2018-05-28 03:59:32',1),(4,14,15,'teste',NULL,'2018-05-28 04:00:42','2018-05-28 04:00:42',1),(5,15,14,'Ok',NULL,'2018-05-28 04:11:57','2018-05-28 04:11:57',1),(6,14,15,'Outra mensagem',NULL,'2018-05-28 04:25:34','2018-05-28 04:25:34',1),(7,15,14,'Legal',NULL,'2018-05-28 04:25:43','2018-05-28 04:25:43',1),(8,15,14,'Olá',NULL,'2018-05-28 04:25:46','2018-05-28 04:25:46',2),(9,14,15,'Opa',NULL,'2018-05-28 04:26:01','2018-05-28 04:26:01',2);
/*!40000 ALTER TABLE `messages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2018_02_16_123341_add_remember_token_to_users_table',1),(4,'2018_02_16_125906_create_categories_table',1),(5,'2018_02_16_125907_create_services_table',1),(6,'2018_02_16_132404_create_roles_table',1),(7,'2018_02_16_132448_create_permissions_table',1),(8,'2018_03_17_232933_create_phone_types_table',1),(9,'2018_03_17_232941_create_phones_table',1),(17,'2018_05_07_003559_add_user_description',4),(18,'2018_05_13_012204_add_user_image',5),(19,'2018_05_13_012756_add_user_image',6),(20,'2018_05_13_195007_create_abilities_table',6),(27,'2018_04_29_005953_create_provided_services_table',7),(29,'2018_05_14_042036_set_price_nullable',7),(33,'2018_04_30_140014_create_rates_table',8),(34,'2018_05_25_035207_add_provided_service_columns',8),(35,'2018_05_25_050446_add_provided_service_column_done_at',9),(36,'2018_05_26_022443_create_chats_table',10),(37,'2018_05_26_022507_create_messages_table',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `permission_role_permission_id_foreign` (`permission_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (3,1,1,NULL,NULL),(4,2,1,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'view_own_profile','Ver apenas o próprio perfil','2018-04-15 09:09:41','2018-05-26 23:13:10'),(2,'procurar_prestador','Procurar por um prestador de serviço.','2018-04-15 09:09:41','2018-05-26 23:28:02');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_types`
--

DROP TABLE IF EXISTS `phone_types`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_types` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_types`
--

LOCK TABLES `phone_types` WRITE;
/*!40000 ALTER TABLE `phone_types` DISABLE KEYS */;
INSERT INTO `phone_types` VALUES (1,'Residencial','Telefone pessoal fixo.','2018-04-15 09:09:41','2018-04-15 09:09:41'),(2,'Celular','Telefone pessoal móvel.','2018-04-15 09:09:41','2018-04-15 09:09:41'),(4,'teste','teste','2018-05-28 00:40:34','2018-05-28 00:40:34');
/*!40000 ALTER TABLE `phone_types` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phone_user`
--

DROP TABLE IF EXISTS `phone_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phone_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phone_user_phone_id_foreign` (`phone_id`),
  KEY `phone_user_user_id_foreign` (`user_id`),
  CONSTRAINT `phone_user_phone_id_foreign` FOREIGN KEY (`phone_id`) REFERENCES `phones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `phone_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phone_user`
--

LOCK TABLES `phone_user` WRITE;
/*!40000 ALTER TABLE `phone_user` DISABLE KEYS */;
INSERT INTO `phone_user` VALUES (2,2,2,NULL,NULL),(3,3,2,NULL,NULL),(4,4,3,NULL,NULL),(5,5,3,NULL,NULL),(6,6,4,NULL,NULL),(7,7,4,NULL,NULL),(8,8,5,NULL,NULL),(9,9,5,NULL,NULL),(10,10,6,NULL,NULL),(11,11,6,NULL,NULL),(12,12,7,NULL,NULL),(13,13,7,NULL,NULL),(14,14,8,NULL,NULL),(15,15,8,NULL,NULL),(16,16,9,NULL,NULL),(17,17,9,NULL,NULL),(18,18,10,NULL,NULL),(19,19,10,NULL,NULL),(20,20,11,NULL,NULL),(21,21,11,NULL,NULL),(22,22,14,NULL,NULL),(23,23,14,NULL,NULL),(24,24,15,NULL,NULL),(25,25,15,NULL,NULL),(26,26,3,NULL,NULL),(27,1,2,NULL,NULL);
/*!40000 ALTER TABLE `phone_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phones`
--

DROP TABLE IF EXISTS `phones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ddd` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '13',
  `number` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_type_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `phones_phone_type_id_foreign` (`phone_type_id`),
  CONSTRAINT `phones_phone_type_id_foreign` FOREIGN KEY (`phone_type_id`) REFERENCES `phone_types` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phones`
--

LOCK TABLES `phones` WRITE;
/*!40000 ALTER TABLE `phones` DISABLE KEYS */;
INSERT INTO `phones` VALUES (1,'11','3213123213',1,'2018-04-15 09:09:41','2018-05-28 01:33:47'),(2,'13','96421-5970',2,'2018-04-15 09:09:41','2018-04-15 09:09:41'),(3,'13','6139-4718',1,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(4,'13','97341-0598',2,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(5,'13','4519-3610',1,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(6,'13','92103-9875',2,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(7,'13','6137-8124',1,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(8,'13','94120-9638',2,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(9,'13','1183-5076',1,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(10,'13','93824-5161',2,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(11,'13','6521-4730',1,'2018-04-15 09:09:42','2018-04-15 09:09:42'),(12,'13','97480-1961',2,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(13,'13','5718-0213',1,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(14,'13','92576-1901',2,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(15,'13','1103-5267',1,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(16,'13','91916-8752',2,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(17,'13','8206-9741',1,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(18,'13','95942-3087',2,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(19,'13','3451-7982',1,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(20,'13','91024-6173',2,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(21,'13','5360-1791',1,'2018-04-15 09:09:43','2018-04-15 09:09:43'),(22,'13','34792931',2,'2018-05-13 04:40:24','2018-05-14 06:41:50'),(23,'13','34792931',1,'2018-05-13 04:40:25','2018-05-14 06:41:50'),(24,'31','31231231232',2,'2018-05-26 16:42:54','2018-05-26 16:42:54'),(25,'13','1231232321',1,'2018-05-26 16:42:54','2018-05-26 16:42:54'),(26,'13','12312312',2,'2018-05-28 00:35:22','2018-05-28 00:35:22');
/*!40000 ALTER TABLE `phones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `provided_services`
--

DROP TABLE IF EXISTS `provided_services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `provided_services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provider_id` int(10) unsigned NOT NULL,
  `service_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `client_id` int(10) unsigned NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'OPENED',
  `price` double DEFAULT NULL,
  `isPaid` blob,
  `isProviderRated` blob,
  `isClientRated` blob,
  `done_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `provided_services_provider_id_foreign` (`provider_id`),
  KEY `provided_services_service_id_foreign` (`service_id`),
  KEY `provided_services_category_id_foreign` (`category_id`),
  KEY `provided_services_client_id_foreign` (`client_id`),
  CONSTRAINT `provided_services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `provided_services_client_id_foreign` FOREIGN KEY (`client_id`) REFERENCES `users` (`id`),
  CONSTRAINT `provided_services_provider_id_foreign` FOREIGN KEY (`provider_id`) REFERENCES `users` (`id`),
  CONSTRAINT `provided_services_service_id_foreign` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `provided_services`
--

LOCK TABLES `provided_services` WRITE;
/*!40000 ALTER TABLE `provided_services` DISABLE KEYS */;
INSERT INTO `provided_services` VALUES (1,3,1,2,14,'CANCELLED',NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-14 08:02:17','2018-05-23 07:47:36'),(2,2,10,1,14,'CANCELLED',NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-16 08:01:49','2018-05-16 08:34:24'),(3,5,4,5,14,'DONE',150,'1','1','1','2018-05-25 08:46:52',NULL,'2018-05-25 03:26:48','2018-05-25 08:46:52'),(4,14,11,7,15,'DONE',300,'1','1','1','2018-05-26 16:55:22',NULL,'2018-05-26 16:44:00','2018-05-26 16:55:22'),(5,5,4,5,15,'REFUSED',NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-26 16:45:56','2018-05-26 16:46:33'),(6,14,11,7,15,'IN PROGRESS',350,'0','1',NULL,NULL,NULL,'2018-05-26 17:40:18','2018-05-28 02:11:50'),(7,15,13,7,14,'IN PROGRESS',NULL,NULL,NULL,NULL,NULL,NULL,'2018-05-28 02:21:49','2018-05-28 02:22:00');
/*!40000 ALTER TABLE `provided_services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rates`
--

DROP TABLE IF EXISTS `rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provided_service_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `rate` decimal(3,1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rates_provided_service_id_foreign` (`provided_service_id`),
  KEY `rates_user_id_foreign` (`user_id`),
  CONSTRAINT `rates_provided_service_id_foreign` FOREIGN KEY (`provided_service_id`) REFERENCES `provided_services` (`id`),
  CONSTRAINT `rates_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rates`
--

LOCK TABLES `rates` WRITE;
/*!40000 ALTER TABLE `rates` DISABLE KEYS */;
INSERT INTO `rates` VALUES (4,3,14,5.0,'2018-05-25 08:40:58','2018-05-25 08:40:58'),(6,3,5,4.0,'2018-05-25 08:46:52','2018-05-25 08:46:52'),(7,4,14,4.0,'2018-05-26 16:45:20','2018-05-26 16:45:20'),(8,4,15,5.0,'2018-05-26 16:45:27','2018-05-26 16:45:27'),(9,6,14,4.0,'2018-05-26 17:41:24','2018-05-26 17:41:24');
/*!40000 ALTER TABLE `rates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  KEY `role_user_user_id_foreign` (`user_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,NULL,NULL),(2,2,2,NULL,NULL),(3,2,3,NULL,NULL),(4,2,4,NULL,NULL),(5,2,5,NULL,NULL),(6,2,6,NULL,NULL),(7,2,7,NULL,NULL),(8,2,8,NULL,NULL),(9,2,9,NULL,NULL),(10,2,10,NULL,NULL),(11,2,11,NULL,NULL);
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','Do everything.','2018-04-15 09:09:38','2018-04-15 09:09:38'),(2,'Client','Ask for services.','2018-04-15 09:09:38','2018-04-15 09:09:38'),(3,'Provider','Provide services.','2018-04-15 09:09:38','2018-04-15 09:09:38');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `services` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `services_user_id_foreign` (`user_id`),
  KEY `services_category_id_foreign` (`category_id`),
  CONSTRAINT `services_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  CONSTRAINT `services_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `services`
--

LOCK TABLES `services` WRITE;
/*!40000 ALTER TABLE `services` DISABLE KEYS */;
INSERT INTO `services` VALUES (1,'Professor de matemática','Ensino matemática para crianças e adolescentes.',3,2,'2018-04-21 04:57:32','2018-04-21 04:57:35'),(2,'Confeiteiro','Trabalho com bolos e doces para festas.',4,1,'2018-04-21 05:13:57','2018-04-21 05:13:53'),(3,'Pedreiro','Trabalho em reformas.',3,3,'2018-04-21 05:14:52','2018-04-21 05:14:55'),(4,'Advogado','Trabalho na área da advocacia civil.',5,5,'2018-04-21 06:13:01','2018-04-21 06:12:58'),(5,'Motorista de carro','Trabalho com caronas entre bairros ou cidades.',3,6,'2018-04-21 06:13:54','2018-04-21 06:13:57'),(6,'Designer gráfico','Trabalho com criação de panfletos e banners.',6,4,'2018-04-21 06:15:04','2018-04-21 06:15:09'),(7,'Designer web','Trabalho como desenvolvedor front-end.',6,7,'2018-04-21 06:16:38','2018-04-21 06:16:41'),(8,'Desenvolvedor full stack','Trabalho tanto com o front-end quanto com o back-end.',7,7,'2018-04-21 06:17:15','2018-04-21 06:17:19'),(9,'DBA','Trabalho com a administração de banco de dados MySQL.',7,7,'2018-04-21 06:17:55','2018-04-21 06:17:57'),(10,'Padeiro','Faço pães',2,1,NULL,NULL),(11,'Programador PHP','Programação com o framework Laravel',14,7,'2018-05-14 08:38:58','2018-05-14 08:38:58'),(13,'Desenvolvedor Web','Trabalho com CSS + SCSS.',15,7,'2018-05-28 02:21:34','2018-05-28 02:21:34');
/*!40000 ALTER TABLE `services` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` char(2) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipcode` char(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `neighbourhood` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `about` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_cpf_unique` (`cpf`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@misservices.com','$2y$10$F2Hux1KPfwP6tocuYPqRiO9gJCR7l4KBPUCSRtA0.roWD8hOs6pGu','00000000000','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39','4OTSu4dovr7QRhmiyvWbtDMgFazJaacT7t12xW8Mhkg9MO1vJhFFSsYbXBUW',NULL,NULL),(2,'Cliente 1','client1@misservices.com','$2y$10$w5qpXaayEtj9fsO0a4I6fuuXYaT2HFPOjb.4IgCOMDsydm7r1GH8m','91385760142','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39','rxKA258Hi66c946mWRtBuKX7eKKHVGqZlSeCAMq4CBIoV3Ym3ShExZrcpfOQ','Eu sou o Cliente 1 e sei fazer...',NULL),(3,'Cliente 2','client2@misservices.com','$2y$10$oc//h2SdvE1LMdZmkidjd.MI41AE1iZOQy9brbsKEIqjg0UPf4i.K','53198706124','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39',NULL,NULL,NULL),(4,'Cliente 3','client3@misservices.com','$2y$10$z9fwlHxBU3WFCqTrlwvK4.B49mx6rsWz7X9cKdRo3rIAop50hrtGq','19042675813','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:39','2018-04-15 09:09:39',NULL,NULL,NULL),(5,'Cliente 4','client4@misservices.com','$2y$10$7UP0zjNmyTtB4lXFqsRcXOe/8cXWHqOVe2CFDpRSi78ayaCTZLX2q','57840132196','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:40','2018-04-15 09:09:40','Egti4kzKoQLh5U9pPzskQyO03PepuACgc6CWlEKKif1a2q1xy2ZYiht0nhBv',NULL,NULL),(6,'Cliente 5','client5@misservices.com','$2y$10$mov9.AzPxfWbnBhhdefVK.wH/zLHV.mDW0lgk94dzGzOj03.ow/vG','51892137046','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:40','2018-04-15 09:09:40','3NKlLEeIMRntSPXtTbVZYxWRnCuir4t2QuVH8t7GUBZTU0U8pwPoEhgpwOG5',NULL,NULL),(7,'Cliente 6','client6@misservices.com','$2y$10$S1w/6I6odhKZIcGbobN01O9bgScE5FxoAvmXb2Mus4N7vbH.bNmo.','17831495620','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:40','2018-04-15 09:09:40',NULL,NULL,NULL),(8,'Cliente 7','client7@misservices.com','$2y$10$/XKjTMx6vlqM4R926o2zNesGOrGG/Ki5uiUo4YCUynAbkEeMte7OO','42905731681','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:40','2018-04-15 09:09:40',NULL,NULL,NULL),(9,'Cliente 8','client8@misservices.com','$2y$10$bsOVvUJVMG/PbdzkyZxMPuLw2FmqMUrfMXhuSGHV2xiSwBtC6wk0.','90581123647','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:40','2018-04-15 09:09:40',NULL,NULL,NULL),(10,'Cliente 9','client9@misservices.com','$2y$10$XonJIRwdbqVh1YBNnvCfP.cZkHSNhvjmL61fKfWK9tCNspqo4b/GK','15083764291','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:41','2018-04-15 09:09:41',NULL,NULL,NULL),(11,'Cliente 10','client10@misservices.com','$2y$10$oC3azXZpV7WCUJkNOEfSwuXCRoQGWL.ldASRWuJVQ2WbWo4VjiM.W','41279635801','SP','Praia Grande','11700100','Boqueirão','Praça 19 de Janeiro',NULL,'2018-04-15 09:09:41','2018-04-15 09:09:41',NULL,NULL,NULL),(14,'Leonardo Santos Severino','leonardossev@gmail.com','$2y$10$s1PwnPE02ETBObO5xXU.iO7o5krA/..H4Ix3mJi6HMDWGLZcg.wBK','39334982870','SP','Praia Grande','11706360','Caiçara','Rua Mathilde de Azevedo Setubal, 564',NULL,'2018-05-13 04:40:24','2018-05-26 16:47:32','opwf853R8j7feEoKfFTVO45cQNYG1aTWjRRp67qajgfyTQqwr8cGFAyMFzhb','Eu programo em PHP. E gosto de MySQL. Eu também programo em JS.','14leonardo-santos-severino.jpeg'),(15,'Jonatas','jonatas@gmail.com','$2y$10$l/qpwtyTtzf8VQJLUb3MDeUEm9526Hopgb0h480LmF/NvPYIRD19W','32132131231','SP','Praia Grande','11706360','Caiçara','Rua Mathilde de Azevedo Setúbal',NULL,'2018-05-26 16:42:54','2018-05-26 16:42:54','WCFq2MmockQMB5HD6bne54GOAHpUKzo8JWd9g2RktIVno7tKJnlefJ7T13Ri',NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-27 23:37:56
