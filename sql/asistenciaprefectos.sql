-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-08-2019 a las 19:02:20
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
  `intento` int(10) DEFAULT NULL,
  `jefeGrupo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id`, `aula`, `grupo`, `carrera`, `optativa`, `catedratico`, `horario`, `noFalto`, `siFalto`, `retardo`, `minTarde`, `intento`, `jefeGrupo`) VALUES
(1, 317, '631-14', 'ICO', '', 'Arturo Quezada', '07:00:00', 1, 0, 0, '00:00:00', 0, ''),
(2, 817, '817-18', 'LAE', '', 'Paco ruiz', '07:00:00', 0, 1, 0, '00:00:00', 0, ''),
(3, 617, '117-1', 'ICO', '', 'Sosa mares', '08:00:00', 0, 1, 0, '00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `insidencias`
--

CREATE TABLE `insidencias` (
  `id` int(30) NOT NULL,
  `aula` int(30) DEFAULT NULL,
  `grupo` varchar(60) DEFAULT NULL,
  `carrera` varchar(60) DEFAULT NULL,
  `jefeGrupo` varchar(100) DEFAULT NULL,
  `descripcionReporte` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `insidencias`
--

INSERT INTO `insidencias` (`id`, `aula`, `grupo`, `carrera`, `jefeGrupo`, `descripcionReporte`) VALUES
(1, 317, '1', 'ICO', 'david', 'salon sucio'),
(2, 317, '631-14', 'ICO', 'david', 'salon sucio\n\n\n\n\n\n\n'),
(3, 317, '631-14', 'ICO', 'michelle', 'Estaban en el telefono'),
(4, 0, '', '', '', ''),
(5, 0, '', '', '', ''),
(6, 317, '631-14', 'ICO', 'eduardo', 'salon sucio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id` int(30) NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `titulo` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telCelular` int(40) DEFAULT NULL,
  `telCasa` int(40) DEFAULT NULL,
  `telOficina` int(40) DEFAULT NULL,
  `correo` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id`, `clave`, `nombre`, `apellido`, `titulo`, `telCelular`, `telCasa`, `telOficina`, `correo`) VALUES
(1, '8921HJ', 'Eduardo', 'Zamora', 'ING', 477635452, 477366723, 776472332, 'eduarzam1861@gmail.com'),
(2, 'JI350', 'josue', 'sanchez', '1', 2147483647, 7723412, 7873425, 'izzyk24@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `edad`) VALUES
(2, 'josue', 'sanchez', 25),
(4, '.karina.', '.gonzales.', 25),
(6, '.graciela.', '.lopez.', 56),
(7, '.Daniel.', '.Aguirre.', 27),
(9, 'nadia', 'muÃ±oz', 23),
(11, '..', '..', 0),
(12, '..', '..', 0),
(13, '..', '..', 0),
(14, '..', '..', 0),
(15, '..', '..', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(30) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `contrasena` varchar(150) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellido` varchar(70) DEFAULT NULL,
  `plantel` varchar(60) DEFAULT NULL,
  `rol` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `contrasena`, `nombre`, `apellido`, `plantel`, `rol`) VALUES
(1, 'eduardo@udel.edu.mx', 'hola1808', 'Eduardo Jesus', 'Zamora Valle', 'Leon juarez', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `versiones`
--

CREATE TABLE `versiones` (
  `id` int(30) NOT NULL,
  `version` varchar(60) DEFAULT NULL,
  `estable` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `versiones`
--

INSERT INTO `versiones` (`id`, `version`, `estable`) VALUES
(1, 'v0.0.1', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `insidencias`
--
ALTER TABLE `insidencias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `versiones`
--
ALTER TABLE `versiones`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `insidencias`
--
ALTER TABLE `insidencias`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `versiones`
--
ALTER TABLE `versiones`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
