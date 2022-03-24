-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           10.1.32-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour animaux_v
CREATE DATABASE IF NOT EXISTS `animaux_v` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `animaux_v`;

-- Listage de la structure de la table animaux_v. animaux
CREATE TABLE IF NOT EXISTS `animaux` (
  `id_animaux` int(11) NOT NULL AUTO_INCREMENT,
  `id_client` int(11) DEFAULT NULL,
  `type_a` varchar(50) DEFAULT NULL,
  `nom_a` varchar(50) DEFAULT NULL,
  `age` varchar(50) DEFAULT NULL,
  `jma` varchar(50) DEFAULT NULL,
  `couleur` varchar(50) DEFAULT NULL,
  `Date_naissance` date DEFAULT NULL,
  `sexe` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_animaux`),
  KEY `FK_animaux_clients` (`id_client`),
  CONSTRAINT `FK_animaux_clients` FOREIGN KEY (`id_client`) REFERENCES `clients` (`id_client`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.animaux : ~3 rows (environ)
/*!40000 ALTER TABLE `animaux` DISABLE KEYS */;
INSERT INTO `animaux` (`id_animaux`, `id_client`, `type_a`, `nom_a`, `age`, `jma`, `couleur`, `Date_naissance`, `sexe`) VALUES
	(30, 26, 'Chien', 'Rex', '4', 'J', '#222020', '2021-01-19', 'Male'),
	(31, 26, 'Chat', 'Titi', '15', 'o', '#c11515', '2022-03-09', 'Femelle'),
	(32, 27, 'Chat', 'test', '20', 'M', '#d9d9d9', '2022-03-08', 'Male');
/*!40000 ALTER TABLE `animaux` ENABLE KEYS */;

-- Listage de la structure de la table animaux_v. clients
CREATE TABLE IF NOT EXISTS `clients` (
  `id_client` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `Adresse` varchar(50) DEFAULT NULL,
  `Date_Suivi` date DEFAULT NULL,
  PRIMARY KEY (`id_client`),
  UNIQUE KEY `tel` (`tel`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.clients : ~2 rows (environ)
/*!40000 ALTER TABLE `clients` DISABLE KEYS */;
INSERT INTO `clients` (`id_client`, `nom`, `prenom`, `tel`, `Adresse`, `Date_Suivi`) VALUES
	(26, 'kouki', 'Achref', '52782354', 'Mourouj 5', '2022-03-11'),
	(27, 'Test', 'test', '99999999', 'Ben arous', '2022-03-10');
/*!40000 ALTER TABLE `clients` ENABLE KEYS */;

-- Listage de la structure de la table animaux_v. consultation
CREATE TABLE IF NOT EXISTS `consultation` (
  `id_const` int(11) NOT NULL AUTO_INCREMENT,
  `id_animaux` int(11) DEFAULT NULL,
  `date_consultation` date DEFAULT NULL,
  `Motif_consultation` varchar(50) DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `Retour_Con` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id_const`),
  KEY `FK_consultation_animaux` (`id_animaux`),
  CONSTRAINT `FK_consultation_animaux` FOREIGN KEY (`id_animaux`) REFERENCES `animaux` (`id_animaux`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.consultation : ~2 rows (environ)
/*!40000 ALTER TABLE `consultation` DISABLE KEYS */;
INSERT INTO `consultation` (`id_const`, `id_animaux`, `date_consultation`, `Motif_consultation`, `tel`, `Retour_Con`) VALUES
	(32, 30, '2022-03-24', 'normal', '52782354', ' bonjour azddazdazdazdazdazdazdza\r\nazdazdazdazdazdazdazdazdazdazdazdazdazdazdazdaz');
/*!40000 ALTER TABLE `consultation` ENABLE KEYS */;

-- Listage de la structure de la vue animaux_v. pets
-- Création d'une table temporaire pour palier aux erreurs de dépendances de VIEW
CREATE TABLE `pets` (
	`id_animaux` INT(11) NOT NULL,
	`id_client` INT(11) NOT NULL,
	`nom` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`prenom` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`tel` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Adresse` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Date_Suivi` DATE NULL,
	`type_a` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`nom_a` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`age` VARCHAR(101) NULL COLLATE 'latin1_swedish_ci',
	`couleur` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`sexe` VARCHAR(50) NULL COLLATE 'latin1_swedish_ci',
	`Date_naissance` DATE NULL
) ENGINE=MyISAM;

-- Listage de la structure de la table animaux_v. type_animals
CREATE TABLE IF NOT EXISTS `type_animals` (
  `id_type` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_type`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.type_animals : ~4 rows (environ)
/*!40000 ALTER TABLE `type_animals` DISABLE KEYS */;
INSERT INTO `type_animals` (`id_type`, `type`) VALUES
	(1, 'Chat'),
	(2, 'Chien'),
	(3, 'Lapin'),
	(4, 'Oiseaux');
/*!40000 ALTER TABLE `type_animals` ENABLE KEYS */;

-- Listage de la structure de la table animaux_v. users
CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `satuts` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.users : ~2 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id_user`, `nom`, `prenom`, `username`, `password`, `satuts`) VALUES
	(1, '0', 'Achref', 'Achref', '123456', 2),
	(2, '0', 'Issam', 'Issam', '123456', 2);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table animaux_v. vaccination
CREATE TABLE IF NOT EXISTS `vaccination` (
  `id_vacc` int(11) NOT NULL AUTO_INCREMENT,
  `id_animaux` int(11) NOT NULL,
  `date_Vaccin` date DEFAULT NULL,
  `prochain_vaccin` date DEFAULT NULL,
  `tel` varchar(50) DEFAULT NULL,
  `Motif_Vaccin` varchar(50) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  PRIMARY KEY (`id_vacc`),
  KEY `FK_vaccination_clients` (`id_animaux`),
  CONSTRAINT `FK_vaccination_clients` FOREIGN KEY (`id_animaux`) REFERENCES `animaux` (`id_animaux`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Listage des données de la table animaux_v.vaccination : ~0 rows (environ)
/*!40000 ALTER TABLE `vaccination` DISABLE KEYS */;
INSERT INTO `vaccination` (`id_vacc`, `id_animaux`, `date_Vaccin`, `prochain_vaccin`, `tel`, `Motif_Vaccin`, `status`) VALUES
	(8, 30, '2022-03-24', '2022-03-31', '52782354', 'chaleur', '0');
/*!40000 ALTER TABLE `vaccination` ENABLE KEYS */;

-- Listage de la structure de la vue animaux_v. pets
-- Suppression de la table temporaire et création finale de la structure d'une vue
DROP TABLE IF EXISTS `pets`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `pets` AS SELECT  animaux.id_animaux,clients.id_client,clients.nom,clients.prenom,clients.tel,clients.Adresse,clients.Date_Suivi,animaux.type_a,animaux.nom_a,

CONCAT(age,' ',jma) as age,animaux.couleur,animaux.sexe,animaux.Date_naissance from clients,animaux 


WHERE clients.id_client=animaux.id_client ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
