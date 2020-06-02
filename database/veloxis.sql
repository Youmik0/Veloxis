-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 02 Cze 2020, 22:16
-- Wersja serwera: 10.4.11-MariaDB
-- Wersja PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
  `nazwa_zdjecia` varchar(200) COLLATE utf8_polish_ci DEFAULT NULL,
  `aktywna` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `oferty`
--

INSERT INTO `oferty` (`id`, `nazwa_oferty`, `opis`, `cena`, `id_kategorii`, `marka`, `stan`, `id_uzytkownika`, `premium`, `id_zdjecia`, `nazwa_zdjecia`, `aktywna`) VALUES
(1, 'Drewniana altanka ogrodowa', 'Wymiary 3x4x3 metry, szare nielaminowane drewno', '3500.00', 3, 'brak', 'Używany', 1, 0, 1, '51219-Altana-3x4-altanka-ogrodowa-drewniana-PRODUCENT.jpg', 1),
(2, 'Silnik samochodowy V8 do Pontiac GTO', 'Przebieg ok. 400 tys. km', '5000.00', 5, 'Pontiac', 'Używany', 1, 0, 2, '2560-silnik-60-v8-ls2-corvette-pontiac-gto-kompresor-rok-produkcji-2006-opolskie-sprzedam-310854672.jpg', 1),
(4, 'Paskowana bluzka z krótkim rękawem', 'Rozmiar M, nienoszona od czasu pierwotnego zakupu.', '20.00', 2, 'brak', 'Nowy', 3, 1, 4, '20033-522-5dac5d37a70c0ad552a75c282719a5105d8529c0466659-96474763.jpg', 1),
(5, 'Statek w butelce', 'Własnoręcznie wykonany model żaglowca.', '25.00', 4, 'brak', 'Nowy', 3, 1, 5, '94998-5537735301a5dbship_in_bottle3.jpg', 1),
(6, 'Wiszący kulisty żyrandol', 'Żyrandol z trzema kulami do oświetlenia średnich pomieszczeń. Możliwość regulacji oświetlenia.', '600.00', 1, 'VARUS', 'Używany', 4, 1, 6, '15232-lampa-wiszaca-zyrandol-varus-15851-3-globo-chrom-satynowy-metal.jpg', 1),
(7, 'Automat Flipper', 'Używany automat w dobrym stanie, nie wymaga monet do gry', '6000.00', 4, 'Road King', 'Używany', 2, 0, 7, '89454-b96c087a4dbf823f48741aee6fba.jpg', 1),
(8, 'Mleczko oczyszczające', 'Mleczko oczyszczające skórę o zapachu miodu.', '40.00', 6, 'Origins', 'Nowy', 1, 0, 8, '14253-ml.png', 1),
(9, 'Maseczka oczyszczająca na noc', 'Działa przeciw plamom i zaciemnieniom.', '50.00', 6, 'Origins', 'Nowy', 1, 0, 9, '15937-ms.PNG', 1),
(10, 'Drzewo juka', 'Pasuje do ogrodów z dużym metrażem.', '100.00', 3, 'brak', 'Nowy', 1, 0, 10, '23651-41SfyOPYvxL._AC_.jpg', 1),
(11, 'Mleczko kokosowe', 'Dobra przyprawa w kuchni azjatyckiej', '20.00', 6, 'Smaki Świata', 'Nowy', 1, 0, 11, '38934-Mleczko-kokosowe-Smaki-Swiata.jpg', 1),
(12, 'Mleczko migdałowe', 'Dobra przyprawa w kuchni azjatyckiej.', '16.00', 6, 'Sante', 'Nowy', 1, 0, 12, '54421-500_500_productGfx_b8953f57ee0ccca9ec8c3f8b0bfa272b.jpg', 1),
(13, 'Mleczko sojowe', 'Dobry zamiennik w razie nietolerancji laktozy', '20.00', 6, 'Alpro', 'Nowy', 1, 0, 13, '37535-ae3d5aea4e6c9312fcdeb937095c.jpg', 1),
(14, 'Soczewica czerwona', 'Baza do zup.', '7.00', 6, 'KTC', 'Nowy', 2, 0, 14, '15003-703_2.jpg', 1),
(15, 'Soczewica zielona', 'Baza do zup.', '6.00', 6, 'Sante', 'Nowy', 2, 0, 15, '97878-500_500_productGfx_e52cc2105d7549cbc57230660c99f9fb.jpg', 1),
(16, 'Soczewica biała', 'Baza do zup.', '8.00', 6, 'KTC', 'Nowy', 2, 0, 16, '93863-soczewica-biala-urid-dal-500g-ktc.jpg', 1),
(17, 'Soczewica brązowa', 'Baza do zup.', '9.00', 6, 'Symbio', 'Nowy', 2, 0, 17, '45208-symbio-soczewica-brazowa-ekologiczna-340-g-nk4ovm.jpg', 1),
(18, 'Soczewica czarna', 'Baza do zup.', '9.00', 6, 'Symbio', 'Nowy', 2, 0, 18, '11900-cz.jpg', 1),
(19, 'Czarnuszka', 'Pikantna przyprawa', '2.00', 6, 'Kotanyi', 'Nowy', 2, 0, 19, '91718-10152527855646.jpg', 1),
(20, 'Kmin rzymski', 'Pikantna przyprawa', '3.00', 6, 'Prymat', 'Nowy', 2, 0, 20, '61331-prymat-kmin-rzymski-mielony-1.jpg', 1),
(21, 'Bazylia', 'Ziołowa przyprawa', '2.00', 6, 'Prymat', 'Nowy', 3, 1, 21, '25908-prymat-bazylia-suszona-1.jpg', 1),
(22, 'Oregano', 'Ziołowa przyprawa', '2.00', 6, 'Prymat', 'Nowy', 3, 1, 22, '32684-ore.jpg', 1),
(23, 'Estragon', 'Ziołowa przyprawa', '2.00', 6, 'Prymat', 'Nowy', 3, 1, 23, '38348-estr.jpg', 1),
(24, 'Tymianek', 'Ziołowa przyprawa', '2.00', 6, 'Prymat', 'Nowy', 3, 1, 24, '7613-tym.jpg', 1),
(25, 'Pociąg zabawka', 'Pojedyncza lokomotywa', '4.00', 4, 'Wader', 'Używany', 4, 1, 25, '46061-poc.jpg', 1),
(26, 'Koparka zabawka', 'Idealna dla małych dzieci', '5.00', 4, 'Wader', 'Używany', 4, 1, 26, '73469-kop.jpg', 1),
(27, 'Wywrotka zabawka', 'Idealna dla małych dzieci', '30.00', 4, 'Wader', 'Używany', 4, 1, 27, '10764-wyw.jpg', 1),
(28, 'Betoniarka zabawka', 'Idealna dla małych dzieci', '60.00', 4, 'Wader', 'Używany', 4, 1, 28, '64458-bet.jpg', 1),
(29, 'Wysięgnik zabawka', 'Idealna dla małych dzieci', '67.00', 4, 'Wader', 'Używany', 4, 1, 29, '80120-wys.jpg', 1),
(30, 'Wóz z drabiną zabawka', 'Idealna dla małych dzieci', '35.00', 4, 'Wader', 'Używany', 4, 1, 30, '41270-dra.PNG', 1),
(31, 'Wóz strażacki zabawka', 'Idealna dla małych dzieci', '55.00', 4, 'Wader', 'Używany', 4, 1, 31, '78832-str.PNG', 1),
(32, 'Mikrofon USB', 'Przeznaczony do nagrywania', '200.00', 1, 'Maono', 'Nowy', 5, 0, 32, '21979-mikrofon-maono-au-902-usb-pod_37500.jpg', 1),
(33, 'Słuchawki nauszne', 'Marka JBL, dobry bas.', '110.00', 1, 'JBL', 'Nowy', 5, 0, 33, '6527-jbl-sluchawki-nauszne-t560bt-czarny-t560btcz.jpg', 1),
(34, 'Monitor dla graczy', '144 Hz, zakrzywiony ekran', '1200.00', 1, 'MSI', 'Nowy', 5, 0, 34, '27687-MONITOR-DO-GIER-144Hz-MSI-ZAKRZYWIONY-24-FHD-1ms.jpg', 1),
(35, 'Klawiatura dla graczy', 'Podświetlana na 3 kolory', '40.00', 1, 'Gembird', 'Nowy', 5, 0, 35, '17924-23a8343ab7c043023e11a77d5903ffcc.jpg', 1),
(36, 'Mysz bezprzewodowa', 'Łączy się przez Bluetooth', '45.00', 1, 'Media Tech', 'Nowy', 5, 0, 36, '22615-Myszka-bezprzewodowa-Bluetooth-3-0-Morlock-BT-MT1120_[144338]_480.jpg', 1),
(37, 'Głośniki bezprzewodowe', 'Łącza się przez Bluetooth', '199.00', 1, 'Genesis', 'Nowy', 5, 0, 37, '21094-Glosniki-komputerowe-Genesis-Helium-400-bluetooth.jpg', 1),
(38, 'Fotel biurowy', 'Biało-czarny z siatką na oparciu', '500.00', 3, 'Beliani', 'Nowy', 5, 0, 38, '7143-krz.PNG', 1),
(39, 'Biurko drewniane', 'Do kompaktowych pomieszczeń', '360.00', 3, 'Sonoma', 'Nowy', 5, 0, 39, '17711-pol_pl_Biurko-Jaris-Sonoma-Bialy-Polysk-149_3.jpg', 1),
(45, 'Elektryczna golarka', 'Trzygłówkowa golarka do twarzy', '21.00', 6, 'Eldom', 'Nowy', 7, 1, 45, '49744-gol.jpg', 0),
(46, 'Termos turystyczny', 'Pojemność 0.4 l', '22.00', 6, 'Quechua', 'Nowy', 7, 1, 46, '5189-ter.PNG', 0),
(47, 'Cynamon mielony', 'Pikantna przyprawa', '2.00', 6, 'Prymat', 'Nowy', 7, 1, 47, '18119-prymat-cynamon-mielony-1.jpg', 1),
(48, 'Imbir mielony', 'Pikantna przyprawa', '4.00', 6, 'Prymat', 'Nowy', 7, 1, 48, '83517-prymat-imbir-mielony-1.jpg', 1),
(49, 'Olej słonecznikowy', 'Idealny do sałatek', '6.00', 6, 'Wielkopolski', 'Nowy', 7, 1, 49, '49434-ShotType1_540x540.jpg', 0),
(50, 'Olej lniany', 'Idealny do sałatek', '9.00', 6, 'Targroch', 'Nowy', 7, 1, 50, '42553-olej-lniany-tloczony-na-zimno.jpg', 1),
(51, 'Olej rzepakowy', 'Idealny do sałatek', '13.00', 6, 'Targroch', 'Nowy', 7, 1, 51, '14832-olej-rzepakowy-tloczony-na-zimno.jpg', 0),
(52, 'Olej kokosowy', 'Słodka przyprawa', '14.00', 6, 'OlVita', 'Nowy', 7, 1, 52, '18402-olej-kokosowy-zimnotloczony-extra-virgin-olvita.jpg', 1);

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
(1, '51219-Altana-3x4-altanka-ogrodowa-drewniana-PRODUCENT.jpg', 1),
(2, '2560-silnik-60-v8-ls2-corvette-pontiac-gto-kompresor-rok-produkcji-2006-opolskie-sprzedam-310854672.jpg', 2),
(4, '20033-522-5dac5d37a70c0ad552a75c282719a5105d8529c0466659-96474763.jpg', 4),
(5, '94998-5537735301a5dbship_in_bottle3.jpg', 5),
(6, '15232-lampa-wiszaca-zyrandol-varus-15851-3-globo-chrom-satynowy-metal.jpg', 6),
(10, '89454-b96c087a4dbf823f48741aee6fba.jpg', 7),
(11, '14253-ml.png', 8),
(12, '15937-ms.PNG', 9),
(13, '23651-41SfyOPYvxL._AC_.jpg', 10),
(14, '38934-Mleczko-kokosowe-Smaki-Swiata.jpg', 11),
(15, '54421-500_500_productGfx_b8953f57ee0ccca9ec8c3f8b0bfa272b.jpg', 12),
(16, '37535-ae3d5aea4e6c9312fcdeb937095c.jpg', 13),
(17, '15003-703_2.jpg', 14),
(18, '97878-500_500_productGfx_e52cc2105d7549cbc57230660c99f9fb.jpg', 15),
(19, '93863-soczewica-biala-urid-dal-500g-ktc.jpg', 16),
(20, '45208-symbio-soczewica-brazowa-ekologiczna-340-g-nk4ovm.jpg', 17),
(21, '11900-cz.jpg', 18),
(22, '91718-10152527855646.jpg', 19),
(23, '61331-prymat-kmin-rzymski-mielony-1.jpg', 20),
(24, '25908-prymat-bazylia-suszona-1.jpg', 21),
(25, '32684-ore.jpg', 22),
(26, '38348-estr.jpg', 23),
(27, '7613-tym.jpg', 24),
(28, '46061-poc.jpg', 25),
(29, '73469-kop.jpg', 26),
(30, '10764-wyw.jpg', 27),
(31, '64458-bet.jpg', 28),
(32, '80120-wys.jpg', 29),
(33, '41270-dra.PNG', 30),
(34, '78832-str.PNG', 31),
(35, '21979-mikrofon-maono-au-902-usb-pod_37500.jpg', 32),
(36, '6527-jbl-sluchawki-nauszne-t560bt-czarny-t560btcz.jpg', 33),
(37, '27687-MONITOR-DO-GIER-144Hz-MSI-ZAKRZYWIONY-24-FHD-1ms.jpg', 34),
(38, '17924-23a8343ab7c043023e11a77d5903ffcc.jpg', 35),
(39, '22615-Myszka-bezprzewodowa-Bluetooth-3-0-Morlock-BT-MT1120_[144338]_480.jpg', 36),
(40, '21094-Glosniki-komputerowe-Genesis-Helium-400-bluetooth.jpg', 37),
(41, '7143-krz.PNG', 38),
(42, '17711-pol_pl_Biurko-Jaris-Sonoma-Bialy-Polysk-149_3.jpg', 39),
(43, '67855-ter.PNG', 0),
(44, '67671-gol.jpg', 0),
(45, '64999-prymat-cynamon-mielony-1.jpg', 0),
(46, '31288-prymat-imbir-mielony-1.jpg', 0),
(48, '49744-gol.jpg', 45),
(49, '5189-ter.PNG', 46),
(50, '18119-prymat-cynamon-mielony-1.jpg', 47),
(51, '83517-prymat-imbir-mielony-1.jpg', 48),
(52, '49434-ShotType1_540x540.jpg', 49),
(53, '42553-olej-lniany-tloczony-na-zimno.jpg', 50),
(54, '14832-olej-rzepakowy-tloczony-na-zimno.jpg', 51),
(55, '18402-olej-kokosowy-zimnotloczony-extra-virgin-olvita.jpg', 52);

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
(1, 3, '2020-07-02 20:29:18'),
(2, 4, '2020-07-02 20:33:31'),
(4, 7, '2020-07-02 22:02:28');

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
(1, '82381-avatar (2).PNG', 1),
(2, '89230-avatarr.png', 2),
(3, '94589-unknown.png', 3),
(4, '61380-trowoav.PNG', 4),
(5, '59075-avatar.png', 5),
(7, '33505-Zombatar_1.jpg', 7);

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
  `nr_bankowy_k` varchar(26) COLLATE utf8_polish_ci NOT NULL,
  `id_oferty` int(11) NOT NULL,
  `nr_bankowy_s` varchar(26) COLLATE utf8_polish_ci NOT NULL,
  `adres_s` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `adres_k` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `imie_nazwisko_k` varchar(200) COLLATE utf8_polish_ci NOT NULL,
  `imie_nazwisko_s` varchar(200) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `transakcje`
--

INSERT INTO `transakcje` (`id`, `nazwa`, `cena`, `sprzedawca`, `dostawa`, `cena_dostawy`, `cena_koncowa`, `kupujacy`, `nr_bankowy_k`, `id_oferty`, `nr_bankowy_s`, `adres_s`, `adres_k`, `imie_nazwisko_k`, `imie_nazwisko_s`) VALUES
(1, 'Olej słonecznikowy', 6, 'theult1', 'Odbiór osobisty', 0, 6, 'aneczka76', '01230123012301230123012323', 49, '01230123012301230123012333', 'Frombork, Drogowa, 1/3, 90-345', 'Lubel, Czarków 15, 2/3, 45-234', 'Anna Kowalska', 'Anton Kowalska'),
(2, 'Olej rzepakowy', 13, 'theult1', 'Kurier', 13, 26, 'aneczka76', '01230123012301230123012323', 51, '01230123012301230123012333', 'Frombork, Drogowa, 1/3, 90-345', 'Lubel, Czarków 15, 2/3, 45-234', 'Anna Kowalska', 'Anton Kowalska'),
(3, 'Elektryczna golarka', 21, 'theult1', 'Przesyłka priorytetowa za pobraniem', 0, 21, 'zabawowy12', '01230123012301230123012321', 45, '01230123012301230123012333', 'Frombork, Drogowa, 1/3, 90-345', 'Arkans, Wertera, 17/2, 11-345', 'Patryk Madczelski', 'Anton Madczelski'),
(4, 'Termos turystyczny', 22, 'theult1', 'Przesyłka priorytetowa', 0, 22, 'sieradzanka5', '01230123012301230123012324', 46, '01230123012301230123012333', 'Frombork, Drogowa, 1/3, 90-345', 'Sieradz, Geodetów, 3, 76-532', 'Jagna Martuszyńska', 'Anton Martuszyńska');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ulubione`
--

CREATE TABLE `ulubione` (
  `id` int(11) NOT NULL,
  `id_oferty` int(11) NOT NULL,
  `id_uzytkownika` int(11) NOT NULL,
  `nazwa_uzytkownika` varchar(50) COLLATE utf8_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

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
  `nr_bankowy` varchar(26) COLLATE utf8_polish_ci NOT NULL,
  `kod_pocztowy` varchar(6) COLLATE utf8_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id`, `nazwa_uzytkownika`, `imie`, `nazwisko`, `telefon`, `email`, `haslo`, `typ_konta`, `id_premium`, `miasto`, `ulica`, `nr_zamieszkania`, `nr_bankowy`, `kod_pocztowy`) VALUES
(1, 'mareckin', 'Marek', 'Errand', '123123123', 'sampl1@gmail.com', '6a204bd89f3c8348afd5c77c717a097a', 1, NULL, 'Zory', 'Zielona 5', '1/1', '01230123012301230123012322', '62-329'),
(2, 'aneczka76', 'Anna', 'Kowalska', '787678765', 'sampl2@gmail.com', 'd74682ee47c3fffd5dcd749f840fcdd4', 3, NULL, 'Lubel', 'Czarków 15', '2/3', '01230123012301230123012323', '45-234'),
(3, 'zabawowy12', 'Patryk', 'Madczelski', '345678901', 'sampl3@gmail.com', '8ab4b7d22b56c2f8a437d60dca8d5faf', 2, 1, 'Arkans', 'Wertera', '17/2', '01230123012301230123012321', '11-345'),
(4, 'sieradzanka5', 'Jagna', 'Martuszyńska', '765876341', 'sampl4@gmail.com', '0a52dae42387580a4324a9497917f20e', 2, 2, 'Sieradz', 'Geodetów', '3', '01230123012301230123012324', '76-532'),
(5, 'Verzweifelt5', 'Hans', 'Kloss', '578536344', 'sampl5@gmail.com', '9c25b7cc288bc8032edf7d6b3c7cc858', 3, NULL, 'Frankfurt', 'Wasser', '6', '01230123012301230123012377', '56-000'),
(7, 'theult1', 'Anton', 'Anton', '467835667', 'sampl6@gmail.com', '27df11cd13b525b3bb9293469f8a6765', 2, 4, 'Frombork', 'Drogowa', '1/3', '01230123012301230123012333', '90-345');

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
(1, 'Użytkownik znany jest z oszukiwania na innych portalach.', 'Silnik samochodowy V8 do Pontiac GTO', 2, 1),
(2, 'Rozmiar niezgodny z fotografią.', 'Paskowana bluzka z krótkim rękawem', 4, 3);

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
-- Indeksy dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_oferty` (`id_oferty`),
  ADD KEY `id_uzytkownika` (`id_uzytkownika`),
  ADD KEY `nazwa_uzytkownika` (`nazwa_uzytkownika`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT dla tabeli `oferty_zdj`
--
ALTER TABLE `oferty_zdj`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT dla tabeli `premium`
--
ALTER TABLE `premium`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `profilowe`
--
ALTER TABLE `profilowe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `stan`
--
ALTER TABLE `stan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT dla tabeli `transakcje`
--
ALTER TABLE `transakcje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT dla tabeli `zgloszenia`
--
ALTER TABLE `zgloszenia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Ograniczenia dla tabeli `ulubione`
--
ALTER TABLE `ulubione`
  ADD CONSTRAINT `ulubione_ibfk_2` FOREIGN KEY (`nazwa_uzytkownika`) REFERENCES `users` (`nazwa_uzytkownika`),
  ADD CONSTRAINT `ulubione_ibfk_3` FOREIGN KEY (`id_uzytkownika`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `ulubione_ibfk_4` FOREIGN KEY (`id_oferty`) REFERENCES `oferty` (`id`);

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
