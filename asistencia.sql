-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2024 a las 00:30:51
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `idasistencia` int(11) NOT NULL,
  `nombre_empleado` varchar(70) NOT NULL,
  `hora_entrada` time NOT NULL,
  `hora_salida` time NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`idasistencia`, `nombre_empleado`, `hora_entrada`, `hora_salida`, `fecha_registro`) VALUES
(6, 'Cinthya Hermenejildo', '00:46:00', '01:47:00', '2024-05-08 04:47:02'),
(7, 'Robert Rivera', '00:47:00', '03:47:00', '2024-05-08 04:47:26'),
(8, 'Pedro Macias', '00:54:00', '02:54:00', '2024-05-08 04:54:05'),
(9, 'Cinthya Hermenejildo Acosta', '01:20:00', '04:20:00', '2024-05-08 05:20:24'),
(10, 'Aide Casteñeda', '01:22:00', '06:22:00', '2024-05-08 05:22:33'),
(11, 'Mario Estefano Lopez', '06:24:00', '16:30:00', '2024-05-08 05:25:01'),
(12, 'Mario Esocbar', '01:25:00', '06:25:00', '2024-05-08 05:25:48'),
(13, 'Cinthya Hermenejildo', '14:35:00', '22:35:00', '2024-05-08 18:36:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`idasistencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `idasistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
