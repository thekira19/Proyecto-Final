-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-12-2019 a las 16:51:21
-- Versión del servidor: 8.0.17
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `referidos`
--

CREATE TABLE `referidos` (
  `id` int(11) UNSIGNED NOT NULL,
  `idPatrocinador` int(11) UNSIGNED NOT NULL,
  `idReferido` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `referidos`
--

INSERT INTO `referidos` (`id`, `idPatrocinador`, `idReferido`) VALUES
(1, 1, 2),
(2, 1, 3),
(3, 1, 4),
(4, 1, 5),
(6, 1, 1),
(7, 3, 1),
(8, 1, 14),
(9, 3, 15),
(10, 2, 16),
(11, 1, 17),
(12, 1, 18),
(13, 5, 21),
(14, 5, 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) UNSIGNED NOT NULL,
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
  `estado` int(2) DEFAULT NULL
) ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `nombre`, `apellido`, `email`, `celular`, `nivel`, `password`, `pais`, `inicio`, `fin`, `patrocinador`, `estado`) VALUES
(1, 'thekira19', 'Paulo Cesar', 'Huaracallo Choque', 'thekira19@gmail.com', '959849490', 2, '$2y$10$GkcJBLsCpTrsGu6SLe5dYO7B2Xzl20u9gkVDHhE0aO2YJyF468yjq', 'Perú', '2019-12-10 12:48:11', '2020-02-10 12:48:00', 'thekira322', 1),
(2, 'jabi', 'Roel Javier', 'Caxi Cervantes', 'Javier123@gmail.com', '988434477', 2, '$2y$10$WtWVBKorvfdPWPuLCAllXuCyfKJXhcOe116VnFYIOwzxUHucXrO8q', 'Perú', '2019-12-11 15:09:06', '2019-12-12 09:35:00', 'thekira19', 0),
(3, 'andre', 'Andre', 'Cano Calderon', 'andre123@hotmail.com', '988434477', 2, '$2y$10$NBnBSDTQevmRzbdYpFo.puKbXyyGig4LqJY3a0xOlmhHlRL4DHoIK', 'Perú', '2019-12-10 12:58:20', '2019-12-11 18:06:00', 'thekira19', 0),
(4, 'anyela', 'Anyela  ', 'Jimenez Muñoz', 'anyi@hotmail.com', '944889922', 2, '$2y$10$neZsRFZY2ps.j3vH0YAyZeDbCaHPIZBr4ri/dWcrpOvqhWc7hPsLa', 'Perú', '2019-12-10 14:31:13', '2019-12-31 14:31:00', 'thekira19', 0),
(5, 'mijael', 'Mijael', 'Cary Luque', 'mijael@gmail.com', '922331188', 1, '$2y$10$4Fa/4Ui0YNvIKU5yZVf4W.pSUEoCl36CYF7Mj1riufuDBWUxrqrf2', 'Peru', '2019-12-12 09:09:24', '2020-01-11 11:02:13', 'thekira19', 0),
(14, 'cesar', 'Paulo Cesar', 'Caxi Cervantes', 'pacehuch123456789@gmail.com', '959849490', 1, '$2y$10$gCtJbDLudnKs5QLdagHPneEVASwvZtKlljWAaH1tvrjFKBC8HkvUu', 'Australia', '2019-12-12 09:09:17', '2020-01-11 11:02:20', 'thekira19', 0),
(15, 'admin', 'Paulo Cesar', 'Caxi Cervantes', 'thekira19@gmail.com', '959849490', 4, '$2y$10$dlpMRPd/3o4/o.y5tPZB7.sWiuCyoh8x2qDwz7z8OPxgMaM9fLhZm', 'Aruba', NULL, '2020-01-11 11:02:00', 'andre', 0),
(16, 'root', 'Roel Javier', 'Cano Calderon', '28scorpion28@gmail.com', '959849490', 0, '$2y$10$n6D5Tq/9KhKD9Ppce7Pqs.Hts/zdBOIggzIqtmhe4BGjohYTdtVd2', 'Azerbaiyán', NULL, NULL, 'jabi', 0),
(17, 'user123', 'Paulo Cesar', 'Caxi Cervantes', 'pacehuch123456789@gmail.com', '959849490', 4, '$2y$10$YiZe7hTL8cf22CPQfvcUhuRXanL.Oe9wW/7EHTc5Xlx7A3ZuhgS/e', 'Austria', '2019-12-12 11:01:29', '2019-12-12 11:02:36', 'thekira19', 0),
(18, 'thekira1911', 'Paulo Cesar', 'Caxi Cervantes', 'thekira19@gmail.com', '988434477', 0, '$2y$10$7/j5DrNiUE79E2hmW.UVfeauDoB2FXfjrNy54FcQPGp6.OIbWwRHa', 'Qatar', NULL, NULL, 'thekira19', 0),
(21, 'thekira', 'Paulo Cesar', 'Caxi Cervantes', 'thekira19@gmail.com', '959849490', 0, '$2y$10$TUqlkMDq8rhb/9y2OgdcjOBj09ARVepdxIXdRsCYVGU6MBDFqvK42', 'Australia', NULL, NULL, 'mijael', NULL),
(22, 'admin123', 'Paulo Cesar', 'Caxi Cervantes', 'thekira19@gmail.com', '959849490', 1, '$2y$10$xB7MZNhxFgcN3mpTlhESRuqCf2iHRq0oAjtk9SvcR7SEtsg0v9l1a', 'Austria', '2019-12-12 11:15:35', '2020-01-11 11:15:35', 'mijael', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `patrocinador_fk` (`idPatrocinador`),
  ADD KEY `referido_fk` (`idReferido`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `referidos`
--
ALTER TABLE `referidos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `referidos`
--
ALTER TABLE `referidos`
  ADD CONSTRAINT `patrocinador_fk` FOREIGN KEY (`idPatrocinador`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `referido_fk` FOREIGN KEY (`idReferido`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
