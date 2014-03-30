-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 30, 2014 at 09:33 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `breader`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE IF NOT EXISTS `cache` (
  `url` text NOT NULL,
  `result` longtext NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `related_to` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `related_to`) VALUES
(1, 'World news', '2,3,5'),
(2, 'Europe', '1,3'),
(3, 'America', '1,3'),
(4, 'Technology', '10,8'),
(5, 'Entertainment', '6,7'),
(6, 'Sport', '5,7'),
(7, 'Football', '5,6'),
(8, 'Business', '9,10,4'),
(9, 'Politics', '10,8'),
(10, 'Enviroment', '9'),
(11, 'Customized news', ''),
(12, 'gdxg', '123123'),
(13, 'gdxg', '123123');

-- --------------------------------------------------------

--
-- Table structure for table `clicks`
--

CREATE TABLE IF NOT EXISTS `clicks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `url` text NOT NULL,
  `time` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `clicks`
--

INSERT INTO `clicks` (`id`, `user_id`, `url`, `time`) VALUES
(1, 1, 'http://www.thetimes.co.uk/tto/news/world/asia/article3804094.ece', 1372862450),
(2, 1, 'http://rss.cnn.com/~r/rss/edition_europe/~3/As1SEZjDhuU/art-of-movement-big-wave-maya-gabeira.cnn.html', 1372862861),
(3, 1, 'http://www.bbc.co.uk/news/world-latin-america-23141056#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372869451),
(4, 1, 'http://feeds.reuters.com/~r/Reuters/worldNews/~3/tia8zCc1llU/story01.htm', 1372869821),
(5, 1, 'http://www.bbc.co.uk/news/business-23143585#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372879103),
(6, 1, 'http://www.bbc.co.uk/news/business-23143585#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 1372879103),
(7, 1, 'http://www.thetimes.co.uk/tto/news/world/europe/article3805206.ece', 1372881885),
(8, 9, 'http://www.thetimes.co.uk/tto/news/world/asia/article3814874.ece', 1374236751),
(9, 13, 'http://rss.cnn.com/~r/rss/edition_entertainment/~3/ipzP_ZY7NhY/index.html', 1395756893),
(10, 13, 'http://feeds.reuters.com/~r/reuters/entertainment/~3/yobFinf5RV4/story01.htm', 1395758552);

-- --------------------------------------------------------

--
-- Table structure for table `feeds`
--

CREATE TABLE IF NOT EXISTS `feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `link` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `feeds`
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
(36, 10, 'http://www.thetimes.co.uk/tto/environment/rss'),
(38, 1, 'http://localhost/breader/public/stories');

-- --------------------------------------------------------

--
-- Table structure for table `help`
--

CREATE TABLE IF NOT EXISTS `help` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic` text NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `help`
--

INSERT INTO `help` (`id`, `topic`, `content`) VALUES
(1, 'What is bReader?', 'bReader is an advanced news source. Imagine a newspaper tailored to <b>you</b>. bReader is the same thing-but free! \n\nYou can choose news, get recommendations. The more you read your news, the more you get from them. You also get related news! Why not try it? Who knows, you may use it to <b>get informed better</b>!'),
(2, 'What are bReader''s sources?', 'bReader uses a variety of sources. Currently, there are 35 RSS feeds used for the content, from about 5 reliable content providers. You can review the list of feeds <a href="http://buhala.uchenici.bg/sources.txt"><u>here</u></a>\n'),
(3, 'I am interested in working for bReader. How can I get in touch?', 'Currently, bReader is an open source project. It''s based in PHP, in the bFrame framework. You can review the open source part of the project <a href="http://github.com/buhala/breader"><u>here</u></a>. Keep in mind that you can use the code under the terms of both GNUv2 and the MIT license. If you are interested in obtaining a license outside these two, contact us using the contact form!'),
(4, 'Is there a bReader API?', 'Yes, we have one. Unfortunately, it''s not documented very well. (if at all). However, since we are open-source, you can review the API code and make your application based on that. Use <a href="http://github.com/buhala/breader"><u>this link</u></a> to see the source. Most of the API is in these two files<br>\r\n/project/controllers/api.php<br>\r\n/project/models/api_model.php<br>\r\nIf you create an application, you can contact us using the contact form, and we will publish it on the site!'),
(5, 'The news are inaccurate/are old!', 'Currently, the system uses a two-hour cache on feeds. While this isn''t usually a problem, you can get some old news for that seemingly short period of time. We advice you to contact support so they can wipe the cache. '),
(6, 'The sites are gone/are paid!!1', 'We are not responsible about the content of the other sites. Feel free to contact them about this issue.'),
(7, 'My feed is here, I want it removed!', 'We currently use feeds only with permission from the license, however if you want the feed removed, we''ll gladly do it for you! Email us using the contact form!'),
(8, 'I have a suggestion! It''s really cool!', 'Okay, slow down!<br>\r\nAre you a programmer? Feel free to contribute to the project at <a href="http://github.com/buhala/breader"><u>github</u></a>. We will review your feature and add it (if it''s cool)\r\n<br>\r\nAre you not a programmer? We cannot guarantee we will like the feature(and implement it) but it''s worth a shot! Contact us using the support form!'),
(9, 'I am offended by the news!', 'We are not responsible for the content of the news. We found that you might be interested in this type of stories, so we displayed them.'),
(10, 'I want only the day/night design!', 'Unfortunately, this feature has not been implemented yet.<br>\r\nHowever the only thing that the night design depends is loading a CSS file ;)<br>\r\nIf you so desire, install a browser addon that allows you to unload the file<br>\r\nOr you could keep your time between 9PM-5AM for the night design and any other time for the day design :)');

-- --------------------------------------------------------

--
-- Table structure for table `likings`
--

CREATE TABLE IF NOT EXISTS `likings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `type` int(1) NOT NULL,
  `popularity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=56 ;

--
-- Dumping data for table `likings`
--

INSERT INTO `likings` (`id`, `user_id`, `cat_id`, `type`, `popularity`) VALUES
(28, 3, 4, 1, 0),
(29, 3, 6, 1, 0),
(30, 1, 1, 1, 0),
(31, 1, 2, 1, 0),
(32, 1, 3, 1, 0),
(33, 1, 4, 1, 0),
(34, 1, 5, 1, 0),
(35, 1, 6, 1, 0),
(36, 1, 8, 1, 0),
(37, 1, 9, 1, 0),
(38, 1, 10, 1, 0),
(39, 7, 1, 1, 0),
(40, 6, 1, 1, 0),
(41, 8, 1, 1, 0),
(42, 8, 2, 1, 0),
(44, 9, 2, 0, 0),
(45, 9, 2, 0, 0),
(48, 9, 1, 1, 1),
(49, 13, 5, 1, 2),
(50, 13, 8, 1, 0),
(54, 14, 5, 1, 0),
(55, 14, 7, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `cats` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `name`, `cats`) VALUES
(1, 1, 'test', '1,2,3,4,5,6,7,8,9,10'),
(2, 1, 'All the info', '1,2,3,4,5,6,7,8,9,10'),
(3, 3, 'My cool things :D', '4'),
(4, 1, 'A', '1,2,3,4,5,6,7,8,9,10'),
(5, 3, 'Heey!', '4');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(767) NOT NULL,
  `rating` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `url`, `rating`, `count`) VALUES
(1, 'google.com', 10, 2),
(3, 'http%3A%2F%2Ffeeds.reuters.com%2F%7Er%2FReuters%2FworldNews%2F%7E3%2Fs053u0HD4sc%2Fstory01.htm', 5, 1),
(4, 'http://local.breader.eu/link/visit/1?url=http://www.bbc.co.uk/news/world-us-canada-23282379#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 21, 1),
(5, 'http://local.breader.eu/link/visit/1?url=http://www.bbc.co.uk/news/science-environment-23324177#sa-ns_mchannel=rss&ns_source=PublicRSS20-sa', 11, 1),
(6, 'http://local.breader.eu/link/visit/1?url=http://www.thetimes.co.uk/tto/law/article3814980.ece', 4, 1),
(7, 'http://192.168.1.11/breader/public/link/visit/8?url=http://rss.cnn.com/~r/rss/edition_business360/~3/GUSd88JfbTw/', 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `suggested_feeds`
--

CREATE TABLE IF NOT EXISTS `suggested_feeds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cat_id` int(11) NOT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `key` text NOT NULL,
  `login_key` text NOT NULL,
  `api_key` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `register_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `register_ip` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `key`, `login_key`, `api_key`, `type`, `register_time`, `login_time`, `register_ip`) VALUES
(1, 'me@buhala.uchenici.bg', '78c63340a81fade0dc8b0e2bd0bb832ade11372bcb7824117dd7363a7e9426f0', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 'avincco@gmail.com', '61525198d92b31754800e9509d83f0dd3fc792a7b411cffa8217de231199580d', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(3, 'avbincco@gmail.com', '61525198d92b31754800e9509d83f0dd3fc792a7b411cffa8217de231199580d', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(4, 'kyran_rana2@sss.com', 'cb67110a762e2ead45d3c5b6a46284c73d13bdf6dfbcdd831dc6b0f6ff1820dd', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(5, 'test@test.com', '907f1e17d9e896c5e9d2d8debadae6948d805e88976e909c9ad723069c0c4f03', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(6, 'fix288@gmail.com', '9ac04fe5b95c784f560001460f7a34b3e690bf56d2c14e0113489969006e8424', '61b55b2a9ec9a6417938b22fef8b4bf862bf9a61511f2fbf422c8310206f5048', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(7, 'organizatora_@abv.bg', 'socialAccount', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(8, '', 'socialAccount', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(9, 'iamcool@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(10, 'iamcool1@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(11, 'iamcool21@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(12, 'fix2188@gmail.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(13, 'me@hdimitrov.eu', '907f1e17d9e896c5e9d2d8debadae6948d805e88976e909c9ad723069c0c4f03', '', '', '', 1, '0000-00-00 00:00:00', '2014-03-30 07:29:53', ''),
(14, 'me@ygeorgiev.com', 'da6aae1325ee806d57fb24a6758b5734dde7e31c661c4084d784f44a60b38386', '', '', '', 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(15, 'test1@test.com', '7a804543393ebe525a02b1cf815532a904538a29bcff4ab17f72f1086ed3ddfc', '', '', '', 0, '2014-03-30 07:32:25', '0000-00-00 00:00:00', '192.168.1.11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
