-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 07, 2018 at 07:18 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artist_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `album_token` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`token`),
  KEY `IDX_39986E43298FEB1D` (`album_token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`token`, `album_token`, `title`, `cover`, `description`) VALUES
('0TJ6QK', '048X0V', 'OK Computer', 'https://goo.gl/tJZYkB', 'OK Computer is the third studio album by the English alternative rock band Radiohead, released on 16 June 1997 on Parlophone in the United Kingdom and 1 July 1997 by Capitol Records in the United States. It marks a deliberate attempt by the band to move away from the introspective guitar-oriented sound of their previous album The Bends. Its layered sound and wide range of influences set it apart from many of the Britpop and alternative rock bands popular at the time and laid the groundwork for Radiohead\'s later, more experimental work.'),
('5P8RDX', '048X0V', 'The King of Limbs', 'https://goo.gl/CsDNgQ', 'The King of Limbs is the eighth studio album by English rock band Radiohead, produced by Nigel Godrich. It was self-released on 18 February 2011 as a download in MP3 and WAV formats, followed by physical CD and 12\" vinyl releases on 28 March, a wider digital release via AWAL, and a special \"newspaper\" edition on 9 May 2011. The physical editions were released through the band\'s Ticker Tape imprint on XL in the United Kingdom, TBD in the United States, and Hostess Entertainment in Japan.'),
('H3GY50', 'YMLOYJ', 'Dummy', 'https://goo.gl/evUdcY', 'Dummy is the debut album of the Bristol-based group Portishead. Released in August 22, 1994 on Go! Discs, the album earned critical acclaim, winning the 1995 Mercury Music Prize. It is often credited with popularizing the trip-hop genre and is frequently cited in lists of the best albums of the 1990s. Although it achieved modest chart success overseas, it peaked at #2 on the UK Album Chart and saw two of its three singles reach #13. The album was certified gold in 1997 and has sold two million copies in Europe. As of September 2011, the album was certified double-platinum in the United Kingdom and has sold as of September 2011 825,000 copies.'),
('X3KKXU', 'YMLOYJ', 'Third', 'https://goo.gl/9fmjsi', 'Third is the third studio album by English musical group Portishead, released on 27 April 2008, on Island Records in the United Kingdom, two days after on Mercury Records in the United States, and on 30 April 2008 on Universal Music Japan in Japan. It is their first release in 10 years, and their first studio album in eleven years. Third entered the UK Album Chart at #2, and became the band\'s first-ever American Top 10 album on the Billboard 200, reaching #7 in its entry week.');

-- --------------------------------------------------------

--
-- Table structure for table `artist`
--

DROP TABLE IF EXISTS `artist`;
CREATE TABLE IF NOT EXISTS `artist` (
  `token` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `artist`
--

INSERT INTO `artist` (`token`, `name`) VALUES
('048X0V', 'Radiohead'),
('YMLOYJ', 'Portishead');

-- --------------------------------------------------------

--
-- Table structure for table `migration_versions`
--

DROP TABLE IF EXISTS `migration_versions`;
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migration_versions`
--

INSERT INTO `migration_versions` (`version`) VALUES
('20181118154140');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

DROP TABLE IF EXISTS `song`;
CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_token` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `length` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `IDX_33EDEEA19102D400` (`customer_token`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `customer_token`, `title`, `length`) VALUES
(1, '5P8RDX', 'Bloom', 905),
(2, '5P8RDX', 'Morning Mr Magpie', 2464),
(3, '5P8RDX', 'Little by Little', 1624),
(4, '5P8RDX', 'Feral', 783),
(5, '5P8RDX', 'Lotus Flower', 65),
(6, '5P8RDX', 'Codex', 2824),
(7, '5P8RDX', 'Give Up the Ghost', 3004),
(8, '5P8RDX', 'Separator', 1205),
(9, '0TJ6QK', 'Airbag', 2644),
(10, '0TJ6QK', 'Paranoid Android', 1386),
(11, '0TJ6QK', 'Subterranean Homesick Alien', 1624),
(12, '0TJ6QK', 'Exit Music (For a Film)', 1444),
(13, '0TJ6QK', 'Let Down', 3544),
(14, '0TJ6QK', 'Karma Police', 1264),
(15, '0TJ6QK', 'Fitter Happier', 3421),
(16, '0TJ6QK', 'Electioneering', 3003),
(17, '0TJ6QK', 'Climbing Up the Walls', 2704),
(18, '0TJ6QK', 'No Surprises', 2883),
(19, '0TJ6QK', 'Lucky', 1144),
(20, '0TJ6QK', 'The Tourist', 1445),
(21, 'H3GY50', 'Mysterons', 125),
(22, 'H3GY50', 'Sour Times', 664),
(23, 'H3GY50', 'Strangers', 3303),
(24, 'H3GY50', 'It Could Be Sweet', 964),
(25, 'H3GY50', 'Wandering Star', 3064),
(26, 'H3GY50', 'It\'s a Fire', 2943),
(27, 'H3GY50', 'Numb', 3243),
(28, 'H3GY50', 'Roads', 125),
(29, 'H3GY50', 'Pedestal', 2343),
(30, 'H3GY50', 'Biscuit', 65),
(31, 'H3GY50', 'Glory Box', 365),
(32, 'X3KKXU', 'Silence', 3484),
(33, 'X3KKXU', 'Hunter', 3423),
(34, 'X3KKXU', 'Nylon Smile', 963),
(35, 'X3KKXU', 'The Rip', 1744),
(36, 'X3KKXU', 'Plastic', 1623),
(37, 'X3KKXU', 'We Carry On', 1626),
(38, 'X3KKXU', 'Deep Water', 1861),
(39, 'X3KKXU', 'Machine Gun', 2584),
(40, 'X3KKXU', 'Small', 2706),
(41, 'X3KKXU', 'Magic Doors', 1923),
(42, 'X3KKXU', 'Threads', 2705);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `FK_39986E43298FEB1D` FOREIGN KEY (`album_token`) REFERENCES `artist` (`token`);

--
-- Constraints for table `song`
--
ALTER TABLE `song`
  ADD CONSTRAINT `FK_33EDEEA19102D400` FOREIGN KEY (`customer_token`) REFERENCES `album` (`token`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
