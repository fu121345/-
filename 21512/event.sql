-- One-click import for MySQL/MariaDB via phpMyAdmin (SQL tab)
-- Creates/uses `menagerie` database, creates `event` table, and inserts data parsed from event.txt
-- Generated at: 2025-09-11T17:30:32

CREATE DATABASE IF NOT EXISTS menagerie
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE menagerie;

DROP TABLE IF EXISTS `event`;
CREATE TABLE `event` (
  `name`   VARCHAR(20)  NOT NULL,
  `date`   DATE         NOT NULL,
  `type`   VARCHAR(15)  NOT NULL,
  `remark` VARCHAR(255) NULL,
  KEY `idx_event_name_date` (`name`, `date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `event` (`name`, `date`, `type`, `remark`) VALUES
  ('Fluffy', '1995-05-15', 'litter', '4 kittens, 3 female, 1 male'),
  ('Buffy', '1993-06-23', 'litter', '5 puppies, 2 female, 3 male'),
  ('Buffy', '1994-06-19', 'litter', '3 puppies, 3 female'),
  ('Chirpy', '1999-03-21', 'vet', 'needed beak straightened'),
  ('Slim', '1997-08-03', 'vet', 'broken rib'),
  ('Bowser', '1991-10-12', 'kennel', NULL),
  ('Fang', '1991-10-12', 'kennel', NULL),
  ('Fang', '1998-08-28', 'birthday', 'Gave him a new chew toy'),
  ('Claws', '1998-03-17', 'birthday', 'Gave him a new flea collar'),
  ('Whistler', '1998-12-09', 'birthday', 'First birthday');

-- Quick test queries:
-- SELECT * FROM `event` ORDER BY `date`;
-- SELECT `name`, COUNT(*) AS cnt FROM `event` GROUP BY `name` ORDER BY cnt DESC;
