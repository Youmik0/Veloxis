-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 29 Maj 2020, 20:05
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
  `opis` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `cena` decimal(11,2) NOT NULL,
  `id_kategorii` int(11) DEFAULT NULL,
  `marka` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `stan` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `premium` int(11) NOT NULL DEFAULT 0,
  `id_zdjecia` int(11) DEFAULT NULL,
  `nazwa_zdjecia` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`id`, `nazwa_oferty`, `opis`, `cena`, `id_kategorii`, `marka`, `stan`, `id_uzytkownika`, `premium`, `id_zdjecia`, `nazwa_zdjecia`) VALUES
(1, 'Oferta', 'OwO', '234.00', 4, 'Xander', 'Nowy z defektem', 1, 0, 1, '57761-indeks.jpg'),
(2, 'Oferta 2', 'aww', '123.00', 3, 'Moje', 'Do renowacji', 1, 0, 2, '30129-Azusa.bmp'),
(4, 'Sprzedam Dupe', 'OwO', '200.00', 4, 'Moje', 'Do renowacji', 4, 1, 4, '17171-albedo.bmp'),
(5, 'Allah', 'ass', '1111.00', 1, 'Xander', 'Nowy z defektem', 4, 1, 5, '12784-avnPwDW_700b.jpg'),
(7, 'Hans 1 - Bez premium', 'Hans', '123.00', 4, 'Xander', 'Regenerowany', 5, 1, 7, '49555-EDU7IzvUEAUPagh (1).jpg'),
(8, 'Hans 2 - Bez premium', 'OwO', '666.00', 5, 'Awand', 'Uszkodzony', 5, 1, 8, '5548-aRUZ7s7kra-E4m8kuu_PMT8rOlAHJIMGpZpTmK7fOwk.jpg'),
(9, 'Hans 3 - premium', 'OwO', '222.00', 5, 'Ass', 'Nowy bez metki', 5, 1, 9, '53022-Konachan.com - 217288 aka_tonbo_(lovetow) cropped deep-sea_girl_(vocaloid) hatsune_miku long_hair vocaloid.jpg'),
(13, 'Oferta', 'OwO', '234.00', 2, 'Ass', 'Nie pełny komplet', 1, 0, 13, 'puste.jpg');

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
(1, '57761-indeks.jpg', 1),
(9, '30129-Azusa.bmp', 2),
(10, 'puste.jpg', 2),
(13, '', 1),
(14, '', 1),
(15, '', 1),
(16, '35047-2616673.jpg.png', 1),
(17, '84310-IMG.jpg', 2),
(19, '67150-c6d88019860a420ca8fd0a2fb9c7fa64.jpg', 2),
(20, '76569-703fc31885e53b5a34e8ca1908012499.jpg', 1),
(21, '56758-703fc31885e53b5a34e8ca1908012499.jpg', 1),
(22, '23552-APAiRJm.png', 1),
(23, '69424-APAiRJm.png', 1),
(24, '4549-APAiRJm.png', 1),
(25, '48605-IMG.jpg', 1),
(26, '76750-IMG.jpg', 1),
(27, '47078-IMG.jpg', 1),
(28, '97178-IMG.jpg', 1),
(29, '79974-IMG.jpg', 1),
(30, '2890-IMG.jpg', 1),
(31, '66566-IMG.jpg', 1),
(32, '17790-albedo.bmp', 2),
(33, '17171-albedo.bmp', 4),
(34, '12784-avnPwDW_700b.jpg', 5),
(36, '49555-EDU7IzvUEAUPagh (1).jpg', 7),
(37, '5548-aRUZ7s7kra-E4m8kuu_PMT8rOlAHJIMGpZpTmK7fOwk.jpg', 8),
(38, '53022-Konachan.com - 217288 aka_tonbo_(lovetow) cropped deep-sea_girl_(vocaloid) hatsune_miku long_hair vocaloid.jpg', 9),
(40, '27578-IMG.jpg', 1),
(41, '56138-pxqj.jpg', 1),
(42, '48461-Paz_Vert.jpg', 2),
(44, '29256-1477.bmp', 1),
(45, '65670-364582.jpg', 11),
(46, '90397-Azusa.bmp', 12),
(47, '25723-Paz_Vert.jpg', 11),
(48, '25885-Paz_Vert.jpg', 11),
(49, '40186-1477.bmp', 1),
(50, 'puste.jpg', 13);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `premium`
--

CREATE TABLE `premium` (
  `id` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `premium_do` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `premium`
--

INSERT INTO `premium` (`id`, `id_uzytkownika`, `premium_do`) VALUES
(1, 1, '2022-10-20 15:07:32'),
(4, 4, '2020-06-26 16:10:24'),
(5, 5, '2020-06-26 19:32:26');

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
(1, '52827-364582.jpg', 1);

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
-- Struktura tabeli dla tabeli `transakcje`
--

CREATE TABLE `transakcje` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `sprzedawca` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `dostawa` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `cena_dostawy` int(11) NOT NULL,
  `cena_koncowa` int(11) NOT NULL,
  `kupujacy` varchar(50) COLLATE utf8_polish_ci NOT NULL,
  `nr_bankowy_k` int(11) NOT NULL,
  `id_oferty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transakcje`
--

INSERT INTO `transakcje` (`id`, `nazwa`, `cena`, `sprzedawca`, `dostawa`, `cena_dostawy`, `cena_koncowa`, `kupujacy`, `nr_bankowy_k`, `id_oferty`) VALUES
(1, 'Allah', 1111, 'Awa', 'Odbiór w punkcie za pobraniem', 12, 1123, 'Weeb', 666, 5);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(19) COLLATE utf8_polish_ci NOT NULL,
  `imie` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `telefon` varchar(15) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `typ_konta` int(11) NOT NULL DEFAULT 3,
  `id_premium` int(11) DEFAULT NULL,
  `miasto` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `ulica` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `nr_zamieszkania` varchar(50) COLLATE utf8_polish_ci DEFAULT NULL,
  `nr_bankowy` int(27) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nazwa_uzytkownika`, `imie`, `nazwisko`, `telefon`, `email`, `haslo`, `typ_konta`, `id_premium`, `miasto`, `ulica`, `nr_zamieszkania`, `nr_bankowy`) VALUES
(1, 'Weeb', 'Weeb', 'Weeb', '666789123', 'Weeb@gmail.com', 'a472d788aa233457dd764aa6c7ae4018', 1, 1, NULL, NULL, NULL, 0),
(2, 'Test', 'Test', 'Test', '234324324', 'Test@gmail.com', '0cbc6611f5540bd0809a388dc95a615b', 3, NULL, NULL, NULL, NULL, 0),
(3, 'Nowy', 'Nowy', 'Nowy', '54654642', 'nowy@gmail.com', '202025f4f6b40ab1e3df52dee62b998e', 3, NULL, NULL, NULL, NULL, 0),
(4, 'Awa', 'Awa', 'Awa', '12343523', 'Awa@gmail.com', 'aa00ce8b38d75c80bcaae1b8c33a89ab', 2, 4, NULL, NULL, NULL, 0),
(5, 'Hans', 'Hans', 'Wans', '666420123', 'Hans@gmail.com', 'eb56002f1c0a8f9ab1b2aa2d08a1c502', 2, 5, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zgloszenia`
--

CREATE TABLE `zgloszenia` (
  `id` int(11) NOT NULL,
  `opis` varchar(1000) COLLATE utf8_polish_ci DEFAULT NULL,
  `nazwa_oferty` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `id_oferty` int(11) NOT NULL,
  `id_zgloszonego` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zgloszenia`
--

INSERT INTO `zgloszenia` (`id`, `opis`, `nazwa_oferty`, `id_oferty`, `id_zgloszonego`) VALUES
(1, '', 'Sprzedam Dupe', 4, 4),
(2, 'awww', 'Allah', 5, 4),
(3, 'drtxyrdytdryxrdytfrdtytfcygtf', 'Hans 1 - Bez premium', 7, 5);

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
  ADD KEY `id_oferty` (`id_oferty`) USING BTREE;

--
-- Indeksy dla tabeli `premium`
--
ALTER TABLE `premium`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_uzytkownika` (`id_uzytkownika`) USING BTREE;

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
-- Indeksy dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sprzedawca` (`sprzedawca`),
  ADD KEY `kupujacy` (`kupujacy`),
  ADD KEY `id_oferty` (`id_oferty`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_premium` (`id_premium`),
  ADD KEY `nazwa_uzytkownika` (`nazwa_uzytkownika`);

--
-- Indeksy dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_oferty` (`id_oferty`),
  ADD KEY `id_zgloszonego` (`id_zgloszonego`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT dla tabeli `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
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
  ADD CONSTRAINT `oferty_ibfk_4` FOREIGN KEY (`stan`) REFERENCES `stan` (`nazwa`);

--
-- Ograniczenia dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  ADD CONSTRAINT `oferty_zdj_ibfk_1` FOREIGN KEY (`id_oferty`) REFERENCES `oferty` (`id`) ON DELETE CASCADE;

--
-- Ograniczenia dla tabeli `premium`
--
ALTER TABLE `premium`
  ADD CONSTRAINT `premium_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  ADD CONSTRAINT `profilowe_ibfk_1` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`);

--
-- Ograniczenia dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  ADD CONSTRAINT `transakcje_ibfk_1` FOREIGN KEY (`id_oferty`) REFERENCES `oferty` (`id`),
  ADD CONSTRAINT `transakcje_ibfk_2` FOREIGN KEY (`kupujacy`) REFERENCES `users` (`nazwa_uzytkownika`),
  ADD CONSTRAINT `transakcje_ibfk_3` FOREIGN KEY (`sprzedawca`) REFERENCES `users` (`nazwa_uzytkownika`);

--
-- Ograniczenia dla tabeli `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_premium`) REFERENCES `premium` (`id`);

--
-- Ograniczenia dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  ADD CONSTRAINT `zgloszenia_ibfk_1` FOREIGN KEY (`id_oferty`) REFERENCES `oferty` (`id`),
  ADD CONSTRAINT `zgloszenia_ibfk_2` FOREIGN KEY (`id_zgloszonego`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
