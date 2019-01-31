-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2019 a las 00:03:41
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `foodie`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `cod` varchar(255) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `precio` float NOT NULL DEFAULT '0',
  `precioAdicional` float DEFAULT NULL,
  `estado` int(11) DEFAULT '0',
  `tipo` int(11) DEFAULT '0',
  `usuario` varchar(255) NOT NULL,
  `detalle` text,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cod`, `producto`, `cantidad`, `precio`, `precioAdicional`, `estado`, `tipo`, `usuario`, `detalle`, `fecha`) VALUES
(3, '07cedf9928', 'PISO VINILICO COD 012-6 1220X180', 1, 1848, NULL, 0, 2, 'b198a2518d', '', '2018-07-12 00:00:00'),
(4, '07cedf9928', 'Retiro en Sucursal Rosario', 1, 0, NULL, 0, 2, 'b198a2518d', '', '2018-07-12 00:00:00'),
(7, '00a320a3cf', 'PISO VINILICO COD 012-6 1220X180', 1, 1848, NULL, 0, 0, 'b198a2518d', '', '2018-07-12 00:00:00'),
(8, '00a320a3cf', 'PISO VINILICO COD 09-8 936X150', 1, 2100, NULL, 0, 0, 'b198a2518d', '', '2018-07-12 00:00:00'),
(361, 'cde6df7e08', 'PISO VINILICO COD 09-8 936X150', 2, 2100, NULL, 0, 2, 'b198a2518d', '', '2018-08-12 00:00:00'),
(362, 'cde6df7e08', 'PISO VINILICO COD 003-1 1220X180', 2, 1848, NULL, 0, 2, 'b198a2518d', '', '2018-08-12 00:00:00'),
(363, 'cde6df7e08', 'ABRIDOR DE ENVASES CONDOR', 3, 47.06, NULL, 0, 2, 'b198a2518d', '', '2018-08-12 00:00:00'),
(364, 'cde6df7e08', 'VINILO ALTO TRANSITO X M2', 3, 698.36, NULL, 0, 2, 'b198a2518d', '', '2018-08-12 00:00:00'),
(365, 'cde6df7e08', 'Retiro en Sucursal Rosario', 1, 0, NULL, 0, 2, 'b198a2518d', '', '2018-08-12 00:00:00'),
(390, '120042d43d', 'rrrrrr54', 4, 180, NULL, 1, 1, '492526f2c3', 'Paga con: 900', '2018-12-27 12:58:45'),
(391, '120042d43d', 'Pizza Napolitana', 7, 180, NULL, 1, 1, '492526f2c3', 'Paga con: 900', '2018-12-27 12:58:45'),
(410, '893988238b', 'Pizza Napolitana | 15,Extra morrones|||50,Gaseosa//15,Aderezo', 1, 180, 80, 1, 1, '492526f2c3', 'Paga con: 888', '2019-01-02 12:58:57'),
(411, '8efa2351fe', 'Pizza Napolitana | |||50,Gaseosa', 6, 180, 50, 1, 1, '492526f2c3', 'Paga con: 9999', '2019-01-02 12:59:30'),
(412, '52e6c0e4ee', 'Desayuno Express | 3,criollitos|||15,manteca//12,mermelada', 3, 120, 30, 1, 1, '492526f2c3', 'Paga con: 500', '2019-01-02 19:55:55');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=413;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
