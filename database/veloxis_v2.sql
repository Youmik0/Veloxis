-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 14 Maj 2020, 14:01
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
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `kategoria`
--

INSERT INTO `kategoria` (`id`, `nazwa`) VALUES
(1, 'Dzieci i zabawki');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `oferty`
--

CREATE TABLE `oferty` (
  `id` int(11) NOT NULL,
  `nazwa_oferty` varchar(100) NOT NULL,
  `opis` varchar(100) DEFAULT NULL,
  `id_kategorii` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`id`, `nazwa_oferty`, `opis`, `id_kategorii`, `id_uzytkownika`) VALUES
(1, 'Kondomy', NULL, 1, 6);

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
(1, ' Skurwesyn123', 'Krzysztof', 'Konon', '123456789', 'fajnyemail@gmail.com', '2c73bdccfcb396e58ede6691fb9ca773', 3),
(2, ' Krzysiek666', 'Krzysztof', 'Hehesznik', '346267412', 'Krzysiekwalikonia@gmail.com', '7c58d5610b1c05a26c699c35c2774419', 3),
(4, 'PolskieZnaki', 'Andłomiej', 'Walikoń', '12223345', 'ahahahaha@gmail.com', '32ace19b6e0c3b633b922cc399e0a640', 3),
(5, 'HenioZbyszkowski', 'Hądrzej', 'Węgosz', '345436554', 'hahaha@gmail.com', '1ad8677a6c70d3066d89f74b7b607cd0', 3),
(6, 'Alexandroo', 'Alexander', 'Pięta', '56756732', 'alexwaleg@gmail.com', 'b7a71d8799cf6dd75b711a7f52de6675', 3),
(7, 'AhhhPolskosc', 'Polski', 'Polakę', '34643645', 'fajnoalemoglobybyclepiej@gmail.com', '4fe6091468059de0d63be8b3ce4c99ff', 3),
(8, 'MasywnyWeeb', 'Masywny', 'Weeb', '4564564576', 'NoLoliNoLife@gmail.com', '2a823424dc4dae65d36d8ddc7b6a27c4', 3),
(9, 'CzyAbyNapewnoDziala', 'MamNadzieje', 'ZeTakTak', '123765744', 'obyoby@gmail.com', '8823dab04caec5eb6d51164042cdf2c6', 3),
(10, 'ZwyklkyUz', 'Ahaha', 'Blehehe', '456457542', 'assblast@gmail.com', '2a823424dc4dae65d36d8ddc7b6a27c4', 3),
(11, 'Weeb666', 'Fajny', 'Jary', '34643642', 'Weeb666@gmail.com', 'a472d788aa233457dd764aa6c7ae4018', 3);

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
  ADD UNIQUE KEY `id_kategorii` (`id_kategorii`),
  ADD UNIQUE KEY `id_uzytkownika` (`id_uzytkownika`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `oferty`
--
ALTER TABLE `oferty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `oferty`
--
ALTER TABLE `oferty`
  ADD CONSTRAINT `oferty_ibfk_1` FOREIGN KEY (`id_kategorii`) REFERENCES `kategoria` (`id`),
  ADD CONSTRAINT `oferty_ibfk_2` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
