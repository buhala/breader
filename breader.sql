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
-- Структура на таблица `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `url` text NOT NULL,
  `result` longtext NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Структура на таблица `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `related_to` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Ссхема на данните от таблица `categories`
--

INSERT INTO `categories` (`id`, `name`, `related_to`) VALUES
(1, 'World news', '2,3'),
(2, 'Europe', '1,3'),
(3, 'America', '1,3'),
(4, 'Technology', '10,8'),
(5, 'Entertainment', '6,7'),
(6, 'Sport', '5,7'),
(7, 'Football', '5,6'),
(8, 'Business', '9,10,4'),
(9, 'Politics', '10,8'),
(10, 'Enviroment', '9');

-- --------------------------------------------------------

--
-- Структура на таблица `clicks`
--

CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Ссхема на данните от таблица `clicks`
--

INSERT INTO `clicks` (`id`, `user_id`, `url`, `time`) VALUES
(1, 1, 'http://www.thetimes.co.uk/tto/news/world/asia/article3804094.ece', 1372862450),
(2, 1, 'http://rss.cnn.com/~r/rss/edition_europe/~3/As1SEZjDhuU/art-of-movement-big-wave-maya-gabeira.cnn.html', 1372862861),
(3, 1, 'http://www.bbc.co.uk/news/world-latin-america-23141056#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372869451),
(4, 1, 'http://feeds.reuters.com/~r/Reuters/worldNews/~3/tia8zCc1llU/story01.htm', 1372869821),
(5, 1, 'http://www.bbc.co.uk/news/business-23143585#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372879103),
(6, 1, 'http://www.bbc.co.uk/news/business-23143585#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372879103),
(7, 1, 'http://www.thetimes.co.uk/tto/news/world/europe/article3805206.ece', 1372881885);

-- --------------------------------------------------------

--
-- Структура на таблица `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Ссхема на данните от таблица `feeds`
--

INSERT INTO `feeds` (`id`, `cat_id`, `link`) VALUES
(1, 1, 'http://rss.cnn.com/rss/edition_world.rss'),
(2, 1, 'http://feeds.bbci.co.uk/news/video_and_audio/world/rss.xml'),
(3, 1, 'http://feeds.reuters.com/Reuters/worldNews?format=xml'),
(4, 1, 'http://www.thetimes.co.uk/tto/news/world/rss'),
(5, 2, 'http://www.thetimes.co.uk/tto/news/world/europe/rss'),
(6, 2, 'http://rss.cnn.com/rss/edition_europe.rss'),
(7, 2, 'http://feeds.bbci.co.uk/news/world/europe/rss.xml	'),
(8, 3, 'http://www.thetimes.co.uk/tto/news/world/americas/rss'),
(9, 3, 'http://rss.cnn.com/rss/edition_americas.rss'),
(10, 3, 'http://feeds.bbci.co.uk/news/world/latin_america/rss.xml'),
(11, 4, 'http://web.mit.edu/newsoffice/rss-feeds.feed?type=rss&cat=topnews'),
(12, 4, 'http://images.apple.com/main/rss/hotnews/hotnews.rss'),
(13, 4, 'http://www.thetimes.co.uk/tto/technology/rss'),
(14, 4, 'http://rss.cnn.com/rss/edition_technology.rss'),
(15, 4, 'http://feeds.feedburner.com/cnet/tcoc?format=xml'),
(16, 4, 'http://feeds.bbci.co.uk/news/video_and_audio/technology/rss.xml'),
(17, 4, 'http://feeds.reuters.com/reuters/technologyNews?format=xml'),
(18, 5, 'http://feeds.feedburner.com/thr/news'),
(19, 5, 'http://rss.cnn.com/rss/edition_entertainment.rss'),
(20, 5, 'http://feeds.reuters.com/reuters/entertainment?format=xml'),
(21, 6, 'http://www.thetimes.co.uk/tto/sport/rss'),
(22, 6, 'http://rss.cnn.com/rss/edition_sport.rss'),
(23, 6, 'http://feeds.reuters.com/reuters/sportsNews?format=xml'),
(24, 7, 'http://www.thetimes.co.uk/tto/sport/football/rss'),
(25, 7, 'http://rss.cnn.com/rss/edition_football.rss'),
(26, 8, 'http://www.thetimes.co.uk/tto/business/rss'),
(27, 8, 'http://rss.cnn.com/rss/edition_business360.rss'),
(28, 8, 'http://feeds.bbci.co.uk/news/business/rss.xml'),
(29, 8, 'http://feeds.reuters.com/reuters/businessNews?format=xml'),
(30, 9, 'http://www.thetimes.co.uk/tto/news/politics/rss'),
(31, 9, 'http://feeds.bbci.co.uk/news/politics/rss.xml'),
(32, 9, 'http://feeds.reuters.com/Reuters/PoliticsNews?format=xml'),
(33, 10, 'http://www.motherearthnews.com/rss/blogs/ask_our_experts.aspx'),
(34, 10, 'http://feeds.reuters.com/reuters/environment?format=xml'),
(35, 10, 'http://www.thetimes.co.uk/tto/environment/rss');

-- --------------------------------------------------------

--
-- Структура на таблица `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Ссхема на данните от таблица `help`
--

INSERT INTO `help` (`id`, `topic`, `content`) VALUES
(1, 'What is bReader?', 'bReader is an advanced news source. Imagine a newspaper tailored to <b>you</b>. bReader is the same thing-but free! \n\nYou can choose news, get recommendations. The more you read your news, the more you get from them. You also get related news! Why not try it? Who knows, you may use it to <b>get informed better</b>!');

-- --------------------------------------------------------

--
-- Структура на таблица `likings`
--

CREATE TABLE IF NOT EXISTS `likings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `popularity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Ссхема на данните от таблица `likings`
--

INSERT INTO `likings` (`id`, `user_id`, `cat_id`, `type`, `popularity`) VALUES
(5, 3, 4, 1, 0),
(17, 1, 1, 1, 0),
(18, 1, 2, 1, 0),
(19, 1, 3, 1, 0),
(20, 1, 4, 1, 0),
(21, 1, 5, 1, 0),
(22, 1, 6, 1, 0),
(23, 1, 7, 1, 0),
(24, 1, 8, 1, 0),
(25, 1, 9, 1, 0),
(26, 1, 10, 1, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Ссхема на данните от таблица `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `cats`) VALUES
(1, 1, 'Test', '1,5,3,2'),
(2, 1, 'Test1', '7,1,5,3,2'),
(3, 1, 'TOASTER', '1,2,3,4,5');

-- --------------------------------------------------------

--
-- Структура на таблица `suggested_feeds`
--

CREATE TABLE IF NOT EXISTS `suggested_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура на таблица `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `key` text NOT NULL,
  `login_key` text NOT NULL,
  `api_key` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Ссхема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `key`, `login_key`, `api_key`) VALUES
(1, 'fix288@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', ''),
(2, 'avincco@gmail.com', '61525198d92b31754800e9509d83f0dd3fc792a7b411cffa8217de231199580d', '', '', ''),
(3, 'avbincco@gmail.com', '61525198d92b31754800e9509d83f0dd3fc792a7b411cffa8217de231199580d', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
