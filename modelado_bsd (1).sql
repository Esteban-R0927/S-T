-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 23-06-2021 a las 00:01:17
-- Versión del servidor: 5.7.15-log
-- Versión de PHP: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id17112546_modelado_bsd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `NOMBRE_EMPRESA` varchar(100) COLLATE ucs2_spanish2_ci NOT NULL,
  `NOMBRE_APELLIDO` varchar(100) COLLATE ucs2_spanish2_ci NOT NULL,
  `CORREO` varchar(35) COLLATE ucs2_spanish2_ci NOT NULL,
  `DIRECCION` varchar(35) COLLATE ucs2_spanish2_ci NOT NULL,
  `CELULAR` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE_EMPRESA`, `NOMBRE_APELLIDO`, `CORREO`, `DIRECCION`, `CELULAR`, `created_at`) VALUES
(1, 'PLAN CREATIVO', 'MARY VARGAS', 'plancreativo1@gmail.com', 'CLL 48 # 53 - 84', 2147483647, '2021-01-10 21:13:06'),
(2, 'GC DESIGN', 'GABRIEL ORTIZ', 'g.c.design2005@gmail.com', 'none', 2147483647, '2021-01-10 21:14:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `ID_PAGO` varchar(8) NOT NULL,
  `FECHA_PAGO` varchar(15) DEFAULT NULL,
  `VALOR_PAGO` varchar(25) DEFAULT NULL,
  `DETALLE_PAGO` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`ID_PAGO`, `FECHA_PAGO`, `VALOR_PAGO`, `DETALLE_PAGO`) VALUES
('1', '6/10/2020', '$40.000', '...'),
('2', '7/10/2020', '$30.000', '...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `imagen_url` varchar(250) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `nombres` varchar(50) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `apellidos` varchar(50) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `ciudad` varchar(50) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `correo` varchar(50) COLLATE ucs2_spanish2_ci DEFAULT NULL,
  `telefono` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`id`, `imagen_url`, `nombres`, `apellidos`, `ciudad`, `correo`, `telefono`) VALUES
(1, 'img/1617636831_perfil.jpg', 'Jorge', 'Orlas', 'Medellín - Antioquia', 'jeorlas3@misena.edu.co', 3244899843);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PRODUCTO` varchar(8) NOT NULL,
  `CODIGO_CATALOGO` varchar(8) NOT NULL,
  `CATEGORIA` varchar(25) DEFAULT NULL,
  `NOMBRE_PRODUCTO` varchar(25) DEFAULT NULL,
  `DESCRIPCION` varchar(55) DEFAULT NULL,
  `VALOR_UNITARIO` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_PRODUCTO`, `CODIGO_CATALOGO`, `CATEGORIA`, `NOMBRE_PRODUCTO`, `DESCRIPCION`, `VALOR_UNITARIO`) VALUES
('1', 'AAA', 'IMPRESIÓN A GRAN FORMATO', 'Pendon', 'Impresión digital con un mensaje publicitario', '$40.000'),
('2', 'BBB', 'PUBLICIDAD IMPRESA', 'Tarjeta de Presentación', 'Tarjetas personalizadas con diseño profesional', '$30.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(2) NOT NULL,
  `rol` varchar(25) COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'Administrador'),
(2, 'Cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `correo` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `contraseña` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `rol_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contraseña`, `rol_id`) VALUES
(1, 'Test', 'Admin', 'testadmin@admin.co', '21232f297a57a5a743894a0e4a801fc3', 1),
(2, 'Jorge', 'Orlas', 'jeorlas3@misena.edu.co', '08f90c1a417155361a5c4b8d297e0d78', 1),
(3, 'Esteban', 'Restrepo', 'estebanorestrepo@gmail.com', '131eefef31381096aac8b8b1fbdaafdb', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_productos`
--

CREATE TABLE `usuarios_productos` (
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`ID_PAGO`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRODUCTO`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol_id` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
