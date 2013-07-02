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
-- Структура на таблица `likings`
--

CREATE TABLE IF NOT EXISTS `likings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `popularity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Ссхема на данните от таблица `likings`
--

INSERT INTO `likings` (`id`, `user_id`, `cat_id`, `type`, `popularity`) VALUES
(1, 1, 1, 1, 1),
(3, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Структура на таблица `suggested_feeds`
--

CREATE TABLE IF NOT EXISTS `suggested_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Ссхема на данните от таблица `suggested_feeds`
--

INSERT INTO `suggested_feeds` (`id`, `cat_id`, `url`) VALUES
(1, 1, '123456778');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Ссхема на данните от таблица `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `key`, `login_key`, `api_key`) VALUES
(1, 'fix288@gmail.com', '78c63340a81fade0dc8b0e2bd0bb832ade11372bcb7824117dd7363a7e9426f0', 'f7e9543ea86860d2a6658ce1cf4023a03ea2e32361ac74630b5f4290c7710c91', '848ec139d053cd00c4e77bdd00d3ee2f87ed65eb4fc84f1d8b9ea4750eaefa10', 'cbd2da55639d6cfc79b01fca4d88fe5aa38db3401a669a255dd086003ec2f215'),
(2, 'test@test.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', ''),
(3, 'dhd28@abv.bg', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', ''),
(4, 'georgi98bg@abv.bg', '9d235ad5b0d6d4481e39c15fff8b60a9bfba136ac9693ce898c28cf908d7b12b', '', '', ''),
(5, 'avbincco@gmail.com', 'da6aae1325ee806d57fb24a6758b5734dde7e31c661c4084d784f44a60b38386', '', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
