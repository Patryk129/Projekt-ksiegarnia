-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 01 Cze 2024, 00:53
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `ksiegarnia`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `autor`
--

CREATE TABLE `autor` (
  `id_autora` int(11) NOT NULL,
  `imie` varchar(30) DEFAULT NULL,
  `nazwisko` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `autor`
--

INSERT INTO `autor` (`id_autora`, `imie`, `nazwisko`) VALUES
(1, 'Adam', 'Mickiewicz'),
(2, 'Henryk', 'Sienkiewicz'),
(3, 'Juliusz', 'Słowacki'),
(4, 'Wiliam', 'Shakespeare'),
(5, 'Sofokles', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klient`
--

CREATE TABLE `klient` (
  `Id_klienta` int(11) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `Imie` varchar(15) NOT NULL,
  `haslo` varchar(50) NOT NULL,
  `Miejscowosc` varchar(20) NOT NULL,
  `Ulica` varchar(15) NOT NULL,
  `Nr_domu` text NOT NULL,
  `Telefon` int(11) NOT NULL,
  `AdresEmail` text NOT NULL,
  `admin` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `klient`
--

INSERT INTO `klient` (`Id_klienta`, `Nazwisko`, `Imie`, `haslo`, `Miejscowosc`, `Ulica`, `Nr_domu`, `Telefon`, `AdresEmail`, `admin`) VALUES
(1, 'ADMIN', 'ADMIN', '1234', '-', '-', '-', 0, 'ADMIN', 1),
(2, 'Kicior', 'Marek', 'marek123', 'Tarnów', 'Lwowska', '12', 215121215, 'marek@poczta.pl', NULL),
(5, 'Nosalski', 'Egon', 'egg376', 'Robaki', 'Kornika', '56', 542121212, 'kornik1@nowy.com', NULL),
(6, 'Żabka', 'Kacper', 'kacper123', 'Londonek', 'Korce', '325/12', 741741741, 'Korce@dkdal.com', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ksiazki`
--

CREATE TABLE `ksiazki` (
  `id_ksiazki` int(11) NOT NULL,
  `tytul` varchar(50) DEFAULT NULL,
  `id_autora` int(11) NOT NULL,
  `cena` decimal(10,0) DEFAULT NULL,
  `Ilosc` int(11) NOT NULL,
  `opis` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `ksiazki`
--

INSERT INTO `ksiazki` (`id_ksiazki`, `tytul`, `id_autora`, `cena`, `Ilosc`, `opis`) VALUES
(1, 'Potop', 2, '30', 50, 'http://localhost/ksiegarnia/images/potop.jpg'),
(2, 'Ogniem i mieczem', 2, '25', 20, 'http://localhost/ksiegarnia/images/ogniemimieczem.jpg'),
(4, 'Pan Tadeusz', 1, '30', 10, 'http://localhost/ksiegarnia/images/pantadeusz.jpg'),
(10, 'Kordian', 3, '28', 28, 'http://localhost/ksiegarnia/images/kordian.jpg'),
(13, 'Dziady', 1, '15', 45, 'http://localhost/ksiegarnia/images/dziady.jpg'),
(14, 'Romeo i Julia', 4, '20', 5, 'http://localhost/ksiegarnia/images/romeoijulia.jpg'),
(16, 'Antygona', 5, '15', 30, 'http://localhost/ksiegarnia/images/antygona.jpg');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowieniee`
--

CREATE TABLE `zamowieniee` (
  `id_zamowienia` int(11) NOT NULL,
  `id_klienta` int(11) NOT NULL,
  `oplacone` tinyint(1) DEFAULT NULL,
  `data_zlozenia_zamowienia` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `zamowieniee`
--

INSERT INTO `zamowieniee` (`id_zamowienia`, `id_klienta`, `oplacone`, `data_zlozenia_zamowienia`) VALUES
(29, 1, 1, '2024-05-31 22:00:00'),
(35, 1, 1, '2024-05-31 22:00:00'),
(36, 1, 1, '2024-05-31 22:00:00'),
(37, 1, 1, '2024-05-31 22:00:00'),
(45, 1, 1, '2024-05-31 22:00:00'),
(46, 1, 1, '2024-05-31 22:00:00'),
(47, 1, 1, '2024-05-31 22:00:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zamowione_produkty`
--

CREATE TABLE `zamowione_produkty` (
  `id_zamowionego_produktu` int(11) NOT NULL,
  `id_zamowienia` int(11) DEFAULT NULL,
  `id_produktu` int(11) DEFAULT NULL,
  `liczba_egz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `zamowione_produkty`
--

INSERT INTO `zamowione_produkty` (`id_zamowionego_produktu`, `id_zamowienia`, `id_produktu`, `liczba_egz`) VALUES
(33, 35, 4, 2),
(34, 36, 10, 3),
(35, 37, 2, 3),
(43, 45, 10, 1),
(44, 46, 10, 1),
(45, 47, 10, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indeksy dla tabeli `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`Id_klienta`);

--
-- Indeksy dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD PRIMARY KEY (`id_ksiazki`),
  ADD KEY `k_a_fk` (`id_autora`);

--
-- Indeksy dla tabeli `zamowieniee`
--
ALTER TABLE `zamowieniee`
  ADD PRIMARY KEY (`id_zamowienia`),
  ADD KEY `id_klienta` (`id_klienta`);

--
-- Indeksy dla tabeli `zamowione_produkty`
--
ALTER TABLE `zamowione_produkty`
  ADD PRIMARY KEY (`id_zamowionego_produktu`),
  ADD UNIQUE KEY `zamowione_produkty_ibfk_1` (`id_zamowienia`) USING BTREE,
  ADD KEY `zamowione_produkty_ibfk_2` (`id_produktu`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `klient`
--
ALTER TABLE `klient`
  MODIFY `Id_klienta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  MODIFY `id_ksiazki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT dla tabeli `zamowieniee`
--
ALTER TABLE `zamowieniee`
  MODIFY `id_zamowienia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT dla tabeli `zamowione_produkty`
--
ALTER TABLE `zamowione_produkty`
  MODIFY `id_zamowionego_produktu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `ksiazki`
--
ALTER TABLE `ksiazki`
  ADD CONSTRAINT `ksiazki_ibfk_1` FOREIGN KEY (`id_autora`) REFERENCES `autor` (`id_autora`);

--
-- Ograniczenia dla tabeli `zamowieniee`
--
ALTER TABLE `zamowieniee`
  ADD CONSTRAINT `zamowieniee_ibfk_1` FOREIGN KEY (`id_klienta`) REFERENCES `klient` (`Id_klienta`);

--
-- Ograniczenia dla tabeli `zamowione_produkty`
--
ALTER TABLE `zamowione_produkty`
  ADD CONSTRAINT `zamowione_produkty_ibfk_1` FOREIGN KEY (`id_zamowienia`) REFERENCES `zamowieniee` (`id_zamowienia`) ON DELETE CASCADE,
  ADD CONSTRAINT `zamowione_produkty_ibfk_2` FOREIGN KEY (`id_produktu`) REFERENCES `ksiazki` (`id_ksiazki`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
