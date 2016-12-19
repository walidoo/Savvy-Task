/*
Navicat MySQL Data Transfer

Source Server         : My DataBase
Source Server Version : 50620
Source Host           : localhost:3306
Source Database       : savvy_task

Target Server Type    : MYSQL
Target Server Version : 50620
File Encoding         : 65001

Date: 2016-12-19 00:17:19
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `categories`
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of categories
-- ----------------------------
INSERT INTO categories VALUES ('1', 'Sport', 'sport', '2016-12-15 14:49:35', '2016-12-15 23:56:37');
INSERT INTO categories VALUES ('2', 'Healthy Food', 'healthy_food', '2016-12-15 14:49:43', '2016-12-17 01:13:45');
INSERT INTO categories VALUES ('5', 'Reading', 'reading', '2016-12-17 01:58:00', '2016-12-17 01:58:00');

-- ----------------------------
-- Table structure for `categories_translation`
-- ----------------------------
DROP TABLE IF EXISTS `categories_translation`;
CREATE TABLE `categories_translation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `category_id` int(255) unsigned NOT NULL,
  `ar_category_name` varchar(255) DEFAULT NULL,
  `locale` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_ibfk_6` (`category_id`),
  CONSTRAINT `posts_ibfk_6` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of categories_translation
-- ----------------------------
INSERT INTO categories_translation VALUES ('1', '1', 'رياضة', 'ar');
INSERT INTO categories_translation VALUES ('10', '2', 'طعام صحي', 'ar');
INSERT INTO categories_translation VALUES ('12', '5', 'قراءة', 'ar');

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO migrations VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO migrations VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO migrations VALUES ('2016_12_14_164309_create_categories_table', '1');
INSERT INTO migrations VALUES ('2016_12_15_144508_create_posts_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO password_resets VALUES ('walid.wr.rezk@gmail.com', '8bec545b985e88974c5f144c344ebf4edc3f00d5f42c31da48e16d4a0052652a', '2016-12-16 02:33:17');

-- ----------------------------
-- Table structure for `posts`
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `post_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`),
  KEY `posts_category_id_foreign` (`category_id`),
  CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------
INSERT INTO posts VALUES ('1', 'Post One', 'advertisment01.jpg', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy.', '1', '1', '2016-12-15 20:33:29', '2016-12-15 20:38:29');
INSERT INTO posts VALUES ('5', 'Post Four', 'Lucerne, Switzerland (1).jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.', '1', '1', '2016-12-18 00:55:11', '2016-12-18 00:55:11');
INSERT INTO posts VALUES ('6', 'Post Two', 'advertisment02.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable.', '1', '1', '2016-12-18 17:32:03', '2016-12-18 17:32:03');
INSERT INTO posts VALUES ('7', 'Post Six', 'Santorini, Greece (1).jpg', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '1', '2', '2016-12-18 17:41:23', '2016-12-18 17:57:33');
INSERT INTO posts VALUES ('9', 'Post Nine', 'Singapore.jpg', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text.', '4', '1', '2016-12-18 20:43:14', '2016-12-18 20:43:14');

-- ----------------------------
-- Table structure for `posts_translation`
-- ----------------------------
DROP TABLE IF EXISTS `posts_translation`;
CREATE TABLE `posts_translation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ar_category_id` int(255) unsigned NOT NULL,
  `ar_user_id` int(25) unsigned NOT NULL,
  `post_id` int(255) unsigned NOT NULL,
  `ar_post_title` varchar(255) DEFAULT NULL,
  `ar_post_desc` varchar(255) DEFAULT NULL,
  `locale` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_ibfk_11` (`ar_category_id`),
  KEY `posts_ibfk_5` (`post_id`),
  KEY `posts_ibfk_12` (`ar_user_id`),
  CONSTRAINT `posts_ibfk_11` FOREIGN KEY (`ar_category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `posts_ibfk_12` FOREIGN KEY (`ar_user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `posts_ibfk_5` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of posts_translation
-- ----------------------------
INSERT INTO posts_translation VALUES ('1', '1', '1', '1', 'المنشور الأول', 'بعض الكلمات العربية عن محتوى المنشور الاول', 'ar');
INSERT INTO posts_translation VALUES ('2', '1', '1', '5', 'المنشور الرابع', 'هناك حقيقة مثبتة منذ زمن طويل وهي أن المحتوى المقروء لصفحة ما سيلهي القارئ عن التركيز على الشكل الخارجي للنص أو شكل توضع الفقرات في الصفحة التي يقرأها. ولذلك يتم استخدام طريقة لوريم إيبسوم لأنها تعطي توزيعاَ طبيعياَ -إلى حد ما- للأحرف عوضاً عن استخدام \"هن', '');
INSERT INTO posts_translation VALUES ('3', '1', '1', '6', 'المنشور الثانى', 'نالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخبأة', 'ar');
INSERT INTO posts_translation VALUES ('4', '2', '1', '7', 'المنشور السادس', 'خلافاَ للإعتقاد السائد فإن لوريم إيبسوم ليس نصاَ عشوائياً، بل إن له جذور في الأدب اللاتيني الكلاسيكي منذ العام 45 قبل الميلاد، مما يجعله أكثر من 2000 عام في القدم.', 'ar');
INSERT INTO posts_translation VALUES ('5', '1', '4', '9', '  المنشور التاسع  ', '  هنالك العديد من الأنواع المتوفرة لنصوص لوريم إيبسوم، ولكن الغالبية تم تعديلها بشكل ما عبر إدخال بعض النوادر أو الكلمات العشوائية إلى النص. إن كنت تريد أن تستخدم نص لوريم إيبسوم ما، عليك أن تتحقق أولاً أن ليس هناك أي كلمات أو عبارات محرجة أو غير لائقة مخ', 'ar');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO users VALUES ('1', 'Walid', 'Rezk', 'walid.wr.rezk@gmail.com', '$2y$10$PCKopDNhUvzfuoMk/7ub0u/EdW3I5hii94Fwj.crEekhRhwwhwEPi', '8i6O0U6xCk1QXTPKmTOGxXgJ973KxUBfE3Zq3gAJiEZ0hdVrIIhzcUZrslV8', '2016-12-15 14:48:57', '2016-12-18 22:02:36');
INSERT INTO users VALUES ('4', 'Mohamed', 'Rezk', 'mohamed@gmail.com', '$2y$10$lkpb97U2tssv7W3/27H8l.uiVBFCZSdAnkdbJ9LIZlg7KlW7IPThq', 'QCZy31p4g6qcFCQkCkniIiUaqLch2dPGUMDxHURbJrQd62mMbATREbOyqwJJ', '2016-12-15 21:26:18', '2016-12-18 22:14:47');
