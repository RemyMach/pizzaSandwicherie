-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2019 at 04:49 PM
-- Server version: 5.6.37
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecole`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorie_pizza`
--

CREATE TABLE IF NOT EXISTS `categorie_pizza` (
  `id` int(11) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `quantite` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categorie_pizza`
--

INSERT INTO `categorie_pizza` (`id`, `categorie`, `quantite`) VALUES
(5, 'pizza', 100),
(6, 'calzone', 120),
(7, 'dessert', 150),
(8, 'boisson', 100);

-- --------------------------------------------------------

--
-- Table structure for table `client_pizza`
--

CREATE TABLE IF NOT EXISTS `client_pizza` (
  `id` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nomrue` varchar(255) DEFAULT NULL,
  `cp` int(11) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `client_pizza`
--

INSERT INTO `client_pizza` (`id`, `nom`, `prenom`, `nomrue`, `cp`, `tel`, `mail`, `ville`, `password`) VALUES
(1, 'jean', 'Bengala', '15 avenue Cardinale', 95120, '0625678564', 'bengala@hotmail.com', 'Ermont', '$2y$10$TtkvTMcxdPcjtzAiP6vAhO8OIHWfgWpi6NwEkGNOEw4mrse5TqUtK'),
(2, 'Romaric', 'Fibanacci', '15 allee saint john perse', 95120, '0628790932', 'dibanaci@hotmail.com', 'Paris', '$2y$10$aUCP/qUj/GyhXXVNVCa6aOjtIx3qdVlMweUfqTche38JcLHnjOx5G'),
(3, 'Machavoine', 'remy', '12 rue du pres', 75002, '0898990099', 'skineva@wynd.eu', 'Paris', '$2y$10$6YxhoetNp5yE8sPqGqzWP.A21Vt/dq/defGyZuQKJA2rBfQdHaMgm'),
(8, 'claude', 'hubert', '45 allee de la chaussee', 95150, '0909876543', 'exemple@hotmail.com', 'Taverny', '$2y$10$.ETzMTs9y0L/02VDQkF18uiQllcYUQklOlTYDJkiwDPeuRCjQx2fG'),
(9, 'de roger', 'vandebuck', '27 rue de la marre', 95150, '0908987667', 'jean@hotmail.fr', 'Taverny', '$2y$10$uZaa1TCmPEe.1IMP5tmEM.dMiDPAgQJsU6QWVHeMRjwn8sDIublmm'),
(11, 'Richard', 'pagaie', '9 rue claude', 95150, '0998787886', 'jeanne@gmail.com', 'Taverny', '$2y$10$rU3DJUSPVSs9pz7lOe9nxuqBaMYT/2rwy/nCAmVmFaNK1d4fuV7Ia'),
(14, 'ferme', 'richard', '14 avenue Cardinale', 95150, '0998056689', 'sfereefe@gmail.com', 'Taverny', '$2y$10$y4iKFalNckLvlFd3KGABF.TU7Qpqlhvjwozx7d0pk8HkeWWypEyP.'),
(19, 'jean', 'Jeanne', '2 rue du test', 75100, '0987877675', 'test@gmail.com', 'Paris', '$2y$10$ZE7YqBgjEvZtl3TWMyywvurGEMnY1HfPuCmJxXssRpirbKFCnf.GC'),
(20, 'jean', 'louis', '5 rue de homne', 75150, '0646757756', 'jean_de_la_vida@hotmail.fr', 'Paris', '$2y$10$Ek.V47yGL1BFwR.DlNNKQOUmbwxmbmydjh4wBNSnPtVn2OlWoPACa'),
(21, 'jean', 'louis', '5 rue de homne', 75150, '0646757756', 'jeande_la_vida@hotmail.fr', 'Paris', '$2y$10$rWsiCkJN3/Ev1yFbqxn0luZ4ewdlcX19vI1./vSA6P7sdTGTtXNYK'),
(22, 'Franck', 'Lomi', '6 rue de la honte', 95150, '0672891011', 'lomipo@gmail.com', 'Taverny', '$2y$10$.foPR84L.vsvNDPQWSxT9OIq3o/M8OXyMG7l9bYhbjkqth177K/Ce');

-- --------------------------------------------------------

--
-- Table structure for table `commande_verify`
--

CREATE TABLE IF NOT EXISTS `commande_verify` (
  `id` int(11) NOT NULL,
  `id_payeur` varchar(255) NOT NULL,
  `articles` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commande_verify`
--

INSERT INTO `commande_verify` (`id`, `id_payeur`, `articles`) VALUES
(1, '19', 'produit :Reine,moyenne,2,pizza|champignon gorgonzolla/produit :Chocominos,unique,1,dessert/produit :4 fromages,mega,2,pizza/menu_mega :4 fromages,moelleux chocolat,Coca-cola zero/menu_mega :4 fromages,Choco bread,Coca-cola/menu_moyen :4 saison,glace vanille noix de pecan/menu_moyen :4 saison,glace caramel brownie'),
(2, '19', 'produit :4 fromages,moyenne,2,pizza|champignon de paris jambon/produit :Choco bread,unique,2,dessert/menu_mega :4 fromages,moelleux chocolat,Fuze tea'),
(3, '19', 'produit :Reine,moyenne,1,pizza|jambon mozzarella/menu_mega :Gorgonzolla,glace caramel brownie,Oasis tropical'),
(4, '19', 'produit :Abeille,moyenne,2,pizza|pomme de terre champignon sauce barbecue'),
(5, '19', 'produit :4 fromages,mega,2,pizza');

-- --------------------------------------------------------

--
-- Table structure for table `ingredient_pizza`
--

CREATE TABLE IF NOT EXISTS `ingredient_pizza` (
  `id` int(11) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ingredient_pizza`
--

INSERT INTO `ingredient_pizza` (`id`, `libelle`) VALUES
(1, 'olive'),
(2, 'mozzarella'),
(3, 'chèvre'),
(4, 'merguez'),
(5, 'salade'),
(6, 'jambon'),
(7, 'tomate'),
(8, 'champignon de paris'),
(9, 'origan'),
(10, 'viande haché de boeuf'),
(11, 'bacon'),
(12, 'sauce barbecue'),
(13, 'oignon'),
(14, 'parmesan'),
(15, 'gorgonzolla'),
(16, 'coulie de tomates'),
(17, 'champignon'),
(18, 'crème fraiche'),
(19, 'miel'),
(20, 'chorizo'),
(21, 'oeuf'),
(22, 'lardon'),
(23, 'poulet'),
(24, 'ananas'),
(25, 'reblochon'),
(26, 'pomme de terre'),
(27, 'aubergine'),
(28, 'fromage'),
(29, 'poivrons'),
(30, 'artichaut');

-- --------------------------------------------------------

--
-- Table structure for table `paiements`
--

CREATE TABLE IF NOT EXISTS `paiements` (
  `id` int(11) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `payment_status` text NOT NULL,
  `payment_amount` text NOT NULL,
  `payment_currency` text NOT NULL,
  `payment_date` datetime NOT NULL,
  `payer_email` text NOT NULL,
  `payer_paypal_id` int(255) NOT NULL,
  `payer_first_name` varchar(255) NOT NULL,
  `payer_last_name` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paiements`
--

INSERT INTO `paiements` (`id`, `payment_id`, `payment_status`, `payment_amount`, `payment_currency`, `payment_date`, `payer_email`, `payer_paypal_id`, `payer_first_name`, `payer_last_name`) VALUES
(3, 'PAYID-LTK3CEA9EA85038TK531241A', 'created', '9.99', 'EUR', '2019-05-10 19:12:49', '', 0, '', ''),
(4, 'PAYID-LTK3D5I6P060974NP5993502', 'created', '9.99', 'EUR', '2019-05-10 19:16:38', '', 0, '', ''),
(5, 'PAYID-LTK3EVQ8CY39103P41538100', 'created', '9.99', 'EUR', '2019-05-10 19:18:14', '', 0, '', ''),
(6, 'PAYID-LTK3FMA4VV444291F071902V', 'created', '9.99', 'EUR', '2019-05-10 19:19:44', '', 0, '', ''),
(7, 'PAYID-LTK3GBQ67U28763AT241170U', 'created', '9.99', 'EUR', '2019-05-10 19:21:10', '', 0, '', ''),
(8, 'PAYID-LTK4R2I1C455190GJ873245X', 'created', '9.99', 'EUR', '2019-05-10 20:54:43', '', 0, '', ''),
(9, 'PAYID-LTK4SOI8YT06271GX663834R', 'approved', '9.99', 'EUR', '2019-05-10 20:56:04', 'remygt-buyer@hotmail.fr', 0, '', ''),
(10, 'PAYID-LTK4U6Y2LG81628GL127092U', 'approved', '9.99', 'EUR', '2019-05-10 21:01:25', 'remygt-buyer@hotmail.fr', 0, '', ''),
(11, 'PAYID-LTK4W3Y3A094471SC1766121', 'created', '9.99', 'EUR', '2019-05-10 21:05:30', '', 0, '', ''),
(12, 'PAYID-LTK4XBQ6MW054452B698015B', 'created', '9.99', 'EUR', '2019-05-10 21:05:52', '', 0, '', ''),
(13, 'PAYID-LTK4XKA0JE07505CL697482G', 'created', '9.99', 'EUR', '2019-05-10 21:06:27', '', 0, '', ''),
(14, 'PAYID-LTK4XUY61L50216HR8595625', 'created', '19.99', 'EUR', '2019-05-10 21:07:10', '', 0, '', ''),
(15, 'PAYID-LTK47WQ1HF26247SG920005W', 'created', '27.00', 'EUR', '2019-05-10 21:24:11', '', 0, '', ''),
(16, 'PAYID-LTK5CAI7M4811324W917443J', 'created', '27.00', 'EUR', '2019-05-10 21:29:05', '', 0, '', ''),
(17, 'PAYID-LTK5CIY1D808744MA5086445', 'created', '27.00', 'EUR', '2019-05-10 21:29:39', '', 0, '', ''),
(18, 'PAYID-LTK5D2Y9CR61222LT627292D', 'created', '19.99', 'EUR', '2019-05-10 21:33:00', '', 0, '', ''),
(19, 'PAYID-LTK5GAI44H396151K3693815', 'approved', '15.00', 'EUR', '2019-05-10 21:37:37', 'remygt-buyer@hotmail.fr', 0, '', ''),
(20, 'PAYID-LTK5GYI3U427786CM5290509', 'approved', '15.00', 'EUR', '2019-05-10 21:39:13', 'remygt-buyer@hotmail.fr', 0, '', ''),
(21, 'PAYID-LTK5HCA5PP964588D408982U', 'approved', '15.00', 'EUR', '2019-05-10 21:39:52', 'remygt-buyer@hotmail.fr', 0, '', ''),
(22, 'PAYID-LTK5LPA1VU50504HD3418410', 'approved', '15.00', 'EUR', '2019-05-10 21:49:16', 'remygt-buyer@hotmail.fr', 0, '', ''),
(23, 'PAYID-LTK64YQ3KN5092280845750B', 'approved', '43.80', 'EUR', '2019-05-10 23:34:26', 'remygt-buyer@hotmail.fr', 0, '', ''),
(24, 'PAYID-LTK65EA21B14274ET078952X', 'approved', '43.80', 'EUR', '2019-05-10 23:35:12', 'remygt-buyer@hotmail.fr', 0, '', ''),
(25, 'PAYID-LTK66KI4PE83846X63173104', 'created', '43.80', 'EUR', '2019-05-10 23:37:45', '', 0, '', ''),
(26, 'PAYID-LTK7NFQ06V07701AJ7965117', 'approved', '54.80', 'EUR', '2019-05-11 00:09:26', 'remygt-buyer@hotmail.fr', 0, '', ''),
(27, 'PAYID-LTMGNCI7HU10584TA878135L', 'created', '90.80', 'EUR', '2019-05-12 20:31:37', '', 0, '', ''),
(28, 'PAYID-LTMGNMQ288197077R559350S', 'approved', '93.80', 'EUR', '2019-05-12 20:32:18', 'remygt-buyer@hotmail.fr', 0, '', ''),
(29, 'PAYID-LTOGLQQ51C08285JT796750Y', 'approved', '116.20', 'EUR', '2019-05-15 21:17:22', 'remygt-buyer@hotmail.fr', 0, '', ''),
(30, 'PAYID-LTOT5YA00F97234DR551552M', 'approved', '47.20', 'EUR', '2019-05-16 12:43:44', 'remygt-buyer@hotmail.fr', 0, '', ''),
(31, 'PAYID-LTOV4QY3M153183GP192414V', 'approved', '30.00', 'EUR', '2019-05-16 14:57:40', 'remygt-buyer@hotmail.fr', 0, '', ''),
(32, 'PAYID-LTPLV4Q7K768927N1176910W', 'approved', '27.00', 'EUR', '2019-05-17 15:45:23', 'remygt-buyer@hotmail.fr', 0, '', ''),
(33, 'PAYID-LTQBLMI15T415545L207241V', 'approved', '30.00', 'EUR', '2019-05-18 16:24:49', 'remygt-buyer@hotmail.fr', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produit_ingredient`
--

CREATE TABLE IF NOT EXISTS `produit_ingredient` (
  `id` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `id_ingredient` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit_ingredient`
--

INSERT INTO `produit_ingredient` (`id`, `id_produit`, `id_ingredient`) VALUES
(1, 1, 7),
(2, 1, 28),
(3, 1, 6),
(4, 1, 17),
(5, 1, 9),
(6, 2, 7),
(7, 2, 3),
(8, 2, 2),
(9, 2, 15),
(10, 2, 25),
(11, 2, 9),
(12, 3, 7),
(13, 3, 28),
(14, 3, 6),
(15, 3, 17),
(16, 3, 29),
(17, 3, 30),
(18, 3, 1),
(19, 3, 9),
(20, 4, 18),
(21, 4, 28),
(22, 4, 3),
(23, 4, 19),
(24, 5, 7),
(25, 5, 28),
(26, 5, 10),
(27, 5, 4),
(28, 5, 21),
(29, 5, 6),
(30, 5, 17),
(31, 5, 9),
(32, 6, 18),
(33, 6, 28),
(34, 6, 22),
(35, 6, 13),
(36, 6, 15),
(37, 7, 7),
(38, 7, 28),
(39, 7, 10),
(40, 7, 23),
(41, 7, 4),
(42, 7, 9),
(43, 8, 7),
(44, 8, 28),
(45, 8, 6),
(46, 8, 24),
(47, 8, 9),
(48, 9, 18),
(49, 9, 28),
(50, 9, 22),
(51, 9, 25),
(52, 9, 26),
(53, 9, 13),
(54, 10, 7),
(55, 10, 28),
(56, 10, 13),
(57, 10, 1),
(58, 10, 27),
(59, 10, 30),
(60, 10, 17),
(61, 10, 9),
(62, 11, 18),
(63, 11, 28),
(64, 11, 3),
(65, 11, 22),
(66, 11, 13),
(67, 12, 7),
(68, 12, 28),
(69, 12, 20),
(70, 12, 4),
(71, 12, 21),
(72, 12, 6),
(73, 12, 17),
(74, 12, 9);

-- --------------------------------------------------------

--
-- Table structure for table `produit_pizza`
--

CREATE TABLE IF NOT EXISTS `produit_pizza` (
  `id` int(4) NOT NULL,
  `prix_u` int(6) NOT NULL,
  `taille` varchar(255) NOT NULL,
  `categorie` varchar(255) NOT NULL,
  `libelle` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produit_pizza`
--

INSERT INTO `produit_pizza` (`id`, `prix_u`, `taille`, `categorie`, `libelle`) VALUES
(1, 15, 'mega', 'pizza', 'Reine'),
(2, 15, 'mega', 'pizza', '4 fromages'),
(3, 15, 'mega', 'pizza', '4 saison'),
(4, 15, 'mega', 'pizza', 'Abeille'),
(5, 15, 'mega', 'pizza', 'Dinapoli'),
(6, 15, 'mega', 'pizza', 'Gorgonzolla'),
(7, 15, 'mega', 'pizza', 'Gourmande'),
(8, 15, 'mega', 'pizza', 'Hawaienne'),
(9, 15, 'mega', 'pizza', 'Tartiflette'),
(10, 15, 'mega', 'pizza', 'Vegetarienne'),
(11, 15, 'mega', 'pizza', 'Venezia'),
(12, 15, 'mega', 'pizza', 'Americaine'),
(13, 12, 'moyenne', 'pizza', 'Reine'),
(14, 12, 'moyenne', 'pizza', '4 fromages'),
(15, 12, 'moyenne', 'pizza', '4 saison'),
(16, 12, 'moyenne', 'pizza', 'Abeille'),
(17, 12, 'moyenne', 'pizza', 'Dinapoli'),
(18, 12, 'moyenne', 'pizza', 'Gorgonzolla'),
(19, 12, 'moyenne', 'pizza', 'Gourmande'),
(20, 12, 'moyenne', 'pizza', 'Hawaienne'),
(21, 12, 'moyenne', 'pizza', 'Tartiflette'),
(22, 12, 'moyenne', 'pizza', 'Vegetarienne'),
(23, 12, 'moyenne', 'pizza', 'Venezia'),
(24, 12, 'moyenne', 'pizza', 'Americaine'),
(25, 9, 'petite', 'pizza', 'Reine'),
(26, 9, 'petite', 'pizza', '4 fromages'),
(27, 9, 'petite', 'pizza', '4 saison'),
(28, 9, 'petite', 'pizza', 'Abeille'),
(29, 9, 'petite', 'pizza', 'Dinapoli'),
(30, 9, 'petite', 'pizza', 'Gorgonzolla'),
(31, 9, 'petite', 'pizza', 'Gourmande'),
(32, 9, 'petite', 'pizza', 'Hawaienne'),
(33, 9, 'petite', 'pizza', 'Tartiflette'),
(34, 9, 'petite', 'pizza', 'Vegetarienne'),
(35, 9, 'petite', 'pizza', 'Venezia'),
(36, 9, 'petite', 'pizza', 'Americaine'),
(48, 1, '33cl', 'boisson', 'Coca-cola cherry'),
(49, 1, '33cl', 'boisson', 'Coca-cola zero'),
(50, 1, '33cl', 'boisson', 'Coca-cola'),
(51, 1, '33cl', 'boisson', 'Fanta orange'),
(52, 1, '33cl', 'boisson', 'Fuze tea'),
(53, 1, '33cl', 'boisson', 'Oasis tropical'),
(54, 1, '33cl', 'boisson', 'Sprite'),
(55, 2, '75cl', 'boisson', 'Evian'),
(56, 3, 'unique', 'dessert', 'Caramel bread'),
(57, 3, 'unique', 'dessert', 'Choco bread'),
(58, 5, 'unique', 'dessert', 'Chocominos'),
(59, 4, 'unique', 'dessert', 'mini beignets'),
(60, 5, 'unique', 'dessert', 'mini pancakes'),
(61, 3, 'unique', 'dessert', 'moelleux chocolat'),
(62, 4, '500g', 'dessert', 'glace caramel brownie'),
(63, 3, '500g', 'dessert', 'glace chocolat'),
(64, 4, 'unique', 'dessert', 'glace cookie'),
(65, 3, '500g', 'dessert', 'glace vanille noix de pecan'),
(66, 9, 'unique', 'calzone', 'calzone hot dog'),
(67, 9, 'unique', 'calzone', 'calzone merguez'),
(68, 10, 'unique', 'calzone', 'calzone poulet'),
(69, 9, 'unique', 'calzone', 'calzone thon'),
(70, 9, 'unique', 'calzone', 'calzone boeuf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie_pizza`
--
ALTER TABLE `categorie_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `client_pizza`
--
ALTER TABLE `client_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commande_verify`
--
ALTER TABLE `commande_verify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingredient_pizza`
--
ALTER TABLE `ingredient_pizza`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paiements`
--
ALTER TABLE `paiements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit_ingredient`
--
ALTER TABLE `produit_ingredient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produit_pizza`
--
ALTER TABLE `produit_pizza`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorie_pizza`
--
ALTER TABLE `categorie_pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `client_pizza`
--
ALTER TABLE `client_pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `commande_verify`
--
ALTER TABLE `commande_verify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ingredient_pizza`
--
ALTER TABLE `ingredient_pizza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `paiements`
--
ALTER TABLE `paiements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `produit_ingredient`
--
ALTER TABLE `produit_ingredient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `produit_pizza`
--
ALTER TABLE `produit_pizza`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=71;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
