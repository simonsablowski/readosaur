-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Erstellungszeit: 20. November 2011 um 01:48
-- Server Version: 5.5.8
-- PHP-Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `stickrss`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `channel`
--

CREATE TABLE IF NOT EXISTS `channel` (
  `key` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `shortTitle` varchar(100) NOT NULL,
  `iconUrl` varchar(255) NOT NULL,
  `status` enum('active','deleted') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`key`),
  UNIQUE KEY `url` (`url`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `channel`
--

INSERT INTO `channel` (`key`, `url`, `shortTitle`, `iconUrl`, `status`, `created`, `modified`) VALUES
('cnn-world', 'http://rss.cnn.com/rss/edition_world.rss', 'CNN World', 'http://edition.cnn.com/favicon.ico', 'active', '2011-11-20 00:45:47', '0000-00-00 00:00:00'),
('google-news', 'http://news.google.com/news?ned=us&topic=h&output=rss', 'Google News', 'http://www.google.com/favicon.ico', 'active', '2011-11-20 00:26:25', '0000-00-00 00:00:00'),
('marriedtothesea', 'http://www.marriedtothesea.com/rss/rss.php', 'Married To The Sea', 'http://marriedtothesea.com/favicon.ico', 'active', '2011-11-20 01:04:50', '0000-00-00 00:00:00');
