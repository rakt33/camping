-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 01 apr 2019 om 08:11
-- Serverversie: 10.1.34-MariaDB
-- PHP-versie: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `deliverymanager`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `markers`
--

CREATE TABLE `markers` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `markers`
--

INSERT INTO `markers` (`id`, `name`, `address`, `lat`, `lng`, `type`) VALUES
(1, 'Love.Fish', '580 Darling Street, Rozelle, NSW', 51.852741, 5.813240, 'ricardo'),
(2, 'Young Henrys', '76 Wilford Street, Newtown, NSW', 51.855591, 5.816372, 'els'),
(3, 'Hunter Gatherer', 'Greenwood Plaza, 36 Blue St, North Sydney NSW', 51.855591, 5.816372, 'micha'),
(4, 'The Potting Shed', '7A, 2 Huntley Street, Alexandria, NSW', 51.855591, 5.816372, 'linda');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `adress` varchar(50) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `euro` varchar(50) NOT NULL DEFAULT '0',
  `payed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `adress`, `customer`, `euro`, `payed`) VALUES
(1, 4, 'Weurt', 'Ricado', '0', ''),
(2, 4, 'Weurt', 'Ricado', '0', '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `rank` varchar(50) NOT NULL DEFAULT 'deliverer',
  `latitude` varchar(50) NOT NULL,
  `longitude` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `rank`, `latitude`, `longitude`) VALUES
(3, 'test', '$2y$10$PWE.Z/.hb1HxMnbQ9GH.FO9atJAK9z3VuFFMPB3etCE53WaGC2PHe', '2019-01-02 15:06:21', 'deliverer', '51.852740', '5.813240'),
(4, 'rakt33', '$2y$10$KOPRgHgznnwYqAuf8hpCXOS.ggrG7si88fHp8EH4T86JDV7FvYZT6', '2019-01-03 11:49:26', 'admin', '51.855591', '5.816372'),
(5, 'mischa', '$2y$10$KOPRgHgznnwYqAuf8hpCXOS.ggrG7si88fHp8EH4T86JDV7FvYZT6', '2019-01-03 11:49:26', 'deliverer', '51.855591', '5.816372');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `markers`
--
ALTER TABLE `markers`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`username`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `markers`
--
ALTER TABLE `markers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT voor een tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
