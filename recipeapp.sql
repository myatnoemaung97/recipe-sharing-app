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

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  `comment` text NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  `user_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `recipe_id` (`recipe_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

DROP TABLE IF EXISTS `favourites`;
CREATE TABLE `favourites` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `recipe_id` int NOT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_id` (`user_id`),
  KEY `recipe_id` (`recipe_id`),
  CONSTRAINT `favourites_ibfk_1` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`),
  CONSTRAINT `favourites_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `favourites_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `favourites_ibfk_4` FOREIGN KEY (`recipe_id`) REFERENCES `recipes` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `admins` (`id`, `user_id`) VALUES
(1, 29);
INSERT INTO `admins` (`id`, `user_id`) VALUES
(2, 31);


INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`, `user_name`) VALUES
(4, 23, 16, 'Yummy', '2023-09-11 14:59:47', NULL, 'myat');
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`, `user_name`) VALUES
(5, 24, 16, 'Delicious', '2023-09-11 15:00:23', NULL, 'noe');
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`, `user_name`) VALUES
(30, 25, 7, 'Nice', '2023-09-12 13:15:51', NULL, 'mike');
INSERT INTO `comments` (`id`, `user_id`, `recipe_id`, `comment`, `created`, `updated`, `user_name`) VALUES
(31, 25, 7, 'mite tl', '2023-09-12 13:17:11', NULL, 'mike'),
(32, 25, 16, 'itadakimasu', '2023-09-12 13:46:40', NULL, 'mike'),
(33, 25, 16, 'arigatou', '2023-09-12 13:47:14', NULL, 'mike'),
(35, 25, 16, 'Tasty', '2023-09-12 14:02:18', NULL, 'mike'),
(41, 23, 9, 'tjhghjgh', '2023-09-13 15:55:22', NULL, 'myat');

INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(11, 23, 10);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(12, 23, 7);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(25, 23, 9);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(26, 23, 12),
(30, 23, 11),
(52, 25, 7),
(53, 25, 16);

INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(6, 23, 12, 4);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(7, 24, 12, 2);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(8, 24, 11, 4);
INSERT INTO `ratings` (`id`, `user_id`, `recipe_id`, `rating`) VALUES
(9, 25, 12, 5),
(10, 25, 11, 5),
(11, 23, 10, 3),
(12, 25, 16, 3),
(13, 25, 7, 5),
(14, 25, 10, 5);

INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(7, 'asdgsg', 32, 1, 'rgrrdghdfg', 'abdrhbdghdrhgd', 3, '/resources/uploads/Simply-Recipes-Huevos-Rancheros-LEAD-3-35bb4aa811a044d0b06cc9bbbe8687df.jpg', 18, 23, '2023-09-07 13:35:03', 'werewrwerwer', '2023-09-08 17:00:20', 5);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(9, 'Ratatoullie', 12, 3, 'Skibi di', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 1, '/resources/uploads/Baked-Zucchini_-10.jpg', 49, 23, '2023-09-07 14:02:43', 'rat meat - 1g,salad - 3', '2023-09-09 10:25:54', 0);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(10, 'Pizza', 2, 3, 'sdfsdfsd', 'gfhgjkghkjgh', 2, '/resources/uploads/images.jpg', 46, 23, '2023-09-07 14:29:29', 'salt - 1tsp', '2023-09-08 17:00:44', 4);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `rating`) VALUES
(11, 'fasdfsdf', 1, 2, 'asfgyuj56iu', 'oieefu98uf98sdafoisdjfoisdjfusjdf8hsdhfisdhfiuhsdifjisdjf', 4, '/resources/uploads/download.jpg', 74, 28, '2023-09-07 14:51:40', 'werwterter', NULL, 0),
(12, '3rwr', 2, 3, 'wettert', 'sfsdgergtertgret', 2, '/resources/uploads/Simply-Recipes-Huevos-Rancheros-LEAD-3-35bb4aa811a044d0b06cc9bbbe8687df.jpg', 105, 28, '2023-09-07 14:52:48', 'drgrertg', NULL, 4),
(13, 'fojsidfj', 2, 2, 's9fjdgjfdgfiduhgfidhgfdgfdjgofdjgofdjgofdjgofdijgofdjg sodgffidjfsodifjoidj sdfigfhfdigjidgsdf osdfjosfjosjfosdjfj o', 'lasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfj', 2, '/resources/uploads/Baked-Zucchini_-10.jpg', 60, 28, '2023-09-07 16:14:45', 'osjdfoj,esfsef,sdfsdf,sdfsdf,sfsdf,sdfsdf,xvxcv,sdfsfd,sdfsf,sdfsdf,sdad,jtyity,xvcxv', NULL, 0),
(16, 'Grimace Shake', 5, 2, 'wmji,kjmihnuedsrcbgh', 'thjukjygjhgnfghfgfsd', 4, '/resources/uploads/16354-easy-meatloaf-mfs-74-3d9368335f824e31ab2564932cc26fa3.jpg', 172, 25, '2023-09-11 11:35:57', 'fasdfasdf,iyuiyuiyuiyui', NULL, 3),
(17, 'poiuiopoi', 2, 2, 'piolikijmhjmkuikuik', 'ikhjmyjhmyukyuiyui\'fajshdfiuhasf\"\"afhiusiahsifuiasdfasf', 2, '/resources/uploads/cucumber-sandwich-eddcc95811f5426094ea5dbea6a6b026.jpg', 46, 25, '2023-09-11 11:36:24', '5uytjhgj', '2023-09-11 13:20:12', 0),
(18, 'qw4rwesfsd', 3, 3, 'sdfsdfds', '<h1>Do this</h1>', 2, '/resources/uploads/Simply-Recipes-DIY-Macaroni-Cheese-LEAD-02-0fc3a4f066b84febb5dcf6a697eb2a0b.jpg', 3, 25, '2023-09-12 13:40:23', 'asdfasfd,asdfasdf', NULL, 0),
(22, 'Sushi', 15, 2, '', 'Make it. Roll it. Eat it', 2, '/resources/uploads/sushi.jpg', 0, 29, '2023-09-14 13:50:17', 'rice,fish,seaweed,carrot', NULL, 0),
(23, 'Spaghetti', 45, 1, '', 'Look it up', 1, '/resources/uploads/spaghetti.jpeg', 0, 29, '2023-09-14 13:52:36', 'sauce,noodle', NULL, 0);

INSERT INTO `stats` (`id`, `users`, `recipes`) VALUES
(1, 30, 23);


INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`) VALUES
(1, 'fasf', 'sdfkj@jfsdlkjcom', 'sdlfjksdjf', 0, '2023-09-04 15:25:55', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`) VALUES
(2, 'dfkj', 'skjfk', '2', 0, '2023-09-04 16:24:31', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`) VALUES
(3, 'dfkj', 'skjfk', '2', 0, '2023-09-04 16:24:54', NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `created`, `updated`) VALUES
(4, 'sdfs', 'sdldkjfd', 's', 0, '2023-09-04 16:25:34', NULL),
(5, '', '', '', 0, '2023-09-04 16:25:45', NULL),
(6, '', '', '', 0, '2023-09-04 16:26:03', NULL),
(7, '', '', '', 0, '2023-09-04 16:27:20', NULL),
(8, 'dsffsds', 'af@fslk.com', 'd', 0, '2023-09-04 16:27:38', NULL),
(9, 'sfd', 'sdf', 's', 0, '2023-09-04 16:29:51', NULL),
(13, 'sfsdf', 'qdslkfj@sjg.com', 'df', 0, '2023-09-04 16:38:49', NULL),
(14, 'sdf', 'dsf@fslk.om', 'df', 0, '2023-09-04 16:40:31', NULL),
(15, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:44:09', NULL),
(16, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:44:24', NULL),
(17, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:44:45', NULL),
(18, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:47:01', NULL),
(19, 'ksdfj', 'fkd', 'ksd', 0, '2023-09-04 16:47:04', NULL),
(20, 'dfkjs', 'sdljfk@dfjksd.com', 'slkdf', 0, '2023-09-04 19:22:18', NULL),
(21, 'fjkd', 'fksd@lkdf.ckm', 'sdlkjflksjd', 0, '2023-09-04 19:23:26', NULL),
(22, 'sdfkk', 'slkdjf@lsfk.cokm', 'sjfoisjf', 0, '2023-09-04 19:24:05', NULL),
(23, 'maung', 'maung@gmail.com', '$2y$10$VZN7AWOt6yN1zSdzoxo1jOziKPIKbMJV6Upx4KKkJ6lRqtgXT6j52', 0, '2023-09-05 10:11:51', NULL),
(24, 'noe', 'noe@gmail.com', '$2y$10$0OIgOPN4oPLyM/GJ/6AjI.Pa7s5LIpQBQng/ZQtRnCSaHZ7B77dre', 0, '2023-09-05 10:30:46', NULL),
(25, 'mike', 'mike@gmail.com', '$2y$10$EJwU1TJmZLUYZChXNqBFsOET0z00yKy4EICpAnaOaS1.gydmmlNXq', 0, '2023-09-07 14:43:55', NULL),
(26, 'Nate', 'nate@gmail.com', '$2y$10$e5DcsAlAT/F6keABQtgXuOHs7te/bYfrWPgS3eptP8Vl9sISE/GV.', 0, '2023-09-07 14:44:51', NULL),
(27, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$ogMmWvGOXWSI.nVH2Yr0gOMYV9U/RfCuaG/7xHK.w0kNhHImjbkIC', 0, '2023-09-07 14:48:44', NULL),
(28, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$MRnHeRFd/mXD6W41CiwGZOxattZMHjJQE2WaMD3DilxoiLp90Qzwe', 0, '2023-09-07 14:51:15', NULL),
(29, 'admin', 'admin@gmail.com', '$2y$10$Kq2EBt5kB7QcN5fovwZ53OVbbwn0aPoFugAWTP5FWj3iPovdtNPpK', 1, '2023-09-14 10:27:42', NULL),
(31, 'paul', 'paul@gmail.com', '$2y$10$gyYuK5yjoBDa0pPpkLlb..fLVjHlsRu8rFjifmVCrmgcA395qOQZm', 1, '2023-09-14 16:44:12', NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;