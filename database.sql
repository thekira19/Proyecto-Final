-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.17 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.5.0.5295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para asd
CREATE DATABASE IF NOT EXISTS `asd` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `asd`;

-- Volcando estructura para tabla asd.referidos
CREATE TABLE IF NOT EXISTS `referidos` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `idPatrocinador` int(11) unsigned NOT NULL,
  `idReferido` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `patrocinador_fk` (`idPatrocinador`),
  KEY `referido_fk` (`idReferido`),
  CONSTRAINT `patrocinador_fk` FOREIGN KEY (`idPatrocinador`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `referido_fk` FOREIGN KEY (`idReferido`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asd.referidos: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `referidos` DISABLE KEYS */;
INSERT INTO `referidos` (`id`, `idPatrocinador`, `idReferido`) VALUES
	(1, 1, 2),
	(2, 1, 3),
	(3, 1, 4),
	(4, 1, 5),
	(6, 1, 1),
	(7, 3, 1),
	(8, 1, 14),
	(9, 3, 15),
	(10, 2, 16);
/*!40000 ALTER TABLE `referidos` ENABLE KEYS */;

-- Volcando estructura para tabla asd.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `celular` varchar(20) NOT NULL,
  `nivel` int(2) NOT NULL,
  `password` varchar(200) NOT NULL,
  `pais` varchar(30) NOT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `patrocinador` varchar(50) NOT NULL,
  `estado` int(2) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  CONSTRAINT `CHK_EMAIL` CHECK ((`email` like _utf8mb4'%_@__%.__%')),
  CONSTRAINT `CHK_NIVEL` CHECK (((`nivel` >= 0) and (`nivel` <= 5))),
  CONSTRAINT `CHK_PASSWORD` CHECK ((length(_utf8mb4'password') >= 6))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla asd.usuarios: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`idUsuario`, `usuario`, `nombre`, `apellido`, `email`, `celular`, `nivel`, `password`, `pais`, `inicio`, `fin`, `patrocinador`, `estado`) VALUES
	(1, 'thekira19', 'Paulo Cesar', 'Huaracallo Choque', 'thekira19@gmail.com', '959849490', 2, '$2y$10$GkcJBLsCpTrsGu6SLe5dYO7B2Xzl20u9gkVDHhE0aO2YJyF468yjq', 'Perú', '2019-12-10 12:48:11', '2020-02-10 12:48:00', 'thekira322', 1),
	(2, 'jabi', 'Roel Javier', 'Caxi Cervantes', 'Javier123@gmail.com', '988434477', 3, '$2y$10$WtWVBKorvfdPWPuLCAllXuCyfKJXhcOe116VnFYIOwzxUHucXrO8q', 'Perú', '2019-12-11 15:09:06', '2019-12-11 15:32:00', 'thekira19', 0),
	(3, 'andre', 'Andre', 'Cano Calderon', 'andre123@hotmail.com', '988434477', 3, '$2y$10$NBnBSDTQevmRzbdYpFo.puKbXyyGig4LqJY3a0xOlmhHlRL4DHoIK', 'Perú', '2019-12-10 12:58:20', '2019-12-11 18:06:00', 'thekira19', 0),
	(4, 'anyela', 'Anyela  ', 'Jimenez Muñoz', 'anyi@hotmail.com', '944889922', 3, '$2y$10$neZsRFZY2ps.j3vH0YAyZeDbCaHPIZBr4ri/dWcrpOvqhWc7hPsLa', 'Perú', '2019-12-10 14:31:13', '2019-12-31 14:31:00', 'thekira19', 0),
	(5, 'mijael', 'Mijael', 'Cary Luque', 'mijael@gmail.com', '922331188', 0, '$2y$10$4Fa/4Ui0YNvIKU5yZVf4W.pSUEoCl36CYF7Mj1riufuDBWUxrqrf2', 'Peru', NULL, NULL, 'thekira19', 0),
	(14, 'cesar', 'Paulo Cesar', 'Caxi Cervantes', 'pacehuch123456789@gmail.com', '959849490', 0, '$2y$10$gCtJbDLudnKs5QLdagHPneEVASwvZtKlljWAaH1tvrjFKBC8HkvUu', 'Australia', NULL, NULL, 'thekira19', 0),
	(15, 'admin', 'Paulo Cesar', 'Caxi Cervantes', 'thekira19@gmail.com', '959849490', 0, '$2y$10$dlpMRPd/3o4/o.y5tPZB7.sWiuCyoh8x2qDwz7z8OPxgMaM9fLhZm', 'Aruba', NULL, NULL, 'andre', 0),
	(16, 'root', 'Roel Javier', 'Cano Calderon', '28scorpion28@gmail.com', '959849490', 0, '$2y$10$n6D5Tq/9KhKD9Ppce7Pqs.Hts/zdBOIggzIqtmhe4BGjohYTdtVd2', 'Azerbaiyán', NULL, NULL, 'jabi', 0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
