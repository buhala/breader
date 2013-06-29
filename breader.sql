-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Време на генериране: 
-- Версия на сървъра: 5.5.27
-- Версия на PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- БД: `breader`
--

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Ссхема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'World news'),
(2, 'Europe'),
(3, 'America'),
(4, 'Technology'),
(5, 'Entertainment'),
(6, 'Sport'),
(7, 'Football'),
(8, 'Business'),
(9, 'Politics'),
(10, 'Enviroment');

-- --------------------------------------------------------

--
-- Структура на таблица `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Ссхема на данните от таблица `feeds`
--

INSERT INTO `feeds` (`id`, `cat_id`, `link`) VALUES
(5, 1, 'http://rss.cnn.com/rss/edition_world.rss\n'),
(6, 1, 'http://feeds.bbci.co.uk/news/video_and_audio/world/rss.xml\n'),
(7, 1, 'http://feeds.reuters.com/Reuters/worldNews?format=xml\n'),
(8, 1, 'http://www.thetimes.co.uk/tto/news/world/rss\n'),
(9, 2, 'http://www.thetimes.co.uk/tto/news/world/europe/rss\n'),
(10, 2, 'http://rss.cnn.com/rss/edition_europe.rss\n'),
(11, 2, 'http://feeds.bbci.co.uk/news/world/europe/rss.xml	\n'),
(12, 3, 'http://www.thetimes.co.uk/tto/news/world/americas/rss\n'),
(13, 3, 'http://rss.cnn.com/rss/edition_americas.rss\n'),
(14, 3, 'http://feeds.bbci.co.uk/news/world/latin_america/rss.xml\n'),
(15, 4, 'http://web.mit.edu/newsoffice/rss-feeds.feed?type=rss&cat=topnews\n'),
(16, 4, 'http://images.apple.com/main/rss/hotnews/hotnews.rss\n'),
(17, 4, 'http://www.thetimes.co.uk/tto/technology/rss\n'),
(18, 4, 'http://rss.cnn.com/rss/edition_technology.rss\n'),
(19, 4, 'http://feeds.feedburner.com/cnet/tcoc?format=xml\n'),
(20, 4, 'http://feeds.bbci.co.uk/news/video_and_audio/technology/rss.xml\n'),
(21, 4, 'http://feeds.reuters.com/reuters/technologyNews?format=xml\n'),
(22, 5, 'http://feeds.feedburner.com/thr/news\n'),
(23, 5, 'http://rss.cnn.com/rss/edition_entertainment.rss\n'),
(24, 5, 'http://feeds.reuters.com/reuters/entertainment?format=xml\n'),
(25, 6, 'http://www.thetimes.co.uk/tto/sport/rss\n'),
(26, 6, 'http://rss.cnn.com/rss/edition_sport.rss\n'),
(27, 6, 'http://feeds.reuters.com/reuters/sportsNews?format=xml\n'),
(28, 7, 'http://www.thetimes.co.uk/tto/sport/football/rss\n'),
(29, 7, 'http://rss.cnn.com/rss/edition_football.rss\n'),
(30, 8, 'http://www.thetimes.co.uk/tto/business/rss\n'),
(31, 8, 'http://rss.cnn.com/rss/edition_business360.rss\n'),
(32, 8, 'http://feeds.bbci.co.uk/news/business/rss.xml\n'),
(33, 8, 'http://feeds.reuters.com/reuters/businessNews?format=xml\n'),
(34, 9, 'http://www.thetimes.co.uk/tto/news/politics/rss\n'),
(35, 9, 'http://feeds.bbci.co.uk/news/politics/rss.xml\n'),
(36, 9, 'http://feeds.reuters.com/Reuters/PoliticsNews?format=xml\n'),
(37, 10, 'http://www.motherearthnews.com/rss/blogs/ask_our_experts.aspx\n'),
(38, 10, 'http://feeds.reuters.com/reuters/environment?format=xml\n'),
(39, 1, 'http://rss.cnn.com/rss/edition_world.rss\n'),
(40, 10, 'http://www.thetimes.co.uk/tto/environment/rss'),
(41, 1, 'http://feeds.bbci.co.uk/news/video_and_audio/world/rss.xml\n'),
(42, 1, 'http://feeds.reuters.com/Reuters/worldNews?format=xml\n'),
(43, 1, 'http://www.thetimes.co.uk/tto/news/world/rss\n'),
(44, 2, 'http://www.thetimes.co.uk/tto/news/world/europe/rss\n'),
(45, 2, 'http://rss.cnn.com/rss/edition_europe.rss\n'),
(46, 2, 'http://feeds.bbci.co.uk/news/world/europe/rss.xml	\n'),
(47, 3, 'http://www.thetimes.co.uk/tto/news/world/americas/rss\n'),
(48, 3, 'http://rss.cnn.com/rss/edition_americas.rss\n'),
(49, 3, 'http://feeds.bbci.co.uk/news/world/latin_america/rss.xml\n'),
(50, 4, 'http://web.mit.edu/newsoffice/rss-feeds.feed?type=rss&cat=topnews\n'),
(51, 4, 'http://images.apple.com/main/rss/hotnews/hotnews.rss\n'),
(52, 4, 'http://www.thetimes.co.uk/tto/technology/rss\n'),
(53, 4, 'http://rss.cnn.com/rss/edition_technology.rss\n'),
(54, 4, 'http://feeds.feedburner.com/cnet/tcoc?format=xml\n'),
(55, 4, 'http://feeds.bbci.co.uk/news/video_and_audio/technology/rss.xml\n'),
(56, 4, 'http://feeds.reuters.com/reuters/technologyNews?format=xml\n'),
(57, 5, 'http://feeds.feedburner.com/thr/news\n'),
(58, 5, 'http://rss.cnn.com/rss/edition_entertainment.rss\n'),
(59, 5, 'http://feeds.reuters.com/reuters/entertainment?format=xml\n'),
(60, 6, 'http://www.thetimes.co.uk/tto/sport/rss\n'),
(61, 6, 'http://rss.cnn.com/rss/edition_sport.rss\n'),
(62, 6, 'http://feeds.reuters.com/reuters/sportsNews?format=xml\n'),
(63, 7, 'http://www.thetimes.co.uk/tto/sport/football/rss\n'),
(64, 7, 'http://rss.cnn.com/rss/edition_football.rss\n'),
(65, 8, 'http://www.thetimes.co.uk/tto/business/rss\n'),
(66, 8, 'http://rss.cnn.com/rss/edition_business360.rss\n'),
(67, 8, 'http://feeds.bbci.co.uk/news/business/rss.xml\n'),
(68, 8, 'http://feeds.reuters.com/reuters/businessNews?format=xml\n'),
(69, 9, 'http://www.thetimes.co.uk/tto/news/politics/rss\n'),
(70, 9, 'http://feeds.bbci.co.uk/news/politics/rss.xml\n'),
(71, 9, 'http://feeds.reuters.com/Reuters/PoliticsNews?format=xml\n'),
(72, 10, 'http://www.motherearthnews.com/rss/blogs/ask_our_experts.aspx\n'),
(73, 10, 'http://feeds.reuters.com/reuters/environment?format=xml\n'),
(74, 10, 'http://www.thetimes.co.uk/tto/environment/rss');

-- --------------------------------------------------------

--
-- Структура на таблица `likings`
--

CREATE TABLE IF NOT EXISTS `likings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Ссхема на данните от таблица `likings`
--

INSERT INTO `likings` (`id`, `user_id`, `cat_id`, `type`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 1),
(3, 2, 1, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Ссхема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'fix288@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
