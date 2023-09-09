/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `ratings` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `recipes_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int DEFAULT '0',
  `created` datetime NOT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;



INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(10, 23, 12);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(11, 23, 10);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(12, 23, 7);
INSERT INTO `favourites` (`id`, `user_id`, `recipe_id`) VALUES
(25, 23, 9);



INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `ratings`) VALUES
(7, 'asdgsg', 32, 1, 'rgrrdghdfg', 'abdrhbdghdrhgd', 3, '/resources/uploads/Simply-Recipes-Huevos-Rancheros-LEAD-3-35bb4aa811a044d0b06cc9bbbe8687df.jpg', 9, 23, '2023-09-07 13:35:03', 'werewrwerwer', '2023-09-08 17:00:20', NULL);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `ratings`) VALUES
(9, 'Ratatoullie', 12, 3, 'Skibi di', 'qqqqqqqqqqqqqqqqqqqqqqqqqqqqq', 1, '/resources/uploads/Baked-Zucchini_-10.jpg', 43, 23, '2023-09-07 14:02:43', 'rat meat - 1g,salad - 3', '2023-09-09 10:25:54', NULL);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `ratings`) VALUES
(10, 'Pizza', 2, 3, 'sdfsdfsd', 'gfhgjkghkjgh', 2, '/resources/uploads/images.jpg', 19, 23, '2023-09-07 14:29:29', 'salt - 1tsp', '2023-09-08 17:00:44', NULL);
INSERT INTO `recipes` (`id`, `name`, `time`, `difficulty`, `description`, `instructions`, `servings`, `image`, `views`, `user_id`, `created`, `ingredients`, `updated`, `ratings`) VALUES
(11, 'fasdfsdf', 1, 2, 'asfgyuj56iu', 'oieefu98uf98sdafoisdjfoisdjfusjdf8hsdhfisdhfiuhsdifjisdjf', 4, '/resources/uploads/download.jpg', 14, 28, '2023-09-07 14:51:40', 'werwterter', NULL, NULL),
(12, '3rwr', 2, 3, 'wettert', 'sfsdgergtertgret', 2, '/resources/uploads/Simply-Recipes-Huevos-Rancheros-LEAD-3-35bb4aa811a044d0b06cc9bbbe8687df.jpg', 1, 28, '2023-09-07 14:52:48', 'drgrertg', NULL, NULL),
(13, 'fojsidfj', 2, 2, 's9fjdgjfdgfiduhgfidhgfdgfdjgofdjgofdjgofdjgofdijgofdjg sodgffidjfsodifjoidj sdfigfhfdigjidgsdf osdfjosfjosjfosdjfj o', 'lasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfjlasoigjferjgjdfghfdgoj osaijifoisdjf sodifjlfj j sodfjsd9j osijidoi soijfo sddkgfjsldfj. sdjffslfskdjfs jsdofjl . osjfoji . osjfo joij ifjosdf. osfj', 2, '/resources/uploads/Baked-Zucchini_-10.jpg', 20, 28, '2023-09-07 16:14:45', 'osjdfoj,esfsef,sdfsdf,sdfsdf,sfsdf,sdfsdf,xvxcv,sdfsfd,sdfsf,sdfsdf,sdad,jtyity,xvcxv', NULL, NULL);

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
(10, '', '', '', 0, '2023-09-04 16:37:55', NULL),
(11, '', '', '', 0, '2023-09-04 16:38:23', NULL),
(12, 'sfds', '', '', 0, '2023-09-04 16:38:40', NULL),
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
(23, 'myat', 'myat@gmail.com', '$2y$10$VZN7AWOt6yN1zSdzoxo1jOziKPIKbMJV6Upx4KKkJ6lRqtgXT6j52', 0, '2023-09-05 10:11:51', NULL),
(24, 'noe', 'noe@gmail.com', '$2y$10$0OIgOPN4oPLyM/GJ/6AjI.Pa7s5LIpQBQng/ZQtRnCSaHZ7B77dre', 0, '2023-09-05 10:30:46', NULL),
(25, 'mike', 'mike@gmail.com', '$2y$10$EJwU1TJmZLUYZChXNqBFsOET0z00yKy4EICpAnaOaS1.gydmmlNXq', 0, '2023-09-07 14:43:55', NULL),
(26, 'Nate', 'nate@gmail.com', '$2y$10$e5DcsAlAT/F6keABQtgXuOHs7te/bYfrWPgS3eptP8Vl9sISE/GV.', 0, '2023-09-07 14:44:51', NULL),
(27, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$ogMmWvGOXWSI.nVH2Yr0gOMYV9U/RfCuaG/7xHK.w0kNhHImjbkIC', 0, '2023-09-07 14:48:44', NULL),
(28, 'asdfsdaf', 'safsd@gfsgdf.fgb', '$2y$10$MRnHeRFd/mXD6W41CiwGZOxattZMHjJQE2WaMD3DilxoiLp90Qzwe', 0, '2023-09-07 14:51:15', NULL);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;