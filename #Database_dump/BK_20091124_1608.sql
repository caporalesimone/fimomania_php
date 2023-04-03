-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generato il: 24 nov, 2009 at 03:07 PM
-- Versione MySQL: 5.1.36
-- Versione PHP: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `my_simonsoft`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `categoria`
--

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE IF NOT EXISTS `categoria` (
  `id_categoria` smallint(5) unsigned NOT NULL,
  `nome` varchar(30) DEFAULT NULL,
  `descrizione` varchar(60) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nome`, `descrizione`, `enabled`) VALUES
(1, 'Ciondoli', 'Ciondoli', 1),
(2, 'Bracciali', 'Bracciali', 1),
(3, 'Spille', 'Spille', 1),
(4, 'Orecchini', 'Orecchini', 1),
(5, 'Collane', 'Collane', 1),
(6, 'Portachiavi', 'Portachiavi', 1),
(7, 'Phone strap', 'Phone strap', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `immagini`
--

DROP TABLE IF EXISTS `immagini`;
CREATE TABLE IF NOT EXISTS `immagini` (
  `id_immagine` smallint(5) unsigned NOT NULL,
  `id_prodotto` smallint(5) unsigned NOT NULL,
  `descrizione` varchar(60) DEFAULT NULL,
  `filename` varchar(35) NOT NULL,
  `filename_thumb` varchar(35) DEFAULT NULL,
  PRIMARY KEY (`id_immagine`,`id_prodotto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `immagini`
--

INSERT INTO `immagini` (`id_immagine`, `id_prodotto`, `descrizione`, `filename`, `filename_thumb`) VALUES
(1, 2, 'Fetta di torta', '02_fettatorta_01.jpg', '02_fettatorta_01_thumb.jpg'),
(4, 3, 'Folletto Nero/Fucsia', '03_folletto_03.jpg', '03_folletto_03_thumb.jpg'),
(2, 3, 'Folletto Nero/Viola', '03_folletto_01.jpg', '03_folletto_01_thumb.jpg'),
(3, 3, 'Folletto Arancione', '03_folletto_02.jpg', '03_folletto_02_thumb.jpg'),
(5, 4, 'Cioccolatino cremino', '04_cioccolatino_01.jpg', '04_cioccolatino_01_thumb.jpg'),
(6, 4, 'Cioccolatino cremino', '04_cioccolatino_02.jpg', '04_cioccolatino_02_thumb.jpg'),
(7, 5, 'Coccinella', '05_coccinella_01.jpg', '05_coccinella_01_thumb.jpg'),
(8, 5, 'Coccinella', '05_coccinella_02.jpg', '05_coccinella_02_thumb.jpg'),
(9, 7, 'Fetta di torta grande', '07_fettona_01.jpg', '07_fettona_01_thumb.jpg');

-- --------------------------------------------------------

--
-- Struttura della tabella `prodotti`
--

DROP TABLE IF EXISTS `prodotti`;
CREATE TABLE IF NOT EXISTS `prodotti` (
  `id_prodotto` smallint(5) unsigned NOT NULL,
  `id_categoria` smallint(5) unsigned NOT NULL,
  `nome` varchar(45) NOT NULL,
  `descrizione` varchar(1000) DEFAULT NULL,
  `prezzo` varchar(6) NOT NULL DEFAULT '0.00',
  `thumb_name` varchar(60) NOT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_prodotto`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `prodotti`
--

INSERT INTO `prodotti` (`id_prodotto`, `id_categoria`, `nome`, `descrizione`, `prezzo`, `thumb_name`, `enabled`) VALUES
(1, 1, 'Ciambella', 'Ciambella.', '1,00', 'thumb_1.jpg', 1),
(2, 1, 'Fetta di torta', 'Fetta di torta al cioccolato e crema.', '1,00', '02_fettatorta_01_thumb.jpg', 1),
(3, 1, 'Folletto', 'Folletto in vari colori e corpo in fimo fluorescente.', '7,00', '03_folletto_01_thumb.jpg', 1),
(4, 1, 'Cioccolatino', 'Cioccolatino cremino.', '1,50', '04_cioccolatino_01_thumb.jpg', 1),
(5, 1, 'Coccinella', 'Coccinella.', '2,00', '05_coccinella_01_thumb.jpg', 1),
(6, 1, 'Cornetto', 'Ciondolo cornetto in fimo', '1,00', 'thumb_6.jpg', 1),
(7, 1, 'Torta Grande', 'Grande fetta di torta al cioccolato (la base è di circa 3 cm).', '6,00', '07_fettona_01_thumb.jpg', 1),
(8, 1, 'Fetta di torta bianca', 'Ciondolo fetta di torta bianca alla frutta in fimo', '1,00', 'thumb_8.jpg', 1),
(9, 1, 'Fetta di torta fragola', 'Ciondolo fetta di torta con fragola in fimo', '1,00', 'thumb_9.jpg', 1),
(10, 1, 'Fior di fragola', 'Ciondolo fior di fragola in fimo', '1,50', 'thumb_10.jpg', 1),
(11, 1, 'Gufo', 'Ciondolo gufo in fimo altezza di circa 2,5 cm', '5,00', 'thumb_11.jpg', 1),
(12, 1, 'Pan di stelle', 'Ciondolo pan di stelle in fimo (stelline dipinte a mano)', '2,00', 'thumb_12.jpg', 1),
(13, 1, 'Papero', 'Ciondolo papero in fimo', '2,50', 'thumb_13.jpg', 1),
(14, 1, 'Polipo e stellina', 'Ciondolo polipo e stellina in fimo', '4,00', 'thumb_14.jpg', 1),
(15, 1, 'Rose', 'Ciondoli a rosa (specificare il colore)', '2,00', 'thumb_15.jpg', 1),
(16, 1, 'Tartaruga', 'Ciondolo tartaruga in fimo (diverse misure)', '1,50', 'thumb_16.jpg', 1),
(17, 1, 'Torta ciliegine', 'Torta con ciliegine in fimo (diametro circa 2 cm)', '3,00', 'thumb_17.jpg', 1),
(18, 1, 'Torta limone', 'Torta al limone in fimo (diametro circa 2 cm)', '3,00', 'thumb_18.jpg', 1),
(19, 1, 'Torta cioccolato e ciliegie', 'Torta al cioccolato in fimo (diametro circa 2 cm)', '2,50', 'thumb_19.jpg', 1),
(20, 1, 'Crostata di frutta', 'Crostata di frutta in fimo (diametro circa 2cm)', '3,00', 'thumb_20.jpg', 1),
(21, 1, 'Zucca', 'Ciondolo zucca (occhi e bocca dipinti a mano)', '2,00', 'thumb_21.jpg', 1),
(22, 2, 'Bracciale coccinelle', 'Bracciale con catena in metallo e ciondoli in fimo', '10,00', 'thumb_22.jpg', 1),
(23, 2, 'Bracciale cioccolato', 'Bracciale con catein fine in metallo e ciondoli misti in fimo', '12,00', 'thumb_23.jpg', 1),
(24, 2, 'Bracciale coccinelle oro', 'Bracciale con catena fine in metallo dorata e ciondoli in fimo', '10,00', 'thumb_24.jpg', 1),
(25, 2, 'Bracciale dolcetti', 'Bracciale con catena in metallo e ciondoli misti in fimo', '10,00', 'thumb_25.jpg', 1),
(26, 2, 'Bracciale rose', 'Bracciale con catena in metallo e rose in fimo', '13,00', 'thumb_26.jpg', 1),
(27, 2, 'Bracciale ciambelle', 'Bracciale in filo elastico con ciambelle in fimo e perle', '6,50', 'thumb_27.jpg', 1),
(28, 2, 'Bracciale bon bon', 'Bracciale in filo elastico e bon bon in fimo', '6,50', 'thumb_28.jpg', 1),
(29, 2, 'Bracciale girasole', 'Bracciale in filo elastico e ciondolo girasole in fimo ', '6,00', 'thumb_29.jpg', 1),
(30, 2, 'Bracciale fragole', 'Bracciale in filo elastico con fragole in fimo e perle', '6,50', 'thumb_30.jpg', 1),
(31, 2, 'Bracciale Hello Spank', 'Bracciale in filo elastico con ciondolo in fimo e perle', '5,80', 'thumb_31.jpg', 1),
(32, 2, 'Bracciale zampette', 'Bracciale in filo elastico con perle in fimo e perle in plastica', '6,00', 'thumb_32.jpg', 1),
(33, 2, 'Bracciale Haribo', 'Bracciale in filo elastico con liquirizie in fimo e perle in plastica', '6,50', 'thumb_33.jpg', 1),
(34, 2, 'Bracciale cioccolatino ', 'Bracciale con catena in metallo e ciondoli in fimo', '10,50', 'thumb_34.jpg', 1),
(35, 2, 'Bracciale rose viola', 'Bracciale con catena a maglia fine e rose in fimo', '12,00', 'thumb_35.jpg', 1),
(36, 2, 'Bracciale animaletti', 'Bracciale con catena a maglia fine e ciondoli in fimo', '12,00', 'thumb_36.jpg', 1),
(37, 4, 'Orecchini rose ', 'Orecchini con rose perla in fimo e swarowsky', '7,00', 'thumb_37.jpg', 1),
(38, 4, 'Orecchini coccinelle', 'Orecchini con coccinelle perla in fimo e swarowsky', '5,00', 'thumb_38.jpg', 1),
(39, 4, 'Orecchini nightmare', 'Orecchini con ciondolo in fimo', '4,80', 'thumb_39.jpg', 1),
(40, 4, 'Orecchini zucca', 'Orecchini con ciondolo in fimo', '4,50', 'thumb_40.jpg', 1),
(41, 4, 'Orecchini cupcackes', 'Orecchini con ciondolo  in fimo ', '4,50', 'thumb_41.jpg', 1),
(42, 4, 'Orecchini murrina', 'Orecchini con perle in fimo', '10,00', 'thumb_42.jpg', 1),
(43, 4, 'Orecchini fragole', 'Orecchini con fragole e perle in fimo piu swarowsky', '5,00', 'thumb_43.jpg', 1),
(44, 4, 'Orecchini perle a stella', 'Orecchini con perle in fimo ', '6,00', 'thumb_44.jpg', 1),
(45, 4, 'Orecchini cuori colorati', 'Orecchini con perle in fimo', '6,00', 'thumb_45.jpg', 1),
(46, 4, 'Orecchini murrina a fiore', 'Orecchini con perle in fimo ', '5,00', 'thumb_46.jpg', 1),
(47, 4, 'Orecchini cammeo', 'Orecchini con perle in fimo', '8,50', 'thumb_47.jpg', 1),
(48, 4, 'Orecchini rose bianche e foglioline', 'Orecchini con rose in fimo e perle ', '4,50', 'thumb_48.jpg', 1),
(49, 4, 'Orecchini girasole', 'Orecchini con girasoli in fimo e perle', '6,50', 'thumb_49.jpg', 1),
(50, 4, 'Orecchini caramelle', 'Orecchini con caramelle in fimo e perle', '5,00', 'thumb_50.jpg', 1),
(51, 2, 'Bracciale murrine', 'Bracciale con perle in fimo', '12,00', 'thumb_51.jpg', 1),
(52, 5, 'Collana stella marina', 'Collana in filo cerato ed organza con ciondolo in fimo', '6,00', 'thumb_52.jpg', 1),
(53, 5, 'Collana targa con rosa', 'Collana in filo cerato ed organza con ciondolo in fimo', '6,50', 'thumb_53.jpg', 1),
(54, 5, 'Collana rose', 'Collana con catena in metallo e ciondoli in fimo', '18,00', 'thumb_54.jpg', 1),
(55, 5, 'Collana murrine rosa', 'Collana in filo cerato con perle in fimo', '10,00', 'thumb_55.jpg', 1),
(56, 6, 'Portachiavi cacca di Arale', 'Portachiavi con ciondolo in fimo', '3,50', 'thumb_56.jpg', 1),
(57, 7, 'Phone strap chupa', 'Phone strap con chupa in fimo', '1,50', 'thumb_57.jpg', 1),
(58, 3, 'Spilla girasole', 'Spilla girasole in fimo', '3,00', 'thumb_58.jpg', 1),
(59, 6, 'Portachiavi cuore lilla', 'Portachiavi con cuore in fimo e perle', '7,00', 'thumb_59.jpg', 1),
(60, 6, 'Portachiavi polipo e stellina', 'Portachiavi con ciondoli in fimo', '5,00', 'thumb_60.jpg', 1),
(61, 6, 'Portachiavi pinguino', 'Portachiavi con ciondolo in fimo', '5,00', 'thumb_61.jpg', 1),
(62, 6, 'Portachiavi folletto', 'Portachiavi con ciondolo in fimo', '7,50', 'thumb_62.jpg', 1),
(63, 6, 'Portachiavi torta ciliegie', 'Portachiavi con ciondolo e perle in fimo', '8,00', 'thumb_63.jpg', 1),
(64, 5, 'Collana limone', 'Collana in filo cerato e ciondolo in fimo', '4,80', 'thumb_64.jpg', 1),
(65, 5, 'Collana torta e fetta', 'Collana in filo cerato ed organza con ciondoli in fimo', '6,50', 'thumb_65.jpg', 1),
(66, 5, 'Collana torta lilla', 'Collana in filo cerato ed organza con ciondolo in fimo', '6,00', 'thumb_66.jpg', 1),
(67, 5, 'Collana dolcetti', 'Collana con catena a maglia grande e ciondoli in fimo', '18,00', 'thumb_67.jpg', 1),
(68, 6, 'Portachiavi pinguino 2', 'Portachiavi con ciondolo in fimo', '5,00', 'thumb_68.jpg', 1),
(69, 2, 'Bracciale rose grigie', 'Bracciale maglia grande con ciondoli in fimo', '10,00', 'thumb_69.jpg', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `total_votes` int(11) NOT NULL DEFAULT '0',
  `total_value` int(11) NOT NULL DEFAULT '0',
  `used_ips` longtext COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dump dei dati per la tabella `ratings`
--

INSERT INTO `ratings` (`id`, `total_votes`, `total_value`, `used_ips`) VALUES
('7', 0, 0, ''),
('5', 0, 0, ''),
('2', 0, 0, ''),
('4', 0, 0, ''),
('1', 0, 0, ''),
('28', 0, 0, ''),
('3', 0, 0, ''),
('56', 0, 0, ''),
('53', 0, 0, ''),
('24', 0, 0, ''),
('20', 0, 0, ''),
('57', 0, 0, ''),
('67', 0, 0, ''),
('36', 0, 0, '');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

DROP TABLE IF EXISTS `utenti`;
CREATE TABLE IF NOT EXISTS `utenti` (
  `id_utente` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(60) NOT NULL,
  `livello_utente` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0 : Admin\n1 : Normal User',
  `nome` varchar(45) DEFAULT NULL,
  `cognome` varchar(45) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `sesso` varchar(1) DEFAULT NULL,
  `data_nascita` varchar(8) DEFAULT NULL,
  `indirizzo` varchar(200) DEFAULT NULL,
  `provincia` varchar(2) DEFAULT NULL,
  `comune` varchar(30) DEFAULT NULL,
  `cap` varchar(6) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id_utente`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='Reset indici: ALTER TABLE utenti ;' AUTO_INCREMENT=3 ;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id_utente`, `username`, `password`, `livello_utente`, `nome`, `cognome`, `email`, `sesso`, `data_nascita`, `indirizzo`, `provincia`, `comune`, `cap`, `telefono`, `enabled`) VALUES
(1, 'admin', 'xxx', 0, 'admin', 'Kiara', 'xxx@live.it', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);
