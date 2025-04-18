-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Apr 01, 2025 alle 23:22
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
-- Database: `20250108_5infc_anvar_societa_calcistica`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `eta_minima` int(2) NOT NULL,
  `eta_massima` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatore`
--

CREATE TABLE `giocatore` (
  `id_giocatore` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cognome` varchar(100) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `via` varchar(100) NOT NULL,
  `cap` int(5) NOT NULL,
  `n_civico` int(2) NOT NULL,
  `citta` varchar(150) NOT NULL,
  `eta` int(2) NOT NULL,
  `CF` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `giocatore`
--

INSERT INTO `giocatore` (`id_giocatore`, `id_categoria`, `nome`, `cognome`, `telefono`, `via`, `cap`, `n_civico`, `citta`, `eta`, `CF`) VALUES
(1, 0, 'david', 'Anvar', '1111111111111', 'Ciao amici', 20147, 99, 'Milano', 19, 'DGHJWERJR2423DF3');

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatore_categoria`
--

CREATE TABLE `giocatore_categoria` (
  `id_categoria` int(11) NOT NULL,
  `id_giocatore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `giocatore_ruolo`
--

CREATE TABLE `giocatore_ruolo` (
  `id_ruolo` int(11) NOT NULL,
  `id_giocatore` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struttura della tabella `ruolo`
--

CREATE TABLE `ruolo` (
  `id_ruolo` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `Descrizione` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indici per le tabelle `giocatore`
--
ALTER TABLE `giocatore`
  ADD PRIMARY KEY (`id_giocatore`);

--
-- Indici per le tabelle `giocatore_categoria`
--
ALTER TABLE `giocatore_categoria`
  ADD PRIMARY KEY (`id_categoria`,`id_giocatore`),
  ADD KEY `id_giocatore` (`id_giocatore`);

--
-- Indici per le tabelle `giocatore_ruolo`
--
ALTER TABLE `giocatore_ruolo`
  ADD PRIMARY KEY (`id_ruolo`,`id_giocatore`),
  ADD KEY `id_giocatore` (`id_giocatore`);

--
-- Indici per le tabelle `ruolo`
--
ALTER TABLE `ruolo`
  ADD PRIMARY KEY (`id_ruolo`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `giocatore`
--
ALTER TABLE `giocatore`
  MODIFY `id_giocatore` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `ruolo`
--
ALTER TABLE `ruolo`
  MODIFY `id_ruolo` int(11) NOT NULL AUTO_INCREMENT;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `giocatore_categoria`
--
ALTER TABLE `giocatore_categoria`
  ADD CONSTRAINT `giocatore_categoria_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `giocatore_categoria_ibfk_2` FOREIGN KEY (`id_giocatore`) REFERENCES `giocatore` (`id_giocatore`);

--
-- Limiti per la tabella `giocatore_ruolo`
--
ALTER TABLE `giocatore_ruolo`
  ADD CONSTRAINT `giocatore_ruolo_ibfk_1` FOREIGN KEY (`id_ruolo`) REFERENCES `ruolo` (`id_ruolo`),
  ADD CONSTRAINT `giocatore_ruolo_ibfk_2` FOREIGN KEY (`id_giocatore`) REFERENCES `giocatore` (`id_giocatore`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
