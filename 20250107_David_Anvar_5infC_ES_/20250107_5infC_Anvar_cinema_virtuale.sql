-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mar 22, 2025 alle 19:07
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `20250107_5infC_Anvar_cinema_virtuale`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `attore`
--

CREATE TABLE `attore` (
  `id_attore` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `nazionalita` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `attore_film`
--

CREATE TABLE `attore_film` (
  `id_attore` int(11) NOT NULL,
  `id_film` int(11) NOT NULL,
  `tipo_di_attore` enum('protagonista','non_protagonista') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `film`
--

CREATE TABLE `film` (
  `id_film` int(11) NOT NULL,
  `titolo` varchar(100) NOT NULL,
  `anno_di_produzione` date NOT NULL,
  `nome_regista` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `film_proiezione`
--

CREATE TABLE `film_proiezione` (
  `id_film` int(11) NOT NULL,
  `id_proiezione` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `proiezione`
--

CREATE TABLE `proiezione` (
  `id_proiezione` int(11) NOT NULL,
  `citta` varchar(100) NOT NULL,
  `sala` int(50) NOT NULL,
  `data` date NOT NULL,
  `ora` time NOT NULL,
  `num_di_spettatori` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `attore`
--
ALTER TABLE `attore`
  ADD PRIMARY KEY (`id_attore`);

--
-- Indici per le tabelle `attore_film`
--
ALTER TABLE `attore_film`
  ADD PRIMARY KEY (`id_attore`,`id_film`),
  ADD KEY `id_film` (`id_film`);

--
-- Indici per le tabelle `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`);

--
-- Indici per le tabelle `film_proiezione`
--
ALTER TABLE `film_proiezione`
  ADD PRIMARY KEY (`id_proiezione`,`id_film`),
  ADD KEY `id_film` (`id_film`);

--
-- Indici per le tabelle `proiezione`
--
ALTER TABLE `proiezione`
  ADD PRIMARY KEY (`id_proiezione`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `attore`
--
ALTER TABLE `attore`
  MODIFY `id_attore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT per la tabella `proiezione`
--
ALTER TABLE `proiezione`
  MODIFY `id_proiezione` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `attore_film`
--
ALTER TABLE `attore_film`
  ADD CONSTRAINT `attore_film_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `attore_film_ibfk_2` FOREIGN KEY (`id_attore`) REFERENCES `attore` (`id_attore`);

--
-- Limiti per la tabella `film_proiezione`
--
ALTER TABLE `film_proiezione`
  ADD CONSTRAINT `film_proiezione_ibfk_1` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `film_proiezione_ibfk_2` FOREIGN KEY (`id_proiezione`) REFERENCES `proiezione` (`id_proiezione`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
