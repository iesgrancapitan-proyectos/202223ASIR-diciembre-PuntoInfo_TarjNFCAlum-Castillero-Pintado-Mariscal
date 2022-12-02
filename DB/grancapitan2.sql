-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2022 a las 23:06:26
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grancapitan`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administracion`
--

CREATE TABLE `administracion` (
  `idAdministracion` int(11) NOT NULL,
  `idUsuario` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administracion`
--

INSERT INTO `administracion` (`idAdministracion`, `idUsuario`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fechabajatarjetas`
--

CREATE TABLE `fechabajatarjetas` (
  `idBaja` int(11) NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `Causa` enum('Baja matricula',' Perdida','Deteriorio','Baja_Profesor') CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idPerfil` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfil`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno'),
(4, 'Conserje'),
(5, 'Limpiador/a');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `idTarjeta` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `activo`) VALUES
(111111111, 1),
(123456789, 1),
(123456987, 1),
(321654987, 1),
(741258963, 1),
(789456123, 1),
(856321479, 1),
(963258741, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(20) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `nie` int(9) DEFAULT NULL,
  `unidad` varchar(20) DEFAULT NULL,
  `departamento` varchar(20) DEFAULT NULL,
  `idPerfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `nie`, `unidad`, `departamento`, `idPerfil`) VALUES
(1, 'admin', 'admin@admin', NULL, NULL, 'DPTO-ADMIN', 1),
(67, '', 'admin@iesgrancapitan.org', NULL, NULL, 'dpto-admin', 2),
(68, '', 'federico@iesgrancapitan.org', NULL, NULL, 'dpto-musica', 2),
(69, '', 'joseaguilera@iesgrancapitan.org', NULL, NULL, 'dpto-informatica', 2),
(70, '', 'jralbendin@iesgrancapitan.org', NULL, NULL, 'dpto-informatica', 2),
(71, '', 'jalcazar@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(72, '', 'anruser@iesgrancapitan.org', NULL, NULL, 'dpto-economia-fol', 2),
(73, '', 'isaantunez@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(74, '', 'p19arsara@iesgrancapitan.org', NULL, NULL, 'dpto-hosteleria', 2),
(75, '', 'reginoarribas@iesgrancapitan.org', NULL, NULL, 'dpto-hosteleria', 2),
(76, '', 'abelper@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(77, '', 'gbd1102@iesgrancapitan.org', NULL, NULL, 'dpto-educacion-fisic', 2),
(78, 'al1', NULL, 8392054, '2ºGSASIRA', NULL, 3),
(79, 'al2', NULL, 2203393, '2ºGSDAWA', NULL, 3),
(80, 'al2', NULL, 5965408, '1ºESOD', NULL, 3),
(81, 'al4', NULL, 3242198, '2ºBACHB', NULL, 3),
(82, 'al5', NULL, 3074381, '2ºBACHB', NULL, 3),
(83, 'al1', NULL, 8392054, '2ºGSASIRA', NULL, 3),
(84, 'al2', NULL, 2203393, '2ºGSDAWA', NULL, 3),
(85, 'al2', NULL, 5965408, '1ºESOD', NULL, 3),
(86, 'al4', NULL, 3242198, '2ºBACHB', NULL, 3),
(87, 'al5', NULL, 3074381, '2ºBACHB', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tarjetas`
--

CREATE TABLE `usuarios_tarjetas` (
  `idUserTarje` int(10) NOT NULL,
  `idUsuario` int(10) NOT NULL,
  `idTarjeta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios_tarjetas`
--

INSERT INTO `usuarios_tarjetas` (`idUserTarje`, `idUsuario`, `idTarjeta`) VALUES
(49, 1, 123456789);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD PRIMARY KEY (`idAdministracion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `fechabajatarjetas`
--
ALTER TABLE `fechabajatarjetas`
  ADD PRIMARY KEY (`idBaja`),
  ADD KEY `idTarjeta` (`idTarjeta`);

--
-- Indices de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`idPerfil`);

--
-- Indices de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  ADD PRIMARY KEY (`idTarjeta`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idPerfil` (`idPerfil`);

--
-- Indices de la tabla `usuarios_tarjetas`
--
ALTER TABLE `usuarios_tarjetas`
  ADD PRIMARY KEY (`idUserTarje`),
  ADD KEY `FK_idUser_Tarj` (`idUsuario`),
  ADD KEY `FK_idTarj_User` (`idTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administracion`
--
ALTER TABLE `administracion`
  MODIFY `idAdministracion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fechabajatarjetas`
--
ALTER TABLE `fechabajatarjetas`
  MODIFY `idBaja` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1233456791;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT de la tabla `usuarios_tarjetas`
--
ALTER TABLE `usuarios_tarjetas`
  MODIFY `idUserTarje` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administracion`
--
ALTER TABLE `administracion`
  ADD CONSTRAINT `administracion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `fechabajatarjetas`
--
ALTER TABLE `fechabajatarjetas`
  ADD CONSTRAINT `fechabajatarjetas_ibfk_1` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetas` (`idTarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`idPerfil`);

--
-- Filtros para la tabla `usuarios_tarjetas`
--
ALTER TABLE `usuarios_tarjetas`
  ADD CONSTRAINT `FK_idTarj_User` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetas` (`idTarjeta`),
  ADD CONSTRAINT `FK_idUser_Tarj` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
