-- phpMyAdmin SQL Dump
-- version 4.4.15
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 29 Gru 2017, 16:26
-- Wersja serwera: 5.6.36
-- Wersja PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `samuelg_meteor`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `membership`
--

CREATE TABLE IF NOT EXISTS `membership` (
  `id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `u_id` int(5) NOT NULL,
  `m_type` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `membership`
--

INSERT INTO `membership` (`id`, `p_id`, `u_id`, `m_type`) VALUES
(9, 13, 130, 1),
(10, 14, 130, 0),
(11, 15, 123, 0),
(12, 16, 122, 1),
(16, 18, 133, 1),
(17, 19, 131, 1),
(18, 20, 131, 1),
(19, 21, 135, 1),
(20, 21, 131, 0),
(21, 22, 131, 1),
(22, 23, 131, 1),
(23, 24, 131, 1),
(24, 25, 131, 1),
(25, 26, 131, 1),
(26, 27, 131, 1),
(27, 27, 111, 0),
(28, 26, 111, 0),
(30, 26, 101, 0),
(32, 26, 104, 0),
(33, 26, 103, 0),
(36, 28, 131, 1),
(37, 29, 137, 1),
(38, 29, 119, 0),
(39, 30, 137, 1),
(40, 30, 131, 0),
(41, 31, 137, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsy`
--

CREATE TABLE IF NOT EXISTS `newsy` (
  `id_newsy` int(11) NOT NULL,
  `tytul` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `data` varchar(11) NOT NULL,
  `tresc` text CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `newsy`
--

INSERT INTO `newsy` (`id_newsy`, `tytul`, `data`, `tresc`, `autor`) VALUES
(1, 'Aktualizacja 2.1.12', '29-11-2017', 'Zaktualizowalismy interfejs uzytkownika i dodalismy mozliwosc kontaktu bezposredniego z supportem naszej platformy. Dziekujemy wszystkim za cierpliwosc i polecamy zglaszac wszelkie problemy do administracji.', 'AdminPierwiastek'),
(2, 'Aktualizacja 3.1', '30-11-2017', 'Nowosci w projektach! Nowosci na stronie! Subskrybuj nasz kanal na YouTube oraz sledz nas na Facebooku! W razie pytan polecamy nasz support. Plany na FAQ trwaja!', 'AdminKrystek'),
(3, 'Akutalizacja 6.5.1', '30-11-2017', 'Zmiana kolorĂłw jednym przyciskiem? Tylko u nas! Korzystaj z Project Meteor mobilnie by polepszyÄ efekty pracy!', 'AdminKrystek'),
(4, 'Aktualizacja 7.1.3', '30-11-2017', 'Drobne zmiany w layoucie i w systemie pĹatniczym. JuĹź za parÄ dni nadejdzie dzieĹ promocji na Project Meteor. Nie przegap okazji!', 'AdminPierwiastek'),
(5, 'Aktualizacja 7.1.9', '01-12-2017', 'Sprostowanie podstawowych bĹÄdĂłw wyĹwietlania. NiedĹugo czeka nas maĹa zmiana odnoĹnie uĹźywanych kart pĹatniczych. Skutkuje to oczywiĹcie - zniĹźkÄ! Nie przegap okazji i staĹ siÄ PREMIUM!', 'koxik4044'),
(6, 'Aktualizacja 9.12', '01-12-2017', 'Absolutnie nic nowego siÄ nie staĹo!', 'AdminPierwiastek');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(55) NOT NULL,
  `content` varchar(255) CHARACTER SET utf8 COLLATE utf8_polish_ci NOT NULL,
  `u_id` int(5) NOT NULL,
  `p_id` int(5) NOT NULL,
  `data` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `posts`
--

INSERT INTO `posts` (`id`, `content`, `u_id`, `p_id`, `data`) VALUES
(12, 'xx', 130, 13, '30-11-2017'),
(18, '&#347;&#261;&#322;&#263;', 130, 13, '30-11-2017'),
(25, 'Witam serdecznie wszystkich zebranych!', 131, 26, '30-11-2017'),
(26, 'Witam', 101, 26, '30-11-2017'),
(27, 'ChciaĹbym spytaÄ kto jeszcze jest nam potrzebny?', 101, 26, '30-11-2017'),
(28, 'Dodam mariusza i zaczynamy!', 131, 26, '01-12-2017'),
(29, 'Gdzie ten mariusz???', 104, 26, '01-12-2017'),
(32, 'Czekomy ino na stefana!', 131, 27, '01-12-2017'),
(34, 'Witam wszystkich!', 137, 30, '01-12-2017'),
(36, 'Zebranie o 20:00', 137, 29, '01-12-2017');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(5) NOT NULL,
  `title` varchar(30) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `owner_id` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin2;

--
-- Zrzut danych tabeli `projects`
--

INSERT INTO `projects` (`id`, `title`, `owner_id`) VALUES
(13, 'Projekt 1', 130),
(14, 'Projekt 2', 130),
(15, 'Projekt 1', 123),
(16, 'Proj 1', 122),
(26, 'ZSEMTV', 131),
(27, 'LethalityV3', 131),
(28, 'Adam', 131),
(29, 'AQSystem', 137),
(30, 'GhillPT', 137),
(31, 'nowy projekt', 137);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE IF NOT EXISTS `uzytkownicy` (
  `id` int(11) NOT NULL,
  `login` text COLLATE utf8_polish_ci NOT NULL,
  `pass` text COLLATE utf8_polish_ci NOT NULL,
  `email` text COLLATE utf8_polish_ci NOT NULL,
  `user` int(1) NOT NULL,
  `date` varchar(10) COLLATE utf8_polish_ci NOT NULL,
  `ip` varchar(20) COLLATE utf8_polish_ci NOT NULL,
  `e_key` int(9) NOT NULL,
  `status` int(1) NOT NULL,
  `acc_type` int(1) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=138 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id`, `login`, `pass`, `email`, `user`, `date`, `ip`, `e_key`, `status`, `acc_type`) VALUES
(99, 'Robcio13', '$2y$10$UJDHAhf9amz9AA4GUvdB3OapoeVp6VbVWLPVsCkbk5HGXcclxdAr2', 'konto0@yi.pl', 1, '25-11-2017', '185.192.243.245', 0, 0, 0),
(100, 'Konto1', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto1@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 1),
(101, 'Konto2', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto2@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(102, 'Konto3', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto3@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(103, 'Konto4', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto4@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 1),
(104, 'Konto5', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto5@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(110, 'Konto11', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto11@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(106, 'Konto7', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto7@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(107, 'Konto8', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto8@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(108, 'Konto9', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto9@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(98, 'tnmr', '$2y$10$ke.Xh/BnEDA/yZ61G/bq8eZM8.DaByKEEliRHAF3LBrTtx09AcTHe', 'tnmr@rowerkowo.pl', 1, '25-11-2017', '185.192.243.245', 0, 0, 0),
(109, 'Konto10', '$2y$10$d0zcVr76/lOtt26JxvnXPunbPFM2vKaU9xtsuKHfuoJ4n2YSmEjGW', 'konto10@yi.pl', 0, '25-11-2017', '185.192.243.245', 0, 0, 0),
(111, 'Konto12', '$2y$10$1v1CM0hpu5EqjDje9DmhLeaq.5xf9q1Gw8xiPKm2cP5GOeGxUXSae', 'konto12@yi.pl', 1, '25-11-2017', '31.0.127.176', 0, 0, 0),
(112, 'Konto13', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto13@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(131, 'koxik4044', '$2y$10$B.FsxWBbZ4Y/Oh4Y8k0y3O7E.miPj65SN7y1NG36uIlya.FigGgai', 'koxik6066@gmail.com', 1, '27-11-2017', '5.172.235.51', 658734624, 0, 1),
(114, 'Konto15', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto15@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(115, 'Konto16', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto16@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(116, 'Konto17', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto17@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(117, 'Konto18', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto18@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(118, 'Konto19', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto19@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(119, 'Konto20', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto20@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(121, 'Konto22', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto22@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(122, 'Konto23', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto23@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(123, 'Konto24', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto24@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(124, 'Konto25', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto25@yi.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(126, 'Konto27', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'konto27@yi.pl', 1, '25-11-2017', '31.0.127.176', 0, 0, 0),
(136, 'Pietrek', '$2y$10$D57y6yp4bKu7Y/gM3PE4WeGiRZjsctlk4avORq9kEgNDsZ0WtwqZe', 'jakismail@gmail.com', 0, '30-11-2017', '94.254.153.78', 0, 0, 1),
(135, 'koxik2022', '$2y$10$yKKC/GQmJA2aQkSFwNorYuPC/Ogy/Tq73hFdRprGljSi04PACnHQC', 'koxik2022@op.pl', 0, '30-11-2017', '94.254.153.78', 0, 0, 0),
(129, 'Konto30', '$2y$10$8HrcGr.TF6s8rgPh.PY9w.SqiH1bSIEKs7KfDFBMu3G/rCCXb6H6W', 'koxik4044@op.pl', 0, '25-11-2017', '31.0.127.176', 0, 0, 0),
(137, 'AdminPierwiastek', '$2y$10$vkRa.8E8W8tasQcOIkdYPu0I36oCVINQaLcZu65wP1jkPTJkqpiZK', 'zbinskip@gmail.com', 1, '01-12-2017', '94.254.153.78', 0, 0, 1);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `membership`
--
ALTER TABLE `membership`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsy`
--
ALTER TABLE `newsy`
  ADD PRIMARY KEY (`id_newsy`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `membership`
--
ALTER TABLE `membership`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT dla tabeli `newsy`
--
ALTER TABLE `newsy`
  MODIFY `id_newsy` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT dla tabeli `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(55) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT dla tabeli `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
