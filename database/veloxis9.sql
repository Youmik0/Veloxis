-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 27 Maj 2020, 02:31
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
(5, 'Motoryzacja'),
(6, 'Zdrowie');

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
  `marka` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `stan` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `id_zdjecia` int(11) DEFAULT NULL,
  `nazwa_zdjecia` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty_zdj`
--

CREATE TABLE `oferty_zdj` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_polish_ci NOT NULL,
  `id_oferty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Struktura tabeli dla tabeli `stan`
--

CREATE TABLE `stan` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(250) CHARACTER SET utf8 COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `stan`
--

INSERT INTO `stan` (`id`, `nazwa`, `opis`) VALUES
(1, 'Nowy', 'produkt nieużywany, pełnowartościowy, całkowicie sprawny, fabrycznie zapakowany'),
(2, 'Używany', 'produkt może nosić ślady użytkowania, może być bez opakowania'),
(3, 'Nowy bez metki', 'produkt nieużywany, pełnowartościowy, bez uszkodzeń, bez metki'),
(4, 'Nowy z defektem', 'produkt nieużywany, ma wadę, która nie wpływa na jego użytkowanie, np. przebarwienie na bluzce, rysa na bransolecie zegarka'),
(5, 'Uszkodzony', 'produkt z wadą, która wpływa na jego działanie lub całkowicie uniemożliwia użytkowanie produktu, np. interaktywny chodzik z niedziałającą wibracją, telefon z pękniętą szybką, wiertarka z niedziałającą regulacją obrotów'),
(6, 'Regenerowany', 'produkt używany, poddany regeneracji przez specjalistyczny serwis, dzięki czemu przywrócone zostały wymagane parametry i właściwości niezbędne do dalszej pracy, np. regenerowana skrzynia biegów'),
(7, 'Do renowacji', 'przedmiot wymaga odnowienia lub naprawy'),
(8, 'Nie pełny komplet', 'produkt, który nie ma wszystkich elementów wchodzących w skład oryginalnego zestawu, np. 243 klocki z 245-elementowego zestawu'),
(9, 'Powystawowy', 'produkt z wystawy, może nosić ślady użycia, bez uszkodzeń wpływających na jego działanie, np. sofa z wystawy sklepowej, lodówka z ekspozycji');

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
  ADD KEY `id_zdjecia_2` (`id_zdjecia`),
  ADD KEY `stan` (`stan`);

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
-- Indeksy dla tabeli `stan`
--
ALTER TABLE `stan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nazwa` (`nazwa`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `oferty`
--
ALTER TABLE `oferty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `stan`
--
ALTER TABLE `stan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  ADD CONSTRAINT `oferty_ibfk_3` FOREIGN KEY (`id_zdjecia`) REFERENCES `oferty_zdj` (`id`),
  ADD CONSTRAINT `oferty_ibfk_4` FOREIGN KEY (`stan`) REFERENCES `stan` (`nazwa`);

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
