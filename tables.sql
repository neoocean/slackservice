-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 10, 2015 at 05:22 AM
-- Server version: 10.0.12-MariaDB
-- PHP Version: 5.2.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `u578200698_slack`
--

-- --------------------------------------------------------

--
-- Table structure for table `command_whattoeat_list`
--

CREATE TABLE IF NOT EXISTS `command_whattoeat_list` (
  `id` int(10) unsigned NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `timestamp` bigint(20) unsigned NOT NULL,
  `token` text COLLATE utf8_unicode_ci,
  `team_id` text COLLATE utf8_unicode_ci,
  `channel_id` text COLLATE utf8_unicode_ci,
  `channel_name` text COLLATE utf8_unicode_ci,
  `user_id` text COLLATE utf8_unicode_ci,
  `user_name` text COLLATE utf8_unicode_ci,
  `command` text COLLATE utf8_unicode_ci,
  `text` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
