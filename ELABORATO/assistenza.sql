-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 31, 2021 alle 13:25
-- Versione del server: 10.4.19-MariaDB
-- Versione PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `assistenza`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `appuntamenti`
--

CREATE TABLE `appuntamenti` (
  `num` int(3) NOT NULL,
  `fkassistente` int(4) NOT NULL,
  `fkcliente` varchar(20) NOT NULL,
  `data` varchar(10) NOT NULL,
  `ora` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `appuntamenti`
--

INSERT INTO `appuntamenti` (`num`, `fkassistente`, `fkcliente`, `data`, `ora`) VALUES
(46, 45, 'Casc', '2021-05-30', '14:00:00'),
(52, 48, 'Casc', '2021-06-06', '11:00:00'),
(57, 45, 'Byluca', '2021-06-05', '15:00:00'),
(65, 49, 'Giups', '2021-05-29', '13:00:00'),
(66, 46, 'Giups', '2021-06-01', '20:30:00'),
(68, 49, 'Nussia', '2021-06-04', '15:00:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `assistenti`
--

CREATE TABLE `assistenti` (
  `nm` int(4) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `nascita` date NOT NULL,
  `fkiddisp` int(5) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `assistenti`
--

INSERT INTO `assistenti` (`nm`, `nome`, `cognome`, `cf`, `nascita`, `fkiddisp`, `password`) VALUES
(44, 'Mario', 'Rossi', 'CSCACAGFWEGW', '1990-05-18', 1, '64b462f44294870c6b20ea9e571bf3ed'),
(45, 'Michele', 'Cascione', 'CSCMHL4W3OHG', '2002-08-05', 2, '2bf3ceef83e2bcb504425d204c112282'),
(46, 'Gianluca', 'Lascaro', 'CSE743H4HJWEWSE', '2002-05-22', 3, '82f08d5bb6a85244e0e3c1951960b8c3'),
(47, 'Giuseppe', 'Magri', 'CJHIEL09L76B54SO', '2000-05-08', 4, '07f95b55e665b99c53bcd6dfc0be846d'),
(48, 'Maria', 'Bianchi', 'CJHIEL09L76B54SO', '2000-05-08', 5, '1dd8b063fcc8ba979a250c1468450e22'),
(49, 'Ciro', 'Esposito', 'CJHIEL09L76B54SO', '2000-05-08', 6, 'ad5f09bd107ec3eabcb2128afbfdd340');

-- --------------------------------------------------------

--
-- Struttura della tabella `clienti`
--

CREATE TABLE `clienti` (
  `username` varchar(20) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `cf` varchar(16) NOT NULL,
  `nascita` date NOT NULL,
  `OTPCode` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `clienti`
--

INSERT INTO `clienti` (`username`, `nome`, `cognome`, `password`, `email`, `telefono`, `cf`, `nascita`, `OTPCode`) VALUES
('Byluca', 'Gianluca', 'Lascaro', 'b87252eeecd37bdace23ac84faeb5565', 'byluca@gmail.com', '3849685456', 'CFHGJKLTO3764', '2002-06-22', 0),
('casc', 'Michele', 'Cascione', '1064fff0212c94aa11697d848fe8163e', 'mcascione02@gmail.com', '3881593805', 'CSCMHL02M05F052O', '2002-08-05', 837119),
('Femia', 'Eufemia', 'Dragonetti', 'bb55974e7981e5d718472d8edc9c601a', 'eufemiadragonetti2002@gmail.com', '3884569521', 'CJHMTDPEOLTGFH87', '2002-06-17', 813026),
('Giups', 'Giuseppe', 'Scocuzza', '89bd8ed494a35bc38478da6d8e7d435e', 'bainbadonde@gmail.com', '3446597213', 'CSRJTG743M389FN3', '2002-09-06', 0),
('Nussia', 'Nunzia', 'Centonze', '8e9c8a20a4bad9e665abf5e7c7695856', 'nussia@gmail.com', '3665214879', 'weiuybgwr78t74', '2003-01-03', 0),
('Palu', 'Daniele', 'Palumbo', '99f202356d5b32e0e023d2bc56c1fe15', 'fontanaemanuele14@gmail.com', '3446598712', 'KLJMNH02I87T65R4', '2002-11-13', 0),
('Robix', 'Roberto', 'Guerricchio', 'cad1b7a6bb3202c56f854b4c402f3c94', 'robyguerricchio@gmail.com', '3426122454', 'iuobgrew87943r4e', '2001-09-04', 707224);

-- --------------------------------------------------------

--
-- Struttura della tabella `dispositivi`
--

CREATE TABLE `dispositivi` (
  `iddisp` int(5) NOT NULL,
  `descrizione` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dispositivi`
--

INSERT INTO `dispositivi` (`iddisp`, `descrizione`) VALUES
(1, 'PC Fisso'),
(2, 'Cellulare'),
(3, 'Periferica'),
(4, 'Tablet'),
(5, 'Televisore'),
(6, 'Laptop');

-- --------------------------------------------------------

--
-- Struttura della tabella `magazzino`
--

CREATE TABLE `magazzino` (
  `ID` int(3) NOT NULL,
  `Descrizione` varchar(30) NOT NULL,
  `modello` varchar(50) NOT NULL,
  `prezzo` float NOT NULL,
  `fkiddisp` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `magazzino`
--

INSERT INTO `magazzino` (`ID`, `Descrizione`, `modello`, `prezzo`, `fkiddisp`) VALUES
(1, 'Cellulare (Nuovo)', 'Galaxy S9', 500, 2),
(2, 'Tablet (Nuovo)', 'Galaxy Tab 2', 299.99, 4),
(9, 'Cavo', 'HDMI 2.1', 15.99, 3),
(10, 'PC Fisso (Nuovo)', 'HP Omen 25', 499.99, 1),
(11, 'Mouse (Nuovo)', 'Logitech G302', 40, 3),
(13, 'Auricolari', 'Samsung Standard Earphones', 12.5, 3);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `appuntamenti`
--
ALTER TABLE `appuntamenti`
  ADD PRIMARY KEY (`num`),
  ADD KEY `fkmed` (`fkassistente`),
  ADD KEY `fkpaz` (`fkcliente`);

--
-- Indici per le tabelle `assistenti`
--
ALTER TABLE `assistenti`
  ADD PRIMARY KEY (`nm`),
  ADD KEY `fkcomune` (`fkiddisp`);

--
-- Indici per le tabelle `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`username`);

--
-- Indici per le tabelle `dispositivi`
--
ALTER TABLE `dispositivi`
  ADD PRIMARY KEY (`iddisp`);

--
-- Indici per le tabelle `magazzino`
--
ALTER TABLE `magazzino`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `assistenza_dispositivi` (`fkiddisp`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `appuntamenti`
--
ALTER TABLE `appuntamenti`
  MODIFY `num` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT per la tabella `assistenti`
--
ALTER TABLE `assistenti`
  MODIFY `nm` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  MODIFY `ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appuntamenti`
--
ALTER TABLE `appuntamenti`
  ADD CONSTRAINT `appuntamenti_ibfk_1` FOREIGN KEY (`fkassistente`) REFERENCES `assistenti` (`nm`),
  ADD CONSTRAINT `appuntamenti_ibfk_2` FOREIGN KEY (`fkcliente`) REFERENCES `clienti` (`username`);

--
-- Limiti per la tabella `assistenti`
--
ALTER TABLE `assistenti`
  ADD CONSTRAINT `assistenti_dispositivi` FOREIGN KEY (`fkiddisp`) REFERENCES `dispositivi` (`iddisp`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `magazzino`
--
ALTER TABLE `magazzino`
  ADD CONSTRAINT `assistenza_dispositivi` FOREIGN KEY (`fkiddisp`) REFERENCES `dispositivi` (`iddisp`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
