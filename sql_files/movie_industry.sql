-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 05, 2022 at 04:58 PM
-- Server version: 8.0.27
-- PHP Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_industry`
--

-- --------------------------------------------------------

--
-- Table structure for table `actors`
--

DROP TABLE IF EXISTS `actors`;
CREATE TABLE IF NOT EXISTS `actors` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `nickname` varchar(32) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('M','F') DEFAULT NULL,
  `agent_code` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_code` (`agent_code`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actors`
--

INSERT INTO `actors` (`id`, `firstname`, `lastname`, `nickname`, `dob`, `gender`, `agent_code`) VALUES
(1, 'Bruce', 'Willis', 'Bruno', '1955-03-19', 'M', 101),
(2, 'Mel', 'Gibson', 'Mad Mel', '1956-01-03', 'M', 102),
(3, 'Doris', 'Day', 'The Professional Virgin', '1968-05-03', 'F', 103),
(4, 'Charlie', 'Chaplin', 'The Little Tramp', '1901-03-19', 'M', 104),
(5, 'David', 'Arquete', 'Mr. Generous', '1970-07-15', 'M', 104),
(6, 'Arnold', 'Schwarzenegger', 'The Governator', '1960-11-20', 'M', 105),
(7, 'Dwayne', 'Johnson', 'The Rock', '1965-05-25', 'M', 105),
(8, 'Sylvester', 'Stallone', 'Sly', '1955-03-19', 'M', 107),
(9, 'Tom', 'Holland', 'Spider', '1990-03-20', 'M', 108),
(10, 'Zac', 'Efron', 'Eye', '1986-06-14', 'M', 109),
(11, 'Chris', 'Evans', 'Bird', '1982-02-10', 'M', 110),
(12, 'Isabel', 'May', 'Flower', '1988-10-28', 'F', 105),
(13, 'Veronica', 'Hudson', 'Cute Girl', '1972-09-19', 'F', 104),
(14, 'Sophie', 'Nelson', 'Wonder Woman', '1992-06-12', 'F', 101);

-- --------------------------------------------------------

--
-- Table structure for table `actor_movie`
--

DROP TABLE IF EXISTS `actor_movie`;
CREATE TABLE IF NOT EXISTS `actor_movie` (
  `id` mediumint UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` smallint UNSIGNED NOT NULL,
  `actor_id` smallint UNSIGNED NOT NULL,
  `role_id` tinyint UNSIGNED NOT NULL,
  `paid` bigint UNSIGNED DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `actor_id` (`actor_id`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `actor_movie`
--

INSERT INTO `actor_movie` (`id`, `movie_id`, `actor_id`, `role_id`, `paid`) VALUES
(1, 1, 9, 1, 200000),
(2, 1, 8, 3, 40000),
(3, 2, 9, 1, 250000),
(4, 2, 7, 3, 50000),
(5, 3, 1, 1, 160000),
(6, 3, 2, 2, 70000),
(7, 3, 5, 3, 30000),
(8, 4, 14, 1, 300000),
(9, 4, 13, 2, 150000),
(10, 5, 10, 1, 410000),
(11, 5, 11, 2, 260000),
(12, 5, 6, 3, 50000),
(13, 6, 2, 1, 200000),
(14, 6, 4, 2, 100000),
(15, 7, 7, 1, 350000),
(16, 7, 6, 4, 90000),
(17, 8, 8, 1, 250000),
(18, 8, 12, 5, 15000),
(19, 9, 4, 1, 450000),
(20, 9, 3, 4, 35000),
(21, 10, 9, 1, 500000),
(22, 10, 2, 2, 300000);

-- --------------------------------------------------------

--
-- Table structure for table `agents`
--

DROP TABLE IF EXISTS `agents`;
CREATE TABLE IF NOT EXISTS `agents` (
  `agent_code` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  PRIMARY KEY (`agent_code`)
) ENGINE=MyISAM AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `agents`
--

INSERT INTO `agents` (`agent_code`, `firstname`, `lastname`) VALUES
(101, 'Cindy', 'Osbrink'),
(102, 'Theresa', 'Peters'),
(103, 'Jeremy', 'Zimmer'),
(104, 'Fred', 'Specktor'),
(105, 'Rick', 'Nicita'),
(106, 'Sam', 'Gores'),
(107, 'Sharon', 'Jackson'),
(108, 'Jim', 'Wiatt'),
(109, 'Tracey', 'Jacobs'),
(110, 'Richard', 'Lovett');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `city` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `city`) VALUES
(1, 'New York'),
(2, 'Los Angeles'),
(3, 'Vienna'),
(4, 'Graz'),
(5, 'Munich'),
(6, 'Berlin'),
(7, 'Toronto'),
(8, 'Montreal'),
(9, 'London'),
(10, 'Liverpool');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `country`) VALUES
(1, 'USA'),
(2, 'Canada'),
(3, 'UK'),
(4, 'Germany'),
(5, 'Austria');

-- --------------------------------------------------------

--
-- Table structure for table `critics`
--

DROP TABLE IF EXISTS `critics`;
CREATE TABLE IF NOT EXISTS `critics` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `critics`
--

INSERT INTO `critics` (`id`, `firstname`, `lastname`, `username`, `password`) VALUES
(1, 'John', 'Lawrence', 'lawjohn', '2394a9661a9089208c1c9c65ccac85a91da6a859'),
(2, 'Martin', 'Hudson', 'martinh', '2394a9661a9089208c1c9c65ccac85a91da6a859'),
(3, 'Amanda', 'Gudson', 'gudson.amanda', '2394a9661a9089208c1c9c65ccac85a91da6a859'),
(4, 'Kristopher', 'Bulman', 'bulman.k80', '2394a9661a9089208c1c9c65ccac85a91da6a859'),
(5, 'Serena', 'Colmen', 'colmen_serena', '2394a9661a9089208c1c9c65ccac85a91da6a859');

-- --------------------------------------------------------

--
-- Table structure for table `critic_actor_movie`
--

DROP TABLE IF EXISTS `critic_actor_movie`;
CREATE TABLE IF NOT EXISTS `critic_actor_movie` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `critic_id` int UNSIGNED NOT NULL,
  `actor_id` smallint UNSIGNED NOT NULL,
  `movie_id` smallint UNSIGNED NOT NULL,
  `critique_text` varchar(512) NOT NULL,
  `devotion` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  `naturalness` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  `expression` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  `acting` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `critic_id` (`critic_id`),
  KEY `actor_id` (`actor_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `critic_actor_movie`
--

INSERT INTO `critic_actor_movie` (`id`, `critic_id`, `actor_id`, `movie_id`, `critique_text`, `devotion`, `naturalness`, `expression`, `acting`) VALUES
(1, 4, 9, 1, 'This actor ends his trilogy in glory, making one of the best non-human characters ever.', '7', '6', '9', '8'),
(2, 3, 9, 2, 'This is a prequel to Batman v. Superman: The Dawn of Justice, and explores the origin of the most.', '4', '7', '7', '9'),
(3, 2, 14, 4, 'The story follows three different timelines; one happening a week before the big event, one happening a day.', '6', '6', '8', '8'),
(4, 5, 5, 3, 'Oh, this man makes one final appearance as he says goodbye to him.', '9', '9', '7', '7'),
(5, 4, 1, 3, 'I expected it to be good, yet it surpassed all of my expectations.', '8', '8', '8', '9'),
(6, 2, 2, 3, 'How to make a sequel to an already practically perfect film and up the game.', '5', '6', '9', '7'),
(7, 1, 12, 8, 'Obviously, we still follow God\'s path into becoming the person she needs to be.', '4', '4', '10', '10');

-- --------------------------------------------------------

--
-- Table structure for table `critic_movie`
--

DROP TABLE IF EXISTS `critic_movie`;
CREATE TABLE IF NOT EXISTS `critic_movie` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `critic_id` int UNSIGNED NOT NULL,
  `movie_id` smallint UNSIGNED NOT NULL,
  `critique_text` varchar(512) NOT NULL,
  `movie_rate` enum('1','2','3','4','5','6','7','8','9','10') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `critic_id` (`critic_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `critic_movie`
--

INSERT INTO `critic_movie` (`id`, `critic_id`, `movie_id`, `critique_text`, `movie_rate`) VALUES
(1, 1, 1, 'Harrowing, unpredictable, painful, confrontational, this is a movie for grown-ups.', '7'),
(2, 3, 4, 'Paul Thomas Anderson’s golden, shimmering vision of the 1970s San Fernando Valley in “Licorice Pizza” is so dreamy, so full of possibility, it’s as if it couldn’t actually have existed.', '9'),
(3, 4, 6, 'If “Don’t Look Up” deserves any award, it’s for the work of its casting director, Francine Maisler.', '8'),
(4, 2, 7, 'This Netflix movie is packed with so many big, expensive names, and it often puts them all in the same room.', '5'),
(5, 5, 9, 'The title of the film is “A Journal for Jordan,” but like the book it is based on, the movie is really two journals, kept by both parents of a baby whose father would meet him only once before he was killed in Iraq.', '8');

-- --------------------------------------------------------

--
-- Table structure for table `directors`
--

DROP TABLE IF EXISTS `directors`;
CREATE TABLE IF NOT EXISTS `directors` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `firstname` varchar(32) NOT NULL,
  `lastname` varchar(32) NOT NULL,
  `mostly_genre_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `mostly_genre_id` (`mostly_genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `directors`
--

INSERT INTO `directors` (`id`, `firstname`, `lastname`, `mostly_genre_id`) VALUES
(1, 'David', 'Lynch', 1),
(2, 'Stanley', 'Kubrick', 2),
(3, 'Robert', 'Bresson ', 4),
(4, 'Alfred', 'Hitchcock', 3),
(5, 'Martin', 'Scorsese', 5),
(6, 'Clint', 'Eastwood', 6),
(7, 'William', 'Wyler', 10),
(8, 'Billy', 'Wilder', 11),
(9, 'John', 'Ford', 12),
(10, 'Fritz', 'Lynch', 7),
(11, 'Fred', 'Zinnemann', 8),
(12, 'Sidney', 'Lumet', 9);

-- --------------------------------------------------------

--
-- Table structure for table `expertise`
--

DROP TABLE IF EXISTS `expertise`;
CREATE TABLE IF NOT EXISTS `expertise` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `expertise` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expertise`
--

INSERT INTO `expertise` (`id`, `expertise`) VALUES
(1, 'Creativity'),
(2, 'Communication'),
(3, 'Leadership and Management'),
(4, 'Education and Training'),
(5, 'Technological'),
(6, 'Working within budgetary constraints'),
(7, 'Adhering to a production schedule'),
(8, 'Identifying set locations'),
(9, 'Assisting in the marketing and promotion of the film'),
(10, 'Attention to detail'),
(11, 'Directing short films'),
(12, 'Industry knowledge');

-- --------------------------------------------------------

--
-- Table structure for table `expertise_director`
--

DROP TABLE IF EXISTS `expertise_director`;
CREATE TABLE IF NOT EXISTS `expertise_director` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `director_id` smallint UNSIGNED NOT NULL,
  `expertise_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `expertise_id` (`expertise_id`),
  KEY `director_id` (`director_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `expertise_director`
--

INSERT INTO `expertise_director` (`id`, `director_id`, `expertise_id`) VALUES
(1, 1, 3),
(2, 1, 4),
(3, 2, 5),
(4, 2, 6),
(5, 3, 4),
(6, 3, 12),
(7, 4, 11),
(8, 4, 9),
(9, 5, 6),
(10, 5, 7),
(11, 6, 2),
(12, 6, 3),
(13, 7, 3),
(14, 7, 4),
(15, 8, 3),
(16, 8, 1),
(17, 9, 11),
(18, 9, 10),
(19, 10, 8),
(20, 10, 7),
(21, 11, 6),
(22, 11, 5),
(23, 12, 4),
(24, 12, 3);

-- --------------------------------------------------------

--
-- Table structure for table `films`
--

DROP TABLE IF EXISTS `films`;
CREATE TABLE IF NOT EXISTS `films` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` smallint UNSIGNED NOT NULL,
  `sequel_to_movie_id` smallint UNSIGNED DEFAULT '0',
  `format` enum('2d','3d') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `films`
--

INSERT INTO `films` (`id`, `movie_id`, `sequel_to_movie_id`, `format`) VALUES
(1, 1, 0, '3d'),
(2, 2, 1, '3d'),
(3, 3, 0, '2d'),
(4, 4, 0, '2d'),
(5, 5, 0, '3d');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

DROP TABLE IF EXISTS `genres`;
CREATE TABLE IF NOT EXISTS `genres` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `genre` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `genre`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Crime'),
(5, 'Mystery'),
(6, 'Fantasy'),
(7, 'Science Fiction'),
(8, 'Historical'),
(9, 'Horror'),
(10, 'Romance'),
(11, 'Thriller'),
(12, 'Western');

-- --------------------------------------------------------

--
-- Table structure for table `genre_movie`
--

DROP TABLE IF EXISTS `genre_movie`;
CREATE TABLE IF NOT EXISTS `genre_movie` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `movie_id` smallint UNSIGNED NOT NULL,
  `genre_id` tinyint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`),
  KEY `genre_id` (`genre_id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `genre_movie`
--

INSERT INTO `genre_movie` (`id`, `movie_id`, `genre_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 2, 1),
(4, 2, 3),
(5, 2, 4),
(6, 3, 6),
(7, 3, 7),
(8, 4, 10),
(9, 4, 11),
(10, 5, 7),
(11, 5, 6),
(12, 6, 2),
(13, 6, 1),
(14, 6, 5),
(15, 7, 2),
(16, 7, 3),
(17, 8, 12),
(18, 8, 11),
(19, 9, 1),
(20, 9, 2),
(21, 9, 4),
(22, 10, 6),
(23, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
CREATE TABLE IF NOT EXISTS `locations` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `country_id` smallint UNSIGNED NOT NULL,
  `city_id` smallint UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `city_id` (`city_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `country_id`, `city_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 7),
(4, 2, 8),
(5, 3, 9),
(6, 3, 10),
(7, 4, 5),
(8, 4, 6),
(9, 5, 3),
(10, 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;
CREATE TABLE IF NOT EXISTS `movies` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `location_id` smallint UNSIGNED NOT NULL,
  `production_id` smallint UNSIGNED NOT NULL,
  `director_id` smallint UNSIGNED NOT NULL,
  `director_paid` bigint UNSIGNED DEFAULT '0',
  `premiere_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `location_id` (`location_id`),
  KEY `production_id` (`production_id`),
  KEY `director_id` (`director_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `name`, `location_id`, `production_id`, `director_id`, `director_paid`, `premiere_date`) VALUES
(1, 'The Spiderman I', 1, 2, 5, 90000, '2015-01-02'),
(2, 'The Spiderman II', 1, 2, 5, 120000, '2016-07-01'),
(3, 'Home Alone', 2, 1, 4, 80000, '2020-06-03'),
(4, 'The Batman', 2, 3, 3, 150000, '2013-05-05'),
(5, 'Superman', 3, 4, 2, 140000, '2010-02-02'),
(6, 'The Wire', 4, 5, 6, 60000, '2020-05-05'),
(7, 'Breaking Bad', 6, 7, 8, 110000, '2019-07-08'),
(8, 'Game of Thrones', 5, 6, 7, 170000, '2015-01-05'),
(9, 'The 100', 7, 9, 10, 200000, '2012-02-20'),
(10, 'Prison Break', 8, 10, 9, 50000, '2010-10-05');

-- --------------------------------------------------------

--
-- Table structure for table `oscars`
--

DROP TABLE IF EXISTS `oscars`;
CREATE TABLE IF NOT EXISTS `oscars` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `actor_id` smallint UNSIGNED NOT NULL,
  `film_id` smallint UNSIGNED NOT NULL,
  `year` year NOT NULL,
  PRIMARY KEY (`id`),
  KEY `actor_id` (`actor_id`),
  KEY `film_id` (`film_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `oscars`
--

INSERT INTO `oscars` (`id`, `actor_id`, `film_id`, `year`) VALUES
(1, 9, 1, 2015),
(2, 7, 2, 2016),
(3, 1, 3, 2020),
(4, 14, 4, 2013),
(5, 10, 5, 2010);

-- --------------------------------------------------------

--
-- Table structure for table `premieres`
--

DROP TABLE IF EXISTS `premieres`;
CREATE TABLE IF NOT EXISTS `premieres` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `film_id` smallint UNSIGNED NOT NULL,
  `premiere_at` datetime DEFAULT NULL,
  `location_id` smallint UNSIGNED NOT NULL,
  `earned` bigint UNSIGNED DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `film_id` (`film_id`),
  KEY `location_id` (`location_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `premieres`
--

INSERT INTO `premieres` (`id`, `film_id`, `premiere_at`, `location_id`, `earned`) VALUES
(1, 1, '2015-01-02 20:00:00', 1, 850000),
(2, 1, '2015-01-03 20:00:00', 2, 950000),
(3, 1, '2015-01-04 20:30:00', 4, 1250000),
(4, 1, '2015-01-06 20:30:00', 6, 950000),
(5, 1, '2015-01-04 21:30:00', 10, 1000000),
(6, 2, '2016-07-01 21:00:00', 1, 750000),
(7, 2, '2016-07-02 22:00:00', 3, 650000),
(8, 2, '2016-07-03 20:00:00', 5, 500000),
(9, 2, '2016-07-05 20:30:00', 7, 900000),
(10, 2, '2016-07-06 17:00:00', 9, 850000),
(11, 3, '2020-06-03 22:00:00', 2, 1100000),
(12, 3, '2020-06-03 21:00:00', 1, 1200000),
(13, 3, '2020-06-03 20:00:00', 5, 950000),
(14, 3, '2020-06-04 20:00:00', 3, 700000),
(15, 4, '2013-05-05 19:00:00', 5, 960000),
(16, 4, '2013-05-05 18:00:00', 1, 1250000),
(17, 4, '2013-05-05 18:30:00', 2, 890000),
(18, 4, '2013-05-05 21:00:00', 3, 990000),
(19, 4, '2013-05-06 20:00:00', 6, 600000),
(20, 5, '2010-02-02 17:00:00', 1, 800000),
(21, 5, '2010-02-02 17:00:00', 6, 650000),
(22, 5, '2010-02-02 17:00:00', 5, 770000),
(23, 5, '2010-02-02 17:00:00', 9, 655000),
(24, 5, '2010-02-03 17:30:00', 8, 880000);

-- --------------------------------------------------------

--
-- Table structure for table `productions`
--

DROP TABLE IF EXISTS `productions`;
CREATE TABLE IF NOT EXISTS `productions` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `productions`
--

INSERT INTO `productions` (`id`, `name`) VALUES
(1, 'Warner Bros'),
(2, 'Sony Pictures Motion Picture Group'),
(3, 'Walt Disney Studios'),
(4, 'Universal Pictures'),
(5, '20th Century Fox'),
(6, 'Paramount Pictures'),
(7, 'Lionsgate Films'),
(8, 'The Weinstein Company'),
(9, 'Metro-Goldwyn-Mayer Studios'),
(10, 'DreamWorks Pictures');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` tinyint UNSIGNED NOT NULL AUTO_INCREMENT,
  `role` varchar(64) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`) VALUES
(1, 'Lead'),
(2, 'Support'),
(3, 'Cameo'),
(4, 'Series Regular'),
(5, 'Co-Star');

-- --------------------------------------------------------

--
-- Table structure for table `tv_channels`
--

DROP TABLE IF EXISTS `tv_channels`;
CREATE TABLE IF NOT EXISTS `tv_channels` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `channel` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tv_channels`
--

INSERT INTO `tv_channels` (`id`, `channel`) VALUES
(1, 'HBO'),
(2, 'Fox'),
(3, 'NBC'),
(4, 'ABC'),
(5, 'CBS');

-- --------------------------------------------------------

--
-- Table structure for table `tv_series`
--

DROP TABLE IF EXISTS `tv_series`;
CREATE TABLE IF NOT EXISTS `tv_series` (
  `id` smallint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tv_channel_id` tinyint UNSIGNED NOT NULL,
  `aired_at` datetime DEFAULT NULL,
  `movie_id` smallint UNSIGNED NOT NULL,
  `episodes_num` tinyint UNSIGNED DEFAULT NULL,
  `expected_seasons` tinyint UNSIGNED DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tv_series`
--

INSERT INTO `tv_series` (`id`, `tv_channel_id`, `aired_at`, `movie_id`, `episodes_num`, `expected_seasons`) VALUES
(1, 1, '2020-05-05 21:00:00', 6, 30, 3),
(2, 3, '2019-07-08 22:00:00', 7, 60, 6),
(3, 2, '2015-01-05 20:00:00', 8, 14, 2),
(4, 5, '2012-02-20 21:00:00', 9, 40, 4),
(5, 4, '2010-10-05 22:00:00', 10, 50, 5);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
