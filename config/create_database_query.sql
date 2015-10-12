-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2014 at 07:53 PM
-- Server version: 5.6.12
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `tutorial`
--
CREATE DATABASE IF NOT EXISTS `www8` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `www8`;

-- --------------------------------------------------------
--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  user_id int(11) NOT NULL auto_increment,
  user_username varchar(20) NOT NULL,
  user_firstName varchar(40) NOT NULL,
  user_lastName varchar(40) NOT NULL,
  user_password char(40) NOT NULL,
  user_email varchar(254) NOT NULL,
  user_phoneNumber varchar(10) NOT NULL,
  user_highSchool varchar(40) NOT NULL,
  user_highSchoolGradYear varchar(4) NOT NULL,
  user_description text NOT NULL,
  user_photo varchar(40) NOT NULL,
  user_memberType int(1) NOT NULL default 0,
  PRIMARY KEY (user_id),
  UNIQUE KEY user_username (user_username),
  UNIQUE KEY user_email (user_email)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `user_followings`;
CREATE TABLE IF NOT EXISTS `user_followings` (
  follower_id int(11) NOT NULL,
  following_id int(11) NOT NULL,
  FOREIGN KEY (follower_id) REFERENCES users(user_id) ON DELETE CASCADE,
  FOREIGN KEY (following_id) REFERENCES users(user_id) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `blog_tags`;
CREATE TABLE IF NOT EXISTS `blog_tags` (
  blog_tag_id int(11) NOT NULL auto_increment,
  blog_tag_name varchar(20) NOT NULL,
  PRIMARY KEY (blog_tag_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `blog_content`;
CREATE TABLE IF NOT EXISTS `blog_content` (
  blog_content_id int(11) NOT NULL auto_increment,
  blog_tag_id int(11) NOT NULL,
  blog_user_id int(11) NOT NULL,
  blog_content_title varchar(50) NOT NULL,
  blog_content_text text NOT NULL,
  blog_content_date timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  blog_publish int(1) NOT NULL default 0,
  PRIMARY KEY (blog_content_id),
  FOREIGN KEY (blog_user_id) REFERENCES users(user_id) ON DELETE CASCADE,
  FOREIGN KEY (blog_tag_id) REFERENCES blog_tags(blog_tag_id) ON DELETE CASCADE

) ENGINE=InnoDB DEFAULT CHARSET=utf8;



--
-- Dumping data for table `user`
--


INSERT INTO `users` (`user_username`, `user_firstName`, `user_lastName`, `user_password`, `user_email`, `user_phoneNumber`, `user_highSchool`, `user_highSchoolGradYear`, `user_description`, `user_photo`, `user_memberType`) VALUES
('www8', 'William', 'Wong', '123456', 'www8@sfu.ca', '7788553954', 'Point Grey Secondary School', '2009', 'Hi, this is William. I\'m a SIAT student.', '', 1),
('gwa13', 'Gary', 'Wong', '123456', 'gwa13@sfu.ca', '7785947834', 'David Thompson Secondary School', '2000', 'I am Gary', '', 1);


-- INSERT INTO `user` (`iduser`, `firstName`, `lastName`, `email`) VALUES
-- (1, 'Faye', 'Holt', 'fholt@acme.com'),
-- (2, 'Damon', 'Howard', 'dhowaard@acme.com'),
-- (3, 'Thomas', 'French', 'tfrench@acme.com'),
-- (4, 'Natasha', 'Pierce', 'npierce@acme.com'),
-- (5, 'Homer', 'Reyes', 'hreyes@acme.com'),
-- (6, 'Gerardo', 'Martinez', 'gmartinez@acme.com'),
-- (7, 'Jenny', 'Mann', 'jmann@acme.com'),
-- (8, 'Sheryl', 'Erickson', 'serickson@acme.com'),
-- (9, 'Stella', 'Fuller', 'sfuller@acme.com'),
-- (10, 'Victoria', 'Wilson', 'vwilson@acme.com');