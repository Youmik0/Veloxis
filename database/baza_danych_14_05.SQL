/*
Created: 14.05.2020
Modified: 14.05.2020
Model: MySQL 8.0
Database: MySQL 8.0
*/

-- Create tables section -------------------------------------------------

-- Table oferty

CREATE TABLE `oferty`
(
  `id_oferty` Int NOT NULL,
  `nazwa_oferty` Varchar(100) NOT NULL,
  `opis` Varchar(100),
  `kategoria` Varchar(50) NOT NULL,
  `id` Int(11) NOT NULL
)
;

CREATE INDEX `IX_Relationship3` ON `oferty` (`id`)
;

ALTER TABLE `oferty` ADD PRIMARY KEY (`id_oferty`)
;

ALTER TABLE `oferty` ADD UNIQUE `id_oferty` (`id_oferty`)
;

ALTER TABLE `oferty` ADD UNIQUE `kategoria` (`kategoria`)
;

-- Table users

CREATE TABLE `users`
(
  `id` Int(11) NOT NULL,
  `nazwa_uzytkownika` Varchar(100) NOT NULL,
  `imie` Varchar(100) NOT NULL,
  `nazwisko` Varchar(100) NOT NULL,
  `telefon` Varchar(15) NOT NULL,
  `email` Varchar(100) NOT NULL,
  `haslo` Varchar(100) NOT NULL,
  `typ_konta` Int(11) NOT NULL DEFAULT 3
)
;

ALTER TABLE `users` ADD PRIMARY KEY (`id`)
;

ALTER TABLE `users` ADD UNIQUE `id` (`id`)
;

ALTER TABLE `users` ADD UNIQUE `nazwa_uzytkownika` (`nazwa_uzytkownika`)
;

-- Create foreign keys (relationships) section -------------------------------------------------

ALTER TABLE `oferty` ADD CONSTRAINT `user_oferta` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
;


