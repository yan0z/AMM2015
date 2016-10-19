-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Ott 03, 2016 alle 11:35
-- Versione del server: 5.5.34
-- PHP Version: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `bbamm`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  KEY `user_fk` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `admin`
--

INSERT INTO `admin` (`id`, `user_id`) VALUES
(2, 21);

-- --------------------------------------------------------

--
-- Struttura della tabella `Prenotazioni`
--

CREATE TABLE `Prenotazioni` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nome` varchar(256) NOT NULL,
  `Cognome` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataArrivo` date NOT NULL,
  `dataPartenza` date NOT NULL,
  `singola` int(10) NOT NULL,
  `doppia` int(10) NOT NULL,
  `tripla` int(10) NOT NULL,
  `idUser` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idUser` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dump dei dati per la tabella `Prenotazioni`
--

INSERT INTO `Prenotazioni` (`id`, `Nome`, `Cognome`, `email`, `dataArrivo`, `dataPartenza`, `singola`, `doppia`, `tripla`, `idUser`) VALUES
(1, 'yano', 'morbo', 'yanoz@suga', '2016-04-01', '2016-04-11', 0, 1, 0, 23),
(20, 'Ciccio', 'Pasticcio', 'ciccio@live.it', '0000-00-00', '0000-00-00', 1, 0, 0, 23);

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(21, 'admin', 'admin'),
(23, 'user', 'user');
