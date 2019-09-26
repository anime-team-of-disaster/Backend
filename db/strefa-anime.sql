-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Wrz 2019, 10:28
-- Wersja serwera: 10.4.6-MariaDB
-- Wersja PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `strefa-anime`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `anime`
--

CREATE TABLE `anime` (
  `TITLE` varchar(50) NOT NULL DEFAULT '',
  `ANIME_ID` int(11) DEFAULT NULL,
  `CREATOR` varchar(30) DEFAULT NULL,
  `TYPE` varchar(10) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `EPISODES` int(11) DEFAULT NULL,
  `AIRED` date DEFAULT NULL,
  `ENDED` date DEFAULT NULL,
  `STATUS` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `character_list`
--

CREATE TABLE `character_list` (
  `CHARACTER_ID` int(11) NOT NULL DEFAULT 0,
  `ANIME` varchar(50) DEFAULT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `GENDER` varchar(1) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `creator`
--

CREATE TABLE `creator` (
  `CREATOR_ID` int(11) NOT NULL DEFAULT 0,
  `ANIME` varchar(50) DEFAULT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `GENDER` varchar(1) DEFAULT NULL,
  `DATE_OF_BIRTH` date DEFAULT NULL,
  `DATE_OF_DEATH` date DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `group_list`
--

CREATE TABLE `group_list` (
  `ANIME` varchar(50) DEFAULT NULL,
  `GROUP_ID` int(11) NOT NULL DEFAULT 0,
  `NAME` varchar(30) DEFAULT NULL,
  `P_NAME` varchar(30) DEFAULT NULL,
  `LANGUAGES` varchar(30) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `DATE_ESTABLISHED` date DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `latest`
--

CREATE TABLE `latest` (
  `ANIME_ID` int(11) NOT NULL DEFAULT 0,
  `ANIME` varchar(50) DEFAULT NULL,
  `GROUP_NAME` varchar(30) DEFAULT NULL,
  `INFO` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opening`
--

CREATE TABLE `opening` (
  `SONG_ID` int(11) NOT NULL DEFAULT 0,
  `ANIME` varchar(50) DEFAULT NULL,
  `NAME` varchar(30) DEFAULT NULL,
  `PERFORMER` varchar(30) DEFAULT NULL,
  `LENGTH` int(11) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user_list`
--

CREATE TABLE `user_list` (
  `ANIME` varchar(50) DEFAULT NULL,
  `USER_NAME` varchar(30) NOT NULL DEFAULT '',
  `PASSWORD` varchar(30) DEFAULT NULL,
  `STATUS` varchar(20) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `user_list`
--

INSERT INTO `user_list` (`ANIME`, `USER_NAME`, `PASSWORD`, `STATUS`, `RATING`) VALUES
('NARUTO ORIGINAL', '003', 'GOGOTAH', 'ONGOING', 8),
('BOKU NO HERO ACADEMIA', '004', 'GOGOTAH', 'ONGOING', 9),
('KIMI NO NA WA', '005', 'GOGOTAH', 'ONGOING', 10),
('NARUTO SHIPPUDEN', '007', 'GOGOTAH', 'ONGOING', 7),
('BORUTO:NARUTO NEXT GENERATIONS', 'MORDRED_002', 'GOGOTAH', 'ONGOING', 8);

--
-- Wyzwalacze `user_list`
--
DELIMITER $$
CREATE TRIGGER `V_USER` BEFORE DELETE ON `user_list` FOR EACH ROW BEGIN
      DELETE FROM CREATOR WHERE ANIME = USER_LIST.ANIME;
      END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `v`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `v` (
`ANIME_ID` int(11)
,`TITLE` varchar(50)
,`CREATOR` varchar(30)
,`RATING` int(11)
);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `video_list`
--

CREATE TABLE `video_list` (
  `ANIME` varchar(50) DEFAULT NULL,
  `VIDEO_ID` int(11) NOT NULL DEFAULT 0,
  `SERVER_NAME` varchar(30) DEFAULT NULL,
  `RATING` int(11) DEFAULT NULL,
  `URL` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Wyzwalacze `video_list`
--
DELIMITER $$
CREATE TRIGGER `addUSER` AFTER INSERT ON `video_list` FOR EACH ROW BEGIN
    INSERT INTO USER_LIST SET ANIME = NEW.ANIME  ;
    INSERT INTO USER_LIST SET USER_NAME = NEW.SERVER_NAME  ;
       
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `w`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `w` (
`CHARACTER_ID` int(11)
,`NAME` varchar(30)
,`GENDER` varchar(1)
,`ANIME` varchar(50)
,`RATING` int(11)
);

-- --------------------------------------------------------

--
-- Zastąpiona struktura widoku `x`
-- (Zobacz poniżej rzeczywisty widok)
--
CREATE TABLE `x` (
`GROUP_ID` int(11)
,`NAME` varchar(30)
,`P_NAME` varchar(30)
,`ANIME` varchar(50)
,`RATING` int(11)
,`URL` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktura widoku `v`
--
DROP TABLE IF EXISTS `v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agarwaan`@`localhost` SQL SECURITY DEFINER VIEW `v`  AS  select `anime`.`ANIME_ID` AS `ANIME_ID`,`anime`.`TITLE` AS `TITLE`,`anime`.`CREATOR` AS `CREATOR`,`anime`.`RATING` AS `RATING` from `anime` ;

-- --------------------------------------------------------

--
-- Struktura widoku `w`
--
DROP TABLE IF EXISTS `w`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agarwaan`@`localhost` SQL SECURITY DEFINER VIEW `w`  AS  select `character_list`.`CHARACTER_ID` AS `CHARACTER_ID`,`character_list`.`NAME` AS `NAME`,`character_list`.`GENDER` AS `GENDER`,`character_list`.`ANIME` AS `ANIME`,`character_list`.`RATING` AS `RATING` from `character_list` ;

-- --------------------------------------------------------

--
-- Struktura widoku `x`
--
DROP TABLE IF EXISTS `x`;

CREATE ALGORITHM=UNDEFINED DEFINER=`agarwaan`@`localhost` SQL SECURITY DEFINER VIEW `x`  AS  select `group_list`.`GROUP_ID` AS `GROUP_ID`,`group_list`.`NAME` AS `NAME`,`group_list`.`P_NAME` AS `P_NAME`,`group_list`.`ANIME` AS `ANIME`,`group_list`.`RATING` AS `RATING`,`group_list`.`URL` AS `URL` from `group_list` ;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `anime`
--
ALTER TABLE `anime`
  ADD PRIMARY KEY (`TITLE`);

--
-- Indeksy dla tabeli `character_list`
--
ALTER TABLE `character_list`
  ADD PRIMARY KEY (`CHARACTER_ID`),
  ADD KEY `ANIME_FK` (`ANIME`);

--
-- Indeksy dla tabeli `creator`
--
ALTER TABLE `creator`
  ADD PRIMARY KEY (`CREATOR_ID`),
  ADD KEY `ANIME_FK1` (`ANIME`);

--
-- Indeksy dla tabeli `group_list`
--
ALTER TABLE `group_list`
  ADD PRIMARY KEY (`GROUP_ID`),
  ADD KEY `ANIME_FK2` (`ANIME`);

--
-- Indeksy dla tabeli `latest`
--
ALTER TABLE `latest`
  ADD PRIMARY KEY (`ANIME_ID`),
  ADD KEY `ANIME_FK3` (`ANIME`);

--
-- Indeksy dla tabeli `opening`
--
ALTER TABLE `opening`
  ADD PRIMARY KEY (`SONG_ID`),
  ADD KEY `ANIME_FK4` (`ANIME`);

--
-- Indeksy dla tabeli `user_list`
--
ALTER TABLE `user_list`
  ADD PRIMARY KEY (`USER_NAME`),
  ADD KEY `ANIME_FK5` (`ANIME`);

--
-- Indeksy dla tabeli `video_list`
--
ALTER TABLE `video_list`
  ADD PRIMARY KEY (`VIDEO_ID`),
  ADD KEY `ANIME_FK6` (`ANIME`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `character_list`
--
ALTER TABLE `character_list`
  ADD CONSTRAINT `ANIME_FK` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `creator`
--
ALTER TABLE `creator`
  ADD CONSTRAINT `ANIME_FK1` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `group_list`
--
ALTER TABLE `group_list`
  ADD CONSTRAINT `ANIME_FK2` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `latest`
--
ALTER TABLE `latest`
  ADD CONSTRAINT `ANIME_FK3` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `opening`
--
ALTER TABLE `opening`
  ADD CONSTRAINT `ANIME_FK4` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `user_list`
--
ALTER TABLE `user_list`
  ADD CONSTRAINT `ANIME_FK5` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);

--
-- Ograniczenia dla tabeli `video_list`
--
ALTER TABLE `video_list`
  ADD CONSTRAINT `ANIME_FK6` FOREIGN KEY (`ANIME`) REFERENCES `anime` (`TITLE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
