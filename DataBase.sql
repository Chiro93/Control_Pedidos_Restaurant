-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-11-2016 a las 03:59:06
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pf`
--
CREATE DATABASE IF NOT EXISTS `pf` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pf`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_menu`
--

CREATE TABLE `detalle_menu` (
  `cod_menu` int(10) UNSIGNED NOT NULL,
  `cod_producto` int(10) UNSIGNED NOT NULL,
  `cantidad` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_menu`
--

INSERT INTO `detalle_menu` (`cod_menu`, `cod_producto`, `cantidad`) VALUES
(1, 1, 0.5),
(1, 2, 0.5),
(1, 3, 2),
(2, 4, 0.7),
(2, 5, 1),
(3, 4, 1),
(3, 5, 4),
(3, 6, 4),
(4, 3, 3),
(4, 7, 5),
(5, 9, 10),
(6, 10, 10),
(7, 1, 1),
(7, 2, 1),
(7, 11, 12),
(8, 8, 1),
(8, 11, 12),
(9, 1, 0.5),
(9, 12, 1),
(10, 6, 3),
(10, 13, 1),
(11, 17, 0.8),
(16, 6, 3),
(16, 7, 4),
(16, 14, 0.3),
(16, 15, 0.7),
(17, 8, 1),
(17, 16, 1),
(18, 7, 6),
(18, 14, 0.5),
(18, 16, 1),
(19, 6, 4),
(19, 17, 0.8),
(19, 30, 1),
(20, 18, 1),
(21, 19, 0.5),
(21, 20, 0.5),
(21, 21, 0.5),
(22, 22, 2),
(22, 23, 0.3),
(23, 22, 2),
(23, 24, 2),
(23, 25, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_pedido`
--

CREATE TABLE `detalle_pedido` (
  `cod_pedido` int(10) UNSIGNED NOT NULL COMMENT 'PK, FK',
  `cod_menu` int(10) UNSIGNED NOT NULL COMMENT 'PK,FK',
  `cantidad` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_pedido`
--

INSERT INTO `detalle_pedido` (`cod_pedido`, `cod_menu`, `cantidad`) VALUES
(1, 26, 3),
(1, 27, 1),
(2, 26, 4),
(3, 18, 4),
(3, 24, 4),
(4, 6, 3),
(6, 24, 3),
(6, 25, 1),
(7, 26, 2),
(7, 27, 2),
(8, 19, 3),
(8, 25, 3),
(9, 8, 1),
(9, 10, 1),
(9, 24, 3),
(24, 2, 1),
(25, 2, 1),
(26, 2, 1),
(26, 3, 2),
(26, 16, 2),
(27, 2, 2),
(27, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_menu`
--

CREATE TABLE `estado_menu` (
  `id_estado_menu` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_menu`
--

INSERT INTO `estado_menu` (`id_estado_menu`, `descripcion`) VALUES
(1, 'Disponible'),
(2, 'No Disponible'),
(3, 'Fuera de Temporada'),
(4, 'Reposicionar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_mesa`
--

CREATE TABLE `estado_mesa` (
  `id_estado_mesa` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_mesa`
--

INSERT INTO `estado_mesa` (`id_estado_mesa`, `descripcion`) VALUES
(1, 'Libre'),
(2, 'Ocupado'),
(3, 'Reservado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_pedido`
--

CREATE TABLE `estado_pedido` (
  `id_estado_pedido` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_pedido`
--

INSERT INTO `estado_pedido` (`id_estado_pedido`, `descripcion`) VALUES
(1, 'Hecho'),
(2, 'Preparando'),
(3, 'Pendiente'),
(4, 'Enviado'),
(5, 'Pagado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_producto`
--

CREATE TABLE `estado_producto` (
  `id_estado_producto` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estado_producto`
--

INSERT INTO `estado_producto` (`id_estado_producto`, `descripcion`) VALUES
(1, 'En Reposición'),
(2, 'Disponible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forma_pago`
--

CREATE TABLE `forma_pago` (
  `cod_forma` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `forma_pago`
--

INSERT INTO `forma_pago` (`cod_forma`, `nombre`) VALUES
(1, 'Efectivo'),
(2, 'Tarjeta de Credito'),
(3, 'Tarjeta de Debito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `cod_menu` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(150) DEFAULT NULL,
  `precio` int(10) UNSIGNED NOT NULL,
  `cod_tipo` int(10) UNSIGNED NOT NULL COMMENT 'FK',
  `id_estado_menu` int(10) UNSIGNED NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`cod_menu`, `nombre`, `descripcion`, `precio`, `cod_tipo`, `id_estado_menu`) VALUES
(1, 'Omelette de Jamon y Queso', NULL, 150, 1, 0),
(2, 'Ensalada de arroz y atún', NULL, 75, 1, 0),
(3, 'Tomates rellenos de arroz y atún', NULL, 60, 1, 0),
(4, 'Tortilla de Papas', NULL, 70, 1, 0),
(5, 'Alitas de pollo al horno', NULL, 80, 1, 0),
(6, 'Rabas', NULL, 65, 1, 0),
(7, 'Empanadas de Jamon y Queso', NULL, 55, 1, 0),
(8, 'Empanadas de Pollo', NULL, 55, 1, 0),
(9, 'Jamon con melon', NULL, 60, 1, 0),
(10, 'Ensalada de lechuga y tomate', NULL, 45, 1, 0),
(16, 'Ñoquis de papa con bolognesa', NULL, 145, 2, 0),
(17, 'Suprema de pollo', NULL, 115, 2, 0),
(18, 'Milanesa de carne con fritas', NULL, 155, 2, 0),
(19, 'Fideos con salsa rosa', NULL, 110, 2, 0),
(20, 'Guiso de lentejas', NULL, 120, 2, 0),
(21, 'Helado de frutilla, vainilla y chocolate', NULL, 75, 3, 0),
(22, 'Banana con dulce de leche', NULL, 65, 3, 0),
(23, 'Ensalada de frutas', NULL, 90, 3, 0),
(24, 'Agua sin gas 250cc', NULL, 55, 4, 0),
(25, 'Coca cola Ligh 300cc', NULL, 85, 4, 0),
(26, 'Agua con gas 300cc', NULL, 65, 4, 0),
(27, 'Coca Cola 253cc', NULL, 75, 4, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mesas`
--

CREATE TABLE `mesas` (
  `num_mesa` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `cant_personas` int(10) UNSIGNED NOT NULL,
  `id_estado_mesa` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mesas`
--

INSERT INTO `mesas` (`num_mesa`, `cant_personas`, `id_estado_mesa`) VALUES
(1, 4, 2),
(2, 4, 2),
(3, 4, 2),
(4, 3, 2),
(5, 3, 2),
(6, 6, 1),
(7, 6, 3),
(8, 6, 1),
(9, 2, 1),
(10, 2, 1),
(11, 1, 3),
(12, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `cod_forma` int(11) NOT NULL COMMENT 'FK',
  `total` float UNSIGNED NOT NULL,
  `observaciones` varchar(200) DEFAULT NULL,
  `fecha_pago` datetime NOT NULL,
  `num_mesa` int(10) UNSIGNED NOT NULL COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_credito`
--

CREATE TABLE `pagos_credito` (
  `id_pago` int(10) UNSIGNED NOT NULL COMMENT 'FK',
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `cant_cuotas` int(3) UNSIGNED NOT NULL,
  `banco` varchar(100) NOT NULL,
  `descuento` float UNSIGNED DEFAULT NULL,
  `monto_cuota` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_debito`
--

CREATE TABLE `pagos_debito` (
  `id_pago` int(10) UNSIGNED NOT NULL COMMENT 'FK',
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `num_tarjeta` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_efectivo`
--

CREATE TABLE `pagos_efectivo` (
  `id_pago` int(11) NOT NULL COMMENT 'FK',
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `cod_pedido` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `num_mesa` int(10) UNSIGNED NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `id_estado_pedido` int(10) UNSIGNED NOT NULL DEFAULT '3' COMMENT 'FK'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`cod_pedido`, `num_mesa`, `fecha_pedido`, `id_estado_pedido`) VALUES
(1, 1, '2016-10-24 00:00:00', 4),
(2, 1, '2016-10-24 00:00:00', 4),
(3, 2, '2016-10-24 00:00:00', 5),
(4, 4, '2016-10-24 00:00:00', 4),
(6, 3, '2016-10-24 00:00:00', 4),
(7, 3, '2016-10-24 00:00:00', 4),
(8, 5, '2016-10-24 00:00:00', 4),
(9, 5, '2016-10-24 00:00:00', 4),
(24, 2, '2016-11-14 22:07:51', 4),
(25, 2, '2016-11-14 22:53:40', 3),
(26, 2, '2016-11-14 23:17:16', 3),
(27, 2, '2016-11-14 23:37:06', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_producto` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `nombre` varchar(250) NOT NULL,
  `descripcion` varchar(300) DEFAULT NULL,
  `stock` float NOT NULL,
  `pto_reposicion` float UNSIGNED NOT NULL,
  `cod_estado` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_producto`, `nombre`, `descripcion`, `stock`, `pto_reposicion`, `cod_estado`) VALUES
(1, 'Jamon', NULL, 46.5, 50, 2),
(2, 'Queso', NULL, 247, 50, 2),
(3, 'Huevo', NULL, 482, 150, 2),
(4, 'Arroz', NULL, 97.9, 30, 2),
(5, 'Atún', NULL, 197, 75, 2),
(6, 'Tomate', NULL, 179, 100, 2),
(7, 'Papa', NULL, 112, 70, 2),
(8, 'Pollo Entero', NULL, 99, 25, 2),
(9, 'Alitas de Pollo', NULL, 300, 150, 2),
(10, 'Rabas', NULL, 290, 70, 2),
(11, 'Tapas para Empanadas', NULL, 500, 150, 2),
(12, 'Melon', NULL, 75, 15, 2),
(13, 'Lechuga', NULL, 100, 25, 2),
(14, 'Vacío', NULL, 72.9, 15, 2),
(15, 'Ñoquis', NULL, 35.1, 10, 2),
(16, 'Pan Rallado', NULL, 149, 30, 2),
(17, 'Crema', NULL, 10, 3, 2),
(18, 'Lentejas', NULL, 50, 20, 2),
(19, 'Helado de Frutilla', NULL, 74.5, 10, 2),
(20, 'Helado de Vainilla', NULL, 74.5, 10, 2),
(21, 'Helado de Chocolate', NULL, 74.5, 10, 2),
(22, 'Banana', NULL, 200, 60, 2),
(23, 'Dulce de Leche', NULL, 30, 5, 2),
(24, 'Manzana', NULL, 200, 60, 2),
(25, 'Naranja', NULL, 200, 60, 2),
(26, 'Agua sin gas 250cc', NULL, 250, 70, 2),
(27, 'Coca cola Ligh 300cc', NULL, 300, 70, 2),
(28, 'Agua con gas 300cc', NULL, 300, 70, 2),
(29, 'Coca Cola 253cc', NULL, 300, 70, 2),
(30, 'Fideos', NULL, 150, 20, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_menus`
--

CREATE TABLE `tipo_menus` (
  `cod_tipo` int(10) UNSIGNED NOT NULL COMMENT 'PK',
  `nombre` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_menus`
--

INSERT INTO `tipo_menus` (`cod_tipo`, `nombre`) VALUES
(1, 'Entrada'),
(2, 'Plato Principal'),
(3, 'Postre'),
(4, 'Bebidas');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_menu`
--
ALTER TABLE `detalle_menu`
  ADD PRIMARY KEY (`cod_menu`,`cod_producto`);

--
-- Indices de la tabla `detalle_pedido`
--
ALTER TABLE `detalle_pedido`
  ADD PRIMARY KEY (`cod_pedido`,`cod_menu`);

--
-- Indices de la tabla `estado_menu`
--
ALTER TABLE `estado_menu`
  ADD PRIMARY KEY (`id_estado_menu`);

--
-- Indices de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  ADD PRIMARY KEY (`id_estado_mesa`);

--
-- Indices de la tabla `estado_pedido`
--
ALTER TABLE `estado_pedido`
  ADD PRIMARY KEY (`id_estado_pedido`);

--
-- Indices de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  ADD PRIMARY KEY (`id_estado_producto`);

--
-- Indices de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  ADD PRIMARY KEY (`cod_forma`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`cod_menu`);

--
-- Indices de la tabla `mesas`
--
ALTER TABLE `mesas`
  ADD PRIMARY KEY (`num_mesa`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`cod_pedido`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `tipo_menus`
--
ALTER TABLE `tipo_menus`
  ADD PRIMARY KEY (`cod_tipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `estado_menu`
--
ALTER TABLE `estado_menu`
  MODIFY `id_estado_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `estado_mesa`
--
ALTER TABLE `estado_mesa`
  MODIFY `id_estado_mesa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estado_pedido`
--
ALTER TABLE `estado_pedido`
  MODIFY `id_estado_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `estado_producto`
--
ALTER TABLE `estado_producto`
  MODIFY `id_estado_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `forma_pago`
--
ALTER TABLE `forma_pago`
  MODIFY `cod_forma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `cod_menu` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `mesas`
--
ALTER TABLE `mesas`
  MODIFY `num_mesa` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK';
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `cod_pedido` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `tipo_menus`
--
ALTER TABLE `tipo_menus`
  MODIFY `cod_tipo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'PK', AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
