DROP DATABASE IF EXISTS serverside;

CREATE DATABASE serverside;

USE serverside;

CREATE USER 'serveruser'@'%' IDENTIFIED BY 'pass123';
GRANT SELECT, INSERT, DELETE, CREATE, UPDATE, DROP, ALTER ON serverside.* TO 'serveruser'@'%';

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
