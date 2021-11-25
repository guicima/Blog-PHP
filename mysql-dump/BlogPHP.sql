CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255),
  `email` varchar(255),
  `password` varchar(255),
  `is_admin` boolean DEFAULT false,
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime
);

CREATE TABLE `auth` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `token` varchar(64) NOT NULL,
  `user_id` int NOT NULL
);

CREATE TABLE `articles` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255),
  `tiny_text` text,
  `text` text,
  `image_url` varchar(255),
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime
);

CREATE TABLE `comments` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `article_id` int NOT NULL,
  `text` text,
  `state` varchar(255),
  `modified_at` datetime,
  `created_at` datetime,
  `is_response` boolean DEFAULT false,
  `comment_id` int
);

ALTER TABLE `comments` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`);

ALTER TABLE `comments` ADD FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`);

ALTER TABLE `auth` ADD FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
