-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: s443.loopia.se
-- Generation Time: Jul 01, 2014 at 05:05 PM
-- Server version: 5.5.31
-- PHP Version: 5.3.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `loparkollektivet_se`
--

-- --------------------------------------------------------

--
-- Table structure for table `Anvandare`
--

CREATE TABLE IF NOT EXISTS `Anvandare` (
  `ID` int(5) NOT NULL AUTO_INCREMENT,
  `Nickname` varchar(35) NOT NULL,
  `Password` varchar(32) DEFAULT NULL,
  `Fornamn` varchar(20) DEFAULT NULL,
  `Efternamn` varchar(20) DEFAULT NULL,
  `Kon` varchar(6) DEFAULT NULL,
  `Lan` varchar(15) DEFAULT NULL,
  `Aktivitetsgrad` int(2) DEFAULT NULL,
  `Email` varchar(50) NOT NULL,
  `User_lvl` varchar(1) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `Anvandare`
--

INSERT INTO `Anvandare` (`ID`, `Nickname`, `Password`, `Fornamn`, `Efternamn`, `Kon`, `Lan`, `Aktivitetsgrad`, `Email`, `User_lvl`) VALUES
(11, 'Makka95', 'd0b1feb7af8dc60e279b538bb790fa38', 'Marcus', 'Hanikat', 'Man', 'Stockholm', 3, 'macan95@hotmail.com', 'A'),
(12, 'Madde', 'd0b1feb7af8dc60e279b538bb790fa38', 'Madelene', 'Hanikat', 'Kvinna', 'Stockholm', 3, 'Macan95@hotmail.com', 'A'),
(13, 'Robert', 'd0b1feb7af8dc60e279b538bb790fa38', 'Robert', 'Hanning', 'Man', 'Stockholm', 5, 'macan95@hotmail.com', 'A'),
(14, 'midgetPornIsKinkyÂ§', '5de07cfc8683cbeffcd67243132850a5', 'Big', 'Sexy', 'Man', 'Stockholm', 5, 'sugavmig@hotmale.com', ''),
(15, 'Bammer', 'd0b1feb7af8dc60e279b538bb790fa38', 'Marcus', 'Hanikat', 'Man', 'Stockholm', 5, 'macan', '');

-- --------------------------------------------------------

--
-- Table structure for table `Blogg`
--

CREATE TABLE IF NOT EXISTS `Blogg` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Rubrik` tinytext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Text` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `Skapare` int(11) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `Blogg`
--

INSERT INTO `Blogg` (`ID`, `Rubrik`, `Text`, `Skapare`, `Datum`) VALUES
(1, 'Första Bloggen', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras at pharetra arcu. Praesent ante lectus, congue eget pellentesque ac, vestibulum ut lectus. Cras at placerat libero. Aliquam rhoncus cursus mauris, sit amet gravida dolor fringilla sit amet amet. ', 11, '2014-02-20 13:55:46'),
(2, 'hej hej', 'dÃ¥', 11, '2014-02-23 17:09:08');

-- --------------------------------------------------------

--
-- Table structure for table `Categories`
--

CREATE TABLE IF NOT EXISTS `Categories` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Namn` varchar(50) NOT NULL,
  `Description` varchar(200) NOT NULL,
  `Categorie_group` int(2) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `Categories`
--

INSERT INTO `Categories` (`ID`, `Namn`, `Description`, `Categorie_group`) VALUES
(1, 'Test', 'Detta är ett test', 0),
(2, 'Test2', 'Detta är också ett test', 0),
(3, 'Test3', 'Detta är test', 1),
(4, 'Test4', 'Detta är test', 1),
(5, 'Test5', 'Detta är test', 2),
(6, 'Test6', 'Detta är test', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Counter`
--

CREATE TABLE IF NOT EXISTS `Counter` (
  `Count` int(30) NOT NULL,
  PRIMARY KEY (`Count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Counter`
--

INSERT INTO `Counter` (`Count`) VALUES
(24);

-- --------------------------------------------------------

--
-- Table structure for table `Events`
--

CREATE TABLE IF NOT EXISTS `Events` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Skapare` varchar(5) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Namn` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Plats` tinytext COLLATE utf8_unicode_ci,
  `Synlighet` varchar(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Sport` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=26 ;

--
-- Dumping data for table `Events`
--

INSERT INTO `Events` (`ID`, `Skapare`, `Namn`, `Plats`, `Synlighet`, `Date`, `Sport`) VALUES
(7, '11', 'Träna', 'aaa', 'A', '2013-12-07 22:01:42', ''),
(11, '', 'abc', 'def', 'A', '2014-01-05 06:00:00', ''),
(12, '11', 'Testar', 'Kvarnï¿½ngen', 'A', '2014-02-07 23:00:00', ''),
(13, '11', 'Ishockey', 'KvarnÃ¤ngen', 'A', '2014-01-04 06:00:00', ''),
(14, '11', 'Fotboll', 'KvarnÃ¤ngen', 'A', '2014-01-04 06:30:00', ''),
(15, '11', 'Innebandy', 'KvarnÃ¤ngen', 'A', '2014-01-04 07:00:00', ''),
(16, '11', 'Gymma', 'KvarnÃ¤ngen', '', '2014-01-04 05:30:00', ''),
(17, '11', 'Ishockey', 'KvarnÃ¤ngen', 'A', '2014-01-04 07:30:00', ''),
(18, '11', 'emil', 'Puls OCh tï¿½rning', 'A', '2014-03-06 23:00:00', 'Styrketrän'),
(19, '11', 'Emils Triceps Pass', 'Puls Och TrÃ¤ning', 'A', '2014-03-21 04:00:00', ''),
(20, '11', 'Notis test', 'Testning', 'A', '2014-03-07 05:00:00', ''),
(21, '11', 'tes', 'tes', 'A', '2014-03-07 23:00:00', ''),
(23, '11', 'tes', 'tes', 'A', '2014-04-08 22:00:00', ''),
(24, '11', 'Löpträning', 'Kvarnängen', 'A', '2014-04-28 10:00:00', ''),
(25, '11', 'Jogging', 'KvarnÃ¤ngen', 'A', '2014-05-01 06:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `Friends`
--

CREATE TABLE IF NOT EXISTS `Friends` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Friend_1` int(6) NOT NULL,
  `Friend_2` int(6) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `Friends`
--

INSERT INTO `Friends` (`ID`, `Friend_1`, `Friend_2`, `Date`) VALUES
(2, 11, 13, '2014-03-23 10:25:43'),
(9, 11, 12, '2014-04-24 10:04:34');

-- --------------------------------------------------------

--
-- Table structure for table `Friend_Request`
--

CREATE TABLE IF NOT EXISTS `Friend_Request` (
  `Friend_1` int(6) NOT NULL,
  `Friend_2` int(6) NOT NULL,
  `Status` int(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Friend_1`,`Friend_2`),
  KEY `fri` (`Friend_1`,`Friend_2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Friend_Request`
--

INSERT INTO `Friend_Request` (`Friend_1`, `Friend_2`, `Status`, `Date`) VALUES
(11, 12, 3, '2014-04-24 10:04:34'),
(12, 13, 1, '0000-00-00 00:00:00'),
(13, 14, 1, '0000-00-00 00:00:00'),
(14, 13, 2, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Har_Notifikation`
--

CREATE TABLE IF NOT EXISTS `Har_Notifikation` (
  `Anv_ID` int(6) NOT NULL,
  `Evt_ID` int(6) NOT NULL,
  `Type` int(1) NOT NULL,
  `Level` int(1) NOT NULL,
  PRIMARY KEY (`Anv_ID`,`Evt_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Har_Notifikation`
--

INSERT INTO `Har_Notifikation` (`Anv_ID`, `Evt_ID`, `Type`, `Level`) VALUES
(11, 7, 3, 3),
(11, 17, 2, 3),
(11, 18, 1, 3),
(11, 20, 1, 3),
(11, 23, 1, 3),
(11, 24, 1, 3),
(11, 25, 1, 3),
(12, 18, 3, 3),
(13, 18, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `Meddelanden`
--

CREATE TABLE IF NOT EXISTS `Meddelanden` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Anvandare_ID_Avsandare` int(6) NOT NULL,
  `Anvandare_ID_Mottagare` int(6) NOT NULL,
  `Text` text NOT NULL,
  `Status` varchar(1) NOT NULL,
  `Datum_Skapat` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Datum_Sett` datetime DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `Meddelanden`
--

INSERT INTO `Meddelanden` (`ID`, `Anvandare_ID_Avsandare`, `Anvandare_ID_Mottagare`, `Text`, `Status`, `Datum_Skapat`, `Datum_Sett`) VALUES
(1, 11, 12, 'Hej Hej på dig leverpastej', '1', '2014-03-23 10:33:17', '2014-03-23 00:00:00'),
(2, 11, 12, 'Hej då på dig leverpastej', '1', '2014-03-23 10:33:17', '2014-03-23 00:00:00'),
(3, 11, 12, 'OK OK OK Detta funkar bra', '1', '2014-03-24 14:22:20', '0000-00-00 00:00:00'),
(4, 11, 12, 'Lorem ipsum', '', '2014-03-24 23:00:00', '0000-00-00 00:00:00'),
(5, 11, 12, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac malesuada magna, eu eleifend velit. Vestibulum et consequat elit. Nam eleifend ligula pharetra, imperdiet sapien vel, vehicula purus. In viverra libero vel eros interdum, ac vehicula dui hendrerit. Mauris arcu leo, ornare a purus in, tincidunt accumsan eros. Vestibulum semper tristique augue in gravida. Nulla. ', '', '2014-03-24 14:23:25', '2014-03-25 00:00:00'),
(6, 12, 11, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque ac malesuada magna, eu eleifend velit. Vestibulum et consequat elit. Nam eleifend ligula pharetra, imperdiet sapien vel, vehicula purus. In viverra libero vel eros interdum, ac vehicula dui hendrerit. Mauris arcu leo, ornare a purus in, tincidunt accumsan eros. Vestibulum semper tristique augue in gravida. Nulla. ', '', '2014-03-24 23:00:00', '2014-03-27 00:00:00'),
(7, 11, 12, 'Skriv ett meddelande', '1', '2014-03-25 12:36:46', NULL),
(8, 11, 12, 'Tjenare', '1', '2014-03-25 12:37:30', NULL),
(9, 11, 12, 'Funkar det?', '1', '2014-03-25 12:39:24', NULL),
(10, 11, 12, 'FUCK YOU POMPEN!', '1', '2014-03-25 12:46:17', NULL),
(11, 11, 13, 'Skriv ett meddelande', '1', '2014-03-25 12:50:12', NULL),
(12, 11, 13, 'Skriv ett till meddelande', '1', '2014-03-25 12:51:59', NULL),
(13, 11, 13, 'Trololol', '1', '2014-03-25 13:00:40', NULL),
(14, 11, 13, 'Pannkakka', '1', '2014-03-25 13:01:00', NULL),
(15, 11, 13, 'Funkar', '1', '2014-03-25 13:03:39', NULL),
(16, 11, 12, 'pannkaka', '1', '2014-04-25 06:55:17', NULL),
(17, 11, 12, 'pannkaka', '1', '2014-04-25 06:55:21', NULL),
(18, 11, 12, 'pannkaka', '1', '2014-04-25 06:55:22', NULL),
(19, 11, 12, 'pannkaka', '1', '2014-04-25 06:55:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `News`
--

CREATE TABLE IF NOT EXISTS `News` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Subject` tinytext CHARACTER SET latin1 NOT NULL,
  `Text` text CHARACTER SET latin1 NOT NULL,
  `Skapare` int(5) NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  FULLTEXT KEY `Subject` (`Subject`,`Text`),
  FULLTEXT KEY `Text` (`Text`),
  FULLTEXT KEY `Subject_2` (`Subject`),
  FULLTEXT KEY `Text_2` (`Text`,`Subject`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `News`
--

INSERT INTO `News` (`ID`, `Subject`, `Text`, `Skapare`, `Datum`) VALUES
(7, 'Välkommen till Löparkollektivet!', 'Hej och välkommen till löparkollektivet!\r\n\r\nLöparkollektivet är en hemsida som skall göra det enklare för personer att koordinera sina träningar och hitta nya träningskamrater. Alla personer kan, efter att man har skapat ett eget konto, använda kalendern för att skapaoffentliga eller stängda träningar. Till en offentlig träning så kan alla anmäla sig medans en stängd träning så är det antingen möjligt att ansöka om att få vara med eller att värden bjuder in personer till träningen. På detta sätt så kan man koordinera träningar med allmänheten, eller enbart med sina kompisar.\r\n\r\nDenna hemsida är fortfarande under konstruktion och har inte publicerats ännu. Detta leder till att sidan inte är åtkomlig via dess address "www.loparkollektivet.se". Det är även troligt att hemsidan kommer att byta namn till "Träningskollektivet" för att passa en bredare målgrupp. \r\n\r\nKonstruktionen av hemsidan kommer att fortsätta för att förhopningsvis bli klar fram till midsommar. Titta gärna in då för att se det slutgilitga resultatet av hemsidan. \r\n\r\nHej då!', 11, '2013-12-31 23:00:00'),
(8, 'Välkommen till Löparkollektivet!', 'Hej och välkommen till löparkollektivet!\r\n\r\nLöparkollektivet är en hemsida som skall göra det enklare för personer att koordinera sina träningar och hitta nya träningskamrater. Alla personer kan, efter att man har skapat ett eget konto, använda kalendern för att skapaoffentliga eller stängda träningar. Till en offentlig träning så kan alla anmäla sig medans en stängd träning så är det antingen möjligt att ansöka om att få vara med eller att värden bjuder in personer till träningen. På detta sätt så kan man koordinera träningar med allmänheten, eller enbart med sina kompisar.\r\n\r\nDenna hemsida är fortfarande under konstruktion och har inte publicerats ännu. Detta leder till att sidan inte är åtkomlig via dess address "www.loparkollektivet.se". Det är även troligt att hemsidan kommer att byta namn till "Träningskollektivet" för att passa en bredare målgrupp. \r\n\r\nKonstruktionen av hemsidan kommer att fortsätta för att förhopningsvis bli klar fram till midsommar. Titta gärna in då för att se det slutgilitga resultatet av hemsidan. \r\n\r\nHej då!', 11, '2013-12-31 23:00:00'),
(9, 'Välkommen till Löparkollektivet!', 'Hej och välkommen till löparkollektivet!\r\n\r\nLöparkollektivet är en hemsida som skall göra det enklare för personer att koordinera sina träningar och hitta nya träningskamrater. Alla personer kan, efter att man har skapat ett eget konto, använda kalendern för att skapaoffentliga eller stängda träningar. Till en offentlig träning så kan alla anmäla sig medans en stängd träning så är det antingen möjligt att ansöka om att få vara med eller att värden bjuder in personer till träningen. På detta sätt så kan man koordinera träningar med allmänheten, eller enbart med sina kompisar.\r\n\r\nDenna hemsida är fortfarande under konstruktion och har inte publicerats ännu. Detta leder till att sidan inte är åtkomlig via dess address "www.loparkollektivet.se". Det är även troligt att hemsidan kommer att byta namn till "Träningskollektivet" för att passa en bredare målgrupp. \r\n\r\nKonstruktionen av hemsidan kommer att fortsätta för att förhopningsvis bli klar fram till midsommar. Titta gärna in då för att se det slutgilitga resultatet av hemsidan. \r\n\r\nHej då!', 11, '2013-12-31 23:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Notifikationer`
--

CREATE TABLE IF NOT EXISTS `Notifikationer` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Anvandare_ID` int(6) NOT NULL,
  `Not_ID` int(6) NOT NULL,
  `Status` varchar(1) NOT NULL,
  `Type` int(1) NOT NULL,
  `Text` tinytext NOT NULL,
  `Datum` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Notifikationer`
--

INSERT INTO `Notifikationer` (`ID`, `Anvandare_ID`, `Not_ID`, `Status`, `Type`, `Text`, `Datum`) VALUES
(1, 11, 7, '1', 1, 'Detta är en notis om ett event med id''t 7, statusen 1 och typen 1', '2014-03-27 14:00:46'),
(2, 11, 18, '1', 1, 'detta är en notis från ett event med id''t nr 18', '2014-03-27 14:00:46'),
(3, 11, 18, '1', 1, 'Det Har Just Skett En ÄNdring I ett Event', '2014-03-28 03:20:28'),
(4, 11, 18, '1', 1, 'Det Har Just Skett En Ã„Ndring I ett Event', '2014-03-28 03:21:24'),
(5, 11, 18, '1', 1, 'Det Har Just Skett En Ã„Ndring I ett Event', '2014-03-28 03:22:00'),
(6, 11, 18, '1', 1, 'Det Har Just Skett En Ã„Ndring I ett Event', '2014-03-28 03:22:14'),
(7, 11, 23, '1', 1, 'Det Har Just Skapats ett Event', '2014-03-28 03:26:38'),
(8, 11, 20, '1', 1, 'Makka95 har anmÃ¤lt sig till eventet Notis test', '2014-04-01 12:56:27'),
(9, 11, 20, '1', 1, 'Makka95 kanske kommer till eventet Notis test', '2014-04-01 12:58:06'),
(10, 11, 20, '1', 1, 'Makka95 har avanmÃ¤lt sig till eventet Notis test', '2014-04-01 12:58:31'),
(11, 11, 17, '1', 2, 'Du har precis skapat en trÃ¥d i forumet', '2014-04-02 10:09:42'),
(12, 11, 17, '1', 2, 'Det har just skapats ett nytt inlÃ¤gg i trÃ¥den', '2014-04-02 10:20:23'),
(13, 11, 23, '1', 1, 'Makka95 har anmÃ¤lt sig till eventet tes', '2014-04-25 07:16:27'),
(14, 11, 17, '1', 2, 'Det har just skapats ett nytt inlÃ¤gg i trÃ¥den', '2014-04-25 07:20:08'),
(15, 11, 24, '1', 1, 'Det Har Just Skapats ett Event', '2014-04-28 12:22:14'),
(16, 11, 25, '1', 1, 'Det Har Just Skapats ett Event', '2014-05-20 13:54:27'),
(17, 11, 25, '1', 1, 'Makka95 har anmÃ¤lt sig till eventet ', '2014-05-20 13:54:37');

-- --------------------------------------------------------

--
-- Stand-in structure for view `Nytt_Forum`
--
CREATE TABLE IF NOT EXISTS `Nytt_Forum` (
`ID` int(3)
,`Subject` varchar(100)
,`Time` datetime
);
-- --------------------------------------------------------

--
-- Table structure for table `Plats`
--

CREATE TABLE IF NOT EXISTS `Plats` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Event_ID` int(6) NOT NULL,
  `Koordinater` varchar(128) NOT NULL,
  `Text` varchar(128) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `Posts`
--

CREATE TABLE IF NOT EXISTS `Posts` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Cat_id` int(3) NOT NULL,
  `Thread_id` int(3) NOT NULL,
  `User_id` int(8) NOT NULL,
  `Text` varchar(250) COLLATE utf8_swedish_ci NOT NULL,
  `Titel` varchar(50) COLLATE utf8_swedish_ci NOT NULL,
  `Time` datetime NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=38 ;

--
-- Dumping data for table `Posts`
--

INSERT INTO `Posts` (`ID`, `Cat_id`, `Thread_id`, `User_id`, `Text`, `Titel`, `Time`) VALUES
(4, 1, 9, 11, 'Skriv inte hÃ¤r', 'Okej?', '2013-07-07 00:32:50'),
(5, 2, 10, 11, 'Skriv hÃ¤r', 'ok', '2013-07-07 00:38:28'),
(6, 4, 11, 11, 'Skriv hÃ¤r Inne', 'tada', '2013-07-07 00:38:47'),
(13, 1, 8, 11, 'Skriv hÃ¤r', 'RE: Hej', '2013-09-27 11:40:41'),
(14, 1, 12, 11, 'NOtis test Notis Test', 'Notis Test', '2014-04-02 10:07:19'),
(15, 1, 13, 11, 'NOtis test Notis Test', 'Notis Testet', '2014-04-02 10:08:00'),
(16, 1, 14, 11, 'NOtis test Notis Test', 'Notis Testetet', '2014-04-02 10:08:28'),
(17, 1, 15, 11, 'NOtis test Notis Test', 'Notis', '2014-04-02 10:08:42'),
(18, 1, 16, 11, 'NOtis test Notis Test', 'Noti', '2014-04-02 10:08:59'),
(19, 1, 17, 11, 'NOtis test Notis Test', 'Notiser', '2014-04-02 10:09:42'),
(20, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:10:10'),
(21, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:11:26'),
(22, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:11:39'),
(23, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:15:37'),
(24, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:16:06'),
(25, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:16:21'),
(26, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:17:32'),
(27, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:18:04'),
(28, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:18:54'),
(29, 1, 17, 11, 'Skriv hÃ¤r', 'RE: Notiser', '2014-04-02 10:20:23'),
(30, 1, 17, 11, 'testar', 'RE: Notiser', '2014-04-25 07:20:08'),
(31, 0, 0, 11, 'okej dÃ¥', 'RE: ', '2014-06-11 15:18:36'),
(32, 0, 0, 11, 'okej dÃ¥ dÃ¥', 'RE: ', '2014-06-11 15:55:16'),
(33, 0, 0, 11, 'okej dÃ¥ dÃ¥', 'RE: ', '2014-06-11 15:55:56'),
(34, 0, 0, 11, 'okej dÃ¥ dÃ¥', 'RE: ', '2014-06-11 15:56:41'),
(35, 0, 0, 11, 'testar igen dÃ¥', 'RE: ', '2014-06-11 16:12:59'),
(36, 0, 0, 11, 'test test', 'RE: ', '2014-06-11 16:16:00'),
(37, 0, 0, 11, 'testtest', 'RE: ', '2014-06-11 16:25:23');

-- --------------------------------------------------------

--
-- Table structure for table `Status`
--

CREATE TABLE IF NOT EXISTS `Status` (
  `ID_Anv` int(11) NOT NULL,
  `ID_Evt` int(11) NOT NULL,
  `Status` int(11) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID_Anv`,`ID_Evt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Status`
--

INSERT INTO `Status` (`ID_Anv`, `ID_Evt`, `Status`, `Date`) VALUES
(11, 7, 2, '0000-00-00 00:00:00'),
(11, 12, 1, '0000-00-00 00:00:00'),
(11, 18, 2, '2014-03-26 14:52:30'),
(11, 20, 0, '2014-04-01 12:58:31'),
(11, 23, 2, '2014-04-25 07:16:27'),
(11, 25, 2, '2014-05-20 13:54:36'),
(12, 12, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `Threads`
--

CREATE TABLE IF NOT EXISTS `Threads` (
  `ID` int(8) NOT NULL AUTO_INCREMENT,
  `Subject` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Time` datetime NOT NULL,
  `User_id` int(8) NOT NULL,
  `Categorie_id` int(3) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci AUTO_INCREMENT=18 ;

--
-- Dumping data for table `Threads`
--

INSERT INTO `Threads` (`ID`, `Subject`, `Time`, `User_id`, `Categorie_id`) VALUES
(8, 'Hej', '2013-07-07 00:32:24', 11, 1),
(9, 'Okej?', '2013-07-07 00:32:50', 11, 1),
(10, 'Ok', '2013-07-07 00:38:28', 11, 2),
(11, 'tada', '2013-07-07 00:38:47', 11, 4),
(12, 'Notis Test', '2014-04-02 10:07:19', 11, 1),
(13, 'Notis Testet', '2014-04-02 10:08:00', 11, 1),
(14, 'Notis Testetet', '2014-04-02 10:08:28', 11, 1),
(15, 'Notis', '2014-04-02 10:08:42', 11, 1),
(16, 'Noti', '2014-04-02 10:08:59', 11, 1),
(17, 'Notiser', '2014-04-02 10:09:42', 11, 1);

-- --------------------------------------------------------

--
-- Structure for view `Nytt_Forum`
--
DROP TABLE IF EXISTS `Nytt_Forum`;

CREATE ALGORITHM=UNDEFINED DEFINER=`admin@l83291`@`%` SQL SECURITY DEFINER VIEW `Nytt_Forum` AS (select `Posts`.`Thread_id` AS `ID`,`Threads`.`Subject` AS `Subject`,`Posts`.`Time` AS `Time` from (`Posts` join `Threads` on((`Posts`.`Thread_id` = `Threads`.`ID`))) group by `Posts`.`Thread_id` order by `Posts`.`Time` desc limit 0,10);
