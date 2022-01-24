-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 24. Jan 2022 um 09:29
-- Server-Version: 10.4.22-MariaDB
-- PHP-Version: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `gps`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `baumtyp`
--

CREATE TABLE `baumtyp` (
  `id` int(2) NOT NULL,
  `name` varchar(100) NOT NULL COMMENT 'Baumname',
  `link` varchar(200) NOT NULL COMMENT 'Link zu Wikipedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Daten für Tabelle `baumtyp`
--

INSERT INTO `baumtyp` (`id`, `name`, `link`) VALUES
(1, 'Linde', 'https://de.wikipedia.org/wiki/Linden_(Gattung)'),
(2, 'Ahorn', 'https://de.wikipedia.org/wiki/Ahorne'),
(3, 'Birke', 'https://de.wikipedia.org/wiki/Birken'),
(4, 'Kastanie', 'https://de.wikipedia.org/wiki/Kastanie'),
(5, 'Buche', 'https://de.wikipedia.org/wiki/Rotbuche'),
(6, 'Erle', 'https://de.wikipedia.org/wiki/Erlen_(Gattung)'),
(7, 'Tanne', 'https://de.wikipedia.org/wiki/Tannen'),
(8, 'Fichte', 'https://de.wikipedia.org/wiki/Fichten'),
(9, 'Konifere', 'https://de.wikipedia.org/wiki/Koniferen'),
(10, 'Lärche', 'https://de.wikipedia.org/wiki/L%C3%A4rchen');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `baumtyp`
--
ALTER TABLE `baumtyp`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `baumtyp`
--
ALTER TABLE `baumtyp`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
