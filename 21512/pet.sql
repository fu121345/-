-- One-click import for MySQL/MariaDB via phpMyAdmin (SQL tab)
-- Creates `menagerie` database, `pet` table, and inserts data parsed from pet.txt
-- Generated at: 2025-09-11T17:22:12

CREATE DATABASE IF NOT EXISTS menagerie
  DEFAULT CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE menagerie;

DROP TABLE IF EXISTS pet;
CREATE TABLE pet (
  name    VARCHAR(20)  NOT NULL,
  owner   VARCHAR(20)  NOT NULL,
  species VARCHAR(20)  NOT NULL,
  sex     CHAR(1)      NULL,
  birth   DATE         NOT NULL,
  death   DATE         NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO pet (name, owner, species, sex, birth, death) VALUES
  ('Fluffy', 'Harold', 'cat', 'f', '1993-02-04', NULL),
  ('Claws', 'Gwen', 'cat', 'm', '1994-03-17', NULL),
  ('Buffy', 'Harold', 'dog', 'f', '1989-05-13', NULL),
  ('Fang', 'Benny', 'dog', 'm', '1990-08-27', NULL),
  ('Bowser', 'Diane', 'dog', 'm', '1979-08-31', '1995-07-29'),
  ('Chirpy', 'Gwen', 'bird', 'f', '1998-09-11', NULL),
  ('Whistler', 'Gwen', 'bird', NULL, '1997-12-09', NULL),
  ('Slim', 'Benny', 'snake', 'm', '1996-04-29', NULL);

-- Quick test queries:
-- SELECT * FROM pet;
-- SELECT name, TIMESTAMPDIFF(YEAR, birth, COALESCE(death, CURDATE())) AS age_years FROM pet ORDER BY birth;
