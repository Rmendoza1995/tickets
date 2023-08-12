-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:4473
-- Tiempo de generación: 01-07-2020 a las 18:34:43
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `service`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `useros`
--

CREATE TABLE `useros` (
  `id_usuarios` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `fecha_registro` date DEFAULT NULL,
  `levely` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `useros`
--

INSERT INTO `useros` (`id_usuarios`, `nombre`, `usuario`, `clave`, `fecha_registro`, `levely`) VALUES
(2, 'Emanuel garcia', 'GAEE9508', 'Mannu160', '2020-04-09', '1'),
(3, 'Jonathan Lagos', 'jhon', '12345', '2020-04-14', '2'),
(4, 'Rafael Caballero', 'Rcaballero', '306073937', '2020-04-18', '1'),
(5, 'roberto mendoza', 'Rmendoza', '123', '2020-06-19', '1'),
(6, 'IRAIS GUEVARA', 'Iguevara', '12345678', '2020-07-01', '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `useros`
--
ALTER TABLE `useros`
  ADD PRIMARY KEY (`id_usuarios`);


ALTER TABLE `useros`
  MODIFY `id_usuarios` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
