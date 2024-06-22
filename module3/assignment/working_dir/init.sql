-- if serverside database exists, delete it.
DROP DATABASE IF EXISTS serverside;

-- create database serverside
CREATE DATABASE serverside;

-- use database serverside, the following operation will happen within this database
USE serverside;

-- create new user serveruser and specify the user's password is pass123
CREATE USER 'serveruser'@'%' IDENTIFIED BY 'pass123';
-- grant serveruser permission to select, insert, delete, create, update, drop, alter
GRANT SELECT, INSERT, DELETE, CREATE, UPDATE, DROP, ALTER ON serverside.* TO 'serveruser'@'%';

-- if table posts exists, delete it
DROP TABLE IF EXISTS posts;

-- create table posts
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
