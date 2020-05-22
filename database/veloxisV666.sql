-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 22 Maj 2020, 11:28
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `veloxis`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kategoria`
--

CREATE TABLE `kategoria` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`) VALUES
(1, 'Elektronika'),
(2, 'Moda'),
(3, 'Dom i ogród'),
(4, 'Kultura i rozrywka'),
(5, 'Motoryzacja');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty`
--

CREATE TABLE `oferty` (
  `id` int(11) NOT NULL,
  `nazwa_oferty` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(100) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` decimal(11,2) NOT NULL,
  `id_kategorii` int(11) DEFAULT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_zdjecia` int(11) DEFAULT NULL,
  `nazwa_zdjecia` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`id`, `nazwa_oferty`, `opis`, `cena`, `id_kategorii`, `id_uzytkownika`, `id_zdjecia`, `nazwa_zdjecia`) VALUES
(1, 'OwO bez zdj', '', '234.00', 1, 1, 1, 'puste.jpg'),
(2, 'OwO 2', 'Ahaha', '234.00', 2, 1, 2, '20111-1276655-bigthumbnail.jpg'),
(3, 'OwO 3', 'ass', '678.00', 2, 1, 3, '67693-Azusa.bmp'),
(4, 'OwO 4', 'Ahaha', '666.00', 5, 1, 4, '62424-364582.jpg'),
(5, 'OwO 22', 'OwO', '666.00', 2, 1, 5, '98491-1276655-bigthumbnail.jpg'),
(6, 'OwO 233', 'OwO', '666.00', 2, 1, 6, '69242-1477.bmp');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty_zdj`
--

CREATE TABLE `oferty_zdj` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `id_oferty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `oferty_zdj`
--

INSERT INTO `oferty_zdj` (`id`, `nazwa`, `id_oferty`) VALUES
(1, 'puste.jpg', 1),
(2, '20111-1276655-bigthumbnail.jpg', 2),
(3, '67693-Azusa.bmp', 3),
(4, '62424-364582.jpg', 4),
(5, '98491-1276655-bigthumbnail.jpg', 5),
(6, '69242-1477.bmp', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `profilowe`
--

CREATE TABLE `profilowe` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(200) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `profilowe`
--

INSERT INTO `profilowe` (`id`, `nazwa`, `id_uzytkownika`) VALUES
(1, 'puste.jpg', 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `typ_konta` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nazwa_uzytkownika`, `imie`, `nazwisko`, `telefon`, `email`, `haslo`, `typ_konta`) VALUES
(1, 'Weeb', 'Weeb', 'Weeb', '666789123', 'Weeb@gmail.com', 'a472d788aa233457dd764aa6c7ae4018', 3),
(2, 'Test', 'Test', 'Test', '234324324', 'Test@gmail.com', '0cbc6611f5540bd0809a388dc95a615b', 3),
(3, 'Nowy', 'Nowy', 'Nowy', '54654642', 'nowy@gmail.com', '202025f4f6b40ab1e3df52dee62b998e', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `oferty`
--
ALTER TABLE `oferty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_zdjecia` (`id_zdjecia`),
  ADD KEY `id_kategorii` (`id_kategorii`) USING BTREE,
  ADD KEY `id_uzytkownika` (`id_uzytkownika`) USING BTREE,
  ADD KEY `id_zdjecia_2` (`id_zdjecia`);

--
-- Indeksy dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_oferty` (`id_oferty`);

--
-- Indeksy dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_uzytkownika_2` (`id_uzytkownika`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `kategoria`
--
ALTER TABLE `kategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `oferty`
--
ALTER TABLE `oferty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `oferty`
--
ALTER TABLE `oferty`
  ADD CONSTRAINT `oferty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `oferty_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `oferty_ibfk_3` FOREIGN KEY (`id_zdjecia`) REFERENCES `oferty_zdj` (`id`);

--
-- Ograniczenia dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  ADD CONSTRAINT `oferty_zdj_ibfk_1` FOREIGN KEY (`id_oferty`) REFERENCES `oferty` (`id`);

--
-- Ograniczenia dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  ADD CONSTRAINT `profilowe_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
