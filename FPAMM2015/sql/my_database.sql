--Prenotazioni--

CREATE TABLE IF NOT EXISTS `prenotazioni` (
  `idPrenotazione` int(10) NOT NULL,
  `Nome` varchar(256) NOT NULL,
  `Cognome` varchar(256) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` int(10) NOT NULL,
  `dataArrivo` date NOT NULL,
  `dataPartenza` date NOT NULL,
  `numOspiti` int(10) NOT NULL,
  `doppia` int(10) NOT NULL,
  `tripla` int(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--Inserimento dati--

INSERT INTO `prenotazioni` (`idPrenotazione`, `Nome`, `Cognome`, `email`, `telefono`, `dataArrivo`, `dataPartenza`, `ospiti`, `doppia`, `tripla`) VALUES
(1, 'Ciccio', 'Pasticcio', 'ciccio@hotmail.it', 1234567890, '2014-01-03', '2014-01-20', 1, 1, 0),
(2, 'Ciccio', 'Graziani', 'graziani@hotmail.com', 0987654321, '2016-02-28', '2016-03-05', 3, 0, 1);

--Utenti--

CREATE TABLE IF NOT EXISTS `utenti` (
  `id` int(11) NOT NULL,
  `username` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `livello` varchar(12) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--Inserimento dati--

INSERT INTO `utenti` (`id`, `username`, `password`, `livello`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'user', 'user', 'user');

--Indici tabelle--

ALTER TABLE `prenotazioni`
  ADD PRIMARY KEY (`idPrenotazione`);

ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `prenotazioni`
  MODIFY `idPrenotazione` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `utenti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
