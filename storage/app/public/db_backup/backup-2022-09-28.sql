-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: laravel
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `activity_log`
--

DROP TABLE IF EXISTS `activity_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activity_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `log_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint unsigned DEFAULT NULL,
  `causer_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint unsigned DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject` (`subject_type`,`subject_id`),
  KEY `causer` (`causer_type`,`causer_id`),
  KEY `activity_log_log_name_index` (`log_name`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activity_log`
--

LOCK TABLES `activity_log` WRITE;
/*!40000 ALTER TABLE `activity_log` DISABLE KEYS */;
INSERT INTO `activity_log` VALUES (1,'default','created','App\\Models\\User','created',1,NULL,NULL,'{\"attributes\": {\"id\": 1, \"email\": \"fujycuqara@mailinator.com\", \"mobile\": 0, \"address\": null, \"is_admin\": 0, \"password\": \"$2y$10$aqIwSPgpHWY69/6CmNhm7O4DLOUjB5Xr0BSLC/nJlTsAuo0pOIpeG\", \"username\": \"vygahuran\", \"apartment\": null, \"last_name\": \"Carr\", \"created_at\": \"2022-09-28T09:42:26.000000Z\", \"first_name\": \"Shoshana\", \"updated_at\": \"2022-09-28T09:42:26.000000Z\", \"user_color\": \"#F25757\", \"money_per_hour\": 150, \"remember_token\": null, \"email_verified_at\": null}}',NULL,'2022-09-28 09:42:26','2022-09-28 09:42:26'),(2,'default','updated','App\\Models\\User','updated',1,'App\\Models\\User',1,'{\"old\": {\"id\": 1, \"email\": \"fujycuqara@mailinator.com\", \"mobile\": 0, \"address\": null, \"is_admin\": 0, \"password\": \"$2y$10$aqIwSPgpHWY69/6CmNhm7O4DLOUjB5Xr0BSLC/nJlTsAuo0pOIpeG\", \"username\": \"vygahuran\", \"apartment\": null, \"last_name\": \"Carr\", \"created_at\": \"2022-09-28T09:42:26.000000Z\", \"first_name\": \"Shoshana\", \"updated_at\": \"2022-09-28T09:42:26.000000Z\", \"user_color\": \"#F25757\", \"money_per_hour\": 150, \"remember_token\": null, \"email_verified_at\": null}, \"attributes\": {\"id\": 1, \"email\": \"fujycuqara@mailinator.com\", \"mobile\": 730681670, \"address\": null, \"is_admin\": 1, \"password\": \"$2y$10$aqIwSPgpHWY69/6CmNhm7O4DLOUjB5Xr0BSLC/nJlTsAuo0pOIpeG\", \"username\": \"vygahuran\", \"apartment\": null, \"last_name\": \"Carr\", \"created_at\": \"2022-09-28T09:42:26.000000Z\", \"first_name\": \"Shoshana\", \"updated_at\": \"2022-09-28T09:42:53.000000Z\", \"user_color\": \"#F25757\", \"money_per_hour\": 150, \"remember_token\": null, \"email_verified_at\": null}}',NULL,'2022-09-28 09:42:53','2022-09-28 09:42:53'),(3,'default','created','App\\Models\\Company','created',1,'App\\Models\\User',1,'{\"attributes\": {\"id\": 1, \"name\": \"Abra Guzman\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-04 10-53-41.png\", \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T09:58:22.000000Z\", \"company_color\": \"#abb27e\"}}',NULL,'2022-09-28 09:58:22','2022-09-28 09:58:22'),(4,'default','created','App\\Models\\Project','created',1,'App\\Models\\User',1,'{\"attributes\": {\"id\": 1, \"name\": \"Sunt dolorem fuga\", \"is_done\": 0, \"company_id\": 1, \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T09:58:22.000000Z\", \"type_of_job\": \"Inventore velit qui\", \"street_address\": \"Modi quo rerum occae\", \"address_latitude\": null, \"address_longitude\": null}}',NULL,'2022-09-28 09:58:22','2022-09-28 09:58:22'),(5,'default','created','App\\Models\\ProjectUsers','created',1,'App\\Models\\User',1,'{\"attributes\": {\"id\": 1, \"user_id\": 1, \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"project_id\": 1, \"updated_at\": \"2022-09-28T09:58:22.000000Z\"}}',NULL,'2022-09-28 09:58:22','2022-09-28 09:58:22'),(6,'default','created','App\\Models\\Project','created',2,'App\\Models\\User',1,'{\"attributes\": {\"id\": 2, \"name\": \"Etadipiscivoluptat\", \"is_done\": 0, \"company_id\": 1, \"created_at\": \"2022-09-28T09:59:55.000000Z\", \"updated_at\": \"2022-09-28T09:59:55.000000Z\", \"type_of_job\": \"Reprehenderit labor\", \"street_address\": \"Provident accusanti\", \"address_latitude\": null, \"address_longitude\": null}}',NULL,'2022-09-28 09:59:55','2022-09-28 09:59:55'),(7,'default','created','App\\Models\\User','created',2,'App\\Models\\User',1,'{\"attributes\": {\"id\": 2, \"email\": \"veguwahu@mailinator.com\", \"mobile\": 85, \"address\": \"Laboriosam iure dol\", \"is_admin\": 0, \"password\": \"$2y$10$detD1QA2EfESuBf3U26BW.LJYcVB9X/QWzfA6MdzhkS01inZH.EC.\", \"username\": \"Quod est officia qui\", \"apartment\": \"19/7\", \"last_name\": \"Griffith\", \"created_at\": \"2022-09-28T10:02:32.000000Z\", \"first_name\": \"Lewis\", \"updated_at\": \"2022-09-28T10:02:32.000000Z\", \"user_color\": \"#F25757\", \"money_per_hour\": 56, \"remember_token\": null, \"email_verified_at\": null}}',NULL,'2022-09-28 10:02:32','2022-09-28 10:02:32'),(8,'default','created','App\\Models\\ProjectUsers','created',2,'App\\Models\\User',1,'{\"attributes\": {\"id\": 2, \"user_id\": 2, \"created_at\": \"2022-09-28T10:02:44.000000Z\", \"project_id\": 1, \"updated_at\": \"2022-09-28T10:02:44.000000Z\"}}',NULL,'2022-09-28 10:02:44','2022-09-28 10:02:44'),(9,'default','created','App\\Models\\Company','created',2,'App\\Models\\User',1,'{\"attributes\": {\"id\": 2, \"name\": \"CZC\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-05 10-08-50.png\", \"created_at\": \"2022-09-28T10:04:47.000000Z\", \"updated_at\": \"2022-09-28T10:04:47.000000Z\", \"company_color\": \"#60a3a5\"}}',NULL,'2022-09-28 10:04:47','2022-09-28 10:04:47'),(10,'default','updated','App\\Models\\Company','updated',1,'App\\Models\\User',1,'{\"old\": {\"id\": 1, \"name\": \"Abra Guzman\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-04 10-53-41.png\", \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T09:58:22.000000Z\", \"company_color\": \"#abb27e\"}, \"attributes\": {\"id\": 1, \"name\": \"Boheka\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-04 10-53-41.png\", \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T10:04:54.000000Z\", \"company_color\": \"#abb27e\"}}',NULL,'2022-09-28 10:04:54','2022-09-28 10:04:54'),(11,'default','updated','App\\Models\\Company','updated',1,'App\\Models\\User',1,'{\"old\": {\"id\": 1, \"name\": \"Boheka\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-04 10-53-41.png\", \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T10:04:54.000000Z\", \"company_color\": \"#abb27e\"}, \"attributes\": {\"id\": 1, \"name\": \"Boheka\", \"cover_path\": \"/storage/companies/Screenshot from 2022-08-05 10-08-50.png\", \"created_at\": \"2022-09-28T09:58:22.000000Z\", \"updated_at\": \"2022-09-28T10:04:54.000000Z\", \"company_color\": \"#abb27e\"}}',NULL,'2022-09-28 10:04:54','2022-09-28 10:04:54'),(12,'default','created','App\\Models\\ProjectUsers','created',3,'App\\Models\\User',1,'{\"attributes\": {\"id\": 3, \"user_id\": 1, \"created_at\": \"2022-09-28T10:05:00.000000Z\", \"project_id\": 2, \"updated_at\": \"2022-09-28T10:05:00.000000Z\"}}',NULL,'2022-09-28 10:05:00','2022-09-28 10:05:00'),(13,'default','created','App\\Models\\Project','created',3,'App\\Models\\User',1,'{\"attributes\": {\"id\": 3, \"name\": \"Atque et aspernatur\", \"is_done\": 0, \"company_id\": 2, \"created_at\": \"2022-09-28T10:05:06.000000Z\", \"updated_at\": \"2022-09-28T10:05:06.000000Z\", \"type_of_job\": \"Ipsum quia qui amet\", \"street_address\": \"Tempor dolor distinc\", \"address_latitude\": null, \"address_longitude\": null}}',NULL,'2022-09-28 10:05:06','2022-09-28 10:05:06'),(14,'default','created','App\\Models\\WorkTime','created',1,'App\\Models\\User',1,'{\"attributes\": {\"id\": 1, \"job\": \"Distinctio Magni et\", \"date\": \"1972-05-19\", \"hours\": 8, \"user_id\": 2, \"employee\": \"Lewis Griffith\", \"created_at\": \"2022-09-28T10:07:49.000000Z\", \"project_id\": 2, \"updated_at\": \"2022-09-28T10:07:49.000000Z\", \"project_name\": \"Etadipiscivoluptat\", \"money_per_hour\": 150}}',NULL,'2022-09-28 10:07:49','2022-09-28 10:07:49'),(15,'default','created','App\\Models\\WorkTime','created',2,'App\\Models\\User',1,'{\"attributes\": {\"id\": 2, \"job\": \"In consectetur offic\", \"date\": \"2021-02-22\", \"hours\": 8, \"user_id\": 2, \"employee\": \"Lewis Griffith\", \"created_at\": \"2022-09-28T10:07:57.000000Z\", \"project_id\": 2, \"updated_at\": \"2022-09-28T10:07:57.000000Z\", \"project_name\": \"Etadipiscivoluptat\", \"money_per_hour\": 200}}',NULL,'2022-09-28 10:07:57','2022-09-28 10:07:57'),(16,'default','created','App\\Models\\WorkTime','created',3,'App\\Models\\User',1,'{\"attributes\": {\"id\": 3, \"job\": \"Perferendis molestia\", \"date\": \"2011-02-17\", \"hours\": 8, \"user_id\": 1, \"employee\": \"Shoshana Carr\", \"created_at\": \"2022-09-28T10:08:04.000000Z\", \"project_id\": 3, \"updated_at\": \"2022-09-28T10:08:04.000000Z\", \"project_name\": \"Atque et aspernatur\", \"money_per_hour\": 250}}',NULL,'2022-09-28 10:08:04','2022-09-28 10:08:04');
/*!40000 ALTER TABLE `activity_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `authentication_log`
--

DROP TABLE IF EXISTS `authentication_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `authentication_log` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `authenticatable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `authenticatable_id` bigint unsigned NOT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `login_at` timestamp NULL DEFAULT NULL,
  `logout_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `authentication_log_authenticatable_type_authenticatable_id_index` (`authenticatable_type`,`authenticatable_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `authentication_log`
--

LOCK TABLES `authentication_log` WRITE;
/*!40000 ALTER TABLE `authentication_log` DISABLE KEYS */;
INSERT INTO `authentication_log` VALUES (1,'App\\Models\\User',1,'127.0.0.1','Mozilla/5.0 (X11; Linux x86_64; rv:104.0) Gecko/20100101 Firefox/104.0','2022-09-28 09:42:26',NULL);
/*!40000 ALTER TABLE `authentication_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `companies`
--

DROP TABLE IF EXISTS `companies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `companies` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `cover_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#F25757',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `companies`
--

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;
INSERT INTO `companies` VALUES (1,'/storage/companies/Screenshot from 2022-08-05 10-08-50.png','Boheka','#abb27e','2022-09-28 09:58:22','2022-09-28 10:04:54'),(2,'/storage/companies/Screenshot from 2022-08-05 10-08-50.png','CZC','#60a3a5','2022-09-28 10:04:47','2022-09-28 10:04:47');
/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2014_10_12_100000_create_password_resets_table',1),(3,'2017_09_01_000000_create_authentication_log_table',1),(4,'2019_08_19_000000_create_failed_jobs_table',1),(5,'2019_12_14_000001_create_personal_access_tokens_table',1),(6,'2022_06_30_194653_create_companies_table',1),(7,'2022_06_30_194654_create_projects_table',1),(8,'2022_06_30_194655_create_work_times_table',1),(9,'2022_07_23_073114_project_users_pivot_table',1),(10,'2022_09_17_082357_create_activity_log_table',1),(11,'2022_09_17_082358_add_event_column_to_activity_log_table',1),(12,'2022_09_17_082359_add_batch_uuid_column_to_activity_log_table',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `project_users`
--

DROP TABLE IF EXISTS `project_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `project_users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `project_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_users_project_id_foreign` (`project_id`),
  KEY `project_users_user_id_foreign` (`user_id`),
  CONSTRAINT `project_users_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `project_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `project_users`
--

LOCK TABLES `project_users` WRITE;
/*!40000 ALTER TABLE `project_users` DISABLE KEYS */;
INSERT INTO `project_users` VALUES (1,1,1,'2022-09-28 09:58:22','2022-09-28 09:58:22'),(2,1,2,'2022-09-28 10:02:44','2022-09-28 10:02:44'),(3,2,1,'2022-09-28 10:05:00','2022-09-28 10:05:00');
/*!40000 ALTER TABLE `project_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `projects`
--

DROP TABLE IF EXISTS `projects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `projects` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `company_id` int unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_of_job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_done` tinyint(1) NOT NULL DEFAULT '0',
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_latitude` double DEFAULT NULL,
  `address_longitude` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `projects_company_id_foreign` (`company_id`),
  CONSTRAINT `projects_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `projects`
--

LOCK TABLES `projects` WRITE;
/*!40000 ALTER TABLE `projects` DISABLE KEYS */;
INSERT INTO `projects` VALUES (1,1,'Sunt dolorem fuga','Inventore velit qui',0,'Modi quo rerum occae',NULL,NULL,'2022-09-28 09:58:22','2022-09-28 09:58:22'),(2,1,'Etadipiscivoluptat','Reprehenderit labor',0,'Provident accusanti',NULL,NULL,'2022-09-28 09:59:55','2022-09-28 09:59:55'),(3,2,'Atque et aspernatur','Ipsum quia qui amet',0,'Tempor dolor distinc',NULL,NULL,'2022-09-28 10:05:06','2022-09-28 10:05:06');
/*!40000 ALTER TABLE `projects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `mobile` int NOT NULL DEFAULT '0',
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `money_per_hour` double(8,2) NOT NULL DEFAULT '0.00',
  `user_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '#F25757',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Shoshana','Carr','fujycuqara@mailinator.com',NULL,'$2y$10$aqIwSPgpHWY69/6CmNhm7O4DLOUjB5Xr0BSLC/nJlTsAuo0pOIpeG',NULL,'2022-09-28 09:42:26','2022-09-28 09:42:53',730681670,'vygahuran',1,150.00,'#F25757',NULL,NULL),(2,'Lewis','Griffith','veguwahu@mailinator.com',NULL,'$2y$10$detD1QA2EfESuBf3U26BW.LJYcVB9X/QWzfA6MdzhkS01inZH.EC.',NULL,'2022-09-28 10:02:32','2022-09-28 10:02:32',85,'Quod est officia qui',0,56.00,'#F25757','Laboriosam iure dol','19/7');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_times`
--

DROP TABLE IF EXISTS `work_times`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `work_times` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned NOT NULL,
  `project_id` int unsigned NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `job` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hours` double(8,2) NOT NULL,
  `money_per_hour` double(8,2) NOT NULL DEFAULT '0.00',
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `work_times_user_id_foreign` (`user_id`),
  KEY `work_times_project_id_foreign` (`project_id`),
  CONSTRAINT `work_times_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `work_times_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_times`
--

LOCK TABLES `work_times` WRITE;
/*!40000 ALTER TABLE `work_times` DISABLE KEYS */;
INSERT INTO `work_times` VALUES (1,2,2,'Etadipiscivoluptat','Distinctio Magni et','Lewis Griffith',8.00,150.00,'1972-05-19','2022-09-28 10:07:49','2022-09-28 10:07:49'),(2,2,2,'Etadipiscivoluptat','In consectetur offic','Lewis Griffith',8.00,200.00,'2021-02-22','2022-09-28 10:07:57','2022-09-28 10:07:57'),(3,1,3,'Atque et aspernatur','Perferendis molestia','Shoshana Carr',8.00,250.00,'2011-02-17','2022-09-28 10:08:04','2022-09-28 10:08:04');
/*!40000 ALTER TABLE `work_times` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-09-28 13:18:13
