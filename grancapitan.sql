-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2022 a las 22:29:50
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
-- Estructura de tabla para la tabla `fechabajatarjetas`
--

CREATE TABLE `fechabajatarjetas` (
  `idBaja` int(11) NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `Causa` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
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
  `Activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarjetas`
--

INSERT INTO `tarjetas` (`idTarjeta`, `Activo`) VALUES
(0, 1),
(234567890, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(20) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Nie` int(11) DEFAULT NULL,
  `Unidad` varchar(255) DEFAULT NULL,
  `Departamento` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `idPerfil` int(11) NOT NULL,
  `idTarjeta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `Nombre`, `Nie`, `Unidad`, `Departamento`, `idPerfil`, `idTarjeta`) VALUES
(1, 'Admin', NULL, NULL, '', 1, 0);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `idPerfil` (`idPerfil`),
  ADD KEY `idTarjeta` (`idTarjeta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

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
  MODIFY `idTarjeta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1233456790;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `fechabajatarjetas`
--
ALTER TABLE `fechabajatarjetas`
  ADD CONSTRAINT `fechabajatarjetas_ibfk_1` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetas` (`idTarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK_idPerfil` FOREIGN KEY (`idPerfil`) REFERENCES `perfiles` (`idPerfil`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjetas` (`idTarjeta`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
