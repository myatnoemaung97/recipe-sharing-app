/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `admins_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `banned_emails`;
CREATE TABLE `banned_emails` (
  `id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE `favourites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `favourites_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favourites_ibfk_4` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE `ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `rating` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `recipes`;
CREATE TABLE `recipes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `time` int NOT NULL,
  `difficulty` int DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `instructions` text NOT NULL,
  `servings` int DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `views` int DEFAULT '0',
  `user_id` int NOT NULL,
  `created` datetime NOT NULL,
  `ingredients` text NOT NULL,
  `updated` datetime DEFAULT NULL,
  `rating` int DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `content_id` int NOT NULL,
  `content_type` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'pending',
  `description` varchar(255) DEFAULT NULL,
  `report_type` varchar(255) DEFAULT NULL,
  `author_id` int NOT NULL,
  `action_taken` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `content_author_id` (`author_id`),
  CONSTRAINT `reports_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reports_ibfk_2` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `stats`;
CREATE TABLE `stats` (
  `id` int NOT NULL AUTO_INCREMENT,
  `users` int NOT NULL,
  `recipes` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `banned` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admins` (`id`, `user_id`) VALUES
(1, 29);
INSERT INTO `admins` (`id`, `user_id`) VALUES
(2, 31);




INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`) VALUES
(4, 23, 16, 'Yummy', '2023-09-11 14:59:47', NULL);
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`) VALUES
(5, 24, 16, 'Delicious', '2023-09-11 15:00:23', NULL);
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`) VALUES
(30, 25, 7, 'Nice', '2023-09-12 13:15:51', NULL);
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`) VALUES
(31, 25, 7, 'mite tl', '2023-09-12 13:17:11', NULL),
(32, 25, 16, 'itadakimasu', '2023-09-12 13:46:40', NULL),
(41, 23, 9, 'tjhghjgh', '2023-09-13 15:55:22', NULL),
(44, 23, 16, 'let him cook', '2023-09-18 11:53:05', NULL),
(52, 25, 30, 'cool', '2023-09-19 11:38:08', NULL),
(53, 49, 32, 'fagfdgfdgfdgd', '2023-09-19 15:49:17', NULL),
(54, 49, 31, 'ccnvbnvbndfsdfs', '2023-09-19 15:50:04', NULL),
(59, 23, 7, 'thganks', '2023-09-19 16:24:35', NULL);

INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(11, 23, 10);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(12, 23, 7);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(25, 23, 9);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(52, 25, 7),
(53, 25, 16),
(54, 31, 31),
(57, 29, 10),
(59, 49, 31);

INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(11, 23, 10, 3);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(12, 25, 16, 3);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(13, 25, 7, 5);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(14, 25, 10, 5),
(15, 24, 10, 3),
(16, 31, 31, 3),
(17, 25, 31, 5),
(19, 29, 10, 5);

INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(7, 'asdgsg', 32, 1, 'rgrrdghdfg', 'abdrhbdghdrhgd', 3, '/resources/uploads/Simply-Recipes-Huevos-Rancheros-LEAD-3-35bb4aa811a044d0b06cc9bbbe8687df.jpg', 35, 23, '2023-09-07 13:35:03', 'werewrwerwer', '2023-09-08 17:00:20', 5);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(9, 'Ratatoullie', 12, 3, 'Skibi di', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 1, '/resources/uploads/Baked-Zucchini_-10.jpg', 90, 23, '2023-09-07 14:02:43', 'rat meat - 1g,salad - 3', '2023-09-09 10:25:54', 0);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(10, 'Pizza', 2, 3, 'sdfsdfsd', 'gfhgjkghkjgh', 2, '/resources/uploads/images.jpg', 85, 23, '2023-09-07 14:29:29', 'salt - 1tsp', '2023-09-08 17:00:44', 4);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(13, 'fojsidfj', 2, 2, 's9fjdgjfdgfiduhgfidhgfdgfdjgofdjgofdjgofdjgofdijgofdjg sodgffidjfsodifjoidj sdfigfhfdigjidgsdf osdfjosfjosjfosdjfj o', 'lasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfj', 2, '/resources/uploads/Baked-Zucchini_-10.jpg', 66, 28, '2023-09-07 16:14:45', 'osjdfoj,esfsef,sdfsdf,sdfsdf,sfsdf,sdfsdf,xvxcv,sdfsfd,sdfsf,sdfsdf,sdad,jtyity,xvcxv', NULL, 0),
(16, 'Grimace Shake', 5, 2, 'wmji,kjmihnuedsrcbgh', 'thjukjygjhgnfghfgfsd', 4, '/resources/uploads/16354-easy-meatloaf-mfs-74-3d9368335f824e31ab2564932cc26fa3.jpg', 247, 25, '2023-09-11 11:35:57', 'fasdfasdf,iyuiyuiyuiyui', NULL, 3),
(30, 'ghuohe', 2, 2, '', 'ghththtrh', 1, '/resources/uploads/image.jpg', 31, 24, '2023-09-15 16:04:21', 'dfgfdgfdg', NULL, 0),
(31, 'Sushi', 15, 1, '', 'Make it. Roll it. Eat it.', 2, '/resources/uploads/sushi.jpg65042c32e3cd9', 27, 24, '2023-09-15 16:34:34', 'rice,carrot,seaweed', NULL, 4),
(32, 'Flan', 30, 2, '', 'Google it', 1, '/resources/uploads/flan.jpg65068e5c23698', 13, 31, '2023-09-17 11:57:56', 'pudding', NULL, 0),
(34, 'Deez nuts', 69, 3, '', 'ligma balls', 419, '/resources/uploads/mansion A.jpg65096649b31ba', 1, 49, '2023-09-19 15:43:45', 'deez,nuts', NULL, 0);

INSERT INTO `reports` (`id`, `user_id`, `content_id`, `content_type`, `date`, `status`, `description`, `report_type`, `author_id`, `action_taken`) VALUES
(20, 24, 16, 'recipe', '2023-09-18 16:51:50', 'resolved', 'afasfdasdf', 'copyrights_infringement', 25, NULL);
INSERT INTO `reports` (`id`, `user_id`, `content_id`, `content_type`, `date`, `status`, `description`, `report_type`, `author_id`, `action_taken`) VALUES
(21, 24, 49, 'comment', '2023-09-18 16:53:49', 'resolved', 'sdfg', 'spam', 23, NULL);
INSERT INTO `reports` (`id`, `user_id`, `content_id`, `content_type`, `date`, `status`, `description`, `report_type`, `author_id`, `action_taken`) VALUES
(32, 23, 5, 'comment', '2023-09-19 13:05:13', 'resolved', '', '', 24, NULL);
INSERT INTO `reports` (`id`, `user_id`, `content_id`, `content_type`, `date`, `status`, `description`, `report_type`, `author_id`, `action_taken`) VALUES
(33, 23, 34, 'recipe', '2023-09-19 15:56:35', 'resolved', '', '', 49, 'banned'),
(34, 23, 54, 'comment', '2023-09-19 15:56:49', 'resolved', '', '', 49, 'none'),
(35, 23, 53, 'comment', '2023-09-19 16:01:30', 'resolved', '', '', 49, NULL);

INSERT INTO `stats` (`id`, `users`, `recipes`) VALUES
(1, 48, 34);


INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`, `banned`) VALUES
(4, 'sdfs', 'sdldkjfd', 's', 0, '2023-09-04 16:25:34', NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`, `banned`) VALUES
(8, 'dsffsds', 'af@fslk.com', 'd', 0, '2023-09-04 16:27:38', NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`, `banned`) VALUES
(9, 'sfd', 'sdf', 's', 0, '2023-09-04 16:29:51', NULL, 0);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`, `banned`) VALUES
(13, 'sfsdf', 'qdslkfj@sjg.com', 'df', 0, '2023-09-04 16:38:49', NULL, 0),
(16, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:44:24', NULL, 0),
(17, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:44:45', NULL, 0),
(18, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:47:01', NULL, 0),
(20, 'dfkjs', 'sdljfk@dfjksd.com', 'slkdf', 0, '2023-09-04 19:22:18', NULL, 0),
(21, 'fjkd', 'fksd@lkdf.ckm', 'sdlkjflksjd', 0, '2023-09-04 19:23:26', NULL, 0),
(22, 'sdfkk', 'slkdjf@lsfk.cokm', 'sjfoisjf', 0, '2023-09-04 19:24:05', NULL, 0),
(23, 'maung', 'maung@gmail.com', '$2y$10$VZN7AWOt6yN1zSdzoxo1jOziKPIKbMJV6Upx4KKkJ6lRqtgXT6j52', 0, '2023-09-05 10:11:51', NULL, 0),
(24, 'noe', 'noe@outlook.com', '$2y$10$0OIgOPN4oPLyM/GJ/6AjI.Pa7s5LIpQBQng/ZQtRnCSaHZ7B77dre', 0, '2023-09-05 10:30:46', '2023-09-15 09:23:51', 0),
(25, 'mike', 'mike@gmail.com', '$2y$10$EJwU1TJmZLUYZChXNqBFsOET0z00yKy4EICpAnaOaS1.gydmmlNXq', 0, '2023-09-07 14:43:55', NULL, 0),
(26, 'Nate', 'nate@gmail.com', '$2y$10$e5DcsAlAT/F6keABQtgXuOHs7te/bYfrWPgS3eptP8Vl9sISE/GV.', 0, '2023-09-07 14:44:51', NULL, 0),
(27, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$ogMmWvGOXWSI.nVH2Yr0gOMYV9U/RfCuaG/7xHK.w0kNhHImjbkIC', 0, '2023-09-07 14:48:44', NULL, 0),
(28, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$MRnHeRFd/mXD6W41CiwGZOxattZMHjJQE2WaMD3DilxoiLp90Qzwe', 0, '2023-09-07 14:51:15', NULL, 0),
(29, 'admin', 'admin@gmail.com', '$2y$10$Kq2EBt5kB7QcN5fovwZ53OVbbwn0aPoFugAWTP5FWj3iPovdtNPpK', 1, '2023-09-14 10:27:42', NULL, 0),
(31, 'paul', 'paul@gmail.com', '$2y$10$gyYuK5yjoBDa0pPpkLlb..fLVjHlsRu8rFjifmVCrmgcA395qOQZm', 1, '2023-09-14 16:44:12', NULL, 0),
(46, 'New user', 'newuser@gmail.com', '$2y$10$4n/DyDE2ILG09KtCD9Wzc.2igz6qdx9mSbx.TrnP6qGe8PvEelqA.', 0, '2023-09-15 13:45:09', NULL, 0),
(48, 'hank', 'hank@gmail.com', '$2y$10$EN0njjGhxHU9dgwe9lfdte/QK2fiQ/Qwo7TTQRCFo4zhvlROtUtW6', 0, '2023-09-19 10:39:24', NULL, 0),
(49, 'lusoe', 'lusoe@gmail.com', '$2y$10$Ef1xkaRE4.vx0/XDdtyOk.nONxUSK3uywXriCC4tNKkxRW61K3W5K', 0, '2023-09-19 15:42:28', NULL, 1);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;