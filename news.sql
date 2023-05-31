-- MariaDB dump 10.19  Distrib 10.11.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: news
-- ------------------------------------------------------
-- Server version	10.11.2-MariaDB-1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `mobile` varchar(191) NOT NULL,
  `permission` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES
(1,'Jagran Admin','news@gmail.com','$2y$10$ipUx3I14ifYjeB.ONQAqs.idTcFtYfNZkIww84Q2F1JNLsvirbw92','8867675654','Manage Subadmin,Manage Advertisement,Manage Categories,Manage Footer,Manage News,Manage Header,Manage Logo,Manage Home Page'),
(2,'Md Kalam','kalam@gmail.com','$2y$10$eAZzkxDpvP07Qj5vMrEd0OSfPAWGpttjoO2BlyvzcPhuzahYsk8Qq','446446464',NULL),
(3,'Jagrati Patel','JP@jangannews.com','$2y$10$KaznOZcIAnWUKv88B6vgZ.cyxiFJmfJ4AkUMw4MGYs2l/6J9q2ZZm','9235541293','Manage Advertisement,Manage Categories,Manage News');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `advertisements`
--

DROP TABLE IF EXISTS `advertisements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `advertisements` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ads_type` enum('google','custom') NOT NULL DEFAULT 'custom',
  `image` varchar(255) DEFAULT NULL,
  `google_script` text DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `position` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `advertisements`
--

LOCK TABLES `advertisements` WRITE;
/*!40000 ALTER TABLE `advertisements` DISABLE KEYS */;
INSERT INTO `advertisements` VALUES
(1,'custom','1.jpg','','',NULL),
(2,'custom','2.png','','',NULL),
(3,'custom','3.jpg','','',NULL),
(4,'custom','4.jpg',NULL,NULL,'right'),
(5,'google','','<script async src=\"https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-1234567890123456\" crossorigin=\"anonymous\"></script>','',NULL),
(7,'google','','JHMKH',NULL,'right');
/*!40000 ALTER TABLE `advertisements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES
(1,'मनोरंजन',NULL),
(2,'क्रिकेट',NULL),
(3,'फूड',NULL),
(4,'प्रदेश',NULL),
(5,'नौकरी',NULL),
(6,'राजनीति-चुनाव',NULL),
(9,'टेक',NULL),
(10,'लाइफ',NULL),
(11,'दुनिया',NULL),
(12,'नॉलेज',NULL),
(13,'देश',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `header_banner`
--

DROP TABLE IF EXISTS `header_banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `header_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `header_banner`
--

LOCK TABLES `header_banner` WRITE;
/*!40000 ALTER TABLE `header_banner` DISABLE KEYS */;
INSERT INTO `header_banner` VALUES
(1,'7359383av.jpeg');
/*!40000 ALTER TABLE `header_banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_templates`
--

DROP TABLE IF EXISTS `home_templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `home_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `section` int(11) NOT NULL,
  `position` varchar(20) NOT NULL,
  `category` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_templates`
--

LOCK TABLES `home_templates` WRITE;
/*!40000 ALTER TABLE `home_templates` DISABLE KEYS */;
INSERT INTO `home_templates` VALUES
(1,'home',1,'left',1),
(2,'home',1,'middle',3),
(3,'home',1,'right',1),
(4,'home',2,'left',1),
(5,'home',2,'middle',3),
(6,'home',2,'right',1),
(7,'home',3,'left',1),
(8,'home',3,'middle',3),
(9,'home',3,'right',1),
(10,'home',4,'left',1),
(11,'home',4,'middle',1),
(12,'home',5,'left',1),
(13,'home',5,'middle',3),
(14,'home',5,'right',3),
(15,'home',6,'left',1),
(16,'home',6,'middle',3),
(17,'home',6,'right',3),
(18,'home',7,'left',1),
(19,'home',7,'right',3),
(20,'home',8,'left',1),
(21,'home',8,'middle',2),
(22,'home',8,'right',1),
(23,'home',7,'middle',2),
(24,'home',9,'left',2),
(25,'home',11,'left',2),
(26,'home',12,'left',1),
(27,'home',13,'left',2),
(28,'home',14,'left',1),
(29,'home',15,'left',2),
(30,'home',16,'left',1);
/*!40000 ALTER TABLE `home_templates` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `logo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `logo`
--

LOCK TABLES `logo` WRITE;
/*!40000 ALTER TABLE `logo` DISABLE KEYS */;
INSERT INTO `logo` VALUES
(1,'3289IMG-2023.png');
/*!40000 ALTER TABLE `logo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES
(1,'TRENDINGTOPICS'),
(2,'HOTON SOCIAL'),
(3,'POPULARCATEGORIES'),
(4,'LANGUAGESITES');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu_categories`
--

DROP TABLE IF EXISTS `menu_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu_categories`
--

LOCK TABLES `menu_categories` WRITE;
/*!40000 ALTER TABLE `menu_categories` DISABLE KEYS */;
INSERT INTO `menu_categories` VALUES
(30,1,2,'Politics'),
(31,2,3,'Sports'),
(32,3,4,'Religious'),
(33,4,1,'Entertainment');
/*!40000 ALTER TABLE `menu_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES
(1,'2019_12_14_000001_create_personal_access_tokens_table',1),
(2,'2023_03_31_111638_create_categories_table',1),
(3,'2023_04_01_102141_create_admins_table',2),
(4,'2023_04_24_122716_menu',3),
(5,'2023_05_29_195920_create_templates_table',4),
(6,'2023_05_26_075546_create_pages_table',5);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `title` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category` text NOT NULL,
  `subcategory` text DEFAULT NULL,
  `news_date` date NOT NULL,
  `image` varchar(255) NOT NULL,
  `latest_news` int(1) NOT NULL DEFAULT 0,
  `popular` int(1) NOT NULL DEFAULT 0,
  `breaking_news` varchar(20) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

LOCK TABLES `news` WRITE;
/*!40000 ALTER TABLE `news` DISABLE KEYS */;
INSERT INTO `news` VALUES
(9,'खूबसूरती में अली जफर की वाइफ के सामने फेल हैं बॉलीवुड एक्ट्रेसेस, फोटो देखी तो आप भी हो जाएंगे इनके फैन',NULL,'<p class=\"sp-descp\" data-detailexcerpt=\"बॉलीवुड में कई फिल्मों से अपने एक्टिंग के जौहर दिखा चुके पाकिस्तानी एक्टर और सिंगर अली जफर की पत्नी किन्हीं भी मायनों में बॉलीवुड हीरोइनों से कम नहीं हैं. यकीन न हो तो आप खुद ही देख लीजिए.\">बॉलीवुड में कई फिल्मों से अपने एक्टिंग के जौहर दिखा चुके पाकिस्तानी एक्टर और सिंगर अली जफर की पत्नी किन्हीं भी मायनों में बॉलीवुड हीरोइनों से कम नहीं हैं. यकीन न हो तो आप खुद ही देख लीजिए.</p>\r\n<p class=\"sp-descp\" data-detailexcerpt=\"बॉलीवुड में कई फिल्मों से अपने एक्टिंग के जौहर दिखा चुके पाकिस्तानी एक्टर और सिंगर अली जफर की पत्नी किन्हीं भी मायनों में बॉलीवुड हीरोइनों से कम नहीं हैं. यकीन न हो तो आप खुद ही देख लीजिए.\"><strong class=\"place_cont\">नई दिल्ली:&nbsp;</strong></p>\r\n<p>पाकिस्तानी एक्टर और सिंगर अली जफर (Ali Zafar) ने बॉलीवुड में अपना खूब नाम बनाया है. मेरे ब्रदर की दुल्हन, तेरे बिन लादेन, किल दिल और चश्मे बद्दूर जैसी फिल्मों में काम कर अपना नाम बना चुके अली जफर सिर्फ एक एक्टर ही नहीं बल्कि सिंगर, स्क्रीनराइटर, सॉन्ग राइटर और प्रोड्यूसर भी हैं. साल 2009 में अली ने&nbsp;<a href=\"https://www.instagram.com/ayeshafazli/\" rel=\"NOFOLLOW\">आयशा फाजली</a>&nbsp;से शादी की, आयशा खूबसूरती के मामले में किसी बॉलीवुड एक्ट्रेस से कम नहीं हैं. आयशा (Ayesha Fazli&nbsp;) की ताजा तस्वीरें देख आप भी इस बात को मान जाएंगे.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://c.ndtvimg.com/2023-05/a1se4j78_ali-zafar-wife_625x300_18_May_23.jpg\" alt=\"\" width=\"600\" height=\"369\"></p>\r\n<p>साल 2009 में अली जफर और आयशा की शादी हुई, सगाई के एक लंबे समय के बाद उनकी शादी हुई. अली जफर ने एक इंटरव्यू के दौरान बताया था कि उनकी पत्नी उन्हें काफी सपोर्ट करती हैं. अली जफर का कहना है कि आयशा समझती हैं कि एक एक्टर को किन-किन चीजों से गुजरना पड़ता है. आयशा हमेशा उनकी उलझनों को समझते हुए उन्हें स्पेस देती हैं.</p>\r\n<p>आयशा और अली बेहद हैप्पी कपल हैं, सोशल मीडिया पर भी अक्सर दोनों की तस्वीरें एक साथ सामने आती हैं और खूब पसंद की जाती हैं. इंस्टाग्राम बायो में आयशा ने अपनी पहचान लाइफ कोच, एनएलपी मास्टर प्रैक्टिशनर और हिप्नोथेरेपी मास्टर प्रैक्टिशनर बताई है.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://c.ndtvimg.com/2023-05/q7uqq1oo_ali-zafar-wife_625x300_18_May_23.jpg\" alt=\"\" width=\"600\" height=\"369\"></p>\r\n<p>आयशा लुक्स और ग्लैमर के मामले में बॉलीवुड की एक्ट्रेस को कड़ी टक्कर देती हैं. चाहे उनका देसी अवतार हो या फिर वेस्टर्न लुक आयशा हर रूप में बड़ी ही खूबसूरत नजर आती हैं. इस तस्वीर में आयशा पाकिस्तान के ट्रेडिशन आउटफिट में काफी एलीगेंट नजर आ रही हैं.</p>\r\n<p class=\"sp-descp\" data-detailexcerpt=\"बॉलीवुड में कई फिल्मों से अपने एक्टिंग के जौहर दिखा चुके पाकिस्तानी एक्टर और सिंगर अली जफर की पत्नी किन्हीं भी मायनों में बॉलीवुड हीरोइनों से कम नहीं हैं. यकीन न हो तो आप खुद ही देख लीजिए.\">&nbsp;</p>','1',NULL,'2023-05-21','63915jiu01jo_ali-zafar-wife_625x300_18_May_23.webp',1,1,NULL,1,'2023-05-21 13:52:52'),
(10,'29 साल की अभिनेत्री सुचंदा दासगुप्ता का निधन, ट्रक ने बाइक को रौंदा, मौके पर गई जान',NULL,'<p class=\"sp-descp\" data-detailexcerpt=\"एंटरटेनमेंट इंडस्ट्री से दुखद खबर सामने आ रही है. खबरों की मानें तो बंगाल की मशहूर एक्ट्रेस सुचंद्रा दासगुप्ता का रोड एक्सीडेंट में निधन हो गया है. यह एक्सीडेंट इतना भयानक था कि एक्ट्रेस की मौके पर ही जान चली गई.\"><strong class=\"place_cont\">नई दिल्ली : </strong>एंटरटेनमेंट इंडस्ट्री से दुखद खबर सामने आ रही है. खबरों की मानें तो बंगाल की मशहूर एक्ट्रेस सुचंद्रा दासगुप्ता का रोड एक्सीडेंट में निधन हो गया है. यह एक्सीडेंट इतना भयानक था कि एक्ट्रेस की मौके पर ही जान चली गई.</p>\r\n<p class=\"sp-descp\" data-detailexcerpt=\"एंटरटेनमेंट इंडस्ट्री से दुखद खबर सामने आ रही है. खबरों की मानें तो बंगाल की मशहूर एक्ट्रेस सुचंद्रा दासगुप्ता का रोड एक्सीडेंट में निधन हो गया है. यह एक्सीडेंट इतना भयानक था कि एक्ट्रेस की मौके पर ही जान चली गई.\">एंटरटेनमेंट इंडस्ट्री से दुखद खबर सामने आ रही है. खबरों की मानें तो बंगाल की मशहूर एक्ट्रेस सुचंद्रा दासगुप्ता का रोड एक्सीडेंट में निधन हो गया है. यह एक्सीडेंट इतना भयानक था कि एक्ट्रेस की मौके पर ही जान चली गई.</p>\r\n<p class=\"sp-descp\" data-detailexcerpt=\"एंटरटेनमेंट इंडस्ट्री से दुखद खबर सामने आ रही है. खबरों की मानें तो बंगाल की मशहूर एक्ट्रेस सुचंद्रा दासगुप्ता का रोड एक्सीडेंट में निधन हो गया है. यह एक्सीडेंट इतना भयानक था कि एक्ट्रेस की मौके पर ही जान चली गई.\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBYWFRgWFhYZGRgaHB4dHRwcHBwcHBweHh4cIRodHBwhIS4lIR4rIRwcJzgmKy8xNTU1HCQ7QDs0Py40NTEBDAwMBgYGEAYGEDEdFh0xMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMTExMf/AABEIALcBEwMBIgACEQEDEQH/xAAcAAACAgMBAQAAAAAAAAAAAAAEBQIDAAEGBwj/xAA+EAACAQMDAgQDBQcDBAEFAAABAhEAAyEEEjFBUQUiYXEGE4EykaGxwQcUQlLR4fAjYvFygpKiFRYkM1NU/8QAFAEBAAAAAAAAAAAAAAAAAAAAAP/EABQRAQAAAAAAAAAAAAAAAAAAAAD/2gAMAwEAAhEDEQA/AO/vOoI7mtIT1oV3VmGJjj3zVqOZOOgzQWjFXM1C/MzyMDr3qTPIn24oJXHI4OKE1N5htJYwD5o9YA/Or7oODB9sVWyE9PvoJ6l8nE8D76AuFd5B7g/hittqzBWCWgZ+pHT2n60Glss8MrEk4PTgTNAxt6j+SMVK47EgmccAdfvqtbezAXrWmuQe8dD+lBdpn3AjG7+L0MYmlXiDvtMiOM/WidZedMqs5z/WoW9St1cnI5FBLR3yR5s0ztujCO3f86VvfRQf0qdu+jKAOABmgZ2UGYjnpU3tGIBilQ1wG0KYY9D1FGJrnJXyYI80EGKCL23XcwiIJzmhDec21j7bLMARgzwDRmqus6sFgSIB55ocI0hYhQAJjn2+lBRYOpZ7TPbCQvmbejfhMzWvFfEvlo1x1LKmfKJaOuKOfSqGleetBvozLbRE8+3tQU+HO5tpvwzDc24mQWzHsJj6Vl+1u5NTIIkNBPQistJzOZxQLbBe05DhmQiQRmI4kc+mK0l52JcoQszEZj0p1Y25wO1Se6gX26elAh1Gqt79u+IHWee1VaXVo7EKJMEAHE+x+lXX9Ml0s5YBu3GPSoaDw1IIJzyPp1FAOl4Eyw2H/MTRqHcNpyelItZq4clgR5j9nJHtTDQ+KoX4IxiQZ96BppVYs6sMKwA9RAM/j+FQuaczMkATii7GvttkE9uK2iI2RME5mgUPZVY8xbImenrRKusZiZom74bukqT+lVfubAEbZMD2nvQUowDGIqvW+JLaALznGB2zUL7XlMG2InnrQl3T3L23dGwMcRkbcf1oGP78jZIYT0IyPxrVKv3u5/8Azgf95H6VlB14TbBmQDTLTXlakY1U290qxkxtnMNGJq/TufthWHEg96Bz8sRBgzM1IwBAA9KAGq80SOPxog3RHNBIX8gQcj7j2qwkUDqNYEUtBaCMDnJirdRdYAlQJ6TQas2VWQADuz/et2rcMfLn+mKpe4waVgHbHfrRGm1JYCcHqKCb25B5BodNLInk55/Sit/P4VNWgHr2FADeSFOC2Ps9/rx99INd4Q5fyHaPWZj3H0xXYiKiLYNBy1nw5eHuMZ6hYH3niiP3EKwVGletPUsCBuAJ7x1qu9YUAsBDASIgGgTv4MSdwfNUnw66NuYz0M5rowmO9edftK+MflTpdOYuEedhygIwq/7iOvQH1wFvjfximmbYH+bcB+ysYP8Aubge3Ncd4j8S6y8P9W8yKf4E8uPUjzfjVfwX4D8597yFGWY9B1M1X8S31+YwRF2gwDukwKBemqZTKu4PcOwP3zNMNL8X6y19m+zL/K/nEe5yPvpEXz2qp3oPWfAvjCxqEIddl+MryHA/lPU+nNO01Ixtk4mIIrwZbpUhlMEGQRyCK9Z+GPiIajTguQLiEK5/m52t6AgfeDQdTb4P8xzHaqnBggge4qhNwMqekfln8Ku3EmT6zQAu6BQODM+/ahvn7TIfb/Q+lNF8P+YPsjg+9B+IeDttZ8HbGIzEf2oKNPpUuGSACfWYjrTLRaPYxcEZERiOlc9oLDs6lMQeRwB7V22lsqRkTQULYRokAe0CiremUYFWC0i8CoOYg0EtnmgYitXFIM80C+puKGZVkgGF7x0GKIS47QG8vp1oKdSrMynpPSgrSQyr080+pJmm4QiZM9qX6vTMQYx60CttMASPNyf4j1M1lWXAJ+32/KsoCrVi4gCCFQfU88H0rYRll3YgRBWcekRRPip2NtD4J94/2k96XNfjyGJZZyCR+GOlAVZMDBnPM/57UYyOQIEHkkGSPvpOllxhWHMt05+tFJcdEB3g5OI6e9Ba77D52GSOoyTgDtNbbWhicHoO34UJedSF3JIJGQpMHkMY9etZbBYmDgE/nQF/v4AkAmBGR27VZZ16xMkT/kUPKg5MdjwPvodrcjbJMtJPf7qBq2qg9QCRnvPSrbt8wYMRSfUqd3JxGO/aaKV5EZExOJE0DC3r8gEgk8R1jmiU1iSRuEnp9KQ2rMeQk8zM5n9Ku+Wvlk5yN05560DlryuBDRnpVj5BE/Wuf0W3KviDhgcGO/aiW1Kj7Lz1oB/jL4k/crG8QXbCKeCRE/nMeleZeBfB2o1rHUXSQHYsSftNOZ9q6Px+w2v1tmwZ+VbT5jj+YliAPrtj2mvQ9HZ2oABAAAjtQK/CvhhLVk2xkN9r1rzf42+En0/+omUnPcV7OhMUB4vovmoUYAjsetB813Gqkmul+JPADYuMpBAkkT1HSubYQaCNdf8As81YS7dVhKtaOPUEQR7Sa5Cup/Z67DVgKoYsjKAeMxn8KD1TSMCqscE8gZj/AJq5nH0qsOFk7AGCAsJ6jBANVWd0EtEQNvePWga+FXwRjr+XSjtQylYOR61z2mYq0Akf5xTy3bDKJzQLEVAIED1/KjtBiR0IqD6JBwPvzn2qhb4QgNktxzQMHMkxVd5CBgj179P70O+tIYwCRH+H9Khc1pG2VyTECgJS20jn3FEulCaS8Scngcfmaue5hlByOT2kYoKrzNmOg696p8QJgAHPp91ZqHIiDyQPxpfq9eFBgljzA6DJOeOBQWNpZ9fespT/APUHZG+/+1ZQdXY8HD7Wf/uBievEdJoe6bVslC4MNGRkT0n0nmmvgo/0wPNz15iYE0P4noE3O0A7hJHE/X6UCy5aQkggZ7de2apvXFWJbHAGPzorTaMznGAAOYA9fXFBavQgtsKlhEyOnb60G7F9FUoHk9BMn/iorfTpyOeg+tTt+EblUs0bR2yR6+tV3vBmGFyDwZ/P76CNm4jQskgk4mYiTnM1vVXUCyJkRjrBMGO8UO/h4RQTOftbegJj7s/hRmk0CJlZOIM0ErexpO7sZnirVQhsOIPpUbdhBIjBOQMTmo3uMdPwoKbtkl2JdskwBie2f0q1rUge1CpfEEluCRx61a7GJ6RQRdCBEbzx045yZmautWEYyJAjmoG8iJvIJ446nGJ6f2onQWkZNyEkZgN09J96DlvG/Frmivb0RGNxFBkGSqFuI4HmNNfhn47XUPtZCrDO0kEH2NI/jTTMFDXD5irKpUttUmCCRyeKS/s78IuPrEEysMXImBjqfcig73xD4+t2XZSjMQeFGPvNWeHftBtXjHymH/cs/dNcX8c+E3EubohC0bowKVtbuIVtoLb2mUHcVAZWIzDL5gZoPSfiHT2NWhXIbpIhhXi3j3hT2HIYYPBr1f4d8M1O1TcmIxOav+Kfh5b1hxHmAkH1FB4ZXQfBOrFvV2yR9ohAegLEAE/l9ah4P4ftuo11Ayg/ZbhiOAfT86N+J9UGvo4tpbcBQyooRSQxIO0cHbtzQeveIaEuh2QDzkSDHGPc1GNqqjkbiBiZpizwo6MRjsKy6UIBIk0CVlAb/IpjobvScngUBrLo3GAY9PxqjR61VdQe/P8AegdtdKTuE0LqNasj060RqlNweUwCRn0kT+FK9fbCviYoLnWZIPNCvcKglj1wPTvU0vQrQC3YDkntmqXtsSZETQYNcYxTK9dAthpgmKVWbBYbgDtPXuaNVGZ0JYABcqYgEHk+tAOmrk5nH4VWybkO3BaQSf6e1UeN6oh2Kqc9cZ9fbihbdy7tAdgCcgAZoNjwwdz+VZWrmlck5rKDqrO4gQ7CFaIPf2o12d2kwcCBxnk0utWyyhgenApUNW5chmbH3dvyoOpRTmFPA7Z/H0pcxh23OM/eJ4BqQ121AgYKMZPI6tA69fvpciWnYljgcAmJnj6iga22gsCVJ6EHp7d+a2MZ3gE9JxHtSZrarLKTjIPaKtGm3orwN2yJI56iaBgzRkkZwODie3aKgscKPX0mkSlyYPIkQMRH/FGaR2yrGCeCOfX0oCnJnzCD+fqKpSzvJVpG0Tjr0j3q5FUiPtBSRM/fms09p93lbJg5HQN5s+oNAq1fhkH/AE9xmcSMev41u0lxFVGWfMRO6eTGab/J85K7iRjB+hOcdaMFt0gfbUd+eOfU0CjWgbGSAJHfr0+tF+GHagAIBAEBuJOTR9m0l0HeoO08QDkdasSwgOEEOYOOoBg/cKAG/ord9St0KRP0n0ph8N6Gza37IA49T3rkvie+9hyqmEfKnt3H0P5ik+v8Rv2totsW3IuRJg9THXmg9I8S09t1KXFlWxng/Wkuh+BNPbfeCzAGQCeO3vQWjv6m5Zm+wBUeUKIJPds/hVmi8dYiCcjmg607VEClmtMqw7giqF1ZNWOYEmg4XX/DKbmv3GKJbUeWR5golmnpXmz6s3L5uspYFt22Yx0H0EfdXbfH/wAYrctnS2lYebzseoGQo9zBPtXBaG2zXERftOwUe7GB+dB75a1AIgjgSJ+oohL6woOJ6DmgmsGSpY7RiR3IH+fWpC3skkCMdZ6RLfX86C/VWzB4jJHp6TXP3gNxAH60+0muS+qqcOMwJAMdR6VtvCELFiTP+YoA/A7zYUnoee1E3LJZjNAPrETzoQGA27CMwTM+9VJ4sZXdkTJjE9vpQO9PpFUAdTVtt7TMUVgXEAggjJyNs8/Sln/yIdiFDDiD/nFFoiStxiPKDB7/ANx096Cz5q7/AJSidqmT2KwCI+vNJ/GYSCo5b7XcDkfU1RptUyXAwOWYzImdx/vQvjGoe4+zhFMARmRzJoHWnsIyLuKltvcGN2YPtx9KSae87sYSBkKeIE4x35oL91eQI7f2oq7euhAgIAA5C+aOxNBXd8TAJG6Y6iM1qs/+Jb+U/dWUHYW0TbhiMcj+9BvplJZpn9ag2rwF25jjiqQ7DHWgJ1NjchAEtAOePv6Ulu6YgZTzT9fw6U5IbbuLHH64zSjSWnDOS8wJEjPtQW6bTMysAApwIyJ/Q0zF51tqv2mAgR1PSlSXXmek+9NksvAO4gxOOfTmg51tPdLkn5ilmJzuHXP0oy1oruJJ5xEmfUmmB1DrG8k46gSPrHNRTUK4O4NE4IJPtQFaew4A/lz06+9acMCNvTH0orTanaucjjPtUdLrd5I2gHpImgquh1cbTzJkce1M9OSzQTkAHb78RWlciH2D2mOOSKDfVn5hbbiFAA4HOSaBvhfqY/5rSovMZH9KVnWiSQBEnrmenvUn1qqpZniDER+FBr4p8O+bp2gSyecd/wDcB9PyFeZXfDkRpZrnm4IY49PavVV8TQruDgD1/pSDVOttifl7kJlTGBPT6UCbS6K66QmpuhIwH2t+JE1PQaUoxV2kjrETTV/EkiRj8KR6/wAUTdIP16UHS2boAqGr12/yDk4rib3xEWOxAWY4AH9a6/4c8OKrvuGXbp0Qdh3PrQeQfE9vbq7y9nP9q7D9n3w6FYanULEYRSMgn+Nh+Q+tdBqrOktaxjcUC6wDhisyD5cTgRFObpULtkwcnjJ7UDJ1EyRgKYjmIBiO+KTeKMqKyIDuf7TGZAxgduPpResW4o37zE5BAOe34GqEVXDbzwR5xxnpFBXpkS3YS4AvzAYHeCScjt/ajG8b8i4BcqZPAByAY/GhNRetKhScRg9aVX3UDykk/lQSu2d5LNJNVNZ6AUZ4fc7xBxTC4qiQVxQK9I+1jOIBjqJ6TUnulgFPA4H+daz9xXcAGJk8QfoCaYDS7DLR7UC65pXVhwCcgA5H39aBuqS3JBODTy8gc7jiJAkRQOo8PJeJEHuYNAHad0MrB/6vzqFt3YGY5nn76NvaByYAERzP0qJ8J2rAfdHXv3/GgG+Y3RmH1Naq391f/wDWT/3CtUFt7W3i+06W6GYiIAIAxy2I45qw37u+GtsD7qQPcgxTRfFLghXJKkZJJOeZx+VLk06uxOYyeTH3Ggv0zuwIKMQJ8wIAM/XPvRtrTMUJYQxH2eeBiTWaiw6KHQAlUA2D+IDk5I8wEmOtVaXxFnXcm1g3HP6nFBQ+oRXO6Qs7sAx/k0zt+KWfNLqNv5fSqrSu6EsYMxHTHvQ+o0q2l3kLJIBLDHmMZgUBFzX2XwHEjvjH1rAyxiMek+/FVeIeAWXgG2DiZU7GB/7SOlTTwZUIKs6nklmL8dOkYoLFIM+vJmKoZ1R/tZAHWiNT4ahXzwcg7oK+8nd+NZ+62UMBNxEc8/Q84oLdXqlZoRjIAkTxI49qB1LHvE80Q7hjLJJgifYYoRV/mGAepxQSt2zsbawwwMEcYz+dEeG6dGTzgeZuv35+oqlLJKlkYKnBJ6+lDLomLHIYLPIhciJIoD7mnRXZDugxtgeUY6RxRXhtsK7rMoIAn6ff/alF/wAKdSG+bdA/lVjt9DmSB9YrmfGPjEabcltvm3SCd8gorFjyOp5x7UFn7RtUgdUslVdQd4SJ820ruA+v31wcO5yxNHWbT3i965O+4xJkR9QPf8qa+GeCuzYXNBb8P6HaRA+vWu01vjKaW1vfLHyqPU9T/tHWkGuddMu2Q14gEITEAzk+uDApR4dZ1Gr1ICo7pcI3OyNsVf4onEDpQas2dRr75V33MqybgGFQmQIEY5xzXd3LcKoBmIBnsMV2HhPgtuyipbQAAATGTHc9TWaz4eDyQIJ5jE/0NBy+ouh+GKjOCZBJ/Woae0CSDkD7ifSi9d8P6hfMiCB0mfyFCy4TaR51wV7DoZ75oLrXh9t5BShNR4Kq5ViFGIEQT6zRWjDlsMFMcMJpgWXaQIPeg5rXKqAbRkj/AJodPEX27TkHqe9MtRpN2JAJ47E89sUE/h7EkYEdZ/IUEtBr1XJUEg89au1HiwnIJGCDzGciKiPDxHI/AULd8P2klZMRzFBLVa0u8hMnIP8AL0/Gtacm85UsAEAmBnJqDaY7ggQsH/jJhV7zAmfzq25orlvbsODlmEdOJk80DMaZUUkSQDyxJyO09M9KXa4uOE8sZg/0oVl1A3ECSTJEqZI7ZprpdfvTY6lWiCSIH3iZoFu650H/ALVlNR4mox8q4fUAQfbNZQc9a8YQmC4B7GKb+HatSCyeYrzicVE+H2wdxRQfUkyOvWmdp1RVVQI7AwDziKCF229+2SHkrBVkMHvAx+FJ9PqFRQiPuO4z3TGVIxBB6etdM2qEKQm0rJgER7REGud8f8HtXbr3fMklFdVJUFmIj7w3INAdp9YDhzgsOePf+9Fa28l22UDjezeQTywMrxyOK54/CVh3ID3wAdv/AOQxMTABHb8qO8L8FTTvIuXWZRCh23hZ9BGY/OgbDXL9s+UkncDg+XBBq+1qwxGeehpXrPB/mP8AMZ2HO5UO1CehIM56YOaIbwFCPtOMfznpQGeKXBsKjJ7D06UH4coCeZpILAnj+Lg+wiqh4Q4Cn5z4MgBpU+hkcVO74KpbezMpZh9ljyOpHExg9KA8qIj/AJoBrTyc4/Or7nhxaQrvjOSsGe3lPahdN4bqgQvz1InI+WNxnoufzmgNFlW2hYKiCD6jke84q+2sA4yzgYonwb4RNsyWKKZJQHcCx5aSJBPJjEk051+osaOy114AXqclmOFUepNBw/7QfFP3XTqNsvclVBMbRtO5o5gce9cF8GfCy30N66Ny8IuR9k5Yx0xEU2teG6vxnUG/dT5dsQpaIQKpPlQk+ZsnI/tXqfhnhNm0gRUBCgAdBjsKDkLXgAZvs4qfjGqTQBN6kM87REcRJn6iuw8U8RXTWnuuNqLAwAJJMAD3JrzRtPe8U1ux9z2GO4MOLaYBE8B8fWaAL4V8Ku+I6km6CVQhnuRgwZCA9iDxOAK9ws6NVAAGBgDgVnh+iSyi27ahUUAAD07+tFUEVUDipVlZQZS7xPwxLg3bRvHB7+h70xrKDzU3ChI25kgjiM1C1DEcAdR/WmnxZ4O5vq9tfK4O4zAVl7+4/I0jTR3QpIa2e5lscyAIycUFhuiCOcbieqxxHvSdlYmQTn8qLS8pBSWdogwsRt6Yq5LTkAIglRGSv5TQCWAFwx5/yaMt2jsZpMGcmRx2B+tLNTqmSEa089TjgdvT1ptorxuWCNyqVcQHJGIIAByCTAx60Fektkq7EkKnryfSotdx5mwMd81ddsP8raAFLGTmcc9Pp91K3sXCDtUvGSBzQH2twsBoULuPHIOePrQiXHLgBjmeSYwCf0ox9Fc/dk8h3MwO2VlZkEHMetBPZu74C7AABMgGPoetAPvufzH7v7VlXbbg6L/5L/WsoDLd5dpacDntngelWvqEQM29NrARmYmfuIIH30Z4d4WzI4jyZEEDzntAiq9V4UUC/L2pMT5Nxn+WJ/Gg1a1XkG5WBMETHBrer1aMsM0KXtif+4SD6HHtXN6/TIbrJsKuWA3LvUEkAnrH64p7oPB7YUp80sCPOD55nvmaC86cfN3I4nopPTgj2g81q/qVRnLCMkgtGcDAPUVS3wxZJEcjqWcT2kz+NQ1vgKpI2bwRhS7N5h1E8CgN02pR+u0v78kU1s7UhA07QP4pP1muTt+AOMLIE8EnHaD1irH8HdVkvcEc7gD7waDqGuevSg2v+QsQIWT5jjHJ9MTXOvp7qHeL7EkQfIJ9BPb3o2x4bqbsWnupsueQwkNB+1ksYNB1XhWiLkuCdhjJ6jaML3zNPtHpETIGeJPNZbtqiqiiFUBR7Cik4FBPpXmvxtrV12pt+HW2lQwa9jG1YMq3PlB6dWFE/tS+I0t2zowxV7qbi3AVN3Hru2ke1Bfsy8CdLHznX/UvRk/w2x9gT2P2vqKDsbCBVW3bWFUBVUcADAAHajtNpdgLO0nk/wAoA/OidPpwoxz1PevOv2kfGTW4saVyXRyLwUZAgQoMZMnIGaAD4k8Xua/UCzYm5prgVAoxmSS7DkDggn+XpNei/DPgSaOwtlCTGWY8sx5Jrnf2b/Co01v57BhcuqDtONi8hfc8544ruaDKytE1VcuACTxQTZozVYuTQTXixz/wK5zxTxS4xKg7F6Acx6nvQdPqfFLSYZpPYZNAXPiiwv2t4HfbI/DNctZBM1XqrUrmg75LyX7co6srDDKZE/50rmb15U+2sBcEAcfQUi+EA1nVuQx2Mh3LJgsGXaY4mJzXVeLOqurhGZXwSsGGEQCJ6j8qBLpdWSm8p5rjGF6gTA5HahP3q6juWB2cgEjg/wCd6s8Tb5u1RbMBvOOGEcEEGh7WqVibZtugUBRuXdOcgkTQQ1HiqHcxHoGA59BUdJrjs3btyljAIACx0mMnjNX2gG2i2kjniPpB60ObWwlWTyofsx/NxIE9+KBtZbftgckGOhjmD7UwTSWxuKKFJiYEHHelmlhdrHbiIWYPt6elH6bxFGZ4dfWcETgD8KBP4lc23vlwPshlxiTMn0rDoQQSAhx0Ez70cBad2824iCcFiM4jHc9Ks0nybe5gCqYOVIE9ojHFAh/cbZ6J/wCIrdO//krPR/8A0b+lboC7WttoigMO+cRNBajVM6EoQTHljgnpVWo2Op3JHfbt/saq1GkRlCBMzMk7OeCCOvqKBPrEd0l0bcGbJiDxxGPrVngIYOWx9kyAOY4n8aOXR3xAARlUQFLSYiIkn8aHWw1t5dEAI/hcyv04NBLxTxgrKIrK8ZYjHqB3MUobXXXa2ZgI43z13NA256TTPxPw25d3AXQoMH7If27RVC+BPsK7xu74AwZwKDoH1yJcDu6wB5QSOT6/5zVGt8f8zItp3bBBBXbB78mPYUk1XhdzZ59jAchSQTMdhQCeAOVfZqNrssKGUlfp1nET60DDxfUv8pA+1GN220LIIXePtSevFdX8KWpZXj+EsJ6T/wA150ngOoa0RdugsrggKjNMEEQ5M7SQJEV3nwQ7oSlw+YIxiZxK/hmg63dVmr1aWke45hEUsx7ADNAI5/GuW/ab4yyIunsuu9vNcQ43WirDbPqelBy/g3hT+Ka5n1DC5YRi+T5gu4/Ltx0Xv0we9ez27aqAFAAGABiuW/Z74Eum0qsU2XLvncTO3+RPQAdB1JrqHcKCzEAASScAAckmgU/E3jS6a0TuAuOGFsHgsBMn/aMSa8+/Z/4MdVqW1l9SGtsSxjat26TzHB2x0xkUF8ReKHxHXLpQCyb4sugMqpC739sGZ7V69oNItm2ltBCooUd8dT6mgLrJqPNQZqDHell++XPYDip6u7/COOvrVNqMs2FUSf6UE7x2p6t+VJP3MudxpkbpfJET07elE27OO1ApGiC+/aqL2jJGaefIzNY9ig4uyDbvCeGBH6j8q6G0+8be8feOKW/E+n2IXH8MN9xrfh+p3KCKA7S6AbgDIUqZUwfMT+dWtoEUyFIA6d+MzVC3yjST36wOlabxtcgqx9Rmgjq0CEFBy0COg6mOJ9fWqrpUliZyPfiqj4gHH2GOedsfjNbQdG9x329PrQbV1AyJExwPv9qUeIIoZ9sqSJ3DGef896ZallVd2YHWMCqvn2jBLLJAIAIzGAfrQX/DmhBQXd5JLsS0kboLDzDg+h9Kc30ViA0nbkZOPu5+tc1r/ie1p0+XguSxIB8oBM4bvEYpjoPHrF20RuYSsMxBkEiMGM0DJrKen/k1ZQFrxBQAFDsOjbXz6/ZrdAAbAHMnpJ5rP3ZXOVMxAPMR71Q37weCn+2AePcnn6dKJ01m6BJZBB4IM/nnuDQbSwRwxEH8KIdFMgySw61P9zuhid6AQftKTHqCDn2qVsm4Cu5DjkKyn3E4oKLOlXJA6npwOOP1rR05Z1kjZHAGT2zUhprlsH/UL+8YP4VRc1xRlGwkHmSAB7Ge9Af+7KBP58UDc0wWYmDBGePSqvGfER5AjHdkFfugmhVS7MzHfBaeI44oC0G8RuIOee88zV/wwHTUFXbcCjAEgSDzyOhqhbhQgAA8yxJUD7xJ5q/w/VIrq7Okbh1jrHXvQdLphuYen6V5R40X1PjQtX08ouqilYE2184DMOZEkz3Ir1eRaFxzkDccdlEmK8Y+D2XUeJJdDt5rj3ipMwDLAT6FgOKD3sN2rkf2leLpZ0jW3UkajdamYCypJM98YFdJauzxXnv7Y9W3ybVvDIzlnUfa8o8h7hZnI6wKC/8AZF4cgt3b+7ezPsViIhFAMD6nPtXo4Fcj+z3T/J0FlNoUld5Hq5LZ9ciunbUgCaAih77dBSzVeJwYHTn+lHaW8HE9eo7UA1xKR+P65kezpk/jaXPUDkD8DNdPf2rk/aPA/WuP16zq0Y9AzfWAP1oOi0yjk1s3i5hBjvQIuFyF4XrTfTJGBQRt2DiSak5zHNTu3I8q5bv2rLVoig574qX/AO3eBmI+8gfrSrw0Qqj0p38Tj/SI7so/Gf0pTpiAJOAATQR19pC7bgDERPqJoOxZAkCVnmOvWM0x19neUYfxACZ7Ex+FUnQHcDuiMTx70EV0aTJhifw4xI4oycTMzAA7CoJpCuB2+n31C4GAUN9r0yAfegD8atFkKKFG/wC0SJEdSBPNCJokXyfLGBztEcd6PvauG2scGIMiAM9f0qtNUjk5PPoJjtNBvTaFNgWFUDoFGJ6+/rUbPhlpX3oMznn8RMfhRmouQCIUcCCwB+lLr/ittBysmBhhz0mgM+UBwDWVlqWAOM+ordBZZUEtP8J9eO1NEvqo48p6/Tt7CsrKCbalMtyQCBjicGhrtpSAT9pVE8x6Y4+6srKC1LahIj1pbqbo3CyVGRI9hz+lZWUFGsa2sSJgYx19aEOqJYkCBjj86ysoNa9tyLJPUmPp39qoEN9oDHp24rKyg7PxC9cGmZ7QHzPlllBiC22RP1ryX9n+pX95uOEjBYnHU9AOBzgVlZQex6O9KK3cA/fXj/7Udbu1sIWlUCvPAPI2j2bNZWUHqfgL/wCjbA6Io+4CjNVe2qT2/PpWVlAiR8yaZ2tUUTcOWwPSsrKCFm8WaSST1JpPfcnUrP8AErx/61lZQPNAPNTW5d2iByaysoN6ZI9zRSmaysoE/ja/Z9yaQ6hZX/qbb9FyfxrVZQGtpoCggbQMe/WRUSmATzmsrKDLlyOJ7RUbyl8LzHXt1FZWUALacL9pQQOnT/Joa5o0N1f9NZbyg+pkzBrdZQTuWUa3uKhpbbmT9mRkH68UPZtowgohUyDKiI6iIrKygJTw6xGFx/1PWVlZQf/Z\" alt=\"\" width=\"275\" height=\"183\"></p>\r\n<p>बताया जा रहा है कि शनिवार की रात शूटिंग के बाद सुचंद्रा दासगुप्ता घर लौट रही थीं, जब ये हादसा उनके साथ हुआ. उन्होंने घर आने के लिए एक ड्राइविंग ऐप से बाइक बुक की थी. वे रास्ते में थीं, तभी उनकी बाइक के सामने अचानक साइकिल वाला आ गया. ड्राइवर ने आनन-फानन में ब्रेक लगाया. एक्ट्रेस बाइक से उछलकर दूर जा गिरीं. पास से गुजर रही एक ट्रक ने एक्ट्रेस को जबरदस्त टक्कर मारी. इस भयानक एक्सीडेंट में सुचंद्रा दासगुप्ता का निधन हो गया.</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"data:image/jpeg;base64,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\" alt=\"\" width=\"290\" height=\"174\"></p>\r\n<p>कहा जा रहा है कि एक्ट्रेस ने हेलमेट लगाया हुआ था, लेकिन जब बाइक ने ब्रेक मारी तो वे दूर जा गिरीं और हेलमेट भी निकल गया. सुचंद्रा पीछे से आ रही ट्रक की चपेट में आ गईं. पुलिस ने फिलहाल ट्रक ड्राइवर को अरेस्ट कर लिया है. इस हादसे से हर कोई हिल गया है. सुचंद्रा दासगुप्ता इंडस्ट्री का उभरता सितारा थीं. वे \'बिस्वरूप बंद्योपाध्याय\' और मोहना मैती स्टारर \'गौरी एलो\' जैसे प्रोजेक्ट में काम कर चुकी हैं.</p>\r\n<p>&nbsp;</p>','1',NULL,'2023-05-21','3995download (1).jpeg',1,1,NULL,1,'2023-05-21 14:08:21'),
(11,'द कपिल शर्मा शो के सेट पर पहुंचे विक्की-सारा:पैपराजी ने सारा से पूछा- क्या आप थक गई हैं ? सारा ने दिया जवाब',NULL,'<p>हाल ही में विक्की कौशल और सारा अली खान अपनी अपकमिंग फिल्म जरा हटके जरा बचके के प्रमोशन के लिए द कपिल शर्मा शो के सेट पर पहुंचे। इस दौरान उन्होंने पैपराजी को पोज भी दिए। सेट पर विक्की-सारा मस्ती करते हुए भी दिखे।</p>\r\n<p class=\"\"><strong>सारा ने पैपराजी को दिया जवाब</strong><br>इस बीच एक शख्स ने सारा अली खान से पूछा कि क्या वो थक गई हैं ? सारा ने इस सवाल का जवाब भी दिया। ये वीडियो सोशल मीडिया पर भी सामने आया है। पैपराजी के इतना पूछते ही सारा ने तुरंत जवाब दिया। उन्होंने कहा कि क्या मैं थकी लग रही हूं ?</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/21/screenshot-2023-05-21-123020_1684652439.jpg\" alt=\"\" width=\"512\" height=\"438\"></p>\r\n<p class=\"\"><strong>स्टाइलिश लुक में दिखे विक्की-सारा</strong><br>इस दौरान सारा सिल्वर की शिमर वाली ड्रेस में दिखीं। उन्होंने अपने बाल खुले रखे और मेकअप भी बिल्कुल सिंपल रखा। जबकि विक्की कौशल स्टाइलिश व्हाइट टी-शर्ट और ब्लैक पैंट में दिखे। उन्होंने अपनी शर्ट के ऊपर भी ब्लैक जैकेट स्टाइल की।</p>\r\n<p class=\"\"><strong>2 जून को रिलीज होगी जरा हटके जरा बचके</strong><br>फिल्म जरा हटके जरा बचके को लक्ष्मण उतेकर ने डायरेक्ट किया है। वहीं फिल्म को मैडॉक फिल्म्स और जियो स्टूडियो ने मिल कर प्रोड्यूस किया है। ये फिल्म 2 जून को सिनेमाघरों में रिलीज होगी।</p>','1,11',NULL,'2023-05-21','2800comp-1-50_1684652701.webp',1,1,NULL,1,'2023-05-30 17:12:16'),
(12,'दो दिनों से लापता थीं तमिल एक्ट्रेस सुनैना:फिल्म के प्रमोशन के लिए खुद हो गई थीं गायब, लोगों ने की एक्शन की डिमांड',NULL,'<p>थेरी और काली जैसी हिट तमिल फिल्मों में काम कर चुकीं एक्ट्रेस सुनैना पिछले दो दिनों से गायब थीं। मीडिया रिपोर्ट्स के मुताबिक सुनैना को किडनैप कर लिया गया था। पुलिस ने सुनैना की मिसिंग रिपोर्ट भी दर्ज कर ली थी। अब पता चला है कि उन्होंने अपनी अपकमिंग फिल्म के प्रमोशन के लिए ये सब किया था।</p>\r\n<p class=\"\"><strong>ऑडियंस ने की लीगल एक्शन की डिमांड</strong><br>सुनैना जल्द ही तमिल फिल्म रेजिना में दिखाई देंगी। सुनैना का अचानक गायब हो जाना फिल्म के प्रमोशन का ही हिस्सा था। उन्होंने अपना मोबाइल फोन भी स्विच ऑफ कर लिया था।</p>\r\n<p class=\"\">हालांकि, तमिल ऑडियंस एक्ट्रेस की इस बेपरवाही से काफी नाराज हैं। लोगों ने एक्ट्रेस और फिल्म की प्रोडक्शन टीम के खिलाफ स्ट्रिक्ट लीगल एक्शन लिए जाने की भी डिमांड की है।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/21/screenshot-2023-05-21-163857_1684667355.jpg\" alt=\"\" width=\"512\" height=\"636\"></p>\r\n<p class=\"\"><strong>सोशल मीडिया पर वायरल हो रहा सुनैना का वीडियो</strong><br>अब सुनैना का एक वीडियो सोशल मीडिया पर वायरल हो रहा है। इस वीडियो में सुनैना मीडिया से बात करते हुए कह रही हैं कि ये फिल्म उनके करियर के लिहाज से काफी इंपॉर्टेंट भी है। उन्होंने आगे कहा- मैं फिल्म के कैरेक्टर को अच्छी तरह निभाने की पूरी कोशिश कर रही हूं। इस वजह से मैंने खुद को सोसाइटी से अलग कर लिया था और अब मैं थक गई हूं। हालांकि, ये क्लियर नहीं है कि इस वीडियो में सुनैना फिल्म रेजिना के बारे में ही बात कर रही हैं या नहीं।</p>\r\n<p class=\"\"><strong>डोमिन डीसिल्वा करेंगे तमिल सिनेमा में डायरेक्टोरियल डेब्यू</strong><br>ये एक थ्रिलर फिल्म है। इस फिल्म को डोमिन डीसिल्वा ने डायरेक्ट किया है। इस फिल्म के साथ डोमिन डीसिल्वा तमिल सिनेमा में डायरेक्टर के तौर पर डेब्यू कर रहे हैं। सतीश नैर फिल्म के प्रोड्यूसर हैं।सुनैना कई तेलुगु, मलयालम और कन्नड़ फिल्मों में भी काम कर चुकी हैं।</p>','1',NULL,'2023-05-21','4314bol_1684667934.webp',1,1,NULL,1,'2023-05-21 16:08:22'),
(13,'मुंबई में स्पॉट हुईं नोरा फतेही:कैजुअल नो-मेकअप लुक में आईं नजर, रुक कर पैपराजी को दिए पोज',NULL,'<p>हाल ही में नोरा फतेही मुंबई में स्पॉट हुईं। इस दौरान नोरा ने रुक कर पैपराजी को पोज दिए। इससे जुड़ा वीडियो सोशल मीडिया पर भी सामने आया है। इस दौरान उन्होंने अपने हाथ में एक कॉफी भी ली हुई है।</p>\r\n<p class=\"\"><strong>कैजुअल लुक में दिखीं नोरा</strong><br>वीडियो में नोरा ब्लू कट स्लीव्स क्रॉप टॉप और ब्लैक योगा पैंट में नजर आ रही हैं। उन्होंने अपने बालों में बन बनाया हुआ है। एक्सेसरीज के तौर पर नोरा ने सनग्लासेस लगाए, पर्ल इयररिंग्स पहनी और ब्लैक बैग भी लिया हुआ है। उन्होंने ब्लैक फ्लैट सैंडल के साथ अपना लुक कंप्लीट किया।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/21/screenshot-2023-05-21-114536_1684649759.jpg\" alt=\"\" width=\"512\" height=\"1225\"></p>\r\n<p class=\"\"><strong>फैंस ने की नोरा की तारीफ</strong><br>नोरा की इस वीडियो पर उनके फैंस लगातार कमेंट कर रहे हैं। एक यूजर ने लिखा- नोरा आप बहुत सुंदर लग रही हैं। वहीं एक यूजर ने लिखा- लव यू नोरा!</p>\r\n<p class=\"\"><strong>नोरा के अपकमिंग प्रोजेक्ट्स</strong><br>जल्द ही नोरा फतेही साजिद खान की फिल्म 100% में जॉन अब्राहम के साथ दिखाई देंगी। इस फिल्म में रितेश देशमुख और शहनाज भी नजर आएंगे। इसके अलावा नोरा फिल्म मडगांव एक्सप्रेस में भी नजर आएंगी।</p>','1',NULL,'2023-05-21','9569m-1_1684650244.webp',1,1,NULL,1,'2023-05-21 16:12:49'),
(14,'प्रेग्नेंट हैं दिशा परमार:पति राहुल बोले- काम से गोवा गया था, लौटा तो खुशी का कोई ठिकाना नहीं था',NULL,'<p>सिंगर राहुल वैद्य की वाइफ और एक्ट्रेस दिशा परमार प्रेग्नेंट हैं। बीते दिन उन्होंने सोशल मीडिया पर पोस्ट शेयर करते हुए अपने फैंस को ये जानकारी दी थी। हाल ही में मीडिया को दिए इंटरव्यू में राहुल ने बताया कि उन्हें दिशा की प्रेग्नेंसी के बारे में कैसे पता चला। उन्होंने बताया कि वो किसी काम के सिलसिले में गोवा गए थे और जब वहां से लौटे तो दिशा ने उनसे ये गुड न्यूज शेयर की।</p>\r\n<p><strong>प्रेग्नेंसी की खबर सुनकर मेरी खुशी का कोई ठिकाना नहीं था : राहुल</strong><br>इटाइम्स से बात करते हुए राहुल ने बताया कि उन्हें इस बात की बिल्कुल उम्मीद नहीं थी कि दिशा प्रेग्नेंट हैं और दिशा की प्रेग्नेंसी की खबर सुनकर उनकी खुशी का कोई ठिकाना नहीं था। राहुल ने कहा- मैं हमेशा से पिता बनना चाहता था। मेरी इमेजिनेशन में मैंने खुद को हमेशा एक ऐसे ही पिता के तौर पर देखा है जो अपने बच्चे को जी भर के प्यार करता हो।</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/snapinstaapp34739631133734987262044425430590573938_1684588191.jpg\" alt=\"\" width=\"512\" height=\"640\"></p>\r\n<p><strong>यकीन नहीं होता कि दिशा प्रेग्नेंट हैं: राहुल</strong><br>राहुल ने आगे कहा- हां, मुझे इस बात का अंदाजा तक नहीं था कि दिशा प्रेग्नेंट हैं। मैं काम की वजह से गोवा गया हुआ था। जब मैं वहां से लौटा तो मुझे प्रेग्नेंसी की बात सुनकर यकीन ही नहीं हुआ कि ये सच है। मुझे इस बात की बहुत खुशी है कि मैं जल्द ही पापा बनने वाला हूं। हालांकि, अब भी इस बात पर यकीन करना मुश्किल लग रहा है।</p>\r\n<p class=\"\"><strong>सोशल मीडिया पर फोटो शेयर कर दी प्रेग्नेंसी की जानकारी</strong><br>दिशा ने सोशल मीडिया पर ब्लैक ड्रेस में फोटो शेयर करते हुए अपनी प्रेग्नेंसी की अनाउंसमेंट की थी। इस ड्रेस में दिशा ने बेबी बंप के साथ पोज दिया था जबकि राहुल ने एक स्लेट पकड़ी हुई थी जिसपर लिखा था - मॉमी एंड डैडी टू बी! दिशा और राहुल ने सोशल मीडिया पर दिशा की सोनोग्राफी की वीडियो क्लिप भी शेयर की थी।</p>\r\n<p class=\"\" style=\"text-align: center;\"><img src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/screenshot-2023-05-20-184136_1684588314.jpg\"></p>\r\n<p class=\"\">राहुल ने दिशा को बिग बॉस 14 के सेट पर प्रपोज किया था और जुलाई 2021 में उन्होंने शादी कर ली। राहुल इंडियन आइडल के पहले सीजन में भी नजर आए थे। वहीं, दिशा ने टीवी सीरियल प्यार का दर्द है मीठा-मीठा प्यारा-प्यारा से अपने करियर की शुरुआत की थी। दिशा को बड़े अच्छे लगते हैं 2 में भी देखा गया।</p>','1','4','2023-05-21','4522m1-3_1684589556.webp',1,1,NULL,1,'2023-05-29 18:56:32'),
(15,'मुंबई में 19 मंजिला होटल बनाएंगे सलमान खान:पहले रेजिडेंशियल सोसाइटी डेवलप करना चाहते थे, फिर बदल लिया मन',NULL,'<p>सलमान खान मुंबई की एक प्राइम लोकेशन में 19 मंजिला होटल बनाने जा रहे हैं। टाइम्स ऑफ इंडिया की रिपोर्ट के मुताबिक BMC ने सलमान खान को बांद्रा के कार्टर रोड पर ये होटल बनाने की परमिशन दे दी है। रिपोर्ट के मुताबिक सलमान खान जिस जमीन पर होटल का कंस्ट्रक्शन शुरू करवा रहे हैं वो प्लॉट उनकी मां सलमा खान के नाम पर है।</p>\r\n<p><strong>को-ऑपरेटिव हाउसिंग सोसाइटी की जगह बनेगा होटल</strong><br>सलमान खान का परिवार बॉलीवुड के उन परिवारों में है जिन्होंने रियल एस्टेट में काफी इन्वेस्टमेंट किया हुआ है। सी-कार्टर रोड के इस एरिया में पहले स्टारलेट को-ऑपरेटिव हाउसिंग सोसायटी हुआ करती थी। रिपोर्ट के मुताबिक सलमान खान की फैमिली इस रेजिडेंशियल एरिया को दोबारा डेवलप करना चाहती थी। लेकिन, अब BMC की परमिट मिलने के बाद उन्होंने यहां 19 मंजिला होटल के कंस्ट्रक्शन का फैसला लिया है।</p>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/salman-khan-1875a92c868large_1684580283.jpg\" alt=\"\" width=\"512\" height=\"384\"></p>\r\n<p class=\"\"><strong>सलमान खान के पिता ने खरीदी थी प्रॉपर्टी</strong><br>2011 में टाइम्स ऑफ इंडिया को दिए इंटरव्यू में सलमान खान के पिता सलीम खान ने बताया था कि उन्होंने काफी इन्वेस्टमेंट किया है। उन्होंने बताया था कि वो अपने परिवार और खासकर अपने बेटे सलमान के लिए अक्सर प्रॉपर्टी खरीदते रहते हैं।</p>\r\n<p class=\"\"><strong>69.90 मीटर होगी होटल की हाइट</strong><br>होटल के कंस्ट्रक्शन के लिए सलमान खान के आर्किटेक्ट सैप्रे एंड एसोसिएट्स ने मुंबई के डेवलपमेंट कंट्रोल एंड प्रमोशन रेगुलेशन (DCPR-2034) को 69.90 मीटर की एक कमर्शियल सेंट्रली एयर-कंडिशन्ड बिल्डिंग का प्लान भेजा था। इस प्लान में तीन अलग-अलग बेसमेंट, फर्स्ट और सेकंड फ्लोर पर कैफे और रेस्टोरेंट, थर्ड फ्लोर पर जिम और स्विमिंग पूल भी हैं।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/salman-khan-salim-khan_1684579971.jpg\" alt=\"\" width=\"512\" height=\"285\"></p>\r\n<p class=\"\">होटल की चौथी मंजिल पर सर्विस फ्लोर, पांचवी और छठी मंजिल पर कन्वेंशन सेंटर और सातवीं से लेकर उन्नीसवीं मंजिल तक कमरे होंगे।</p>','1',NULL,'2023-05-21','7510sal_1684580067.webp',1,1,NULL,1,'2023-05-21 16:19:45'),
(16,'पिता के कहने पर मनोज बाजपेयी ने पी थी भांग:भाइयों के साथ मिलकर 3 KG मटन हजम कर डाला; मां से पड़ी थी डांट',NULL,'<p class=\"\">मनोज बाजपेयी अपनी अपकमिंग फिल्म \'सिर्फ एक बंदा काफी है\' से सुर्खियों में हैं। फिल्म के प्रमोशन के दौरान उन्होंने अपनी बचपन से जुडे कुछ मजेदार किस्से सुनाए। मनोज ने कहा कि जब वे 8 साल के थे, तब अपने पिता के कहने पर भांग पी ली थी। वो भांग पीने के बाद काफी ज्यादा नशे में आ गए थे।</p>\r\n<p class=\"\"><strong>भांग जिंदगी का हिस्सा बन गई थी- मनोज</strong><br>मनोज ने Cyrus Says के साथ बातचीत में कहा, \'हमारे समय में भांग जिंदगी का हिस्सा थी। हम बचपन से ही भांग पीते आए थे। एक बार होली के दिन मेरे पिता ने मुझे आधी गिलास ठंडाई पिलाई। उसमें भांग मिली हुई थी। मेरी मां मेरे ऊपर बहुत चिल्लाती थीं। वे पिता जी से कहतीं कि सारे बच्चे टुन ( नशे में) होकर पड़े हुए हैं।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/sirfekbandaakaafihai1683645398-1_1684569545.jpg\" alt=\"\" width=\"512\" height=\"288\"></p>\r\n<p class=\"\">हम 6 भाई बहन थे। मेरे घर में तीन किलो मटन बना था। हम लोग उस दिन इतने नशे में थे कि सभी ने मिलकर तीन किलो मटन खा ली। मां ने इस बार एक शब्द नहीं कहा।\'</p>\r\n<p class=\"\"><strong>बिहार के ब्राह्मण परिवार में हुआ मनोज का जन्म</strong><br>मनोज का जन्म बिहार के एक छोटे से गांव बेलवा में हुआ था। ये गांव बिहार-नेपाल बॉर्डर के वेस्ट चंपारण के पास है। मनोज एक ब्राह्मण परिवार से आते हैं, उनके परिवार के सभी लोग खुले विचारों वाले हैं। मनोज के पिता राधाकांत बाजपेयी एक किसान थे, जबकि मां गीता देवी हाउस वाइफ थीं। दोनों अब इस दुनिया में नहीं हैं।</p>\r\n<p class=\"\">मनोज ने एक इंटरव्यू में कहा था कि वो भले ही एक सामंतवादी ब्राह्मण परिवार से आते हैं, लेकिन एक मुस्लिम लड़की से शादी करने पर उनके घर वालों को कोई आपत्ति नहीं थी। मनोज के मुताबिक, उनके परिवार वालों ने कभी उनकी वाइफ के धर्म के बारे में बात नहीं की। बता दें कि मनोज की वाइफ शबाना रजा भी एक जानी-मानी एक्ट्रेस हैं।</p>\r\n<p class=\"\"><strong>विवादों में है मनोज की अगली फिल्म, आसाराम ट्रस्ट वालों ने घेरा</strong><br>मनोज इन दिनों अपनी फिल्म सिर्फ एक बंदा काफी का जोर-शोर से प्रमोशन कर रहे हैं। फिल्म को लेकर काफी विवाद भी देखने को मिल रहा है। फिल्म 23 मई को OTT प्लेटफॉर्म ZEE 5 पर रिलीज होनी है। दरअसल फिल्म में दिखाया गया है कि एक बाबा ने 16 साल की लड़की का रेप किया है।</p>\r\n<p class=\"\">डिस्क्लेमर में साफ लिखा है कि ये फिल्म सच्ची घटनाओं पर प्रेरित है। फिल्म में दिख रहे बाबा का हुलिया आसाराम से मिलता जुलता है। ट्रेलर रिलीज होने के बाद आसाराम बापू ट्रस्ट ने फिल्&zwj;म के मेकर्स को नोटिस जारी कर दिया था। ट्रस्ट के वकील का कहना है कि इस फिल्म से उनके मुवक्किल की इमेज को नुकसान पहुंचा है। उन्होंने फिल्म की रिलीज और प्रमोशन को रोकने की मांग की है।</p>\r\n<p class=\"\">फिल्म में आसाराम के खिलाफ केस लड़ने वाले वकील पीसी सोलंकी का किरदार मनोज बाजपेयी निभा रहे हैं। रियल लाइफ में भी आसाराम का केस पीसी सोलंकी नाम के ही एक वकील ने लड़ा था।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/collage-61_1684569684.jpg\" alt=\"\" width=\"512\" height=\"379\"></p>\r\n<p class=\"\"><strong>\'लोग मुझे बायकॉट करने लायक नहीं समझते\'</strong><br>मनोज से पूछा गया कि सोशल मीडिया पर आज कल बैन और बायकॉट ट्रेंड का चलन हो गया है। तो क्या उन्हें इस बात का डर लगता है। इंडियन एक्सप्रेस से बात करते हुए मनोज ने कहा, \'मुझे नहीं लगता कि लोग मुझे बायकॉट करने लायक समझते हैं। पिछले 30 सालों से मुझे काफी ज्यादा प्यार मिला है।</p>\r\n<p class=\"\">मैं लोगों का भरोसा जीतने में कामयाब रहा हूं। दर्शकों को पता है कि मैं सनसनीखेज बनाने के लिए कुछ भी ऐसा नहीं करूंगा। उन्हें ये भी पता है कि मैं किसी के धर्म को बदनाम नहीं करूंगा।\'</p>\r\n<p class=\"\">&nbsp;</p>','1','4','2023-05-21','8610collage-59_1684569458.webp',1,1,NULL,1,'2023-05-30 06:28:46'),
(17,'IPL में RCB Vs GT मैच:कोहली ने जमाई करियर की 51वीं फिफ्टी, 7वें शतक के करीब; बेंगलुरु 169/5',NULL,'<p class=\"\">इंडियन प्रीमियर लीग के मौजूदा सीजन के लीग स्टेज का आखिरी मुकाबला रॉयल चैलेंजर्स बेंगलुरु और गुजरात टाइटंस के बीच एम चिन्नास्वामी स्टेडियम में खेला जा रहा है। गुजरात ने टॉस जीतकर बॉलिंग चुनी है।</p>\r\n<p class=\"\">बेंगलुरु ने पहले बल्लेबाजी करते हुए 18 ओवर में 5 विकेट पर 169 रन बना लिए हैं। विराट कोहली और अनुज रावत क्रीज पर हैं। कोहली अर्धशतक पूरा कर चुके हैं। वे करियर 7वें IPL शतक की ओर बढ़ रहे हैं।</p>\r\n<p class=\"\">दिनेश कार्तिक जीरो पर आउट हुए। उन्हें यश दयाल की बॉल पर ऋद्धिमान साहा ने स्टंप किया। इससे पहले, मोहम्मद शमी ने माइकल ब्रेसवेल (26 रन) को कॉट एंड बोल्ड किया।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/21/rcb_1684683973.jpg\" alt=\"\" width=\"512\" height=\"701\"></p>\r\n<p class=\"\">नूर अहमद ने महीपाल लोमरोर (एक रन), कप्तान फाफ डु प्लेसिस (28 रन) के विकेट लिए।</p>\r\n<p class=\"\">ग्लेन मैक्सवेल (11 रन) को राशिद खान ने बोल्ड किया।</p>\r\n<p class=\"\">आज सीजन का आखिरी डबल हेडर-डे है और दिन का पहला मुकाबला मुंबई इंडियंस ने सनराइजर्स हैदराबाद को 8 विकेट से हराया, हालांकि टीम जीत के बाद भी प्लेऑफ में प्रवेश नहीं कर सकी है। रोहित की टीम को इस मैच के रिजल्ट का इंतजार है।&nbsp;<strong>पढ़ें&nbsp;<a href=\"https://www.bhaskar.com/sports/cricket/ipl/news/srh-vs-mi-sunrisers-hyderabad-vs-mumbai-indians-ipl-match-live-score-update-131307580.html?ref=inbound_article\" target=\"_blank\" rel=\"noopener noreferrer\">मैच रिपोर्ट</a></strong></p>\r\n<p class=\"\"><strong><a href=\"https://dainik-b.in/W3jwZbrVuzb\" target=\"_blank\" rel=\"noopener noreferrer\">बेंगलुरु-गुजरात मैच का स्कोरकार्ड</a></strong></p>\r\n<p class=\"\"><strong>ऐसे गिरे बेंगलुरु के विकेट</strong></p>\r\n<div class=\"f5e1d774 \">\r\n<ul class=\"d7ef6cb6\">\r\n<li><strong>पहला:&nbsp;</strong>8वें ओवर की पहली बॉल पर नूर अहमद ने फाफ डु प्लेसिस को राहुल तेवतिया के हाथों कैच कराया।</li>\r\n<li><strong>दूसरा :&nbsp;</strong>9वें ओवर की दूसरी बॉल पर राशिद खान ने ग्लेन मैक्सवेल को बोल्ड कर दिया।</li>\r\n<li><strong>तीसरा :&nbsp;</strong>10वें ओवर की दूसरी बॉल पर साहा ने नूर अहमद की बॉल पर महिपाल लोमरोर को स्टंप कर दिया।</li>\r\n<li><strong>चौथा:&nbsp;</strong>14वें ओवर की आखिरी बॉल पर मोहम्मद शमी ने माइकल ब्रेसवेल को कॉट एंड बोल्ड किया।</li>\r\n<li><strong>पांचवां :&nbsp;</strong>15वें ओवर की दूसरी बॉल पर साहा ने दिनेश कार्तिक को स्टंप किया। यह विकेट यश दयाल को मिला।</li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/21/lucknow-2023-05-21t203141449_1684681306.jpg\" alt=\"\" width=\"512\" height=\"384\"></p>\r\n<p class=\"\"><strong>कोहली ने जमाई सीजन की 7वीं फिफ्टी</strong><br>कोहली सीजन की 7वीं फिफ्टी पूरी कर चुके हैं। यह उनके करियर की 51वीं IPL फिफ्टी है। कोहली ने 35 बॉल पर फिफ्टी पूरी की। वे सीजन में 600 रन भी पूरे कर चुके हैं।</p>\r\n<p class=\"\"><strong>फाफ-कोहली के बीच 67 की साझेदारी</strong><br>ओपनर्स ने बेंगलुरु को शानदार शुरुआत दिलाई। कप्तान फाफ डु प्लेसिस और विराट कोहली के पेयर ने 43 बॉल पर 67 रन बनाए। इस साझेदारी को नूर अहमद ने डु प्लेसिस को आउट कर तोड़ा। दोनों ने सीजन में 8वीं बार 50+ की पार्टनरशिप की है।</p>\r\n</div>','2',NULL,'2023-05-21','559151_1684684509.webp',1,1,NULL,1,'2023-05-21 16:37:20'),
(18,'चेन्नई प्लेऑफ में पहुंचने वाली दूसरी टीम:दिल्ली को 77 रन से हराया, कॉन्वे-गायकवाड के अर्धशतक; दीपक को 3 विकेट',NULL,'<p class=\"\">धोनी की चेन्नई सुपरकिंग्स ने इंडियन प्रीमियर लीग के मौजूदा सीजन के प्लेऑफ में प्रवेश कर लिया है। CSK प्लेऑफ के लिए क्वालिफाई करने वाली दूसरी टीम बनी है। टीम ने दिल्ली कैपिटल्स को उसी के होमग्राउंड पर 77 रनों से हराया।</p>\r\n<p class=\"\">इस जीत के बाद चेन्नई ने लीग स्टेज से 17 अंक अर्जित किए हैं, वहीं डेविड वॉर्नर की कप्तानी वाली दिल्ली 10 अंक ही हासिल कर सकी है।&nbsp;<strong>देखें&nbsp;<a href=\"https://dainik-b.in/dKHSctNxoyb\" target=\"_blank\" rel=\"noopener noreferrer\">पॉइंट्स टेबल</a></strong></p>\r\n<p class=\"\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/13-1_1684590695.jpg\" alt=\"\" width=\"512\" height=\"384\"></strong></p>\r\n<p class=\"\">यह चेन्नई की दिल्ली पर लगातार चौथी जीत है। टीम दिल्ली से 2021 से नहीं हारी है।</p>\r\n<p class=\"\">अरुण जेटली मैदान पर चेन्नई ने टॉस जीतकर पहले बल्लेबाजी करते हुए 20 ओवर में 3 विकेट पर 223 रन बनाए। जवाब में दिल्ली के बल्लेबाज 20 ओवर में 9 विकेट पर 146 रन ही बना सके।</p>\r\n<p class=\"\">आज डबल हेडर-डे है और दिन का दूसरा मुकाबला कोलकाता के ईडन गार्डन स्टेडियम में कोलकाता नाइट राइडर्स और लखनऊ सुपर जायंट्स के बीच खेला जा रहा है।।&nbsp;<strong>पढ़ें&nbsp;<a href=\"https://www.bhaskar.com/sports/cricket/ipl/news/ipl-live-score-kkr-vs-lsg-update-rinku-singh-krunal-pandya-nicholas-pooran-131303800.html?ref=inbound_article\" target=\"_blank\" rel=\"noopener noreferrer\">रिपोर्ट</a></strong></p>\r\n<p class=\"\"><em>ग्राफिक्स में देखिए मैच जिताऊ प्रदर्शन...</em></p>\r\n<p class=\"\"><strong>अकेले पड़ गए वॉर्नर, दिल्ली ने लगातार विकेट गंवाए</strong><br>दिल्ली के होमग्राउंड पर चेन्नई ने दिल्ली 224 रन का पहाड़ टारगेट दिया। इसे चेज करते हुए दिल्ली के कप्तान डेविड वॉर्नर अकेले क्रीज पर टिके रहे, लेकिन उन्हें किसी अन्य बल्लेबाज का साथ नहीं मिला। दिल्ली ने लगातार विकेट गंवाए।</p>\r\n<p class=\"\">चेन्नई के दोनों ओपनर्स ने अर्धशतकीय पारियां खेलीं। डेवेन कॉन्वे ने 87, ऋतुराज गायकवाड ने 79 रन बनाए। बीच में शिवम दुबे ने 9 बॉल में 22 और रवींद्र जडेजा ने 7 बॉल पर 20 रन का योगदान दिया।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/9-1_1684590683.jpg\" alt=\"\" width=\"512\" height=\"384\"></p>\r\n<p class=\"\">खलील अहमद, चेतन सकरिया और एनरिक नोर्त्या को एक-एक विकेट मिले।</p>\r\n<p class=\"\">जवाबी पारी में दिल्ली के कप्तान डेविड वॉर्नर ने 86 रनों की पारी खेली। शेष बल्लेबाज 15 रन से ज्यादा का निजी स्कोर नहीं बना सके।</p>\r\n<p class=\"\">चेन्नई की ओर से दीपक चाहर ने तीन विकेट चटकाए, जबकि महीश तीक्षणा और मथीस पथिराना को दो-दो विकेट मिले।&nbsp;<strong>देखें&nbsp;</strong><strong><a href=\"https://dainik-b.in/xJIeZbrVuzb\" target=\"_blank\" rel=\"noopener noreferrer\">चेन्नई-दिल्ली मैच का स्कोरकार्ड</a></strong></p>\r\n<p class=\"\">यहां जानिए किसके विकेट कैसे गिरे...</p>\r\n<p class=\"\"><strong>ऐसे गिरे दिल्ली के विकेट</strong></p>\r\n<div class=\"f5e1d774 \">\r\n<ul class=\"d7ef6cb6\">\r\n<li><strong>पहला:&nbsp;</strong>दूसरे ओवर की तीसरी बॉल पर तुषार देशपांडे ने पृथ्वी शॉ को रायडू रूसो के हाथों कैच कराया।</li>\r\n<li><strong>दूसरा :</strong>&nbsp;5वें ओवर की चौथी बॉल पर दीपक चाहर ने फिल सॉल्ट को रहाणे के हाथों कैच कराया।</li>\r\n<li><strong>तीसरा:</strong>&nbsp;5वें ओवर की पांचवीं बॉल पर दीपक चाहर ने राइली रूसो को बोल्ड किया।</li>\r\n<li><strong>चौथा :&nbsp;</strong>11वें ओवर की 5वीं बॉल पर रवींद्र जडेजा ने यश धुल को तुषार देशपांडे के हाथों कैच कराया।</li>\r\n<li><strong>पांचवां :&nbsp;</strong>14वें ओवर की तीसरी बॉल पर दीपक चाहर ने अक्षर पटेल को ऋतुराज गायकवाड के हाथों कैच कराया।</li>\r\n<li><strong>छठा :&nbsp;</strong>17वें ओवर की पहली बॉल पर पथिराना ने अमन खान को मोइन अली के हाथों कैच कराया।</li>\r\n<li><strong>सातवां :&nbsp;</strong>19वें ओवर की तीसरी बॉल पर पथिराना ने वॉर्नर को गायकवाड के हाथों कैच कराया।</li>\r\n<li><strong>आठवां :&nbsp;</strong>20वें ओवर की तीसरी बॉल पर तीक्षणा ने ललित यादव को मोइन अली के हाथों कैच कराया।</li>\r\n<li><strong>नौवां :&nbsp;</strong>20वें ओवर की चौथी बॉल पर कुलदीप यादव को LBW किया।</li>\r\n</ul>\r\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/20/3_1684592911.jpg\" alt=\"\" width=\"512\" height=\"384\"></p>\r\n</div>\r\n<p class=\"\"><strong>ऐसे गिरे चेन्नई के विकेट...</strong></p>\r\n<div class=\"f5e1d774 \">\r\n<ul class=\"d7ef6cb6\">\r\n<li><strong>पहला:&nbsp;</strong>15वें ओवर की तीसरी बॉल चेतन सकरिया ने ऑफ स्टंप पर स्लो बॉल फेंकी। गायकवाड डीप स्क्वायर लेग पर कैच हो गए। उन्होंने 79 रन बनाए।</li>\r\n<li><strong>दूसरा :&nbsp;</strong>18वें ओवर की आखिरी बॉल पर खलील अहमद ने शिवम दुबे को ललित यादव के हाथों कैच कराया।</li>\r\n<li><strong>तीसरा :&nbsp;</strong>19वें ओवर की दूसरी बॉल पर चेतन सकरिया ने डेवेन कॉन्वे को राइली रूसो के हाथों कैच कराया।</li>\r\n</ul>\r\n</div>\r\n<p class=\"\"><em>अब ग्राफिक्स में पावरप्ले कॉन्टेस्ट...</em></p>\r\n<p class=\"\"><strong>चेन्नई हावी रही, बिना विकेट गंवाए 56 रन बनाए</strong><br>पावरप्ले कॉन्टेस्ट चेन्नई की टीम आगे रही। टीम ने 6 ओवर में बिना नुकसान के 52 रन बनाए, वहीं दिल्ली ने 6 ओवर में 34 रन बनाने में 3 विकेट बना लिए हैं।</p>','2',NULL,'2023-05-21','7157lucknow-2023-05-20t180800445_1684588438.webp',1,1,NULL,1,'2023-05-29 18:28:46'),
(19,'कोहली का कमबैक, क्रिकेट के सभी फॉर्मेट्स में सेंचुरी:5 इंटरनेशनल सेंचुरी के बाद IPL में भी शतक लगाया, कहा- WTC के लिए तैयार',NULL,'<p class=\"\">इंटरनेशनल क्रिकेट के सुपरस्टार विराट कोहली ने 4 साल 29 दिन बाद IPL शतक लगाकर 8 महीने में क्रिकेट के हर फॉर्मेट और टूर्नामेंट में अपना कमबैक पूरा कर लिया। 2019 में 70वें इंटरनेशनल शतक के बाद सितंबर 2022 तक विराट के बैट से कोई सेंचुरी नहीं आई थी।</p>\r\n<p class=\"\">विराट फिफ्टी का आंकड़ा तो पार कर पा रहे थे, लेकिन शतक नहीं लगा पा रहे थे। फिर कोहली ने 8 सितंबर 2022 को टी-20 एशिया कप में अफगानिस्तान के खिलाफ 122 रन की नॉटआउट पारी खेली। बस यहीं से इंटरनेशनल क्रिकेट के सबसे बड़े कमबैक की कहानी शुरू हो गई।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/19/23_1684471120.jpg\" alt=\"\" width=\"512\" height=\"384\"></p>\r\n<p class=\"\">तब से अब तक टी-20, वनडे और टेस्ट में शतक के साथ उन्होंने IPL में भी शतक का सूखा खत्म कर दिया। SRH के खिलाफ शतक में उन्होंने 4 ही छक्के लगाए, इस पर मैच के बाद उन्होंने कहा कि वह वर्ल्ड टेस्ट चैंपयनशिप पर भी फोकस कर रहे हैं। इसी कारण वे टाइमिंग के साथ चौके मारने पर ज्यादा ध्यान दे रहे हैं।</p>\r\n<p class=\"\">आगे स्टोरी में हम 8 महीनों में विराट कोहली के कमबैक की स्टोरी जानेंगे। साथ ही समझेंगे कि इस दौरान उन्होंने तीनों फॉर्मेट में कैसा परफॉर्म किया और अब IPL में उनकी परफॉर्मेंस कैसी जा रही है।</p>\r\n<p class=\"\"><strong>IPL सेंचुरी के बाद विराट की फोटोज...</strong></p>\r\n<p class=\"\"><strong><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://images.bhaskarassets.com/webp/thumb/512x0/web2images/521/2023/05/19/22-1_1684471011.jpg\" alt=\"\" width=\"512\" height=\"384\"></strong></p>','2',NULL,'2023-05-21','4751moments-89_1684437857.webp',1,1,NULL,1,'2023-05-30 06:29:00'),
(20,'मनोज बोले- सुशांत इंडस्ट्री की पॉलिटिक्स में फंस गया:कहा- वो स्टार बनना चाहता था, लेकिन इसके पीछे की हेरफेर नहीं समझ सका',NULL,'<p class=\"\">मनोज बाजपेयी इन दिनों अपनी अपकमिंग फिल्म \'सिर्फ एक बंदा काफी है\' को लेकर सुर्खियों में हैं। हाल ही में फिल्म प्रमोशन के दौरान उन्होंने दिवंगत एक्टर सुशांत सिंह राजपूत की बात की। मनोज ने कहा कि फिल्म इंडस्ट्री में पॉलिटिक्स काफी ज्यादा है। जब आप आगे बढ़ते हो तो ये पॉलिटिक्स और गंदी होती जाती है।</p>\r\n<p class=\"\"><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"data:image/webp;base64,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\"></p>\r\n<p class=\"\">सुशांत इस पॉलिटिक्स को झेल नहीं पाए। उन्होंने इस प्रेशर को अपने दिमाग पर हावी होने दिया। मनोज ने कहा कि उन्होंने इस प्रेशर को झेल लिया कि क्योंकि वे जिद्दी थे, लेकिन सुशांत ऐसा नहीं कर सके। मनोज ने कहा कि वे और सुशांत एक दूसरे के काफी क्लोज थे। मनोज के मुताबिक, उन्होंने कभी नहीं सोचा था कि सुशांत सुसाइड जैसा कदम उठाएगा।</p>\r\n<p class=\"\"><strong>मनोज ने कहा- मेरे बनाए मटन को चाव से खाता था सुशांत</strong><br>मनोज ने आज तक से बात करते हुए कहा, \'\'सोनचिरैया की शूटिंग के वक्त हम काफी क्लोज हो गए थे। वो मेरा काफी सम्मान करता था। मैं सेट पर मटन बनाता था, वो बड़े चाव से उसे खाने आता था।</p>\r\n<p class=\"\">मुझे नहीं पता था कि वो कभी ऐसा कदम उठा लेगा। वो अक्सर चुनौतियों के बारे में मुझसे बातें किया करता था। मैं एक मोटी चमड़ी वाला इंसान था, इसलिए इन परेशानियों और चुनौतियों से पार पा सका।\'</p>\r\n<p class=\"\" style=\"text-align: center;\"><img src=\"data:image/webp;base64,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\"></p>\r\n<p class=\"\"><strong>\'मैंने जो फिल्में कीं, एक स्टारकिड नहीं कर सकता था\'</strong><br>मनोज से पूछा गया कि क्या नेपोटिज्म की वजह से रियल टैलेंट पीछे रह जाता है। जवाब में उन्होंने कहा, \'मैं नेपोटिज्म से कभी प्रभावित नहीं हुआ, क्योंकि मैंने जो फिल्में कीं, वो एक स्टारकिड नहीं कर सकता था।</p>\r\n<p class=\"\">ये फिल्में मैं नहीं करता तो नवाजुद्दीन करता, इरफान करता या फिर के के मेनन करता। ये कोई कमर्शियल फिल्में नहीं थीं, कोई भी उन फिल्मों पर पैसा नहीं लगाता। आप बार-बार नेपोटिज्म के नाम पर बहानेबाजी नहीं कर सकते। अगर आप एक अच्छे एक्टर हैं, तो थिएटर करिए। आपके अंदर टैलेंट होगा तो स्ट्रीट पर परफॉर्म करके भी आप पैसा कमा सकते हैं।</p>','1','4','2023-05-22','6148manoj-sushant1594197340_1684740855.webp',1,1,NULL,1,'2023-05-30 06:28:31');
/*!40000 ALTER TABLE `news` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `page_builder`
--

DROP TABLE IF EXISTS `page_builder`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `page_builder` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_name` varchar(191) NOT NULL,
  `section_order` varchar(191) NOT NULL,
  `section_code` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `page_builder`
--

LOCK TABLES `page_builder` WRITE;
/*!40000 ALTER TABLE `page_builder` DISABLE KEYS */;
/*!40000 ALTER TABLE `page_builder` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pages`
--

LOCK TABLES `pages` WRITE;
/*!40000 ALTER TABLE `pages` DISABLE KEYS */;
INSERT INTO `pages` VALUES
(1,'\r\nAbout Us','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(2,'Cookie Policy','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(3,'Disclaimer','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(4,'Contact Us','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(5,'RSS','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(6,'Complaint Redressal','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(7,'Advertise With Us','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(8,'Sitemap','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(9,'Privacy Policy','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.'),
(10,'Archives','Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');
/*!40000 ALTER TABLE `pages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES
(1,'Manage Advertisement'),
(2,'Manage Categories'),
(3,'Manage Footer'),
(4,'Manage News'),
(5,'Manage Header'),
(6,'Manage Logo'),
(7,'Manage Home Page');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
-- Table structure for table `socials`
--

DROP TABLE IF EXISTS `socials`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `socials` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `socials`
--

LOCK TABLES `socials` WRITE;
/*!40000 ALTER TABLE `socials` DISABLE KEYS */;
INSERT INTO `socials` VALUES
(1,'twitter','jsx-2167635379 nhtw-icon hsocial-sprite','https://www.twitter.com'),
(2,'youtube','jsx-2167635379 nhutb-icon hsocial-sprite','https://www.youtube.com/'),
(3,'facebook','jsx-2167635379 nhfb-icon hsocial-sprite','https://www.facebook.com'),
(4,'instagram','jsx-2167635379 nhig-icon hsocial-sprite','https://www.instagram.com/'),
(5,'telegram','sx-2167635379 nhutb-icon hsocial-sprite','https://www.telegram.com');
/*!40000 ALTER TABLE `socials` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subcategories`
--

DROP TABLE IF EXISTS `subcategories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subcategories` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subcategories`
--

LOCK TABLES `subcategories` WRITE;
/*!40000 ALTER TABLE `subcategories` DISABLE KEYS */;
INSERT INTO `subcategories` VALUES
(4,1,'बॉलीवुड'),
(5,1,'हॉलीवुड'),
(6,5,'सरकारी नौकरी'),
(7,5,'कॉर्पोरेट नौकरी');
/*!40000 ALTER TABLE `subcategories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `templates`
--

DROP TABLE IF EXISTS `templates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `templates` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `code` longtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `templates`
--

LOCK TABLES `templates` WRITE;
/*!40000 ALTER TABLE `templates` DISABLE KEYS */;
INSERT INTO `templates` VALUES
(2,'Ad','<div class=\"container\">\r\n            <div class=\"banner-ad-wrapper\">\r\n                <img src=\"img/ad/image-banner.webp\" width=\"100%\" height=\"auto\">\r\n            </div>\r\n        </div>',NULL,NULL),
(3,'Ad','{{rand(1,20)}}',NULL,NULL),
(4,'Ad','rand(1,20);',NULL,NULL);
/*!40000 ALTER TABLE `templates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-31 23:23:23
