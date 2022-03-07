-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1
-- Timp de generare: ian. 26, 2021 la 10:42 PM
-- Versiune server: 10.4.17-MariaDB
-- Versiune PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `centrubiciclete3`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `admin`
--

CREATE TABLE `admin` (
  `ID` int(10) NOT NULL,
  `nume_admin` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `admin`
--

INSERT INTO `admin` (`ID`, `nume_admin`, `password`, `username`) VALUES
(1, 'Paula', 'mita', 'dia.paula'),
(15, 'Andronic', '1234', 'paula.andronic'),
(16, 'Mita', 'paula', 'mita'),
(17, 'Suji', 'ana', 'sujii'),
(18, 'ioana', 'suji', 'ioana_mac');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `angajati`
--

CREATE TABLE `angajati` (
  `CNP` char(13) NOT NULL,
  `Data_Angajarii` date DEFAULT NULL,
  `Data_Nasterii` date DEFAULT NULL,
  `ID_Angajat` int(10) NOT NULL,
  `Nume` varchar(100) NOT NULL,
  `Prenume` varchar(100) NOT NULL,
  `Strada` varchar(100) DEFAULT NULL,
  `Telefon` char(10) NOT NULL,
  `Sex` char(1) DEFAULT 'F',
  `Salariu` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `angajati`
--

INSERT INTO `angajati` (`CNP`, `Data_Angajarii`, `Data_Nasterii`, `ID_Angajat`, `Nume`, `Prenume`, `Strada`, `Telefon`, `Sex`, `Salariu`) VALUES
('2990625045370', '2020-10-01', '1999-06-25', 1, 'Andronic', 'Valentina', 'principala', '0743456790', 'F', '1200'),
('2990627045390', '2020-10-06', '1999-06-27', 2, 'Mengheris', 'Dana', 'independentei', '0743456720', 'F', '1400'),
('2990613045330', '2020-10-20', '1999-06-13', 3, 'Nicolae', 'Ana', NULL, '0743456711', 'F', '2400'),
('2990625045333', '2019-10-12', '1988-01-11', 4, 'Grigore ', 'Andreea', 'pajura', '0780123111', 'F', '2500');

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `bicicleta_defectiune`
--

CREATE TABLE `bicicleta_defectiune` (
  `ID` int(10) NOT NULL,
  `ID_Bicicleta` int(10) NOT NULL,
  `ID_Defectiune` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `bicicleta_defectiune`
--

INSERT INTO `bicicleta_defectiune` (`ID`, `ID_Bicicleta`, `ID_Defectiune`) VALUES
(1, 25, 3),
(2, 20, 2),
(3, 25, 4),
(4, 11, 2),
(5, 19, 1),
(6, 15, 7),
(10, 11, 4);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `biciclete`
--

CREATE TABLE `biciclete` (
  `ID_Bicicleta` int(10) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Culoare` varchar(50) NOT NULL,
  `Grosime_Roata` int(50) NOT NULL,
  `Categorie_Varsta` varchar(100) NOT NULL,
  `Data_Sosire_In_Centru` date NOT NULL DEFAULT current_timestamp(),
  `Pret_Ora` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `biciclete`
--

INSERT INTO `biciclete` (`ID_Bicicleta`, `Marca`, `Culoare`, `Grosime_Roata`, `Categorie_Varsta`, `Data_Sosire_In_Centru`, `Pret_Ora`) VALUES
(8, 'Alpinestars', 'alb', 10, '5-10', '2019-04-01', 20),
(10, 'DevronBp', 'rosu', 6, '>15', '2020-01-06', 20),
(11, 'Azonic', 'verde', 12, '10-15', '2019-06-04', 30),
(14, 'DevronParts', 'albastru', 10, '10-15', '2020-01-07', 35),
(15, 'Echowell', 'rosu', 10, '5-10', '2020-02-03', 40),
(19, 'Cerurim', 'galben', 4, '10-15', '2019-09-08', 20),
(20, 'MTB Rich', 'galben', 10, '3-5', '2020-11-09', 20),
(25, 'Avalanche Elite', 'rosu', 10, '> 15', '2020-10-05', 60),
(26, 'Alhonga', 'roz', 14, '3-5', '2020-08-03', 15),
(27, 'Cerurim', 'negru', 8, '>15', '2020-04-06', 40),
(28, ' Devron', 'verde', 10, '5-10', '2021-01-21', 30);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `clienti`
--

CREATE TABLE `clienti` (
  `CNP` char(13) NOT NULL,
  `ID_Client` int(10) NOT NULL,
  `Nume` varchar(50) NOT NULL,
  `Prenume` varchar(50) NOT NULL,
  `Telefon` char(10) NOT NULL,
  `Oras` varchar(50) NOT NULL,
  `Strada` varchar(50) DEFAULT NULL,
  `Feedback` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `clienti`
--

INSERT INTO `clienti` (`CNP`, `ID_Client`, `Nume`, `Prenume`, `Telefon`, `Oras`, `Strada`, `Feedback`) VALUES
('2990625045368', 2, 'Andronic', 'Paula', '0743456789', 'Bacau', 'Blaga', 3),
('1990625045369', 3, 'Nicolae', 'Mihai', '0780123499', 'Slatina', 'Principala', 3),
('1990625045390', 4, 'Capota', 'Andrei', '0780123444', 'Onesti', 'Crangasi', 4),
('2990625012345', 6, 'Vlase', 'Carla', '0741111111', '', 'Blaga', 3),
('1990517043245', 7, 'Burada', 'Alex', '0740121111', '', 'Caracalului', 3),
('1990517043222', 9, 'Mihai', 'Vlad', '0740123466', '', 'Nicolae Grigorescu ', 5),
('1990625045555', 12, 'Stanila', 'Andrei', '0780122222', 'Constanta', 'Teilor', 4),
('2990625012333', 13, 'Macovei', 'Andreea', '0740123444', '', 'Independentei', NULL);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `client_inchiriere`
--

CREATE TABLE `client_inchiriere` (
  `ID` int(10) NOT NULL,
  `ID_Bicicleta` int(10) NOT NULL,
  `ID_Inchiriere` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `client_inchiriere`
--

INSERT INTO `client_inchiriere` (`ID`, `ID_Bicicleta`, `ID_Inchiriere`) VALUES
(1, 19, 3),
(2, 10, 6),
(3, 25, 6),
(4, 20, 7),
(7, 19, 1),
(8, 19, 2),
(9, 19, 4),
(10, 11, 8),
(11, 11, 9),
(12, 11, 10),
(13, 27, 10),
(14, 28, 12),
(16, 26, 4),
(17, 10, 9),
(18, 15, 15),
(19, 14, 20),
(20, 14, 12),
(21, 15, 4),
(22, 8, 11),
(23, 11, 5),
(24, 15, 2);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `defectiuni`
--

CREATE TABLE `defectiuni` (
  `Data_Producerii_Def` date DEFAULT NULL,
  `Descriere_Def` varchar(500) NOT NULL,
  `ID_Def` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `defectiuni`
--

INSERT INTO `defectiuni` (`Data_Producerii_Def`, `Descriere_Def`, `ID_Def`) VALUES
('2020-09-01', 'pana', 1),
('2019-09-01', 'frane stricate', 2),
('2019-05-01', 'zgarieturi', 3),
('2019-09-09', 'lant deteriorat', 4),
('2019-02-01', 'pana roata din fata', 7);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `detalii_inchiriere`
--

CREATE TABLE `detalii_inchiriere` (
  `ID_Inchiriere` int(100) NOT NULL,
  `Data_Inchirierii` date DEFAULT NULL,
  `ID_Client` int(10) NOT NULL,
  `Suma_de_plata` decimal(4,0) DEFAULT NULL,
  `ID_Angajat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `detalii_inchiriere`
--

INSERT INTO `detalii_inchiriere` (`ID_Inchiriere`, `Data_Inchirierii`, `ID_Client`, `Suma_de_plata`, `ID_Angajat`) VALUES
(1, '2021-01-03', 2, '30', 1),
(2, '2021-01-10', 2, '50', 3),
(3, '2021-01-13', 2, '60', 2),
(4, '2020-12-01', 2, '70', 3),
(5, '2020-11-01', 4, '70', 2),
(6, '2021-01-22', 6, '45', 1),
(7, '2020-09-01', 3, '120', 1),
(8, '2020-07-14', 6, '95', 1),
(9, '2020-09-08', 6, '90', 3),
(10, '2020-10-21', 6, '80', 2),
(11, '2020-10-12', 4, '110', 2),
(12, '2020-07-06', 4, '90', 2),
(13, '2020-11-02', 7, '90', 1),
(14, '2020-06-15', 3, '30', 4),
(15, '2020-05-04', 12, '50', 1),
(17, '2019-11-04', 13, '80', 2),
(20, '2020-07-06', 9, '130', 3);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `furnizori`
--

CREATE TABLE `furnizori` (
  `ID_Furnizor` int(10) NOT NULL,
  `Data_Incepere_Contract` date DEFAULT NULL,
  `ID_Bicicleta` int(10) NOT NULL,
  `Nume_Firma` varchar(100) NOT NULL,
  `Telefon` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Eliminarea datelor din tabel `furnizori`
--

INSERT INTO `furnizori` (`ID_Furnizor`, `Data_Incepere_Contract`, `ID_Bicicleta`, `Nume_Firma`, `Telefon`) VALUES
(3, '2020-03-09', 25, 'Bike', '0780123444'),
(4, '2020-03-09', 20, 'Bike', '0780123444'),
(5, '2020-03-09', 8, 'Bike', '0780123444'),
(6, '2020-01-07', 26, 'Cube', '0743456799'),
(7, '2020-01-07', 27, 'Cube', '0743456799'),
(8, '2020-01-07', 19, 'Cube', '0743456799'),
(9, '2020-03-09', 14, 'Bike', '0780123444'),
(10, '2020-03-09', 28, 'Bike', '0780123444'),
(11, '2020-03-09', 15, 'Bike', '0780123444'),
(12, '2020-01-07', 10, 'Cube', '0743456799'),
(20, '2020-01-07', 11, 'Cube', '0743456799');

--
-- Indexuri pentru tabele eliminate
--

--
-- Indexuri pentru tabele `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indexuri pentru tabele `angajati`
--
ALTER TABLE `angajati`
  ADD PRIMARY KEY (`ID_Angajat`);

--
-- Indexuri pentru tabele `bicicleta_defectiune`
--
ALTER TABLE `bicicleta_defectiune`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Bicicleta` (`ID_Bicicleta`),
  ADD KEY `ID_Defectiune` (`ID_Defectiune`);

--
-- Indexuri pentru tabele `biciclete`
--
ALTER TABLE `biciclete`
  ADD PRIMARY KEY (`ID_Bicicleta`);

--
-- Indexuri pentru tabele `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`ID_Client`);

--
-- Indexuri pentru tabele `client_inchiriere`
--
ALTER TABLE `client_inchiriere`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_Bicicleta` (`ID_Bicicleta`),
  ADD KEY `ID_Inchiriere` (`ID_Inchiriere`);

--
-- Indexuri pentru tabele `defectiuni`
--
ALTER TABLE `defectiuni`
  ADD PRIMARY KEY (`ID_Def`);

--
-- Indexuri pentru tabele `detalii_inchiriere`
--
ALTER TABLE `detalii_inchiriere`
  ADD PRIMARY KEY (`ID_Inchiriere`),
  ADD KEY `ID_Client` (`ID_Client`),
  ADD KEY `ID_Angajat` (`ID_Angajat`);

--
-- Indexuri pentru tabele `furnizori`
--
ALTER TABLE `furnizori`
  ADD PRIMARY KEY (`ID_Furnizor`),
  ADD KEY `ID_Bicicleta` (`ID_Bicicleta`);

--
-- AUTO_INCREMENT pentru tabele eliminate
--

--
-- AUTO_INCREMENT pentru tabele `admin`
--
ALTER TABLE `admin`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT pentru tabele `angajati`
--
ALTER TABLE `angajati`
  MODIFY `ID_Angajat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pentru tabele `bicicleta_defectiune`
--
ALTER TABLE `bicicleta_defectiune`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pentru tabele `biciclete`
--
ALTER TABLE `biciclete`
  MODIFY `ID_Bicicleta` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT pentru tabele `clienti`
--
ALTER TABLE `clienti`
  MODIFY `ID_Client` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pentru tabele `client_inchiriere`
--
ALTER TABLE `client_inchiriere`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT pentru tabele `defectiuni`
--
ALTER TABLE `defectiuni`
  MODIFY `ID_Def` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pentru tabele `detalii_inchiriere`
--
ALTER TABLE `detalii_inchiriere`
  MODIFY `ID_Inchiriere` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pentru tabele `furnizori`
--
ALTER TABLE `furnizori`
  MODIFY `ID_Furnizor` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `bicicleta_defectiune`
--
ALTER TABLE `bicicleta_defectiune`
  ADD CONSTRAINT `bicicleta_defectiune_ibfk_1` FOREIGN KEY (`ID_Bicicleta`) REFERENCES `biciclete` (`ID_Bicicleta`),
  ADD CONSTRAINT `bicicleta_defectiune_ibfk_2` FOREIGN KEY (`ID_Defectiune`) REFERENCES `defectiuni` (`ID_Def`);

--
-- Constrângeri pentru tabele `client_inchiriere`
--
ALTER TABLE `client_inchiriere`
  ADD CONSTRAINT `client_inchiriere_ibfk_1` FOREIGN KEY (`ID_Bicicleta`) REFERENCES `biciclete` (`ID_Bicicleta`),
  ADD CONSTRAINT `client_inchiriere_ibfk_2` FOREIGN KEY (`ID_Inchiriere`) REFERENCES `detalii_inchiriere` (`ID_Inchiriere`);

--
-- Constrângeri pentru tabele `detalii_inchiriere`
--
ALTER TABLE `detalii_inchiriere`
  ADD CONSTRAINT `detalii_inchiriere_ibfk_1` FOREIGN KEY (`ID_Client`) REFERENCES `clienti` (`ID_Client`),
  ADD CONSTRAINT `detalii_inchiriere_ibfk_2` FOREIGN KEY (`ID_Angajat`) REFERENCES `angajati` (`ID_Angajat`);

--
-- Constrângeri pentru tabele `furnizori`
--
ALTER TABLE `furnizori`
  ADD CONSTRAINT `furnizori_ibfk_1` FOREIGN KEY (`ID_Bicicleta`) REFERENCES `biciclete` (`ID_Bicicleta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
