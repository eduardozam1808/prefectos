-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-07-2019 a las 19:27:33
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistenciaprefectos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id` int(30) NOT NULL,
  `aula` int(30) DEFAULT NULL,
  `grupo` varchar(60) DEFAULT NULL,
  `carrera` varchar(60) DEFAULT NULL,
  `optativa` varchar(30) DEFAULT NULL,
  `catedratico` varchar(60) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `noFalto` int(10) DEFAULT NULL,
  `siFalto` int(10) DEFAULT NULL,
  `retardo` int(10) DEFAULT NULL,
  `minTarde` time DEFAULT NULL,
  `intento` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `aula`, `grupo`, `carrera`, `optativa`, `catedratico`, `horario`, `noFalto`, `siFalto`, `retardo`, `minTarde`, `intento`) VALUES
(1, 317, '631-14', 'ICO', '', 'Arturo Quezada', '07:00:00', 1, 0, 0, '00:00:00', 0),
(2, 817, '817-18', 'LAE', '', 'Paco ruiz', '07:00:00', 0, 0, 1, '03:00:00', 0),
(3, 617, '117-1', 'ICO', '', 'Sosa mares', '08:00:00', 0, 0, 0, '00:00:00', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
