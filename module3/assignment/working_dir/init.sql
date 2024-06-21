DROP DATABASE IF EXISTS serverside;

CREATE DATABASE serverside;

USE serverside;

SET @@global.time_zone = 'America/Winnipeg';
SET @@session.time_zone = 'America/Winnipeg';

DROP TABLE IF EXISTS posts;
CREATE TABLE posts
(
    id      BIGINT auto_increment NOT NULL,
    title   varchar(100) NULL,
    content TEXT NULL,
    `date`  TIMESTAMP DEFAULT CURRENT_TIMESTAMP NULL,
    CONSTRAINT posts_pk PRIMARY KEY (id)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;
