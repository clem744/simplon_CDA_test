CREATE DATABASE IF NOT EXISTS `ApiRest`

CREATE TABLE `Topic` (
  `id`int NOT NULL,
  `title` tinytext NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE 'Post' (
  'id' int NOT NULL,
  'content' text NOT NULL,
  'author' tinytext NOT NULL,
  'date' datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8
