-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 19-12-2022 a las 19:45:56
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.19

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
  `idAdministracion` int NOT NULL,
  `idUsuario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `idBaja` int NOT NULL,
  `idTarjeta` int NOT NULL,
  `Causa` enum('Baja_matricula',' Perdida','Deteriorio','Baja_Profesor') CHARACTER SET utf8mb3 COLLATE utf8mb3_spanish_ci NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fechabajatarjetas`
--

INSERT INTO `fechabajatarjetas` (`idBaja`, `idTarjeta`, `Causa`, `Fecha`) VALUES
(3, 123456987, '', '2022-12-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE `perfiles` (
  `idPerfil` int NOT NULL,
  `Nombre` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`idPerfil`, `Nombre`) VALUES
(1, 'Admin'),
(2, 'Profesor'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjetas`
--

CREATE TABLE `tarjetas` (
  `idTarjeta` int NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `activo`) VALUES
(1701755, 1),
(2289789, 1),
(8392054, 1),
(65631235, 1),
(77725507, 1),
(77735059, 1),
(80543219, 1),
(98346195, 1),
(107629315, 1),
(123456789, 1),
(123456798, 1),
(123456879, 1),
(123456987, 1),
(123654789, 1),
(2071537105, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nie` int DEFAULT NULL,
  `unidad` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `departamento` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `idPerfil` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombre`, `email`, `nie`, `unidad`, `departamento`, `idPerfil`) VALUES
(1, 'admin', 'admin@iesgrancapitan.org', NULL, NULL, 'DPTO-ADMIN', 1),
(20, '', 'joseaguilera@iesgrancapitan.org', NULL, NULL, 'dpto-informatica', 1),
(87, NULL, 'federico@iesgrancapitan.org', NULL, NULL, 'dpto-musica', 2),
(88, NULL, 'jralbendin@iesgrancapitan.org', NULL, NULL, 'dpto-informatica', 2),
(89, NULL, 'jalcazar@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(90, NULL, 'anruser@iesgrancapitan.org', NULL, NULL, 'dpto-economia-fol', 2),
(91, NULL, 'isaantunez@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(92, NULL, 'p19arsara@iesgrancapitan.org', NULL, NULL, 'dpto-hosteleria', 2),
(93, NULL, 'reginoarribas@iesgrancapitan.org', NULL, NULL, 'dpto-hosteleria', 2),
(94, NULL, 'abelper@iesgrancapitan.org', NULL, NULL, 'dpto-matematicas', 2),
(95, 'Chaves', NULL, 3354132, '2ºGSDAWA', NULL, 3),
(96, 'Cebrián', NULL, 2293874, '2ºGSDAWA', NULL, 3),
(97, 'Mariscal', NULL, 752252, '2ºGSDAWA', NULL, 3),
(98, 'Virginia', NULL, 8392050, '2ºGSDAWA', NULL, 3),
(99, 'Joaquin', NULL, 1701755, '2ºGSASIRA', NULL, 3),
(100, 'Alberto', NULL, 2289789, '2ºGSASIRA', NULL, 3),
(101, 'Sandra', NULL, 8392054, '2ºGSASIRA', NULL, 3),
(102, 'Manuel', NULL, 3093004, '2ºGSDAWA', NULL, 3),
(103, 'Miguel', NULL, 1468733, '2ºGSASIRA', NULL, 3),
(104, 'Rafa', NULL, 1606639, '2ºGSASIRA', NULL, 3),
(106, 'Luna', NULL, 4314199, '1ºESOA', NULL, 3),
(107, 'Marcos', NULL, 5901249, '3ºESOB', NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_tarjetas`
--

CREATE TABLE `usuarios_tarjetas` (
  `idUserTarje` int NOT NULL,
  `idUsuario` int NOT NULL,
  `idTarjeta` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_tarjetas`
--

INSERT INTO `usuarios_tarjetas` (`idUserTarje`, `idUsuario`, `idTarjeta`) VALUES
(1, 1, 123456789),
(2, 20, 123456987),
(3, 106, 98346195),
(4, 107, 77735059),
(5, 97, 80543219),
(6, 102, 77725507),
(7, 98, 65631235),
(8, 101, 107629315),
(9, 104, 2071537105);

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
  ADD UNIQUE KEY `email` (`email`,`nie`),
  ADD UNIQUE KEY `email_2` (`email`),
  ADD UNIQUE KEY `nie` (`nie`),
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
  MODIFY `idAdministracion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fechabajatarjetas`
--
ALTER TABLE `fechabajatarjetas`
  MODIFY `idBaja` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `idPerfil` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tarjetas`
--
ALTER TABLE `tarjetas`
  MODIFY `idTarjeta` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2071537106;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT de la tabla `usuarios_tarjetas`
--
ALTER TABLE `usuarios_tarjetas`
  MODIFY `idUserTarje` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
