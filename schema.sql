SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';


USE `app`;

DROP TABLE IF EXISTS `Bewertungen`;
CREATE TABLE `Bewertungen` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Sterne` int(1) NOT NULL,
  `Kommentar` varchar(255) NOT NULL,
  `UserId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `UserId` (`UserId`),
  KEY `FilmId` (`FilmId`),
  CONSTRAINT `Bewertungen_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `User` (`Id`),
  CONSTRAINT `Bewertungen_ibfk_2` FOREIGN KEY (`FilmId`) REFERENCES `Film` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Film`;
CREATE TABLE `Film` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `FilmTitel` varchar(255) NOT NULL,
  `Beschreibung` varchar(255) NOT NULL,
  `BewertungenID` int(11) NOT NULL,
  `GenreID` int(11) NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `BewertungenID` (`BewertungenID`),
  KEY `GenreID` (`GenreID`),
  CONSTRAINT `Film_ibfk_1` FOREIGN KEY (`BewertungenID`) REFERENCES `Bewertungen` (`Id`),
  CONSTRAINT `Film_ibfk_2` FOREIGN KEY (`GenreID`) REFERENCES `Genre` (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `Genre`;
CREATE TABLE `Genre` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `GenreName` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


DROP TABLE IF EXISTS `User`;
CREATE TABLE `User` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `Vorname` varchar(255) NOT NULL,
  `Nachname` varchar(255) NOT NULL,
  `Strasse` varchar(255) NOT NULL,
  `Ort` varchar(255) NOT NULL,
  `Ist_Admin` int(1) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `User` (`Id`, `email`, `password`, `username`, `Vorname`, `Nachname`, `Strasse`, `Ort`, `Ist_Admin`) VALUES
(1,	'n.drobnjaknd@gmail.com',	'$2y$10$bmljaU5pa29saW5hRHJvYezmIBuYQeDtobGKq8MrZH9Qqr/xCSD5O',	'nici',	'Nikolina',	'Drobnjak',	'Schlyffistäg',	'Muri',	1),
(5,	'asdf@asdf.ch',	'$2y$10$asdfasdfasdfasdfasdfaerxQBqT6U6EVdKy0STz8P2G8NJdiYQjS',	'asdfasdf',	'asdf',	'asdf',	'asdfasdf',	'asdf',	0);

