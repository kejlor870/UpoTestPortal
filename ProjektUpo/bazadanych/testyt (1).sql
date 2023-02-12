-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Lut 2023, 14:53
-- Wersja serwera: 10.4.22-MariaDB
-- Wersja PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `testyt`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `klasy`
--

CREATE TABLE `klasy` (
  `id` int(11) NOT NULL,
  `nazwa_klasy` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `klasy`
--

INSERT INTO `klasy` (`id`, `nazwa_klasy`) VALUES
(1, 'TPro'),
(2, 'TInf');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `nauczyciele`
--

CREATE TABLE `nauczyciele` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `id_przedmiotu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `nauczyciele`
--

INSERT INTO `nauczyciele` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `id_przedmiotu`) VALUES
(1, 'Janina', 'Nowak', 'JanNow69', 'JaninaHaslook', 1),
(2, 'Piotr', 'Sugar', 'SugarPiotr12', 'Haslo1234', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `odpowiedzi`
--

CREATE TABLE `odpowiedzi` (
  `id` int(11) NOT NULL,
  `id_pytania` int(11) DEFAULT NULL,
  `odpowiedz` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `odpowiedzi`
--

INSERT INTO `odpowiedzi` (`id`, `id_pytania`, `odpowiedz`) VALUES
(1, 16, 'Nie'),
(2, 16, 'Tak '),
(3, 19, '2017 '),
(4, 19, '2012'),
(5, 20, 'Oczywiście'),
(6, 20, 'Nie'),
(7, 21, 'Tak'),
(8, 21, 'Nie'),
(9, 22, 'Pewnie'),
(10, 22, 'Xd'),
(11, 23, 'Tak'),
(12, 23, 'Nie'),
(13, 23, 'Mam 10iq i nie potrafie liczyc'),
(14, 23, 'OK'),
(15, 24, '10'),
(16, 24, '12'),
(17, 24, '6'),
(18, 24, '1'),
(19, 22, 'Pewnie'),
(20, 22, 'Nie'),
(21, 22, 'Musze dokończyć to'),
(22, 22, 'Szkola ponad fortnite xd?'),
(23, 26, 'Nie'),
(24, 26, 'Tak'),
(25, 26, 'Oczywiście'),
(26, 26, 'AHA'),
(27, 27, 'Godzina'),
(28, 27, 'Milisekunda'),
(29, 27, 'Dzień'),
(30, 27, 'Doba'),
(31, 28, 'Niuton'),
(32, 28, 'Amper'),
(33, 28, 'Kilometr'),
(34, 28, 'Kilogram'),
(35, 29, 'Kg'),
(36, 29, 'Cm'),
(37, 29, 'bdb'),
(38, 29, 'km/s'),
(39, 30, 'Beton'),
(40, 30, 'Internet'),
(41, 30, 'Powietrze'),
(42, 30, 'Telefon'),
(43, 31, 'Zegar'),
(44, 31, 'Czas'),
(45, 31, 'Pomiaromierz'),
(46, 31, 'Monitor'),
(47, 32, 'Isaac'),
(48, 32, 'Izak'),
(49, 33, '3'),
(50, 33, '5'),
(51, 34, 'Z jabłkiem'),
(52, 34, 'Z drzewem'),
(53, 35, 'Poetą'),
(54, 35, 'Nikim'),
(55, 36, 'Tak'),
(56, 36, 'Nie'),
(57, 37, 'Mazurek Dąbrowskiego'),
(58, 37, 'Hymn Polski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `przedmioty`
--

CREATE TABLE `przedmioty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `przedmioty`
--

INSERT INTO `przedmioty` (`id`, `nazwa`) VALUES
(1, 'Język Polski'),
(2, 'Biologia');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `pytania`
--

CREATE TABLE `pytania` (
  `id` int(11) NOT NULL,
  `id_testu` int(11) DEFAULT NULL,
  `pytanie` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `pytania`
--

INSERT INTO `pytania` (`id`, `id_testu`, `pytanie`) VALUES
(12, 19, 'Zdajesz?'),
(13, 19, 'Dawid Pasieka umie fizyke?'),
(14, 20, 'Czy dziala?'),
(15, 20, 'Czy chce zeby dzialalo? '),
(16, 21, 'Czy mam 10iq?'),
(17, 21, 'Czy krew jest zawsze czerwona?'),
(18, 22, 'Czy mam 10iq?'),
(19, 22, 'Kiedy powstał Fortnite?'),
(20, 23, 'Czy całość działa?'),
(21, 23, 'Czy to koniec pracy?'),
(22, 23, 'Moge juz kosić w Fortnite?'),
(23, 24, 'Czy jest dzisiaj essa?'),
(24, 24, 'Która liczba oznacza najwyzsza arene w Fortnite?'),
(25, 24, 'Moge juz kosić w Fortnite?'),
(26, 24, 'Czy matematyka codziennie to dobry pomysł?'),
(27, 19, 'Ma 3600 sekund? '),
(28, 19, 'Jednostka wartości siły?'),
(29, 19, 'Oznaczenie jednostki masy? '),
(30, 19, 'Materiał stosowany w budownictwie?'),
(31, 19, 'Służy do pomiaru czasu?'),
(32, 26, 'Jak miał na imię Newton?'),
(33, 26, 'Ile jest praw dynamiki?'),
(34, 26, 'Z czym kojarzony jest Newton?'),
(35, 27, 'Kim był Juliusz Słowacki?'),
(36, 27, 'Czy A. Mickiewicz był filozofem?'),
(37, 27, 'Tytuł Hymnu Polskiego');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `testy`
--

CREATE TABLE `testy` (
  `id` int(11) NOT NULL,
  `tytul` varchar(255) NOT NULL,
  `id_nauczyciela` int(11) DEFAULT NULL,
  `id_klasy` int(11) DEFAULT NULL,
  `liczba_pytan` int(11) DEFAULT NULL,
  `czas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `testy`
--

INSERT INTO `testy` (`id`, `tytul`, `id_nauczyciela`, `id_klasy`, `liczba_pytan`, `czas`) VALUES
(26, 'Fizyka 1', 2, 1, 3, 2),
(27, 'J.Polski', 2, 1, 3, 15);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczniowie`
--

CREATE TABLE `uczniowie` (
  `id` int(11) NOT NULL,
  `imie` varchar(255) NOT NULL,
  `nazwisko` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `haslo` varchar(255) NOT NULL,
  `id_klasy` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `uczniowie`
--

INSERT INTO `uczniowie` (`id`, `imie`, `nazwisko`, `login`, `haslo`, `id_klasy`) VALUES
(1, 'Tomasz', 'Bojówka', 'Bojowa660', 'MamyTradycjeKohacPolicje', 1),
(2, 'Michał', 'Nigo', 'Nig4s', 'HasloDoKonta', 2);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wynikiztestow`
--

CREATE TABLE `wynikiztestow` (
  `id` int(11) NOT NULL,
  `id_testu` int(11) NOT NULL,
  `id_ucznia` int(11) NOT NULL,
  `wynikWproc` int(11) DEFAULT NULL,
  `ocena` varchar(50) DEFAULT NULL,
  `czas_rozpoczecia` varchar(50) DEFAULT NULL,
  `czas_zakonczenia` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `wynikiztestow`
--

INSERT INTO `wynikiztestow` (`id`, `id_testu`, `id_ucznia`, `wynikWproc`, `ocena`, `czas_rozpoczecia`, `czas_zakonczenia`) VALUES
(2, 24, 1, 50, 'Dopuszczajacy', '13:47', '13:48'),
(3, 23, 1, 100, 'Bardzo dobry', '14:16', '14:16'),
(4, 24, 1, 50, 'Dopuszczajacy', '14:16', '14:17'),
(5, 26, 1, 100, 'Bardzo dobry', '13:39', '13:39'),
(6, 27, 1, 67, 'Dostateczny', '14:50', '14:50');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `klasy`
--
ALTER TABLE `klasy`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_przedmiotu` (`id_przedmiotu`);

--
-- Indeksy dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pytania` (`id_pytania`);

--
-- Indeksy dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `pytania`
--
ALTER TABLE `pytania`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_testu` (`id_testu`);

--
-- Indeksy dla tabeli `testy`
--
ALTER TABLE `testy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nauczyciela` (`id_nauczyciela`),
  ADD KEY `id_klasy` (`id_klasy`);

--
-- Indeksy dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_klasy` (`id_klasy`);

--
-- Indeksy dla tabeli `wynikiztestow`
--
ALTER TABLE `wynikiztestow`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `klasy`
--
ALTER TABLE `klasy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT dla tabeli `przedmioty`
--
ALTER TABLE `przedmioty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `pytania`
--
ALTER TABLE `pytania`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT dla tabeli `testy`
--
ALTER TABLE `testy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT dla tabeli `wynikiztestow`
--
ALTER TABLE `wynikiztestow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `nauczyciele`
--
ALTER TABLE `nauczyciele`
  ADD CONSTRAINT `nauczyciele_ibfk_1` FOREIGN KEY (`id_przedmiotu`) REFERENCES `przedmioty` (`id`);

--
-- Ograniczenia dla tabeli `odpowiedzi`
--
ALTER TABLE `odpowiedzi`
  ADD CONSTRAINT `odpowiedzi_ibfk_1` FOREIGN KEY (`id_pytania`) REFERENCES `pytania` (`id`);

--
-- Ograniczenia dla tabeli `testy`
--
ALTER TABLE `testy`
  ADD CONSTRAINT `testy_ibfk_1` FOREIGN KEY (`id_nauczyciela`) REFERENCES `nauczyciele` (`id`),
  ADD CONSTRAINT `testy_ibfk_2` FOREIGN KEY (`id_klasy`) REFERENCES `klasy` (`id`);

--
-- Ograniczenia dla tabeli `uczniowie`
--
ALTER TABLE `uczniowie`
  ADD CONSTRAINT `uczniowie_ibfk_1` FOREIGN KEY (`id_klasy`) REFERENCES `klasy` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
